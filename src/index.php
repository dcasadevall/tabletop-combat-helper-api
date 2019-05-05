<?php

require 'vendor/autoload.php';

// Setup DI.
$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions('logging/ContainerDefinitions.php');
$containerBuilder->addDefinitions('persistence/ContainerDefinitions.php');
$containerBuilder->addDefinitions('campaigns/ContainerDefinitions.php');
$container = $containerBuilder->build();

$campaignDispatcher = $container->get('\Campaigns\CampaignDispatcher');

// OPTIONS need to be successful but we don't want to trigger any logic.
Flight::route('OPTIONS *', function() use ($campaignDispatcher) {
});

// Setup Routes
Flight::route('/campaigns/list', function() use ($campaignDispatcher) {
    echo $campaignDispatcher->listCampaigns();
});

Flight::route('/campaigns/save', function() use ($campaignDispatcher) {
    $request = Flight::request();
    echo $campaignDispatcher->saveCampaign($request->data);
});

Flight::route('/campaigns/remove/@id', function($campaignId) use ($campaignDispatcher) {
    echo $campaignDispatcher->removeCampaign($campaignId);
});

Flight::start();

