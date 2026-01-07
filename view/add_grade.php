<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="../src/courses.js"></script>
    <title>Add Grade</title>
</head>
<body>
    <div id="nav"></div>
    <main class="bg-gray-200 h-screen w-full p-8 flex flex-col items-center gap-5">
       <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
           <h1 class="text-2xl font-bold mb-4">Mygrade management</h1>
           <form method="post" action="../model/add_grade.php">
                <label for="course-name" class="block text-gray-700 font-semibold mb-2">Add Grade:</label>
                <select type="text" id="course_name" name="course_name" class="w-[74%] p-2 border border-gray-300 rounded mb-4 text-gray-400 text-center" required>
                    <option class="text" disabled selected hidden>Enter course name</option>
                    <?php foreach ($_SESSION['course_list'] as $course): ?>
                        <option value="<?= htmlspecialchars($course['name']) ?>"><?= htmlspecialchars($course['name']) ?> (<?= $course['credit'] ?>)</option>
                    <?php endforeach; ?>
                </select>
                <input type="text" id="course_grade" name="course_grade" class="w-[25%] p-2 border border-gray-300 rounded mb-4" placeholder="Enter grade" required>
                <button type="submit" class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Add Grade</button>
           </form>
        </div>
       <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <h1 class="text-green-500 mb-4 font-semibold text-center">Success to add grade</h1>
           <button class="bg-gray-300 w-full text-white px-4 py-2 rounded hover:bg-gray-500 mt-2">Recalculate GPA</button>
       </div>
    </main>
</body>
</html>