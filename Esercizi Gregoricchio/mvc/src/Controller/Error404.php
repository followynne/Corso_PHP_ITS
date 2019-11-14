<?php
declare(strict_types=1);

namespace SimpleMVC\Controller;

use League\Plates\Engine;
use Psr\Container\ContainerInterface;

class Error404 implements ControllerInterface
{
    public function execute(ContainerInterface $container): void
    {
        $plates = $container->get(Engine::class);
        http_response_code(404);
        echo $plates->render('404');
    }
}
