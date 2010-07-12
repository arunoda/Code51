function Form(div,title){
	this.fieldList;
	this.set=function(fieldList){
		this.fieldList=fieldList;
	};
	
	this.draw=function(){
		var html="<div class='code51Form'>"+
			"<h3>"+title+"</h3>";
		for(index in this.fieldList){
			var field=this.fieldList[index];
			html+="<div class='lable'>"+field.label+"</div>";
			html+="<div class='input'>";
			if(field.type=='text'){
				html+=this.drawText(field);
			}else if(field.type=='label'){
				html+=this.drawLabel(field);
			}
			else if(field.type=='select'){
				html+=this.drawSelect(field);
			}
			html+="</div>";
		}
		
		$html="</div>";
		$('#'+div).html(html);
	}
	
	this.drawText=function(field){
		return "<input type='text' id='"+field.id+
			"' value='"+field.value+"' />";
	}
	
	this.drawLabel=function(field){
		return "<div id='"+field.id+"' class='textLabel'>"+
			field.value+"</div>";
	}
	
	this.drawSelect=function(field){
		var html="<select id='"+field.id+"'>";
		var options=field.options;
		for(index in options){
			html+="<option value='"+options[index]+"'>"+options[index]+"</option>";
		}
		html+="</select>";
		
		return html;
	}
}

var form=new Form('myDiv','The Title');