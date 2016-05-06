<?php
session_start();
include("config.php");

if(isset($_POST['ID_filter'])){ //Here we check if we are selecting only a certain user id posts
	$filter_id = $_POST['ID_filter'];
	$postQuery = "SELECT author_id,content FROM Posts WHERE author_id = '$filter_id'";
}else{
	$postQuery = "SELECT author_id,content FROM Posts";
}

$fetched_posts = array();

if($result = $db->query($postQuery)){
	while($row = $result->fetch_assoc()){
		array_push($fetched_posts, [$row['author_id'],$row['content']]);
	}
	$result->free();
}

for($i = 0; $i < sizeof($fetched_posts); $i++){
	$posterId = $fetched_posts[$i][0];
	$postCont = $fetched_posts[$i][1];
	$formated_post = "
	<div class='post_area'>
		<div>Author: <label>$posterId</label></div>
		<div class='post_content'>
			$postCont
		</div>
	</div>";
	echo $formated_post;
}

?>
