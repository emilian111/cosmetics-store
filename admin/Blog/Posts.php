<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>
<?php include("includes/header.php") ?>
<!--MAIN-->
<section class="container py-2 mb-4">
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date&Time</th>
                        <th>Author</th>
                        <th>Banner</th>
                        <th>Comments</th>
                        <th>Action</th>
                        <th>Live Preview</th>
                    </tr>
                </thead>
                <?php
                $ConnectingDB;
                $sql = "SELECT * FROM posts";
                $stmt = $ConnectingDB->query($sql);
                $Sr = 0;
                while ($DataRows = $stmt->fetch()) {
                    $Id = $DataRows['id'];
                    $DateTime = $DataRows['datetime'];
                    $PostTitle = $DataRows['title'];
                    $Category = $DataRows['category'];
                    $Admin = $DataRows['author'];
                    $Image = $DataRows['image'];
                    $PostText = $DataRows['post'];
                    $Sr++;

                ?>
                    <tbody>
                        <tr>
                            <td><?php echo $Sr ?></td>
                            <td><?php if (strlen($PostTitle) > 18) {
                                    $PostTitle = substr($PostTitle, 0, 18) . "..";
                                } ?>
                                <?php echo $PostTitle; ?>
                            </td>
                            <td>
                                <?php if (strlen($Category) > 8) {
                                    $Category = substr($Category, 0, 8) . "..";
                                } ?>
                                <?php echo $Category; ?>
                            </td>
                            <td>

                                <?php echo $DateTime; ?>
                            </td>
                            <td>
                                <?php if (strlen($Admin) > 6) {
                                    $Admin = substr($Admin, 0, 6) . "..";
                                } ?>
                                <?php echo $Admin; ?>
                            </td>
                            <td><img src="upload/<?php echo $Image; ?>" width="170px" height="50px"></td>
                            <td> Comments</td>
                            <td>
                                <a href="EditPost.php?id=<?php echo $Id; ?>"><span class="btn btn-warning">Edit</span> </a>
                                <a href="DeletePost.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span> </a>
                            </td>
                            <td><a href="../../FullPost.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span> </a></td>
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