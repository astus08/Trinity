<?php

namespace modele\PDO;

use \PDO;

class SPDO
{
    private $PDOInstance = null;

    private static $instance = null;

    const USERNAME  = 'dev';

    const PASSWORD  = 'dev';

    const HOSTNAME  = 'localhost';

    const BDDNAME   = "Trinity";

    /**
     * Constructor
     * 
     * @param   void
     * @return  void
     * @see     PDO::__construct()
     */
    private function __construct(){
        $this->PDOInstance = new PDO('mysql:dbname='. self::BDDNAME .';host'. self::HOSTNAME, self::USERNAME, self::PASSWORD);
    }

    /**
     * Return PDO object 
     * 
     * @param   void
     * @return  $instance
     */
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new SPDO();
        }

        return self::$instance;
    }

    /**
     * Execute a query
     * 
     * @param   void
     * @return  $instance
     */
    public function query($query){
        return $this->PDOInstance->query($query);
    }
}

?>