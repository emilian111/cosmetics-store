<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>
<?php

if(isset($_GET['id'])){
    
    $SearchQueryParameter = $_GET["id"];
    $sql = "DELETE  FROM admins WHERE id='$SearchQueryParameter'";
    $Execute = $ConnectingDB->query($sql);
    if($Execute){
        $_SESSION["SuccessMessage"] = "Admin deleted";
        Redirect_to("Admin.php");
    }else{
        $_SESSION['ErrorMessage'] = "Something went wrong try again";
        Redirect_to("Admin.php");
    }

}
?>