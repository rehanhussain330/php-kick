# Control Structures - Complete Guide

## Table of Contents
1. If Statements
2. If-Else Statements
3. If-Elseif-Else Statements
4. Nested If Statements
5. Switch Statements
6. Match Expression (PHP 8+)
7. While Loops
8. Do-While Loops
9. For Loops
10. Foreach Loops
11. Break and Continue
12. Alternative Syntax

---

## 1. If Statements

### Example 1: Basic If Statement
```php
<?php
    $age = 20;
    
    if ($age >= 18) {
        echo "You are an adult.";
    }
?>
```

### Example 2: If with Multiple Conditions
```php
<?php
    $temperature = 25;
    $isSunny = true;
    
    if ($temperature > 20 && $isSunny) {
        echo "Perfect day for outdoor activities!";
    }
    
    $score = 85;
    if ($score >= 80 && $score <= 100) {
        echo "Grade: A";
    }
?>
```

### Example 3: Real-world - User Authentication
```php
<?php
    $username = "admin";
    $password = "secret123";
    $isLoggedIn = false;
    
    // Simulate database check
    if ($username === "admin" && $password === "secret123") {
        $isLoggedIn = true;
        echo "Login successful! Welcome, $username.";
    }
    
    if ($isLoggedIn) {
        echo "<br>You have access to the dashboard.";
    }
?>
```

### Example 4: Checking Empty Values
```php
<?php
    $email = "";
    $name = "John";
    
    if (empty($email)) {
        echo "Email is required.<br>";
    }
    
    if (!empty($name)) {
        echo "Hello, $name!<br>";
    }
    
    // Check if variable is set
    if (isset($_GET['user'])) {
        echo "User parameter exists.";
    } else {
        echo "No user parameter.";
    }
?>
```

### Example 5: Number Validation
```php
<?php
    $number = 42;
    
    if ($number > 0) {
        echo "$number is positive.<br>";
    }
    
    if ($number % 2 === 0) {
        echo "$number is even.<br>";
    }
    
    if ($number >= 1 && $number <= 100) {
        echo "$number is between 1 and 100.<br>";
    }
    
    // Check if number is in range
    $min = 10;
    $max = 50;
    if ($number >= $min && $number <= $max) {
        echo "$number is within acceptable range.";
    }
?>
```

---

## 2. If-Else Statements

### Example 1: Basic If-Else
```php
<?php
    $age = 16;
    
    if ($age >= 18) {
        echo "You can vote!";
    } else {
        echo "You are too young to vote.";
    }
?>
```

### Example 2: Even or Odd Check
```php
<?php
    $number = 17;
    
    if ($number % 2 === 0) {
        echo "$number is even.";
    } else {
        echo "$number is odd.";
    }
?>
```

### Example 3: Pass or Fail System
```php
<?php
    $marks = 65;
    $passingMarks = 60;
    
    if ($marks >= $passingMarks) {
        echo "Congratulations! You passed.<br>";
        echo "Your marks: $marks%";
    } else {
        echo "Sorry, you failed.<br>";
        echo "You need " . ($passingMarks - $marks) . " more marks to pass.";
    }
?>
```

### Example 4: Login System
```php
<?php
    $correctPassword = "mypassword123";
    $enteredPassword = $_POST['password'] ?? '';
    
    if ($enteredPassword === $correctPassword) {
        echo "Access granted!";
        // Redirect to dashboard
        // header("Location: dashboard.php");
    } else {
        echo "Access denied! Incorrect password.";
    }
?>
```

### Example 5: Discount Calculator
```php
<?php
    $purchaseAmount = 150;
    $discount = 0;
    
    if ($purchaseAmount >= 100) {
        $discount = 0.10; // 10% discount
        echo "You qualify for a 10% discount!<br>";
    } else {
        echo "Spend at least \$100 to get a discount.<br>";
    }
    
    $finalAmount = $purchaseAmount - ($purchaseAmount * $discount);
    echo "Original amount: \$$purchaseAmount<br>";
    echo "Discount: $" . ($purchaseAmount * $discount) . "<br>";
    echo "Final amount: \$$finalAmount";
?>
```

