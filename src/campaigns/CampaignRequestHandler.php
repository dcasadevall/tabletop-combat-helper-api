<?php

namespace Campaigns;

interface CampaignRequestHandler {
    /**
     * @return Campaign[] A list of campaigns
     */
    public function listCampaigns();

    /**
     * Saves the campaign to the persistence layer.
     * Creates a new one if the given campaign id is empty.
     *
     * @param Campaign $campaign
     * @return String Id of the saved campaign. Null if unsuccessful.
     */
    public function saveCampaign(Campaign $campaign);

    /**
     * Removes the campaign with the given campaign id from the persistence layer.
     *
     * @param String $campaignId
     * @return bool True if successfully removed. False otherwise.
     */
    public function removeCampaign(String $campaignId);
}
