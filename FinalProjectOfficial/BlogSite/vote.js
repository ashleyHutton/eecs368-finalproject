$(document).on("click", ":button[name='vote']", function(e){
	console.log($(this).val());
	var voteValue = $(this).val();
	var postid = $(this).data("postid");
	console.log(postid);
	var file = "vote.php";
	var data = {vote: voteValue, post_id: postid};
	var jqxhr = $.post(file,data);
	load_allPosts();
});
