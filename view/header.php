<?php session_start(); ?>

<!DOCTYPE html>
    <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Site Web BDE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="css/main.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
      </head>

        <body ng-app="myApp">
            <div class="site-container">

              <div class="site-pusher">

                  <header class="header">

                    
                    <a href="#" class="header__icon" id="header__icon"></a>
                    <a href="#" class="header__logo"></a>

                    <div class="div_img">
                            <img src="images/exiagame_logo.png" alt="exiagame_logo" class="exiagame_logo" height="55" width="66" >
                          </div>

                          <nav class="menu">
                            <a href="index.php">Home</a>
                            <a href="activities.php">Activities</a>
                            <a href="suggestion.php">Suggestions</a>
                            <a href="#">Shop</a>
                          </nav>



                          <nav class="menu2">
                            <?php 
                            if(isset($_SESSION['id'])) {
                              echo 'Welcome '. $_SESSION['firstName']. ' '. $_SESSION['lastName'];
                              ?><img src=<?php echo $_SESSION['avatar'] ?> alt="avatar" height="50" width="50"><?php 
                            } else {?>
                                <a href="home.php">Inscription</a>
                                <a href="home.php">Connexion</a>
                            <?php } ?>
                          </nav>
                        


                  </header>
                  <div class="site-content">