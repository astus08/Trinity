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

        parent::__construct();
    }

}

?>