<?php
/**
 * Database Connection: MySQL with PDO
 * Example 1: Connecting to MySQL Database
 */

echo "=== MySQL Database Connection ===\n\n";

// Configuration
$host = 'localhost';
$dbname = 'test_db';
$username = 'root';
$password = '';

// 1. Basic PDO Connection (Try-Catch)
echo "1. PDO Connection Example:\n";
try {
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];
    
    // Uncomment to test actual connection
    // $pdo = new PDO($dsn, $username, $password, $options);
    echo "   DSN: mysql:host=$host;dbname=$dbname;charset=utf8mb4\n";
    echo "   ✓ Connection string created successfully\n";
} catch (PDOException $e) {
    echo "   ✗ Connection failed: " . $e->getMessage() . "\n";
}
echo "\n";

// 2. MySQLi Connection
echo "2. MySQLi Connection Example:\n";
try {
    // Uncomment to test actual connection
    // $mysqli = new mysqli($host, $username, $password, $dbname);
    echo "   Host: $host\n";
    echo "   Database: $dbname\n";
    echo "   ✓ MySQLi connection parameters configured\n";
} catch (Exception $e) {
    echo "   ✗ Connection failed: " . $e->getMessage() . "\n";
}
echo "\n";

// 3. Create Table Example
echo "3. CREATE TABLE Statement:\n";
$createTableSQL = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;
echo "   SQL:\n";
foreach (explode("\n", $createTableSQL) as $line) {
    echo "   " . trim($line) . "\n";
}
echo "\n";

// 4. INSERT Data (Prepared Statements)
echo "4. INSERT with Prepared Statement:\n";
$insertSQL = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
echo "   SQL: $insertSQL\n";
echo "   Using prepared statements prevents SQL injection!\n\n";

// 5. SELECT Data
echo "5. SELECT Query Examples:\n";
$selectSQL = "SELECT id, name, email FROM users WHERE active = :active";
echo "   SQL: $selectSQL\n";
echo "   Fetch modes: FETCH_ASSOC, FETCH_OBJ, FETCH_BOTH\n\n";

// 6. UPDATE Data
echo "6. UPDATE with Prepared Statement:\n";
$updateSQL = "UPDATE users SET name = :name WHERE id = :id";
echo "   SQL: $updateSQL\n\n";

// 7. DELETE Data
echo "7. DELETE with Prepared Statement:\n";
$deleteSQL = "DELETE FROM users WHERE id = :id";
echo "   SQL: $deleteSQL\n\n";

// 8. Complete CRUD Class Example
echo "8. Database Helper Class:\n";
class Database {
    private $host = 'localhost';
    private $db_name = 'test_db';
    private $username = 'root';
    private $password = '';
    private $conn;
    
    public function connect() {
        $this->conn = null;
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}

echo "   Class Database created with connect() method\n\n";

// 9. Transaction Example
echo "9. Database Transactions:\n";
echo "   Steps:\n";
echo "   1. \$pdo->beginTransaction()\n";
echo "   2. Execute multiple queries\n";
echo "   3. \$pdo->commit() on success\n";
echo "   4. \$pdo->rollBack() on error\n\n";

// 10. Error Handling Best Practices
echo "10. Error Handling Best Practices:\n";
echo "   ✓ Use try-catch blocks\n";
echo "   ✓ Log errors instead of displaying\n";
echo "   ✓ Use prepared statements\n";
echo "   ✓ Validate input before queries\n";
echo "   ✓ Close connections properly\n\n";

echo "=== End of MySQL Connection Example ===\n";
?>
