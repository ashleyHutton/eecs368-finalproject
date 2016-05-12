<?php
session_start();
include("session.php");
if(isset($_POST['ID_filter'])){ //Here we check if we are selecting only a certain user id posts
	$filter_id = $_POST['ID_filter'];
	$postQuery = "SELECT author_id,content,post_id FROM Posts WHERE author_id = '$filter_id'";
}else{
	$postQuery = "SELECT author_id,content,post_id FROM Posts";
}
$likeQuery = "SELECT post_id FROM post_like WHERE (uid = $user_id)";

$countQuery = " SELECT post_id, COUNT(uid) FROM post_like GROUP BY post_id";

$fetched_posts = array();
if($result = $db->query($postQuery)){
	while($row = $result->fetch_assoc()){
		array_push($fetched_posts, [$row['author_id'],$row['content'],$row['post_id']]);
	}
	$result->free();
}
$fetched_likes = array();
if($result = $db->query($likeQuery)){
	while($row = $result->fetch_assoc()){
		array_push($fetched_likes, $row['post_id']);
	}
	$result->free();
}
for($i = 0; $i < sizeof($fetched_posts); $i++){
	$posterId = $fetched_posts[$i][0];
	$postCont = $fetched_posts[$i][1];
	$thisPostID = $fetched_posts[$i][2];
	if(in_array($thisPostID,$fetched_likes)){
		$vote = "-";
		$val = 0;
	}else{
		$vote = "+";
		$val = 1;
	}
	echo $user_id;
	$formated_post = "
	<div class='post_area'>
		$thisPostID
		<div>Author: <label>$posterId</label></div>
		<div class='post_content'>
			$postCont
			<div class = 'buttons'>
			<button class = 'vote' value=". $val ." data-postID=". $thisPostID ." type= 'submit' name='vote' > ". $vote ."</button>
		</div>
		</div>
		
	</div>";
	echo $formated_post;
}
?>
