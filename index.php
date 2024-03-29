<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/index.css">
    <script src="./script/password.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <main>
        <div class="container">
            <h1>Sign in</h1>
            <span>Greetings and Welcome Back! <br> Please enter your credentials to access your account and <br> dive
                back into your online experience with us.</span>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="sign_in" name="sign_in">
                <div>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password" required />
                    <i class="fa-solid fa-eye-slash active" id="invisible"></i>
                    <i class="fa-solid fa-eye" id="visible"></i>
                </div>
                <div>
                    <input class="btn btn-dark text-light" type="submit" name="submit" id="submit" value="Sign in"
                        class="">
                </div>
            </form>
            <p class="p_sign_in">Don't have an account yet? <a href="./sign-up.php" class="link-primary">Sign-up</a>
            </p>
        </div>
        <?php

        require './includes/connection.php';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM customer_acc_tbl WHERE c_email = '$email'";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                if (password_verify($password, $row['c_password'])) {
                    $_SESSION['id'] = $row['cust_id'];
                    header("location: admin/index.php");
                }
            }
            echo '<span id="err">Invalid credentials. Please check your login details and try again.</span>';
        }

        ?>
    </main>
</body>

</html>