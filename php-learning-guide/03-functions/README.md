# PHP Functions - Complete Guide

## Table of Contents
1. Basic Functions
2. Function Parameters
3. Return Values
4. Default Parameter Values
5. Type Declarations
6. Anonymous Functions
7. Arrow Functions (PHP 7.4+)
8. Recursive Functions
9. Variable Functions
10. Callback Functions
11. Closures
12. Generator Functions
13. Built-in Functions
14. Best Practices

---

## 1. Basic Functions

### Example 1: Simple Function
```php
<?php
    function sayHello() {
        echo "Hello, World!";
    }
    
    sayHello(); // Call the function
?>
```

### Example 2: Function with Documentation
```php
<?php
/**
 * Display a welcome message
 * 
 * @return void
 */
function welcome() {
    echo "Welcome to our website!";
}

welcome();
?>
```

### Example 3: Multiple Functions in One File
```php
<?php
    function headerSection() {
        echo "<header><h1>My Website</h1></header>";
    }
    
    function footerSection() {
        echo "<footer><p>&copy; 2024</p></footer>";
    }
    
    function mainContent() {
        echo "<main><p>Main content here</p></main>";
    }
    
    headerSection();
    mainContent();
    footerSection();
?>
```

### Example 4: Function Calling Another Function
```php
<?php
    function calculateArea($length, $width) {
        return $length * $width;
    }
    
    function calculateCost($area, $pricePerSqFt) {
        return $area * $pricePerSqFt;
    }
    
    $length = 10;
    $width = 5;
    $price = 50;
    
    $area = calculateArea($length, $width);
    $totalCost = calculateCost($area, $price);
    
    echo "Area: $area sq ft<br>";
    echo "Total Cost: \$$totalCost";
?>
```

### Example 5: Function with Static Variables
```php
<?php
    function counter() {
        static $count = 0;
        $count++;
        echo "Count: $count<br>";
    }
    
    counter(); // Count: 1
    counter(); // Count: 2
    counter(); // Count: 3
?>
```

---

## 2. Function Parameters

### Example 1: Function with Single Parameter
```php
<?php
    function greet($name) {
        echo "Hello, $name!";
    }
    
    greet("Alice");
    greet("Bob");
?>
```

### Example 2: Function with Multiple Parameters
```php
<?php
    function introduce($name, $age, $city) {
        echo "Hi, I'm $name, $age years old from $city.";
    }
    
    introduce("John", 30, "New York");
?>
```

### Example 3: Pass by Value vs Reference
```php
<?php
    function modifyByValue($num) {
        $num = $num * 2;
        echo "Inside function (value): $num<br>";
    }
    
    function modifyByReference(&$num) {
        $num = $num * 2;
        echo "Inside function (reference): $num<br>";
    }
    
    $number = 5;
    modifyByValue($number);
    echo "After value call: $number<br>"; // Still 5
    
    modifyByReference($number);
    echo "After reference call: $number<br>"; // Now 10
?>
```

### Example 4: Variable Number of Arguments
```php
<?php
    function sum(...$numbers) {
        $total = 0;
        foreach ($numbers as $num) {
            $total += $num;
        }
        return $total;
    }
    
    echo sum(1, 2, 3) . "<br>"; // 6
    echo sum(1, 2, 3, 4, 5) . "<br>"; // 15
    echo sum(10, 20, 30, 40, 50, 60) . "<br>"; // 210
?>
```

### Example 5: Named Parameters (PHP 8+)
```php
<?php
    function createUser($name, $email, $age, $role = 'user') {
        return [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'role' => $role
        ];
    }
    
    // Using named parameters
    $user = createUser(
        name: "Alice",
        email: "alice@example.com",
        age: 25,
        role: "admin"
    );
    
    print_r($user);
?>
```

---

## 3. Return Values

### Example 1: Function Returning a Value
```php
<?php
    function add($a, $b) {
        return $a + $b;
    }
    
    $result = add(5, 3);
    echo "Result: $result"; // 8
?>
```

