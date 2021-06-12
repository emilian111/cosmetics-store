<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php
if (isset($_POST["Submit"])) {

    $UserName = $_POST['Username'];
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["ConfirmPassword"];

    if (empty($UserName) || empty($Password) || empty($ConfirmPassword)) {
        $_SESSION['ErrorMessage'] = "All fiels must be filled out expect Name";
        Redirect_to("Admin.php");
    } elseif (strlen($Password) < 6) {
        $_SESSION['ErrorMessage'] = "Password should be grater than 2 charachters";
        Redirect_to("Admin.php");
    } elseif ($Password != $ConfirmPassword) {
        $_SESSION['ErrorMessage'] = "Passwords do not match";
        Redirect_to("Admin.php");
    } elseif (CheckUserNameExistOrNot($UserName)) {
        $_SESSION['ErrorMessage'] = "Username exists try another one";
        Redirect_to("Admin.php");
    } else {
        //Query to insert new admin in db when everything is fine
        $sql = "INSERT INTO admins(username,password)";
        //DUMMY NAME
        $sql .= "VALUES(:userName,:password)";
        $stmt = $ConnectingDB->prepare($sql);

        //binding values
        $stmt->bindValue(':userName', $UserName);
        $stmt->bindValue(':password', $Password);

        $Execute = $stmt->execute();
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "New admin added Successfully";
            Redirect_to("Admin.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
            Redirect_to("Admin.php");
        }
    }
}
?>
<?php include("includes/header.php") ?>

<!--MAIN-->


<section class="container py-2 mb-4">
    <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
         
            <form class="" action="Admin.php" method="POST">
                <div class="card bg-secondary text-light mb-3">
                    <div class="card-header">
                        <h1>Add New Admin</h1>
                    </div>
                    <div class="card-body bg-dark">
                        <div class="form-group">
                            <label for="username"><span class="fieldInfo">Username</span></label>
                            <input class="form-control" type="text" id="username" name="Username" value="">

                        </div>

                        <div class="form-group">
                            <label for="Password"><span class="fieldInfo">Password</span></label>
                            <input class="form-control" type="password" id="Password" name="Password" placeholder="Type title here" value="">

                        </div>
                        <div class="form-group">
                            <label for="ConfirmPassword"><span class="fieldInfo">Confirm Password</span></label>
                            <input class="form-control" type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Type title here" value="">

                        </div>
                        <div class="row">
                            <div class="col-lg-6 mb-2">
                                <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"> Dashboard</i></a>
                            </div>
                            <div class="col-lg-6 mb-2">
                                <button type="Submit" name="Submit" class="btn btn-success btn-block">
                                    <i class="fas fa-check"></i>Publish
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <h2>Existin Admins</h2>
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>No.</th>
                        <th>Email </th>

                        <th>Action</th>

                    </tr>
                </thead>
                <?php
                $sql = "SELECT * FROM admins ORDER BY id desc";
                $Execute = $ConnectingDB->query($sql);
                $SrNo = 0;
                while ($DataRows = $Execute->fetch()) {
                    $AdminId = $DataRows["id"];
                    $AdminUsername = $DataRows["username"];
                    $SrNo++;
                ?>
                    <tbody>
                        <tr>
                            <td><?php echo htmlentities($SrNo) ?></td>

                            <td>

                                <?php echo htmlentities($AdminUsername); ?>
                            </td>


                            <td>
                                <a target="_self" class="btn btn-danger" href="DeleteAdmin.php?id=<?php echo $AdminId; ?>">Delete</a>
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