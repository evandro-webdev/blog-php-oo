<?php

use DI\ContainerBuilder;
use function DI\autowire;

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(true);
$containerBuilder->addDefinitions([]);

return $containerBuilder->build();
