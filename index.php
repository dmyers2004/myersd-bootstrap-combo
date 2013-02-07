<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HTML5 Basic Template</title>
		<link href="/assets/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">

		<script type="text/javascript" src="/assets/jquery/jquery.1.8.3.min.js"></script>
		<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" >
    $(function () {

        var jazz_musicians = [
          "Scott Joplin",
          "Charles Bolden",
          "Duke Ellington",
          "Louis Armstrong",
          "Earl Hines",
          "Fats Waller",
          "Count Basie",
          "Benny Goodman",
          "Sun Ra",
          "Thelonious Monk",
          "Dizzy Gillespie",
          "Charlie Parker",
          "Dave Brubeck",
          "Charles Mingus",
          "Oscar Peterson",
          "Miles Davis",
          "John Coltrane",
          "Chet Baker",
          "Ornette Coleman",
          "Wynton Marsalis",
          "Billie Holiday",
          "Ella Fitzgerald",
          "Sarah Vaughan"
        ];

			$('#typeahead').typeahead({ source: jazz_musicians });
			
			$('#typeahead-combo').typeahead({ source: jazz_musicians }).combobox();
			
			$('#typeahead-combo-ajax').typeahead({ source: function(query, process) {
					return $.get('typeahead.php', { query: query }, function (data) {
						return process(data.options);
					});
				}
			}).combobox();

    });
    
    (function($){
		  $.fn.combobox = function(options) {
		  	var that = this;
		  	
		  	/*
		  	If it's set for 8 then they prob left it at the default set it to 128
		  	The dropdown is kind-a worthless if it's only showing 8
		  	*/
		  	var options = $(this).data('typeahead').options;
		  	options.items = (options.items == 8 ) ? 128 : options.items;
		  	
		  	/* patch in a few overriding functions */
		  	$(this).data('typeahead').highlighter = function (item) { return '<div>' + item + '</div>'; }
		  	$(this).data('typeahead').matcher = function(item) { if (this.query == '*') { return true; } else { return item.indexOf(this.query) >= 0; } }
		  	
	    	$(this).wrap('<div class="input-append">')
	    					.after('<div class="btn-group"><a class="btn dropdown-toggle"><span class="caret"></span></a></div>')
	    					.next()
	    					.click(function(e) {
	    						/* pause longer than bootstrap so the dropdown does cause the input field to lose focus 150 */
	    						setTimeout(function () {
										$(that).val('*').typeahead('lookup').val('');
									}, 160);
								});
		  };
		})(jQuery);
    
    </script>
	</head>
	<body>
		<div class="container showgrid">
			<p><br></p>
			<p>
				<input id="typeahead" class="span2" type="text">
			</p>

			<p>
				<input id="typeahead-combo" class="span2" type="text">
			</p>

			<p>
				<input id="typeahead-combo-ajax" class="span3" type="text">
			</p>


		</div>
	</body>
</html>