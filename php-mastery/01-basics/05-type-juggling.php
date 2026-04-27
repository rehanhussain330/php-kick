<?php
/**
 * PHP Basics: Type Juggling and Type Comparison
 * Example 5: Understanding Loose and Strict Typing
 */

echo "=== PHP Type Juggling ===\n\n";

// 1. Implicit Type Conversion (Loose Typing)
echo "1. Implicit Type Conversion:\n";
$num = 5; // Integer
$str = "10"; // String
$result = $num + $str; // PHP converts string to integer
echo "   Integer (5) + String ('10') = $result (Type: " . gettype($result) . ")\n";

$bool = true;
$sum = $num + $bool; // true becomes 1
echo "   Integer (5) + Boolean (true) = $sum\n\n";

// 2. Explicit Type Casting
echo "2. Explicit Type Casting:\n";
$value = "123";
echo "   Original: '$value' (" . gettype($value) . ")\n";
echo "   Cast to int: " . (int)$value . " (" . gettype((int)$value) . ")\n";
echo "   Cast to float: " . (float)$value . " (" . gettype((float)$value) . ")\n";
echo "   Cast to bool: " . (bool)$value . " (" . gettype((bool)$value) . ")\n";
echo "   Cast to string: " . (string)$value . " (" . gettype((string)$value) . ")\n";
echo "   Cast to array: "; var_dump((array)$value); echo "\n\n";

// 3. Loose vs Strict Comparison
echo "3. Loose (==) vs Strict (===) Comparison:\n";
$a = 5;
$b = "5";
echo "   \$a = $a (integer), \$b = '$b' (string)\n";
echo "   Loose (\$a == \$b): " . (($a == $b) ? 'true' : 'false') . "\n";
echo "   Strict (\$a === \$b): " . (($a === $b) ? 'true' : 'false') . "\n";
echo "   Why? Loose checks value, strict checks value AND type\n\n";

// 4. Truthy and Falsy Values
echo "4. Truthy and Falsy Values:\n";
$falsyValues = [0, 0.0, "", "0", null, false, []];
foreach ($falsyValues as $val) {
    $type = gettype($val);
    $display = $val === null ? 'null' : ($val === false ? 'false' : ($val === [] ? '[]' : "'$val'"));
    echo "   $display ($type) => " . (empty($val) ? 'Falsy' : 'Truthy') . "\n";
}
echo "\n";

// 5. Settype Function
echo "5. settype() Function:\n";
$var = "123abc";
echo "   Original: '$var' (" . gettype($var) . ")\n";
settype($var, 'integer');
echo "   After settype to integer: $var (" . gettype($var) . ")\n\n";

// 6. Type Juggling in Arithmetic
echo "6. Type Juggling in Arithmetic Operations:\n";
$x = "10 apples";
$y = 5;
echo "   '\$x = \"10 apples\"' + \$y = " . ($x + $y) . " (PHP extracts numeric part)\n";

$z = "apples10";
echo "   '\$z = \"apples10\"' + \$y = " . ($z + $y) . " (No numeric start = 0)\n\n";

// 7. Strict Types Declaration (PHP 7+)
echo "7. Strict Types Declaration:\n";
echo "   Using declare(strict_types=1); enforces strict typing\n";
echo "   (Demonstration commented out to avoid errors)\n\n";

// Uncomment to see strict typing in action:
/*
declare(strict_types=1);
function addStrict(int $a, int $b): int {
    return $a + $b;
}
// addStrict(5, "5"); // This would throw TypeError
*/

// 8. Nullable Types (PHP 7+)
echo "8. Nullable Types:\n";
function greet(?string $name): ?string {
    if ($name === null) {
        return null;
    }
    return "Hello, $name!";
}
echo "   greet('John'): " . greet('John') . "\n";
echo "   greet(null): " . var_export(greet(null), true) . "\n\n";

// 9. Union Types (PHP 8+)
echo "9. Union Types (PHP 8+):\n";
function processValue(int|string $value): string {
    return "Processing: $value (Type: " . gettype($value) . ")";
}
echo "   " . processValue(42) . "\n";
echo "   " . processValue("Hello") . "\n\n";

// 10. Match Expression with Type Checking (PHP 8+)
echo "10. Match Expression with Types:\n";
$input = 5;
$result = match(true) {
    is_int($input) => "Integer: $input",
    is_string($input) => "String: $input",
    is_float($input) => "Float: $input",
    default => "Unknown type"
};
echo "   Input: $input => $result\n\n";

// 11. Practical Example: Form Data Processing
echo "11. Practical Example - Form Data Processing:\n";
$formData = [
    'age' => '25',
    'price' => '19.99',
    'active' => '1',
    'quantity' => '0'
];

echo "   Raw form data (all strings):\n";
foreach ($formData as $key => $value) {
    echo "     $key: '$value' (" . gettype($value) . ")\n";
}

echo "\n   Processed data (type converted):\n";
$processedAge = (int)$formData['age'];
$processedPrice = (float)$formData['price'];
$processedActive = (bool)$formData['active'];
$processedQuantity = (int)$formData['quantity'];

echo "     age: $processedAge (" . gettype($processedAge) . ")\n";
echo "     price: $processedPrice (" . gettype($processedPrice) . ")\n";
echo "     active: " . ($processedActive ? 'true' : 'false') . " (" . gettype($processedActive) . ")\n";
echo "     quantity: $processedQuantity (" . gettype($processedQuantity) . ")\n\n";

// 12. Common Pitfalls
echo "12. Common Type Juggling Pitfalls:\n";
echo "   '0' == false: " . (('0' == false) ? 'true (DANGEROUS!)' : 'false') . "\n";
echo "   '0' === false: " . (('0' === false) ? 'true' : 'false (safe)') . "\n";
echo "   '' == 0: " . (('' == 0) ? 'true (DANGEROUS!)' : 'false') . "\n";
echo "   [] == false: " . (([] == false) ? 'true (DANGEROUS!)' : 'false') . "\n";
echo "   Always use === for comparisons!\n\n";

echo "=== End of Type Juggling Example ===\n";
?>
