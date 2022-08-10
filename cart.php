<?php include('includes/header.php'); ?>

<div class="menubar">
    <ul id="menu">
	    <li><a href="index.php">Home</a></li>
	    <li><a href="all_products.php">All Products</a></li>
	    <li><a href="my_account.php">My Account</a></li>
	    <li><a href="cart.php">Shopping Cart</a></li>
	</ul>
</div>>

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
	    <div class="shopping-cart-container">
	        <div id="shopping-cart" align="right" style="padding:15px">
	            <?php 
	            if (isset($_SESSION['customer_email'])) {
		            echo "<b>Email Anda:</b>" . $_SESSION['customer_email'];
		        } else {
		            echo "";
		        }
	  
	            ?>
	  
	            <b style="color:navy">Keranjang Anda - </b> Total Barang: <?php total_items();?> Harga Total: <?php total_price(); ?>
	        </div>
	   
	        <form action="" method="post" enctype="multipart/form-data">
	            <table align="center" width="100%">
	                <tr align="center">
		                <th>Hapus</th>
		                <th>Produk</th>
		                <th>Banyak</th>
		                <th>Harga</th>
		            </tr>
		 
	                <?php 
		            $total = 0;
                    $ip = get_ip();
   
                    $run_cart = mysqli_query($conn, "SELECT * FROM cart WHERE ip_address='$ip' ");
   
                    while ($fetch_cart = mysqli_fetch_array($run_cart)) {
	                    $product_id = $fetch_cart['id_produk'];
	                    $result_product = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$product_id'");
	   
                        while ($fetch_product = mysqli_fetch_array($result_product)) {
		                    $product_price = array($fetch_product['harga_produk']);
                            $product_title = $fetch_product['judul_produk'];
                            $product_image = $fetch_product['image_produk'];
                            $sing_price = $fetch_product['harga_produk'];
		                    $values = array_sum($product_price);
		
		
		
		                    $run_qty = mysqli_query($conn, "SELECT * FROM cart WHERE id_produk = '$product_id'");
		                    $row_qty = mysqli_fetch_array($run_qty);
		                    $qty = $row_qty['qty'];
		                    $values_qty = $values * $qty;
		                    $total += $values_qty;
                    ?>
		            <tr align="center">
		                <td><input type="checkbox" name="remove[]" value="<?php echo $product_id;?>"/></td>
		                <td>
		                    <?php echo $product_title; ?>
		                    <br/>
		                    <img src="admin/images_produk/<?php echo $product_image; ?> "/>
		                </td>
		                <td><input type="text" size="4" name="qty" value="<?php echo $qty; ?>"/></td>
		                <td><?php echo "Rp." . $sing_price; ?></td>
		            </tr>
	   
                    <?php
                        } 
                    } 
                    ?> 
         
		            <tr>
		                <td colspan="4" align="right"><b>Sub Total:</b></td>
		                <td><?php echo  total_price(); ?> </td>
		            </tr>
	
	                <tr align="center">
		                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart" /></td>
		                <td><input type="submit" name="continue" value="Continue Shopping" /></td>
		                <td><button><a href="checkout.php">Checkout</a></td>
		            </tr>
	            </table>
	        </form>
	   
	        <?php 
	        if (isset($_POST['remove'])) {
		        foreach($_POST['remove'] as $remove_id) {
		            $run_delete = mysqli_query($conn,"DELETE FROM cart WHERE id_produk = '$remove_id' AND ip_address='$ip' ");
		 
		            if($run_delete){
		                echo "<script>window.open('cart.php','_self')</script>";
		            }
		        }
	        }    
	   
	        if (isset($_POST['continue'])) {
	            echo "<script>window.open('index.php','_self')</script>";
	        }
	        ?>
	   
	    </div>
	    <div id="products_box"></div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>