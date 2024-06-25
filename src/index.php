<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: views/osLoginView.php");
    exit;
}

$pageTitle = 'Home';
include 'includes/head.php';
include 'includes/osHeader.php';
include 'includes/osBody.php';
include 'includes/osFooter.php';
