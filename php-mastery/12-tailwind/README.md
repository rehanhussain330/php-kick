# Tailwind CSS with PHP

## Setup Guide

### Method 1: Using Node.js & PostCSS (Recommended)

#### 1. Initialize Project

```bash
mkdir my-php-app
cd my-php-app
npm init -y
```

#### 2. Install Tailwind CSS

```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

#### 3. Configure Tailwind (tailwind.config.js)

```javascript
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./src/**/*.php",
    "./templates/**/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

#### 4. Create CSS Input File (src/input.css)

```css
@tailwind base;
@tailwind components;
@tailwind utilities;

/* Custom styles */
@layer components {
    .btn-primary {
        @apply bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded;
    }
}
```

#### 5. Add Build Script (package.json)

```json
{
  "scripts": {
    "build:css": "tailwindcss -i ./src/input.css -o ./public/css/style.css",
    "watch:css": "tailwindcss -i ./src/input.css -o ./public/css/style.css --watch"
  }
}
```

#### 6. Build CSS

```bash
# One-time build
npm run build:css

# Watch for changes
npm run watch:css
```

### Method 2: CDN (Development Only)

```html
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <h1 class="text-3xl font-bold text-blue-600">Hello World</h1>
</body>
</html>
```

## PHP Integration Examples

### 1. Basic HTML Template with Tailwind

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP + Tailwind</title>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center text-blue-600 mb-8">
            Welcome to PHP + Tailwind
        </h1>
    </div>
</body>
</html>
```

### 2. Dynamic Content with Tailwind

```php
<?php
$users = [
    ['name' => 'John Doe', 'email' => 'john@example.com', 'role' => 'Admin'],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'role' => 'User'],
    ['name' => 'Bob Wilson', 'email' => 'bob@example.com', 'role' => 'User']
];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">User List</h1>
        
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($users as $user): ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <?= htmlspecialchars($user['name']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <?= htmlspecialchars($user['email']) ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                <?= $user['role'] === 'Admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' ?>">
                                <?= htmlspecialchars($user['role']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
```

### 3. Form with Validation Styling

```php
<?php
$errors = [];
$oldInput = $_POST ?? [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }
}
?>

<form method="POST" class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Contact Form</h2>
    
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
            Name
        </label>
        <input 
            type="text" 
            id="name" 
            name="name"
            value="<?= htmlspecialchars($oldInput['name'] ?? '') ?>"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 
                   <?= isset($errors['name']) ? 'border-red-500 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200' ?>"
        >
        <?php if (isset($errors['name'])): ?>
            <p class="text-red-500 text-xs italic mt-1"><?= $errors['name'] ?></p>
        <?php endif; ?>
    </div>
    
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
            Email
        </label>
        <input 
            type="email" 
            id="email" 
            name="email"
            value="<?= htmlspecialchars($oldInput['email'] ?? '') ?>"
            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 
                   <?= isset($errors['email']) ? 'border-red-500 focus:ring-red-200' : 'border-gray-300 focus:ring-blue-200' ?>"
        >
        <?php if (isset($errors['email'])): ?>
            <p class="text-red-500 text-xs italic mt-1"><?= $errors['email'] ?></p>
        <?php endif; ?>
    </div>
    
    <button 
        type="submit"
        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg 
               focus:outline-none focus:shadow-outline transition duration-200"
    >
        Submit
    </button>
</form>
```

### 4. Card Component

```php
<?php
$products = [
    ['name' => 'Product 1', 'price' => 99.99, 'image' => 'product1.jpg'],
    ['name' => 'Product 2', 'price' => 149.99, 'image' => 'product2.jpg'],
    ['name' => 'Product 3', 'price' => 199.99, 'image' => 'product3.jpg']
];
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-8">
    <?php foreach ($products as $product): ?>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <img 
            src="/images/<?= $product['image'] ?>" 
            alt="<?= $product['name'] ?>"
            class="w-full h-48 object-cover"
        >
        <div class="p-4">
            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                <?= htmlspecialchars($product['name']) ?>
            </h3>
            <p class="text-2xl font-bold text-blue-600 mb-4">
                $<?= number_format($product['price'], 2) ?>
            </p>
            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded transition-colors duration-200">
                Add to Cart
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>
```

### 5. Navigation Bar

```php
<nav class="bg-white shadow-lg">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div>
                    <a href="#" class="flex items-center py-4 px-2">
                        <span class="font-bold text-gray-500 text-lg">Brand</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-4 px-2 text-blue-500 border-b-4 border-blue-500 font-semibold">Home</a>
                    <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">About</a>
                    <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Services</a>
                    <a href="#" class="py-4 px-2 text-gray-500 font-semibold hover:text-blue-500 transition duration-300">Contact</a>
                </div>
            </div>
            <div class="flex items-center space-x-3">
                <a href="#" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 transition duration-300">Login</a>
            </div>
        </div>
    </div>
</nav>
```

### 6. Responsive Layout

```php
<div class="min-h-screen bg-gray-100">
    <!-- Mobile Menu -->
    <div class="md:hidden p-4 bg-white shadow">
        <button class="text-gray-500 focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
    
    <div class="flex">
        <!-- Sidebar (Desktop) -->
        <aside class="hidden md:block w-64 bg-white shadow-md min-h-screen">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li><a href="#" class="block py-2 px-4 text-blue-500 bg-blue-50 rounded">Dashboard</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 rounded">Profile</a></li>
                    <li><a href="#" class="block py-2 px-4 text-gray-700 hover:bg-gray-50 rounded">Settings</a></li>
                </ul>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <main class="flex-1 p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Users</h3>
                    <p class="text-3xl font-bold text-blue-600">1,234</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Revenue</h3>
                    <p class="text-3xl font-bold text-green-600">$45,678</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Orders</h3>
                    <p class="text-3xl font-bold text-purple-600">567</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Growth</h3>
                    <p class="text-3xl font-bold text-orange-600">+23%</p>
                </div>
            </div>
        </main>
    </div>
</div>
```

## Useful Tailwind Commands

```bash
# Development watch mode
npm run watch:css

# Production build (optimized)
NODE_ENV=production npm run build:css

# Purge unused CSS
npx tailwindcss -i ./src/input.css -o ./public/css/style.css --purge
```

## Best Practices

1. **Use Component Classes** for repeated patterns
2. **Extract Repeated Styles** into @layer components
3. **Use Responsive Prefixes** (sm:, md:, lg:, xl:)
4. **Leverage Hover/Focus States** for interactivity
5. **Keep PHP Logic Separate** from presentation when possible
6. **Use Partials/Templates** for reusable components
7. **Optimize for Production** by purging unused CSS

## Common Tailwind Classes

- **Layout**: container, flex, grid, block, inline-block
- **Spacing**: m-4, p-4, mx-auto, space-x-4
- **Typography**: text-xl, font-bold, text-center, uppercase
- **Colors**: bg-blue-500, text-white, border-gray-300
- **Borders**: rounded, rounded-lg, border, border-t
- **Effects**: shadow, shadow-lg, opacity-50, hover:scale-105
- **Responsive**: sm:, md:, lg:, xl:, 2xl:
