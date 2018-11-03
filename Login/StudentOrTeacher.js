$(document).ready(function(){
	$(".left").click(function(){
		$(".mainContainer").fadeOut(500);
		$(".containerTeacher").fadeIn(500);
	});
});

$(document).ready(function(){
	$(".right").click(function(){
		$(".mainContainer").fadeOut(500);
		$(".containerStudent").fadeIn(500);
	});
});

$(document).ready(function(){
	$("#particles-js").click(function(){
		$(".mainContainer").fadeIn(200);
	});
});