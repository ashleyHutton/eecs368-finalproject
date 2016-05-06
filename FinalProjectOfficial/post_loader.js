function load_allPosts(){
	var file = "post_loader.php";
	var data = {ID_filter: []};
	var jqxhr = $.post(file,data,function(datafromserver)
	{
		$('#thread').html(datafromserver);
	});
}

$(document).ready(function()
{
	load_allPosts();
});
