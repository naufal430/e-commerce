<?php include('includes/header.php'); ?>

<div class="menubar">
    <ul id="menu">
	    <li><a href="index.php">Home</a></li>
	    <li><a href="all_products.php">All Products</a></li>
	    <li><a href="my_account.php">My Account</a></li>
	    <li><a href="cart.php">Shopping Cart</a></li>
	</ul>
</div>

<div class="content-wrapper">
    <div id="sidebar">
	    <div id="sidebar-title">Kategori</div>
	    <ul id="cats">
		    <?php getCats(); ?>
	    </ul>
	  
	    <div id="sidebar-title">Merk</div>
	    <ul id="cats">
	        <?php getBrands(); ?>
	    </ul>
	  
	</div>

<div class="content-wrapper">	  
	<?php 	  
    if (!isset($_SESSION['user_id'])) {
	    include('login.php');
	} else {
	    include('payment.php');
	} 
	?>
</div>
 
<?php include ('includes/footer.php'); ?>