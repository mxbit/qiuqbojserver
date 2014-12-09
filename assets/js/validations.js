
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
            
            $.ajax({ type: "POST", url: window.jq.path+'/jobs/save_job', data: validator.item }).done(function( msg ) {
                if(msg == 1)    {
                    sweetAlert('', "Your information has been saved successfully.", "success");
                    $("#save_form")[0].reset()
                }
                else    {
                     sweetAlert('', "There are some problem in the server. Please try again.", "error");
                }

              });

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

}
}


