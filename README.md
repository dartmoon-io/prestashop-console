# Prestashop Console
Simple boilerplate to streamline the creation of custom PrestaShop console commands.

## Installation

```bash
composer require dartmoon/prestashop-console
```

## Usage

### Create command file
You can create a command everywhere in the module folder, but for the sake of explanation let's assume we have a folder name `src/Commands`.

Let's create out first command, creating the file `src/Commands/HelloWorldCommand.php`

```php
<?php

namespace Dartmoon\MyModule\Commands;

use Dartmoon\Console\AbstractCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloWorldCommand extends AbstractCommand
{
    /**
     * Name and description
     */
    protected $name = 'mymodule:hello-world';

    /**
     * Command description
     */
    protected $description = 'Simple command that says Hello Wold!';

    /**
     * Execute command
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        echo "Hello World!";
    }
}
```

### Register the command inside PrestaShop
To register the command we need to create a file called `services.yml` inside a folder named `config` inside the root of our module.

File `config/services.yml`
```yml
services:
    _defaults:
        autowire: true
        autoconfigure: true

    console.command.hello-world-command:
        class: Dartmoon\MyModule\Commands\HelloWorldCommand
        public: true
        tags:
            - { name: "console.command" }

```

### Reset the module
Once you have registered the command inside the `services.yml` file, you need to reset your module so that PrestaShop can install the command.


### Executing the command
From the root of your PrestaShop installation execute:

```bash
php bin/console mymodule:hello-world
```

## License

This project is licensed under the MIT License - see the LICENSE.md file for details