<?php
session_start(); 
require "header.php"; 

if (!isset($_SESSION['id'])) {
	header('Location: index.php');
}

require '..\modele\PDO\SPDO.php';
use modele\PDO\SPDO;
?>

<?php
if (isset($_GET['id_picture'])){ // Only ONE picture of the activity
	$id_picture = $_GET['id_picture'];?>
	<article class="presentation" ng-controller="pictureCtrl" ng-init="init('<?php echo $id_picture; ?>')">
		<div class="picture-presentation"><img src="{{picture.path}}" alt=""></div>
		<?php if ($_SESSION["power"] == 1) { ?>
			<form action="../controller/Pictures_Controller.php" method="POST">
				<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
				<input type="text" name="idAct" value="{{picture.id_activity}}" class="display-none">
				<input type="submit" name="action" value="delete">
			</form>
		<?php }?>
		<br>
		<div class="author_like">
			<div class="author">
				<p>Uploaded by : {{picture.firstName}} {{picture.lastName}} ({{picture.email}})</p>
				<p>Date : {{picture.datePictureActivity}}</p>
			</div>
			<div class="like">
				<?php if (!SPDO::getInstance()->hasVote($id_picture, $_SESSION['id'])){?>
					<form action="../controller/Pictures_Controller.php" method="POST">
						<input type="text" name="action" value="vote" class="display-none">
						<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
						<label for="btn_vote">
							<input type="submit" id="btn_vote" class="display-none">
							<span>
								<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 241.66 241.66" style="enable-background:new 0 0 241.66 241.66;" xml:space="preserve" width="51px" height="51px">
								<g id="Like_2">
									<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M208.632,133.579c10.345,0.472,19.121-7.677,19.574-18.203   c0.453-10.526-6.821-19.989-17.174-20.444l-68.73-8.63c0,0,14.323-23.958,14.323-59.455C156.625,3.184,139.72,0,129.778,0   c-7.821-0.003-9.927,15.151-9.927,15.151h-0.016c-1.771,9.717-4.077,18.203-12.09,33.827C98.775,66.49,86.559,64.847,72.297,80.445   c-2.517,2.747-5.899,7.281-9.195,12.86c-0.269,0.295-0.52,0.708-0.763,1.289c-0.294,0.692-0.646,1.172-0.956,1.812   c-0.546,1.003-1.083,2.006-1.611,3.059c-8.827,8.827-22.579,7.925-28.435,7.925c-11.746,0-17.898,6.825-17.898,17.898   l-0.004,81.828c0,12.423,5.083,16.613,17.903,16.613h17.898c9.011,0,16.067,5.166,26.848,8.949   c14.767,5.116,36.821,8.956,74.811,8.956c6.644,0,27.251,0.025,27.251,0.025c6.309,0,11.377-2.882,15.034-6.362   c1.392-1.323,2.844-3.245,3.465-6.995c0.101-0.581,0.209-3.017,0.193-3.346c0.477-10.728-6.008-14.612-9.682-15.835   c0.1-0.034,0.034-0.126,0.234-0.118l11.663,0.522c10.353,0.472,20.572-6.986,20.572-19.669c0-10.517-8.525-17.934-18.844-18.439   l6.184,0.287c10.352,0.455,19.103-7.694,19.582-18.22C226.998,142.959,218.977,134.052,208.632,133.579z" fill="#91DC5A"/>
								</g>
								</svg>
							</span>
						</label>
					</form>
				<?php } else { ?>
					<form action="../controller/Pictures_Controller.php" method="POST">
						<input type="text" name="action" value="unvote" class="display-none">
						<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
						<label for="btn_vote">
							<input type="submit" id="btn_vote" class="display-none">
							<span>You like that 
								<svg version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 241.66 241.66" style="enable-background:new 0 0 241.66 241.66;" xml:space="preserve" width="51px" height="51px">
								<g id="Dislike_2">
									<path style="fill-rule:evenodd;clip-rule:evenodd;" d="M210.323,17.93h-17.898c-9.01,0-16.066-5.165-26.848-8.949   c-14.766-5.116-36.821-8.956-74.811-8.956C84.122,0.025,63.516,0,63.516,0c-6.309,0-11.377,2.882-15.035,6.363   c-1.392,1.323-2.844,3.245-3.465,6.994c-0.101,0.582-0.21,3.017-0.193,3.346c-0.478,10.729,6.008,14.614,9.682,15.835   c-0.101,0.034-0.033,0.126-0.235,0.117l-11.662-0.522c-10.352-0.472-20.572,6.986-20.572,19.669   c0,10.517,8.524,17.933,18.844,18.439l-6.184-0.287c-10.352-0.455-19.103,7.695-19.582,18.22   c-0.453,10.526,7.567,19.433,17.913,19.906c-10.345-0.472-19.121,7.677-19.573,18.203c-0.454,10.526,6.821,19.99,17.174,20.444   l68.73,8.63c0,0-14.324,23.959-14.324,59.455c0,23.664,16.905,26.848,26.848,26.848c7.821,0.002,9.927-15.151,9.927-15.151h0.016   c1.77-9.717,4.077-18.203,12.091-33.827c8.968-17.512,21.184-15.869,35.446-31.467c2.517-2.747,5.898-7.281,9.195-12.86   c0.269-0.295,0.521-0.708,0.764-1.289c0.293-0.69,0.646-1.172,0.956-1.812c0.545-1.003,1.082-2.005,1.61-3.059   c8.826-8.827,22.579-7.925,28.435-7.925c11.746,0,17.898-6.825,17.898-17.898l0.005-81.828   C228.227,22.121,223.143,17.93,210.323,17.93z" fill="#C2242A"/>
								</g>
								</svg>
							</span>
						</label>
					</form>
				<?php }?>
				<p>{{picture.likes}} {{likeText}}</p>
			</div>
		</div>
		<div class="container-comment">
			<link rel="stylesheet" type="text/css" href="css/main.css">
			Post a new comment :

			<form style="width: 80%; margin:0 auto; padding-right: 0;" action="../controller/Pictures_Controller.php" method="POST" id="form-activity">
				<input type="text" name="action" value="comment" class="display-none">
				<input type="text" name="idPct" value="<?php echo $id_picture; ?>" class="display-none">
				<textarea class="text-box-comment" name="content" cols="50" rows="10" required></textarea>
				<input class="btn-login-comment" type="submit" name="btn" value="Post">
			</form>
		</div>
		<ul class="commentsList">
			<li class="comment" ng-repeat="comment in comments">
				{{comment.content}} Posted by {{comment.firstName}} {{comment.lastName}} at {{comment.dateComment}}
			</li>
		</ul>
	</article>
<?php
} else {
	header("Location: activities.php");
}?>

<?php
require "footer.php";
?>