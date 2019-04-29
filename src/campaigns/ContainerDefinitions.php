<?php

namespace Campaigns;

use function DI\get;

return [
    CampaignRequestHandler::class => get(MysqlCampaignRequestHandler::class),
    CampaignDispatcher::class => get(JSONCampaignDispatcher::class),
];

