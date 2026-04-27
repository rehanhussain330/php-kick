<?php
/**
 * PostgreSQL Connection Example
 * Requires: PostgreSQL PHP Extension (pdo_pgsql)
 */

echo "=== PostgreSQL Connection ===\n\n";

// Configuration
$host = 'localhost';
$port = '5432';
$dbname = 'test_db';
$username = 'postgres';
$password = '';

// 1. PDO Connection
echo "1. PDO Connection:\n";
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    
    // Uncomment to test actual connection
    // $pdo = new PDO($dsn, $username, $password, $options);
    echo "   DSN: $dsn\n";
    echo "   ✓ Connection parameters configured\n";
} catch (PDOException $e) {
    echo "   ✗ Connection failed: " . $e->getMessage() . "\n";
}
echo "\n";

// 2. pg_connect (Alternative)
echo "2. pg_connect Function:\n";
$connectionString = "host=$host port=$port dbname=$dbname user=$username password=$password";
echo "   Connection String: $connectionString\n";
echo "   Usage: \$conn = pg_connect(\$connectionString)\n\n";

// 3. CREATE TABLE
echo "3. CREATE TABLE Statement:\n";
$createTableSQL = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    is_active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
SQL;
echo "   SQL:\n";
foreach (explode("\n", $createTableSQL) as $line) {
    echo "   " . trim($line) . "\n";
}
echo "\n";

// 4. INSERT with Prepared Statement
echo "4. INSERT with Prepared Statement:\n";
$insertSQL = "INSERT INTO users (name, email, password) VALUES (\$1, \$2, \$3) RETURNING id";
echo "   SQL: $insertSQL\n";
echo "   Note: PostgreSQL uses \$1, \$2 for placeholders\n\n";

// 5. SELECT Query
echo "5. SELECT Query:\n";
$selectSQL = "SELECT id, name, email FROM users WHERE is_active = \$1 LIMIT 10";
echo "   SQL: $selectSQL\n\n";

// 6. UPDATE Query
echo "6. UPDATE Query:\n";
$updateSQL = "UPDATE users SET name = \$1 WHERE id = \$2";
echo "   SQL: $updateSQL\n\n";

// 7. DELETE Query
echo "7. DELETE Query:\n";
$deleteSQL = "DELETE FROM users WHERE id = \$1";
echo "   SQL: $deleteSQL\n\n";

// 8. Database Helper Class
echo "8. PostgreSQL Helper Class:\n";
class PostgresDB {
    private $conn;
    
    public function connect($host, $port, $dbname, $user, $pass) {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;";
        try {
            $this->conn = new PDO($dsn, $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            throw new Exception("Connection failed: " . $e->getMessage());
        }
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
echo "   Class PostgresDB created\n\n";

// 9. PostgreSQL-Specific Features
echo "9. PostgreSQL Features:\n";
echo "   - JSON/JSONB data types\n";
echo "   - Array columns\n";
echo "   - Full-text search\n";
echo "   - Window functions\n";
echo "   - Common Table Expressions (CTE)\n\n";

// 10. JSON Query Example
echo "10. JSON Query Example:\n";
$jsonQuery = <<<SQL
SELECT * FROM users 
WHERE metadata @> '{"premium": true}'
SQL;
echo "   Query users with premium status in JSON column:\n";
echo "   $jsonQuery\n\n";

echo "=== End of PostgreSQL Example ===\n";
echo "\nNote: Enable PostgreSQL extension:\n";
echo "   extension=pdo_pgsql in php.ini\n";
?>
