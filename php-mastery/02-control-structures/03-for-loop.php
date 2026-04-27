<?php
/**
 * Control Structures: For Loop
 * Example 3: Iteration with For Loops
 */

echo "=== For Loops ===\n\n";

// 1. Basic For Loop
echo "1. Basic For Loop:\n";
echo "   Counting from 1 to 5:\n";
for ($i = 1; $i <= 5; $i++) {
    echo "   $i ";
}
echo "\n\n";

// 2. For Loop with Decrement
echo "2. For Loop with Decrement:\n";
echo "   Countdown from 10 to 1:\n";
for ($i = 10; $i >= 1; $i--) {
    echo "   $i ";
}
echo "   Blast off! 🚀\n\n";

// 3. For Loop with Custom Increment
echo "3. For Loop with Custom Increment:\n";
echo "   Even numbers from 0 to 10:\n";
for ($i = 0; $i <= 10; $i += 2) {
    echo "   $i ";
}
echo "\n\n";

// 4. For Loop for Array Traversal
echo "4. For Loop - Array Traversal:\n";
$fruits = ["Apple", "Banana", "Orange", "Mango"];
echo "   Fruits list:\n";
for ($i = 0; $i < count($fruits); $i++) {
    echo "   " . ($i + 1) . ". {$fruits[$i]}\n";
}
echo "\n";

// 5. Nested For Loops - Multiplication Table
echo "5. Nested For Loops - Multiplication Table (1-5):\n";
for ($i = 1; $i <= 5; $i++) {
    echo "   ";
    for ($j = 1; $j <= 5; $j++) {
        echo str_pad($i * $j, 4, " ", STR_PAD_LEFT);
    }
    echo "\n";
}
echo "\n";

// 6. For Loop with Multiple Variables
echo "6. For Loop with Multiple Variables:\n";
for ($i = 0, $j = 10; $i < $j; $i++, $j--) {
    echo "   i=$i, j=$j\n";
}
echo "\n";

// 7. Practical Example: Sum of Numbers
echo "7. Practical Example - Sum of 1 to N:\n";
$n = 10;
$sum = 0;
for ($i = 1; $i <= $n; $i++) {
    $sum += $i;
}
echo "   Sum of numbers from 1 to $n: $sum\n\n";

// 8. Practical Example: Factorial
echo "8. Practical Example - Factorial:\n";
$num = 5;
$factorial = 1;
for ($i = 1; $i <= $num; $i++) {
    $factorial *= $i;
}
echo "   Factorial of $num: $factorial\n\n";

// 9. For Loop with Break
echo "9. For Loop with Break:\n";
echo "   Finding first number divisible by 7:\n";
for ($i = 1; $i <= 20; $i++) {
    if ($i % 7 == 0) {
        echo "   Found: $i\n";
        break;
    }
}
echo "\n";

// 10. For Loop with Continue
echo "10. For Loop with Continue:\n";
echo "   Skipping multiples of 3:\n";
for ($i = 1; $i <= 10; $i++) {
    if ($i % 3 == 0) {
        continue;
    }
    echo "   $i ";
}
echo "\n\n";

// 11. Practical Example: Pattern Printing
echo "11. Practical Example - Right Triangle Pattern:\n";
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
echo "\n";

// 12. Practical Example: Prime Number Check
echo "12. Practical Example - Prime Numbers 1-20:\n";
for ($num = 1; $num <= 20; $num++) {
    $isPrime = true;
    
    if ($num <= 1) {
        $isPrime = false;
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $isPrime = false;
                break;
            }
        }
    }
    
    if ($isPrime) {
        echo "   $num ";
    }
}
echo "\n\n";

// 13. For Loop with Alternative Syntax
echo "13. For Loop - Fibonacci Sequence:\n";
$a = 0;
$b = 1;
echo "   First 10 Fibonacci numbers:\n";
echo "   $a $b ";
for ($i = 3; $i <= 10; $i++) {
    $c = $a + $b;
    echo "$c ";
    $a = $b;
    $b = $c;
}
echo "\n\n";

// 14. Practical Example: Calendar Days
echo "14. Practical Example - Days in Month:\n";
$month = "February";
$year = 2024;
$daysInMonth = 0;

switch ($month) {
    case "January": case "March": case "May": case "July":
    case "August": case "October": case "December":
        $daysInMonth = 31;
        break;
    case "April": case "June": case "September": case "November":
        $daysInMonth = 30;
        break;
    case "February":
        $daysInMonth = (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) ? 29 : 28;
        break;
}

echo "   $month $year has $daysInMonth days\n";
echo "   Days: ";
for ($day = 1; $day <= $daysInMonth; $day++) {
    echo "$day ";
    if ($day % 10 == 0) echo "\n         ";
}
echo "\n\n";

// 15. Inverted Triangle Pattern
echo "15. Inverted Triangle Pattern:\n";
$rows = 5;
for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
echo "\n";

// 16. Diamond Pattern
echo "16. Diamond Pattern:\n";
$rows = 5;
// Upper half
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
// Lower half
for ($i = $rows - 1; $i >= 1; $i--) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
echo "\n";

// 17. Practical Example: Number Pyramid
echo "17. Number Pyramid:\n";
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "$k ";
    }
    echo "\n";
}
echo "\n";

echo "=== End of For Loop Examples ===\n";
?>
