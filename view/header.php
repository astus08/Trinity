<!DOCTYPE html>
    <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Site Web BDE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="owl/owl.carousel.min.css">
  <link rel="stylesheet" href="owl/owl.theme.default.min.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="owl/owl.carousel.min.js"></script>
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
                            <a href="index.php" class="directLink">Home</a>
                            <a href="activities.php" class="directLink">Activities</a>
                            <a href="suggestion.php" class="directLink">Suggestions</a>
                            <a href="shop.php" class="directLink">Shop</a>
                            <div class="menu_login">
                            <?php 
                            if(isset($_SESSION['id'])) {
                            ?>
                            <div class="text-menu"> <?php echo 'Welcome '. $_SESSION['firstName']. ' '. $_SESSION['lastName']; ?> </div>
                            <div class="menu-avatar"> <img src=<?php echo $_SESSION['avatar'] ?> alt="avatar" height="51" width="51"></div>

                            <!--<a href="settings.php" >Settings</a>
                            
                            <a href="disconnect.php">Sign Out</a>-->

                            <a href="settings.php" class="menu-settingsIcon">
                                  <svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 478.703 478.703" style="enable-background:new 0 0 478.703 478.703;" xml:space="preserve" width="51px" height="51px">
                                      <g>
                                          <path d="M454.2,189.101l-33.6-5.7c-3.5-11.3-8-22.2-13.5-32.6l19.8-27.7c8.4-11.8,7.1-27.9-3.2-38.1l-29.8-29.8    c-5.6-5.6-13-8.7-20.9-8.7c-6.2,0-12.1,1.9-17.1,5.5l-27.8,19.8c-10.8-5.7-22.1-10.4-33.8-13.9l-5.6-33.2    c-2.4-14.3-14.7-24.7-29.2-24.7h-42.1c-14.5,0-26.8,10.4-29.2,24.7l-5.8,34c-11.2,3.5-22.1,8.1-32.5,13.7l-27.5-19.8    c-5-3.6-11-5.5-17.2-5.5c-7.9,0-15.4,3.1-20.9,8.7l-29.9,29.8c-10.2,10.2-11.6,26.3-3.2,38.1l20,28.1    c-5.5,10.5-9.9,21.4-13.3,32.7l-33.2,5.6c-14.3,2.4-24.7,14.7-24.7,29.2v42.1c0,14.5,10.4,26.8,24.7,29.2l34,5.8    c3.5,11.2,8.1,22.1,13.7,32.5l-19.7,27.4c-8.4,11.8-7.1,27.9,3.2,38.1l29.8,29.8c5.6,5.6,13,8.7,20.9,8.7c6.2,0,12.1-1.9,17.1-5.5    l28.1-20c10.1,5.3,20.7,9.6,31.6,13l5.6,33.6c2.4,14.3,14.7,24.7,29.2,24.7h42.2c14.5,0,26.8-10.4,29.2-24.7l5.7-33.6    c11.3-3.5,22.2-8,32.6-13.5l27.7,19.8c5,3.6,11,5.5,17.2,5.5l0,0c7.9,0,15.3-3.1,20.9-8.7l29.8-29.8c10.2-10.2,11.6-26.3,3.2-38.1    l-19.8-27.8c5.5-10.5,10.1-21.4,13.5-32.6l33.6-5.6c14.3-2.4,24.7-14.7,24.7-29.2v-42.1    C478.9,203.801,468.5,191.501,454.2,189.101z M451.9,260.401c0,1.3-0.9,2.4-2.2,2.6l-42,7c-5.3,0.9-9.5,4.8-10.8,9.9    c-3.8,14.7-9.6,28.8-17.4,41.9c-2.7,4.6-2.5,10.3,0.6,14.7l24.7,34.8c0.7,1,0.6,2.5-0.3,3.4l-29.8,29.8c-0.7,0.7-1.4,0.8-1.9,0.8    c-0.6,0-1.1-0.2-1.5-0.5l-34.7-24.7c-4.3-3.1-10.1-3.3-14.7-0.6c-13.1,7.8-27.2,13.6-41.9,17.4c-5.2,1.3-9.1,5.6-9.9,10.8l-7.1,42    c-0.2,1.3-1.3,2.2-2.6,2.2h-42.1c-1.3,0-2.4-0.9-2.6-2.2l-7-42c-0.9-5.3-4.8-9.5-9.9-10.8c-14.3-3.7-28.1-9.4-41-16.8    c-2.1-1.2-4.5-1.8-6.8-1.8c-2.7,0-5.5,0.8-7.8,2.5l-35,24.9c-0.5,0.3-1,0.5-1.5,0.5c-0.4,0-1.2-0.1-1.9-0.8l-29.8-29.8    c-0.9-0.9-1-2.3-0.3-3.4l24.6-34.5c3.1-4.4,3.3-10.2,0.6-14.8c-7.8-13-13.8-27.1-17.6-41.8c-1.4-5.1-5.6-9-10.8-9.9l-42.3-7.2    c-1.3-0.2-2.2-1.3-2.2-2.6v-42.1c0-1.3,0.9-2.4,2.2-2.6l41.7-7c5.3-0.9,9.6-4.8,10.9-10c3.7-14.7,9.4-28.9,17.1-42    c2.7-4.6,2.4-10.3-0.7-14.6l-24.9-35c-0.7-1-0.6-2.5,0.3-3.4l29.8-29.8c0.7-0.7,1.4-0.8,1.9-0.8c0.6,0,1.1,0.2,1.5,0.5l34.5,24.6    c4.4,3.1,10.2,3.3,14.8,0.6c13-7.8,27.1-13.8,41.8-17.6c5.1-1.4,9-5.6,9.9-10.8l7.2-42.3c0.2-1.3,1.3-2.2,2.6-2.2h42.1    c1.3,0,2.4,0.9,2.6,2.2l7,41.7c0.9,5.3,4.8,9.6,10,10.9c15.1,3.8,29.5,9.7,42.9,17.6c4.6,2.7,10.3,2.5,14.7-0.6l34.5-24.8    c0.5-0.3,1-0.5,1.5-0.5c0.4,0,1.2,0.1,1.9,0.8l29.8,29.8c0.9,0.9,1,2.3,0.3,3.4l-24.7,34.7c-3.1,4.3-3.3,10.1-0.6,14.7    c7.8,13.1,13.6,27.2,17.4,41.9c1.3,5.2,5.6,9.1,10.8,9.9l42,7.1c1.3,0.2,2.2,1.3,2.2,2.6v42.1H451.9z" fill="#FFFFFF"/>
                                          <path d="M239.4,136.001c-57,0-103.3,46.3-103.3,103.3s46.3,103.3,103.3,103.3s103.3-46.3,103.3-103.3S296.4,136.001,239.4,136.001    z M239.4,315.601c-42.1,0-76.3-34.2-76.3-76.3s34.2-76.3,76.3-76.3s76.3,34.2,76.3,76.3S281.5,315.601,239.4,315.601z" fill="#FFFFFF"/>
                                      </g>
                                  </svg>
                              </a>
                        
                              <a class="menu-disconnectIcon" href="disconnect.php">
                                  <svg version="1.1" id="Capa_1" x="0px" y="0px" width="51px" height="51px" viewBox="0 0 262.85 262.85" style="enable-background:new 0 0 262.85 262.85;" xml:space="preserve">
                                  <g>
                                    <path d="M16.61,185.391v25.813c0,2.637,2.137,4.779,4.779,4.779h66.054c2.641,0,4.779-2.143,4.779-4.779v-26.08l13.595,8.924    v39.554c0,2.637,2.138,4.778,4.779,4.778h24.297c1.278,0,2.492-0.508,3.393-1.409c0.901-0.9,1.396-2.123,1.386-3.397l-0.378-55.8    c-0.009-1.563-0.779-3.02-2.071-3.906l-26.325-18.09l3.122-4.289v1.265c0,2.643,2.135,4.779,4.779,4.779h52.913    c2.646,0,4.779-2.137,4.779-4.779v-23.536c0-2.639-2.133-4.779-4.779-4.779h-27.867v-19.896c0-1.554-0.747-3.005-2.021-3.904    l-28.474-20.12c-0.808-0.569-1.769-0.875-2.758-0.875H48.722c-2.644,0-4.779,2.142-4.779,4.779v54.283    c0,2.627,2.121,4.76,4.749,4.778l8.795,0.052c-0.42,0.732-0.646,1.577-0.637,2.427l0.331,34.653H21.389    C18.752,180.611,16.61,182.753,16.61,185.391z M77.478,110.453h3.388l-3.332,4.714L77.478,110.453z M26.168,190.169h35.838    c1.277,0,2.495-0.508,3.398-1.414c0.898-0.905,1.396-2.133,1.381-3.406l-0.362-37.939l27.58-38.972    c1.031-1.458,1.16-3.37,0.338-4.957c-0.817-1.586-2.457-2.585-4.245-2.585H72.641c-1.281,0-2.5,0.511-3.398,1.421    c-0.898,0.908-1.395,2.135-1.381,3.416l0.243,20.965l-5.528,7.309l-9.071-0.051V89.202h55.581l25.209,17.817v22.199    c0,2.637,2.138,4.779,4.779,4.779h27.867v13.978h-43.36v-11.164c0-2.072-1.33-3.904-3.299-4.546    c-1.944-0.634-4.119,0.059-5.342,1.732l-14.652,20.12c-0.756,1.041-1.066,2.353-0.847,3.617c0.214,1.273,0.938,2.398,2.002,3.136    l28.317,19.467l0.324,48.495h-14.706v-37.359c0-1.605-0.812-3.108-2.154-3.995L90.07,172.294    c-1.468-0.956-3.342-1.035-4.894-0.205c-1.545,0.836-2.504,2.45-2.504,4.205v30.149H26.168V190.169z" fill="#FFFFFF"/>
                                    <path d="M118.109,66.104c0,15.87,12.912,28.784,28.786,28.784c15.868,0,28.782-12.914,28.782-28.784    c0-15.877-12.914-28.789-28.782-28.789C131.021,37.315,118.109,50.227,118.109,66.104z M127.667,66.104    c0-10.606,8.625-19.23,19.228-19.23c10.595,0,19.225,8.625,19.225,19.23c0,10.604-8.63,19.226-19.225,19.226    C136.292,85.331,127.667,76.703,127.667,66.104z" fill="#FFFFFF"/>
                                    <path d="M81.429,226.923v28.758c0,3.963,3.211,7.169,7.168,7.169h150.474c3.957,0,7.168-3.206,7.168-7.169V7.168    c0-3.962-3.211-7.168-7.168-7.168H88.961c-3.958,0-7.168,3.206-7.168,7.168V69.57H96.13V14.337h135.772v234.176H95.766v-21.59    H81.429z" fill="#FFFFFF"/>
                                  </g>
                                  </svg>
                              </a>

                            <?php
                            } else {?>

                                <a href="home.php?action=connect">Sign in</a>
                                <a href="home.php?action=subscribe">Sign up</a>

                            <?php 
                            } 
                            ?>
                            </div>
                          </nav>




                        


                  </header>
                  <div class="site-content">
