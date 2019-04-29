<?php

require_once dirname(__FILE__) . '/Campaign.php';

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
    function getCampaignId() {
        return $this->GetCampaignId();
    }

    /**
     * @return String Name of the campaign.
     */
    function getName() {
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