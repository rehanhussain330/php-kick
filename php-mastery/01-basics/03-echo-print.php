<?php
/**
 * PHP Basics: Echo and Print
 * Example 3: Output Statements in PHP
 */

echo "=== PHP Echo and Print ===\n\n";

// 1. Basic Echo
echo "1. Basic Echo:\n";
echo "   Hello, World!\n";
echo "   This is a simple echo statement.\n\n";

// 2. Echo with Multiple Parameters
echo "2. Echo with Multiple Parameters:\n";
echo "   First", " ", "Second", " ", "Third", "\n";
echo "   You can pass multiple strings to echo.\n\n";

// 3. Echo with Variables
echo "3. Echo with Variables:\n";
$name = "Alice";
$age = 25;
echo "   Name: $name, Age: $age\n";
echo "   Using concatenation: " . "Name: " . $name . ", Age: " . $age . "\n\n";

// 4. Echo with HTML (for web context)
echo "4. Echo with HTML Tags:\n";
echo "   <strong>Bold Text</strong>\n";
echo "   <em>Italic Text</em>\n";
echo "   <br>Line Break\n\n";

// 5. Print Statement
echo "5. Print Statement:\n";
print "   Print also outputs text.\n";
print "   Unlike echo, print returns 1 and can be used in expressions.\n\n";

// 6. Difference between Echo and Print
echo "6. Echo vs Print:\n";
echo "   - Echo: No return value, faster, can take multiple parameters\n";
echo "   - Print: Returns 1, slightly slower, takes only one parameter\n\n";

// 7. Echo with Heredoc Syntax
echo "7. Heredoc Syntax:\n";
$message = <<<EOT
This is a multiline string
using Heredoc syntax.
It preserves line breaks and formatting.
Variable interpolation works: $name
EOT;
echo "   $message\n\n";

// 8. Echo with Nowdoc Syntax (Single Quotes)
echo "8. Nowdoc Syntax:\n";
$nowdoc = <<<'EOT'
This is a nowdoc example.
Variables are NOT interpolated: $name
It behaves like single quotes.
EOT;
echo "   $nowdoc\n\n";

// 9. Formatting Output
echo "9. Formatting Output:\n";
$price = 19.99;
$quantity = 3;
$total = $price * $quantity;
echo "   Price: $" . number_format($price, 2) . "\n";
echo "   Quantity: $quantity\n";
echo "   Total: $" . number_format($total, 2) . "\n\n";

// 10. Practical Example: User Profile Card
echo "10. Practical Example - User Profile:\n";
echo "   ==================================\n";
echo "   | Name: John Doe                |\n";
echo "   | Email: john@example.com       |\n";
echo "   | Role: Developer               |\n";
echo "   | Status: Active                |\n";
echo "   ==================================\n\n";

// 11. Escape Sequences
echo "11. Escape Sequences:\n";
echo "   Tab:\tSeparated\n";
echo "   Newline:\nNext Line\n";
echo "   Backslash: \\\n";
echo "   Double Quote: \"Quoted\"\n\n";

// 12. Combining Echo with Conditions
echo "12. Echo with Conditions:\n";
$hour = date('H');
if ($hour < 12) {
    echo "   Good Morning!\n";
} elseif ($hour < 18) {
    echo "   Good Afternoon!\n";
} else {
    echo "   Good Evening!\n";
}

echo "\n=== End of Echo and Print Example ===\n";
?>
