<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include("handler/customersession.php");
include("admin/Blog/includes/dp.php");
include("partials/head.php");
include("admin/Blog/includes/Functions.php");
?>


<body>
    <?php
    include ("partials/header.php");
    ?>
    <!--NAVBAR END-->

  
    <div style="height: 10vh;"></div>
    <div class="container">
        <div class="row mt-4">
            <!--Main area-->
            <div class="col-sm-8">

                <h1 style="font-size: 72px; font-weight: 700;">Blog</h1>
                <div style="height: 10vh;"></div>
                <?php
                if (isset($_GET["SearchButon"])) {
                    $Search = $_GET["Search"];
                    $sql = "SELECT * FROM posts WHERE datetime LIKE :search OR title LIKE :search OR category LIKE :search  OR post LIKE :search";
                    $stmt = $ConnectingDB->prepare($sql);
                    $stmt->bindValue(':search', '%' . $Search . '%');
                    $stmt->execute();
                } elseif (isset($_GET["page"])) {
                    $Page = $_GET["page"];
                    if ($Page <= 0) {
                        $ShowPostFrom = 0;
                    } else {
                        $ShowPostFrom = ($Page * 5) - 5;
                    }

                    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT $ShowPostFrom,5";
                    $stmt = $ConnectingDB->query($sql);
                } else {
                    $sql = "SELECT * FROM posts ORDER BY id desc";
                    $stmt = $ConnectingDB->query($sql);
                }

                while ($DataRows = $stmt->fetch()) {
                    $PostId = $DataRows["id"];
                    $DateTime = $DataRows["datetime"];
                    $PostTitle = $DataRows["title"];
                    $Category = $DataRows["category"];
                    $Admin = $DataRows['author'];
                    $Image = $DataRows['image'];
                    $PostDescription = $DataRows['post'];

                ?>
                    <div class="card mb-5">
                        <div class="card-body mb-5">
                            <img src="admin/Blog/upload/<?php echo htmlentities($Image) ?>" style="max-height: 450px;" class="img-fluid card-img-top img-thumbnail">

                            <h4 class="card-title"><?php echo htmlentities($PostTitle); ?></h4>
                            <small class="text-muted">Category: <span class="text-dark"><?php echo $Category ?></span> &Written by <?php echo htmlentities($Admin) ?> On <?php echo htmlentities($DateTime) ?> </small>
                            <span style="float: right; " class="badge badge-dark text-light">
                                <?php
                                $sql1 = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
                                $stmt1 = $ConnectingDB->query($sql1);
                                $TotalRows = $stmt1->fetch();
                                $TotalComments = array_shift($TotalRows);
                                echo $TotalComments; ?>
                            </span>
                            <hr>
                            <p class="card-text">

                                <?php
                                echo htmlentities($PostDescription);
                                ?>
                            </p>

                            <a href="FullPost.php?id=<?php echo $PostId; ?>" style="float: right;">
                                <span style= "background-color:46433C" class="btn btn-dark rounded-lg">Lexo me Shume>></span>
                            </a>

                        </div>
                    </div>
                <?php } ?>

                <!--Pagination-->
                <nav>
                    <ul class="pagination pagination-lg">
                        <?php
                        if (isset($Page)) {
                            if ($Page > 1) {


                        ?>

                                <li class="page-item active">
                                    <a href="Blog.php?page=<?php echo $Page - 1 ?>" class="page-link">&laquo;</a>
                                </li>
                        <?php }
                        } ?>
                        <?php
                        $sql = "SELECT COUNT(*) FROM posts";
                        $stmt = $ConnectingDB->query($sql);
                        $RowPagination = $stmt->fetch();
                        $TotalPosts = array_shift($RowPagination);
                        $PostPagination = $TotalPosts / 5;
                        $PostPagination = ceil($PostPagination);
                        for ($i = 1; $i < $PostPagination; $i++) {
                            if (isset($Page)) {
                                if ($i == $Page) { ?>
                                    <li class="page-item active">
                                        <a href="Blog.php?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
                                    </li>

                                <?php } else { ?>


                                    <li class="page-item active">
                                        <a href="Blog.php?page=<?php echo $i ?>" class="page-link"><?php echo $i ?></a>
                                    </li>
                        <?php }
                            }
                        } ?>
                        <?php
                        if (isset($Page) && !empty($Page)) {
                            if ($Page + 1 <= $PostPagination) {


                        ?>

                                <li class="page-item active">
                                    <a href="Blog.php?page=<?php echo $Page + 1 ?>" class="page-link">&raquo;</a>
                                </li>
                        <?php }
                        } ?>
                    </ul>

                </nav>





            </div>
            <div class="col-sm-4">
                <div style="height: 18vh;"></div>
                <div class="align-middle">
                    <form class="form-inline d-none d-sm-block" action="Blog.php">
                        <div class="form-group">
                            <input style="border: 0.5px solid ; border-radius: 25px; border-color: #808080; height: 35px;" class="form-oontrol mr-2" type="text" name="Search" placeholder="   Search here.." value="">
                            <button class="btn btn-dark" name="SearchButon">Go</button>
                        </div>
                    </form>
                </div>
                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <img src="admin/Blog/images/cliniqueAd.jpg" class="d-block img-fluid mb-3 rounded-3" alt="Ad">
                        <div class="text-center">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates corrupti praesentium alias similique ut fugit mollitia recusandae tempore nostrum aperiam adipisci repellat cum, neque reiciendis distinctio illum, nisi rem amet.
                        </div>
                    </div>
                </div>

                <br>
                <div class="card">
                    <div class="card-header bg-light text-dark">
                        <h2 class="lead"> Recent Posts</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
                        $stmt = $ConnectingDB->query($sql);
                        while ($DataRows = $stmt->fetch()) {
                            $Id = $DataRows["id"];
                            $Title = $DataRows["title"];
                            $DateTime = $DataRows["datetime"];
                            $Image = $DataRows["image"];
                        ?>
                            <div class="media">
                                <img class="d-block img-fluid align-self-start" src="admin/Blog/upload/<?php echo htmlentities($Image); ?>" width="90" height="94">
                                <div class="media-body me-2">
                                    <a target="_blank" href="FullPost.php?id=<?php echo htmlentities($Id); ?>">
                                        <h6 class="lead"><?php echo htmlentities($Title); ?></h6>
                                    </a>
                                    <p class="small"><?php echo htmlentities($DateTime); ?></p>

                                </div>
                            </div>
                            <hr class="m-4">

                        <?php } ?>
                    </div>
                </div>

            </div>

        </div>
    </div>



    <div style="height: 10vh;"></div>
    <!-- ======= Footer ======= -->
    <?php
    include ('partials/footer.php');
    ?>
</body>

</html>