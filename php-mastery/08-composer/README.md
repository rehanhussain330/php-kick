# Composer Package Management

## Installation

```bash
# Download and install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

## Basic Commands

```bash
# Initialize a new project
composer init

# Install a package
composer require vendor/package

# Install all dependencies from composer.json
composer install

# Update packages
composer update

# Remove a package
composer remove vendor/package

# Check for outdated packages
composer outdated

# Run scripts defined in composer.json
composer run-script script-name
```

## Example: composer.json

```json
{
    "name": "myapp/project",
    "description": "My PHP Application",
    "type": "project",
    "require": {
        "php": "^8.0",
        "monolog/monolog": "^2.0",
        "guzzlehttp/guzzle": "^7.0"
    },
    "autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    },
    "scripts": {
        "start": "php -S localhost:8000"
    }
}
```

## Popular Packages

### 1. Monolog (Logging)
```bash
composer require monolog/monolog
```

```php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$log = new Logger('app');
$log->pushHandler(new StreamHandler('app.log', Logger::WARNING));
$log->warning('Something happened');
```

### 2. Guzzle (HTTP Client)
```bash
composer require guzzlehttp/guzzle
```

```php
use GuzzleHttp\Client;

$client = new Client();
$response = $client->get('https://api.example.com/data');
$data = json_decode($response->getBody(), true);
```

### 3. Dotenv (Environment Variables)
```bash
composer require vlucas/phpdotenv
```

```php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dbHost = $_ENV['DB_HOST'];
```

### 4. PHPUnit (Testing)
```bash
composer require --dev phpunit/phpunit
```

### 5. PHPMailer (Email)
```bash
composer require phpmailer/phpmailer
```

## Autoloading

```php
// Include Composer autoloader
require 'vendor/autoload.php';

// Now you can use any installed package
```

## Best Practices

1. **Commit composer.lock** - Ensures consistent versions across environments
2. **Use version constraints** - Prevents breaking changes
3. **Regular updates** - Keep dependencies secure
4. **Check security** - Use `composer audit`
5. **Optimize autoloader** - Run `composer dump-autoload --optimize` for production

## Common Version Constraints

- `^1.2.3` - Allows 1.2.3 to <2.0.0
- `~1.2.3` - Allows 1.2.3 to <1.3.0
- `>=1.0` - Any version 1.0 or higher
- `*` - Any version
