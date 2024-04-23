<?php
// Use this page as post landing page //
// Call relevant functions based on user decision //
// Retrieve values and pass it as parameters to Reservation Functions //

include 'Reservation.php';

$obj = new Reservation();


if (isset($_POST['submit'])) {
    if ($_POST['submit'] == "reserve") {
        $name = ucwords($_POST['name']);
        $phone = $_POST['contact'];
        $from = $_POST['dateFrom'];
        $to = $_POST['dateTo'];
        $room = $_POST['rType'];
        $cap = $_POST['rCap'];
        $payment = $_POST['payment'];
        $datetime = $_POST['datetime'];

        $obj->computeTotal($name, $phone, $from, $to, $room, $cap, $payment, $datetime);
    }

    if ($_POST['submit'] == "login") {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $obj->validateLogin($user, $pass);
    }
}

if (isset($_POST['save'])) {
    extract($_SESSION['data']);
    $obj->addReservation($name, $phone, $date, $time, $from, $to, $room, $cap, $payment, $days, $sub, $disc, $add, $total, "Pending");
}

if (isset($_POST['page'])) {
    $page = $_POST['page'];
    $obj->viewList($page);
}

if (isset($_POST['update'])) {
    $id = $_POST['valueId'];

    if ($_POST['update'] == "Accepted" || $_POST['update'] == "Rejected") {
        $update = $_POST['update'];
        $obj->updateStatus($update, $id);
    } else {
        $obj->deleteInfo($id);
    }
}