---

## 3. If-Elseif-Else Statements

### Example 1: Grade Calculator
```php
<?php
    $score = 78;
    
    if ($score >= 90) {
        $grade = "A";
    } elseif ($score >= 80) {
        $grade = "B";
    } elseif ($score >= 70) {
        $grade = "C";
    } elseif ($score >= 60) {
        $grade = "D";
    } else {
        $grade = "F";
    }
    
    echo "Score: $score, Grade: $grade";
?>
```

### Example 2: Day Name from Number
```php
<?php
    $dayNumber = 3;
    
    if ($dayNumber === 1) {
        $dayName = "Monday";
    } elseif ($dayNumber === 2) {
        $dayName = "Tuesday";
    } elseif ($dayNumber === 3) {
        $dayName = "Wednesday";
    } elseif ($dayNumber === 4) {
        $dayName = "Thursday";
    } elseif ($dayNumber === 5) {
        $dayName = "Friday";
    } elseif ($dayNumber === 6) {
        $dayName = "Saturday";
    } elseif ($dayNumber === 7) {
        $dayName = "Sunday";
    } else {
        $dayName = "Invalid day number";
    }
    
    echo "Day $dayNumber is $dayName";
?>
```

### Example 3: Ticket Pricing System
```php
<?php
    $age = 25;
    $ticketPrice = 0;
    
    if ($age < 5) {
        $ticketPrice = 0;
        echo "Free entry for children under 5!<br>";
    } elseif ($age < 12) {
        $ticketPrice = 10;
        echo "Child ticket: \$$ticketPrice<br>";
    } elseif ($age < 18) {
        $ticketPrice = 15;
        echo "Teenager ticket: \$$ticketPrice<br>";
    } elseif ($age < 60) {
        $ticketPrice = 25;
        echo "Adult ticket: \$$ticketPrice<br>";
    } else {
        $ticketPrice = 20;
        echo "Senior citizen ticket: \$$ticketPrice<br>";
    }
?>
```

### Example 4: HTTP Status Code Handler
```php
<?php
    $statusCode = 404;
    
    if ($statusCode === 200) {
        echo "Success! Request completed.";
    } elseif ($statusCode === 201) {
        echo "Created! Resource successfully created.";
    } elseif ($statusCode === 400) {
        echo "Bad Request! Invalid input.";
    } elseif ($statusCode === 401) {
        echo "Unauthorized! Authentication required.";
    } elseif ($statusCode === 403) {
        echo "Forbidden! Access denied.";
    } elseif ($statusCode === 404) {
        echo "Not Found! Resource doesn't exist.";
    } elseif ($statusCode === 500) {
        echo "Internal Server Error! Something went wrong.";
    } else {
        echo "Unknown status code: $statusCode";
    }
?>
```

### Example 5: Shipping Cost Calculator
```php
<?php
    $weight = 2.5; // in kg
    $distance = 150; // in km
    $shippingCost = 0;
    
    if ($weight <= 1) {
        $baseCost = 5;
    } elseif ($weight <= 5) {
        $baseCost = 10;
    } elseif ($weight <= 10) {
        $baseCost = 20;
    } else {
        $baseCost = 30;
    }
    
    if ($distance <= 50) {
        $multiplier = 1;
    } elseif ($distance <= 150) {
        $multiplier = 1.5;
    } else {
        $multiplier = 2;
    }
    
    $shippingCost = $baseCost * $multiplier;
    
    echo "Weight: {$weight}kg<br>";
    echo "Distance: {$distance}km<br>";
    echo "Shipping Cost: \$$shippingCost";
?>
```

---

## 4. Nested If Statements

