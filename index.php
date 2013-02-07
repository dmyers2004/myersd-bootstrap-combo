<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>HTML5 Basic Template</title>
		<link href="/assets/bootstrap/css/bootstrap.css" type="text/css" rel="stylesheet">
		<link href="/assets/bootstrap-combobox/css/bootstrap-combobox.css" type="text/css" rel="stylesheet">
		<link href="/assets/css/site.css" type="text/css" rel="stylesheet">

		<script type="text/javascript" src="/assets/js/jquery/jquery.1.8.2.js"></script>
		<script type="text/javascript" src="/assets/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="/assets/bootstrap-combobox/js/bootstrap-combobox.js"></script>
		<script type="text/javascript" src="/assets/js/site.js"></script>

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

			$('.typeahead-basic').typeahead({ source: jazz_musicians });
			
			for (var rec in jazz_musicians) {
				$('.combobox').append('<option value="'+jazz_musicians[rec]+'">'+jazz_musicians[rec]+'</option>');
			}

			$('.combobox').combobox();

			$('.typeahead-drop').typeahead({ 
				source: jazz_musicians,
				matcher : function (item) {
	        return true;
		    },
		    //avoid highlightning of "a"
		    highlighter: function (item) {
		        return "<div>"+item+"</div>"
		    }
			});

			$("#emu-select").click(function(){
			    //add something to ensure the menu will be shown
			    $(".typeahead-drop").val('a');
			    $(".typeahead-drop").typeahead('lookup');
			    $(".typeahead-drop").val('');
			});

			$('.more-typeahead-drop').typeahead({ 
				source: jazz_musicians
			});

			$("#emu-select2").click(function(){
		    //add something to ensure the menu will be shown
		    $(".more-typeahead-drop").val('a');
		    $(".more-typeahead-drop").typeahead('lookup');
		    $(".more-typeahead-drop").val('');
			});

			$('#more-typeahead-drop2').typeahead({ 
				source: jazz_musicians
			});
			
			$('#more-typeahead-drop2').combobox();

    });
    
    (function($){
		  $.fn.combobox = function(options) {
	    	var id = $(this).attr('id');
	    	$(this).wrap('<div class="input-append">').after('<div class="btn-group"><a id="typeaheadcombodropbutton' + id + '" class="btn dropdown-toggle"><span class="caret"></span></a></div>');
	
				$('#typeaheadcombodropbutton' + id).click(function(){
			    $('#'+id).val(' ').typeahead('lookup').val('');
				});
		  };
		})(jQuery);
    
    </script>
    <style>
			.typeahead { margin-top: 0 !important; }
		</style>
	</head>
	<body>
		<div class="container showgrid">

			<p>
				<div class="input-append">
					<input type="text" class="typeahead-basic">
				  <span class="add-on"><i class="icon-search"></i></span>
				</div>
			</p>
			
			<p>
				<select class="combobox">
				  <option></option>
				</select>
			</p>

			<p>
				<div class="input-append">
					<input type="text" class="typeahead-drop">
				  <span class="add-on" id="emu-select"><i class="icon-chevron-down"></i></span>
				</div>
			</p>

			<p>
			
			<div class="input-append">
			  <input class="span2 more-typeahead-drop" type="text">
			  <div class="btn-group">
			    <a id="emu-select2" class="btn dropdown-toggle">
			      <span class="caret"></span>
			    </a>
			  </div>
			</div>			
			
			</p>

			<p>
				<input id="more-typeahead-drop2" class="span2" type="text">
			</p>


		</div>
	</body>
</html>