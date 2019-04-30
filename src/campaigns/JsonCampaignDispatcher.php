<?php

namespace Campaigns;

use Exception;
use Logging\Logger;
use Logging\LogLevel;
use Serialization\JsonResult;

class JsonCampaignDispatcher implements CampaignDispatcher {
    /**
     * @var CampaignRequestHandler
     */
    private $requestHandler;

    /**
     * @var Logger
     */
    private $logger;

    public function __construct(CampaignRequestHandler $requestHandler, Logger $logger) {
        $this->requestHandler = $requestHandler;
        $this->logger = $logger;
    }

    /**
     * @return String JSON representation of the campaign list.
     */
    public function listCampaigns() {
        try {
            $campaignList = $this->requestHandler->ListCampaigns();
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), 'Error listing campaigns: $e');
            return JsonResult::error()->jsonString();
        }

        $jsonCampaigns = [];
        foreach ($campaignList as $campaign) {
            $jsonCampaigns[] = JsonCampaign::toJsonObject($campaign);
        }

        return JsonResult::success($campaignList)->jsonString();
    }

    /**
     * @param array $campaignKeyValuePair A json string representing the campaign to save.
     * @return String Json representation of the operation result.
     */
    public function saveCampaign(array $campaignKeyValuePair) {
        try {
            $campaign = new JsonCampaign($campaignKeyValuePair);
            $success = $this->requestHandler->SaveCampaign($campaign);
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Error saving campaign. JSON: $campaignKeyValuePair. Exception: $e");
            return JsonResult::error()->jsonString();
        }

        return (new JsonResult($success))->jsonString();
    }

    /**
     * @param String $campaignId
     * @return false|string Json result.
     */
    public function removeCampaign(String $campaignId) {
        try {
            $success = $this->requestHandler->RemoveCampaign($campaignId);
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Error removing campaign. CampaignId: $campaignId. Exception: $e");
            return JsonResult::error()->jsonString();
        }

        return (new JsonResult($success))->jsonString();
    }
}