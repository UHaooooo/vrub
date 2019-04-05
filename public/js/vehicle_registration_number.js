$(document).ready(function () {
	$("#get-owner-info-btn").on("click", function () {
		var ownerCategory = $("#ownerCategoryOption option:selected").val();
		var IDNumberToSearch = removeWhitespaceAndDash($("#IDNumberToSearch").val());

		if (IDNumberToSearch != '' && IDNumberToSearch != null) {
			switch (ownerCategory) {
				case '1':
					$.ajax({
						url: apiURL + "citizens?identification_number=" + IDNumberToSearch,
						type: 'GET',
						contentType: 'application/json',
						beforeSend: function () {
							$("#ownerCategory").attr("disabled", "disabled");
							$("#IDNumberToSearch").attr("disabled", "disabled");
							$("#get-owner-info-btn").attr("disabled", "disabled");
							$("#get-owner-info-btn-spinner").show();
						},
						success: function (results) {

							$("#ownerCategory").removeAttr("disabled");
							$("#IDNumberToSearch").removeAttr("disabled");
							$("#get-owner-info-btn").removeAttr("disabled");
							$("#get-owner-info-btn-spinner").hide();

							if (results.length < 1) {
								displayAlert("Information not found! Please make sure identification number is entered correclty", "danger");
								scrollToTop();
							} else {
								$('.alert').alert('close');

								$('#div-owner-info-1').hide();
								$('#ownerName').attr('data-id', results[0].id);
								$('#ownerName').val(results[0].name);
								$('#ownerCategory').val(getOwnerCategoryText(ownerCategory));
								$('#ownerIDNumber').val(results[0].identification_number);
								$('#ownerAddress').val(results[0].address);
								$('#ownerPostalCode').val(results[0].postcode);
								$('#ownerCity').val(results[0].city);
								$('#ownerState').val(results[0].state);

								$('#confirmOwnerName').val(results[0].name);
								$('#confirmOwnerCategory').val(getOwnerCategoryText(ownerCategory));
								$('#confirmOwnerIDNumber').val(results[0].identification_number);
								$('#confirmOwnerAddress').val(results[0].address);
								$('#confirmOwnerPostalCode').val(results[0].postcode);
								$('#confirmOwnerCity').val(results[0].city);
								$('#confirmOwnerState').val(results[0].state);

								$('#div-owner-info-2').show();
								$('#div-submit-reset').show();

								$('#div-tender-section').show();

								getTenderSessions();

							}
						},
						error: function (error) {
							console.log(error);

							$("#ownerCategory").removeAttr("disabled");
							$("#IDNumberToSearch").removeAttr("disabled");
							$("#get-owner-info-btn").removeAttr("disabled");
							$("#get-owner-info-btn-spinner").hide();

							displayAlert("Error getting information. Please try again later.", "danger");
							scrollToTop();
						}
					});
					break;
				default:
					break;
			}
		}
	});

	$('#submit-form-btn').on('click', function () {
		var prefix = $('#tenderSessionOption option:selected').attr('data-area-prefix');
		var tender_number = parseInt($('#tenderNumber').val());
		var tender_amount = $('#tenderAmount').val();
console.log(  $('#tenderSessionOption option:selected').val());
		if (tender_amount != '' && tender_number != '' && tender_number >= 1 && tender_number <= 9999 && tender_amount > 0) {
			$.ajax({
				url: apiURL + 'tenders',
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify({
					registration_number: prefix + tender_number.toString(),
					tender_session_id: $('#tenderSessionOption option:selected').val(),
					citizen_id: $('#ownerName').attr('data-id'),
					tender_amount: tender_amount,
					paid_amount: tender_amount / 2,
				}),
				success: function (results) {
					alert('Tender Success');
					window.location.reload();
				},
				error: function (results) {
					alert('Tender Fail');
				}
			});
		}
	});
});

function getTenderSessions() {
	$.ajax({
		url: apiURL + 'tenderSessions',
		type: 'GET',
		beforeSend: function () {
			$('#tenderSessionOption').attr('disabled', 'disabled');
		},
		success: function (results) {

			if (results.length > 0) {
				for (var i = 0; i < results.length; i++) {
					$('#tenderSessionOption').append($('<option>', { 'value': results[i].id, 'data-area-id': results[i].area_id, 'data-area-prefix': results[i].name.split('1')[0] }).text(results[i].name));
				}
			} else {
				displayAlert("No Tender Sessions found!", "danger");
				scrollToTop();
			}

			$('#tenderSessionOption').removeAttr('disabled');
		},
		error: function (error) {
			displayAlert("Error getting Tender Sessions! Please Try again later!", "danger");
			scrollToTop();
			$('#tenderSessionOption').removeAttr('disabled');
		}
	});
}