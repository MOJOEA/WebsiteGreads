<?php
session_start();

if (!isset($_SESSION['course_list'])) {
    $_SESSION['course_list'] = [
        ['name' => 'Introduction to Computer Science', 'credit' => 3],
        ['name' => 'Programming Fundamentals', 'credit' => 3],
        ['name' => 'Database Systems', 'credit' => 3],
        ['name' => 'Web Development', 'credit' => 3],
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../src/courses.js" defer></script>
    <title>Manage Courses</title>
</head>
<body>
    <div id="nav"></div>
    <main class="bg-gray-200 h-screen w-full p-8 flex flex-col items-center gap-5">
       <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
           <h1 class="text-2xl font-bold mb-4">Course management</h1>
           <form method="post" action="../model/add_course.php">
                <label for="course_name" class="block text-gray-700 font-semibold mb-2">Add Course:</label>
                <input type="text" id="course_name" name="course_name" class="w-[73%] p-2 border border-gray-300 rounded mb-4" placeholder="Enter course name" required>
                <select type="text" id="course_credit" name="course_credit" class="w-[25%] p-2 border border-gray-300 rounded mb-4 text-gray-400 text-center" required>
                    <option class="text" disabled selected hidden>credit</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <button type="submit" class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Add Course</button>
           </form>
       </div>
       <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <h1 class="text-3xl font-bold mb-4">Courses</h1>

            <table class="w-full border border-gray-300 text-center">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-3 border border-white">Courses name</th>
                        <th class="p-3 border border-white">credit</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody id="table_courseslist">
                    <?php foreach ($_SESSION['course_list'] as $index => $course):?>
                        <tr class="border-t border-gray-300">
                            <td class="p-3 border border-gray-300">
                                <?= htmlspecialchars($course['name']) ?>
                            </td>
                            <td class="p-3 border border-gray-300 text-center">
                                <?= $course['credit'] ?>
                            </td>
                            <td class="p-3 text-center">
                                <button type="button" onclick="deleteCourse(<?= $index ?>)" id="course_list" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>