<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link rel="stylesheet" href="./styles/index.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- password visibility -->
    <script src=".../" defer></script>
</head>

<body>

    <main>
        <div class="container">
            <h1>Create Account</h1>
            <span>Greetings! To get started, we ask that you <br> carefully enter your details. Thank you! </span>

            <form action=<?= htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" class="sign_up" name="sign_up">
                <div>
                    <input type="text" name="fname" id="fname" placeholder="First Name" required>
                </div>
                <div>
                    <input type="text" name="lname" id="lname" placeholder="Last Name" required>
                </div>
                <div>
                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                </div>
                <div class="passDiv">
                    <input type="password" name="password" id="password" placeholder="Password" minlength="8" required />
                    <i class="fa-solid fa-eye-slash active" id="invisible"></i>
                    <i class="fa-solid fa-eye" id="visible"></i>
                </div>
                <div>
                    <input type="submit" name="submit" id="submit" value="Create Account">
                </div>
            </form>
            <p class="p_sign_up">Already have an account? <a href="./sign-in.php" class="link-primary">Sign-in</a> </p>
        </div>
        <?php

        require_once './includes/connection.php';
        require_once './includes/hash_password.php';

        if (isset($_POST['submit'])) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fname = ucwords($_POST['fname']);
                $lname = ucwords($_POST['lname']);
                $email = $_POST['email'];
                $passw = $_POST['password'];

                $sql = 'SELECT c_email FROM customer_acc_tbl';
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    if ($row['c_email'] === $email) {
                        echo '<span class="link-danger">Email already exists</span>';
                        return;
                    }
                }

                $hashPassword = hash_password($passw);

                $sql = "INSERT INTO customer_acc_tbl (c_fname, c_lname, c_email, c_password) VALUES ('$fname', '$lname', '$email', '$hashPassword');";

                if ($conn->query($sql) === true) {
                    echo '<span class="link-success">Account Added</span>';
                } else {
                    echo "ERROR";
                }
                $conn->close();
            }
        }

        ?>
    </main>

</body>

</html>