### Example 1: User Permission Check
```php
<?php
    $isLoggedIn = true;
    $userRole = "admin";
    $isActive = true;
    
    if ($isLoggedIn) {
        echo "User is logged in.<br>";
        
        if ($isActive) {
            echo "Account is active.<br>";
            
            if ($userRole === "admin") {
                echo "Welcome, Admin! You have full access.";
            } elseif ($userRole === "user") {
                echo "Welcome, User! You have limited access.";
            }
        } else {
            echo "Your account is deactivated.";
        }
    } else {
        echo "Please log in first.";
    }
?>
```

### Example 2: Loan Approval System
```php
<?php
    $income = 50000;
    $creditScore = 750;
    $employmentYears = 3;
    $loanAmount = 20000;
    
    if ($income >= 30000) {
        echo "Income requirement met.<br>";
        
        if ($creditScore >= 700) {
            echo "Credit score requirement met.<br>";
            
            if ($employmentYears >= 2) {
                echo "Employment requirement met.<br>";
                
                if ($loanAmount <= ($income * 2)) {
                    echo "✓ Loan approved!";
                } else {
                    echo "✗ Loan amount too high for your income.";
                }
            } else {
                echo "✗ Insufficient employment history.";
            }
        } else {
            echo "✗ Credit score too low.";
        }
    } else {
        echo "✗ Income below minimum requirement.";
    }
?>
```

### Example 3: Product Availability Check
```php
<?php
    $productInStock = true;
    $quantityRequested = 5;
    $quantityAvailable = 10;
    $userIsPremium = true;
    
    if ($productInStock) {
        if ($quantityRequested <= $quantityAvailable) {
            echo "Quantity available.<br>";
            
            if ($userIsPremium) {
                echo "Premium member! You get free shipping.<br>";
                echo "Order placed successfully!";
            } else {
                echo "Standard shipping will be applied.<br>";
                echo "Order placed successfully!";
            }
        } else {
            echo "Insufficient stock. Only $quantityAvailable available.";
        }
    } else {
        echo "Product out of stock.";
    }
?>
```

### Example 4: Weather-based Activity Suggestion
```php
<?php
    $isWeekend = true;
    $temperature = 25;
    $isRaining = false;
    $hasPool = true;
    
    if ($isWeekend) {
        echo "It's the weekend!<br>";
        
        if (!$isRaining) {
            echo "Weather is nice.<br>";
            
            if ($temperature > 30) {
                echo "It's very hot. Stay indoors with AC.";
            } elseif ($temperature >= 20) {
                echo "Perfect temperature!<br>";
                
                if ($hasPool) {
                    echo "Go swimming!";
                } else {
                    echo "Go for a picnic or hiking.";
                }
            } else {
                echo "It's a bit cold. Wear warm clothes.";
            }
        } else {
            echo "It's raining. Stay indoors or watch a movie.";
        }
    } else {
        echo "It's a weekday. Focus on work!";
    }
?>
```

### Example 5: E-commerce Checkout Process
```php
<?php
    $cartTotal = 150;
    $hasItems = true;
    $userAddress = "123 Main St";
    $paymentMethod = "credit_card";
    $couponCode = "SAVE10";
    
    if ($hasItems) {
        echo "Cart has items.<br>";
        
        if ($cartTotal > 0) {
            echo "Cart total: \$$cartTotal<br>";
            
            if (!empty($userAddress)) {
                echo "Shipping address provided.<br>";
                
                if ($paymentMethod === "credit_card" || $paymentMethod === "paypal") {
                    echo "Payment method valid.<br>";
                    
                    if ($couponCode === "SAVE10") {
                        $discount = $cartTotal * 0.10;
                        $finalTotal = $cartTotal - $discount;
                        echo "Coupon applied! Discount: \$$discount<br>";
                        echo "Final total: \$$finalTotal<br>";
                    } else {
                        echo "No coupon applied.<br>";
                        echo "Final total: \$$cartTotal<br>";
                    }
                    
                    echo "✓ Order confirmed!";
                } else {
                    echo "✗ Invalid payment method.";
                }
            } else {
                echo "✗ Please provide shipping address.";
            }
        } else {
            echo "✗ Cart is empty.";
        }
    } else {
        echo "✗ No items in cart.";
    }
?>
```

