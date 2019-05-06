<?php

namespace Campaigns;

interface CampaignDispatcher {
    /**
     * @return String Serialized representation of the campaign list.
     */
    public function listCampaigns();

    /**
     * @param $campaignKeyValues array A set of key-value pairs representing the campaign to save.
     * @return String Serialized representation of the operation result.
     */
    public function saveCampaign($campaignKeyValues);

    /**
     * @param $campaignKeyValues array A set of key-value pairs representing the campaign to create.
     * @return String Serialized representation of the operation result. Includes the campaign id if successfully
     * created.
     */
    public function createCampaign($campaignKeyValues);

    /**
     * @param String $campaignId
     * @return String Serialized representation of the operation result.
     */
    public function removeCampaign(String $campaignId);
}