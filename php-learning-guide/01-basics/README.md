# PHP Basics - Complete Guide

## Table of Contents
1. Introduction to PHP
2. PHP Syntax
3. Variables
4. Data Types
5. Constants
6. Operators
7. Comments
8. Output Statements

---

## 1. Introduction to PHP

PHP (Hypertext Preprocessor) is a server-side scripting language designed for web development. It's embedded into HTML and executes on the server before being sent to the client's browser.

### Key Features:
- Server-side scripting
- Open source
- Cross-platform (Windows, Linux, macOS)
- Supports multiple databases
- Easy to learn

---

## 2. PHP Syntax

### Example 1: Basic PHP Script
```php
<?php
    echo "Hello, World!";
?>
```

### Example 2: PHP with HTML
```php
<!DOCTYPE html>
<html>
<head>
    <title>PHP with HTML</title>
</head>
<body>
    <h1><?php echo "Welcome to PHP!"; ?></h1>
    <p>This is a paragraph with <?php echo "embedded"; ?> PHP.</p>
</body>
</html>
```

### Example 3: Multiple PHP Blocks
```php
<?php
    $greeting = "Good Morning";
?>
<html>
<body>
    <h1><?php echo $greeting; ?></h1>
    <?php
        $time = date("H:i");
        echo "<p>Current time: $time</p>";
    ?>
</body>
</html>
```

### Example 4: Short Echo Tag
```php
<?php
    $name = "John";
?>
<p>Hello, <?= $name ?>!</p>
```

### Example 5: PHP File Structure
```php
<?php
// Configuration section
define('SITE_NAME', 'My Website');
define('VERSION', '1.0');

// Main execution
echo "<h1>" . SITE_NAME . "</h1>";
echo "<p>Version: " . VERSION . "</p>";
?>
```

---

## 3. Variables

### Example 1: Declaring Variables
```php
<?php
    $name = "Alice";
    $age = 25;
    $salary = 50000.50;
    $isEmployed = true;
    
    echo "Name: $name<br>";
    echo "Age: $age<br>";
    echo "Salary: $salary<br>";
    echo "Employed: " . ($isEmployed ? 'Yes' : 'No') . "<br>";
?>
```

### Example 2: Variable Naming Rules
```php
<?php
    // Valid variable names
    $name = "John";
    $_age = 30;
    $salary123 = 45000;
    $myVariable = "test";
    
    // Invalid (will cause error):
    // $123name = "invalid";  // Cannot start with number
    // $my-variable = "invalid";  // Cannot use hyphen
    
    echo "$name, $_age, $salary123, $myVariable";
?>
```

### Example 3: Variable Scope
```php
<?php
    $globalVar = "I'm global";
    
    function testScope() {
        $localVar = "I'm local";
        global $globalVar;
        
        echo "Inside function: $globalVar<br>";
        echo "Local: $localVar<br>";
    }
    
    testScope();
    echo "Outside: $globalVar<br>";
    // echo $localVar; // This would cause an error
?>
```

### Example 4: Variable Variables
```php
<?php
    $name = "John";
    $$name = "Doe";  // Creates $John = "Doe"
    
    echo "$name<br>";      // Outputs: John
    echo "$$name<br>";     // Outputs: Doe
    echo "${$name}<br>";   // Outputs: Doe (better syntax)
    
    $varName = "color";
    $$varName = "blue";
    echo "$color";  // Outputs: blue
?>
```

### Example 5: Reference Variables
```php
<?php
    $a = 10;
    $b = &$a;  // $b is a reference to $a
    
    echo "a = $a, b = $b<br>";  // a = 10, b = 10
    
    $b = 20;
    echo "After changing b: a = $a, b = $b<br>";  // a = 20, b = 20
    
    $a = 30;
    echo "After changing a: a = $a, b = $b<br>";  // a = 30, b = 30
?>
```

---

## 4. Data Types

### Example 1: String Data Type
```php
<?php
    $text = "Hello World";
    $name = 'John Doe';
    $multiline = "This is a 
    multiline string";
    
    echo gettype($text) . ": $text<br>";
    echo "Length: " . strlen($text) . "<br>";
?>
```

### Example 2: Integer Data Type
```php
<?php
    $positive = 42;
    $negative = -42;
    $zero = 0;
    $hex = 0x1A;  // Hexadecimal (26 in decimal)
    $octal = 012; // Octal (10 in decimal)
    $binary = 0b1010; // Binary (10 in decimal)
    
    echo "Positive: $positive<br>";
    echo "Negative: $negative<br>";
    echo "Hex: $hex<br>";
    echo "Octal: $octal<br>";
    echo "Binary: $binary<br>";
    
    echo "Type: " . gettype($positive) . "<br>";
?>
```

