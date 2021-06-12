<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>
<?php

if(isset($_GET['id'])){
    
    $SearchQueryParameter = $_GET["id"];
    $sql = "DELETE  FROM comments WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"] = "Comment deleted";
        Redirect_to("Comments.php");
    }else{
        $_SESSION['ErrorMessage'] = "Something went wrong try again";
        Redirect_to("Comments.php");
    }

}
?>