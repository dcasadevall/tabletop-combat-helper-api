<?php

namespace Campaigns;

use Logging\Logger;
use Logging\LogLevel;
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
    /**
     * @var Logger
     */
    private $logger;

    public function __construct(Database $database, Logger $logger) {
        $this->database = $database;
        $this->logger = $logger;
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
     *
     * @param Campaign $campaign
     * @return bool True if successful. False otherwise.
     */
    public function saveCampaign(Campaign $campaign) {
        $jsonCampaign = JsonCampaign::toJsonObject($campaign);

        if (empty($campaign->getCampaignId())) {
            $this->logger->log(new LogLevel(LogLevel::ERROR), "Saving campaign with empty campaignId.");
            return false;
        }

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

    /**
     * Creates a new campaign with the given data.
     *
     * @param String $name campaign name.
     * @return String Id of the newly created campaign. Null if unsuccessful.
     */
    public function createCampaign(String $name) {
        return $this->database->insert(self::TABLE_NAME, ["name" => $name]);
    }
}