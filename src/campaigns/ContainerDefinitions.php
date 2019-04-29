<?php

// TODO: Autoloading should work here..
use function DI\autowire;

include dirname(__FILE__) . '/CampaignDispatcher.php';
include dirname(__FILE__) . '/JSONCampaignDispatcher.php';
include dirname(__FILE__) . '/CampaignRequestHandler.php';
include dirname(__FILE__) . '/MysqlCampaignRequestHandler.php';

return [
    'CampaignRequestHandler' => autowire('MysqlCampaignRequestHandler'),
    'CampaignDispatcher' => autowire('JSONCampaignDispatcher'),
];

