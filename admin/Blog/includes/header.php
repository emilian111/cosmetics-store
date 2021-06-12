<?php require_once("includes/dp.php") ?>
<?php require_once("includes/Sessions.php") ?>
<?php require_once("includes/Functions.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://kit.fontawesome.com/ca76f0c74e.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

     

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapseCMS"></div>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="Dashboard.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="Posts.php" class="nav-link">Posts</a>
                </li>
                <li class="nav-item">
                    <a href="Categories.php" class="nav-link">Categories</a>
                </li>
                <li class="nav-item">
                    <a href="Admin.php" class="nav-link">Mange Admins</a>
                </li>
                <li class="nav-item">
                    <a href="Users.php" class="nav-link">Mange Users</a>
                </li>
                <li class="nav-item">
                    <a href="Comments.php" class="nav-link">Comments</a>
                </li>
                <li class="nav-item">
                    <a href="../adminindex.php" class="nav-link">ShopAdmin</a>
                </li>
              
               
            </ul>
         
        </div>
        </div>
    </nav>
    <!--NAVBAR END-->

    <!--HEADER-->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i class="fas fa-cog" style="color: #27aae1;"></i>Dashboard</h1>
                </div>
                <div class="col-lg-3 mb-2">
                    <a href="AddNewPost.php" class="btn btn-primary btn block">
                        <i class="fas fa-edit"></i>Add New Post
                    </a>
                </div>
                <div class="col-lg-3 mb-2">
                    <a href="Categories.php" class="btn btn-info btn block">
                        <i class="fas fa-folder-plus"></i>Add New Category
                    </a>
                </div>
                <div class="col-lg-3 mb-2">
                    <a href="Admin.php" class="btn btn-warning btn block">
                        <i class="fas fa-user-plus"></i>Add New Admin
                    </a>
                </div>
                <div class="col-lg-3 mb-2">
                    <a href="Comments.php" class="btn btn-success btn block">
                        <i class="fas fa-check"></i>Approve Comments
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!--HEADER END-->