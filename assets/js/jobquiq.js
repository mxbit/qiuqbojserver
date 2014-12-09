
$(document).ready(function()	{

var currentPage = window.location.href;

	if(currentPage.indexOf('landing/maps') >= 0)	{
		//Google Map
		var mapHeight = $(document).height()-(180+110+80);
		$("#map-canvas").height(mapHeight)
		//Invoking a method in gpam.js
		initializeGoogleMap()
		$('#place_box').typeahead( {ajax: 'http://localhost/teletaxi/teletaxiweb/index.php/booking/get_outstation_town',
		 displayField:'place_name', 
		 onSelect: function(item){
		 	//Invoking a method in gpam.js
		 	codeAddress(item.text)
		   }
		 });

		//date picker
		 $("#datepicker").datepicker({format: "dd/mm/yyyy"});
		 //Time
		 var timeOptions = createTimeList();
		 $("#fromTime").html(timeOptions);
		 $("#toTime").html(timeOptions);

	}

	// inovking validators
	initialiseValidations();

})












