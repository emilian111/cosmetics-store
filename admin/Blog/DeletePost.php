<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<?php
$SearchQueryParameter = $_GET["id"];

$sql = "SELECT * FROM posts  WHERE id='$SearchQueryParameter'";
$stmt = $ConnectingDB->query($sql);
while ($DataRows = $stmt->fetch()) {
    $TitleToBeDeleted= $DataRows["title"];
    $CategoryToBeDeleted= $DataRows["category"];
    $ImageToBeDeleted = $DataRows["image"];
    $PostToBeDeleted= $DataRows["post"];
}

if (isset($_POST["Submit"])) {

    //Query to Delete post in db when everything is fine
    $sql = "DELETE FROM posts WHERE  id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
  
    if ($Execute) {
        $Target_Path_To_Delete_Image ="upload/$ImageToBeDeleted";
        unlink( $Target_Path_To_Delete_Image); 

        $_SESSION["SuccessMessage"] = "Post Deleted Successfully";
        Redirect_to("Posts.php");
    } else {
        $_SESSION['ErrorMessage'] = "Something went wrong. Try again";
        Redirect_to('Posts.php');
    }
}
?>
<?php include("includes/header.php") ?>
    <!--MAIN-->

 
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-lg-1 col-lg-10" style="min-height: 400px;">
                <?php echo ErrorMessage();
                echo SuccessMessage();

      

                ?>
                <form class="" action="DeletePost.php?id=<?php echo $SearchQueryParameter; ?>" method="POST" enctype="multipart/form-data">
                    <div class="card bg-secondary text-light mb-3">

                        <div class="card-body bg-dark">
                            <div class="form-group">
                                <label for="title"><span class="fieldInfo">Post title</span></label>
                                <input disabled class="form-control" type="text" id="title" name="PostTitle" placeholder="Type title here" value="<?php echo $TitleToBeDeleted?>">
                            </div>
                            <div class="form-group">
                                <br>
                                <span class="fieldInfo">Existing category: </span>
                                <?php echo $CategoryToBeDeleted; ?>
                                <br>
                                <br>

                            </div>
                            <div class="form-group">
                                <br>
                                <span class="fieldInfo">Existing Image: </span>
                                <img class="mb-1" src="upload/<?php echo $ImageToBeDeleted; ?> " style="width: 170px; height: 70px;">
                                <br>

                            </div>
                            <div class="form-group mb-5">
                                <labe for="Post" class="imageSelect"><span class="fieldInfo">Post Text</span></labe>
                                <textarea disabled class="form-control" id="Post" name="PostDescription" rows="8" cols="80">
                                    <?php echo $PostToBeDeleted; ?>
                                </textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-2">
                                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"> Back to dashboard</i></a>
                                </div>
                                <div class="col-lg-6 mb-2">
                                    <button type="Submit" name="Submit" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash"></i>Delete
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