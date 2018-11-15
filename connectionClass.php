<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/11/15
 * Time: 14:10
 */

class connectionClass extends mysqli{
    public $host="localhost",$dbname="webcam",$dbpass="",$dbuser="root";
    public $con;

    public function __construct() {
        if($this->connect($this->host, $this->dbuser, $this->dbpass, $this->dbname)){}
        else
        {
            return "<h1>Error while connecting database</h1>";
        }
    }
}