<?php
namespace modele\PDO;

require 'SPDO.php';

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

        parent::__construct();
    }

}

?>