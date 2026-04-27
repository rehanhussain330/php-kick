<?php
/**
 * Control Structures: While and Do-While Loops
 * Example 4: Condition-Controlled Iteration
 */

echo "=== While and Do-While Loops ===\n\n";

// 1. Basic While Loop
echo "1. Basic While Loop:\n";
echo "   Counting from 1 to 5:\n";
$i = 1;
while ($i <= 5) {
    echo "   $i ";
    $i++;
}
echo "\n\n";

// 2. While Loop with Array
echo "2. While Loop - Array Traversal:\n";
$colors = ["Red", "Green", "Blue", "Yellow"];
$index = 0;
echo "   Colors:\n";
while ($index < count($colors)) {
    echo "   " . ($index + 1) . ". {$colors[$index]}\n";
    $index++;
}
echo "\n";

// 3. Do-While Loop (Executes at least once)
echo "3. Do-While Loop:\n";
$num = 1;
echo "   Counting from 1 to 3:\n";
do {
    echo "   $num ";
    $num++;
} while ($num <= 3);
echo "\n\n";

// 4. Do-While vs While Difference
echo "4. Do-While vs While (Key Difference):\n";
$x = 10;
echo "   While loop (condition false initially):\n";
while ($x < 5) {
    echo "   This won't print\n";
}
echo "   (Nothing printed - condition checked first)\n";

$y = 10;
echo "   Do-while loop (condition false initially):\n";
do {
    echo "   Value: $y\n";
} while ($y < 5);
echo "   (Printed once - executes before checking)\n\n";

// 5. Practical Example: User Input Simulation
echo "5. Practical Example - Password Attempt:\n";
$correctPassword = "secret123";
$attempts = 0;
$maxAttempts = 3;
$isAuthenticated = false;

// Simulating user attempts
$simulatedAttempts = ["wrong1", "wrong2", "secret123"];

while ($attempts < $maxAttempts && !$isAuthenticated) {
    $input = $simulatedAttempts[$attempts];
    $attempts++;
    
    if ($input === $correctPassword) {
        $isAuthenticated = true;
        echo "   ✓ Access granted on attempt $attempts!\n";
    } else {
        echo "   ✗ Attempt $attempts: Wrong password\n";
    }
}

if (!$isAuthenticated) {
    echo "   Account locked after $maxAttempts attempts.\n";
}
echo "\n";

// 6. While Loop with Break
echo "6. While Loop with Break:\n";
echo "   Finding number 7 in sequence:\n";
$i = 1;
while (true) {
    if ($i == 7) {
        echo "   Found 7! Stopping.\n";
        break;
    }
    echo "   $i ";
    $i++;
}
echo "\n";

// 7. While Loop with Continue
echo "7. While Loop with Continue:\n";
echo "   Printing odd numbers only:\n";
$i = 0;
while ($i < 10) {
    $i++;
    if ($i % 2 == 0) {
        continue;
    }
    echo "   $i ";
}
echo "\n\n";

// 8. Practical Example: Number Guessing Game
echo "8. Practical Example - Number Guessing Game:\n";
$secretNumber = 7;
$guesses = [3, 5, 9, 7]; // Simulated guesses
$guessCount = 0;
$found = false;

echo "   Guessing number between 1-10...\n";
while ($guessCount < count($guesses) && !$found) {
    $guess = $guesses[$guessCount];
    $guessCount++;
    
    if ($guess == $secretNumber) {
        echo "   ✓ Correct! Number found in $guessCount guesses.\n";
        $found = true;
    } elseif ($guess < $secretNumber) {
        echo "   Guess $guess: Too low!\n";
    } else {
        echo "   Guess $guess: Too high!\n";
    }
}
echo "\n";

// 9. Nested While Loops
echo "9. Nested While Loops - Pattern:\n";
$row = 1;
while ($row <= 5) {
    $col = 1;
    while ($col <= $row) {
        echo "* ";
        $col++;
    }
    echo "\n";
    $row++;
}
echo "\n";

