<?php

require 'vendor/autoload.php';

// Setup DI.
$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions('logging/ContainerDefinitions.php');
$containerBuilder->addDefinitions('persistence/ContainerDefinitions.php');
$containerBuilder->addDefinitions('campaigns/ContainerDefinitions.php');
$container = $containerBuilder->build();

$campaignDispatcher = $container->get('\Campaigns\CampaignDispatcher');

// Setup Routes
Flight::route('/campaigns/list', function() use ($campaignDispatcher) {
    echo $campaignDispatcher->ListCampaigns();
});

Flight::route('/campaigns/save', function() use ($campaignDispatcher) {
    $request = Flight::request();
    echo $campaignDispatcher->SaveCampaign($request->data);
});

Flight::route('/campaigns/remove/@id', function($campaignId) use ($campaignDispatcher) {
    echo $campaignDispatcher->RemoveCampaign($campaignId);
});

Flight::start();

