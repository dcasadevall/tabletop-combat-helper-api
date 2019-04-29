<?php

require_once dirname(__FILE__) . '/CampaignDispatcher.php';
require_once dirname(__FILE__) . '/JsonCampaign.php';

class JSONCampaignDispatcher implements CampaignDispatcher {
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
     * @return false|string JSON representation of the campaign list.
     */
    public function listCampaigns() {
        try {
            $campaignList = $this->requestHandler->ListCampaigns();
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), 'Error listing campaigns: $e');
            return json_encode(['success' => 'false']);
        }

        $jsonCampaigns = [];
        foreach ($campaignList as $campaign) {
            $jsonCampaigns[] = JsonCampaign::ToJsonObject($campaign);
        }

        return json_encode($jsonCampaigns);
    }

    /**
     * @param String $campaignJson A json string representing the campaign to save.
     * @return false|string Json result.
     */
    public function saveCampaign(String $campaignJson) {
        try {
            $campaign = new JsonCampaign($campaignJson);
            $success = $this->requestHandler->SaveCampaign($campaign);
        } catch (Exception $e) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Error saving campaign. JSON: $campaignJson. Exception: $e");
            return json_encode(['success' => 'false']);
        }

        return json_encode(['success' => $success ? 'true' : 'false']);
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
            return json_encode(['success' => 'false']);
        }

        return json_encode(['success' => $success ? 'true' : 'false']);
    }
}