jQuery(document).ready(function() {


	// jQuery(".accordion").on("click", ".accordion-header", function() {
	// 	jQuery(this).toggleClass("active").next().slideToggle('fast');
	// 	jQuery(".accordion-content").not(jQuery(this).next()).slideUp('fast');

	// });
	 jQuery( "#accordion" ).accordion({
	 	 active: false,
	 	 collapsible:true
	 });
	jQuery("#accordion li").sort(sort_li).appendTo('#accordion');
	function sort_li(a, b) {
		return (jQuery(b).data('position')) < (jQuery(a).data('position')) ? 1 : -1;
	}

	

});