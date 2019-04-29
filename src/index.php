<?php

require 'vendor/autoload.php';

// Setup DI.
$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions('campaigns/ContainerDefinitions.php');
$container = $containerBuilder->build();

$campaignDispatcher = $container->get('CampaignDispatcher');

// Setup Routes
Flight::route('/', function(){
    echo 'hello world!';
});

Flight::start();

