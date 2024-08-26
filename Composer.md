# Composer

- For Windows https://getcomposer.org/download/

- create a new projet: `composer init`
- Create the Hello World Script: your project/`mkdir src`
- HelloWorld.php

```php
<?php

namespace HelloWorld;

class HelloWorld
{
    public function sayHello()
    {
        return "Hello, World!";
    }
}

```
-  Set Up Autoloading in Composer

Open the composer.json file and add the following autoload section:

```php
{
    "name": "your-name/hello-world-composer",
    "description": "A simple Hello World project using Composer",
    "autoload": {
        "psr-4": {
            "HelloWorld\\": "src/"
        }
    },
    "require": {}
}
```

- now run: `composer dump-autoload`

- In your project root, create a index.php file:
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use HelloWorld\HelloWorld;

$helloWorld = new HelloWorld();
echo $helloWorld->sayHello();
```

Run Your Script: `php index.php`


Start a PHP Built-in Server: `php -S localhost:8000`

