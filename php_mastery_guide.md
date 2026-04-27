# The Ultimate PHP Mastery Guide: From Basics to Advanced

## Table of Contents
1. [PHP Basics](#1-php-basics)
2. [Control Structures](#2-control-structures)
3. [Functions](#3-functions)
4. [Arrays](#4-arrays)
5. [Strings](#5-strings)
6. [Object-Oriented Programming (OOP)](#6-object-oriented-programming-oop)
7. [Database Connections (MySQL)](#7-database-connections-mysql)
8. [Package Management with Composer](#8-package-management-with-composer)
9. [MongoDB Connection](#9-mongodb-connection)
10. [PostgreSQL Connection](#10-postgresql-connection)
11. [React.js Integration with PHP](#11-reactjs-integration-with-php)
12. [Tailwind CSS with PHP](#12-tailwind-css-with-php)
13. [Pattern Programs](#13-pattern-programs)
14. [Tricky & Logical Problems](#14-tricky--logical-problems)

---

## 1. PHP Basics

### Introduction
PHP (Hypertext Preprocessor) is a server-side scripting language. Code is executed on the server, and the result is sent back to the browser as plain HTML.

### Example 1: Hello World & Basic Syntax
```php
<?php
// This is a single-line comment
# This is also a single-line comment

/*
 * This is a multi-line comment
 */

echo "Hello, World!"; // Output: Hello, World!
print "Welcome to PHP"; // Output: Welcome to PHP (returns 1)

// Variables start with $
$name = "Alice";
$age = 25;
$price = 19.99;
$is_active = true;

echo "Name: $name, Age: $age";
?>
```

### Example 2: Data Types & Type Casting
```php
<?php
// String
$text = "Hello";

// Integer
$int = 100;

// Float
$float = 10.5;

// Boolean
$bool = true;

// Null
$null = null;

// Array
$arr = [1, 2, 3];

// Object (defined later)

// Type Checking
var_dump($text); // string(5) "Hello"
var_dump($int);  // int(100)

// Type Casting
$strNum = "100";
$intNum = (int) $strNum; // 100
$floatNum = (float) "10.5"; // 10.5
$boolVal = (bool) 1; // true

// gettype()
echo gettype($intNum); // integer
?>
```

### Example 3: Constants
```php
<?php
// define() function
define("SITE_NAME", "My Awesome Site");
define("PI", 3.14159);

// const keyword (faster, works in classes)
const MAX_USERS = 100;

echo SITE_NAME; // My Awesome Site
echo PI;        // 3.14159

// Constants are case-sensitive by default
// echo site_name; // Error
?>
```

### Example 4: Operators (Arithmetic, Assignment, Comparison)
```php
<?php
$a = 10;
$b = 3;

// Arithmetic
echo $a + $b;  // 13
echo $a - $b;  // 7
echo $a * $b;  // 30
echo $a / $b;  // 3.333...
echo $a % $b;  // 1 (Modulus)
echo $a ** $b; // 1000 (Exponentiation)

// Assignment
$c = 5;
$c += 2; // 7
$c -= 2; // 5
$c *= 2; // 10

// Comparison
var_dump(10 == "10");  // true (loose comparison)
var_dump(10 === "10"); // false (strict comparison: value AND type)
var_dump(10 != 5);     // true
var_dump(10 <> 5);     // true (alternative not equal)
var_dump(10 > 5);      // true
var_dump(10 <= 10);    // true

// Spaceship Operator (<=>) returns -1, 0, or 1
echo 5 <=> 10; // -1
echo 10 <=> 10; // 0
echo 10 <=> 5; // 1
?>
```

### Example 5: Logical Operators
```php
<?php
$x = true;
$y = false;

// AND (&&)
if ($x && $y) { echo "Both true"; } else { echo "False"; }

// OR (||)
if ($x || $y) { echo "At least one true"; }

// NOT (!)
if (!$y) { echo "y is false"; }

// XOR (Exclusive OR) - true if only one is true
var_dump(true xor false); // true
var_dump(true xor true);  // false
?>
```

### Example 6: String Concatenation & Interpolation
```php
<?php
$firstName = "John";
$lastName = "Doe";

// Concatenation operator (.)
$fullName = $firstName . " " . $lastName;
echo $fullName; // John Doe

// Interpolation (variables inside double quotes)
echo "Hello, $firstName"; // Hello, John

// Complex syntax
$fruit = "apple";
echo "I like ${fruit}s"; // I like apples

// Single quotes do NOT parse variables
echo 'Hello, $firstName'; // Hello, $firstName
?>
```

### Example 7: Superglobals ($_GET, $_POST)
```php
<?php
// Assume URL: script.php?name=Bob&age=30

// $_GET: Data from URL query string
$name = $_GET['name'] ?? 'Guest'; // Null coalescing operator
$age = $_GET['age'] ?? 0;

echo "Welcome $name, age $age";

// $_POST: Data from HTML Form (method="POST")
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'] ?? '';
//     $password = $_POST['password'] ?? '';
// }

// $_SERVER: Server information
echo $_SERVER['PHP_SELF']; // Current script path
echo $_SERVER['HTTP_HOST']; // Domain name
?>
```

### Example 8: Include vs Require
```php
<?php
// config.php contains database settings
// require 'config.php'; // Fatal error if file missing, script stops
// include 'config.php'; // Warning if file missing, script continues

// require_once and include_once prevent multiple inclusions
require_once 'helpers.php';
?>
```

### Example 9: Date and Time
```php
<?php
// Current date/time
echo date("Y-m-d H:i:s"); // 2023-10-27 10:30:00

// Timestamp
$time = time();
echo date("d/m/Y", $time);

// Create specific date
$birthday = mktime(0, 0, 0, 12, 25, 1990);
echo date("F j, Y", $birthday); // December 25, 1990

// DateTime Class (Better approach)
$date = new DateTime();
$date->modify('+1 day');
echo $date->format('Y-m-d');

// Difference
$d1 = new DateTime("2023-01-01");
$d2 = new DateTime("2023-12-31");
$diff = $d1->diff($d2);
echo $diff->days . " days";
?>
```

### Example 10: User Input Validation (Basic)
```php
<?php
$email = "user@example.com";

// Filter validation
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Valid email";
} else {
    echo "Invalid email";
}

$ip = "192.168.1.1";
filter_var($ip, FILTER_VALIDATE_IP);

// Sanitization
$bad_string = "<script>alert('hack')</script>Hello";
$clean = filter_var($bad_string, FILTER_SANITIZE_STRING); // Deprecated in PHP 8.1, use htmlspecialchars
$clean_safe = htmlspecialchars($bad_string, ENT_QUOTES, 'UTF-8');
echo $clean_safe; // &lt;script&gt;...
?>
```

---

## 2. Control Structures

### Example 11: If-Else Statement
```php
<?php
$score = 85;

if ($score >= 90) {
    echo "Grade: A";
} elseif ($score >= 80) {
    echo "Grade: B";
} elseif ($score >= 70) {
    echo "Grade: C";
} else {
    echo "Grade: F";
}

// Short ternary operator
$status = ($score >= 50) ? "Pass" : "Fail";
echo $status;

// Null coalescing (PHP 7+)
$username = $_GET['user'] ?? "Anonymous";
?>
```

### Example 12: Switch Statement
```php
<?php
$day = "Monday";

switch ($day) {
    case "Monday":
        echo "Start of work week";
        break;
    case "Friday":
        echo "TGIF!";
        break;
    case "Saturday":
    case "Sunday":
        echo "Weekend!";
        break;
    default:
        echo "Mid-week grind";
}

// Match expression (PHP 8+) - stricter, returns value
$result = match($day) {
    "Monday" => "Start",
    "Friday" => "End",
    "Saturday", "Sunday" => "Weekend",
    default => "Work",
};
echo $result;
?>
```

### Example 13: While Loop
```php
<?php
$i = 1;
while ($i <= 5) {
    echo $i . " ";
    $i++;
}
// Output: 1 2 3 4 5

// Do-While (executes at least once)
$j = 1;
do {
    echo $j . " ";
    $j++;
} while ($j <= 5);
?>
```

### Example 14: For Loop
```php
<?php
// Standard for loop
for ($i = 0; $i < 5; $i++) {
    echo $i . " ";
}

// Reverse loop
for ($i = 10; $i > 0; $i--) {
    if ($i == 5) continue; // Skip 5
    echo $i . " ";
    if ($i == 2) break;    // Stop at 2
}
?>
```

### Example 15: Foreach Loop (Arrays)
```php
<?php
$colors = ["Red", "Green", "Blue"];

// Value only
foreach ($colors as $color) {
    echo $color . " ";
}

// Key and Value
$ages = ["Alice" => 25, "Bob" => 30];
foreach ($ages as $name => $age) {
    echo "$name is $age\n";
}

// By Reference (modifying original array)
$numbers = [1, 2, 3];
foreach ($numbers as &$num) {
    $num *= 2;
}
unset($num); // Always unset reference after use
print_r($numbers); // [2, 4, 6]
?>
```

### Example 16: Break and Continue
```php
<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 3) continue; // Skip iteration 3
    if ($i == 7) break;    // Stop loop at 7
    echo $i . " ";
}
// Output: 1 2 4 5 6

// Nested loops with break levels
for ($i = 1; $i <= 3; $i++) {
    for ($j = 1; $j <= 3; $j++) {
        if ($j == 2) break 2; // Breaks out of BOTH loops
        echo "i=$i, j=$j\n";
    }
}
?>
```

### Example 17: Real-world Login Logic
```php
<?php
$stored_user = "admin";
$stored_pass = "secret123";

$input_user = "admin";
$input_pass = "wrong";

if ($input_user === $stored_user) {
    if ($input_pass === $stored_pass) {
        echo "Login Successful!";
    } else {
        echo "Invalid Password";
    }
} else {
    echo "User not found";
}
?>
```

### Example 18: FizzBuzz Problem
```php
<?php
for ($i = 1; $i <= 100; $i++) {
    if ($i % 15 == 0) {
        echo "FizzBuzz\n";
    } elseif ($i % 3 == 0) {
        echo "Fizz\n";
    } elseif ($i % 5 == 0) {
        echo "Buzz\n";
    } else {
        echo $i . "\n";
    }
}
?>
```

### Example 19: Alternative Syntax for Templates
```php
<?php $items = ['Apple', 'Banana', 'Cherry']; ?>

<!-- HTML Mixed with PHP -->
<ul>
<?php foreach ($items as $item): ?>
    <li><?= htmlspecialchars($item) ?></li>
<?php endforeach; ?>
</ul>

<?php if (count($items) > 0): ?>
    <p>We have items.</p>
<?php else: ?>
    <p>No items found.</p>
<?php endif; ?>
```

### Example 20: Goto (Rarely used, but exists)
```php
<?php
// Generally discouraged, but useful for breaking deep nested structures
$i = 0;
start:
    $i++;
    echo $i . " ";
    if ($i < 5) goto start;
// Output: 1 2 3 4 5
?>
```

---

## 3. Functions

### Example 21: Basic Function Definition
```php
<?php
function sayHello() {
    echo "Hello World!";
}

sayHello();

function add($a, $b) {
    return $a + $b;
}

$result = add(5, 3);
echo $result; // 8
?>
```

### Example 22: Default Arguments
```php
<?php
function greet($name = "Guest") {
    echo "Hello, $name!";
}

greet();          // Hello, Guest!
greet("Alice");   // Hello, Alice!

// Default values must be at the end
function calculate($price, $tax = 0.1) {
    return $price * (1 + $tax);
}
?>
```

### Example 23: Type Hinting & Return Types (PHP 7+)
```php
<?php
function multiply(int $a, int $b): int {
    return $a * $b;
}

// Strict types declaration (must be first line)
declare(strict_types=1);

// function divide(float $a, float $b): float {
//     return $a / $b;
// }

// Union Types (PHP 8+)
function process(int|string $value): void {
    echo "Processing: $value";
}

// Nullable types
function findUser(int $id): ?array {
    // Returns array or null
    return null;
}
?>
```

### Example 24: Variable Scope & Global
```php
<?php
$x = 10; // Global scope

function test() {
    // echo $x; // Error: Undefined variable
    global $x; // Access global
    echo $x;   // 10
    
    $y = 5; // Local scope
    return $y;
}

test();

// Using $GLOBALS array
function test2() {
    echo $GLOBALS['x'];
}
?>
```

### Example 25: Static Variables
```php
<?php
function counter() {
    static $count = 0; // Preserves value between calls
    $count++;
    echo $count . " ";
}

counter(); // 1
counter(); // 2
counter(); // 3
?>
```

### Example 26: Anonymous Functions (Closures)
```php
<?php
$greet = function($name) {
    return "Hi $name";
};

echo $greet("Bob");

// Use as callback
$numbers = [1, 2, 3, 4];
$squared = array_map(function($n) {
    return $n * $n;
}, $numbers);

print_r($squared); // [1, 4, 9, 16]
?>
```

### Example 27: Arrow Functions (PHP 7.4+)
```php
<?php
$factor = 10;

// Shorter syntax, inherits parent scope automatically
$multiply = fn($n) => $n * $factor;

echo $multiply(5); // 50

$nums = [1, 2, 3];
$doubled = array_map(fn($n) => $n * 2, $nums);
?>
```

### Example 28: Variadic Functions (...)
```php
<?php
// Accept unlimited arguments
function sum(...$numbers) {
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4, 5); // 15

// Unpacking arrays
$arr = [1, 2, 3];
echo sum(...$arr); // 6
?>
```

### Example 29: Named Arguments (PHP 8+)
```php
<?php
function createUser($name, $email, $role = "user") {
    return "$name ($role) - $email";
}

// Pass arguments by name, order doesn't matter
echo createUser(email: "a@b.com", name: "Alice"); 
// Alice (user) - a@b.com

echo createUser(role: "admin", name: "Bob", email: "b@c.com");
?>
```

### Example 30: Recursion (Factorial)
```php
<?php
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

echo factorial(5); // 120 (5*4*3*2*1)

// Fibonacci
function fib($n) {
    if ($n <= 1) return $n;
    return fib($n-1) + fib($n-2);
}
echo fib(6); // 8
?>
```

### Example 31: Generator Functions (yield)
```php
<?php
// Memory efficient for large datasets
function rangeGen($start, $end) {
    for ($i = $start; $i <= $end; $i++) {
        yield $i; // Pauses execution, yields value
    }
}

foreach (rangeGen(1, 5) as $num) {
    echo $num . " ";
}
?>
```

### Example 32: Callback Functions
```php
<?php
function applyOperation($number, callable $operation) {
    return $operation($number);
}

function double($n) { return $n * 2; }

echo applyOperation(5, 'double'); // 10
echo applyOperation(5, fn($n) => $n * 3); // 15
?>
```

### Example 33: Strict Typing
```php
<?php
declare(strict_types=1);

function addInts(int $a, int $b): int {
    return $a + $b;
}

// addInts(1.5, 2.5); // Fatal Error: Strict type mismatch
?>
```

### Example 34: Function returning Function
```php
<?php
function multiplier($factor) {
    return function($number) use ($factor) {
        return $number * $factor;
    };
}

$double = multiplier(2);
$triple = multiplier(3);

echo $double(5); // 10
echo $triple(5); // 15
?>
```

### Example 35: Built-in Function Examples
```php
<?php
// Math
echo max(1, 5, 3); // 5
echo min(1, 5, 3); // 1
echo rand(1, 100); // Random number
echo pow(2, 3);    // 8
echo sqrt(16);     // 4

// String
echo strlen("Hello"); // 5
echo strtoupper("hi"); // HI
echo substr("Hello", 1, 3); // ell

// Array
$arr = [1, 2, 3];
array_push($arr, 4);
array_pop($arr);
count($arr);
?>
```

---

## 4. Arrays

### Example 36: Indexed Arrays
```php
<?php
$fruits = ["Apple", "Banana", "Orange"];
$veggies = array("Carrot", "Potato");

echo $fruits[0]; // Apple
$fruits[1] = "Blueberry"; // Modify

// Add element
$fruits[] = "Grape";

// Iterate
foreach ($fruits as $fruit) {
    echo $fruit . "\n";
}
?>
```

### Example 37: Associative Arrays
```php
<?php
$user = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];

echo $user["name"]; // John
$user["email"] = "john@example.com"; // Add

foreach ($user as $key => $value) {
    echo "$key: $value\n";
}
?>
```

### Example 38: Multidimensional Arrays
```php
<?php
$students = [
    ["name" => "Alice", "grade" => "A"],
    ["name" => "Bob", "grade" => "B"],
    [
        "name" => "Charlie", 
        "subjects" => ["Math", "Science"]
    ]
];

echo $students[0]["name"]; // Alice
echo $students[2]["subjects"][0]; // Math
?>
```

### Example 39: Array Functions (Manipulation)
```php
<?php
$arr = [1, 2, 3, 4, 5];

// Add/Remove
array_push($arr, 6);      // Add to end
array_unshift($arr, 0);   // Add to start
array_pop($arr);          // Remove from end
array_shift($arr);        // Remove from start

// Slice
$sliced = array_slice($arr, 1, 3); // Get 3 items starting index 1

// Splice (remove/replace)
array_splice($arr, 2, 1); 

// Merge
$arr2 = [6, 7];
$merged = array_merge($arr, $arr2);

// Unique
$dups = [1, 1, 2, 3];
$unique = array_unique($dups); // [1, 2, 3]
?>
```

### Example 40: Array Searching & Filtering
```php
<?php
$nums = [1, 2, 3, 4, 5];

// Search
$key = array_search(3, $nums); // Returns index 2
$exists = in_array(3, $nums);  // true

// Filter
$evens = array_filter($nums, fn($n) => $n % 2 == 0);

// Map (Transform)
$squares = array_map(fn($n) => $n * $n, $nums);

// Reduce
$sum = array_reduce($nums, fn($carry, $n) => $carry + $n, 0);
?>
```

### Example 41: Sorting Arrays
```php
<?php
$nums = [4, 1, 3, 2];
sort($nums);       // Ascending: [1, 2, 3, 4]
rsort($nums);      // Descending: [4, 3, 2, 1]

$assoc = ["b" => 2, "a" => 1];
asort($assoc);     // Sort by value, keep keys
ksort($assoc);     // Sort by key
arsort($assoc);    // Descending by value

// Custom sort
usort($nums, fn($a, $b) => $b <=> $a); // Descending
?>
```

### Example 42: List / Destructuring (PHP 7.1+)
```php
<?php
$data = [1, 2, 3];
list($a, $b, $c) = $data;
// Or short syntax:
[$x, $y, $z] = $data;

// Associative destructuring
$user = ["id" => 1, "name" => "Ali"];
["name" => $userName] = $user;
echo $userName; // Ali

// Skip elements
[, , $third] = $data; // $third = 3
?>
```

### Example 43: Array Spread Operator (PHP 8.1+)
```php
<?php
$part1 = [1, 2];
$part2 = [3, 4];

// Merge using spread
$full = [...$part1, ...$part2]; // [1, 2, 3, 4]

// With keys (later keys overwrite earlier)
$a = ["x" => 1];
$b = ["y" => 2, ...$a]; // ["y" => 2, "x" => 1]
?>
```

### Example 44: Stack & Queue Implementation
```php
<?php
// Stack (LIFO)
$stack = [];
array_push($stack, "A");
array_push($stack, "B");
$top = array_pop($stack); // "B"

// Queue (FIFO)
$queue = [];
array_push($queue, "X");
array_push($queue, "Y");
$first = array_shift($queue); // "X"
?>
```

### Example 45: Range & Combine
```php
<?php
// Create range
$letters = range('A', 'E'); // ['A', 'B', 'C', 'D', 'E']
$numbers = range(0, 10, 2); // [0, 2, 4, 6, 8, 10]

// Combine keys and values
$keys = ["name", "age"];
$values = ["Tom", 25];
$person = array_combine($keys, $values);
// ["name" => "Tom", "age" => 25]
?>
```

---

## 5. Strings

### Example 46: String Creation & Quotes
```php
<?php
$single = 'Hello';
$double = "World";
$heredoc = <<<EOT
This is a heredoc string.
It preserves newlines and $variables work.
EOT;

$nowdoc = <<<'EOT'
Nowdoc does not parse $variables.
EOT;
?>
```

### Example 47: String Length & Position
```php
<?php
$str = "Hello World";
echo strlen($str);        // 11
echo strpos($str, "World"); // 6 (index)
echo strrpos($str, "o");  // Last occurrence of 'o'
echo str_contains($str, "World"); // true (PHP 8+)
echo str_starts_with($str, "Hello"); // true (PHP 8+)
?>
```

### Example 48: Substring & Replacement
```php
<?php
$str = "Hello World";

// Extract
echo substr($str, 6, 5); // "World"
echo substr($str, -5);   // "World" (from end)

// Replace
echo str_replace("World", "PHP", $str); // "Hello PHP"
echo str_ireplace("world", "PHP", $str); // Case-insensitive

// Limit replacements
echo substr_replace($str, "Universe", 6); // "Hello Universe"
?>
```

### Example 49: Case Conversion
```php
<?php
$str = "Hello World";
echo strtolower($str); // "hello world"
echo strtoupper($str); // "HELLO WORLD"
echo ucfirst($str);    // "Hello world" (First char upper)
echo ucwords($str);    // "Hello World" (All words upper)
echo lcfirst($str);    // "hello World" (First char lower)
?>
```

### Example 50: Trimming Whitespace
```php
<?php
$str = "   Hello   ";
echo trim($str);    // "Hello" (both sides)
echo ltrim($str);   // "Hello   " (left)
echo rtrim($str);   // "   Hello" (right)

// Trim specific characters
$num = "0012300";
echo trim($num, "0"); // "123"
?>
```

### Example 51: String Formatting
```php
<?php
$name = "Alice";
$age = 25;

// printf / sprintf
echo sprintf("Name: %s, Age: %d", $name, $age);

// Number formatting
$price = 1234.567;
echo number_format($price, 2, '.', ','); // "1,234.57"

// Padding
echo str_pad("Hello", 10, "*", STR_PAD_RIGHT); // "Hello*****"
echo str_pad("Hello", 10, "*", STR_PAD_LEFT);  // "*****Hello"
?>
```

### Example 52: Explode & Implode
```php
<?php
$str = "apple,banana,cherry";
$arr = explode(",", $str); // ["apple", "banana", "cherry"]

$glue = "-";
$newStr = implode($glue, $arr); // "apple-banana-cherry"

// Limit explode parts
$parts = explode(",", "a,b,c,d", 2); // ["a", "b,c,d"]
?>
```

### Example 53: HTML Special Chars
```php
<?php
$input = "<script>alert('XSS')</script>";

// Prevent XSS
$safe = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
echo $safe; // &lt;script&gt;alert(&#039;XSS&#039;)&lt;/script&gt;

// Decode
echo htmlspecialchars_decode($safe);
?>
```

### Example 54: Regular Expressions (Regex)
```php
<?php
$email = "test@example.com";

// Validate email pattern
if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
    echo "Valid Email";
}

// Extract numbers
$text = "Order 123 and 456";
preg_match_all("/\d+/", $text, $matches);
print_r($matches[0]); // ["123", "456"]

// Replace with regex
$new = preg_replace("/\d+/", "#", $text); // "Order # and #"
?>
```

### Example 55: String Comparison
```php
<?php
$a = "apple";
$b = "banana";

// strcmp (case sensitive): returns <0, 0, >0
echo strcmp($a, $b); // Negative

// strcasecmp (case insensitive)
echo strcasecmp("Apple", "apple"); // 0

// Similarity
similar_text("Hello World", "Hello PHP");
levenshtein("cat", "cut"); // 1 edit distance
?>
```

### Example 56: Cryptography (Hashing)
```php
<?php
$password = "mySecret123";

// Hash password (Bcrypt)
$hash = password_hash($password, PASSWORD_DEFAULT);

// Verify
if (password_verify($password, $hash)) {
    echo "Password matches!";
}

// MD5/SHA1 (Not recommended for passwords, okay for checksums)
echo md5("data");
echo sha1("data");
?>
```

### Example 57: UUID Generation (Simple)
```php
<?php
function generateUUID() {
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
echo generateUUID();
?>
```

### Example 58: Word Wrap & Chunking
```php
<?php
$text = "A very long string that needs wrapping.";
echo word_wrap($text, 10, "<br>\n");

// Split into chunks
$str = "ABCDEFG";
print_r(str_split($str, 2)); // ["AB", "CD", "EF", "G"]
?>
```

### Example 59: Parse Str (Query String)
```php
<?php
$query = "name=John&age=30&city=NY";
parse_str($query, $output);
echo $output['name']; // John
echo $output['age'];  // 30
?>
```

### Example 60: Locale & Money Format
```php
<?php
// Set locale (must be installed on OS)
// setlocale(LC_MONETARY, 'en_US');
$money = 1234.56;
// echo money_format("%i", $money); // Deprecated in PHP 8.1, use NumberFormatter
$fmt = new NumberFormatter("en_US", NumberFormatter::CURRENCY);
echo $fmt->formatCurrency($money, "USD"); // $1,234.56
?>
```

---

## 6. Object-Oriented Programming (OOP)

### Example 61: Basic Class & Object
```php
<?php
class Car {
    // Properties
    public $color;
    public $model;

    // Constructor
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    // Method
    public function drive() {
        return "Driving a $this->color $this->model";
    }
}

$myCar = new Car("Red", "Toyota");
echo $myCar->drive();
?>
```

### Example 62: Visibility (Public, Private, Protected)
```php
<?php
class User {
    public $name;      // Accessible everywhere
    private $password; // Accessible only inside class
    protected $id;     // Accessible in class and subclasses

    public function __construct($name, $pass, $id) {
        $this->name = $name;
        $this->password = $pass;
        $this->id = $id;
    }

    public function login($attemptPass) {
        if ($attemptPass === $this->password) {
            return "Logged in";
        }
        return "Failed";
    }
}
?>
```

### Example 63: Inheritance
```php
<?php
class Animal {
    public function eat() {
        return "Eating...";
    }
}

class Dog extends Animal {
    public function bark() {
        return "Woof!";
    }
    
    // Overriding
    public function eat() {
        return parent::eat() . " dog food.";
    }
}

$dog = new Dog();
echo $dog->eat();  // Eating... dog food.
echo $dog->bark(); // Woof!
?>
```

### Example 64: Abstract Classes
```php
<?php
abstract class Shape {
    abstract public function area(); // Must be implemented

    public function describe() {
        return "I am a shape";
    }
}

class Circle extends Shape {
    private $radius;
    public function __construct($r) { $this->radius = $r; }
    
    public function area() {
        return pi() * $this->radius ** 2;
    }
}

// $shape = new Shape(); // Error: Cannot instantiate abstract class
$circle = new Circle(5);
echo $circle->area();
?>
```

### Example 65: Interfaces
```php
<?php
interface Flyable {
    public function fly();
}

interface Swimmable {
    public function swim();
}

class Duck implements Flyable, Swimmable {
    public function fly() { return "Flying"; }
    public function swim() { return "Swimming"; }
}

class Airplane implements Flyable {
    public function fly() { return "Soaring"; }
    // No need to implement swim
}
?>
```

### Example 66: Traits (Multiple Inheritance Simulation)
```php
<?php
trait Loggable {
    public function log($msg) {
        echo "[LOG]: $msg\n";
    }
}

trait Timestampable {
    public function getTimestamp() {
        return time();
    }
}

class Order {
    use Loggable, Timestampable;
}

$order = new Order();
$order->log("Order created");
echo $order->getTimestamp();
?>
```

### Example 67: Static Properties & Methods
```php
<?php
class Counter {
    public static $count = 0;

    public static function increment() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

Counter::increment();
Counter::increment();
echo Counter::getCount(); // 2
?>
```

### Example 68: Constants in Classes
```php
<?php
class Math {
    const PI = 3.14159;
    
    public static function getPi() {
        return self::PI;
    }
}

echo Math::PI;
echo Math::getPi();
?>
```

### Example 69: Constructor Promotion (PHP 8+)
```php
<?php
class Product {
    // Promote properties directly in constructor
    public function __construct(
        public string $name,
        public float $price,
        private int $stock = 0
    ) {}
    
    public function getInfo() {
        return "{$this->name}: \${$this->price}";
    }
}

$p = new Product("Laptop", 999.99);
echo $p->getInfo();
?>
```

### Example 70: Magic Methods (__get, __set, __toString)
```php
<?php
class Person {
    private $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function __toString() {
        return "Person Object";
    }
}

$p = new Person();
$p->name = "Alice"; // Calls __set
echo $p->name;      // Calls __get
echo $p;            // Calls __toString: "Person Object"
?>
```

### Example 71: Cloning Objects
```php
<?php
class Point {
    public $x;
    public function __construct($x) { $this->x = $x; }
    
    public function __clone() {
        $this->x = $this->x * 2; // Modify on clone
    }
}

$p1 = new Point(5);
$p2 = clone $p1; // Creates copy, triggers __clone

echo $p1->x; // 5
echo $p2->x; // 10
?>
```

### Example 72: Final Classes & Methods
```php
<?php
final class Database {
    // Cannot be extended
    public function connect() {}
}

class ParentClass {
    final public function critical() {
        // Cannot be overridden
    }
}
?>
```

### Example 73: Late Static Binding (::class, static::)
```php
<?php
class Base {
    public static function who() {
        echo __CLASS__;
    }
    public static function test() {
        static::who(); // Called on the runtime class
    }
}

class Child extends Base {
    public static function who() {
        echo __CLASS__;
    }
}

Child::test(); // Outputs "Child" instead of "Base"
?>
```

### Example 74: Type Declarations (OOP)
```php
<?php
class Engine {}
class Car {
    private Engine $engine;
    
    public function setEngine(Engine $e): void {
        $this->engine = $e;
    }
    
    public function getEngine(): Engine {
        return $this->engine;
    }
}
?>
```

### Example 75: Real-Time Example: E-commerce Cart System
```php
<?php
interface PaymentInterface {
    public function pay(float $amount): bool;
}

class PayPal implements PaymentInterface {
    public function pay(float $amount): bool {
        echo "Paying $amount via PayPal\n";
        return true;
    }
}

class Stripe implements PaymentInterface {
    public function pay(float $amount): bool {
        echo "Paying $amount via Stripe\n";
        return true;
    }
}

class CartItem {
    public function __construct(
        public string $name,
        public float $price,
        public int $qty
    ) {}
    
    public function getTotal(): float {
        return $this->price * $this->qty;
    }
}

class Cart {
    private array $items = [];
    
    public function add(CartItem $item) {
        $this->items[] = $item;
    }
    
    public function getTotal(): float {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item->getTotal();
        }
        return $total;
    }
    
    public function checkout(PaymentInterface $payment): bool {
        $total = $this->getTotal();
        return $payment->pay($total);
    }
}

// Usage
$cart = new Cart();
$cart->add(new CartItem("Book", 10.0, 2));
$cart->add(new CartItem("Pen", 2.0, 5));

$paypal = new PayPal();
$cart->checkout($paypal); // Paying 30 via PayPal
?>
```

---

## 7. Database Connections (MySQL)

### Example 76: PDO Connection (Best Practice)
```php
<?php
$host = 'localhost';
$db   = 'test_db';
$user = 'root';
$pass = 'password';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Connected successfully";
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
```

### Example 77: Prepared Statements (INSERT)
```php
<?php
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':name' => 'John Doe',
    ':email' => 'john@example.com'
]);

echo "New record created successfully. ID: " . $pdo->lastInsertId();
?>
```

### Example 78: Select & Fetch
```php
<?php
$stmt = $pdo->query("SELECT * FROM users WHERE age > 18");

// Fetch all
$users = $stmt->fetchAll();

// Fetch one
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([1]);
$user = $stmt->fetch();

foreach ($users as $user) {
    echo $user['name'] . "\n";
}
?>
```

### Example 79: Update & Delete
```php
<?php
// Update
$sql = "UPDATE users SET email = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute(['new@email.com', 1]);

// Delete
$sql = "DELETE FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([1]);

echo "Rows affected: " . $stmt->rowCount();
?>
```

### Example 80: Transactions
```php
<?php
try {
    $pdo->beginTransaction();

    $pdo->exec("INSERT INTO accounts (balance) VALUES (100)");
    $pdo->exec("INSERT INTO accounts (balance) VALUES (200)");

    // If everything ok
    $pdo->commit();
    echo "Transaction committed";
} catch (Exception $e) {
    // If error, rollback
    $pdo->rollBack();
    echo "Transaction failed: " . $e->getMessage();
}
?>
```

---

## 8. Package Management with Composer

### Installation Steps
1. Download Composer: `php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"`
2. Run Installer: `php composer-setup.php`
3. Move to bin: `mv composer.phar /usr/local/bin/composer`

### Example 81: Initializing a Project
```bash
mkdir my-project
cd my-project
composer init
# Follow prompts (name, description, package type, etc.)
```

### Example 82: Installing Packages
```bash
# Install a package
composer require monolog/monolog

# Install dev dependency
composer require --dev phpunit/phpunit

# Install specific version
composer require guzzlehttp/guzzle:^7.0
```

### Example 83: Autoloading (PSR-4)
**composer.json**:
```json
{
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }
}
```
Run: `composer dump-autoload`

**Usage**:
```php
require 'vendor/autoload.php';
use App\Controllers\UserController;
```

### Example 84: Using a Library (Monolog)
```php
<?php
require 'vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('name');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
$log->warning('Something happened');
?>
```

### Example 85: Updating & Removing
```bash
composer update # Update all dependencies
composer update vendor/package # Update specific
composer remove vendor/package # Remove
composer show # List installed
```

---

## 9. MongoDB Connection

**Prerequisite**: `composer require mongodb/mongodb`

### Example 86: Connecting to MongoDB
```php
<?php
require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$database = $client->test_db;
$collection = $database->users;
?>
```

### Example 87: Insert Document
```php
<?php
$result = $collection->insertOne([
    'name' => 'Alice',
    'age' => 25,
    'hobbies' => ['reading', 'coding']
]);
echo "Inserted ID: " . $result->getInsertedId();
?>
```

### Example 88: Find Documents
```php
<?php
// Find one
$user = $collection->findOne(['name' => 'Alice']);

// Find many
$cursor = $collection->find(['age' => ['$gt' => 20]]);

foreach ($cursor as $user) {
    echo $user['name'] . "\n";
}
?>
```

### Example 89: Update & Delete
```php
<?php
// Update
$collection->updateOne(
    ['name' => 'Alice'],
    ['$set' => ['age' => 26]]
);

// Delete
$collection->deleteOne(['name' => 'Alice']);
?>
```

### Example 90: Aggregation Pipeline
```php
<?php
$pipeline = [
    ['$match' => ['age' => ['$gte' => 18]]],
    ['$group' => ['_id' => '$city', 'count' => ['$sum' => 1]]]
];
$results = $collection->aggregate($pipeline);
?>
```

---

## 10. PostgreSQL Connection

**Prerequisite**: Enable `pdo_pgsql` in php.ini

### Example 91: PDO Connection to PostgreSQL
```php
<?php
$host = 'localhost';
$db   = 'test_db';
$user = 'postgres';
$pass = 'password';

$dsn = "pgsql:host=$host;port=5432;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to PostgreSQL";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
```

### Example 92: PostgreSQL Specific Features (JSONB)
```php
<?php
// Insert JSONB
$sql = "INSERT INTO products (name, attributes) VALUES (:name, :attrs::jsonb)";
$stmt = $pdo->prepare($sql);
$attrs = json_encode(['color' => 'red', 'size' => 'M']);
$stmt->execute([':name' => 'T-Shirt', ':attrs' => $attrs]);

// Query JSONB
$sql = "SELECT * FROM products WHERE attributes->>'color' = 'red'";
?>
```

### Example 93: Using pg_query (Non-PDO)
```php
<?php
$conn = pg_connect("host=localhost dbname=test_db user=postgres password=pass");
$result = pg_query($conn, "SELECT * FROM users");
while ($row = pg_fetch_assoc($result)) {
    echo $row['name'];
}
pg_close($conn);
?>
```

---

## 11. React.js Integration with PHP

**Architecture**: PHP acts as API (Backend), React as Frontend.

### Step 1: PHP API Endpoint (`api/users.php`)
```php
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

require 'vendor/autoload.php';
// DB connection logic here...

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // Mock data
    $users = [
        ["id" => 1, "name" => "Alice"],
        ["id" => 2, "name" => "Bob"]
    ];
    echo json_encode($users);
} elseif ($method === 'POST') {
    $input = json_decode(file_get_contents("php://input"), true);
    // Save $input to DB
    echo json_encode(["message" => "User created", "data" => $input]);
}
?>
```

### Step 2: React Component (`App.js`)
```javascript
import React, { useEffect, useState } from 'react';

function App() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    fetch('http://localhost/myproject/api/users.php')
      .then(res => res.json())
      .then(data => setUsers(data));
  }, []);

  return (
    <div>
      <h1>User List</h1>
      <ul>
        {users.map(u => <li key={u.id}>{u.name}</li>)}
      </ul>
    </div>
  );
}
export default App;
```

### Example 94: Handling CORS in PHP
```php
<?php
// Allow specific origin
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}
?>
```

### Example 95: Sending POST Request from React
```javascript
const addUser = async () => {
  const newUser = { name: "Charlie" };
  await fetch('http://localhost/api/users.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(newUser)
  });
};
```

---

## 12. Tailwind CSS with PHP

Since PHP is server-side, we typically use Node.js to build Tailwind, then serve the CSS via PHP.

### Setup Steps
1. `npm install -D tailwindcss`
2. `npx tailwindcss init`
3. Configure `tailwind.config.js`:
   ```js
   content: ["./src/**/*.php", "./src/**/*.html"],
   ```
4. Build: `npx tailwindcss -i ./src/input.css -o ./public/style.css --watch`

### Example 96: Using Tailwind in PHP View
**src/index.php**:
```php
<!DOCTYPE html>
<html>
<head>
    <link href="/public/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md">
        <h1 class="text-3xl font-bold text-blue-600 mb-4">
            Hello Tailwind with PHP
        </h1>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Click Me
        </button>
    </div>
</body>
</html>
```

### Example 97: Dynamic Classes in PHP
```php
<?php
$status = 'active';
$class = $status === 'active' ? 'text-green-500' : 'text-red-500';
?>
<span class="<?= $class ?>">Status: <?= $status ?></span>
```

### Example 98: Using CDN (Development Only)
```html
<script src="https://cdn.tailwindcss.com"></script>
```

---

## 13. Pattern Programs

### Example 99: Right-Angled Triangle
```php
<?php
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
/*
* 
* * 
* * * 
* * * * 
* * * * * 
*/
?>
```

### Example 100: Inverted Triangle
```php
<?php
$rows = 5;
for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "\n";
}
?>
```

### Example 101: Pyramid
```php
<?php
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    // Spaces
    for ($j = 1; $j <= $rows - $i; $j++) {
        echo " ";
    }
    // Stars
    for ($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }
    echo "\n";
}
?>
```

### Example 102: Number Pyramid
```php
<?php
$rows = 5;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "\n";
}
?>
```

### Example 103: Floyd's Triangle
```php
<?php
$rows = 5;
$num = 1;
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $num++ . " ";
    }
    echo "\n";
}
?>
```

### Example 104: Hollow Square
```php
<?php
$n = 5;
for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $n; $j++) {
        if ($i == 1 || $i == $n || $j == 1 || $j == $n) {
            echo "* ";
        } else {
            echo "  ";
        }
    }
    echo "\n";
}
?>
```

### Example 105: Diamond Pattern
```php
<?php
$n = 5;
// Upper half
for ($i = 1; $i <= $n; $i++) {
    echo str_repeat(" ", $n - $i) . str_repeat("* ", $i) . "\n";
}
// Lower half
for ($i = $n - 1; $i >= 1; $i--) {
    echo str_repeat(" ", $n - $i) . str_repeat("* ", $i) . "\n";
}
?>
```

---

## 14. Tricky & Logical Problems

### Example 106: Swap Two Numbers Without Temp
```php
<?php
$a = 5; $b = 10;

// Method 1: Arithmetic
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;

// Method 2: List (PHP 7.1+)
// [$a, $b] = [$b, $a];

echo "$a, $b"; // 10, 5
?>
```

### Example 107: Check Prime Number
```php
<?php
function isPrime($n) {
    if ($n <= 1) return false;
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}
echo isPrime(17) ? "Prime" : "Not Prime";
?>
```

### Example 108: Reverse a Number
```php
<?php
$num = 12345;
$rev = 0;
$temp = $num;

while ($temp > 0) {
    $digit = $temp % 10;
    $rev = $rev * 10 + $digit;
    $temp = intdiv($temp, 10);
}
echo $rev; // 54321
?>
```

### Example 109: Armstrong Number
```php
<?php
$num = 153;
$digits = str_split($num);
$sum = 0;
$count = count($digits);

foreach ($digits as $d) {
    $sum += pow($d, $count);
}

echo ($sum == $num) ? "Armstrong" : "Not Armstrong";
?>
```

### Example 110: Fibonacci Series Iterative
```php
<?php
$n = 10;
$a = 0; $b = 1;
echo "$a $b ";
for ($i = 2; $i < $n; $i++) {
    $c = $a + $b;
    echo "$c ";
    $a = $b;
    $b = $c;
}
?>
```

### Example 111: Find Duplicate in Array
```php
<?php
$arr = [1, 2, 3, 2, 4];
$duplicates = array_diff_key($arr, array_unique($arr));
print_r($duplicates); // Shows duplicate entries
?>
```

### Example 112: Anagram Check
```php
<?php
function isAnagram($s1, $s2) {
    $a1 = str_split(strtolower($s1));
    $a2 = str_split(strtolower($s2));
    sort($a1);
    sort($a2);
    return $a1 === $a2;
}
echo isAnagram("Listen", "Silent") ? "Yes" : "No";
?>
```

### Example 113: Palindrome Check
```php
<?php
$str = "madam";
if ($str === strrev($str)) {
    echo "Palindrome";
}
?>
```

### Example 114: Second Largest Number
```php
<?php
$arr = [10, 50, 30, 50, 20];
rsort($arr);
// Remove duplicates first if needed
$unique = array_unique($arr);
echo $unique[1]; // 30
?>
```

### Example 115: Count Vowels
```php
<?php
$str = "Hello World";
$vowels = ['a','e','i','o','u'];
$count = 0;
foreach (str_split(strtolower($str)) as $char) {
    if (in_array($char, $vowels)) $count++;
}
echo $count; // 3
?>
```

### Example 116: Remove Duplicates from Array Manually
```php
<?php
$arr = [1, 2, 2, 3, 4, 4];
$result = [];
foreach ($arr as $val) {
    if (!in_array($val, $result)) {
        $result[] = $val;
    }
}
print_r($result);
?>
```

### Example 117: GCD (Greatest Common Divisor)
```php
<?php
function gcd($a, $b) {
    return $b == 0 ? $a : gcd($b, $a % $b);
}
echo gcd(48, 18); // 6
?>
```

### Example 118: LCM (Least Common Multiple)
```php
<?php
function lcm($a, $b) {
    return ($a * $b) / gcd($a, $b);
}
echo lcm(4, 6); // 12
?>
```

### Example 119: Binary to Decimal
```php
<?php
$bin = "1010";
echo bindec($bin); // 10

// Manual
$dec = 0;
$len = strlen($bin);
for ($i = 0; $i < $len; $i++) {
    $dec += $bin[$i] * pow(2, $len - $i - 1);
}
?>
```

### Example 120: Decimal to Binary
```php
<?php
$dec = 10;
echo decbin($dec); // 1010
?>
```

---

## Conclusion
This guide covers the journey from basic syntax to advanced architecture, database integration, and modern frontend connectivity. Practice these examples, modify them, and build projects to master PHP.