### Example 3: Float (Decimal) Data Type
```php
<?php
    $price = 19.99;
    $scientific = 1.2e3;  // 1200
    $pi = 3.14159;
    
    echo "Price: $price<br>";
    echo "Scientific: $scientific<br>";
    echo "Pi: $pi<br>";
    echo "Type: " . gettype($price) . "<br>";
    
    // Float precision
    $a = 0.1 + 0.2;
    echo "0.1 + 0.2 = $a<br>";  // May show 0.30000000000000004
    echo "Rounded: " . round($a, 2) . "<br>";
?>
```

### Example 4: Boolean Data Type
```php
<?php
    $true = true;
    $false = false;
    $comparison = (5 > 3);  // true
    
    echo "True: " . ($true ? 'YES' : 'NO') . "<br>";
    echo "False: " . ($false ? 'YES' : 'NO') . "<br>";
    echo "Comparison: " . ($comparison ? 'YES' : 'NO') . "<br>";
    
    // Truthy and Falsy values
    var_dump(boolval(0));      // false
    var_dump(boolval(""));     // false
    var_dump(boolval(null));   // false
    var_dump(boolval(1));      // true
    var_dump(boolval("hello"));// true
?>
```

### Example 5: NULL Data Type
```php
<?php
    $unsetVar;  // Uninitialized variable is NULL
    $nullVar = null;
    $assignedVar = "value";
    $assignedVar = null;  // Now it's NULL
    
    var_dump($unsetVar);
    var_dump($nullVar);
    var_dump($assignedVar);
    
    // Check for NULL
    if ($nullVar === null) {
        echo "Variable is NULL<br>";
    }
    
    if (is_null($nullVar)) {
        echo "Using is_null(): Variable is NULL<br>";
    }
?>
```

### Example 6: Array Data Type (Preview)
```php
<?php
    // Indexed array
    $colors = array("Red", "Green", "Blue");
    $fruits = ["Apple", "Banana", "Orange"];  // Short syntax
    
    // Associative array
    $person = [
        "name" => "John",
        "age" => 30,
        "city" => "New York"
    ];
    
    echo "First color: " . $colors[0] . "<br>";
    echo "Person name: " . $person["name"] . "<br>";
    echo "Type: " . gettype($colors) . "<br>";
?>
```

---

## 5. Constants

### Example 1: Using define()
```php
<?php
    define("SITE_NAME", "My Website");
    define("PI", 3.14159);
    define("MAX_USERS", 100);
    
    echo SITE_NAME . "<br>";
    echo "Value of PI: " . PI . "<br>";
    echo "Max Users: " . MAX_USERS . "<br>";
?>
```

### Example 2: Using const Keyword
```php
<?php
    const DB_HOST = "localhost";
    const DB_PORT = 3306;
    const API_KEY = "abc123xyz";
    
    echo "Database Host: " . DB_HOST . "<br>";
    echo "Database Port: " . DB_PORT . "<br>";
?>
```

### Example 3: Constant Case Sensitivity
```php
<?php
    define("GREETING", "Hello", true);  // Case-insensitive (deprecated in PHP 7.3+)
    const MESSAGE = "Welcome";  // Case-sensitive by default
    
    echo GREETING . "<br>";
    echo greeting . "<br>";  // Works if case-insensitive
    echo MESSAGE . "<br>";
    // echo message;  // Error: undefined constant
?>
```

### Example 4: Constant Arrays (PHP 7+)
```php
<?php
    define("COLORS", ["red", "green", "blue"]);
    const DAYS = ["Monday", "Tuesday", "Wednesday"];
    
    echo "First color: " . COLORS[0] . "<br>";
    echo "Second day: " . DAYS[1] . "<br>";
?>
```

### Example 5: Magic Constants
```php
<?php
    echo "Line: " . __LINE__ . "<br>";
    echo "File: " . __FILE__ . "<br>";
    echo "Directory: " . __DIR__ . "<br>";
    
    function testFunction() {
        echo "Function: " . __FUNCTION__ . "<br>";
    }
    
    class TestClass {
        public function show() {
            echo "Class: " . __CLASS__ . "<br>";
            echo "Method: " . __METHOD__ . "<br>";
            echo "Namespace: " . __NAMESPACE__ . "<br>";
        }
    }
    
    testFunction();
    $obj = new TestClass();
    $obj->show();
?>
```

---

## 6. Operators

