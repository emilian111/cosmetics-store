<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("handler/customersession.php");
include("admin/Blog/includes/dp.php");
include("admin/Blog/includes/Functions.php");
?>

<?php $SearchQueryParameter = $_GET["id"]; ?>

<?php
if (isset($_POST["Submit"])) {
 

    $Name2 =   $_SESSION['username'];
    $parts = explode("@", $Name2);
    $Name =$parts[0];
    $Email = $_SESSION['email'];
    $Comment = $_POST['CommenterThoughts'];


    date_default_timezone_set("Europe/London");
    $CurrentTime = time();
    $DateTime = strftime(" %H:%M:%S, %d/%m/%Y", $CurrentTime);



    if (empty($Comment)) {
        $_SESSION['ErrorMessage'] = "All fiels must be filled out";
        Redirect_to("FullPost.php?id={$SearchQueryParameter}");
    } elseif (strlen($Comment) > 500) {
        $_SESSION['ErrorMessage'] = "Comment length should be less than 500charachters";
        Redirect_to("FullPost.php?id={$SearchQueryParameter}");
    } else {
        //Query to insert category in db when everything is fine
        $sql = "INSERT INTO comments (datetime,name,email,comment,approvedby,status,post_id)";
        //DUMMY NAME
        $sql .= "VALUES(:dateTime,:name,:email,:comment,'pending', 'OFF',:postIdFromURL)";
        $stmt = $ConnectingDB->prepare($sql);

        //binding values
        $stmt->bindValue(':dateTime', $DateTime);
        $stmt->bindValue(':name', $Name);
        $stmt->bindValue(':email', $Email);
        $stmt->bindValue(':comment', $Comment);
        $stmt->bindValue(':postIdFromURL', $SearchQueryParameter);
        $Execute = $stmt->execute();
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Comment submited successfully";
            Redirect_to("FullPost.php?id={$SearchQueryParameter}");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
            Redirect_to("FullPost.php?id={$SearchQueryParameter}");
        }
    }
}
?>
<?php

include("partials/head.php");
?>

<body>
    <?php
    include("partials/header.php");
    ?>
    <!--NAVBAR END-->

    <div style="height: 10vh;"></div>



    <div class="container">
        <div class="row mt-4">
            <!--Main area-->
            <div class="col-sm-8">
           
                <h1 style="font-size: 72px; font-weight: 700;">Post</h1>
                <div id="h"></div>
                <div style="height: 10vh;"></div>
                <?php
                if (isset($_GET["SearchButon"])) {
                    $Search = $_GET["Search"];
                    $sql = "SELECT * FROM posts WHERE datetime LIKE :search OR title LIKE :search OR category LIKE :search  OR post LIKE :search";
                    $stmt = $ConnectingDB->prepare($sql);
                    $stmt->bindValue(':search', '%' . $Search . '%');
                    $stmt->execute();
                } else {

                    $PostIdFromURL = $_GET["id"];

                    if (!isset($PostIdFromURL)) {
                        $_SESSION["ErrorMessage"] = "Bad Request!";
                        Redirect_to("Blog.php");
                    }
                    $sql = "SELECT * FROM posts WHERE id='$PostIdFromURL' ";
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
                            <img src="admin/Blog/upload/<?php echo htmlentities($Image) ?>" style="max-height: 450px;" class="img-fluid card-img-top">

                            <h4 class="card-title"><?php echo htmlentities($PostTitle); ?></h4>
                            <small class="text-muted">Written by <?php echo htmlentities($Admin) ?> On <?php echo htmlentities($DateTime) ?> </small>
                            <span style="float: right; " class="badge badge-dark text-light">Comments
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

                        </div>
                    </div>
                <?php } ?>

                <span class="fieldInfo">Comments</span><br><br>
                <!--paraqitja e te gjithe komenteve-->
                <?php
                $sql = "SELECT * FROM comments WHERE post_id='$SearchQueryParameter' AND status='ON'";
                $stmt = $ConnectingDB->query($sql);
                while ($DataRows = $stmt->fetch()) {
                    $CommentDate = $DataRows['datetime'];
                    $CommenterName = $DataRows['name'];
                    $CommentContent = $DataRows['comment'];

                ?>


                    <div class="" style="background-color:#F5F1EE">
                        <div class="media-body ml-2">
                            <img class="d-block img-fluid align-self-end" src="amdin/admin/Blog/images/avatar.png" alt="" style="max-width: 50px; max-height: 50px;">
                            <h6 class="lead"><?php echo $CommenterName; ?> <small class="small" style="font-size: 10px;"><?php echo $CommentDate; ?></small></h6>

                            <p><?php echo $CommentContent; ?></p>
                        </div>
                    </div>

                    <hr style="height:3px;">
                <?php } ?>
                <!--Comments-->
                <div class="">
                    <form class="" action="FullPost.php?id=<?php echo $SearchQueryParameter ?>" method="POST">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="fieldInfo">Share yout thoughts about this posts</h5>
                            </div>
                            <div class="card-body">

                                <div class="form-group mb-4">
                                    <textarea name="CommenterThoughts" class="form-control"></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="Submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--Main Area end-->
            </div>
            <div class="col-sm-4">

                <div style="height: 18vh;"></div>

                <div class="card mt-4 mb-5">
                    <div class="card-body">
                        <img src="admin/Blog/images/cliniqueAd.jpg" class="d-block img-fluid mb-3 rounded-3" alt="Ad">
                        <div class="text-center">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates corrupti praesentium alias similique ut fugit mollitia recusandae tempore nostrum aperiam adipisci repellat cum, neque reiciendis distinctio illum, nisi rem amet.
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-light text-dark">
                        <h2 class="lead">Categories</h2>
                    </div>
                    <div class="card-body">
                        <?php
                        $sql2 = "SELECT * FROM category ORDER BY id DESC";
                        $stmt2 = $ConnectingDB->query($sql2);
                        while ($DataRows = $stmt2->fetch()) {
                            $CategoryId = $DataRows["id"];
                            $CategoryName = $DataRows["title"];

                        ?>
                            <a href="Blog.php?category=<?php echo $CategoryName ?>"> <span class="text-primary"><?php echo $CategoryName; ?></span></a><br>
                        <?php } ?>
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


    <!--MAIN END-->

    <div style="height: 10vh;"></div>
    <?php
    include('partials/footer.php');
    ?>
</body>

</html>