---

## 5. Switch Statements

### Example 1: Basic Switch
```php
<?php
    $day = "Monday";
    
    switch ($day) {
        case "Monday":
            echo "Start of the work week!";
            break;
        case "Tuesday":
            echo "Second day of work.";
            break;
        case "Wednesday":
            echo "Midweek already!";
            break;
        case "Thursday":
            echo "Almost Friday!";
            break;
        case "Friday":
            echo "TGIF! Weekend is near.";
            break;
        case "Saturday":
        case "Sunday":
            echo "It's the weekend!";
            break;
        default:
            echo "Invalid day name.";
    }
?>
```

### Example 2: Menu Selection
```php
<?php
    $choice = 2;
    
    switch ($choice) {
        case 1:
            echo "You selected: Pizza - \$12.99";
            break;
        case 2:
            echo "You selected: Burger - \$8.99";
            break;
        case 3:
            echo "You selected: Pasta - \$10.99";
            break;
        case 4:
            echo "You selected: Salad - \$7.99";
            break;
        case 5:
            echo "You selected: Soup - \$5.99";
            break;
        default:
            echo "Invalid menu selection.";
    }
?>
```

### Example 3: Month Name from Number
```php
<?php
    $month = 5;
    
    switch ($month) {
        case 1:
            $monthName = "January";
            $days = 31;
            break;
        case 2:
            $monthName = "February";
            $days = "28 or 29";
            break;
        case 3:
            $monthName = "March";
            $days = 31;
            break;
        case 4:
            $monthName = "April";
            $days = 30;
            break;
        case 5:
            $monthName = "May";
            $days = 31;
            break;
        case 6:
            $monthName = "June";
            $days = 30;
            break;
        case 7:
            $monthName = "July";
            $days = 31;
            break;
        case 8:
            $monthName = "August";
            $days = 31;
            break;
        case 9:
            $monthName = "September";
            $days = 30;
            break;
        case 10:
            $monthName = "October";
            $days = 31;
            break;
        case 11:
            $monthName = "November";
            $days = 30;
            break;
        case 12:
            $monthName = "December";
            $days = 31;
            break;
        default:
            $monthName = "Invalid month";
            $days = "N/A";
    }
    
    echo "Month $month is $monthName with $days days.";
?>
```

### Example 4: HTTP Method Handler
```php
<?php
    $method = "POST";
    
    switch ($method) {
        case "GET":
            echo "Retrieving data...";
            break;
        case "POST":
            echo "Creating new resource...";
            break;
        case "PUT":
            echo "Updating existing resource...";
            break;
        case "DELETE":
            echo "Deleting resource...";
            break;
        case "PATCH":
            echo "Partially updating resource...";
            break;
        default:
            echo "Method not allowed.";
    }
?>
```

### Example 5: Size Chart Converter
```php
<?php
    $size = "M";
    
    switch ($size) {
        case "XS":
            echo "Extra Small<br>";
            echo "Chest: 34-36 inches<br>";
            echo "Waist: 26-28 inches";
            break;
        case "S":
            echo "Small<br>";
            echo "Chest: 36-38 inches<br>";
            echo "Waist: 28-30 inches";
            break;
        case "M":
            echo "Medium<br>";
            echo "Chest: 38-40 inches<br>";
            echo "Waist: 30-32 inches";
            break;
        case "L":
            echo "Large<br>";
            echo "Chest: 40-42 inches<br>";
            echo "Waist: 32-34 inches";
            break;
        case "XL":
            echo "Extra Large<br>";
            echo "Chest: 42-44 inches<br>";
            echo "Waist: 34-36 inches";
            break;
        case "XXL":
            echo "Double Extra Large<br>";
            echo "Chest: 44-46 inches<br>";
            echo "Waist: 36-38 inches";
            break;
        default:
            echo "Size not available.";
    }
?>
```

---

