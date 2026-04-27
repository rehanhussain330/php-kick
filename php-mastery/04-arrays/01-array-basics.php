<?php
/**
 * Arrays: Indexed, Associative, and Multidimensional
 * Example 1: Working with PHP Arrays
 */

echo "=== PHP Arrays ===\n\n";

// 1. Indexed Array
echo "1. Indexed Array:\n";
$fruits = ["Apple", "Banana", "Orange"];
echo "   First fruit: {$fruits[0]}\n";
echo "   All fruits: " . implode(", ", $fruits) . "\n\n";

// 2. Associative Array
echo "2. Associative Array:\n";
$person = [
    "name" => "John Doe",
    "age" => 30,
    "city" => "New York"
];
echo "   Name: {$person['name']}\n";
echo "   Age: {$person['age']}\n\n";

// 3. Multidimensional Array
echo "3. Multidimensional Array:\n";
$students = [
    ["name" => "Alice", "grade" => "A"],
    ["name" => "Bob", "grade" => "B"]
];
foreach ($students as $student) {
    echo "   {$student['name']}: Grade {$student['grade']}\n";
}
echo "\n";

// 4. Array Functions
echo "4. Common Array Functions:\n";
$numbers = [5, 2, 8, 1, 9];
echo "   Original: " . implode(", ", $numbers) . "\n";
sort($numbers);
echo "   Sorted: " . implode(", ", $numbers) . "\n";
array_push($numbers, 10);
echo "   After push: " . implode(", ", $numbers) . "\n";
echo "   Count: " . count($numbers) . "\n";
echo "   Sum: " . array_sum($numbers) . "\n";
echo "   Max: " . max($numbers) . "\n";
echo "   Min: " . min($numbers) . "\n\n";

// 5. Practical Example: Shopping Cart
echo "5. Practical Example - Shopping Cart:\n";
$cart = [
    ["item" => "Laptop", "price" => 999.99, "qty" => 1],
    ["item" => "Mouse", "price" => 29.99, "qty" => 2]
];
$total = 0;
foreach ($cart as $product) {
    $subtotal = $product['price'] * $product['qty'];
    echo "   {$product['item']}: \$$subtotal\n";
    $total += $subtotal;
}
echo "   Total: \$$total\n\n";

echo "=== End of Arrays Example ===\n";
?>
