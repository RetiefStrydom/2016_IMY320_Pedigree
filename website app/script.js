$(document).ready(function() {
	$(".main .navBar .iconLink").on("click", function(e) {
		
		e.preventDefault();
		
		//~ $(".navbar ul li").removeClass("active");
		
		var page = $(this).attr("id") + ".php";
		
		//~ $($(this).parent()).addClass("active");
		
		$(".content").fadeOut("slow", function() {
			$(".content").html("<div class='container'><div class='row'><div class='col-md-12 col-sm-12 col-xs-12' style='text-align:center;'><img src='Images/loadScreen.gif'></div></div></div>").load(page);
			$(".content").fadeIn("slow");
		});
	});
});