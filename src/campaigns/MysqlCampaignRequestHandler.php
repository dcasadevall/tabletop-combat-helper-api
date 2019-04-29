<?php

class MysqlCampaignRequestHandler implements CampaignRequestHandler  {
    /**
     * @return Campaign[] A list of campaigns
     */
    public function listCampaigns() {
        // TODO: Implement ListCampaigns() method.
    }

    /**
     * Saves the campaign to the persistence layer.
     * Creates a new one if the given campaign id is empty.
     *
     * @param Campaign $campaign
     * @return bool True if successfully saved. False otherwise.
     */
    public function saveCampaign(Campaign $campaign) {
        // TODO: Implement SaveCampaign() method.
    }

    /**
     * Removes the campaign with the given campaign id from the persistence layer.
     *
     * @param String $campaignId
     * @return bool True if successfully removed. False otherwise.
     */
    public function removeCampaign(String $campaignId) {
        // TODO: Implement RemoveCampaign() method.
    }
}