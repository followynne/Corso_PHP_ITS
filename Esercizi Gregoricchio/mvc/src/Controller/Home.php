<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Container\ContainerInterface;

class Home implements ControllerInterface
{
    public function execute(ContainerInterface $container): void
    {
        $plates = $container->get(Engine::class);
        echo $plates->render('home');
    }
}
