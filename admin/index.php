<?php
session_start();

if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header('location: ../index.php');
    exit();
}

require "../includes/connection.php";

$userId = $_SESSION['id'];
$sql = "SELECT * FROM customer_acc_tbl WHERE cust_id=$userId";
$result = $conn->query($sql)->fetch_assoc();

$c_fname = $result['c_fname'];
$c_lname = $result['c_lname'];
$c_email = $result['c_email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Southland College ISI</title>
    <link rel="stylesheet" href="../styles/admin.css">
    <script src="../script/profile_nav.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
        integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
</head>

<body>
    <main class="container">
        <aside>
            <div class="logo">
                <div class="img_container">
                    <img src="../img/sc-logo.png" alt="logo">
                </div>
                <h1>Southland College</h1>
            </div>
            <ul>
                <li>
                    <i class="fas fa-home"></i>
                    <a href="./dashboard.php">Dashboard</a>
                </li>
                <li>
                    <i class="fas fa-user-graduate"></i>
                    <a class="active" href="">Student</a>
                </li>
                <li>
                    <i class="fas fa-chalkboard-teacher"></i>
                    <a href="">Teacher</a>
                </li>
                <li>
                    <i class="fas fa-chart-bar"></i>
                    <a href="">Charts</a>
                </li>
                <li>
                    <i class="far fa-calendar-check"></i>
                    <a href="">Schedules</a>
                </li>
                <li>
                    <i class="fas fa-credit-card"></i>
                    <a href="">Payment</a>
                </li>
                <li>
                    <i class="fas fa-file-signature"></i>
                    <a href="">Reports</a>
                </li>
            </ul>
        </aside>
        <section>
            <header>
                <div>
                    <h1>Student Details</h1>
                    <div class="button_container">
                        <a href="https://www.google.com/webhp" target="_blank">
                            <i class="fas fa-search"></i>
                        </a>
                        <button>
                            <i class="far fa-moon"></i>
                        </button>
                        <button id="fullscreen">
                            <i class="fas fa-expand"></i>
                        </button>
                        <a href="https://mail.google.com/chat/" target="_blank">
                            <i class="far fa-comments"></i>
                        </a>
                        <button>
                            <i class="far fa-bell"></i>
                        </button>
                        <button>
                            <i class="fas fa-cog"></i>
                        </button>
                        <button class="img_container" id="profile_nav">
                            <img src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg" alt="img">
                            <div class="dropdown_nav">
                                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M528 160V416c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80H176c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16V160H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM272 256a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm104-48c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                    </svg> Profile</a>

                                <a href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                        viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M320 32c0-9.9-4.5-19.2-12.3-25.2S289.8-1.4 280.2 1l-179.9 45C79 51.3 64 70.5 64 92.5V448H32c-17.7 0-32 14.3-32 32s14.3 32 32 32H96 288h32V480 32zM256 256c0 17.7-10.7 32-24 32s-24-14.3-24-32s10.7-32 24-32s24 14.3 24 32zm96-128h96V480c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32s-14.3-32-32-32H512V128c0-35.3-28.7-64-64-64H352v64z" />
                                    </svg> Logout</a>
                            </div>
                        </button>
                    </div>
                </div>
            </header>

            <main>
                <div class="main_left">
                    <div class="profile_card">
                        <div class="top">
                            <div class="orange"></div>
                            <div class="red"></div>
                        </div>
                        <div class="bottom">
                            <div class="img_container">
                                <img src="https://st3.depositphotos.com/6672868/13701/v/450/depositphotos_137014128-stock-illustration-user-profile-icon.jpg"
                                    alt="img">
                                <div>
                                    <h1>
                                        <?= @$c_fname . " " . @$c_lname ?>
                                    </h1>
                                    <span>Student</span>
                                </div>
                            </div>
                            <div class="info_container">
                                <div class="info">
                                    <div class="icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="desc">
                                        <span>Guardian:</span>
                                        <h2>
                                            <?= @$c_lname ?> Family
                                        </h2>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="desc">
                                        <span>Address:</span>
                                        <h2>
                                            <?= @$c_lname ?> City
                                        </h2>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="desc">
                                        <span>Phone:</span>
                                        <h2>+63 9123456789</h2>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="icon">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="desc">
                                        <span>Email:</span>
                                        <h2>
                                            <?= @$c_email ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_right">
                    <div class="schedule_details">
                        <h3>Schedule Details</h3>
                        <p>Wednesday, October 18, 2023</p>
                    </div>

                    <div class="subject">
                        <div class="title">
                            <h3>Basic Sex Ed</h3>
                            <span>Sex Education Mandatory</span>
                        </div>
                        <div class="desc">
                            <div class="datetime">
                                <p><i class="far fa-calendar"></i> October 18, 2023</p>
                                <p><i class="far fa-clock"></i> 06:00 - 12:00</p>
                            </div>
                            <div class="img_container">
                                <img src="https://akademi.dexignlab.com/xhtml/images/user.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="title">
                            <h3>Physical Fitness</h3>
                            <span>PE</span>
                        </div>
                        <div class="desc">
                            <div class="datetime">
                                <p><i class="far fa-calendar"></i> October 18, 2023</p>
                                <p><i class="far fa-clock"></i> 13:00 - 16:00</p>
                            </div>
                            <div class="img_container">
                                <img src="https://akademi.dexignlab.com/xhtml/images/contacts/3.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="title">
                            <h3>Fundamentals of Programming</h3>
                            <span>Computer Science</span>
                        </div>
                        <div class="desc">
                            <div class="datetime">
                                <p><i class="far fa-calendar"></i> October 18, 2023</p>
                                <p><i class="far fa-clock"></i> 18:01 - 21:00</p>
                            </div>
                            <div class="img_container">
                                <img src="https://akademi.dexignlab.com/xhtml/images/contacts/5.jpg" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="subject">
                        <div class="title">
                            <h3>Basic Algorithm</h3>
                            <span>Algorithm</span>
                        </div>
                        <div class="desc">
                            <div class="datetime">
                                <p><i class="far fa-calendar"></i> October 18, 2023</p>
                                <p><i class="far fa-clock"></i> 21:01 - 23:00</p>
                            </div>
                            <div class="img_container">
                                <img src="https://akademi.dexignlab.com/xhtml/images/contacts/10.jpg" alt="img">
                            </div>
                        </div>
                    </div>


                </div>
            </main>

        </section>
    </main>
</body>

</html>