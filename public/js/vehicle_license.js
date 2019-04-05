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

								$('#div-old-vehicle-info').show();
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

	$('#get-old-vehicle-info-btn').on('click', function () {
		var registrationNumberToSearch = removeWhitespaceAndDash($("#registrationNumberToSearch").val());

		if (registrationNumberToSearch != '' && registrationNumberToSearch != null) {

			$.ajax({
				url: apiURL + 'vehicles?vehicle_registration_number=' + registrationNumberToSearch,
				type: 'GET',
				contentType: 'application/json',
				beforeSend: function () {
					$("#registrationNumberToSearch").attr("disabled", "disabled");
					$("#get-old-vehicle-info-btn").attr("disabled", "disabled");
					$("#get-old-vehicle-info-btn-spinner").show();
				},
				success: function (results) {
					if (results != null && results.length > 0) {
						var vehicle_ID = results[0].id;

						getOwnerID(vehicle_ID.toString(), function (err, contract_results) {
							if (contract_results != "0x08c379a000000000000000000000000000000000000000000000000000000000") {
								var rawOwnerID = web3.toAscii(contract_results);

								ownerID = rawOwnerID.replace(/\u0000/g, '');

								if ($('#ownerName').attr('data-id') == ownerID) {

									var areaIDToSearch = $("#registrationAreaOption option:selected").val();

									$('#div-registration-area-option').hide();
									$('#oldVehicleRegistrationNo').val(results[0].vehicle_registration_number.registration_number);

									$('#oldVehicleRegistrationNo').attr('data-id', vehicle_ID);

									$('#div-old-vehicle-info-1').hide();
									$('#div-old-vehicle-info-2').show();
									$('#div-vehicle-info').show();

									getInsuranceInfo();
									getLicenseInfo();

								} else {
									$("#registrationNumberToSearch").removeAttr('disabled');
									$("#get-old-vehicle-info-btn").removeAttr('disabled');
									$("#get-old-vehicle-info-btn-spinner").hide();

									displayAlert("Vehicle not belong to this owner! Please make sure identification number is entered correclty", "danger");
									scrollToTop();
								}
							} else {
								$("#registrationNumberToSearch").removeAttr('disabled');
								$("#get-old-vehicle-info-btn").removeAttr('disabled');
								$("#get-old-vehicle-info-btn-spinner").hide();

								displayAlert("Vehicle not found! Please make sure identification number is entered correclty", "danger");
								scrollToTop();
							}
						});
					} else {
						$("#registrationNumberToSearch").removeAttr('disabled');
						$("#get-old-vehicle-info-btn").removeAttr('disabled');
						$("#get-old-vehicle-info-btn-spinner").hide();

						displayAlert("Vehicle not found! Please make sure identification number is entered correclty", "danger");
						scrollToTop();
					}
				},
				error: function (error) {

				}
			});
		}
	});
});

function getInsuranceInfo() {
	var vehicle_id = $('#oldVehicleRegistrationNo').attr('data-id');

	$.ajax({
		url: apiURL + 'vehicle_insurances?vehicle_id=' + vehicle_id,
		type: 'GET',
		success: function (results) {
			console.log(results);

			if (results.length > 0) {
				$('#vehicleInsuranceCommencementDate').val(results[0].commencement_date);
				$('#vehicleInsuranceExpiryDate').val(results[0].expiry_date);
				$('#vehicleInsuranceStatus').val(results[0].status);

				$('#div-vehicle-insurance-info').show();

			} else {
				displayAlert("Error Getting Vehicle License Information! Please Try Again Later!", "danger");
				scrollToTop();
			}
		},
		error: function (error) {
			console.log(error);

			displayAlert("Error Getting Vehicle License Information! Please Try Again Later!", "danger");
			scrollToTop();
		}
	});
}

function getLicenseInfo() {
	var vehicle_id = $('#oldVehicleRegistrationNo').attr('data-id');

	$.ajax({
		url: apiURL + 'vehicle_licenses?vehicle_id=' + vehicle_id,
		type: 'GET',
		success: function (results) {
			console.log(results);

			if (results.length > 0) {
				$('#vehicleLicenseCommencementDate').val(results[0].commencement_date);
				$('#vehicleLicenseExpiryDate').val(results[0].expiry_date);
				$('#vehicleLicenseStatus').val(results[0].status);

				$('#div-vehicle-license-info').show();
				

			} else {
				displayAlert("Error Getting Vehicle License Information! Please Try Again Later!", "danger");
				scrollToTop();
			}
		},
		error: function (error) {
			console.log(error);

			displayAlert("Error Getting Vehicle License Information! Please Try Again Later!", "danger");
			scrollToTop();
		}
	});
}