### Example 1: Arithmetic Operators
```php
<?php
    $a = 10;
    $b = 3;
    
    echo "Addition: " . ($a + $b) . "<br>";       // 13
    echo "Subtraction: " . ($a - $b) . "<br>";    // 7
    echo "Multiplication: " . ($a * $b) . "<br>"; // 30
    echo "Division: " . ($a / $b) . "<br>";       // 3.333...
    echo "Modulus: " . ($a % $b) . "<br>";        // 1
    echo "Exponentiation: " . ($a ** $b) . "<br>"; // 1000
    
    $a++;
    echo "Increment: $a<br>";  // 11
    
    $b--;
    echo "Decrement: $b<br>";  // 2
?>
```

### Example 2: Comparison Operators
```php
<?php
    $x = 5;
    $y = "5";
    
    var_dump($x == $y);   // true (equal value)
    var_dump($x === $y);  // false (different types)
    var_dump($x != $y);   // false
    var_dump($x !== $y);  // true
    var_dump($x > 3);     // true
    var_dump($x < 3);     // false
    var_dump($x >= 5);    // true
    var_dump($x <= 4);    // false
    
    // Spaceship operator (PHP 7+)
    echo "Spaceship: " . (5 <=> 3) . "<br>";  // 1
    echo "Spaceship: " . (3 <=> 5) . "<br>";  // -1
    echo "Spaceship: " . (5 <=> 5) . "<br>";  // 0
?>
```

### Example 3: Logical Operators
```php
<?php
    $a = true;
    $b = false;
    
    echo "AND (&&): " . (($a && $b) ? 'true' : 'false') . "<br>";
    echo "OR (||): " . (($a || $b) ? 'true' : 'false') . "<br>";
    echo "NOT (!): " . ((!$a) ? 'true' : 'false') . "<br>";
    echo "XOR: " . (($a xor $b) ? 'true' : 'false') . "<br>";
    
    // Practical example
    $age = 25;
    $hasLicense = true;
    
    if ($age >= 18 && $hasLicense) {
        echo "You can drive!<br>";
    }
?>
```

### Example 4: Assignment Operators
```php
<?php
    $x = 10;
    
    $x += 5;   // $x = $x + 5
    echo "+= : $x<br>";  // 15
    
    $x -= 3;   // $x = $x - 3
    echo "-= : $x<br>";  // 12
    
    $x *= 2;   // $x = $x * 2
    echo "*= : $x<br>";  // 24
    
    $x /= 4;   // $x = $x / 4
    echo "/= : $x<br>";  // 6
    
    $x %= 4;   // $x = $x % 4
    echo "%= : $x<br>";  // 2
    
    $x .= " hello";  // Concatenation
    echo ".= : $x<br>";
?>
```

### Example 5: String Operators
```php
<?php
    $firstName = "John";
    $lastName = "Doe";
    
    // Concatenation
    $fullName = $firstName . " " . $lastName;
    echo "Full Name: $fullName<br>";
    
    // Concatenation assignment
    $message = "Hello";
    $message .= ", ";
    $message .= $firstName;
    $message .= "!";
    echo "$message<br>";
    
    // String interpolation
    echo "Direct: ${firstName} ${lastName}<br>";
?>
```

---

## 7. Comments

### Example 1: Single-line Comments
```php
<?php
    // This is a single-line comment
    $x = 5;  // Inline comment
    
    # This is also a single-line comment (less common)
    echo $x;
?>
```

### Example 2: Multi-line Comments
```php
<?php
    /*
     * This is a multi-line comment
     * You can write multiple lines here
     * Useful for documentation
     */
    
    $y = 10;
    
    /* Inline multi-line comment */
    echo $y;
?>
```

### Example 3: Documentation Comments (DocBlocks)
```php
<?php
/**
 * Calculate the area of a rectangle
 * 
 * @param float $length The length of rectangle
 * @param float $width The width of rectangle
 * @return float The calculated area
 */
function calculateArea($length, $width) {
    return $length * $width;
}

echo calculateArea(5, 10);
?>
```

### Example 4: Commenting Out Code
```php
<?php
    $active = true;
    
    // Debug code - commented out
    // echo "Debug: active = $active<br>";
    
    /*
    Old implementation - disabled
    if ($active) {
        echo "Active";
    }
    */
    
    echo "Production code running<br>";
?>
```

### Example 5: TODO Comments
```php
<?php
    // TODO: Add input validation
    $username = $_GET['user'] ?? 'guest';
    
    // FIXME: Handle edge case when user is empty
    echo "Welcome, $username<br>";
    
    // HACK: Temporary workaround for bug #123
    $result = someFunction() . "";
    
    // NOTE: This function will be refactored in v2.0
    function someFunction() {
        return "data";
    }
    
    echo $result;
?>
```

---

## 8. Output Statements

### Example 1: echo Statement
```php
<?php
    echo "Hello World";
    echo "<br>";
    
    // Multiple parameters
    echo "First", " ", "Second", " ", "Third";
    echo "<br>";
    
    // With variables
    $name = "Alice";
    echo "Hello, $name!";
?>
```

