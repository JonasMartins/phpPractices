<?php 
	include("includes/config.php");

	// session_destroy();

	// if(isset($_SESSION['userLoggedIn']))
	// {
	// 	$userLoggedIn = $_SESSION['userLoggedIn'];
	// } else 
	// 	header("Location: register.php");

	// commit 042 set all icons ... gitignore have ignore them.

?>
<!DOCTYPE html>
<html>
<head>
	<title>Slotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div id="nowPlayingBarContainer">
		<div id="nowPlayingBar">

			<div id="nowPlayingLeft">
				
			</div>

			<div id="nowPlayingCenter">
				<div class="content playerControls">
					<div class="buttons">
						<button class="controlButton shuffle" title="Shuffle">
							<img src="assets/images/icons/shuffle.png" alt="Shuffle">
						</button>
						
						<button class="controlButton previous" title="Previous">
							<img src="assets/images/icons/previous.png" alt="Shuffle">
						</button>
						
						<button class="controlButton play" title="Play">
							<img src="assets/images/icons/play.png" alt="Shuffle">
						</button>

						<button class="controlButton pause" title="Pause">
							<img src="assets/images/icons/pause.png" alt="Pause">
						</button>
						
						<button class="controlButton next" title="Next">
							<img src="assets/images/icons/next.png" alt="Shuffle">
						</button>

						<button class="controlButton repeat" title="Repeat">
							<img src="assets/images/icons/repeat.png" alt="Shuffle">
						</button>
					</div>

					<div class="playbackBar">
						<span class="progressTime current">0.00</span>
						<span class="progressBar"></span>

						<span class="progressTime remaining">0.00</span>
					</div>

				</div>				
			</div>

			<div id="nowPlayingRight">
				
			</div>

		</div>

	</div>	
</body>
</html>