$(document).ready(function () {
	
	changesection('1')
	
});


function generate_short_url()
{
	let long_url=$('#url').val();
	
    var data = 'long_url=' + long_url;
	$.ajax({
		type: "POST",
		url: "welcome/generate_short_url",
		data: data,
		success: function (data) 
		{
			$("#response").text('');
			$("#response").text(data.response);
			$('#msg').css('display','block');

		},
		error: function (jqXHR, exception) 
		{
			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
		complete: function (data) 
		{

		},
	});


}


function reterive_orginal_url()
{
	let short_url=$('#ShortUrl').val();
	
    var data = 'short_url=' + short_url;
	$.ajax({
		type: "POST",
		url: "welcome/reterive_orginal_url",
		data: data,
		success: function (data) 
		{
			$("#response").text('');
			$("#response").text(data.response);
			$('#msg').css('display','block');

		},
		error: function (jqXHR, exception) 
		{
			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
		complete: function (data) 
		{

		},
	});


}

function changesection(id) 
{
	$('#msg').css('display','none');
	var data = 'id=' + id;
	$.ajax({
		type: "POST",
		url: "welcome/get_sec_det",
		data: data,
		success: function (data) 
		{
			$("#report_section").html('');
			$("#report_section").html(data.report);

		},
		error: function (jqXHR, exception) 
		{
			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404]';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {
				msg = 'Requested JSON parse failed.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			alert(msg);
		},
		complete: function (data) 
		{

		},
	});


}


