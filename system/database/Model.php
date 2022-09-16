<?php 
namespace Bytes\system\database;

use Bytes\src\models\User;
use Bytes\system\core\Application;
use Bytes\system\database\Eloquent\Orm\BuildOrm;
use PDO;

class Model extends BuildOrm {
    
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