## 6. Match Expression (PHP 8+)

### Example 1: Basic Match
```php
<?php
    $status = 200;
    
    $message = match ($status) {
        200 => "Success",
        201 => "Created",
        400 => "Bad Request",
        404 => "Not Found",
        500 => "Internal Server Error",
        default => "Unknown Status"
    };
    
    echo "Status $status: $message";
?>
```

### Example 2: Multiple Conditions in Match
```php
<?php
    $dayNumber = 3;
    
    $dayType = match ($dayNumber) {
        1, 2, 3, 4, 5 => "Weekday",
        6, 7 => "Weekend",
        default => "Invalid day"
    };
    
    echo "Day $dayNumber is a $dayType";
?>
```

### Example 3: Match with Expressions
```php
<?php
    $score = 85;
    
    $result = match (true) {
        $score >= 90 => "Excellent!",
        $score >= 80 => "Very Good!",
        $score >= 70 => "Good!",
        $score >= 60 => "Fair",
        $score >= 50 => "Pass",
        default => "Fail"
    };
    
    echo "Score: $score - $result";
?>
```

### Example 4: Type Matching
```php
<?php
    $value = 42;
    
    $typeDescription = match (gettype($value)) {
        "integer" => "This is a whole number",
        "double" => "This is a decimal number",
        "string" => "This is text",
        "boolean" => "This is true or false",
        "array" => "This is a collection",
        "NULL" => "This is null",
        default => "Unknown type"
    };
    
    echo $typeDescription;
?>
```

### Example 5: Complex Match with Calculations
```php
<?php
    $quantity = 15;
    $pricePerUnit = 10;
    
    $discount = match (true) {
        $quantity >= 100 => 0.20,
        $quantity >= 50 => 0.15,
        $quantity >= 20 => 0.10,
        $quantity >= 10 => 0.05,
        default => 0
    };
    
    $subtotal = $quantity * $pricePerUnit;
    $discountAmount = $subtotal * $discount;
    $total = $subtotal - $discountAmount;
    
    echo "Quantity: $quantity<br>";
    echo "Subtotal: \$$subtotal<br>";
    echo "Discount: " . ($discount * 100) . "% (-\$$discountAmount)<br>";
    echo "Total: \$$total";
?>
```

---

## 7. While Loops

### Example 1: Basic While Loop
```php
<?php
    $i = 1;
    
    while ($i <= 5) {
        echo "Iteration: $i<br>";
        $i++;
    }
?>
```

### Example 2: Countdown Timer
```php
<?php
    $seconds = 10;
    
    echo "Starting countdown...<br>";
    
    while ($seconds > 0) {
        echo "$seconds... ";
        $seconds--;
    }
    
    echo "Blast off! 🚀";
?>
```

### Example 3: Array Traversal with While
```php
<?php
    $fruits = ["Apple", "Banana", "Cherry", "Date", "Elderberry"];
    $index = 0;
    
    echo "<ul>";
    while ($index < count($fruits)) {
        echo "<li>" . $fruits[$index] . "</li>";
        $index++;
    }
    echo "</ul>";
?>
```

### Example 4: Reading Lines Until Empty
```php
<?php
    // Simulating reading input
    $lines = ["Line 1", "Line 2", "Line 3", ""];
    $currentLine = 0;
    
    echo "Reading lines:<br>";
    
    while (isset($lines[$currentLine]) && !empty($lines[$currentLine])) {
        echo $lines[$currentLine] . "<br>";
        $currentLine++;
    }
    
    echo "End of input.";
?>
```

### Example 5: Finding First Even Number
```php
<?php
    $numbers = [1, 3, 5, 8, 9, 11];
    $index = 0;
    $found = false;
    
    while ($index < count($numbers) && !$found) {
        if ($numbers[$index] % 2 === 0) {
            echo "First even number found: " . $numbers[$index];
            $found = true;
        }
        $index++;
    }
    
    if (!$found) {
        echo "No even numbers found.";
    }
?>
```

---

