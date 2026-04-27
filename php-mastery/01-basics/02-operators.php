<?php
/**
 * PHP Basics: Operators
 * Example 2: Arithmetic, Comparison, Logical, and Assignment Operators
 */

echo "=== PHP Operators ===\n\n";

// 1. Arithmetic Operators
echo "1. Arithmetic Operators:\n";
$a = 10;
$b = 3;
echo "   a = $a, b = $b\n";
echo "   Addition (a + b): " . ($a + $b) . "\n";
echo "   Subtraction (a - b): " . ($a - $b) . "\n";
echo "   Multiplication (a * b): " . ($a * $b) . "\n";
echo "   Division (a / b): " . round($a / $b, 2) . "\n";
echo "   Modulus (a % b): " . ($a % $b) . "\n";
echo "   Exponentiation (a ** b): " . ($a ** $b) . "\n\n";

// 2. Assignment Operators
echo "2. Assignment Operators:\n";
$x = 5;
echo "   Initial x: $x\n";
$x += 3;
echo "   After x += 3: $x\n";
$x -= 2;
echo "   After x -= 2: $x\n";
$x *= 2;
echo "   After x *= 2: $x\n";
$x /= 2;
echo "   After x /= 2: $x\n";
$x %= 3;
echo "   After x %= 3: $x\n\n";

// 3. Comparison Operators
echo "3. Comparison Operators:\n";
$m = 10;
$n = "10";
echo "   m = $m, n = \"$n\"\n";
echo "   Equal (==): " . ($m == $n ? 'true' : 'false') . "\n";
echo "   Identical (===): " . ($m === $n ? 'true' : 'false') . "\n";
echo "   Not Equal (!=): " . ($m != $n ? 'true' : 'false') . "\n";
echo "   Not Identical (!==): " . ($m !== $n ? 'true' : 'false') . "\n";
echo "   Greater Than (>): " . ($m > 5 ? 'true' : 'false') . "\n";
echo "   Less Than (<): " . ($m < 5 ? 'true' : 'false') . "\n";
echo "   Greater or Equal (>=): " . ($m >= 10 ? 'true' : 'false') . "\n";
echo "   Less or Equal (<=): " . ($m <= 10 ? 'true' : 'false') . "\n\n";

// 4. Logical Operators
echo "4. Logical Operators:\n";
$p = true;
$q = false;
echo "   p = true, q = false\n";
echo "   AND (&&): " . (($p && $q) ? 'true' : 'false') . "\n";
echo "   OR (||): " . (($p || $q) ? 'true' : 'false') . "\n";
echo "   NOT (!p): " . (!$p ? 'true' : 'false') . "\n";
echo "   XOR: " . (($p xor $q) ? 'true' : 'false') . "\n\n";

// 5. String Concatenation Operator
echo "5. String Concatenation Operator:\n";
$firstName = "John";
$lastName = "Doe";
$fullName = $firstName . " " . $lastName;
echo "   First Name: $firstName\n";
echo "   Last Name: $lastName\n";
echo "   Full Name: $fullName\n\n";

// 6. Increment/Decrement Operators
echo "6. Increment/Decrement Operators:\n";
$num = 5;
echo "   Initial num: $num\n";
echo "   Pre-increment (++num): " . ++$num . "\n";
echo "   Post-increment (num++): " . $num++ . " (then becomes $num)\n";
$num = 10;
echo "   Reset num to 10\n";
echo "   Pre-decrement (--num): " . --$num . "\n";
echo "   Post-decrement (num--): " . $num-- . " (then becomes $num)\n\n";

// 7. Ternary Operator
echo "7. Ternary Operator:\n";
$score = 85;
$status = ($score >= 50) ? "Pass" : "Fail";
echo "   Score: $score, Status: $status\n";

$age = 20;
$canVote = ($age >= 18) ? "Yes" : "No";
echo "   Age: $age, Can Vote: $canVote\n\n";

// 8. Null Coalescing Operator (PHP 7+)
echo "8. Null Coalescing Operator:\n";
$username = $_GET['user'] ?? 'Guest';
echo "   Username (from GET or default): $username\n";

$color = null;
$selectedColor = $color ?? 'Blue';
echo "   Selected Color: $selectedColor\n\n";

// 9. Spaceship Operator (PHP 7+)
echo "9. Spaceship Operator (<=>):\n";
$val1 = 5;
$val2 = 10;
$val3 = 5;
echo "   $val1 <=> $val2: " . ($val1 <=> $val2) . " (negative if less)\n";
echo "   $val2 <=> $val1: " . ($val2 <=> $val1) . " (positive if greater)\n";
echo "   $val1 <=> $val3: " . ($val1 <=> $val3) . " (zero if equal)\n\n";

// 10. Practical Example: Calculator
echo "10. Practical Example - Simple Calculator:\n";
$num1 = 15;
$num2 = 4;
echo "   Numbers: $num1 and $num2\n";
echo "   Sum: " . ($num1 + $num2) . "\n";
echo "   Difference: " . ($num1 - $num2) . "\n";
echo "   Product: " . ($num1 * $num2) . "\n";
echo "   Quotient: " . round($num1 / $num2, 2) . "\n";
echo "   Remainder: " . ($num1 % $num2) . "\n";

echo "\n=== End of Operators Example ===\n";
?>
