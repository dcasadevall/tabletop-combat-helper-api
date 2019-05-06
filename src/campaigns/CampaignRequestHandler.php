<?php

namespace Campaigns;

interface CampaignRequestHandler {
    /**
     * @return Campaign[] A list of campaigns
     */
    public function listCampaigns();

    /**
     * Saves the campaign to the persistence layer.
     *
     * @param Campaign $campaign
     * @return bool True if successful. False otherwise.
     */
    public function saveCampaign(Campaign $campaign);


    /**
     * Creates a new campaign with the given data.
     *
     * @param String $name campaign name.
     * @return String Id of the newly created campaign. Null if unsuccessful.
     */
    public function createCampaign(String $name);

    /**
     * Removes the campaign with the given campaign id from the persistence layer.
     *
     * @param String $campaignId
     * @return bool True if successfully removed. False otherwise.
     */
    public function removeCampaign(String $campaignId);
}
