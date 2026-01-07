
<?php
session_start();

function deleteCourseList($index, $type) {
    if (isset($_SESSION[$type][$index])) {
        unset($_SESSION[$type][$index]);
        $_SESSION[$type] = array_values($_SESSION[$type]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'] ?? '';
    $index = $_POST['index'] ?? '';

    deleteCourseList($index, $type);
    header("Location: http://localhost/Project/WebsiteGreads/view/manage_courses.php");
    exit();
}
?>
