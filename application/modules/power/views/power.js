var table=new Table('myTable');
$(document).ready(function(){
	table.setHeading([
		{name:"head1",title:"Name",width:400},
		{name:"head2",title:"Title",width:300}
	]);
	table.draw();
	table.loadRows([
	                ["Arunoda Susiripala","Chairman"],
	                ["Nadee Anuththara","HR Manager"]
	                ]);
	
	table.onRowClick(function(resp){
		console.log(table.getRow(resp.id));
		table.deleteRows([resp.id]);
	});
	
});