// 10. Practical Example: Sum of Digits
echo "10. Practical Example - Sum of Digits:\n";
$number = 12345;
$temp = $number;
$sum = 0;

echo "   Calculating sum of digits of $number:\n";
while ($temp > 0) {
    $digit = $temp % 10;
    $sum += $digit;
    $temp = intdiv($temp, 10);
}
echo "   Sum: $sum\n\n";

// 11. Practical Example: Reverse a Number
echo "11. Practical Example - Reverse a Number:\n";
$original = 12345;
$num = $original;
$reversed = 0;

while ($num > 0) {
    $digit = $num % 10;
    $reversed = $reversed * 10 + $digit;
    $num = intdiv($num, 10);
}
echo "   Original: $original\n";
echo "   Reversed: $reversed\n\n";

// 12. Do-While for Menu System
echo "12. Do-While - Menu System:\n";
$menuOptions = [1, 2, 3, 4]; // Simulated user choices
$currentIndex = 0;
$exit = false;

do {
    $choice = $menuOptions[$currentIndex];
    $currentIndex++;
    
    switch ($choice) {
        case 1:
            echo "   [1] View Profile\n";
            break;
        case 2:
            echo "   [2] Settings\n";
            break;
        case 3:
            echo "   [3] Messages\n";
            break;
        case 4:
            echo "   [4] Exit\n";
            $exit = true;
            break;
    }
} while (!$exit && $currentIndex < count($menuOptions));
echo "\n";

// 13. Practical Example: Binary Conversion
echo "13. Practical Example - Decimal to Binary:\n";
$decimal = 42;
$num = $decimal;
$binary = "";

if ($num == 0) {
    $binary = "0";
} else {
    while ($num > 0) {
        $remainder = $num % 2;
        $binary = $remainder . $binary;
        $num = intdiv($num, 2);
    }
}
echo "   Decimal: $decimal\n";
echo "   Binary: $binary\n\n";

// 14. While Loop with Multiple Conditions
echo "14. While Loop - Range Checker:\n";
$start = 5;
$end = 15;
$current = $start;

echo "   Numbers between $start and $end:\n";
while ($current >= $start && $current <= $end) {
    echo "   $current ";
    $current++;
}
echo "\n\n";

// 15. Practical Example: GCD Calculation
echo "15. Practical Example - GCD (Greatest Common Divisor):\n";
$a = 48;
$b = 18;
$num1 = $a;
$num2 = $b;

echo "   Finding GCD of $a and $b:\n";
while ($num2 != 0) {
    $temp = $num2;
    $num2 = $num1 % $num2;
    $num1 = $temp;
}
echo "   GCD($a, $b) = $num1\n\n";

// 16. Infinite Loop Prevention
echo "16. Safe Loop with Counter:\n";
echo "   Preventing infinite loops:\n";
$safetyCounter = 0;
$maxIterations = 5;

while (true) {
    echo "   Iteration " . ($safetyCounter + 1) . "\n";
    $safetyCounter++;
    
    if ($safetyCounter >= $maxIterations) {
        echo "   Safety limit reached. Exiting.\n";
        break;
    }
}
echo "\n";

// 17. Practical Example: Armstrong Number Check
echo "17. Practical Example - Armstrong Number Check:\n";
$checkNum = 153;
$original = $checkNum;
$sum = 0;
$digits = strlen((string)$checkNum);
$temp = $checkNum;

while ($temp > 0) {
    $digit = $temp % 10;
    $sum += pow($digit, $digits);
    $temp = intdiv($temp, 10);
}

if ($sum == $original) {
    echo "   $original is an Armstrong number! ✓\n";
} else {
    echo "   $original is not an Armstrong number. ✗\n";
}
echo "\n";

echo "=== End of While/Do-While Examples ===\n";
?>
