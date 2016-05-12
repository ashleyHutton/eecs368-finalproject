<?php
include ("session.php");
$like = $_POST['vote'];
$post_id = $_POST['post_id'];
if($like == 1){
	$like_query = "INSERT INTO post_like ( post_id , uid ) VALUES ($post_id , $user_id )";
	$db->query($like_query);
}else if( $like == 0){
	$like_query = "DELETE FROM post_like WHERE (post_id = $post_id and uid = $user_id)";
	$db->query($like_query);
}
?>
