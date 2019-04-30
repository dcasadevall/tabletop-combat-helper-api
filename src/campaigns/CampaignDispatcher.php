<?php

namespace Campaigns;

interface CampaignDispatcher {
    /**
     * @return String Serialized representation of the campaign list.
     */
    public function listCampaigns();

    /**
     * @param array $campaignKeyValues A set of key-value pairs representing the campaign to save.
     * @return String Serialized representation of the operation result.
     */
    public function saveCampaign(array $campaignKeyValues);

    /**
     * @param String $campaignId
     * @return String Serialized representation of the operation result.
     */
    public function removeCampaign(String $campaignId);
}