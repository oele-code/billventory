<?php

use Rector\Laravel\Set\LaravelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set('paths', [
        __DIR__ . '/app',
        __DIR__ . '/routes',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/resources',
    ]);
    $parameters->set('sets', [
        LaravelSetList::LARAVEL_52,
        LaravelSetList::LARAVEL_53,
    ]);
};
