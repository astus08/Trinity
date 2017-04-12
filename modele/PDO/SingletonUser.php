<?php
namespace modele\PDO;

class SingletonUser extends SPDO
{

    /**
     * Constructor
     * 
     * @param   void
     * @return  void
     * @see     PDO::__construct()
     */
    private function __construct(){

        $username  = 'user';

        $password  = 'user';

        $this->$PDOInstance = new PDO('mysql:dbname='. self::BDD_NAME .';host'. self::HOST, self::USERNAME, self::PASSWORD);
    }

    

}

?>