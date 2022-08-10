<div class="login-box">
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <h2>Login</h2>
                    <br/>
                    <h2>
                        Belum Punya Akun? <a href="register.php">Daftar Sekarang</a>
                        <br/><br/>
                    </h2>
                </td>
            </tr>
            <tr class="input-margin">
                <td><h2>Email:</h2></td>
                <td><input type="text" name="email" required placeholder="Email"/></td>
            </tr>
            <tr class="input-margin">
                <td><h2>Password:</h2></td>
                <td><input type="password" name="password" required placeholder="Password"/></td>
            </tr>
            <tr class="input-margin">
                <td></td>
                <td>
                    <a href="checkout.php?forgot_pass">
                        Forgot Password
                    </a>
                    <br/><br/>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="login" value="Login"/>
                </td>
            </tr>
        </table>
    </form>
</div>

<?php

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $password = md5($password);
  
    $run_login = mysqli_query($conn, "SELECT * FROM users WHERE password='$password' AND email='$email' " );
    $check_login = mysqli_num_rows($run_login);
    $row_login = mysqli_fetch_array($run_login);

    if ($check_login === 0) {
        echo "<script>alert('Password atau email yang anda masukkan salah, mohon coba lagi!')</script>";
        exit();
    }

    $ip = get_ip();
    $run_cart = mysqli_query($conn, "SELECT * FROM cart WHERE ip_address='$ip'");
    $check_cart = mysqli_num_rows($run_cart);

    if ($check_login > 0 AND $check_cart == 0) {
        $_SESSION['user_id'] = $row_login['id'];
        $_SESSION['role'] = $row_login['role'];
        $_SESSION['email'] = $email;

        echo "<script>alert('Anda telah berhasil masuk!')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    } else {
        $_SESSION['user_id'] = $row_login['id'];
        $_SESSION['role'] = $row_login['role'];
        $_SESSION['email'] = $email;

        echo "<script>alert('Anda telah berhasil masuk!')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}

?>