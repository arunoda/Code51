var code51={
		/**
		 * Contains the current controller path
		 * from the www root
		 */
		controller:"",
	
		/**
		 * AJAX request to the controller and get the response
		 */
		requestGet:function(method,params,callback,controller){
			if(!controller) controller=this.controller;
			var qryString=""
			for(index in params){
				qryString='&' + index + '=' + params[index];
			}
			var url=controller + 'service/' + method + '/' + qryString;
			$.get(url,callback);
		},
		
		requestPost:function(method,params,callback,controller){
			if(!controller) controller=this.controller;
			var url=controller + 'service/' + method + '/' ;
			$.post(url,params,callback);
		},
};