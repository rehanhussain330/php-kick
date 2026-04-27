<?php
/**
 * Control Structures: Switch Statement
 * Example 2: Multi-way Branching in PHP
 */

echo "=== Switch Statements ===\n\n";

// 1. Basic Switch Statement
echo "1. Basic Switch Statement:\n";
$day = 3;
switch ($day) {
    case 1:
        echo "   Monday\n";
        break;
    case 2:
        echo "   Tuesday\n";
        break;
    case 3:
        echo "   Wednesday\n";
        break;
    case 4:
        echo "   Thursday\n";
        break;
    case 5:
        echo "   Friday\n";
        break;
    case 6:
        echo "   Saturday\n";
        break;
    case 7:
        echo "   Sunday\n";
        break;
    default:
        echo "   Invalid day\n";
}
echo "\n";

// 2. Switch with Strings
echo "2. Switch with Strings:\n";
$color = "blue";
switch ($color) {
    case "red":
        echo "   Stop! 🛑\n";
        break;
    case "yellow":
        echo "   Caution! ⚠️\n";
        break;
    case "green":
        echo "   Go! 🟢\n";
        break;
    default:
        echo "   Unknown signal\n";
}
echo "\n";

// 3. Multiple Cases (Fall-through)
echo "3. Multiple Cases - Weekend Checker:\n";
$today = "Saturday";
switch ($today) {
    case "Saturday":
    case "Sunday":
        echo "   It's the weekend! Relax! 🎉\n";
        break;
    case "Friday":
        echo "   Almost weekend!\n";
        break;
    default:
        echo "   Weekday - Time to work!\n";
}
echo "\n";

// 4. Switch without Break (Intentional Fall-through)
echo "4. Intentional Fall-through:\n";
$level = 2;
switch ($level) {
    case 1:
        echo "   Level 1: Bronze\n";
    case 2:
        echo "   Level 2: Silver\n";
    case 3:
        echo "   Level 3: Gold\n";
        break;
    default:
        echo "   No level\n";
}
echo "   (Shows all levels up to current)\n\n";

// 5. Practical Example: Menu System
echo "5. Practical Example - Menu System:\n";
$choice = 2;
echo "   Selected Option: $choice\n";
echo "   ";
switch ($choice) {
    case 1:
        echo "View Profile\n";
        break;
    case 2:
        echo "Edit Settings\n";
        break;
    case 3:
        echo "View Messages\n";
        break;
    case 4:
        echo "Logout\n";
        break;
    default:
        echo "Invalid option\n";
}
echo "\n";

// 6. Switch with Boolean-like Values
echo "6. Switch with Status Codes:\n";
$status = 404;
switch ($status) {
    case 200:
        echo "   OK - Request successful\n";
        break;
    case 301:
        echo "   Moved Permanently\n";
        break;
    case 400:
        echo "   Bad Request\n";
        break;
    case 401:
        echo "   Unauthorized\n";
        break;
    case 403:
        echo "   Forbidden\n";
        break;
    case 404:
        echo "   Not Found\n";
        break;
    case 500:
        echo "   Internal Server Error\n";
        break;
    default:
        echo "   Unknown Status Code\n";
}
echo "\n";

// 7. Switch as Alternative to If-Else Ladder
echo "7. Grade Calculator:\n";
$grade = 'B';
switch ($grade) {
    case 'A+':
    case 'A':
        echo "   Excellent! GPA: 4.0\n";
        break;
    case 'B+':
    case 'B':
        echo "   Very Good! GPA: 3.0-3.5\n";
        break;
    case 'C+':
    case 'C':
        echo "   Good! GPA: 2.0-2.5\n";
        break;
    case 'D':
        echo "   Pass. GPA: 1.0-1.5\n";
        break;
    case 'F':
        echo "   Failed. Needs improvement.\n";
        break;
    default:
        echo "   Invalid grade\n";
}
echo "\n";

