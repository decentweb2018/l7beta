$(function() {
	$(".l7_autocomplete").each(function(i, el) {
		el = $(el);
		el.autocomplete(
			{
				source: function(request, response) {
					$.ajax({
						url: '/wp-admin/admin-ajax.php?action=l7_autocomplete&term=' + request.term + '&fields=' + el.attr('fields_to_search'),
						dataType: 'json',
						success: function( data ) {
							response( data );
						}
					});
				},
				minLength: 2,
				select: function(event, ui) {
					window.location.href='/?p='+ui.item.value;
					// Replace this DEBUG code with JS that will load the page selected.
 					//$('#l7_autocomplete_debug').html("Selected: TITLE=" + ui.item.label + "; ID=" + ui.item.value);
				}
			}
		);
	});
	
	/*Styles of label*/
	$(".l7_autocomplete").on( "focus", function(){
		if ($(this).val()) {
			return;
		}else{
			$(".ajax-search-widget__label").addClass("focus");
		}
	});
	$(".l7_autocomplete").on( "focusout", function(){
		console.log('out');
		if ($(this).val()) {
			return;
		}else{
			$(".ajax-search-widget__label").removeClass("focus");
		}
	});
});
