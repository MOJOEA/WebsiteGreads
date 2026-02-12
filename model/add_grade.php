<?php
session_start();

if (!isset($_SESSION['course']) || !is_array($_SESSION['course'])) {
    $_SESSION['course'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['course_name'];
    $grade = $_POST['course_grade'];

    $list = array_map('strtolower', array_column($_SESSION['course'], 'name'));
    $index = array_search(strtolower($name), $list);

    if ($index === false) {
        header("Location: http://localhost/Project/WebsiteGreads/view/add_grade.php?error=notfound");
        exit();
    }   

    array_push($_SESSION['course'], [
        'name' => $name,
        'credit' => $_SESSION['course_list'][$index]['credit'],
        'score' => $_SESSION['course_list'][$index]['credit'] * (
            $grade == "A" ? 4.0 :
            ($grade == "B+" ? 3.5 :
            ($grade == "B" ? 3.0 :
            ($grade == "C+" ? 2.5 :
            ($grade == "C" ? 2.0 :
            ($grade == "D+" ? 1.5 :
            ($grade == "D" ? 1.0 :
            ($grade == "F" ? 0.0 : 0)))))))),
        'grade' => $grade
    ]);
    header("Location: http://localhost/Project/WebsiteGreads/view/add_grade.php");
    exit();
}
?>