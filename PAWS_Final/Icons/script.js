$(document).ready(function() {
	$(".main .navBar  a .navIcon").on("click", function(e) {
		
		e.preventDefault();
		
		//~ $(".navbar ul li").removeClass("active");
		
		var page = $(this).attr("id") + ".php";
		
		//~ $($(this).parent()).addClass("active");
		
		$(".content").fadeOut("slow", function() {
			$(".content").load(page);
			$(".content").fadeIn("slow");
		});
	});
});