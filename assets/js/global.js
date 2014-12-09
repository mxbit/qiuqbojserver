window.jq = {};
window.jq.time_list = [];
window.jq.path = '';
window.jq.route = {};
window.jq.isHome = false;
for(var i=0; i<(24);i++)
{
	for(var j=0; j<4; j++){
		var mtime = getmytime(i);
		window.jq.time_list.push( getRound(mtime.t)+":"+getRound(j*15)+" "+ mtime.a )
	}
}
function getRound(num){
	return (num <= 9 ? "0"+num.toString() : num.toString())
}
function getmytime(num){
	var t =   ( num == 0 ? 12 : (num>12 ? (num-12) : num) );
	var ampm = num <12 ? "AM" : "PM" 
	return {t:t,a:ampm};
}
function createList(isToday,time)	{
	var populated = (isToday ? window.jq.time_list.slice(time) : window.jq.time_list);
	var option_str = ""
	for(var i=0; i<populated.length; i++)	{
		option_str += "<option>"+populated[i]+"</option>"
	}
	return option_str;
}
function createTimeList()	{
	var populated = window.jq.time_list;
	var option_str = ""
	for(var i=0; i<populated.length; i++)	{
		option_str += "<option>"+populated[i]+"</option>"
	}
	return option_str;	
}

