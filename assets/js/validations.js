
var currentPage = window.location.href;
function initialiseValidations()	{
 if(currentPage.indexOf('landing/maps') >= 0)    {
 	console.log('Validate Job')

    $("#calendar_btn").click(function(event)	{
    	event.stopPropagation();
    });

    $("#save_btn").click(function(event)	{
    	event.preventDefault();
    	 var $form = $("#save_form");
    	 var validator = validateForm($form.serializeArray());
    	 if(validator.status)	{
    	 	console.log(validator.item)
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

}
}


