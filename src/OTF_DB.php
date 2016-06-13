<?php
namespace shankarbala33\db_explorer;


use Illuminate\Database\Eloquent\Model;
use shankarbala33\db_explorer\Facades\OTF as OTF_Facade;


/**
 * Class OTF_DB
 * @package App\Helper
 */
class OTF_DB extends Model
{

    /**
     * Managing Table
     * @var array
     */
    private static $tables = array();

    /**
     * Managing Table with Columns
     * @var array
     */
    private static $columns = array();

    /**
     * Managing Configurations
     * @var array
     */
    private static $config;

    /**
     * Configured Database Schema
     * @var array
     */
    private $schema = array();


    /**
     * OTF_DB constructor.
     * @param array $config
     */
    public function __construct($config = array())
    {
        self::$config = $config;
    }

    public function scanDatabase($connection)
    {
        $db = OTF_DB::constructDB($connection);
        $tables = OTF_DB::getTables($db);
        return OTF_DB::reConstructTables($tables, $db);
    }


    /**
     * Organize the Database Connection parameter with default parameters
     *
     * @param $config
     * @return array
     */
    public static function constructDB($config)
    {
        $Schema = array(
            'driver' => $config['name'],
            'host' => $config['host'],
            'database' => $config['database'],
            'username' => $config['username'],
            'password' => $config['password'],
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
        );
        return $Schema;
    }

    /**
     * Extract Column in corresponding to the table name
     *
     * @param $tables array of names
     * @param $db array Schema
     * @return array $tables
     */
    public static function reConstructTables($tables, $db)
    {
        foreach ($tables as $table) {
            self::$tables[$table->TABLE_NAME] = self::getColumns($table->TABLE_NAME);
        }
        return self::$tables;
    }


    /**
     * To Retrieve all tables on the Database
     *
     * @param $config array Database config schema
     * @return mixed Collection of tables
     */
    public static function getTables($config)
    {
        self::$config = $config;
        $schema = OTF_Facade::setDatabase(self::$config)
            ->getTable('information_schema.tables')
            ->where('table_schema', $config['database'])
            ->get();
        return $schema;
    }

    /**
     * To Retrieve the tables with its columns
     *
     * @param $table_name Name of the Table
     * @return mixed Table's with its column
     */
    public static function getColumns($table_name)
    {
        $schema = OTF_Facade::setDatabase(self::$config)
            ->getTable('information_schema.columns')
            ->where('table_name', $table_name)
            ->get();
        return $schema;
    }

}