// 8. Practical Example: Payment Method
echo "8. Practical Example - Payment Processing:\n";
$paymentMethod = "credit_card";
switch ($paymentMethod) {
    case "credit_card":
        echo "   Processing credit card payment...\n";
        echo "   Fee: 2.9% + \$0.30\n";
        break;
    case "debit_card":
        echo "   Processing debit card payment...\n";
        echo "   Fee: 1.5% + \$0.25\n";
        break;
    case "paypal":
        echo "   Redirecting to PayPal...\n";
        echo "   Fee: 3.5%\n";
        break;
    case "bank_transfer":
        echo "   Initiating bank transfer...\n";
        echo "   Fee: \$1.00 flat\n";
        break;
    case "crypto":
        echo "   Processing cryptocurrency...\n";
        echo "   Fee: 1.0%\n";
        break;
    default:
        echo "   Payment method not supported\n";
}
echo "\n";

// 9. Switch with Expressions (PHP 8+)
echo "9. Match Expression (PHP 8+):\n";
$httpMethod = "POST";
$response = match($httpMethod) {
    "GET" => "Retrieving data",
    "POST" => "Creating resource",
    "PUT" => "Updating resource",
    "DELETE" => "Deleting resource",
    default => "Unknown method"
};
echo "   HTTP Method: $httpMethod\n";
echo "   Action: $response\n\n";

// 10. Nested Switch Statements
echo "10. Nested Switch - Restaurant Order:\n";
$category = "beverage";
$item = "coffee";

switch ($category) {
    case "food":
        echo "   Food Category\n";
        switch ($item) {
            case "pizza":
                echo "   → Pizza: \$12.99\n";
                break;
            case "burger":
                echo "   → Burger: \$9.99\n";
                break;
            default:
                echo "   → Item not found\n";
        }
        break;
    case "beverage":
        echo "   Beverage Category\n";
        switch ($item) {
            case "coffee":
                echo "   → Coffee: \$3.99\n";
                break;
            case "tea":
                echo "   → Tea: \$2.99\n";
                break;
            case "juice":
                echo "   → Juice: \$4.99\n";
                break;
            default:
                echo "   → Item not found\n";
        }
        break;
    default:
        echo "   Invalid category\n";
}
echo "\n";

// 11. Switch with User Roles
echo "11. User Role Permissions:\n";
$role = "editor";
switch ($role) {
    case "admin":
        echo "   ✓ Full Access\n";
        echo "   ✓ User Management\n";
        echo "   ✓ System Settings\n";
        echo "   ✓ Content Management\n";
        break;
    case "editor":
        echo "   ✗ User Management\n";
        echo "   ✗ System Settings\n";
        echo "   ✓ Content Management\n";
        break;
    case "author":
        echo "   ✗ User Management\n";
        echo "   ✗ System Settings\n";
        echo "   ✓ Own Content Only\n";
        break;
    case "subscriber":
        echo "   ✗ User Management\n";
        echo "   ✗ System Settings\n";
        echo "   ✗ Content Management\n";
        echo "   ✓ View Content Only\n";
        break;
    default:
        echo "   Unknown role\n";
}
echo "\n";

// 12. Practical Example: Shipping Calculator
echo "12. Practical Example - Shipping Cost:\n";
$shippingZone = "zone_2";
$weight = 5; // kg

$baseRate = 0;
switch ($shippingZone) {
    case "zone_1":
        $baseRate = 5.00;
        echo "   Zone 1 (Local): Base \$5.00\n";
        break;
    case "zone_2":
        $baseRate = 10.00;
        echo "   Zone 2 (National): Base \$10.00\n";
        break;
    case "zone_3":
        $baseRate = 20.00;
        echo "   Zone 3 (International): Base \$20.00\n";
        break;
    default:
        echo "   Invalid zone\n";
}

$weightCharge = $weight * 2;
$total = $baseRate + $weightCharge;
echo "   Weight: {$weight}kg × \$2 = \$$weightCharge\n";
echo "   Total Shipping: \$$total\n";

echo "\n=== End of Switch Examples ===\n";
?>
