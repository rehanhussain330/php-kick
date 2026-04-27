<?php
/**
 * Strings: String Manipulation and Functions
 * Example 1: Working with PHP Strings
 */

echo "=== PHP Strings ===\n\n";

// 1. String Creation
echo "1. String Creation:\n";
$str1 = 'Single quotes';
$str2 = "Double quotes";
echo "   $str1\n";
echo "   $str2\n\n";

// 2. String Concatenation
echo "2. String Concatenation:\n";
$firstName = "John";
$lastName = "Doe";
$fullName = $firstName . " " . $lastName;
echo "   Full Name: $fullName\n\n";

// 3. String Length
echo "3. String Length:\n";
$text = "Hello World";
echo "   Length of '$text': " . strlen($text) . "\n\n";

// 4. String Case Conversion
echo "4. Case Conversion:\n";
echo "   Original: PHP Programming\n";
echo "   Upper: " . strtoupper("PHP Programming") . "\n";
echo "   Lower: " . strtolower("PHP Programming") . "\n";
echo "   Title: " . ucwords("php programming") . "\n\n";

// 5. String Search
echo "5. String Search:\n";
$sentence = "The quick brown fox";
echo "   Sentence: '$sentence'\n";
echo "   Position of 'brown': " . strpos($sentence, "brown") . "\n";
echo "   Contains 'fox': " . (strpos($sentence, "fox") !== false ? "Yes" : "No") . "\n\n";

// 6. String Replacement
echo "6. String Replacement:\n";
$text = "Hello World";
echo "   Original: $text\n";
echo "   Replaced: " . str_replace("World", "PHP", $text) . "\n\n";

// 7. Substring
echo "7. Substring:\n";
$text = "Programming";
echo "   Original: $text\n";
echo "   First 5 chars: " . substr($text, 0, 5) . "\n";
echo "   Last 4 chars: " . substr($text, -4) . "\n\n";

// 8. Trim Whitespace
echo "8. Trim Whitespace:\n";
$text = "   Hello   ";
echo "   Original: '$text'\n";
echo "   Trimmed: '" . trim($text) . "'\n\n";

// 9. String Split
echo "9. String Split:\n";
$date = "2024-01-15";
$parts = explode("-", $date);
echo "   Date: $date\n";
echo "   Parts: " . implode("/", $parts) . "\n\n";

// 10. Practical Example: Email Validation
echo "10. Practical Example - Email Processing:\n";
$email = "user@example.com";
echo "   Email: $email\n";
echo "   Domain: " . strstr($email, "@") . "\n";
echo "   Username: " . strstr($email, "@", true) . "\n\n";

echo "=== End of Strings Example ===\n";
?>
