<?php

class JsonCampaign implements Campaign {
    /**
     * @var String
     */
    private $campaignId;

    /**
     * @var String
     */
    private $name;

    /**
     * @return String A unique identifier representing this campaign.
     */
    function GetCampaignId() {
        return $this->GetCampaignId();
    }

    /**
     * @return String Name of the campaign.
     */
    function GetName() {
        return $this->GetName();
    }

    public function __construct($campaignJson) {
        $this->name = $campaignJson['name'];
        $this->campaignId = $campaignJson['campaignId'];
    }

    public static function ToJsonObject(Campaign $campaign) {
        return ['name' => $campaign->GetName(), 'campaignId' => $campaign->GetCampaignId()];
    }
}