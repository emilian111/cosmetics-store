<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>
<?php

if(isset($_GET['id'])){
    $Admin = $_SESSION["AdminName"];
    $SearchQueryParameter = $_GET["id"];
    $sql = "UPDATE comments SET status='OFF', approvedby='$Admin' WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"] = "Comment dis-approved";
        Redirect_to("Comments.php");
    }else{
        $_SESSION['ErrorMessage'] = "Something went wrong try again";
        Redirect_to("Comments.php");
    }

}
?>