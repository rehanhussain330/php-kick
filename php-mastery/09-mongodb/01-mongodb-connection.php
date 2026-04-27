<?php
/**
 * MongoDB Connection Example
 * Requires: MongoDB PHP Extension and MongoDB Server
 */

echo "=== MongoDB Connection ===\n\n";

// Connection string
$connectionString = "mongodb://localhost:27017";
$databaseName = "test_db";
$collectionName = "users";

// 1. Basic Connection
echo "1. MongoDB Connection:\n";
try {
    // Uncomment to test actual connection
    // $client = new MongoDB\Client($connectionString);
    echo "   Connection String: $connectionString\n";
    echo "   Database: $databaseName\n";
    echo "   ✓ Connection parameters configured\n";
} catch (Exception $e) {
    echo "   ✗ Connection failed: " . $e->getMessage() . "\n";
}
echo "\n";

// 2. Insert Document
echo "2. Insert Document:\n";
$insertData = [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'age' => 30,
    'created_at' => new MongoDB\BSON\UTCDateTime()
];
echo "   Data to insert:\n";
foreach ($insertData as $key => $value) {
    if ($value instanceof MongoDB\BSON\UTCDateTime) {
        echo "     $key: [UTCDateTime]\n";
    } else {
        echo "     $key: $value\n";
    }
}
echo "\n";

// 3. Find Documents
echo "3. Find Documents:\n";
echo "   Query: ['age' => ['$gte' => 18]]\n";
echo "   Returns all users 18 and older\n\n";

// 4. Update Document
echo "4. Update Document:\n";
$updateQuery = ['_id' => new MongoDB\BSON\ObjectId('507f1f77bcf86cd799439011')];
$updateData = ['$set' => ['status' => 'active']];
echo "   Query: " . json_encode($updateQuery) . "\n";
echo "   Update: " . json_encode($updateData) . "\n\n";

// 5. Delete Document
echo "5. Delete Document:\n";
$deleteQuery = ['email' => 'test@example.com'];
echo "   Query: " . json_encode($deleteQuery) . "\n\n";

// 6. Complete CRUD Class
echo "6. MongoDB Helper Class:\n";
echo <<<CODE
class MongoDBHelper {
    private \$client;
    private \$database;
    
    public function __construct(\$connectionString, \$dbName) {
        \$this->client = new MongoDB\\Client(\$connectionString);
        \$this->database = \$this->client->\$dbName;
    }
    
    public function insert(\$collection, \$data) {
        return \$this->database->\$collection->insertOne(\$data);
    }
    
    public function find(\$collection, \$filter = []) {
        return \$this->database->\$collection->find(\$filter);
    }
    
    public function update(\$collection, \$filter, \$update) {
        return \$this->database->\$collection->updateOne(\$filter, \$update);
    }
    
    public function delete(\$collection, \$filter) {
        return \$this->database->\$collection->deleteOne(\$filter);
    }
}
CODE;
echo "\n\n";

// 7. Aggregation Example
echo "7. Aggregation Pipeline:\n";
$pipeline = [
    ['$match' => ['status' => 'active']],
    ['$group' => ['_id' => '$category', 'total' => ['$sum' => '$amount']]],
    ['$sort' => ['total' => -1]]
];
echo "   Pipeline:\n";
echo "   1. Match active records\n";
echo "   2. Group by category\n";
echo "   3. Sort by total (descending)\n\n";

// 8. Index Creation
echo "8. Create Index:\n";
echo "   Collection: users\n";
echo "   Index: ['email' => 1] (ascending)\n";
echo "   Purpose: Speed up email lookups\n\n";

echo "=== End of MongoDB Example ===\n";
echo "\nNote: Install MongoDB PHP extension:\n";
echo "   pecl install mongodb\n";
echo "   composer require mongodb/mongodb\n";
?>
