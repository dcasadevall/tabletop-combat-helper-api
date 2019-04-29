<?php

namespace Campaigns;

class JSONCampaignDispatcher implements CampaignDispatcher {
    /**
     * @var CampaignRequestHandler
     */
    private $requestHandler;

    public function __construct(CampaignRequestHandler $requestHandler) {
        $this->requestHandler = $requestHandler;
    }

    /**
     * @return false|string JSON representation of the campaign list.
     */
    public function ListCampaigns() {
        $jsonCampaigns = [];
        $campaignList = $this->requestHandler->ListCampaigns();
        foreach ($campaignList as $campaign) {
            $jsonCampaigns[] = JsonCampaign::ToJsonObject($campaign);
        }

        return json_encode($jsonCampaigns);
    }

    /**
     * @param String $campaignJson A json string representing the campaign to save.
     * @return false|string Json result.
     */
    public function SaveCampaign(String $campaignJson) {
        $campaign = new JsonCampaign($campaignJson);
        $success = $this->requestHandler->SaveCampaign($campaign);
        return json_encode(['success' => $success]);
    }

    /**
     * @param String $campaignId
     * @return false|string Json result.
     */
    public function RemoveCampaign(String $campaignId) {
        $success = $this->requestHandler->RemoveCampaign($campaignId);
        return json_encode(['success' => $success]);
    }
}