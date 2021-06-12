<?php
include("partials/connect.php");
?>
<!-- Header -->
<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
	<div class="container d-flex align-items-center justify-content-between">

		<a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

		<nav id="navbar" class="navbar">
			<ul>
				<li><a class="nav-link " href="index.php">Home</a></li>
				<li><a class="nav-link " href="about.php">Rreth nesh</a></li>
				<li><a class="nav-link" href="Blog.php">Blog</a></li>
				<li><a class="nav-link " href="product.php">Shop</a></li>
				<li><a class="nav-link" href="cart.php">Shporta</a></li>
			<l1>

					<?php
					if (!empty($_SESSION['email'])) { ?>

						<a href="handler/customerlogout.php" class="flex-c-m trans-04 p-lr-25">
							Logout
						</a>
					<?php } else { ?>

						<a href="customerforms.php" class="flex-c-m trans-04 p-lr-25">
							Hyr/Regjistrohu
						</a>
					<?php } ?>


				</li>
				

			</ul>
			<i class="bi bi-list mobile-nav-toggle"></i>
		</nav> <!-- .navbar -->

	</div>
</header>
<!-- End Header -->
