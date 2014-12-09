$(function(){
	try	{
		if($(".chosen-select,.chosen-multiple-select"))	{
			$(".chosen-select,.chosen-multiple-select").chosen({allow_single_deselect:true});	
		}
		else	{
			return;
		}
	}
	catch(e)	{console.log(e)}

});