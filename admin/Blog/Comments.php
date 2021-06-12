<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php include("includes/header.php") ?>


<!--MAIN-->
<section class="container py-2 mb-4">
    <div class="row" style="min-height: 30px;">
        <div class="col-lg-12" style="min-height: 400px;">
             <h2>Un-Approved Comments</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date&Time</th>
                        <th>Comment</th>
                        <th>Approve</th>
                        <th>Delete</th>
                     
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM comments WHERE status='OFF' ORDER BY id desc";
                $Execute = $ConnectingDB->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                    $CommentId = $DataRows["id"];
                    $DateTimeOfComment = $DataRows["datetime"];
                    $CommenterName = $DataRows["name"];
                    $CommentContent = $DataRows["comment"];
                    $CommentPostId = $DataRows["post_id"];
                    $SrNo++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($SrNo) ?></td>
                            <td>
                                <?php echo htmlentities($CommenterName); ?>
                            </td>
                            <td>

                                <?php echo htmlentities($DateTimeOfComment); ?>
                            </td>
                            <td>

                                <?php echo htmlentities($CommentContent); ?>
                            </td>

                            <td>
                                <a class="btn btn-success" href="ApproveComment.php?id=<?php echo $CommentId; ?>">Approve</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="DeleteComment.php?id=<?php echo $CommentId; ?>">Delete</a>
                            </td>
                           

                            <!-- <td><a href="FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span> </a></td> -->
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <h2>Approved Comments</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Date&Time</th>
                        <th>Comment</th>
                        <th>Revert</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM comments WHERE status='ON' ORDER BY id desc";
                $Execute = $ConnectingDB->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                    $CommentId = $DataRows["id"];
                    $DateTimeOfComment = $DataRows["datetime"];
                    $CommenterName = $DataRows["name"];
                    $CommentContent = $DataRows["comment"];
                    $CommentPostId = $DataRows["post_id"];
                    $SrNo++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($SrNo) ?></td>
                            <td>
                                <?php echo htmlentities($CommenterName); ?>
                            </td>
                            <td>

                                <?php echo htmlentities($DateTimeOfComment); ?>
                            </td>
                            <td>

                                <?php echo htmlentities($CommentContent); ?>
                            </td>

                            <td>
                                <a target="_self" class="btn btn-warning" href="DisApproveComment.php?id=<?php echo $CommentId; ?>">Dis-Approve</a>
                            </td>
                            <td>
                                <a target="_self" class="btn btn-danger" href="DeleteComment.php?id=<?php echo $CommentId; ?>">Delete</a>
                            </td>
                            

                            
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