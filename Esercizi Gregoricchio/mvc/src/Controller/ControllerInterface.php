<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use Psr\Container\ContainerInterface;

interface ControllerInterface
{
    public function execute(ContainerInterface $container): void;
}
