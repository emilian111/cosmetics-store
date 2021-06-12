<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php
if (isset($_POST["Submit"])) {

    date_default_timezone_set("Europe/London");
    $CurrentTime = time();
    $DateTime = strftime(" %H:%M:%S, %d/%m/%Y", $CurrentTime);


    $Category = $_POST['CategoryTitle'];
    $Admin = $_SESSION['email_admin'];
    if (empty($Category)) {
        $_SESSION['ErrorMessage'] = "All fiels must be filled out";
        Redirect_to('Categories.php');
    } elseif (strlen($Category) < 2) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('Categories.php');
    } elseif (strlen($Category) > 49) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('Categories.php');
    } else {
        //Query to insert category in db when everything is fine
        $sql = "INSERT INTO category(title,author,datetime)";
        //DUMMY NAME
        $sql .= "VALUES(:categoryName,:adminName,:dateTime)";
        $stmt = $ConnectingDB->prepare($sql);

        //binding values
        $stmt->bindValue(':categoryName',$Category);
        $stmt->bindValue(':adminName',$Admin);
        $stmt->bindValue(':dateTime',$DateTime);
        $Execute = $stmt->execute();
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Category with id : " .$ConnectingDB->lastInsertId()." Added Successfully";
            Redirect_to("Categories.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
            Redirect_to('Categories.php');
        }
    }
}
?>
<?php include("includes/header.php") ?>

<!--MAIN-->

    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
               
                <form class="" action="Categories.php" method="POST">
                    <div class="card bg-secondary text-light mb-3">
                        <div class="card-header">
                            <h1>Add New Category</h1>
                        </div>
                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="fieldInfo">Category title</span></label>
                                <input class="form-control" type="text" id="CategoryTitle" name="CategoryTitle" placeholder="Type title here" value="">

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"> Back to dashboard</i></a>
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
                <h2>Existin Categories</h2>
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Date&Time</th>
                                <th>Category Name</th>
                                <th>Creator Name</th>
                                <th>Action</th>
                           
                            </tr>
                        </thead>
                        <?php
                        $sql = "SELECT * FROM category ORDER BY id desc";
                        $Execute = $ConnectingDB->query($sql);
                        $SrNo = 0;
                        while ($DataRows = $Execute->fetch()) {
                            $CategoryId = $DataRows["id"];
                            $CategoryDate = $DataRows["datetime"];
                            $CategoryName = $DataRows["title"];
                            $CreatorName = $DataRows["author"];
                            $SrNo++;
                        
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo htmlentities($SrNo) ?></td>
                                <td>
                                    <?php echo htmlentities($CategoryDate); ?>
                                </td>
                                <td>
                                    
                                    <?php echo htmlentities($CategoryName ); ?>
                                </td>
                                <td>
                                  
                                    <?php echo htmlentities($CreatorName  ); ?>
                                </td>
                             
                                <td>
                                <a target="_self" class="btn btn-danger" href="DeleteCategory.php?id=<?php echo $CategoryId; ?>">Delete</a>
                                </td>
                  
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
            </div>
        </div>
    </section>
<!--FOOTER-->
<?php include("includes/footer.php") ?>