<?php

namespace Dartmoon\Console;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class AbstractCommand extends ContainerAwareCommand
{
    /**
     * Name and description
     */
    protected $name = 'command:example';

    /**
     * Command description
     */
    protected $description = 'Command description';

    /**
     * Configure the command
     */
    protected function configure()
    {
        $this->setName($this->name)
            ->setDescription($this->description);
    }
}
