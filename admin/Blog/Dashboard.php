<?php
include('includes/Sessions.php');
include('includes/header.php');
?>


    <!--MAIN-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="col-lg-2">
                <div class="card text-center bg-danger text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead"> Posts</h1>
                        <h4 class="display-5"><i class="fab fa-readme"></i>
                            <?php
                            $sql = "SELECT COUNT(*) FROM posts";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalPosts = array_shift($TotalRows);
                            echo $TotalPosts;
                            ?>
                        </h4>
                    </div>
                </div>
                <div class="card text-center bg-danger text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead"> Categories</h1>
                        <h4 class="display-5"><i class="fas fa-folder "></i>
                            <?php
                            $sql = "SELECT COUNT(*) FROM category";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalCategories = array_shift($TotalRows);
                            echo $TotalCategories;
                            ?>

                        </h4>
                    </div>
                </div>

                <div class="card text-center bg-danger text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead"> Admins</h1>
                        <h4 class="display-5"><i class="fas fa-users"></i>
                            <?php
                            $sql = "SELECT COUNT(*) FROM admins";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalAdmins = array_shift($TotalRows);
                            echo $TotalAdmins;
                            ?>
                        </h4>
                    </div>
                </div>
                <div class="card text-center bg-danger text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead"> Comments</h1>
                        <h4 class="display-5"><i class="fas fa-comments"></i>
                            <?php
                            $sql = "SELECT COUNT(*) FROM comments";
                            $stmt = $ConnectingDB->query($sql);
                            $TotalRows = $stmt->fetch();
                            $TotalComments = array_shift($TotalRows);
                            echo $TotalComments;
                            ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-lg-10">
                <h1>Top Posts</h1>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <th>No.</th>
                        <th>Title</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Comments</th>
                        <th>Details</th>
                    </thead>
                    <?php
                    $SrNo = 0;
                    $sql = "SELECT *  FROM posts ORDER BY id desc LIMIT 5";
                    $stmt = $ConnectingDB->query($sql);
                    while ($DataRows = $stmt->fetch()) {
                        $PostId = $DataRows["id"];
                        $DateTime = $DataRows["datetime"];
                        $Author = $DataRows["author"];
                        $Title = $DataRows["title"];
                        $SrNo++;

                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $SrNo ?></td>
                                <td><?php echo $Title ?></td>
                                <td><?php echo $DateTime ?></td>
                                <td><?php echo $Author ?></td>
                                <td>
                                    <span class="badge badge-success">
                                        <?php
                                        $sql1 = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='ON'";
                                        $stmt1 = $ConnectingDB->query($sql1);
                                        $TotalRows = $stmt1->fetch();
                                        $TotalComments = array_shift($TotalRows);
                                        echo $TotalComments; ?>
                                    </span>
                                    <span class="badge badge-danger">
                                    <?php
                                        $sql2 = "SELECT COUNT(*) FROM comments WHERE post_id='$PostId' AND status='OFF'";
                                        $stmt2 = $ConnectingDB->query($sql2);
                                        $TotalRows = $stmt2->fetch();
                                        $TotalComments = array_shift($TotalRows);
                                        echo $TotalComments; 
                                    ?>
                                    </span>
                                </td>
                                <td><a target="_blank" href="FullPost.php?id=<?php echo $PostId ?>">
                                        <span class="btn btn-info">Preview</span></a></td>

                            </tr>

                        </tbody>
                    <?php } ?>
                </table>

            </div>
        </div>



    </section>
    <!--MAIN END-->


    <!--FOOTER-->
    <?php include("includes/footer.php") ?>