### Example 2: Function Returning Multiple Values
```php
<?php
    function calculateStats($numbers) {
        $sum = array_sum($numbers);
        $average = $sum / count($numbers);
        $min = min($numbers);
        $max = max($numbers);
        
        return [$sum, $average, $min, $max];
    }
    
    $data = [10, 20, 30, 40, 50];
    list($sum, $avg, $min, $max) = calculateStats($data);
    
    echo "Sum: $sum, Avg: $avg, Min: $min, Max: $max";
?>
```

### Example 3: Function Returning Array
```php
<?php
    function getUserInfo($id) {
        // Simulate database lookup
        return [
            'id' => $id,
            'name' => "User $id",
            'email' => "user$id@example.com",
            'active' => true
        ];
    }
    
    $user = getUserInfo(123);
    echo "Name: " . $user['name'];
?>
```

### Example 4: Function Returning Object
```php
<?php
    class Person {
        public $name;
        public $age;
        
        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }
    }
    
    function createPerson($name, $age) {
        return new Person($name, $age);
    }
    
    $person = createPerson("John", 30);
    echo "{$person->name} is {$person->age} years old";
?>
```

### Example 5: Function Returning Null
```php
<?php
    function findUser($id) {
        $users = [1 => 'Alice', 2 => 'Bob'];
        
        if (isset($users[$id])) {
            return $users[$id];
        }
        
        return null;
    }
    
    $user = findUser(1);
    if ($user !== null) {
        echo "Found: $user";
    } else {
        echo "User not found";
    }
?>
```

---

## 4. Default Parameter Values

### Example 1: Basic Default Values
```php
<?php
    function greet($name, $greeting = "Hello") {
        return "$greeting, $name!";
    }
    
    echo greet("Alice") . "<br>"; // Hello, Alice!
    echo greet("Bob", "Hi") . "<br>"; // Hi, Bob!
?>
```

### Example 2: Multiple Default Parameters
```php
<?php
    function createPost($title, $content, $status = 'draft', $author = 'Admin') {
        return [
            'title' => $title,
            'content' => $content,
            'status' => $status,
            'author' => $author
        ];
    }
    
    $post1 = createPost("My Post", "Content here");
    $post2 = createPost("Published Post", "More content", 'published', 'John');
    
    print_r($post1);
    print_r($post2);
?>
```

### Example 3: Default Values with Types
```php
<?php
    function calculateDiscount($amount, float $discountRate = 0.10): float {
        return $amount - ($amount * $discountRate);
    }
    
    echo calculateDiscount(100) . "<br>"; // 90
    echo calculateDiscount(100, 0.20) . "<br>"; // 80
?>
```

### Example 4: Default Array Parameter
```php
<?php
    function createUser($name, array $options = []) {
        $defaults = [
            'role' => 'user',
            'active' => true,
            'notifications' => true
        ];
        
        $config = array_merge($defaults, $options);
        
        return [
            'name' => $name,
            ...$config
        ];
    }
    
    $user1 = createUser("Alice");
    $user2 = createUser("Bob", ['role' => 'admin', 'active' => false]);
    
    print_r($user2);
?>
```

### Example 5: Required After Default (PHP 8+)
```php
<?php
    // In PHP 8+, required parameters can come after default parameters
    function orderItems($shipping = 'standard', $priority) {
        return [
            'shipping' => $shipping,
            'priority' => $priority
        ];
    }
    
    $order = orderItems('express', true);
    print_r($order);
?>
```

---

## 5. Type Declarations

### Example 1: Parameter Type Declaration
```php
<?php
    function add(int $a, int $b): int {
        return $a + $b;
    }
    
    echo add(5, 3); // 8
    // add("5", "3"); // TypeError in strict mode
?>
```

### Example 2: Strict Types
```php
<?php
    declare(strict_types=1);
    
    function multiply(float $a, float $b): float {
        return $a * $b;
    }
    
    echo multiply(2.5, 3.5); // 8.75
    // multiply(2, 3); // TypeError: int given, float expected
?>
```

### Example 3: Union Types (PHP 8+)
```php
<?php
    function processInput(string|int $input): string {
        return "Processing: $input";
    }
    
    echo processInput("hello") . "<br>";
    echo processInput(123) . "<br>";
?>
```

### Example 4: Nullable Types
```php
<?php
    function findUser(?int $id): ?string {
        if ($id === null) {
            return null;
        }
        
        return "User $id";
    }
    
    echo findUser(1) . "<br>"; // User 1
    var_dump(findUser(null)); // NULL
?>
```

