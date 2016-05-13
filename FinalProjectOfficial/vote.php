<?php
include ("session.php");
//like and post id values get assigned
$like = $_POST['vote'];
$post_id = $_POST['post_id'];

//Here we check if the user has already liked a posts so that he isn't able to double vote.
$prevLike = "SELECT * FROM post_like WHERE (post_id = $post_id AND uid = $user_id)";
$result = $db->query($prevLike);
$counted = mysqli_num_rows($result);
if($like == 1 and $counted == 0){
	$like_query = "INSERT INTO post_like ( post_id , uid ) VALUES ($post_id , $user_id )";
	$db->query($like_query);
}else if( $like == 0){
	$like_query = "DELETE FROM post_like WHERE (post_id = $post_id and uid = $user_id)";
	$db->query($like_query);
}
?>
