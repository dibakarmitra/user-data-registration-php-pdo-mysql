<!doctype html>
<html lang="en">


<?php
include_once 'config.php';
include_once 'users.php';

$database = new Database();
$db = $database->getConnection();

$item = new User($db);

?>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>User Registration</title>
</head>

<body>