### Example 5: Mixed Type (PHP 8+)
```php
<?php
    function handleAny(mixed $value): mixed {
        return $value;
    }
    
    echo handleAny("string") . "<br>";
    echo handleAny(123) . "<br>";
    print_r(handleAny([1, 2, 3]));
?>
```

---

## 6. Anonymous Functions

### Example 1: Basic Anonymous Function
```php
<?php
    $greet = function($name) {
        return "Hello, $name!";
    };
    
    echo $greet("Alice");
?>
```

### Example 2: Anonymous Function as Callback
```php
<?php
    $numbers = [1, 2, 3, 4, 5];
    
    $doubled = array_map(function($n) {
        return $n * 2;
    }, $numbers);
    
    print_r($doubled);
?>
```

### Example 3: Closure with use Keyword
```php
<?php
    $taxRate = 0.10;
    
    $calculateTax = function($amount) use ($taxRate) {
        return $amount * $taxRate;
    };
    
    echo $calculateTax(100); // 10
?>
```

### Example 4: Self-Executing Anonymous Function
```php
<?php
    $result = (function($a, $b) {
        return $a + $b;
    })(5, 3);
    
    echo $result; // 8
?>
```

### Example 5: Anonymous Function in Class
```php
<?php
    class Calculator {
        public $operation;
        
        public function __construct() {
            $this->operation = function($a, $b) {
                return $a + $b;
            };
        }
        
        public function calculate($a, $b) {
            $func = $this->operation;
            return $func($a, $b);
        }
    }
    
    $calc = new Calculator();
    echo $calc->calculate(10, 5);
?>
```

---

## 7. Arrow Functions (PHP 7.4+)

### Example 1: Basic Arrow Function
```php
<?php
    $add = fn($a, $b) => $a + $b;
    
    echo $add(5, 3); // 8
?>
```

### Example 2: Arrow Function with array_map
```php
<?php
    $numbers = [1, 2, 3, 4, 5];
    
    $squared = array_map(fn($n) => $n ** 2, $numbers);
    
    print_r($squared);
?>
```

### Example 3: Arrow Function with Filtering
```php
<?php
    $ages = [15, 22, 18, 30, 17, 45];
    
    $adults = array_filter($ages, fn($age) => $age >= 18);
    
    print_r($adults);
?>
```

### Example 4: Arrow Function Capturing Variables
```php
<?php
    $multiplier = 3;
    
    $multiply = fn($n) => $n * $multiplier;
    
    echo $multiply(5); // 15
?>
```

### Example 5: Chaining Arrow Functions
```php
<?php
    $numbers = [1, 2, 3, 4, 5, 6];
    
    $result = array_sum(
        array_map(
            fn($n) => $n ** 2,
            array_filter($numbers, fn($n) => $n % 2 === 0)
        )
    );
    
    echo $result; // 4 + 16 + 36 = 56
?>
```

---

## 8. Recursive Functions

### Example 1: Factorial Calculation
```php
<?php
    function factorial($n) {
        if ($n <= 1) {
            return 1;
        }
        return $n * factorial($n - 1);
    }
    
    echo factorial(5); // 120
?>
```

### Example 2: Fibonacci Sequence
```php
<?php
    function fibonacci($n) {
        if ($n <= 1) {
            return $n;
        }
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
    
    for ($i = 0; $i < 10; $i++) {
        echo fibonacci($i) . " ";
    }
?>
```

### Example 3: Directory Traversal
```php
<?php
    function listFiles($dir, $indent = 0) {
        $files = scandir($dir);
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue;
            
            $path = $dir . '/' . $file;
            echo str_repeat("  ", $indent) . $file . "<br>";
            
            if (is_dir($path)) {
                listFiles($path, $indent + 1);
            }
        }
    }
    
    // listFiles('.');
?>
```

### Example 4: Recursive Array Flatten
```php
<?php
    function flattenArray($array) {
        $result = [];
        
        foreach ($array as $item) {
            if (is_array($item)) {
                $result = array_merge($result, flattenArray($item));
            } else {
                $result[] = $item;
            }
        }
        
        return $result;
    }
    
    $nested = [1, [2, 3], [4, [5, 6]], 7];
    $flat = flattenArray($nested);
    
    print_r($flat);
?>
```

