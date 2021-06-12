<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php
if (isset($_POST["Submit"])) {

    date_default_timezone_set("Europe/London");
    $CurrentTime = time();
    $DateTime = strftime(" %H:%M:%S, %d/%m/%Y", $CurrentTime);


    $PostTitle = $_POST['PostTitle'];
    $Category = $_POST['Category'];
    $Image = $_FILES['Image']['name'];
    $Target = "upload/".basename($_FILES['Image']['name']);
    $PostText = $_POST["PostDescription"];

    $Admin = $_SESSION['email_admin'];
    if (empty($PostTitle)) {
        $_SESSION['ErrorMessage'] = "All fiels must be filled out";
        Redirect_to('AddNewPost.php');
    } elseif (strlen($PostTitle) < 5) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('AddNewPost.php');
    } elseif (strlen($PostText) > 999) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('AddNewPost.php');
    } else {
        //Query to insert category in db when everything is fine
        $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
        //DUMMY NAME
        $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)";
        $stmt = $ConnectingDB->prepare($sql);

        //binding values
        $stmt->bindValue(':dateTime', $DateTime);
        $stmt->bindValue(':postTitle',$PostTitle);
        $stmt->bindValue(':categoryName', $Category);
        $stmt->bindValue(':adminName', $Admin);
        $stmt->bindValue(':imageName', $Image);
        $stmt->bindValue(':postDescription',$PostText);
        
        $Execute = $stmt->execute();
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Category with id : " . $ConnectingDB->lastInsertId() . " Added Successfully";
            Redirect_to("AddNewPost.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
            Redirect_to('AddNewPost.php');
        }
    }
}
?>
<?php include("includes/header.php") ?>




    <!--MAIN-->

    <!--MAIN END-->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
               
                <form class="" action="AddNewPost.php" method="POST" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="fieldInfo">Post title</span></label>
                                <input class="form-control" type="text" id="title" name="PostTitle" placeholder="Type title here" value="">
                            </div>
                            <div class="form-group">
                                <label for="CategoryTitle"><span class="fieldInfo">Chose Category</span></label>
                                <select class="form-control" id="CategoryTitle" name="Category">
                                    <?php
                                    $sql="SELECT * FROM category";
                                    $stmt = $ConnectingDB->query($sql);
                                    while($DateRows = $stmt->fetch()){
                                        $Id = $DateRows["id"];
                                        $CategoryName = $DateRows["title"];

                                    
                                    ?>
                                    <option><?php  echo $CategoryName; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imageSelect"><span class="fieldInfo">Select Image</span></label>
                                <div class="costum-file mb-3">
                                    <input class="costum-file-input" type="File" name="Image" id="imageSelect" value="">
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <labe for="Post" class="imageSelect"><span class="fieldInfo">Post Text</span></labe>
                                <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80"></textarea>
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
            </div>
        </div>
    </section>

     <!--FOOTER-->
     <?php include("includes/footer.php") ?>