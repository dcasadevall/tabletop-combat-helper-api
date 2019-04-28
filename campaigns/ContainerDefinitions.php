<?php

namespace Campaigns;

return [
    CampaignRequestHandler::class => DI\get(MysqlCampaignRequestHandler::class),
];

