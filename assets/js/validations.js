
var currentPage = window.location.href;
function initialiseValidations()	{
 if(currentPage.indexOf('landing/maps') >= 0)    {

    $("#calendar_btn").click(function(event)	{
    	event.stopPropagation();
    });

    $("#save_btn").click(function(event)	{
    	event.preventDefault();
    	 var $form = $("#save_form");
    	 var validator = validateForm($form.serializeArray());
    	 if(validator.status)	{

            getReverseGeoAndSave(validator)
    	 	//console.log()
    	 }
    	 else	{
    	 	$.Notify({caption: "Please fill up all fields",content: (validator.item.name +" is requied."),timeout: 1500,style:{background: '#E82527', color: '#fff'}});
    	 }
    });
    
$("#save_form").submit(function(e){
        e.preventDefault();
    });    

    function validateForm(data)	{
    	for(var item in data)	{
    		if(data[item].value == "")	{
    			return {status:false,item:data[item]}
    		}
    		//console.log(data[item])
    	}
    	return {status:true,item:data}

    }

    function getReverseGeoAndSave(saveObj)    {
        var geo = window.jq.latlng;
        var resourceUrl = "http://nominatim.openstreetmap.org/reverse?format=json&";
        var geo_url = resourceUrl+ "lat="+geo.lat()+"&lon="+geo.lng()+'&zoom=12&email=info@mxbit.co.in';
        $.ajax({ type: "GET", url: geo_url }).done(function( msg ) {
            var address = (getBaseAddress(msg.address));
            saveObj.item.push( {name:'location_name', value: address} );
            saveJobData(saveObj)

        }).fail(function() {
            saveObj.item.push( {name:'location_name', value: window.jq.place_name} );
            saveJobData(saveObj);
        })

    }

    function saveJobData(saveObj)  {
    /*************************SAVING STARTS*****************************/
    $.ajax({ type: "POST", url: window.jq.path+'/jobs/save_job', data: saveObj.item }).done(function( msg ) {
        if(msg == 1)    {
            sweetAlert('', "Your information has been saved successfully.", "success");
            $("#save_form")[0].reset();
            $('#place_box').val(window.jq.place_name);
        }
        else    {
             sweetAlert('', "There are some problem in the server. Please try again.", "error");
        }

      });
    /*************************SAVING ENDS*****************************/
    }


    function getBaseAddress(address)  { 
        if(address.suburb)   return (address.suburb+(address.county ? ', '+address.county : '' ));
        else if(address.town) return (address.town+(address.state_district ? ', '+address.state_district : '' ));
        else if(address.village) return (address.village+(address.state_district ? ', '+address.state_district : '' ));
        else if(address.county) return address.county;
        else if(address.state_district) return address.state_district;
        else return window.jq.place_name;
    }

}
}


