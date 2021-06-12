<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>


<?php include("includes/header.php") ?>

<!--MAIN-->


<section class="container py-2 mb-4">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">

        
            <h2>Users</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Email </th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM customers ORDER BY id desc";
                $Execute = $ConnectingDB->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                    $UserId = $DataRows["id"];
                    $Username = $DataRows["username"];
                    $SrNo++;
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($SrNo) ?></td>

                            <td>

                                <?php echo htmlentities($Username); ?>
                            </td>


                            <td>
                                <a target="_self" class="btn btn-danger" href="DeleteUsers.php?id=<?php echo $UserId; ?>">Delete</a>
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