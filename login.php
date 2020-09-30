<html>

<head>
    <title>Sign In Admin TiketSaya</title>
    <meta charset="UTF-8">
    <meta name="description" content="Login TiketSaya Admin">
    <meta name="keywords" content="TiketSaya, Web Dashboard TiketSaya, Login TiketSaya">
    <meta name="author" content="BWA Team">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row header-sign-in">
            <div class="col-md-12">
                <img class="logo-header" height="80" src="images/applogocolored.png" alt="">
            </div>
        </div>
        <div class="row ">
            <div class="col-md-10 offset-md-1 form-sign-in">
                <div class="row">
                    <div class="col-md-6 d-none d-sm-block">
                        <img class="icon-header" height="276" src="images/illustration_login.png" alt="">
                    </div>
                    <div class="col-md-4">
                        <p class="title-form">
                            Sign In
                        </p>
                        <p class="subtitle-form">
                            Let’s make a report today
                        </p>
                        <form method="POST" action="firebase/data_model.php">
                            <div class="form-group content-sign-in">
                                <label class="title-input-type-primary-tiketsaya"
                                    for="exampleInputEmail1">Username</label>
                                <input name="username" type="text" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="form-group">
                                <label class="title-input-type-primary-tiketsaya"
                                    for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control input-type-primary-tiketsaya"
                                    id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <button type="submit" name="sign_in" class="btn btn-primary btn-primary-tiketsaya">Sign In</button>
                        </form>
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
