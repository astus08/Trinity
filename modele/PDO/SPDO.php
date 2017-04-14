<?php

namespace modele\PDO;

use \PDO;


date_default_timezone_set('Europe/Paris');

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
        

        $req = $this->PDOInstance->prepare("INSERT INTO users(lastName, firstName, avatar, email, pwd, id_roles) VALUES (?,?,"."'view/images/avatar/default.png'".",?,?,'1')");
        $tmp = $req->execute(array($data['lastName'],$data['firstName'],$data['mail'],password_hash($data['pwd'], PASSWORD_DEFAULT)));

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

    /**
     * Vote for an activity
     * @param array $data 
     * @return bool
     */
    public function vote($data){
        $req = $this->PDOInstance->prepare("INSERT INTO activities_vote(`dateVote`, `id_user`, `id_activity`) VALUES (?,?,?)");
        $tmp = $req->execute(array(date("Y-m-d H:i:s"),$data['id_user'], $data['id_activity']));

        return $tmp;
    }

    /**
     * Test if a user has already voted for a activities
     * @param array $data 
     * @return bool
     */
    public function alreadyVoted($data){
        $req = $this->PDOInstance->prepare("SELECT * FROM activities_vote WHERE id= ?");
        $tmp = $req->execute(array($data['id_user']));

        return $tmp;
    }

    public function suggest($data){
        $req = $this->PDOInstance->prepare("INSERT INTO suggestions(content, dateSuggestion, id_user) VALUES (?,?,?)");
        $tmp = $req->execute(array($data['content'],date("Y-m-d H:i:s"),$data['id_user']));

        return $tmp;
    }
}

?>