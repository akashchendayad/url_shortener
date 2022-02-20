$(document).ready(function () {

	changesection('1');

});


function generate_short_url() {
	let long_url = $('#url').val();

	var data = 'long_url=' + long_url;
	$.ajax({
		type: "POST",
		url: "generate_short_url",
		data: data,
		success: function (data) {
			$("#response").html('');
			$("#response").html('<a target="_blank" href=' + data.response + '>' + data.response + '</a>');
			$('#msg').css('display', 'block');

		},
		error: function (jqXHR, exception) {
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
		
	});


}


function reterive_orginal_url() {
	let short_url = $('#ShortUrl').val();

	var data = 'short_url=' + short_url;
	$.ajax({
		type: "POST",
		url: "reterive_orginal_url",
		data: data,
		success: function (data) {
			$("#response").html('');
			$("#response").html('<a target="_blank" href=' + data.response + '>' + data.response + '</a>');
			$('#msg').css('display', 'block');

		},
		error: function (jqXHR, exception) {
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
		
	});


}

function changesection(id) {
	$('#msg').css('display', 'none');
	var data = 'id=' + id;
	$.ajax({
		type: "POST",
		url: "get_sec_det",
		data: data,
		success: function (data) {
			$("#report_section").html('');
			$("#report_section").html(data.report);
			if (id == 3) {
				$(document).ready(function () {
					$('#tble_urldata').DataTable({
						"ajax": {
							url: "get_tbldata",
							type: 'GET'
						},
						pageLength: 5,
						lengthMenu: [5, 10, 20, 30, 50]
					});
				});
			}

		},
		error: function (jqXHR, exception) {
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
		
	});


}