### Example 5: Binary Search (Recursive)
```php
<?php
    function binarySearch($arr, $target, $low = 0, $high = null) {
        if ($high === null) {
            $high = count($arr) - 1;
        }
        
        if ($low > $high) {
            return -1;
        }
        
        $mid = intval(($low + $high) / 2);
        
        if ($arr[$mid] === $target) {
            return $mid;
        } elseif ($arr[$mid] > $target) {
            return binarySearch($arr, $target, $low, $mid - 1);
        } else {
            return binarySearch($arr, $target, $mid + 1, $high);
        }
    }
    
    $sorted = [1, 3, 5, 7, 9, 11, 13];
    echo binarySearch($sorted, 7); // 3
?>
```

---

## 9. Variable Functions

### Example 1: Basic Variable Function
```php
<?php
    function sayHello() {
        echo "Hello!";
    }
    
    function sayGoodbye() {
        echo "Goodbye!";
    }
    
    $functionName = "sayHello";
    $functionName(); // Hello!
    
    $functionName = "sayGoodbye";
    $functionName(); // Goodbye!
?>
```

### Example 2: Dynamic Function Calls
```php
<?php
    function add($a, $b) {
        return $a + $b;
    }
    
    function subtract($a, $b) {
        return $a - $b;
    }
    
    function multiply($a, $b) {
        return $a * $b;
    }
    
    $operation = "add";
    echo $operation(5, 3); // 8
?>
```

### Example 3: call_user_func()
```php
<?php
    function greet($name) {
        return "Hello, $name!";
    }
    
    echo call_user_func("greet", "Alice") . "<br>";
    
    // With multiple parameters
    function introduce($name, $age, $city) {
        return "$name is $age years old from $city";
    }
    
    echo call_user_func("introduce", "Bob", 30, "NYC");
?>
```

### Example 4: call_user_func_array()
```php
<?php
    function sum(...$numbers) {
        return array_sum($numbers);
    }
    
    $args = [1, 2, 3, 4, 5];
    echo call_user_func_array("sum", $args); // 15
?>
```

### Example 5: Method Invocation with Variable Functions
```php
<?php
    class Greeter {
        public function sayHello() {
            return "Hello!";
        }
        
        public function sayGoodbye() {
            return "Goodbye!";
        }
    }
    
    $obj = new Greeter();
    $method = "sayHello";
    
    echo $obj->$method(); // Hello!
?>
```

---

## 10. Callback Functions

### Example 1: Callback with array_map
```php
<?php
    function square($n) {
        return $n ** 2;
    }
    
    $numbers = [1, 2, 3, 4, 5];
    $squared = array_map("square", $numbers);
    
    print_r($squared);
?>
```

### Example 2: Callback with array_filter
```php
<?php
    function isEven($n) {
        return $n % 2 === 0;
    }
    
    $numbers = [1, 2, 3, 4, 5, 6];
    $evens = array_filter($numbers, "isEven");
    
    print_r($evens);
?>
```

### Example 3: Callback with usort
```php
<?php
    function compareNumbers($a, $b) {
        return $a <=> $b;
    }
    
    $numbers = [5, 2, 8, 1, 9];
    usort($numbers, "compareNumbers");
    
    print_r($numbers);
?>
```

### Example 4: Custom Callback Function
```php
<?php
    function processData($data, callable $callback) {
        $result = [];
        
        foreach ($data as $item) {
            $result[] = $callback($item);
        }
        
        return $result;
    }
    
    $numbers = [1, 2, 3, 4, 5];
    
    $doubled = processData($numbers, fn($n) => $n * 2);
    $tripled = processData($numbers, fn($n) => $n * 3);
    
    print_r($doubled);
    print_r($tripled);
?>
```

### Example 5: Callback with Error Handling
```php
<?php
    function safeExecute($callback, $onError = null) {
        try {
            return $callback();
        } catch (Exception $e) {
            if ($onError) {
                return $onError($e);
            }
            return "Error: " . $e->getMessage();
        }
    }
    
    $result = safeExecute(
        fn() => 10 / 2,
        fn($e) => "Handled: " . $e->getMessage()
    );
    
    echo $result;
?>
```

---

