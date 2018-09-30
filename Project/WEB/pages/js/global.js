$(document).ready(function() {
	$(".child-comments").hide();

	$("a#children").click(function() {
		var section = $(this).attr("name");
		$("#C-" + section).toggle(500);
	});
	$("a#reply").click(function() {
		var id = $(this).attr("name");
		$("#P-" + id).toggle(500);
	});

})
