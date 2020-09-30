<?php
include 'firebase/auth_session.php';
include 'firebase/firebase.php';

$reference = 'User/' . $_SESSION['username'];
$data = $database->getReference($reference)->getValue();

$tour_flag = $_GET['tour_name'];

$reference_tour = 'Tour/'.$tour_flag;
$data_tour = $database->getReference($reference_tour)->getValue();

$reference_tourist = 'User';
$data_tourist = $database->getReference($reference_tourist)->getValue();

?>

<html>

<head>
    <title>Manage Wisata Details — TiketSaya</title>
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

                <div class="item-menu inactive">
                    <a href="sales.php">
                        <p class="icon-item-menu">
                            <i class="fas fa-ticket-alt"></i>
                        </p>
                    </a>
                </div>

                <div class="item-menu">
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
                    <li>
                        Ticket Sales
                    </li>
                </a>
                <a href="wisata.php">
                    <li class="active-link">
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
                    <?php echo $data_tour['tour_name']; ?>
                </p>
                <nav aria-label="sitemap-ts breadcrumb">
                    <ol class="breadcrumb" style="margin-left: -15px; background: none;">
                        <li class="breadcrumb-item"><a style="color: #C7C7C7;" href="wisata.php">Wisata</a></li>
                        <li style="color: #21272C;" class="breadcrumb-item active" aria-current="page">Details Wisata
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="row report-group">

            <div class="col-md-12">
                <div class="item-big-report col-md-12">


                    <div class="row">
                        <div class="overlay-box col-md-4">
                            <a href="#" id="open_file" class="btn btn-primary btn-third-tiketsaya">Replace</a>
                        </div>
                        <div style="padding-left: 30px;" class="thumbnail-box col-md-4">
                            <p class="label-thumbnail">
                                Thumbnail Wisata
                            </p>
                            <img class="thumbnail-wisata" src="images/admin_picture.png" alt="">
                        </div>

                        <div class="col-md-5">
                            <form method="POST" action="firebase/data_model.php">

                                <div class="form-group content-sign-in">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputEmail1">Nama
                                        Wisata</label>
                                    <input disabled type="text" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Wisata" value="<?php echo $data_tour['tour_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya" for="exampleInputPassword1">Lokasi
                                        Wisata</label>
                                    <input type="text" name="location" class="form-control input-type-primary-tiketsaya"
                                        id="exampleInputPassword1" placeholder="Lokasi" value="<?php echo $data_tour['location']; ?>">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Harga Tiket (US$)</label>
                                            <input type="number" name="ticket_price" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Harga" value="<?php echo $data_tour['ticket_price']; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">Tanggal Wisata</label>
                                            <input type="text" name="tour_date" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Tanggal" value="<?php echo $data_tour['tour_date']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: -20px;">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Ketentuan</label>
                                    <textarea class="input-type-primary-tiketsaya form-control" name="policy"
                                        id="exampleFormControlTextarea1" rows="3"><?php echo $data_tour['policy']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="title-input-type-primary-tiketsaya"
                                        for="exampleFormControlTextarea1">Deskripsi Wisata</label>
                                    <textarea class="input-type-primary-tiketsaya form-control" name="short_description"
                                        id="exampleFormControlTextarea1" rows="3"><?php echo $data_tour['short_description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">has Wifi?</label>
                                            <input type="text" name="is_wifi" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Wifi" value="<?php echo $data_tour['is_wifi']; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">has Spot?</label>
                                            <input type="text" name="is_photo_spot" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Spot" value="<?php echo $data_tour['is_photo_spot']; ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label class="title-input-type-primary-tiketsaya"
                                                for="exampleInputPassword1">has Festival?</label>
                                            <input type="text" name="is_festival" class="form-control input-type-primary-tiketsaya"
                                                id="exampleInputPassword1" placeholder="Festival" value="<?php echo $data_tour['is_festival']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-bottom: -40px; visibility: hidden;"
                                    class="form-group content-sign-in">
                                    <input id="image_file" type="file" />
                                </div>
                                <input type="hidden" name="tour_name" value="<?php echo $tour_flag ?>">
                                <button name="tour_update" type="submit" class="btn btn-primary btn-primary-tiketsaya">Update</button>
                                <button style="margin-left: 10px;" type="reset"
                                    class="btn btn-primary btn-secondary-tiketsaya">Cancel</button>
                            </form>
                        </div>
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
