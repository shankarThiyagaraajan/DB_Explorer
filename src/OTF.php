<?php
namespace shankarbala33\db_explorer;

use Config;
use DB;
class OTF {
    /**
     * The name of the database we're connecting to on the fly.
     *
     * @var string $database
     */
    protected $database;
    /**
     * The on the fly database connection.
     *
     * @var \Illuminate\Database\Connection
     */
    protected $connection;
    /**
     * Create a new on the fly database connection.
     *
     * @param  array $options
     * @return void
     */
    public function setDatabase($options = null)
    {
        // Set the database
        $database = $options['database'];
        $this->database = $database;
        // Figure out the driver and get the default configuration for the driver
        $driver  = isset($options['driver']) ? $options['driver'] : Config::get("database.default");
        $default = Config::get("database.connections.$driver");
        // Loop through our default array and update options if we have non-defaults
        foreach($default as $item => $value)
        {
            $default[$item] = isset($options[$item]) ? $options[$item] : $default[$item];
        }
        // Set the temporary configuration
        Config::set("database.connections.$database", $default);
        // Create the connection
        $this->connection = DB::connection($database);

        return $this;
    }
    /**
     * Get the on the fly connection.
     *
     * @return \Illuminate\Database\Connection
     */
    public function getConnection()
    {
        return $this->connection;
    }
    /**
     * Get a table from the on the fly connection.
     *
     * @var    string $table
     * @return \Illuminate\Database\Query\Builder
     */
    public function getTable($table = null)
    {
        return $this->getConnection()->table($table);
    }
}