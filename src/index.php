<?php

require 'vendor/autoload.php';

// Setup DI. We do not interface dispatchers as we don't have a different implementation at the moment,
$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions('campaigns/ContainerDefinitions.php');
$container = $containerBuilder->build();

$JSONCampaignDispatcher = $container->get('JSONCampaignDispatcher');

// Setup Routes
Flight::route('/', function(){
    echo 'hello world!';
});

Flight::start();

