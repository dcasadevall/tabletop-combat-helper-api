<?php

interface CampaignDispatcher {
    /**
     * @return false|string JSON representation of the campaign list.
     */
    public function listCampaigns();

    /**
     * @param String $campaignJson A json string representing the campaign to save.
     * @return false|string Json result.
     */
    public function saveCampaign(String $campaignJson);

    /**
     * @param String $campaignId
     * @return false|string Json result.
     */
    public function removeCampaign(String $campaignId);
}