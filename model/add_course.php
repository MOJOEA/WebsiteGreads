<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'];
    $credit = $_POST['course_credit'];
    // Add course to session
    array_push($_SESSION['course_list'], [
        'name' => $name,
        'credit' => $credit
    ]);
    header("Location: http://localhost/Project/WebsiteGreads/view/manage_courses.php");
    exit();
}
?>