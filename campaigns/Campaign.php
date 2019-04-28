<?php

namespace Campaigns;

interface Campaign {
    /**
     * @return String A unique identifier representing this campaign.
     */
    function GetCampaignId();

    /**
     * @return String Name of the campaign.
     */
    function GetName();
}