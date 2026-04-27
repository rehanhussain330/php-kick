<?php
/**
 * PHP Basics: Variables and Data Types
 * Example 1: Understanding PHP Variables and Data Types
 */

echo "=== PHP Variables and Data Types ===\n\n";

// 1. String Data Type
$name = "John Doe";
$greeting = 'Hello, World!';
echo "1. String Examples:\n";
echo "   Name: $name\n";
echo "   Greeting: $greeting\n\n";

// 2. Integer Data Type
$age = 25;
$quantity = -10;
echo "2. Integer Examples:\n";
echo "   Age: $age\n";
echo "   Quantity: $quantity\n\n";

// 3. Float (Decimal) Data Type
$price = 19.99;
$pi = 3.14159;
echo "3. Float Examples:\n";
echo "   Price: \$$price\n";
echo "   Pi: $pi\n\n";

// 4. Boolean Data Type
$isStudent = true;
$isEmployed = false;
echo "4. Boolean Examples:\n";
echo "   Is Student: " . ($isStudent ? 'Yes' : 'No') . "\n";
echo "   Is Employed: " . ($isEmployed ? 'Yes' : 'No') . "\n\n";

// 5. NULL Data Type
$unsetVariable = null;
echo "5. NULL Example:\n";
echo "   Unset Variable: " . var_export($unsetVariable, true) . "\n\n";

// 6. Array Data Type
$colors = array("Red", "Green", "Blue");
$fruits = ["Apple", "Banana", "Orange"];
echo "6. Array Examples:\n";
echo "   Colors: " . implode(", ", $colors) . "\n";
echo "   Fruits: " . implode(", ", $fruits) . "\n\n";

// 7. Object Data Type
class Person {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }
}

$person = new Person("Alice", 30);
echo "7. Object Example:\n";
echo "   Person Name: {$person->name}\n";
echo "   Person Age: {$person->age}\n\n";

// 8. Checking Data Types
echo "8. Data Type Checking:\n";
echo "   Type of name: " . gettype($name) . "\n";
echo "   Type of age: " . gettype($age) . "\n";
echo "   Type of price: " . gettype($price) . "\n";
echo "   Type of isStudent: " . gettype($isStudent) . "\n";
echo "   Type of colors: " . gettype($colors) . "\n\n";

// 9. Type Casting
echo "9. Type Casting Examples:\n";
$stringNumber = "123";
$integerNumber = (int)$stringNumber;
echo "   String '123' to Integer: $integerNumber (type: " . gettype($integerNumber) . ")\n";

$floatNumber = "45.67";
$castedFloat = (float)$floatNumber;
echo "   String '45.67' to Float: $castedFloat (type: " . gettype($castedFloat) . ")\n\n";

// 10. Constants
define("PI", 3.14159);
const APP_NAME = "MyPHPApp";
echo "10. Constants:\n";
echo "   PI: " . PI . "\n";
echo "   App Name: " . APP_NAME . "\n\n";

echo "=== End of Variables and Data Types Example ===\n";
?>
