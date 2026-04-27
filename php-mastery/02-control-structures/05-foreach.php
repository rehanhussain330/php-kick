<?php
/**
 * Control Structures: Foreach Loop
 * Example 5: Iterating Over Arrays
 */

echo "=== Foreach Loops ===\n\n";

// 1. Basic Foreach with Indexed Array
echo "1. Basic Foreach - Indexed Array:\n";
$fruits = ["Apple", "Banana", "Orange"];
foreach ($fruits as $fruit) {
    echo "   - $fruit\n";
}
echo "\n";

// 2. Foreach with Key and Value
echo "2. Foreach with Key and Value:\n";
$colors = ["red" => "#FF0000", "green" => "#00FF00", "blue" => "#0000FF"];
foreach ($colors as $name => $code) {
    echo "   $name: $code\n";
}
echo "\n";

// 3. Foreach vs For Loop
echo "3. Foreach vs For Loop:\n";
$numbers = [10, 20, 30, 40, 50];
echo "   Foreach (cleaner):\n";
foreach ($numbers as $num) {
    echo "   $num ";
}
echo "\n   For (more control):\n";
for ($i = 0; $i < count($numbers); $i++) {
    echo "   {$numbers[$i]} ";
}
echo "\n\n";

// 4. Foreach with Multidimensional Array
echo "4. Foreach - Multidimensional Array:\n";
$students = [
    ["name" => "John", "age" => 20, "grade" => "A"],
    ["name" => "Jane", "age" => 22, "grade" => "B"],
    ["name" => "Bob", "age" => 21, "grade" => "A+"]
];

foreach ($students as $student) {
    echo "   {$student['name']}, Age: {$student['age']}, Grade: {$student['grade']}\n";
}
echo "\n";

// 5. Foreach with Reference (Modify Original Array)
echo "5. Foreach with Reference (&):\n";
$prices = [100, 200, 300];
echo "   Original prices: " . implode(", ", $prices) . "\n";

foreach ($prices as &$price) {
    $price *= 1.10; // Add 10%
}
unset($price); // Break reference

echo "   After 10% increase: " . implode(", ", $prices) . "\n\n";

// 6. Practical Example: Shopping Cart Total
echo "6. Practical Example - Shopping Cart:\n";
$cart = [
    "Laptop" => 999.99,
    "Mouse" => 29.99,
    "Keyboard" => 79.99,
    "Monitor" => 299.99
];

$total = 0;
echo "   Items in cart:\n";
foreach ($cart as $item => $price) {
    echo "   - $item: \$$price\n";
    $total += $price;
}
echo "   ------------------------\n";
echo "   Total: $" . number_format($total, 2) . "\n\n";

// 7. Foreach with Conditional Filtering
echo "7. Foreach - Filter Even Numbers:\n";
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
echo "   Even numbers: ";
foreach ($numbers as $num) {
    if ($num % 2 == 0) {
        echo "$num ";
    }
}
echo "\n\n";

// 8. Nested Foreach Loops
echo "8. Nested Foreach - Matrix Display:\n";
$matrix = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];

foreach ($matrix as $rowIndex => $row) {
    echo "   Row $rowIndex: ";
    foreach ($row as $colIndex => $value) {
        echo "$value ";
    }
    echo "\n";
}
echo "\n";

// 9. Foreach with Array Functions
echo "9. Foreach - Transform Array:\n";
$words = ["hello", "world", "php"];
$uppercase = [];

foreach ($words as $word) {
    $uppercase[] = strtoupper($word);
}

echo "   Original: " . implode(", ", $words) . "\n";
echo "   Uppercase: " . implode(", ", $uppercase) . "\n\n";

// 10. Practical Example: Employee Salaries
echo "10. Practical Example - Employee Salaries:\n";
$employees = [
    "Alice" => 50000,
    "Bob" => 60000,
    "Charlie" => 55000,
    "Diana" => 70000
];

echo "   Salary Report:\n";
$totalSalary = 0;
foreach ($employees as $name => $salary) {
    $tax = $salary * 0.20;
    $netSalary = $salary - $tax;
    echo "   $name: Gross=\$$salary, Tax=\$$tax, Net=\$$netSalary\n";
    $totalSalary += $salary;
}
echo "   Total Payroll: \$$totalSalary\n";
echo "   Average Salary: \$$" . number_format($totalSalary / count($employees), 2) . "\n\n";

// 11. Foreach with Break
echo "11. Foreach with Break:\n";
$searchList = ["apple", "banana", "cherry", "date", "elderberry"];
$searchTerm = "cherry";
$found = false;

foreach ($searchList as $index => $item) {
    if ($item === $searchTerm) {
        echo "   Found '$searchTerm' at position $index!\n";
        $found = true;
        break;
    }
}
if (!$found) {
    echo "   '$searchTerm' not found.\n";
}
echo "\n";

