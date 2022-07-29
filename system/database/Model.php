<?php 
namespace Bytes\system\database;

use Bytes\src\models\User;
use Bytes\system\core\Application;
use PDO;

abstract class Model {
    public static function all() {

        $db = Application::$app->db;
        $statement = $db->pdo->query('SELECT * from users limit 3')->fetchAll(PDO::FETCH_OBJ);
        ss( $statement );

    }

    public function where() {
        echo 'werher';
    }

    public function get() {
        echo 'get datat ';
    }
}