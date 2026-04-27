<?php
/**
 * Control Structures: If-Else Statements
 * Example 1: Conditional Logic in PHP
 */

echo "=== If-Else Statements ===\n\n";

// 1. Simple If Statement
echo "1. Simple If Statement:\n";
$age = 20;
if ($age >= 18) {
    echo "   You are an adult.\n";
}
echo "\n";

// 2. If-Else Statement
echo "2. If-Else Statement:\n";
$score = 45;
if ($score >= 50) {
    echo "   Result: Pass\n";
} else {
    echo "   Result: Fail\n";
}
echo "\n";

// 3. If-ElseIf-Else Statement
echo "3. If-ElseIf-Else Statement:\n";
$marks = 78;
if ($marks >= 90) {
    echo "   Grade: A (Excellent)\n";
} elseif ($marks >= 80) {
    echo "   Grade: B (Very Good)\n";
} elseif ($marks >= 70) {
    echo "   Grade: C (Good)\n";
} elseif ($marks >= 60) {
    echo "   Grade: D (Average)\n";
} else {
    echo "   Grade: F (Needs Improvement)\n";
}
echo "\n";

// 4. Nested If Statements
echo "4. Nested If Statements:\n";
$isMember = true;
$purchaseAmount = 150;

if ($isMember) {
    echo "   Member detected.\n";
    if ($purchaseAmount > 100) {
        echo "   Eligible for 20% discount!\n";
    } else {
        echo "   Spend more to get discount.\n";
    }
} else {
    echo "   Not a member. Join now for benefits!\n";
}
echo "\n";

// 5. Multiple Conditions with AND/OR
echo "5. Multiple Conditions (AND/OR):\n";
$temperature = 25;
$isSunny = true;

if ($temperature > 20 && $isSunny) {
    echo "   Perfect day for the beach! 🏖️\n";
}

$hasTicket = false;
$isWeekend = true;

if ($hasTicket || $isWeekend) {
    echo "   You can attend the event.\n";
}
echo "\n";

// 6. Practical Example: Login System
echo "6. Practical Example - Login System:\n";
$username = "admin";
$password = "secret123";
$inputUser = "admin";
$inputPass = "secret123";

if ($inputUser === $username) {
    if ($inputPass === $password) {
        echo "   ✓ Login successful! Welcome, $username.\n";
    } else {
        echo "   ✗ Incorrect password.\n";
    }
} else {
    echo "   ✗ User not found.\n";
}
echo "\n";

// 7. Practical Example: Age Verification
echo "7. Practical Example - Age Verification:\n";
$userAge = 17;
$minAge = 18;

if ($userAge < $minAge) {
    echo "   Access denied. You must be $minAge or older.\n";
} else {
    echo "   Access granted. Welcome!\n";
}
echo "\n";

// 8. Ternary Operator as If-Else Shortcut
echo "8. Ternary Operator:\n";
$time = 14;
$greeting = ($time < 12) ? "Good Morning" : "Good Afternoon";
echo "   Time: $time:00 => $greeting\n";

$isLoggedIn = true;
$displayMessage = $isLoggedIn ? "Welcome back!" : "Please log in";
echo "   Status: $displayMessage\n";
echo "\n";

// 9. Null Coalescing Operator
echo "9. Null Coalescing Operator (??):\n";
$username_input = $_GET['username'] ?? 'Guest';
echo "   Username: $username_input\n";

$color = null;
$selectedColor = $color ?? 'Blue';
echo "   Selected Color: $selectedColor\n";
echo "\n";

// 10. Practical Example: E-commerce Discount
echo "10. Practical Example - E-commerce Discount:\n";
$totalAmount = 250;
$isVip = true;
$discount = 0;

if ($totalAmount > 200) {
    $discount = 15;
} elseif ($totalAmount > 100) {
    $discount = 10;
} elseif ($totalAmount > 50) {
    $discount = 5;
}

if ($isVip) {
    $discount += 5; // Additional VIP discount
}

$finalAmount = $totalAmount - ($totalAmount * $discount / 100);
echo "   Total: \$$totalAmount\n";
echo "   Discount: {$discount}%\n";
echo "   Final Amount: \$$finalAmount\n";
echo "\n";

// 11. Switch-like Behavior with If-Else
echo "11. Day Type Checker:\n";
$day = "Saturday";

if ($day === "Saturday" || $day === "Sunday") {
    echo "   It's the weekend! 🎉\n";
} elseif ($day === "Friday") {
    echo "   Tomorrow is weekend!\n";
} else {
    echo "   It's a weekday. Time to work!\n";
}
echo "\n";

// 12. Complex Condition: Loan Approval
echo "12. Complex Condition - Loan Approval:\n";
$creditScore = 720;
$income = 55000;
$employmentYears = 3;
$debtRatio = 0.35;

$approved = true;
$reason = "";

if ($creditScore < 650) {
    $approved = false;
    $reason = "Low credit score";
} elseif ($income < 30000) {
    $approved = false;
    $reason = "Insufficient income";
} elseif ($employmentYears < 1) {
    $approved = false;
    $reason = "Employment too short";
} elseif ($debtRatio > 0.50) {
    $approved = false;
    $reason = "High debt ratio";
}

if ($approved) {
    echo "   ✓ Loan Approved!\n";
    echo "   Maximum amount: \$" . number_format($income * 3) . "\n";
} else {
    echo "   ✗ Loan Denied\n";
    echo "   Reason: $reason\n";
}
echo "\n";

echo "=== End of If-Else Examples ===\n";
?>
