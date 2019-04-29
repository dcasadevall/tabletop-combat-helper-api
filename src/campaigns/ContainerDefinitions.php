<?php

// TODO: Autoloading should work here..
use function DI\autowire;

// TODO: Really need to get autoloading to work... these 2 lines are required because of order
// of operations and no autoloading
require_once dirname(__FILE__) . '/../logging/Logger.php';
require_once dirname(__FILE__) . '/../logging/PHPErrorLogger.php';

require_once dirname(__FILE__) . '/CampaignDispatcher.php';
require_once dirname(__FILE__) . '/JSONCampaignDispatcher.php';
require_once dirname(__FILE__) . '/CampaignRequestHandler.php';
require_once dirname(__FILE__) . '/MysqlCampaignRequestHandler.php';

return [
    'CampaignRequestHandler' => autowire('MysqlCampaignRequestHandler'),
    'CampaignDispatcher' => autowire('JSONCampaignDispatcher'),
];

