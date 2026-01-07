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
    <title>Manage Courses</title>
</head>
<body>
    <div id="nav"></div>
    <main class="bg-gray-200 h-screen w-full p-8 flex flex-col items-center gap-5">
       <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl">
            <h1 class="text-3xl font-bold mb-4">My Courses</h1>

            <table class="w-full border border-gray-300 text-center">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="p-3 border border-white">Courses name</th>
                        <th class="p-3 border border-white">grade</th>
                        <th class="p-3 border border-white">score</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['course'] as $index => $course):?>
                        <tr class="border-t border border-gray-300">
                            <td class="p-3 border border-gray-300"> <?= htmlspecialchars($course['name']) ?> (<?= htmlspecialchars($course['credit']) ?>)</td>
                            <td class="p-3 border border-gray-300"> <?= htmlspecialchars($course['grade']) ?> </td>
                            <td class="p-3 border border-gray-300"> 0 </td>
                            <td class="p-3">
                                <button onclick="deleteCourse(<?= $index ?>)" id="course" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-4xl gap-3 flex flex-col">
            <h1 class="text-2xl font-bold">GPA</h1>
            <div class="w-full h-[40px] flex flex-col border-[2px] border-gray-300 rounded-md p-2 gap-2">
                <h3 class=" text-gray-700"> All credit : <span id="totalcredit" class="font-semibold text-black">
                    <?php 
                        $totalCredit = 0;
                        foreach ($_SESSION['course'] as $course) {
                            if (isset($course['credit'])){
                                $credit = $course['credit'];
                            } else {
                                $credit = 0;
                            }
                            $totalCredit += $credit;
                        }
                        echo $totalCredit;
                    ?>
                </span></h3>
            </div>
             <div class="w-full h-[40px] flex flex-col border-[2px] border-gray-300 rounded-md p-2 gap-2">
                <h3 class=" text-gray-700"> All score : <span id="totalscore" class="font-semibold text-black">
                    <?php 
                        $totalScore = 0;
                        foreach ($_SESSION['course'] as $course) {
                            $grade = $course['grade'];
                            if (isset($course['grade'])){
                                if($course['grade'] == "A"){
                                    $score = 4.0;
                                } elseif($course['grade'] == "B+"){
                                    $score = 3.5;
                                } elseif($course['grade'] == "B"){
                                    $score = 3.0;
                                } elseif($course['grade'] == "C+"){
                                    $score = 2.5;
                                } elseif($course['grade'] == "C"){
                                    $score = 2.0;
                                } elseif($course['grade'] == "D+"){
                                    $score = 1.5;
                                } elseif($course['grade'] == "D"){
                                    $score = 1.0;
                                } elseif($course['grade'] == "F"){
                                    $score = 0.0;
                                } else {
                                    $score = 0;
                                }
                            } else {
                                $score = 0;
                            }
                            $totalScore += ($score * $credit);
                        }
                        echo $totalScore;
                    ?>
                </span></h3>
            </div>
            <div class="w-full h-[40px] flex flex-col border-[2px] border-gray-300 rounded-md p-2 gap-2">
                <h3 class=" text-gray-700">Your GPA : <span id="totalgpa" class="font-semibold text-black">
                    <?php 

                        if ($totalCredit > 0) {
                            $gpa = $totalScore / $totalCredit;
                            echo number_format($gpa, 2);
                        } else {
                            echo "0.00";
                        }
                    ?>
                </span></h3>
            </div>
            <button class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">Add grade</button>
        </div>
    </main>
</body>
</html>