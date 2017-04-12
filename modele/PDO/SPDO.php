<?php

namespace modele\PDO;

class SPDO
{
    protected $PDOInstance = null;

    protected static $instance = null;

    protected $username  = null;

    protected $password  = null;

    protected $host      = 'localhost';

    protected $bddName   = "Trinity";

    /**
     * Constructor
     * 
     * @param   void
     * @return  void
     * @see     PDO::__construct()
     */
    protected function __construct(){
        $this->$PDOInstance = new PDO('mysql:dbname='. self::BDD_NAME .';host'. self::HOST, self::USERNAME, self::PASSWORD);
    }

    /**
     * Return PDO object 
     * 
     * @param   void
     * @return  $instance
     */
    public static function getInstance(){
        if(is_null(self::instance)){
            self::$instance = new SingletonAdmin();
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