$("#create-button").on("click", function(event){
	event.preventDefault();
	var url = $(this).attr('href');
	$("#mymodal").modal("show");

	send(url);
});


function send(_url, formData = null) {
	$.ajax({
		url: _url,
		type: "POST",
		dataType: 'json',
		data: formData,
		success: function (data){
			console.log(data);
		}
	});
}