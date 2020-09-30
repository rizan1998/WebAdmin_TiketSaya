<?php
include 'firebase/auth_session.php';
include 'firebase/firebase.php';

$reference = 'User/' . $_SESSION['username'];
$data = $database->getReference($reference)->getValue();

$reference_tourist = 'User';
$data_tourist = $database->getReference($reference_tourist)->getValue();

$reference_ticket = 'Ticket';
$data_ticket = $database->getReference($reference_ticket)->getValue();

$reference_tour = 'Tour';
$data_tour = $database->getReference($reference_tour)->getValue();

$user = $database->getReference($reference_tourist)->getChildKeys();
$user_ticket = $database->getReference($reference_ticket)->getChildKeys();
$ticket_total = 0;

for ($i = 0; $i < count($user_ticket); $i++) {
    $temp = $user_ticket[$i];
    $temp_final = $data_tourist[$temp];
    $reference_ticket_count = 'Ticket/'.$temp_final['username'];
    $counter = sizeof($database->getReference($reference_ticket_count)->getChildKeys());
    $ticket_total += $counter;
}

?>

<html>

<head>
    <title>Dashboard — TiketSaya</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>

    <div class="side-left">
        <div class="shortcut" onmouseover="showAdminProfile()">
            <div class="emblemapp">
                <img src="images/emblemapp.png" height="29" alt="">
            </div>
            <div class="menus">

                <div class="item-menu">
                    <a href="dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="sales.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="wisata.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-globe"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="customer.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-users"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="setting.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-cog"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu inactive">
                    <a href="firebase/user_destroy.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-power-off"></i>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="admin-profile" id="sl_ap" onmouseover="showAdminProfile()" onmouseout="hideAdminProfile()">
            <div class="admin-picture">
                <img src="images/admin_picture.png" alt="">
            </div>
            <p class="admin-name">
                <?php echo $data['name']; ?>
            </p>
            <p class="admin-level">
                <?php echo $data['bio']; ?>
            </p>
            <ul class="admin-menus">
                <a href="dashboard.php">
                    <li class="active-link">
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li>
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.php">
                    <li>
                        Manage Wisata
                    </li>
                </a>
                <a href="customer.php">
                    <li>
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary"><?php echo count($data_tourist) ?></span>
                    </li>
                </a>
                <a href="setting.php">
                    <li>
                        Account Settings
                    </li>
                </a>
                <a href="firebase/user_destroy.php">
                    <li style="padding-top: 120px;">
                        Log Out
                    </li>
                </a>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="header row">
            <div class="col-md-12">
                <p class="header-title">
                    My Dashboard
                </p>
                <p class="sub-header-title">
                    Latest report updated this week and on
                </p>
            </div>
        </div>
        <div class="row report-group">

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_pengguna.png" alt="">
                            <p class="title-item">
                                TOURIST
                            </p>
                            <p class="subtitle-item">
                                USERS LIFETIME
                            </p>
                            <p class="value-item">
                                <?php echo count($data_tourist) ?>
                            </p>
                            <p class="desc-item">
                                around the earth
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_sales.png" alt="">
                            <p class="title-item">
                                SALES
                            </p>
                            <p class="subtitle-item">
                                TICKET BEING SOLD
                            </p>
                            <p class="value-item">
                                <?php echo $ticket_total ?>
                            </p>
                            <p class="desc-item">
                                around the world
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="item-report col-md-12">
                    <div class="row">
                        <div class="content col-md-12">
                            <img src="images/icon_total_wisata.png" alt="">
                            <p class="title-item">
                                WISATA
                            </p>
                            <p class="subtitle-item">
                                PLACE THAT AVAILABLE
                            </p>
                            <p class="value-item">
                            <?php echo count($data_tour) ?>
                            </p>
                            <p class="desc-item">
                                around the Indonesia
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row report-group">

            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">NEWEST</span> USERS
                    </p>
                    <p class="sub-title">
                        USER THAT SIGN UP NOWADAYS
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>

                    <?php for ($i =0; $i < count($user); $i++) { ?>

                    <div class="user-item">
                        <div class="user-picture">
                            <img src="images/user_1.png" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                            <?php $temp_user = $user[$i];
                                    $temp_user_final = $data_tourist[$temp_user];
                                    echo $temp_user_final['name'];
                            ?>
                            </p>
                            <br>
                            <p class="sub-title">
                                 <?php echo $temp_user_final['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary ">View Profile</a>
                    </div>

                    <?php } ?>

                </div>



            </div>

            <div class="col-md-6">
                <div class="item-big-report col-md-12">
                    <p class="title">
                        <span class="title-blue">TICKETS</span> SOLD
                    </p>
                    <p class="sub-title">
                        USERS JUST BOUGHT TICKET
                    </p>
                    <a href="#" class="btn btn-small btn-primary btn-primary-tiketsaya">See More</a>

                    <div class="divider-line"></div>

                    <?php for ($i =0; $i < count($user); $i++) { ?>

                    <div class="user-item">
                        <div class="user-picture">
                            <img src="images/user_3.png" alt="">
                        </div>
                        <div class="user-info">
                            <p class="title">
                                 <?php $temp_user = $user[$i];
                                    $temp_user_final = $data_tourist[$temp_user];
                                    echo $temp_user_final['name'];
                                 ?>
                            </p>
                            <br>
                            <p class="sub-title">
                                <?php echo $temp_user_final['bio']; ?>
                            </p>
                        </div>
                        <a href="#" class="btn btn-small-border btn-primary ">View Profile</a>
                    </div>

                    <?php } ?>

                </div>



            </div>



        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>
