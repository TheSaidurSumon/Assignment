


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Calculation</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-2xl mx-auto mt-10">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-blue-600 text-white text-center py-4">
                <h2 class="text-2xl font-bold">Grade Calculation Results</h2>
            </div>
            <div class="p-6">
                <?php
                function calculateGrade($marks) {
                    // Check if any subject marks are below 0 or above 100
                    foreach ($marks as $subjectMark) {
                        if ($subjectMark < 0 || $subjectMark > 100) {
                            return "Invalid Marks";  // Return Invalid Marks if the range is not between 0-100
                        }
                    }

                    // Check if any subject has marks below 33
                    foreach ($marks as $subjectMark) {
                        if ($subjectMark < 33) {
                            return "F";  // Overall grade is F if any subject has less than 33 marks
                        }
                    }
                    
                    // Calculate the average of marks if all subjects are between 33 and 100
                    $average = array_sum($marks) / count($marks);
                    
                    // Determine the grade based on the average
                    switch (true) {
                        case ($average >= 80 && $average <= 100):
                            return "A+";
                        case ($average >= 70 && $average <= 79):
                            return "A";
                        case ($average >= 60 && $average <= 69):
                            return "A-";
                        case ($average >= 50 && $average <= 59):
                            return "B";
                        case ($average >= 40 && $average <= 49):
                            return "C";
                        case ($average >= 33 && $average <= 39):
                            return "D";
                        default:
                            return "Invalid Marks";  // This is just an extra safety check
                    }
                }

                // Test with an array of marks
                $marks = array(85, 70, 60, 33, 45);  // You can change these values to test different scenarios
                
                // Calculate the sum of the numbers
                $sum = array_sum($marks);

                // Calculate the average of the numbers
                $average = $sum / count($marks);

                // Calculate the grade
                $grade = calculateGrade($marks);

                echo '<ul class="list-none space-y-2">';
                echo '<li class="bg-gray-100 p-3 rounded"><strong>Subject Marks: </strong>' . implode(", ", $marks) . '</li>';
                echo '<li class="bg-gray-100 p-3 rounded"><strong>Sum of numbers: </strong>' . $sum . '</li>';
                echo '<li class="bg-gray-100 p-3 rounded"><strong>Average of numbers: </strong>' . $average . '</li>';
                echo '<li class="bg-gray-100 p-3 rounded"><strong>Overall Grade: </strong>' . $grade . '</li>';
                echo '</ul>';
                ?>
            </div>
          
        </div>
    </div>
</body>
</html>