## 8. Do-While Loops

### Example 1: Basic Do-While
```php
<?php
    $i = 1;
    
    do {
        echo "Iteration: $i<br>";
        $i++;
    } while ($i <= 5);
?>
```

### Example 2: Guaranteed Single Execution
```php
<?php
    $number = 10;
    
    do {
        echo "This will execute at least once!<br>";
        $number = 0; // This will make condition false
    } while ($number > 5);
    
    echo "Loop ended.";
?>
```

### Example 3: User Input Simulation
```php
<?php
    // Simulating user input attempts
    $attempts = 0;
    $maxAttempts = 3;
    $success = false;
    
    do {
        $attempts++;
        echo "Attempt #$attempts<br>";
        
        // Simulate success on second attempt
        if ($attempts === 2) {
            $success = true;
        }
    } while (!$success && $attempts < $maxAttempts);
    
    if ($success) {
        echo "Operation successful after $attempts attempt(s)!";
    } else {
        echo "Failed after $maxAttempts attempts.";
    }
?>
```

### Example 4: Random Number Generator
```php
<?php
    $target = 6;
    $rolls = 0;
    $currentRoll = 0;
    
    echo "Rolling dice until we get a $target...<br>";
    
    do {
        $currentRoll = rand(1, 6);
        $rolls++;
        echo "Roll #$rolls: $currentRoll<br>";
    } while ($currentRoll !== $target);
    
    echo "Got $target after $rolls rolls!";
?>
```

### Example 5: Password Validation
```php
<?php
    $passwords = ["abc", "123", "pass", "SecurePass123!"];
    $index = 0;
    $validPassword = "";
    
    do {
        $testPassword = $passwords[$index];
        echo "Testing: $testPassword<br>";
        
        // Check if password is valid (at least 8 chars, has number)
        if (strlen($testPassword) >= 8 && preg_match('/[0-9]/', $testPassword)) {
            $validPassword = $testPassword;
        }
        
        $index++;
    } while (empty($validPassword) && $index < count($passwords));
    
    if (!empty($validPassword)) {
        echo "Valid password found: $validPassword";
    } else {
        echo "No valid password found.";
    }
?>
```

---

## 9. For Loops

### Example 1: Basic For Loop
```php
<?php
    for ($i = 1; $i <= 5; $i++) {
        echo "Number: $i<br>";
    }
?>
```

### Example 2: Multiplication Table
```php
<?php
    $number = 7;
    
    echo "<h3>Multiplication Table of $number</h3>";
    
    for ($i = 1; $i <= 10; $i++) {
        echo "$number × $i = " . ($number * $i) . "<br>";
    }
?>
```

### Example 3: Sum of Numbers
```php
<?php
    $sum = 0;
    
    for ($i = 1; $i <= 100; $i++) {
        $sum += $i;
    }
    
    echo "Sum of numbers from 1 to 100: $sum";
?>
```

### Example 4: Factorial Calculation
```php
<?php
    $number = 5;
    $factorial = 1;
    
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
    
    echo "Factorial of $number is $factorial";
    // 5! = 5 × 4 × 3 × 2 × 1 = 120
?>
```

### Example 5: Pattern Printing
```php
<?php
    $rows = 5;
    
    for ($i = 1; $i <= $rows; $i++) {
        // Print spaces
        for ($j = 1; $j <= $rows - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        
        // Print stars
        for ($k = 1; $k <= (2 * $i - 1); $k++) {
            echo "*";
        }
        
        echo "<br>";
    }
?>
```

---

## 10. Foreach Loops

### Example 1: Basic Foreach with Indexed Array
```php
<?php
    $colors = ["Red", "Green", "Blue", "Yellow", "Purple"];
    
    foreach ($colors as $color) {
        echo "Color: $color<br>";
    }
?>
```

### Example 2: Foreach with Key and Value
```php
<?php
    $fruits = ["Apple", "Banana", "Cherry"];
    
    foreach ($fruits as $key => $fruit) {
        echo "Index $key: $fruit<br>";
    }
?>
```

