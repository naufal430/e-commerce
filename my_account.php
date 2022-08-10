<?php include('includes/header.php'); ?>

<div class="content-wrapper">
    <?php if(isset($_SESSION['user_id'])) { ?>
        <div class="user-container">
            <div class="user-content">
                <?php 
                if (isset($_GET['action'])) {
                    $action = $_GET['action'];
                } else {
                    $action = '';
                }
  
                switch($action) {
                    case "edit_account";
                    include('users/edit_account.php');
                    break;
  
                    case "edit_profile";
                    include('users/edit_profile.php');
                    break;
  
                    case "user_profile_picture";
                    include('users/user_profile_picture.php');
                    break;
  
                    case "change_password";
                    include('users/change_password.php');
                    break;
  
                    case "delete_account";
                    include('users/delete_account.php');
                    break;
                    
                    case "my_order";
                    include('cart.php');
                    break;
                }
                ?>
  
            </div>
  
            <div class="user-sidebar">
                <?php 
                $run_image = mysqli_query($conn,"SELECT * FROM users WHERE id='$_SESSION[user_id]'");
                $row_image = mysqli_fetch_array($run_image);
  
                if ($row_image['image'] !='') {  
                ?>
                    <div class="user-image" align="center">
                        <img src="uploaded-files/<?php echo $row_image['image']; ?>" />
                    </div>
  
                <?php } else { ?>
                    <div class="user-image" align="center">
                        <img src="images/profile-icon.png" />
                    </div>
  
                <?php } ?>
  
                <ul>
                    <li><a href="my_account.php?action=my_order">My Order</a></li>
	                <li><a href="my_account.php?action=edit_account">Edit Akun</a></li>
	                <li><a href="my_account.php?action=edit_profile">Edit Profil</a></li>
	                <li><a href="my_account.php?action=user_profile_picture">Foto Profil User</a></li>
	                <li><a href="my_account.php?action=change_password">Ganti Password</a></li>
	                <li><a href="my_account.php?action=delete_account">Hapus Akun</a></li>
	                <li><a href="logout.php">Logout</a></li>
                </ul>
  
            </div>
        </div>
  
    <?php } else { ?>
        <h1>Halaman Pengaturan Akun</h1>
        <h5>Mohon <a href="index.php?action=login">Log In </a> Ke Akun Anda!</h5>
    <?php } ?>
</div>
  
<?php include ('includes/footer.php'); ?>