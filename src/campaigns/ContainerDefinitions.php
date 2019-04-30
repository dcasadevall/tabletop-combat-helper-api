<?php

use function DI\autowire;

require 'vendor/autoload.php';

return [
    'Campaigns\CampaignRequestHandler' => autowire('\Campaigns\DatabaseCampaignRequestHandler'),
    '\Campaigns\CampaignRequestHandler' => autowire('\Campaigns\DatabaseCampaignRequestHandler'),
    '\Campaigns\CampaignDispatcher' => autowire('\Campaigns\JsonCampaignDispatcher'),
    'Campaigns\CampaignDispatcher' => autowire('\Campaigns\JsonCampaignDispatcher'),
];

