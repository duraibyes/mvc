<?php
namespace Bytes\system\database\Eloquent\Orm;

use Bytes\system\core\Application;
use Bytes\system\database\Eloquent\Interfaces\BuildOrmInterface;

class BuildOrm implements BuildOrmInterface {
    public static $query;
    public static $table_name;
    public static function find() {
        /**
         * get table name from child class
         */
        self::table();
        $table = self::$table_name;

        $raw_query = 'SELECT * FROM '.$table;
        return self::run_query($raw_query);
        
    }
    public static function all() {

    }

    public static function table() {
        $class = get_class(new static);
        $class_name = new $class;
        self::$table_name =  $class_name->table;
        return new static;
    }
    public function one() {

    }
    public function latest() {

    }

    public function run_query($query) {
        $db = Application::$app->db;
        $debug = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS,2);
        $caller = isset($debug[1]['function']) ? $debug[1]['function'] : null;
        
        if( $caller == 'find' ) {
            $statement = $db->pdo->query($query)->fetch(\PDO::FETCH_OBJ);
            // ss( $statement );
        } else if(  $caller == 'all'  ) {
            $statement = $db->pdo->query($query)->fetchAll(\PDO::FETCH_OBJ);
        }
        return $statement;
    }

    
}