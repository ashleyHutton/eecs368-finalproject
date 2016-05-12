function load_allPosts(){
	var file = "post_loader.php";
	var ID = $('#myid').val();
	var data = {ID_filter: ID};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#thread').html(datafromserver);
	});
}

$(document).on("click", ":button[name='edit']", function(e){
	console.log($(this).val());
	var voteValue = $(this).val();
	var postid = $(this).data("postid");
	console.log(postid);
	var file = "vote.php";
	var data = {vote: voteValue, post_id: postid};
	var jqxhr = $.post(file,data);
	load_allPosts();
});


$(document).ready(function()
{
	load_allPosts();
});
