<?php
namespace App\Components;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database {
    function __construct() {
        $dbParams = require(ROOT.'/config/db_params.php');
        $capsule = new Capsule;
        $capsule->addConnection($dbParams);

        $capsule->bootEloquent();
    }
}