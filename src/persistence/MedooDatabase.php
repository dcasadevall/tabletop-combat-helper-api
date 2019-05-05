<?php

namespace Persistence;

// If you installed via composer, just use this code to require autoloader on the top of your projects.
require 'vendor/autoload.php';

// Using Medoo namespace
use Medoo\Medoo;

class MedooDatabase implements Database {
    /**
     * @var Medoo
     */
    private $medoo;

    public function __construct() {
        $this->medoo = new Medoo(include dirname(__FILE__) . '/MedooConfig.php');
    }

    /**
     * @param String $table The table to insert values into.
     * @param array $data An array of key-value elements defining the column / values to be inserted.
     * @return String The last inserted id.
     */
    public function insert(String $table, array $data) {
        $this->medoo->insert($table, $data);
        return $this->medoo->id();
    }

    /**
     * @param String $table The table to update values from.
     * @param array $data An array of key-value elements defining the column / values to be inserted.
     * @param array $where An array of conditions that must be met for a row to be updated.
     * @return bool True if successfully updated. False otherwise.
     */
    public function update(String $table, array $data, array $where) {
        $result = $this->medoo->update($table, $data, $where);
        return $result->errorCode() == null;
    }

    /**
     * @param String $table The table to select values from.
     * @param array $columns An array of columns to get values from.
     * @param array $where An array of conditions that must be met for a row to be selected.
     * @return array An array of columns that matched the $where condition.
     */
    public function select(String $table, array $columns, array $where) {
        return $this->medoo->select($table, $columns, $where);
    }

    /**
     * @param String $table The table to select values from.
     * @param array $where An array of conditions that must be met for a row to be deleted.
     * @return bool True if successfully deleted. False otherwise.
     */
    public function delete(String $table, array $where) {
        return $this->medoo->delete($table, $where)->columnCount() > 0;
    }
}
