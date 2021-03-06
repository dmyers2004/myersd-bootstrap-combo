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

	$('#typeaheadcallback').combobox({ source: function(query, process) {
			return $.get('typeahead.php', { query: query }, function (data) {
				return process(data.options);
			});
		}
	});
	
	$('.combobox').combobox({ source: jazz_musicians });
	$('.selectcombo').selectcombobox();
});

/**
 * Convert Input into a ComboBox
 */
jQuery.fn.combobox = function(options){
	return this.each(function(){

  	var that = this;
		options = (options) ? options : {};

		jQuery(this).typeahead({
			source: options.source,
			highlighter: function (item) {
	  		return '<div>' + item + '</div>';
	  	},
	  	matcher: function(item) {
	  		if (this.query == '*') {
	  			return true;
	  		} else {
	  			return item.indexOf(this.query) >= 0;
	  		}
	  	}
		});

  	/* append on the drop arrow */
  	jQuery(this).wrap('<div class="input-append">')
			.after('<div class="btn-group"><a class="btn dropdown-toggle"><span class="caret"></span></a></div>')
			.next()
			.click(function(e) {
				/* pause longer than bootstrap so the dropdown does cause the input field to lose focus 150 */
				setTimeout(function () {
					jQuery(that).val('*').typeahead('lookup').val('');
				}, 160);
		});
  });
};

/**
 * Convert Select into a ComboBox
 */
jQuery.fn.selectcombobox = function(options){
	return this.each(function(){
		var select = jQuery(this);

  	var options = new Array();
		jQuery('option',this).each(function(i){
			options[i] = jQuery(this).text();
		});

		var customclass = 'combopop' + Math.random().toString(36).substring(7);

  	select.after('<input type="text" class="' + customclass + ' ' +(select.attr('class') || '')+'" value="' + jQuery('option:selected',this).text() + '" placeholder="'+(select.attr('placeholder') || '')+'" id="'+(select.attr('id') || '')+'" name="'+select.attr('name')+'">').remove();

		/* call combobox */
		jQuery('.' + customclass).combobox({ source: options });
  });
};
