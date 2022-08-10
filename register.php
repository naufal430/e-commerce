<?php include("includes/header.php"); ?>

<div class="content-wrapper">
    <script>
        $(document).ready(function() {
            $("#password_confirm2").on('keyup', function() {
                var password_confirm1 = $("#password_confirm1").val();
                var password_confirm2 = $("#password_confirm2").val();

                if (password_confirm1 == password_confirm2) {
                    $("#status_for_confirm_password").html('<strong style="color:green">Password Sama</strong>');
                } else {
                    $("#status_for_confirm_password").html('<strong style="color:red">Password Tidak Sama</strong>');
                }
            });
        });
    </script>

    <div class="register-box">
        <form method="post" action="" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        <h2>Register</h2>
                        <br/>
                        <h2>
                            Sudah Punya Akun? <a href="index.php?action=login">Login Sekarang.</a>
                            <br/><br/>
                        </span>
                    </td>
                </tr>
                <tr class="input-margin">
                    <td><h2>Name:</h2></td>
                    <td><input type="text" name="name" required placeholder="Name"/></td>
                </tr>
                <tr class="input-margin">
                    <td><h2>Email:</h2></td>
                    <td><input type="text" name="email" required placeholder="Email"/></td>
                </tr>
                <tr class="input-margin">
                    <td><h2>Password:</h2></td>
                    <td><input type="password" id="password_confirm1" name="password" required placeholder="Password"/></td>
                </tr>
                <tr class="input-margin">
                    <td><h2>Konfirmasi Password:</h2></td>
                    <td>
                        <input type="password" id="password_confirm2" name="confirm_password" required placeholder="Confirm Password"/>
                        <p id="status_for_confirm_password"></p>
                    </td>
                </tr>
                <tr class="input-margin" id="h2image">
                    <td><h2>Image:</h2></td>
                    <td><input type="file" name="image"/></td>
                </tr>
                <tr class="input-margin">
                    <td><h2>Nomor Telepon:</h2></td>
                    <td><input type="text" name="notel" required placeholder="No Telepon"/></td>
                </tr>
                <tr class="input-margin">
                    <td></td>
                    <td>
                        <input type="submit" name="register" value="Register"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
        if (isset($_POST['register'])) {
            if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['name'])) {
                $ip = get_ip();
                $name = $_POST['name'];
                $email = trim($_POST['email']);
                $password = trim($_POST['password']);
                $hash_password = md5($password);
                $connfirm_password = trim($_POST['confirm_password']);
   
                $image = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                $notel = $_POST['notel'];

                $check_exist = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
                $email_count = mysqli_num_rows($check_exist);
                $row_register = mysqli_fetch_array($check_exist);

                if ($email_count > 0) {
                    echo "<script>alert('Maaf, email anda $email telah ada di database kami!')</script>";
                } elseif ($row_register['email'] !=$email && $password == $connfirm_password) {
                    move_uploaded_file($image_tmp,"../uploaded-files/$image");

                    $run_insert = mysqli_query($conn,"INSERT INTO users (ip_address, name, email, password, notel, image) values ('$ip', '$name', '$email', '$hash_password', '$notel', '$image')");
                
                    if ($run_insert) {
                        $sel_user = mysqli_query($conn,"select * from users where email='$email' ");
	                    $row_user = mysqli_fetch_array($sel_user);
	
	                    $_SESSION['user_id'] = $row_user['id'] ."<br>";
	                    $_SESSION['role'] = $row_user['role'];
                    }

                    $run_cart = mysqli_query($conn,"SELECT * FROM cart WHERE ip_address='$ip'");
                    $check_cart = mysqli_num_rows($run_cart);
                    
                    if ($check_cart == 0) {
                        $_SESSION['email'] = $email;
	                    echo "<script>alert('Akun Anda Berhasil Dibuat!')</script>";
	                    echo "<script>window.open('my_account.php','_self')</script>";
                    } else {
                        $_SESSION['email'] = $email;
	                    echo "<script>alert('Akun Anda Berhasil Dibuat!')</script>";
	                    echo "<script>window.open('checkout.php','_self')</script>";
                    }
                }
            }
        }
    ?>
</div>

<?php include("includes/footer.php"); ?>