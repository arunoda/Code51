$(document).ready(function(){
	code51.requestGet("abc",{'param':1002},function(resp){
		alert(resp);
	});
	
	code51.requestPost('abc',{"param":1034},function(resp){
		alert(resp);
	});
});