<?php
/**
 * PHP Basics: Comments and Documentation
 * Example 4: Different Types of Comments in PHP
 */

// 1. Single Line Comment (Hash/Hashtag)
# This is also a single line comment
echo "=== PHP Comments ===\n\n";

echo "1. Single Line Comments:\n";
echo "   Use // or # for single line comments\n";
echo "   These are ignored by the PHP interpreter\n\n";

/*
 * 2. Multi-line Comments (C-style)
 * This comment spans multiple lines
 * Useful for longer explanations
 */
echo "2. Multi-line Comments:\n";
echo "   Use /* ... */ for multi-line comments\n";
echo "   Great for block explanations\n\n";

/**
 * 3. DocBlock Comments (Documentation Blocks)
 * 
 * These are special multi-line comments that start with /**
 * They are used for documentation purposes
 * and can be parsed by tools like PHPDocumentor
 * 
 * @param string $name The name parameter
 * @return string Returns a greeting message
 */
echo "3. DocBlock Comments:\n";
echo "   Start with /** and end with */\n";
echo "   Used for generating documentation\n";
echo "   Support tags like @param, @return, @author\n\n";

// 4. Practical Example: Function with Comments
echo "4. Practical Example - Documented Function:\n";

/**
 * Calculate the area of a rectangle
 * 
 * This function takes length and width as parameters
 * and returns the calculated area.
 * 
 * @param float $length The length of the rectangle
 * @param float $width The width of the rectangle
 * @return float The calculated area
 * @throws Exception If dimensions are negative
 */
function calculateArea($length, $width) {
    // Validate input parameters
    if ($length < 0 || $width < 0) {
        throw new Exception("Dimensions cannot be negative");
    }
    
    // Calculate area
    $area = $length * $width;
    
    return $area; // Return the result
}

try {
    $rectLength = 10;
    $rectWidth = 5;
    $area = calculateArea($rectLength, $rectWidth);
    echo "   Rectangle Area: {$area} square units\n\n";
} catch (Exception $e) {
    echo "   Error: " . $e->getMessage() . "\n\n";
}

// 5. Inline Comments
echo "5. Inline Comments:\n";
$x = 10; // Initialize x with value 10
$y = 20; // Initialize y with value 20
$sum = $x + $y; // Calculate sum
echo "   Sum of $x and $y is: $sum\n\n";

/*
 * 6. Commenting Out Code During Debugging
 * This is useful when you want to temporarily disable code
 */
echo "6. Debugging Comments:\n";
$debugMode = false;
if ($debugMode) {
    // echo "Debug: Variable values...\n";
    // var_dump($x, $y);
    echo "   Debug mode is off (code commented out)\n";
} else {
    echo "   Use comments to temporarily disable code\n";
}
echo "\n";

// 7. TODO, FIXME, HACK Comments
echo "7. Special Comment Tags:\n";
echo "   // TODO: Add feature X in future\n";
echo "   // FIXME: Fix this bug later\n";
echo "   // HACK: Temporary workaround\n";
echo "   // XXX: Needs review\n";
echo "   // NOTE: Important information\n\n";

// TODO: Implement advanced validation
// FIXME: Handle edge cases
// NOTE: This is a demonstration

// 8. Conditional Comments for Different Environments
echo "8. Environment-Specific Comments:\n";
$environment = 'development'; // Change to 'production' for live site

if ($environment === 'development') {
    // Show detailed errors in development
    echo "   Development mode: Detailed logging enabled\n";
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
} else {
    // Hide errors in production
    echo "   Production mode: Errors logged silently\n";
    // error_reporting(0);
    // ini_set('display_errors', 0);
}
echo "\n";

// 9. Section Comments for Code Organization
echo "9. Section Comments:\n";
echo "   Use visual separators to organize code:\n";
echo "   // ========================\n";
echo "   // DATABASE CONNECTIONS\n";
echo "   // ========================\n\n";

// ========================
// USER AUTHENTICATION
// ========================
echo "   [Section: User Authentication]\n";

// ========================
// DATA PROCESSING
// ========================
echo "   [Section: Data Processing]\n\n";

// 10. Best Practices for Comments
echo "10. Comment Best Practices:\n";
echo "   ✓ Write clear and concise comments\n";
echo "   ✓ Explain WHY, not WHAT (code shows what)\n";
echo "   ✓ Keep comments up-to-date with code changes\n";
echo "   ✓ Use proper grammar and spelling\n";
echo "   ✓ Avoid obvious comments\n";
echo "   ✗ Don't over-comment simple code\n";
echo "   ✗ Don't leave commented-out code in production\n\n";

echo "=== End of Comments Example ===\n";
?>
