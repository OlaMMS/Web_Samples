let dropdown = $('#locality-dropdown');

dropdown.empty();

dropdown.append('<option selected="true" disabled>اختر دولة</option>');
dropdown.prop('selectedIndex', 0);

const url = 'https://raw.githubusercontent.com/AnasSbeinati/A-list-of-countries-Arabic-names-and-codes-in-JSON/master/countries.json';

$.getJSON(url, function (data) {
	$.each(data, function (key, entry) {
		dropdown.append($('<option></option>').attr('value', entry.code).text(entry.name));
	})
});


$(document).ready(function() {
				$('#type').on('change.weight', function() {
					$("#weight").toggle($(this).val() == 'package');
				}).trigger('change.weight');
			});



