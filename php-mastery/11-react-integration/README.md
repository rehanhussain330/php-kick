# React.js Integration with PHP

## Architecture Overview

```
┌─────────────┐     HTTP/JSON     ┌─────────────┐
│   React.js  │ ◄──────────────►  │    PHP API  │
│  (Frontend) │                   │  (Backend)  │
└─────────────┘                   └─────────────┘
       │                                │
       │                                │
       ▼                                ▼
┌─────────────┐                   ┌─────────────┐
│   Browser   │                   │   Database  │
└─────────────┘                   └─────────────┘
```

## Project Structure

```
my-app/
├── frontend/          # React App
│   ├── src/
│   │   ├── components/
│   │   ├── App.js
│   │   └── index.js
│   └── package.json
└── backend/           # PHP API
    ├── api/
    │   └── index.php
    └── config/
        └── database.php
```

## Setup Instructions

### 1. Create React App

```bash
npx create-react-app frontend
cd frontend
npm install axios
```

### 2. Create PHP Backend

```bash
mkdir backend
cd backend
composer init
```

### 3. PHP API Example (backend/api/users.php)

```php
<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once '../config/database.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        getUsers($pdo);
        break;
    case 'POST':
        createUser($pdo);
        break;
    case 'PUT':
        updateUser($pdo);
        break;
    case 'DELETE':
        deleteUser($pdo);
        break;
}

function getUsers($pdo) {
    $stmt = $pdo->query("SELECT * FROM users");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}

function createUser($pdo) {
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$data['name'], $data['email']]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
}
?>
```

### 4. React Component (frontend/src/components/UserList.js)

```jsx
import React, { useState, useEffect } from 'react';
import axios from 'axios';

function UserList() {
    const [users, setUsers] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        fetchUsers();
    }, []);

    const fetchUsers = async () => {
        try {
            const response = await axios.get('http://localhost:8000/api/users.php');
            setUsers(response.data);
            setLoading(false);
        } catch (error) {
            console.error('Error:', error);
            setLoading(false);
        }
    };

    if (loading) return <div>Loading...</div>;

    return (
        <div>
            <h1>User List</h1>
            <ul>
                {users.map(user => (
                    <li key={user.id}>
                        {user.name} - {user.email}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default UserList;
```

### 5. React Form Component (frontend/src/components/UserForm.js)

```jsx
import React, { useState } from 'react';
import axios from 'axios';

function UserForm() {
    const [formData, setFormData] = useState({
        name: '',
        email: ''
    });

    const handleSubmit = async (e) => {
        e.preventDefault();
        try {
            const response = await axios.post(
                'http://localhost:8000/api/users.php',
                formData
            );
            alert('User created! ID: ' + response.data.id);
            setFormData({ name: '', email: '' });
        } catch (error) {
            console.error('Error:', error);
        }
    };

    return (
        <form onSubmit={handleSubmit}>
            <input
                type="text"
                value={formData.name}
                onChange={(e) => setFormData({...formData, name: e.target.value})}
                placeholder="Name"
            />
            <input
                type="email"
                value={formData.email}
                onChange={(e) => setFormData({...formData, email: e.target.value})}
                placeholder="Email"
            />
            <button type="submit">Create User</button>
        </form>
    );
}

export default UserForm;
```

### 6. CORS Configuration (PHP)

```php
// Add to all PHP API files
header('Access-Control-Allow-Origin: http://localhost:3000'); // React dev server
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
```

### 7. Environment Variables

**React (.env)**
```
REACT_APP_API_URL=http://localhost:8000/api
```

**PHP (config/.env)**
```
DB_HOST=localhost
DB_NAME=myapp
DB_USER=root
DB_PASS=password
```

### 8. Running the Application

```bash
# Terminal 1 - Start PHP Server
cd backend
php -S localhost:8000

# Terminal 2 - Start React Dev Server
cd frontend
npm start
```

### 9. Axios Interceptor (frontend/src/utils/api.js)

```javascript
import axios from 'axios';

const api = axios.create({
    baseURL: process.env.REACT_APP_API_URL,
    headers: {
        'Content-Type': 'application/json'
    }
});

api.interceptors.request.use(
    config => {
        const token = localStorage.getItem('token');
        if (token) {
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    },
    error => Promise.reject(error)
);

export default api;
```

### 10. Complete App.js Example

```jsx
import React from 'react';
import UserList from './components/UserList';
import UserForm from './components/UserForm';

function App() {
    return (
        <div className="App">
            <h1>React + PHP Integration</h1>
            <UserForm />
            <UserList />
        </div>
    );
}

export default App;
```

## Best Practices

1. **Use Environment Variables** for API URLs
2. **Implement Error Handling** in both frontend and backend
3. **Add Loading States** for better UX
4. **Validate Data** on both client and server
5. **Use HTTPS** in production
6. **Implement Authentication** (JWT recommended)
7. **Handle CORS** properly
8. **Version Your API** (/api/v1/, /api/v2/)

## Common Issues & Solutions

### CORS Errors
- Add proper CORS headers in PHP
- Use proxy in React (package.json)

```json
{
  "proxy": "http://localhost:8000"
}
```

### JSON Parsing Errors
- Ensure PHP returns valid JSON
- Set correct Content-Type header

### Authentication
- Use JWT tokens
- Store tokens securely
- Implement refresh tokens
