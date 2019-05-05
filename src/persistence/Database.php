<?php

namespace Persistence;

/**
 * Interface Database
 *
 * A layer on top of our database framework used to abstract the current implementation.
 * Allows for read / write operations.
 */
interface Database {
    /**
     * @param String $table The table to insert values into.
     * @param array $data An array of key-value elements defining the column / values to be inserted.
     * @return String The last inserted id.
     */
    public function insert(String $table, array $data);

    /**
     * @param String $table The table to update values from.
     * @param array $data An array of key-value elements defining the column / values to be inserted.
     * @param array $where An array of conditions that must be met for a row to be updated.
     * @return bool True if successfully updated. False otherwise.
     */
    public function update(String $table, array $data, array $where);

    /**
     * @param String $table The table to select values from.
     * @param array $columns An array of columns to get values from.
     * @param array $where An array of conditions that must be met for a row to be selected.
     * @return array An array of columns that matched the $where condition.
     */
    public function select(String $table, array $columns, array $where);

    /**
     * @param String $table The table to select values from.
     * @param array $where An array of conditions that must be met for a row to be deleted.
     * @return bool True if successfully deleted. False otherwise.
     */
    public function delete(String $table, array $where);
}