### Example 2: print Statement
```php
<?php
    $returnValue = print "Hello World";
    echo "<br>Return value: $returnValue";  // Always returns 1
    
    // print only accepts one argument
    // print "First", "Second";  // Error
    
    $success = print "Success!";
    if ($success) {
        echo "<br>Print succeeded";
    }
?>
```

### Example 3: print_r() for Arrays
```php
<?php
    $array = [
        "name" => "John",
        "age" => 30,
        "colors" => ["red", "green", "blue"]
    ];
    
    echo "<pre>";
    print_r($array);
    echo "</pre>";
    
    // Return as string
    $output = print_r($array, true);
    echo "Length: " . strlen($output);
?>
```

### Example 4: var_dump() for Debugging
```php
<?php
    $string = "Hello";
    $int = 42;
    $float = 3.14;
    $bool = true;
    $null = null;
    $array = [1, 2, 3];
    
    echo "<pre>";
    var_dump($string);
    var_dump($int);
    var_dump($float);
    var_dump($bool);
    var_dump($null);
    var_dump($array);
    echo "</pre>";
?>
```

### Example 5: printf() for Formatted Output
```php
<?php
    $name = "John";
    $age = 25;
    $salary = 50000.50;
    
    printf("Name: %s<br>", $name);
    printf("Age: %d<br>", $age);
    printf("Salary: %.2f<br>", $salary);
    printf("Binary: %b<br>", 10);
    printf("Hex: %X<br>", 255);
    
    // Multiple values
    printf("%s is %d years old and earns $%.2f<br>", $name, $age, $salary);
    
    // Padding
    printf("|%10s|<br>", "Hello");  // Right padded
    printf("|%-10s|<br>", "Hello"); // Left padded
?>
```

---

## Practice Exercises

### Exercise 1: Basic Calculator
Create a PHP script that performs basic arithmetic operations on two numbers.

### Exercise 2: User Profile
Create variables for user information (name, age, email, city) and display them in a formatted way.

### Exercise 3: Temperature Converter
Convert temperature from Celsius to Fahrenheit using the formula: F = (C × 9/5) + 32

### Exercise 4: Simple Interest Calculator
Calculate simple interest using: SI = (P × R × T) / 100

### Exercise 5: Data Type Detective
Create variables of different data types and use var_dump() to identify their types.

---

## Solutions

### Solution 1: Basic Calculator
```php
<?php
    $a = 15;
    $b = 4;
    
    echo "Addition: " . ($a + $b) . "<br>";
    echo "Subtraction: " . ($a - $b) . "<br>";
    echo "Multiplication: " . ($a * $b) . "<br>";
    echo "Division: " . ($a / $b) . "<br>";
    echo "Modulus: " . ($a % $b) . "<br>";
?>
```

### Solution 2: User Profile
```php
<?php
    $name = "Jane Doe";
    $age = 28;
    $email = "jane@example.com";
    $city = "London";
    
    echo "<h2>User Profile</h2>";
    echo "Name: $name<br>";
    echo "Age: $age years<br>";
    echo "Email: $email<br>";
    echo "City: $city<br>";
?>
```

### Solution 3: Temperature Converter
```php
<?php
    $celsius = 25;
    $fahrenheit = ($celsius * 9/5) + 32;
    
    echo "$celsius°C = $fahrenheit°F<br>";
    
    // Reverse conversion
    $f = 77;
    $c = ($f - 32) * 5/9;
    echo "$f°F = $c°C<br>";
?>
```

### Solution 4: Simple Interest Calculator
```php
<?php
    $principal = 10000;
    $rate = 5.5;
    $time = 3;
    
    $simpleInterest = ($principal * $rate * $time) / 100;
    $totalAmount = $principal + $simpleInterest;
    
    echo "Principal: \$$principal<br>";
    echo "Rate: $rate%<br>";
    echo "Time: $time years<br>";
    echo "Simple Interest: \$$simpleInterest<br>";
    echo "Total Amount: \$$totalAmount<br>";
?>
```

### Solution 5: Data Type Detective
```php
<?php
    $string = "Hello";
    $integer = 42;
    $float = 3.14159;
    $boolean = true;
    $null = null;
    $array = [1, 2, 3];
    
    echo "<pre>";
    echo "String: ";
    var_dump($string);
    
    echo "Integer: ";
    var_dump($integer);
    
    echo "Float: ";
    var_dump($float);
    
    echo "Boolean: ";
    var_dump($boolean);
    
    echo "NULL: ";
    var_dump($null);
    
    echo "Array: ";
    var_dump($array);
    echo "</pre>";
?>
```

---

**Next Topic:** [Control Structures](../02-control-structures/README.md)
