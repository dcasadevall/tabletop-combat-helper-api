<?php

namespace Campaigns;

use Persistence\Database;

/**
 *
 * Class DatabaseCampaignRequestHandler
 *
 * CampaignRequestHandler implementation that uses the persistence layer.
 */
class DatabaseCampaignRequestHandler implements CampaignRequestHandler {
    /**
     * String Name of the table campaigns live in.
     */
    const TABLE_NAME = 'campaigns';

    /**
     * @var Database
     */
    private $database;

    public function __construct(Database $database) {
        $this->database = $database;
    }

    /**
     * @return Campaign[] A list of campaigns
     */
    public function listCampaigns() {
        $campaigns = [];
        $columns = JsonCampaign::getColumns();
        $columnJsonObjects = $this->database->select(self::TABLE_NAME, $columns, []);
        foreach ($columnJsonObjects as $columnJsonObject) {
            $campaigns[] = new JsonCampaign($columnJsonObject);
        }

        return $campaigns;
    }

    /**
     * Saves the campaign to the persistence layer.
     * Creates a new one if the given campaign id is empty.
     *
     * @param Campaign $campaign
     * @return bool True if successfully saved. False otherwise.
     */
    public function saveCampaign(Campaign $campaign) {
        $jsonCampaign = JsonCampaign::toJsonObject($campaign);
        return $this->database->update(
            self::TABLE_NAME,
            $jsonCampaign,
            JsonCampaign::getWhereIdConstraint($campaign->getCampaignId())
        );
    }

    /**
     * Removes the campaign with the given campaign id from the persistence layer.
     *
     * @param String $campaignId
     * @return bool True if successfully removed. False otherwise.
     */
    public function removeCampaign(String $campaignId) {
        return $this->database->delete(self::TABLE_NAME, JsonCampaign::getWhereIdConstraint($campaignId));
    }
}