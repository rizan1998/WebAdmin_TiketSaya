<?php

include 'firebase.php';

if (isset($_POST['sign_in'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    if ($username != null && $password != null) {
        //Nama child-nya nanti tolong sesuaikan.
        $reference = 'User/' . $username;
        $data = $database->getReference($reference)->getValue();

        if ($data['username'] == $username) {
            if ($data['password'] == $password) {
                session_start();
                $_SESSION['username'] = $username;
                header('location: ../dashboard.php');
            } else {
                echo "Username atau Password salah!";
            }
        } else {
            echo "Username atau Password salah!";
        }
    }
} elseif (isset($_POST['tour_update'])) {
    $tour_name = htmlspecialchars($_POST['tour_name']);
    $location = htmlspecialchars($_POST['location']);
    $ticket_price = htmlspecialchars($_POST['ticket_price']);
    $tour_date = htmlspecialchars($_POST['tour_date']);
    $policy = htmlspecialchars($_POST['policy']);
    $short_description = htmlspecialchars($_POST['short_description']);
    $is_wifi = htmlspecialchars($_POST['is_wifi']);
    $is_photo_spot = htmlspecialchars($_POST['is_photo_spot']);
    $is_festival = htmlspecialchars($_POST['is_festival']);

    $reference = 'Tour/' . $tour_name;

    $data = [
        'tour_name' => $tour_name,
        'location' => $location,
        'ticket_price' => $ticket_price,
        'tour_date' => $tour_date,
        'policy' => $policy,
        'short_description' => $short_description,
        'is_wifi' => $is_wifi,
        'is_photo_spot' => $is_photo_spot,
        'is_festival' => $is_festival
    ];

    print_r($data);

    $upload = $database->getReference($reference)->update($data);
    header('location: ../wisata.php');
} elseif (isset($_POST['user_profile'])) {
    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $bio = htmlspecialchars($_POST['bio']);
    $balance = htmlspecialchars($_POST['balance']);

    $reference = 'User/' . $username;

    $data = [
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'bio' => $bio,
        'balance' => $balance
    ];

    $upload = $database->getReference($reference)->update($data);
    header('location: ../customer.php');
} elseif (isset($_POST['admin_profile'])) {
    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $bio = htmlspecialchars($_POST['bio']);
    $balance = htmlspecialchars($_POST['balance']);

    $reference = 'User/' . $username;

    $data = [
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'bio' => $bio,
        'balance' => $balance
    ];

    $upload = $database->getReference($reference)->update($data);
    header('location: ../setting.php');
} elseif (isset($_POST['admin_delete'])) {
    $username = htmlspecialchars($_POST['username']);

    $reference = 'User/' . $username;
    $reference_ticket = 'Ticket/' . $username;

    $delete_user = $database->getReference($reference)->remove();
    $delete_ticket = $database->getReference($reference_ticket)->remove();

    header('location: user_destroy.php');
} elseif (isset($_POST['user_delete'])) {
    $username = htmlspecialchars($_POST['username']);

    $reference = 'User/' . $username;
    $reference_ticket = 'Ticket/' . $username;

    $delete_user = $database->getReference($reference)->remove();
    $delete_ticket = $database->getReference($reference_ticket)->remove();

    header('location: user_destroy.php');
} elseif (isset($_POST['add_profile'])) {
    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $bio = htmlspecialchars($_POST['bio']);
    $balance = htmlspecialchars($_POST['balance']);

    $reference = 'User/' . $username;

    $data = [
        'username' => $username,
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'bio' => $bio,
        'balance' => $balance
    ];

    print_r($data);

    $upload = $database->getReference($reference)->update($data);
    header('location: ../customer.php');
}