// 12. Foreach with Continue
echo "12. Foreach with Continue:\n";
$mixedArray = [1, "text", 3, null, 5, "", 7];
echo "   Valid numbers only: ";
foreach ($mixedArray as $value) {
    if (!is_numeric($value) || empty($value)) {
        continue;
    }
    echo "$value ";
}
echo "\n\n";

// 13. Practical Example: Grade Analysis
echo "13. Practical Example - Grade Analysis:\n";
$grades = [85, 92, 78, 90, 65, 88, 72, 95];
$categories = [
    "excellent" => 0,
    "good" => 0,
    "average" => 0,
    "needs_improvement" => 0
];

foreach ($grades as $grade) {
    if ($grade >= 90) {
        $categories["excellent"]++;
    } elseif ($grade >= 80) {
        $categories["good"]++;
    } elseif ($grade >= 70) {
        $categories["average"]++;
    } else {
        $categories["needs_improvement"]++;
    }
}

echo "   Grade Distribution:\n";
foreach ($categories as $category => $count) {
    echo "   - " . ucwords(str_replace("_", " ", $category)) . ": $count students\n";
}
echo "\n";

// 14. Foreach with String Characters
echo "14. Foreach - String Characters:\n";
$text = "PHP";
echo "   Characters in '$text': ";
foreach (str_split($text) as $char) {
    echo "$char ";
}
echo "\n\n";

// 15. Practical Example: Inventory Management
echo "15. Practical Example - Inventory Check:\n";
$inventory = [
    "SKU001" => ["name" => "Laptop", "qty" => 15, "min" => 10],
    "SKU002" => ["name" => "Mouse", "qty" => 5, "min" => 20],
    "SKU003" => ["name" => "Keyboard", "qty" => 25, "min" => 15],
    "SKU004" => ["name" => "Monitor", "qty" => 8, "min" => 10]
];

echo "   Inventory Status:\n";
foreach ($inventory as $sku => $item) {
    $status = $item["qty"] < $item["min"] ? "⚠️ LOW STOCK" : "✓ OK";
    echo "   [$sku] {$item['name']}: {$item['qty']} units $status\n";
}
echo "\n";

// 16. Foreach with Generator (Memory Efficient)
echo "16. Foreach with Range:\n";
echo "   First 10 squares: ";
foreach (range(1, 10) as $num) {
    echo ($num * $num) . " ";
}
echo "\n\n";

// 17. Practical Example: Word Frequency Counter
echo "17. Practical Example - Word Frequency:\n";
$text = "php is great php is fast php is powerful";
$words = explode(" ", $text);
$frequency = [];

foreach ($words as $word) {
    if (isset($frequency[$word])) {
        $frequency[$word]++;
    } else {
        $frequency[$word] = 1;
    }
}

echo "   Text: \"$text\"\n";
echo "   Word Frequency:\n";
foreach ($frequency as $word => $count) {
    echo "   - $word: $count\n";
}
echo "\n";

// 18. Foreach with Multiple Arrays (using array_combine)
echo "18. Foreach with Combined Arrays:\n";
$names = ["Alice", "Bob", "Charlie"];
$ages = [25, 30, 35];
$combined = array_combine($names, $ages);

foreach ($combined as $name => $age) {
    echo "   $name is $age years old\n";
}
echo "\n";

// 19. Practical Example: Temperature Analysis
echo "19. Practical Example - Temperature Data:\n";
$temperatures = [
    "Monday" => 22,
    "Tuesday" => 25,
    "Wednesday" => 19,
    "Thursday" => 28,
    "Friday" => 24
];

$maxTemp = PHP_INT_MIN;
$minTemp = PHP_INT_MAX;
$totalTemp = 0;
$hotDays = [];

foreach ($temperatures as $day => $temp) {
    if ($temp > $maxTemp) $maxTemp = $temp;
    if ($temp < $minTemp) $minTemp = $temp;
    $totalTemp += $temp;
    
    if ($temp > 25) {
        $hotDays[] = $day;
    }
}

echo "   Weekly Temperature Analysis:\n";
echo "   - Highest: {$maxTemp}°C\n";
echo "   - Lowest: {$minTemp}°C\n";
echo "   - Average: " . round($totalTemp / count($temperatures), 1) . "°C\n";
echo "   - Hot Days (>25°C): " . implode(", ", $hotDays) . "\n\n";

// 20. Foreach with Empty Array Handling
echo "20. Foreach - Empty Array Safety:\n";
$emptyArray = [];
if (empty($emptyArray)) {
    echo "   ✓ Checked: Array is empty, skipping iteration\n";
} else {
    foreach ($emptyArray as $item) {
        echo "   This won't print\n";
    }
}
echo "\n";

echo "=== End of Foreach Examples ===\n";
?>