### Example 3: Foreach with Associative Array
```php
<?php
    $person = [
        "name" => "John Doe",
        "age" => 30,
        "city" => "New York",
        "occupation" => "Developer"
    ];
    
    foreach ($person as $key => $value) {
        echo ucfirst($key) . ": $value<br>";
    }
?>
```

### Example 4: Foreach with Nested Arrays
```php
<?php
    $students = [
        [
            "name" => "Alice",
            "grades" => [85, 90, 78]
        ],
        [
            "name" => "Bob",
            "grades" => [92, 88, 95]
        ]
    ];
    
    foreach ($students as $student) {
        echo "<h4>" . $student["name"] . "</h4>";
        echo "Grades: ";
        
        foreach ($student["grades"] as $grade) {
            echo "$grade ";
        }
        
        echo "<br>";
    }
?>
```

### Example 5: Foreach with Reference
```php
<?php
    $prices = [100, 200, 300, 400];
    
    echo "Original prices:<br>";
    foreach ($prices as $price) {
        echo "\$$price ";
    }
    echo "<br><br>";
    
    // Apply 10% discount using reference
    foreach ($prices as &$price) {
        $price = $price * 0.9;
    }
    unset($price); // Important: unset reference
    
    echo "Discounted prices (10% off):<br>";
    foreach ($prices as $price) {
        echo "\$$price ";
    }
?>
```

---

## 11. Break and Continue

### Example 1: Break Statement
```php
<?php
    for ($i = 1; $i <= 10; $i++) {
        if ($i === 5) {
            echo "Breaking at $i<br>";
            break;
        }
        echo "Number: $i<br>";
    }
?>
```

### Example 2: Continue Statement
```php
<?php
    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 === 0) {
            continue; // Skip even numbers
        }
        echo "Odd number: $i<br>";
    }
?>
```

### Example 3: Break in Nested Loops
```php
<?php
    for ($i = 1; $i <= 3; $i++) {
        echo "Outer loop: $i<br>";
        
        for ($j = 1; $j <= 5; $j++) {
            if ($j === 3) {
                break 2; // Break out of both loops
            }
            echo "  Inner loop: $j<br>";
        }
    }
    
    echo "Both loops exited.";
?>
```

### Example 4: Continue with Specific Level
```php
<?php
    for ($i = 1; $i <= 3; $i++) {
        echo "Outer: $i<br>";
        
        for ($j = 1; $j <= 3; $j++) {
            if ($j === 2) {
                continue 2; // Skip to next iteration of outer loop
            }
            echo "  Inner: $j<br>";
        }
    }
?>
```

### Example 5: Search with Break
```php
<?php
    $numbers = [3, 7, 12, 25, 38, 42, 56];
    $searchValue = 38;
    $found = false;
    
    foreach ($numbers as $index => $number) {
        if ($number === $searchValue) {
            echo "Found $searchValue at index $index!";
            $found = true;
            break;
        }
        
        if ($number > $searchValue) {
            echo "$searchValue not found (passed it).";
            break;
        }
    }
    
    if (!$found && $number <= $searchValue) {
        echo "$searchValue not found in array.";
    }
?>
```

---

## 12. Alternative Syntax

### Example 1: Alternative If Syntax
```php
<?php
    $age = 20;
    
    if ($age >= 18):
        echo "You are an adult.";
    else:
        echo "You are a minor.";
    endif;
?>
```

### Example 2: Alternative Foreach in HTML
```php
<!DOCTYPE html>
<html>
<head>
    <title>Alternative Syntax</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <?php
        $users = ["Alice", "Bob", "Charlie", "Diana"];
        foreach ($users as $user):
        ?>
            <li><?= $user ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
```

### Example 3: Alternative For Loop
```php
<?php
    for ($i = 1; $i <= 5; $i++):
        echo "Number: $i<br>";
    endfor;
?>
```

