<?php include('includes/header.php'); ?>

	<div class="menubar">
    	<ul id="menu">
	  		<li><a href="all_products.php">All Products</a></li>
	  		<li><a href="my_account.php">My Account</a></li>
	  		<li><a href="cart.php">Shopping Cart</a></li>
			
		</ul>
	</div>

  	<div class="content-wrapper">
  		<?php if(!isset($_GET['action'])){ ?>
  
    		<div id="sidebar">
	  			<div id="sidebar-title">Kategori</div>
	  			<ul id="cats">		
					<?php getCats();?>
	  			</ul>
	  			<div id="sidebar-title">Merk</div>
	  			<ul id="cats">
	    			<?php getBrands();?>
	  			</ul>
			</div>	
	
			<div id="content-area">
				<?php cart();?>
	  			<div id="products-box">	    
					<?php getPro();?>
					<?php get_pro_by_cat_id();	?>		
					<?php get_pro_by_brand_id(); ?>		
	  			</div>
			</div>
	
		<?php } else { ?>
			<?php 
			include('login.php');
		} 
		?>
	
  	</div>
  
  <?php include ('includes/footer.php'); ?>