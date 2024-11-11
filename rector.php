<?php

use Rector\Laravel\Set\LaravelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();

    // Define las rutas a procesar
    $parameters->set('paths', [
        __DIR__ . '/app',
        __DIR__ . '/routes',
        __DIR__ . '/config',
    ]);

    // Aplica los conjuntos de reglas de Laravel y PHP 7.1
    $parameters->set('sets', [
        LaravelSetList::LARAVEL_54,
        LaravelSetList::LARAVEL_55,
        'PHP_71',
    ]);
};
