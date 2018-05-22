function ActionAjax(type,url,data,content, title, ajax, file){
	
	content = content || null;
	title = title || null;
	ajax = ajax || false;
	file = file || false;
	
	var returnfunction = true;
	var async = true;
	var cache = true;
	var contentType = 'application/x-www-form-urlencoded';
	var processData = true;

	if(ajax){async = false; async = false}
	if(file){contentType = ''; processData = false}
	
	$.ajax({
	 	
		type: type,
		url: url,
		data: data,
		async: async,
	    cache: cache,
	    contentType: contentType,
        processData: processData,

		success: function(returndata){
			
			if(content != null){
				
				$( content ).html(returndata);
			}
			
			if(ajax){
				
				returnfunction = returndata;
			}
			
			if(title != null){
				
				noty({text: title, layout: 'topCenter', type: 'success'});
				setTimeout(function() {$("#noty_topCenter_layout_container").fadeOut(1500);},3000);
				setTimeout(function() {$("ul").remove("#noty_topCenter_layout_container");},4000);
				//returnfunction = false;
			}

		},
		  
		error: function(XMLHttpRequest, textStatus, errorThrown) {
		  	
		  	noty({text: 'Error del servidor, imposible realizar la acción.', layout: 'topCenter', type: 'error'});
		  	setTimeout(function() {$("#noty_topCenter_layout_container").fadeOut(1500);},3000);
		  	setTimeout(function() {$("ul").remove("#noty_topCenter_layout_container");},4000);
			returnfunction = false;
		}
		   
	});
	
	return returnfunction;
}