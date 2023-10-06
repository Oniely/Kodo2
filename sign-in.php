<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./styles/index.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="anime.min.js"></script>
    <script src="./script/password.js" defer></script>
</head>

<body>

    <main>

        <div class="container">
            <h1>Sign in</h1>
            <span>Greetings and Welcome Back! <br> Please enter your credentials to access your account and <br> dive back into your online experience with us.</span>

            <form action=<?= htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="sign_in" name="sign_in">
                <div>
                    <input type="text" name="email" id="email" placeholder="Email Address">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password" />
                    <i class="fa-solid fa-eye-slash active" id="invisible"></i>
                    <i class="fa-solid fa-eye" id="visible"></i>
                </div>
                <div>
                    <input type="submit" name="submit" id="submit" value="Sign in" class="">
                </div>
            </form>
            <p class="p_sign_in">Don't have an account yet? <a href="./sign-up.php" class="link-primary">Sign-up</a> </p>
        </div>
        <?php

        require_once './includes/connection.php';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = 'SELECT c_email, c_password FROM customer_acc_tbl';
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                if ($row['c_email'] === $email && $row['c_password'] === $password) {
                    $_SESSION['id'] = $row['cust_id'];
                    header('Location: home.php');
                }
            }
            echo '<span class="link-danger">Invalid credentials. Please check your login details and try again.</span>';
        }

        ?>
    </main>
</body>

</html>