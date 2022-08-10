<?php include('includes/header.php'); ?>

<div class="menubar">
    	<ul id="menu">
	  		<li><a href="all_products.php">All Products</a></li>
	  		<li><a href="my_account.php">My Account</a></li>
	  		<li><a href="cart.php">Shopping Cart</a></li>
			<li><a href="logout.php">Logout</a></li>
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
	
	<div id="content-area">
	    <div id="products-box">
	    
		    <?php 
		
		    $get_pro = "SELECT * FROM produk ";
		    $run_pro = mysqli_query($conn, $get_pro);
		
		    while ($row_pro = mysqli_fetch_array($run_pro)) {
		        $pro_id = $row_pro['id_produk'];
		        $pro_cat = $row_pro['kategori_produk'];
		        $pro_brand = $row_pro['merk_produk'];
		        $pro_title = $row_pro['judul_produk'];
		        $pro_price = $row_pro['harga_produk'];
		        $pro_image = $row_pro['image_produk'];
		  
		  
		        echo "
		            <div id='single-product'>
			            <h3>$pro_title</h3>
				        <img src='admin/images_produk/$pro_image' width='180' height='180' />
				
				        <p><b> Harga: Rp. $pro_price </b></p>
				
				        <a href='details.php?pro_id=$pro_id'>Details</a>
				
				        <a href='index.php?add_cart=$pro_id'>
				            <button style='float:right'>Add to Cart</button>
				        </a>
			        </div>
		        ";
		    }
		    ?>
		    <?php get_pro_by_cat_id();	?>
		    <?php get_pro_by_brand_id(); ?>
	    </div>
    </div>
</div>
  
<?php include ('includes/footer.php'); ?>