<?php

namespace modele\PDO;

use \PDO;

class SPDO
{
    private $PDOInstance = null;

    private static $instance = null;

    const USERNAME  = 'root';

    const PASSWORD  = '';

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

    /**
     * Return user informations for connexion
     * @param type $data forumlaire data 
     * @return array
     */
    public function connexion($data){
        $req = $this->PDOInstance->prepare("SELECT * FROM users WHERE email = ?");
        $req->execute(array($data['mail']));
        $tmp = $req->fetchAll();
        return $tmp[0];
    }

    
    /**
     * Insert a user into the table
     * @param type $data forumlaire data 
     * @return bool
     */
    public function inscription($data){
        

        $req = $this->PDOInstance->prepare("INSERT INTO users(lastName, firstName, avatar, email, pwd, id_roles) VALUES (?,?,"."'view/img/avatar/default.png'".",?,?,'1')");
        $tmp = $req->execute(array($data['lastName'],$data['firstName'],$data['mail'],$data['pwd']));

        var_dump($req);
        return $tmp;
    }

    /**
     * Return the information about the activity
     * @param id of the article
     * @return array
     */
    public function getArticle($id){
        $req = $this->PDOInstance->prepare("SELECT * FROM activities WHERE id_activity = ?");
        $req->execute(array($id));
        $tmp = $req->fetchAll();
        return $tmp;
    }

}

?>