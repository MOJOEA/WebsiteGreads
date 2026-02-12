
<?php
session_start();

function deleteCourseList($index, $type) {
    if ($type === 'courses_list') {
        $name = $_SESSION[$type][$index]['name'];
        if (in_array($name, $_SESSION['course']['name'], true)) {
            // พบชื่อวิชา → ไม่ให้ลบ
            return;
    }}

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
