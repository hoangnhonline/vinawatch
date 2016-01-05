var MIN_LENGTH = 3;
var loadurl = 'http://vinawatch.vn/';
$( document ).ready(function() {
	$("#keyword_search").keyup(function() {
		var keyword = $("#keyword_search").val();
		if (keyword.length >= MIN_LENGTH) {

			$.get( loadurl + "ajax/auto-complete.php", { keyword: keyword } )
			.done(function( data ) {
				$('#results').html('');
				var results = jQuery.parseJSON(data);
				$(results).each(function(key, value) {  console.log(value);
					$('#results').append('<div class="item"><a href="'+loadurl+value.cate_alias+'/'+value.product_alias+'.html">' + value.product_name + '</a></div>');
				})

			    $('.item').click(function() {
			    	var text = $(this).html();
			    	$('#keyword_search').val(text);
			    })

			});
		} else {
			$('#results').html('');
		}
	});

    $("#keyword_search").blur(function(){
    		$("#results").fadeOut(500);
    	})
        .focus(function() {		
    	    $("#results").show();
    	});

});