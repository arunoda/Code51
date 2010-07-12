function Code51(){
		/**
		 * Where the site is located from the Web root
		 */
		this.siteRoot="/";
		
		/**
		 * The current using module
		 */
		this.module="";
		
		/**
		 * The current using controller
		 */
		this.controller="";
		
		/**
		 * AJAX request to the controller and get the response 
		 * @param method method in the controller
		 * @param params request parameters
		 * @param callback function to be callback with the response
		 * @param config sets module and controller for advanced calling of webservices
		 * but the default one would be the current controller;
		 */
		this.requestGet=function(method,params,callback,config){
			var qryString=""
			for(index in params){
				qryString+='&' + index + '=' + params[index];
			}
			var webService=this.getWebServiceURL(config);
			var url=webService + method + '/' + qryString;
			var strFunc=$.globalFunction(callback);
			var modifiedCallback=$.dynamicFunction(
					"var resp;"+
					"eval('resp='+response);"+
					strFunc+"(resp);"
					,true);
			$.get(url,modifiedCallback);
		};
		
		this.requestPost=function(method,params,callback,config){
			var webService=this.getWebServiceURL(config);
			var url=webService + method + '/' ;
			$.post(url,params,callback);
		};
		
		this.getWebServiceURL=function(config){
			var module=(config && config.module)?config.module:this.module;
			var controller=(config && config.controller)?config.controller:this.controller;
			return this.siteRoot + module+"/" + controller + "/service/";
		};
		
}

var code51=new Code51();