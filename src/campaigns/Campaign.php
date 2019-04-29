<?php

interface Campaign {
    /**
     * @return String A unique identifier representing this campaign.
     */
    public function getCampaignId();

    /**
     * @return String Name of the campaign.
     */
    public function getName();
}