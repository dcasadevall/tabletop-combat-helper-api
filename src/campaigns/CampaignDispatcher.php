<?php

interface CampaignDispatcher {
    /**
     * @return false|string JSON representation of the campaign list.
     */
    public function ListCampaigns();

    /**
     * @param String $campaignJson A json string representing the campaign to save.
     * @return false|string Json result.
     */
    public function SaveCampaign(String $campaignJson);

    /**
     * @param String $campaignId
     * @return false|string Json result.
     */
    public function RemoveCampaign(String $campaignId);
}