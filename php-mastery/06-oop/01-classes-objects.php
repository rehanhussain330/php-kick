<?php
/**
 * Object-Oriented Programming (OOP) - Part 1
 * Classes, Objects, Properties, and Methods
 */

echo "=== OOP: Classes and Objects ===\n\n";

// 1. Basic Class Definition
echo "1. Basic Class:\n";
class Car {
    public $brand;
    public $model;
    public $year;
    
    public function start() {
        return "Engine started!";
    }
}

$myCar = new Car();
$myCar->brand = "Toyota";
$myCar->model = "Camry";
$myCar->year = 2022;

echo "   {$myCar->brand} {$myCar->model} ({$myCar->year})\n";
echo "   Status: {$myCar->start()}\n\n";

// 2. Constructor Method
echo "2. Constructor:\n";
class Product {
    public $name;
    public $price;
    
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

$product = new Product("Laptop", 999.99);
echo "   Product: {$product->name}, Price: \${$product->price}\n\n";

// 3. Access Modifiers (Public, Private, Protected)
echo "3. Access Modifiers:\n";
class BankAccount {
    public $accountNumber;
    private $balance;
    
    public function __construct($accountNumber, $initialBalance) {
        $this->accountNumber = $accountNumber;
        $this->balance = $initialBalance;
    }
    
    public function getBalance() {
        return $this->balance;
    }
    
    public function deposit($amount) {
        if ($amount > 0) {
            $this->balance += $amount;
            return "Deposited \$$amount";
        }
        return "Invalid amount";
    }
    
    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            $this->balance -= $amount;
            return "Withdrew \$$amount";
        }
        return "Insufficient funds";
    }
}

$account = new BankAccount("ACC123456", 1000);
echo "   Account: {$account->accountNumber}\n";
echo "   Balance: \${$account->getBalance()}\n";
echo "   {$account->deposit(500)}\n";
echo "   New Balance: \${$account->getBalance()}\n";
echo "   {$account->withdraw(200)}\n";
echo "   Final Balance: \${$account->getBalance()}\n\n";

// 4. Static Properties and Methods
echo "4. Static Members:\n";
class MathUtils {
    public static $pi = 3.14159;
    
    public static function add($a, $b) {
        return $a + $b;
    }
}

echo "   Pi: " . MathUtils::$pi . "\n";
echo "   5 + 3 = " . MathUtils::add(5, 3) . "\n\n";

// 5. Inheritance
echo "5. Inheritance:\n";
class Animal {
    protected $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function speak() {
        return "Some sound";
    }
}

class Dog extends Animal {
    public function speak() {
        return "Woof!";
    }
    
    public function fetch() {
        return "{$this->name} is fetching!";
    }
}

$dog = new Dog("Buddy");
echo "   Pet: {$dog->name}\n";
echo "   Sound: {$dog->speak()}\n";
echo "   Action: {$dog->fetch()}\n\n";

// 6. Abstract Classes
echo "6. Abstract Class:\n";
abstract class Shape {
    abstract public function area();
    
    public function describe() {
        return "I am a shape";
    }
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    public function area() {
        return pi() * $this->radius * $this->radius;
    }
}

$circle = new Circle(5);
echo "   {$circle->describe()}\n";
echo "   Circle Area: " . round($circle->area(), 2) . "\n\n";

// 7. Interfaces
echo "7. Interfaces:\n";
interface Flyable {
    public function fly();
}

interface Swimmable {
    public function swim();
}

class Duck implements Flyable, Swimmable {
    public function fly() {
        return "Flying high!";
    }
    
    public function swim() {
        return "Swimming in water!";
    }
}

$duck = new Duck();
echo "   Duck: {$duck->fly()}\n";
echo "   Duck: {$duck->swim()}\n\n";

// 8. Traits
echo "8. Traits:\n";
trait Loggable {
    public function log($message) {
        return "[LOG]: $message";
    }
}

class Order {
    use Loggable;
    
    public function create() {
        return $this->log("Order created");
    }
}

$order = new Order();
echo "   " . $order->create() . "\n\n";

// 9. Magic Methods
echo "9. Magic Methods:\n";
class Person {
    private $data = [];
    
    public function __set($name, $value) {
        $this->data[$name] = $value;
    }
    
    public function __get($name) {
        return $this->data[$name] ?? null;
    }
    
    public function __toString() {
        return "Person object";
    }
}

$person = new Person();
$person->name = "Alice";
$person->age = 30;
echo "   " . $person . "\n";
echo "   Name: {$person->name}\n";
echo "   Age: {$person->age}\n\n";

// 10. Real-World Example: E-commerce System
echo "10. Real-World Example - E-commerce:\n";

class Customer {
    private $id;
    private $name;
    private $email;
    
    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }
    
    public function getName() {
        return $this->name;
    }
}

class ShoppingCart {
    private $items = [];
    
    public function addItem($name, $price, $quantity) {
        $this->items[] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity
        ];
    }
    
    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    public function displayCart() {
        foreach ($this->items as $item) {
            echo "   - {$item['name']}: \${$item['price']} × {$item['quantity']}\n";
        }
    }
}

$customer = new Customer(1, "John Doe", "john@example.com");
$cart = new ShoppingCart();

echo "   Customer: {$customer->getName()}\n";
echo "   Shopping Cart:\n";
$cart->addItem("Laptop", 999.99, 1);
$cart->addItem("Mouse", 29.99, 2);
$cart->displayCart();
echo "   Total: \$" . number_format($cart->getTotal(), 2) . "\n";

echo "\n=== End of OOP Part 1 ===\n";
?>
