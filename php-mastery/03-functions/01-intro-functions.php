<?php
/**
 * Functions: Built-in and User-Defined Functions
 * Example 1: Introduction to PHP Functions
 */

echo "=== PHP Functions ===\n\n";

// 1. Simple User-Defined Function
echo "1. Simple Function:\n";
function sayHello() {
    echo "   Hello, World!\n";
}
sayHello();
echo "\n";

// 2. Function with Parameters
echo "2. Function with Parameters:\n";
function greet($name) {
    echo "   Hello, $name! Welcome to PHP.\n";
}
greet("Alice");
greet("Bob");
echo "\n";

// 3. Function with Return Value
echo "3. Function with Return Value:\n";
function add($a, $b) {
    return $a + $b;
}
$result = add(5, 3);
echo "   5 + 3 = $result\n\n";

// 4. Function with Default Parameter Values
echo "4. Function with Default Parameters:\n";
function introduce($name, $country = "Unknown") {
    echo "   Hi, I'm $name from $country.\n";
}
introduce("John");
introduce("Maria", "Brazil");
echo "\n";

// 5. Function with Multiple Return Values (using array)
echo "5. Function with Multiple Returns:\n";
function calculate($a, $b) {
    return [
        'sum' => $a + $b,
        'difference' => $a - $b,
        'product' => $a * $b,
        'quotient' => $b != 0 ? $a / $b : null
    ];
}
$results = calculate(10, 5);
echo "   Operations on 10 and 5:\n";
foreach ($results as $operation => $value) {
    echo "   - " . ucfirst($operation) . ": $value\n";
}
echo "\n";

// 6. Variable Number of Arguments (Variadic Functions)
echo "6. Variadic Functions:\n";
function sumAll(...$numbers) {
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}
echo "   Sum of 1,2,3: " . sumAll(1, 2, 3) . "\n";
echo "   Sum of 10,20,30,40: " . sumAll(10, 20, 30, 40) . "\n\n";

// 7. Anonymous Functions (Closures)
echo "7. Anonymous Functions:\n";
$multiply = function($a, $b) {
    return $a * $b;
};
echo "   6 × 7 = " . $multiply(6, 7) . "\n\n";

// 8. Arrow Functions (PHP 7.4+)
echo "8. Arrow Functions (PHP 7.4+):\n";
$square = fn($x) => $x * $x;
echo "   Square of 5: " . $square(5) . "\n";
echo "   Square of 12: " . $square(12) . "\n\n";

// 9. Higher-Order Functions
echo "9. Higher-Order Functions:\n";
function applyOperation($numbers, $operation) {
    $result = [];
    foreach ($numbers as $num) {
        $result[] = $operation($num);
    }
    return $result;
}

$doubles = applyOperation([1, 2, 3, 4], fn($x) => $x * 2);
echo "   Doubles: " . implode(", ", $doubles) . "\n";

$squares = applyOperation([1, 2, 3, 4], fn($x) => $x * $x);
echo "   Squares: " . implode(", ", $squares) . "\n\n";

// 10. Recursive Function
echo "10. Recursive Function - Factorial:\n";
function factorial($n) {
    if ($n <= 1) {
        return 1;
    }
    return $n * factorial($n - 1);
}
echo "   5! = " . factorial(5) . "\n";
echo "   7! = " . factorial(7) . "\n\n";

// 11. Function with Type Declarations
echo "11. Type Declarations (PHP 7+):\n";
function multiply(int $a, int $b): int {
    return $a * $b;
}
echo "   8 × 9 = " . multiply(8, 9) . "\n\n";

// 12. Strict Types
echo "12. Strict Types:\n";
declare(strict_types=1);
// Uncommenting below would cause TypeError
// echo multiply("5", "10"); 
echo "   With strict_types=1, type mismatches throw errors\n\n";

// 13. Built-in Math Functions
echo "13. Built-in Math Functions:\n";
echo "   abs(-15): " . abs(-15) . "\n";
echo "   sqrt(144): " . sqrt(144) . "\n";
echo "   pow(2, 8): " . pow(2, 8) . "\n";
echo "   round(3.7): " . round(3.7) . "\n";
echo "   ceil(4.2): " . ceil(4.2) . "\n";
echo "   floor(4.8): " . floor(4.8) . "\n";
echo "   rand(1, 100): " . rand(1, 100) . "\n";
echo "   max(5, 2, 9, 1): " . max(5, 2, 9, 1) . "\n";
echo "   min(5, 2, 9, 1): " . min(5, 2, 9, 1) . "\n\n";

