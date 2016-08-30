$(document).ready(function() {
	$(".navbar table a").on("click", function(e) {
		
		e.preventDefault();
		
		//~ $(".navbar ul li").removeClass("active");
		
		var page = $(this).attr("id") + ".php";
		
		//~ $($(this).parent()).addClass("active");
		
		$(".content").load(page);
	});
});