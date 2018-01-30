<?php 
	require_once('../../../private/initialize.php');
	
	$id = $_GET['id'] ?? '1'; // default value syntax phph > 7.0

?>

<h1>View Object with id: <?php echo $id; ?></h1>

<a href="show.php?name=<?php echo u('John Doe'); ?>">Link</a><br />
<a href="show.php?company=<?php echo u('Widgets&More'); ?>">Link</a><br />
<a href="show.php?query=<?php echo u('!#*?'); ?>">Link</a><br />