// 14. Built-in String Functions
echo "14. Built-in String Functions:\n";
$text = "  Hello World  ";
echo "   Original: '$text'\n";
echo "   strlen(): " . strlen(trim($text)) . "\n";
echo "   strtoupper(): '" . strtoupper(trim($text)) . "'\n";
echo "   strtolower(): '" . strtolower(trim($text)) . "'\n";
echo "   str_replace(): '" . str_replace("World", "PHP", trim($text)) . "'\n";
echo "   substr(): '" . substr(trim($text), 0, 5) . "'\n";
echo "   strrev(): '" . strrev(trim($text)) . "'\n\n";

// 15. Practical Example: Calculator Class
echo "15. Practical Example - Calculator Functions:\n";

function calculator($a, $b, $operation = 'add') {
    switch ($operation) {
        case 'add':
            return $a + $b;
        case 'subtract':
            return $a - $b;
        case 'multiply':
            return $a * $b;
        case 'divide':
            return $b != 0 ? $a / $b : "Error: Division by zero";
        case 'modulus':
            return $a % $b;
        default:
            return "Invalid operation";
    }
}

echo "   10 + 5 = " . calculator(10, 5, 'add') . "\n";
echo "   10 - 5 = " . calculator(10, 5, 'subtract') . "\n";
echo "   10 × 5 = " . calculator(10, 5, 'multiply') . "\n";
echo "   10 ÷ 5 = " . calculator(10, 5, 'divide') . "\n";
echo "   10 % 3 = " . calculator(10, 3, 'modulus') . "\n\n";

// 16. Function with Reference Parameters
echo "16. Pass by Reference:\n";
function increment(&$number) {
    $number++;
}
$num = 10;
echo "   Before: $num\n";
increment($num);
echo "   After increment(): $num\n\n";

// 17. Static Variables in Functions
echo "17. Static Variables:\n";
function counter() {
    static $count = 0;
    $count++;
    return $count;
}
echo "   First call: " . counter() . "\n";
echo "   Second call: " . counter() . "\n";
echo "   Third call: " . counter() . "\n\n";

// 18. Callback Functions
echo "18. Callback Functions:\n";
function processArray($array, $callback) {
    $result = [];
    foreach ($array as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$numbers = [1, 2, 3, 4, 5];
$doubled = processArray($numbers, fn($x) => $x * 2);
echo "   Original: " . implode(", ", $numbers) . "\n";
echo "   Doubled: " . implode(", ", $doubled) . "\n\n";

// 19. Practical Example: Form Validation
echo "19. Practical Example - Form Validation:\n";
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateAge($age, $minAge = 18) {
    return is_numeric($age) && $age >= $minAge;
}

function validateRequired($value) {
    return !empty(trim($value));
}

$testEmail = "user@example.com";
$testAge = 25;
$testName = "John Doe";

echo "   Email validation ($testEmail): " . (validateEmail($testEmail) ? "✓ Valid" : "✗ Invalid") . "\n";
echo "   Age validation ($testAge): " . (validateAge($testAge) ? "✓ Valid" : "✗ Invalid") . "\n";
echo "   Required field ('$testName'): " . (validateRequired($testName) ? "✓ Valid" : "✗ Invalid") . "\n\n";

// 20. Function Documentation Best Practices
echo "20. Well-Documented Function Example:\n";

/**
 * Calculate compound interest
 * 
 * @param float $principal Initial investment amount
 * @param float $rate Annual interest rate (as decimal, e.g., 0.05 for 5%)
 * @param int $timesPerYear Number of times interest is compounded per year
 * @param int $years Number of years
 * @return float Final amount after compound interest
 * @throws Exception If any parameter is invalid
 */
function compoundInterest($principal, $rate, $timesPerYear, $years) {
    if ($principal <= 0 || $rate < 0 || $timesPerYear <= 0 || $years <= 0) {
        throw new Exception("Invalid parameters");
    }
    
    $amount = $principal * pow((1 + $rate / $timesPerYear), $timesPerYear * $years);
    return round($amount, 2);
}

try {
    $finalAmount = compoundInterest(1000, 0.05, 12, 10);
    echo "   \$1000 at 5% for 10 years (compounded monthly): \$$finalAmount\n";
} catch (Exception $e) {
    echo "   Error: " . $e->getMessage() . "\n";
}

echo "\n=== End of Functions Example ===\n";
?>
