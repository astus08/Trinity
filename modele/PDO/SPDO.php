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

        if (empty($tmp)) {
            # code...
            header('Location: ../view/home.php?error=email');
        }
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
     * @param id of the activity
     * @return array
     */
    public function getActivity($id){
        $req = $this->PDOInstance->prepare("SELECT * FROM activities 
                                            WHERE id_activity = ?");
        $req->execute(array($id));
        $tmp = $req->fetchAll();
        return $tmp;
    }

    public function getArticle($id){
        $req = $this->PDOInstance->prepare("SELECT * FROM products
                                            INNER JOIN category ON
                                                products.id_category = category.id_category
                                            WHERE id_product = ?");
        $req->execute(array($id));
        $tmp = $req->fetchAll();
        return $tmp;
    }

    public function deletePct($id){
        $req = $this->PDOInstance->prepare("DELETE FROM comments WHERE (`id_picture_activity` = ?)");
        $req->execute(array($id));

        $req = $this->PDOInstance->prepare("DELETE FROM likes WHERE (`id_picture_activity` = ?)");
        $req->execute(array($id));

        $req = $this->PDOInstance->prepare("DELETE FROM pictures_activity WHERE (`id_picture_activity` = ?)");
        $req->execute(array($id));
    }

    /**
     * Return the information about the picture selected
     * @param id of the picture
     * @return array
     */
    public function getPicture($id){
        $req = $this->PDOInstance->prepare("SELECT pictures_activity.*, users.id_user, users.lastName, users.firstName, users.avatar, users.email, users.birthDate, users.id_roles, (SELECT COUNT(*) AS compteur FROM likes WHERE id_picture_activity = ?) AS likes FROM pictures_activity
                                            INNER JOIN users ON
                                                pictures_activity.id_user = users.id_user
                                            WHERE id_picture_activity = ?");
        $req->execute(array($id, $id));
        $tmp = $req->fetchAll();

        return $tmp;
    }

    /**
     * Return the comments posted on a picture
     * @param id of the picture
     * @return array
     */
    public function getComments($id){
        $req = $this->PDOInstance->prepare("SELECT comments.*, users.id_user, users.lastName, users.firstName, users.avatar, users.email, users.birthDate, users.id_roles FROM comments 
                                            INNER JOIN users ON
                                                comments.id_user = users.id_user
                                            WHERE id_picture_activity = ?");
        $req->execute(array($id));
        $tmp = $req->fetchAll();

        return $tmp;
    }

    /**
     * Return true if the user authentified has already vote for this picture
     * @param id of the picture
     * @param id of the user
     * @return array
     */
    public function hasVote($id, $user){
        $req = $this->PDOInstance->prepare("SELECT * FROM likes
                                            WHERE id_picture_activity = ? AND id_user= ?");
        $req->execute(array($id, $user));

        if (count($req->fetchAll()) == 1){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Add a picture
     * @param id of the activity
     * @param the path of the picture
     * @param id of the user (autor)
     * @return bool
     */
    public function addPct($idAct, $filePath, $idUser){
        $req = $this->PDOInstance->prepare("INSERT INTO pictures_activity(`path`, `datePictureActivity`, `id_activity`, `id_user`) VALUES (?, ?, ?, ?)");
        $tmp = $req->execute(array($filePath, date("Y-m-d H:i:s"), $idAct, $idUser));

        return $tmp;
    }

    /**
     * Like a picture
     * @param id of the user
     * @param id of the picture
     * @return bool
     */
    public function votePct($idUser, $idPct){
        $req = $this->PDOInstance->prepare("INSERT INTO likes(`id_user`, `id_picture_activity`) VALUES (?, ?)");
        $tmp = $req->execute(array($idUser, $idPct));

        return $tmp;
    }

    /**
     * Comment a picture
     * @return bool
     */
    public function commentPct($idUser, $idPct, $content){
        $req = $this->PDOInstance->prepare("INSERT INTO comments(`content`, `dateComment`,`id_picture_activity`, `id_user`) VALUES (?, ?, ?, ?)");
        $tmp = $req->execute(array($content, date("Y-m-d H:i:s"), $idPct, $idUser));

        return $tmp;
    }

    /**
     * Vote for an activity
     * @param array $data 
     * @return bool
     */
    public function vote($data){
        $req = $this->PDOInstance->prepare("INSERT INTO activities_vote(`dateVote`, `id_user`, `id_activity`, `date_sugg_vote`, `time_sugg_vote`) VALUES (?,?,?,?,?)");
        $tmp = $req->execute(array(date("Y-m-d H:i:s"),$data['id_user'], $data['id_activity'], $data['date'], $data['time']));

        return $tmp;
    }

    /**
     * Test if a user has already voted for a activities
     * @param array $data 
     * @return bool
     */
    public function alreadyVoted($data){
        $req = $this->PDOInstance->prepare("SELECT * FROM activities_vote WHERE id_user= ? AND id_activity = ?");
        $req->execute(array($data[0], $data[1]));

        $tmp = $req->fetchAll();

        return $tmp;
    }

    public function getProducts(){

    }

    public function suggest($data){
        $req = $this->PDOInstance->prepare("INSERT INTO suggestions(content, dateSuggestion, id_user) VALUES (?,?,?)");
        $tmp = $req->execute(array($data['content'],date("Y-m-d H:i:s"),$data['id_user']));

        return $tmp;
    }

    public function subscribe($data){
        $req = $this->PDOInstance->prepare("INSERT INTO activities_subscribes(id_user, id_activity) VALUES (?,?)");
        $tmp = $req->execute(array($data['id_user'], $data['id_picture_subscribe']));

        return $tmp;
    }

    public function isSubscribed($data){
        $req = $this->PDOInstance->prepare("SELECT * FROM activities_subscribes WHERE id_user= ? AND id_activity=?");
        $req->execute(array($data[0], $data[1]));

        $tmp = $req->fetchAll();

        if (empty($tmp)) {
            return true;
        }
        else{
            return false;
        }
    }

    public function cancelSubscribed($data){
        $req = $this->PDOInstance->prepare("DELETE FROM activities_subscribes WHERE id_user=? AND id_activity=?");
        $tmp = $req->execute(array($data['id_user'], $data['id_picture_subscribe']));

        return $tmp;
    }

    public function voteEnable($data){
        $req = $this->PDOInstance->prepare("SELECT vote_enable FROM activities WHERE id_activity=?");
        $req->execute(array($data[0]));

        $tmp = $req->fetchAll();

        return $tmp[0];
    }

    public function unVote($data){
        $req = $this->PDOInstance->prepare("DELETE FROM activities_vote WHERE id_user=? AND id_activity=?");
        $tmp = $req->execute(array($data['id_user'], $data['id_activity']));

        return $tmp;
    }

    public function settingsBirth($data){
        $req = $this->PDOInstance->prepare("UPDATE users SET birthDate = ? WHERE id_user = ?");
        $tmp = $req->execute(array($data['birth_date'],$data['id_user']));

        return $tmp;
    }

    public function getBirth($data){
        $req = $this->PDOInstance->prepare("SELECT birthDate FROM users WHERE id_user = ?");
        $req->execute(array($data[0]));

        $tmp = $req->fetchAll();

        return $tmp[0];
    }

    public function settingsPicture($data){

        $req = $this->PDOInstance->prepare("UPDATE users SET avatar = ? WHERE id_user = ?");
        $tmp = $req->execute(array($data[0],$data[1]));

        return $tmp;
    }

    public function findProduct($data){
        $req = $this->PDOInstance->prepare("SELECT title, price FROM products WHERE id_product = ?");
        $req->execute(array($data));

        $tmp = $req->fetchAll();
        return $tmp[0];
    }

}

?>