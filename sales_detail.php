<?php
include 'firebase/auth_session.php';
include 'firebase/firebase.php';

$reference = 'User/' . $_SESSION['username'];
$data = $database->getReference($reference)->getValue();

$user_flag = $_GET['username'];

$reference_tourist = 'User/'.$user_flag;
$data_tourist = $database->getReference($reference_tourist)->getValue();

$reference_ticket = 'Ticket/'.$user_flag;
$data_ticket = $database->getReference($reference_ticket)->getValue();

$ticket = $database->getReference("Ticket/".$user_flag)->getChildKeys();

?>

<html>

<head>
    <title>Sales Detail — TiketSaya</title>
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

                <div class="item-menu inactive">
                    <a href="dashboard.php">
                        <p class="icon-item-menu">
                            <i class="fab fa-delicious"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
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
                    <li>
                        My Dashboard
                    </li>
                </a>
                <a href="sales.php">
                    <li class="active-link">
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
                        Customers <span class="badge-tiketsaya badge badge-pill badge-primary"><?php echo count($database->getReference("User")->getValue()) ?></span>
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
                    Details
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Sales</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page"><?php echo $user_flag ?>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-12">

                    <div class="row">
                        <div class="col-4">
                            <div class="wrap-user-picture-circle">
                                <img class="primary-user-picture-circle" src="images/user_1.png" />
                            </div>
                            <div style="margin-top: 16px;" class="user-info">
                                <p class="title">
                                    <?php echo $data_tourist['name'] ?>
                                </p>
                                <br>
                                <p class="sub-title">
                                <?php echo $data_tourist['bio'] ?>
                                </p>

                            </div>
                        </div>
                        <div class="col-4">
                            <p class="total-balance">
                                Total Balance: <span class="value-balance">US$ <?php echo $data_tourist['balance'] ?></span>
                            </p>
                        </div>
                    </div>

                    <div class="row user-wisata-places">
                        <div class="col-md-12">
                            <p class="title">
                            <?php echo $data_tourist['name'] ?> Wisata
                            </p>
                        </div>

                        <?php for ($i =0; $i < count($ticket); $i++) { ?>
                            <div class="item-wisata-place col-md-4">
                                <img src="images/img_wisata.png" alt="">
                                <p class="title-info-wisata-place">
                                <?php $temp_ticket = $ticket[$i];
                                        $temp_ticket_final = $data_ticket[$temp_ticket];
                                        echo $temp_ticket_final['tour_name'];
                                ?>
                                </p>
                                <p class="subtitle-info-wisata-place">
                                <?php echo $temp_ticket_final['location'] ?>
                                </p>
                            </div>
                        <?php } ?>

                    </div>

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</body>

</html>
