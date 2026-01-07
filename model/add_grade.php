<?php
session_start();

if (!isset($_SESSION['course']) || !is_array($_SESSION['course'])) {
    $_SESSION['course'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'];
    $grade = $_POST['course_grade'];

    $list = array_column($_SESSION['course_list'], 'name');
    $index = array_search($name, $list);
    // Add course to session
    array_push($_SESSION['course'], [
        'name' => $name,
        'credit' => $_SESSION['course_list'][$index]['credit'],
        'grade' => $grade
    ]);
    header("Location: http://localhost/Project/WebsiteGreads/view/add_grade.php");
    exit();
}
?>