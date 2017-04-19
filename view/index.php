<?php
require "header.php"; 
?>


<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>

<div class="owl-carousel owl-theme carousel" style="margin-top: 70px; z-index: 0">
  <div><img src="images/4ltrophy.jpg"></div>
  <div><img src="images/cube.jpeg"></div>
  <div><img src="images/imprimante3d.jpg"></div>
  
</div>




<script type="text/javascript">
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:2,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
}) 
</script>

                
<?php
require "footer.php";
?>


       