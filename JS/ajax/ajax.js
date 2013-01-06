
$.ajax({
	type: "POST",
	url: "some.php",
	data: "name=John&location=Boston",
	async: "true",
	dataType: "json",
	complete : function(XMLHttpRequest, textStatus){
	},
	success: function(msg){
		alert( "Data Saved: " + msg );
	}
});