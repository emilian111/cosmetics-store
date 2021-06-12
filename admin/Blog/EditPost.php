<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php
$SearchQueryParameter = $_GET['id'];
if (isset($_POST["Submit"])) {

    date_default_timezone_set("Europe/London");
    $CurrentTime = time();
    $DateTime = strftime(" %H:%M:%S, %d/%m/%Y", $CurrentTime);


    $PostTitle = $_POST['PostTitle'];
    $Category = $_POST['Category'];
    $Image = $_FILES['Image']['name'];
    $Target = "upload/".basename($_FILES['Image']['name']);
    $PostText = $_POST["PostDescription"];

    $Admin = $_SESSION['$UserName'];
    if (empty($PostTitle)) {
        $_SESSION['ErrorMessage'] = "All fiels must be filled out";
        Redirect_to('Posts.php');
    } elseif (strlen($PostTitle) < 5) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('Posts.php');
    } elseif (strlen($PostText) > 999) {
        $_SESSION['ErrorMessage'] = "Category title should be grater than 2 charachters";
        Redirect_to('Posts.php');
    } else {
        if(!empty($_FILES["Image"]["name"])){
            $sql = "UPDATE posts SET title='$PostTitle', category = '$Category', image='$Image', post='$PostText' WHERE id='$SearchQueryParameter'";

        }else{
            $sql = "UPDATE posts SET title='$PostTitle', category = '$Category', post='$PostText' WHERE id='$SearchQueryParameter'";
        }

        //Query to update post in db when everything is fine
        $Execute = $ConnectingDB->query($sql);
        move_uploaded_file($_FILES["Image"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Post updated Successfully";
            Redirect_to("Posts.php");
        } else {
            $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
            Redirect_to('Posts.php');
        }
    }
}
?>
<?php include("includes/header.php") ?>
    <!--HEADER END-->


    <!--MAIN-->
  
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
                <?php

                $sql = "SELECT * FROM posts  WHERE id='$SearchQueryParameter'";
                $stmt = $ConnectingDB->query($sql);
                while($DataRows= $stmt->fetch()){
                    $TitleToBeUpdated = $DataRows["title"];
                    $CategoryToBeUpdated = $DataRows["category"];
                    $ImageToBeUpdated = $DataRows["image"];
                    $PostToBeUpdated = $DataRows["post"];
                    
                }

                ?>
                <form class="" action="EditPost.php?id=<?php echo $SearchQueryParameter; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="fieldInfo">Post title</span></label>
                                <input class="form-control" type="text" id="title" name="PostTitle" placeholder="Type title here" value="<?php echo $TitleToBeUpdated ?>">
                            </div>
                            <div class="form-group">
                                <br>
                                <span class="fieldInfo">Existing category: </span>
                                <?php echo $CategoryToBeUpdated; ?>
                                <br>
                                <br>
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
                            <br>
                                <span class="fieldInfo">Existing Image: </span>
                                <img class="mb-1" src="upload/<?php echo $ImageToBeUpdated; ?> " style="width: 170px; height: 70px;">
                                <br>
                                <br> 
                                <label for="imageSelect"><span class="fieldInfo">Select Image</span></label>
                                <div class="costum-file mb-3">
                                    <input class="costum-file-input" type="File" name="Image" id="imageSelect" value="">
                                </div>
                            </div>
                            <div class="form-group mb-5">
                                <labe for="Post" class="imageSelect"><span class="fieldInfo">Post Text</span></labe>
                                <textarea class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
                                    <?php echo $PostToBeUpdated;?>
                                </textarea>
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