### Example 4: Alternative While Loop
```php
<?php
    $counter = 1;
    
    while ($counter <= 5):
        echo "Count: $counter<br>";
        $counter++;
    endwhile;
?>
```

### Example 5: Alternative Switch Syntax
```php
<?php
    $day = "Wednesday";
    
    switch ($day):
        case "Monday":
            echo "Start of week";
            break;
        case "Wednesday":
            echo "Midweek";
            break;
        case "Friday":
            echo "End of work week";
            break;
        default:
            echo "Other day";
    endswitch;
?>
```

---

## Practice Exercises

### Exercise 1: FizzBuzz
Print numbers from 1 to 100. For multiples of 3, print "Fizz". For multiples of 5, print "Buzz". For multiples of both 3 and 5, print "FizzBuzz".

### Exercise 2: Prime Number Checker
Check if a given number is prime.

### Exercise 3: Fibonacci Sequence
Generate the first 20 numbers in the Fibonacci sequence.

### Exercise 4: Number Guessing Game
Simulate a number guessing game where the user has 5 attempts to guess a random number between 1-100.

### Exercise 5: Pattern Printer
Create different star patterns using nested loops.

---

## Solutions

### Solution 1: FizzBuzz
```php
<?php
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            echo "FizzBuzz<br>";
        } elseif ($i % 3 === 0) {
            echo "Fizz<br>";
        } elseif ($i % 5 === 0) {
            echo "Buzz<br>";
        } else {
            echo "$i<br>";
        }
    }
?>
```

### Solution 2: Prime Number Checker
```php
<?php
    $number = 29;
    $isPrime = true;
    
    if ($number <= 1) {
        $isPrime = false;
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                $isPrime = false;
                break;
            }
        }
    }
    
    if ($isPrime) {
        echo "$number is a prime number.";
    } else {
        echo "$number is not a prime number.";
    }
?>
```

### Solution 3: Fibonacci Sequence
```php
<?php
    $first = 0;
    $second = 1;
    
    echo "Fibonacci Sequence (first 20 numbers):<br>";
    echo "$first $second ";
    
    for ($i = 3; $i <= 20; $i++) {
        $next = $first + $second;
        echo "$next ";
        $first = $second;
        $second = $next;
    }
?>
```

### Solution 4: Number Guessing Game
```php
<?php
    $secretNumber = rand(1, 100);
    $maxAttempts = 5;
    $guesses = [45, 67, 23, 89, 50]; // Simulated guesses
    
    echo "Guess the number (1-100). You have $maxAttempts attempts.<br><br>";
    
    foreach ($guesses as $attempt => $guess) {
        $currentAttempt = $attempt + 1;
        echo "Attempt $currentAttempt: Guess = $guess<br>";
        
        if ($guess === $secretNumber) {
            echo "🎉 Congratulations! You guessed it!";
            break;
        } elseif ($guess < $secretNumber) {
            echo "Too low!<br>";
        } else {
            echo "Too high!<br>";
        }
        
        if ($currentAttempt === $maxAttempts) {
            echo "Game Over! The number was $secretNumber.";
        }
    }
?>
```

### Solution 5: Pattern Printer
```php
<?php
    // Pattern 1: Right-angled triangle
    echo "<h3>Pattern 1</h3>";
    for ($i = 1; $i <= 5; $i++) {
        echo str_repeat("*", $i) . "<br>";
    }
    
    // Pattern 2: Inverted triangle
    echo "<h3>Pattern 2</h3>";
    for ($i = 5; $i >= 1; $i--) {
        echo str_repeat("*", $i) . "<br>";
    }
    
    // Pattern 3: Pyramid
    echo "<h3>Pattern 3</h3>";
    for ($i = 1; $i <= 5; $i++) {
        echo str_repeat("&nbsp;", 5 - $i);
        echo str_repeat("*", (2 * $i - 1));
        echo "<br>";
    }
?>
```

---

**Previous Topic:** [PHP Basics](../01-basics/README.md)  
**Next Topic:** [Functions](../03-functions/README.md)
