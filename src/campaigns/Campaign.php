<?php

interface Campaign {
    /**
     * @return String A unique identifier representing this campaign.
     */
    public function GetCampaignId();

    /**
     * @return String Name of the campaign.
     */
    public function GetName();
}