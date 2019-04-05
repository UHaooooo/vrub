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

									$('#oldVehicleEngineNo').val(results[0].engine_number);
									$('#oldVehicleChassisNo').val(results[0].chassis_number);
									$('#oldVehicleProductionYear').val(results[0].production_year);
									$('#oldVehicleOriginalStatus').val(getOriginalStatusText(results[0].original_status));
									$('#oldVehicleEngineCapacity').val(results[0].engine_capacity);
									$('#oldVehicleNumberOfSeat').val(results[0].number_of_seat);
									$('#oldVehicleColor').val(results[0].color);
									$('#oldVehicleFuelType').val(getFuelTypeText(results[0].fuel_type));
									$('#oldVehiclePurpose').val(results[0].purpose);
									$('#oldVehicleBrand').val(results[0].brand);
									$('#oldVehicleModel').val(results[0].model);
									$('#oldVehicleType').val(results[0].vehicle_type);
									$('#oldVehicleLadenWeight').val(results[0].laden_weight);
									$('#oldVehicleUnladenWeight').val(results[0].unladen_weight);
									$('#oldVehicleKerbWeight').val(results[0].kerb_weight);

									$('#div-old-vehicle-info-1').hide();
									$('#div-old-vehicle-info-2').show();
									$('#div-vehicle-info').show();
									$('#div-new-owner-info').show();
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

	$("#get-new-owner-info-btn").on("click", function () {
		var newOwnerCategory = $("#newOwnerCategoryOption option:selected").val();
		var newIDNumberToSearch = removeWhitespaceAndDash($("#newIDNumberToSearch").val());

		if (newIDNumberToSearch != '' && newIDNumberToSearch != null) {
			switch (newOwnerCategory) {
				case '1':
					$.ajax({
						url: apiURL + "citizens?identification_number=" + newIDNumberToSearch,
						type: 'GET',
						contentType: 'application/json',
						beforeSend: function () {
							$("#newOwnerCategory").attr("disabled", "disabled");
							$("#newIDNumberToSearch").attr("disabled", "disabled");
							$("#get-new-owner-info-btn").attr("disabled", "disabled");
							$("#get-new-owner-info-btn-spinner").show();
						},
						success: function (results) {

							$("#newOwnerCategory").removeAttr("disabled");
							$("#newIDNumberToSearch").removeAttr("disabled");
							$("#get-new-owner-info-btn").removeAttr("disabled");
							$("#get-new-owner-info-btn-spinner").hide();

							if (results.length < 1) {
								displayAlert("Information not found! Please make sure identification number is entered correclty", "danger");
								scrollToTop();
							} else {
								$('.alert').alert('close');

								$('#div-new-owner-info-1').hide();
								$('#newOwnerName').attr('data-id', results[0].id);
								$('#newOwnerName').val(results[0].name);
								$('#newOwnerCategory').val(getOwnerCategoryText(ownerCategory));
								$('#newOwnerIDNumber').val(results[0].identification_number);
								$('#newOwnerAddress').val(results[0].address);
								$('#newOwnerPostalCode').val(results[0].postcode);
								$('#newOwnerCity').val(results[0].city);
								$('#newOwnerState').val(results[0].state);

								$('#div-new-owner-info-2').show();
								$('#div-submit-reset').show();
							}
						},
						error: function (error) {
							console.log(error);

							$("#newOwnerCategory").removeAttr("disabled");
							$("#newIDNumberToSearch").removeAttr("disabled");
							$("#get-new-owner-info-btn").removeAttr("disabled");
							$("#get-new-owner-info-btn-spinner").hide();

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
		var transferVehicleID = $('#oldVehicleRegistrationNo').attr('data-id');
		var transferOldOwnerID = $('#ownerName').attr('data-id');
		var transferNewOwnerID = $('#newOwnerName').attr('data-id');

		transferOwner(transferVehicleID, transferOldOwnerID, transferNewOwnerID, function (err, results) {
			console.log(err, results);
			if (err != null) {
				displayAlert("Error transfer ownership. Please try again later.", "danger");
				scrollToTop();
			} else {
				alert('Transfer Success!');
				window.location.reload();
			}
		})
	});
});