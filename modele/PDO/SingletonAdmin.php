<?php
namespace modele\PDO;

class SingletonAdmin extends SPDO
{

    /**
     * Constructor
     * 
     * @param   void
     * @return  void
     * @see     PDO::__construct()
     */
    private function __construct(){
        
        $username  = 'dev';

        $password  = 'dev';

        $this->$PDOInstance = new PDO('mysql:dbname='. self::BDD_NAME .';host'. self::HOST, self::USERNAME, self::PASSWORD);
    }
    
}

?>