## 11. Closures

### Example 1: Basic Closure
```php
<?php
    $closure = function($x) {
        return $x * 2;
    };
    
    echo $closure(5); // 10
?>
```

### Example 2: Closure with bindTo
```php
<?php
    class Person {
        private $name = "John";
        
        public function getBinder() {
            return function() {
                return $this->name;
            };
        }
    }
    
    $person = new Person();
    $binder = $person->getBinder();
    
    // Bind to object
    $bound = $binder->bindTo($person, Person::class);
    echo $bound(); // John
?>
```

### Example 3: Closure Factory
```php
<?php
    function makeMultiplier($factor) {
        return function($value) use ($factor) {
            return $value * $factor;
        };
    }
    
    $double = makeMultiplier(2);
    $triple = makeMultiplier(3);
    
    echo $double(5) . "<br>"; // 10
    echo $triple(5) . "<br>"; // 15
?>
```

### Example 4: Closure for Event Handling
```php
<?php
    class EventEmitter {
        private $listeners = [];
        
        public function on($event, callable $listener) {
            $this->listeners[$event][] = $listener;
        }
        
        public function emit($event, $data = null) {
            if (isset($this->listeners[$event])) {
                foreach ($this->listeners[$event] as $listener) {
                    $listener($data);
                }
            }
        }
    }
    
    $emitter = new EventEmitter();
    
    $emitter->on('login', function($user) {
        echo "User $user logged in<br>";
    });
    
    $emitter->emit('login', 'Alice');
?>
```

### Example 5: Closure with Memoization
```php
<?php
    function memoize($func) {
        $cache = [];
        
        return function(...$args) use ($func, &$cache) {
            $key = serialize($args);
            
            if (!isset($cache[$key])) {
                $cache[$key] = call_user_func_array($func, $args);
            }
            
            return $cache[$key];
        };
    }
    
    $expensive = memoize(function($n) {
        echo "Calculating...<br>";
        return $n * $n;
    });
    
    echo $expensive(5) . "<br>"; // Calculates
    echo $expensive(5) . "<br>"; // From cache
?>
```

---

## 12. Generator Functions

### Example 1: Basic Generator
```php
<?php
    function countUp($max) {
        for ($i = 1; $i <= $max; $i++) {
            yield $i;
        }
    }
    
    foreach (countUp(5) as $number) {
        echo $number . "<br>";
    }
?>
```

### Example 2: Generator for Large Datasets
```php
<?php
    function readLargeFile($file) {
        $handle = fopen($file, 'r');
        
        while (($line = fgets($handle)) !== false) {
            yield $line;
        }
        
        fclose($handle);
    }
    
    // Usage without loading entire file into memory
    // foreach (readLargeFile('large.txt') as $line) {
    //     echo $line;
    // }
?>
```

### Example 3: Generator with Keys
```php
<?php
    function powers($base, $count) {
        for ($i = 0; $i < $count; $i++) {
            yield $i => pow($base, $i);
        }
    }
    
    foreach (powers(2, 5) as $exponent => $value) {
        echo "2^$exponent = $value<br>";
    }
?>
```

### Example 4: Generator for Range
```php
<?php
    function rangeGenerator($start, $end, $step = 1) {
        for ($i = $start; $i <= $end; $i += $step) {
            yield $i;
        }
    }
    
    foreach (rangeGenerator(0, 10, 2) as $num) {
        echo "$num ";
    }
?>
```

### Example 5: Generator with send()
```php
<?php
    function logger() {
        while (true) {
            $message = yield;
            echo "[LOG] $message<br>";
        }
    }
    
    $log = logger();
    $log->send("Application started");
    $log->send("User logged in");
    $log->send("Process completed");
?>
```

---

## 13. Built-in Functions Examples

### Example 1: String Functions
```php
<?php
    $text = "Hello World";
    
    echo strlen($text) . "<br>";      // 11
    echo strtoupper($text) . "<br>";  // HELLO WORLD
    echo strtolower($text) . "<br>";  // hello world
    echo str_replace("World", "PHP", $text) . "<br>"; // Hello PHP
    echo substr($text, 0, 5) . "<br>"; // Hello
?>
```

