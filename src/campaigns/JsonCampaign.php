<?php

namespace Campaigns;

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
     * @param Campaign $campaign
     * @return array Returns an array representing the key-value pair that will be used for json serialization.
     */
    public static function toJsonObject(Campaign $campaign) {
        return ['name' => $campaign->GetName(), 'campaignId' => $campaign->GetCampaignId()];
    }

    /**
     * @return array Array of columns in the Campaign table.
     */
    public static function getColumns() {
        return ['id', 'name'];
    }

    /**
     * @param String $campaignId ID to select
     * @return array The array of constraints (one element) needed to select a row based on the given id.
     */
    public static function getWhereIdConstraint(String $campaignId) {
        if (empty($campaignId)) {
            return [];
        }

        return ['id' => $campaignId];
    }

    /**
     * @return String A unique identifier representing this campaign.
     */
    function getCampaignId() {
        return $this->campaignId;
    }

    /**
     * @return String Name of the campaign.
     */
    function getName() {
        return $this->name;
    }

    public function __construct($campaignJsonObject) {
        $this->name = $campaignJsonObject['name'];
        $this->campaignId = $campaignJsonObject['id'];
    }
}