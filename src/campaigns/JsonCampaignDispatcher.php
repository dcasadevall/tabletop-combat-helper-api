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
            $campaignList = $this->requestHandler->listCampaigns();
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), 'Error listing campaigns: $e');
            return JsonResult::error()->jsonString();
        }

        $jsonCampaigns = [];
        foreach ($campaignList as $campaign) {
            $jsonCampaigns[] = JsonCampaign::toJsonObject($campaign);
        }

        return JsonResult::success($jsonCampaigns)->jsonString();
    }

    /**
     * @param $campaignKeyValuePair Object A key-value pair object representing the campaign to save.
     * @return String Json representation of the operation result.
     */
    public function saveCampaign($campaignKeyValuePair) {
        try {
            print_r($campaignKeyValuePair);
            $campaign = new JsonCampaign($campaignKeyValuePair);
            print_r($campaign);
            $campaignId = $this->requestHandler->saveCampaign($campaign);
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Error saving campaign. JSON: $campaignKeyValuePair. Exception: $e");
            return JsonResult::error()->jsonString();
        }

        $success = $campaignId != null;
        return (new JsonResult($success, ["id", $campaignId]))->jsonString();
    }

    /**
     * @param String $campaignId
     * @return false|string Json result.
     */
    public function removeCampaign(String $campaignId) {
        try {
            $success = $this->requestHandler->removeCampaign($campaignId);
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Error removing campaign. CampaignId: $campaignId. Exception: $e");
            return JsonResult::error()->jsonString();
        }

        return (new JsonResult($success))->jsonString();
    }
}