### Example 2: Array Functions
```php
<?php
    $arr = [3, 1, 4, 1, 5, 9];
    
    sort($arr);
    print_r($arr); // [1, 1, 3, 4, 5, 9]
    
    echo array_sum($arr) . "<br>"; // 23
    echo count($arr) . "<br>"; // 6
    
    $merged = array_merge([1, 2], [3, 4]);
    print_r($merged);
?>
```

### Example 3: Math Functions
```php
<?php
    echo abs(-5) . "<br>";        // 5
    echo round(3.7) . "<br>";     // 4
    echo ceil(3.2) . "<br>";      // 4
    echo floor(3.8) . "<br>";     // 3
    echo sqrt(16) . "<br>";       // 4
    echo pow(2, 3) . "<br>";      // 8
    echo rand(1, 100) . "<br>";   // Random number
?>
```

### Example 4: Date/Time Functions
```php
<?php
    echo date("Y-m-d H:i:s") . "<br>";
    echo date("l, F j, Y") . "<br>";
    
    $timestamp = strtotime("next Monday");
    echo date("Y-m-d", $timestamp) . "<br>";
    
    $date = new DateTime();
    $date->modify("+1 week");
    echo $date->format("Y-m-d");
?>
```

### Example 5: File Functions
```php
<?php
    // Check if file exists
    if (file_exists("test.txt")) {
        echo "File exists<br>";
    }
    
    // Get file contents
    // $content = file_get_contents("test.txt");
    
    // Write to file
    // file_put_contents("test.txt", "Hello!");
    
    // Get file size
    // echo filesize("test.txt");
?>
```

---

## 14. Best Practices

### Example 1: Function Naming Conventions
```php
<?php
    // Good names
    function calculateTotalPrice() {}
    function getUserById() {}
    function isValidEmail() {}
    function formatCurrency() {}
    
    // Bad names
    // function func1() {}
    // function doStuff() {}
    // function temp() {}
?>
```

### Example 2: Single Responsibility Principle
```php
<?php
    // Bad: Multiple responsibilities
    // function processAndSaveUserData($data) {
    //     // Validation
    //     // Processing
    //     // Saving to DB
    //     // Sending email
    // }
    
    // Good: Single responsibility
    function validateUserData($data) { /* ... */ }
    function processUserData($data) { /* ... */ }
    function saveUserData($data) { /* ... */ }
    function sendWelcomeEmail($email) { /* ... */ }
?>
```

### Example 3: Error Handling in Functions
```php
<?php
    function divide($a, $b) {
        if ($b === 0) {
            throw new InvalidArgumentException("Division by zero");
        }
        
        return $a / $b;
    }
    
    try {
        echo divide(10, 2);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
?>
```

### Example 4: Documentation with PHPDoc
```php
<?php
/**
 * Calculate the total price including tax
 *
 * @param float $price The base price
 * @param float $taxRate The tax rate (default 0.1 for 10%)
 * @return float The total price with tax
 * @throws InvalidArgumentException If price is negative
 */
function calculateTotalWithTax(float $price, float $taxRate = 0.1): float {
    if ($price < 0) {
        throw new InvalidArgumentException("Price cannot be negative");
    }
    
    return $price + ($price * $taxRate);
}
?>
```

### Example 5: Performance Considerations
```php
<?php
    // Bad: Recalculating count in loop
    // for ($i = 0; $i < count($array); $i++) {
    //     // count() called every iteration
    // }
    
    // Good: Cache the count
    function processArray($array) {
        $count = count($array);
        for ($i = 0; $i < $count; $i++) {
            // Process $array[$i]
        }
    }
    
    // Better: Use foreach
    foreach ($array as $item) {
        // Process $item
    }
?>
```

---

## Practice Exercises

### Exercise 1: Temperature Converter
Create functions to convert between Celsius, Fahrenheit, and Kelvin.

### Exercise 2: String Reverser
Write a function that reverses a string without using strrev().

### Exercise 3: Array Utilities
Create functions for: finding duplicates, removing duplicates, finding common elements.

### Exercise 4: Password Validator
Create a function that validates password strength.

### Exercise 5: Pagination Helper
Create a function that calculates pagination details.

---

**Previous Topic:** [Control Structures](../02-control-structures/README.md)  
**Next Topic:** [Arrays](../04-arrays/README.md)
