<?php

session_start();
if (isset($_SESSION['msg'])) {
    $msg = $_SESSION['msg'];
    session_destroy();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="./styles/index.css">
    <script src="./script/password.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <main>
        <div class="container">
            <h1>Create Account</h1>
            <span>Greetings! To get started, we ask that you <br> carefully enter your details. Thank you! </span>

            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="sign_up" name="sign_up">
                <div>
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>
                <div>
                    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <div>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="passDiv">
                    <input type="password" name="password" id="password" placeholder="Password" minlength="8"
                        required />
                    <i class="fa-solid fa-eye-slash active" id="invisible"></i>
                    <i class="fa-solid fa-eye" id="visible"></i>
                </div>
                <div>
                    <input type="submit" name="submit" id="submit" value="Create Account">
                </div>
            </form>
            <p class="p_sign_up">Already have an account? <a href="./index.php" class="link-primary">Sign-in</a> </p>
        </div>
        <?= @$msg ?>
        <?php

        require './includes/hash_password.php';
        require "./includes/connection.php";

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];


            $sql = "SELECT * FROM customer_acc_tbl WHERE c_email = '$email'";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                if ($email === $row['c_email']) {
                    echo "<span id='err'>Account already exists</span>";
                    die();
                }
            }

            $hashPassword = hash_password($password);

            $sql = "INSERT INTO customer_acc_tbl (c_fname, c_lname, c_email, c_password) VALUES ('$fname', '$lname', '$email', '$hashPassword')";

            if ($conn->query($sql)) {
                $_SESSION['msg'] = "<span id='success'>Account created successfully.</span>";
                header('location: sign-up.php');
            } else {
                die("Error");
            }

        }

        ?>
    </main>
</body>

</html>