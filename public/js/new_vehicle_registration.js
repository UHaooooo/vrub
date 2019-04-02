var application_type;

$(document).ready(function () {
	// 1. Choose Application Type
	$(".application-type-btn").on("click", function () {
		// Hide the part to choose application type
		$("#div-choose-app-type").hide();

		// Show the part that display application type
		$('#applicationType').val(getApplicationTypeText($(this).attr('data-type')));
		application_type = $(this).attr('data-type');
		$("#div-show-app-type").show();

		// Show div that contain submit and reset button
		$("#div-owner-info").show();

		// Show div that contain submit and reset button
		$("#div-submit-reset").show();
	});

	// 2. Choose Owner
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

								setupVehicleSection();
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

	// 3. Get Old Vehicle Information
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

									getLatestRunningNumberByArea(areaIDToSearch, $('#oldVehicleRegistrationNo'));

									$('#div-registration-area-option').hide();
									$('#vehicleRegistrationNo').html($('<option>', { 'value': results[0].vehicle_registration_number.id }).text(results[0].vehicle_registration_number.registration_number));

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

	// 4. Submit form
	$('#submit-form-btn').on('click', function () {
		var vehicleRegistrationNo = $("#vehicleRegistrationNo option:selected").text();
		var vehicleEngineNo = $("#vehicleEngineNo").val();
		var vehicleChassisNo = $("#vehicleChassisNo").val();
		var vehicleProductionYear = $("#vehicleProductionYear").val();
		var vehicleOriginalStatus = $("#vehicleOriginalStatus option:selected").val();
		var vehicleEngineCapacity = $("#vehicleEngineCapacity").val();
		var vehicleNumberOfSeat = $("#vehicleNumberOfSeat").val();
		var vehicleColor = $("#vehicleColor").val();
		var vehicleFuelType = $("#vehicleFuelType option:selected").val();
		var vehiclePurpose = $("#vehiclePurpose").val();
		var vehicleBrand = $("#vehicleBrand").val();
		var vehicleModel = $("#vehicleModel").val();
		var vehicleType = $("#vehicleType").val();
		var vehicleLadenWeight = $("#vehicleLadenWeight").val();
		var vehicleUnladenWeight = $("#vehicleUnladenWeight").val();
		var vehicleKerbWeight = $("#vehicleKerbWeight").val();

		if (removeWhitespaceAndDash(vehicleEngineNo) != '' && removeWhitespaceAndDash(vehicleChassisNo) != '' && removeWhitespaceAndDash(vehicleProductionYear) != '' && removeWhitespaceAndDash(vehicleEngineCapacity) != '' && removeWhitespaceAndDash(vehicleNumberOfSeat) != '' && removeWhitespaceAndDash(vehicleColor) != '' && removeWhitespaceAndDash(vehiclePurpose) != '' && removeWhitespaceAndDash(vehicleBrand) != '' && removeWhitespaceAndDash(vehicleModel) != '' && removeWhitespaceAndDash(vehicleType) != '' && removeWhitespaceAndDash(vehicleLadenWeight) != '' && removeWhitespaceAndDash(vehicleUnladenWeight) != '' && removeWhitespaceAndDash(vehicleKerbWeight) != '') {

			$('#confirmVehicleRegistrationNo').val(vehicleRegistrationNo);
			$('#confirmVehicleEngineNo').val(vehicleEngineNo);
			$('#confirmVehicleChassisNo').val(vehicleChassisNo);
			$('#confirmVehicleProductionYear').val(vehicleProductionYear);
			$('#confirmVehicleOriginalStatus').val(getOriginalStatusText(vehicleOriginalStatus));
			$('#confirmVehicleEngineCapacity').val(vehicleEngineCapacity);
			$('#confirmVehicleNumberOfSeat').val(vehicleNumberOfSeat);
			$('#confirmVehicleColor').val(vehicleColor);
			$('#confirmVehicleFuelType').val(getFuelTypeText(vehicleFuelType));
			$('#confirmVehiclePurpose').val(vehiclePurpose);
			$('#confirmVehicleBrand').val(vehicleBrand);
			$('#confirmVehicleModel').val(vehicleModel);
			$('#confirmVehicleType').val(vehicleType);
			$('#confirmVehicleLadenWeight').val(vehicleLadenWeight);
			$('#confirmVehicleUnladenWeight').val(vehicleUnladenWeight);
			$('#confirmVehicleKerbWeight').val(vehicleKerbWeight);

			$('#div-confirm-application-type').show();
			$('#div-confirm-owner-info').show();
			$('#div-confirm-vehicle-info').show();

			if (application_type == '01' || application_type == '03') {
				var oldVehicleRegistrationNo = $("#oldVehicleRegistrationNo option:selected").text();
				var oldVehicleEngineNo = $("#oldVehicleEngineNo").val();
				var oldVehicleChassisNo = $("#oldVehicleChassisNo").val();
				var oldVehicleProductionYear = $("#oldVehicleProductionYear").val();
				var oldVehicleOriginalStatus = $("#oldVehicleOriginalStatus option:selected").val();
				var oldVehicleEngineCapacity = $("#oldVehicleEngineCapacity").val();
				var oldVehicleNumberOfSeat = $("#oldVehicleNumberOfSeat").val();
				var oldVehicleColor = $("#oldVehicleColor").val();
				var oldVehicleFuelType = $("#oldVehicleFuelType option:selected").val();
				var oldVehiclePurpose = $("#oldVehiclePurpose").val();
				var oldVehicleBrand = $("#oldVehicleBrand").val();
				var oldVehicleModel = $("#oldVehicleModel").val();
				var oldVehicleType = $("#oldVehicleType").val();
				var oldVehicleLadenWeight = $("#oldVehicleLadenWeight").val();
				var oldVehicleUnladenWeight = $("#oldVehicleUnladenWeight").val();
				var oldVehicleKerbWeight = $("#oldVehicleKerbWeight").val();

				$('#confirmOldVehicleRegistrationNo').val(oldVehicleRegistrationNo);
				$('#confirmOldVehicleEngineNo').val(oldVehicleEngineNo);
				$('#confirmOldVehicleChassisNo').val(oldVehicleChassisNo);
				$('#confirmOldVehicleProductionYear').val(oldVehicleProductionYear);
				$('#confirmOldVehicleOriginalStatus').val(getOriginalStatusText(oldVehicleOriginalStatus));
				$('#confirmOldVehicleEngineCapacity').val(oldVehicleEngineCapacity);
				$('#confirmOldVehicleNumberOfSeat').val(oldVehicleNumberOfSeat);
				$('#confirmOldVehicleColor').val(oldVehicleColor);
				$('#confirmOldVehicleFuelType').val(getFuelTypeText(oldVehicleFuelType));
				$('#confirmOldVehiclePurpose').val(oldVehiclePurpose);
				$('#confirmOldVehicleBrand').val(oldVehicleBrand);
				$('#confirmOldVehicleModel').val(oldVehicleModel);
				$('#confirmOldVehicleType').val(oldVehicleType);
				$('#confirmOldVehicleLadenWeight').val(oldVehicleLadenWeight);
				$('#confirmOldVehicleUnladenWeight').val(oldVehicleUnladenWeight);
				$('#confirmOldVehicleKerbWeight').val(oldVehicleKerbWeight);

				$('#div-confirm-old-vehicle-info').show();
			}

			$("#confirmationModal").modal({ backdrop: 'static', keyboard: false });
		}
	});

	// 5. Confirm Submit Form
	$('#confirm-submit-form-btn').on('click', function () {
		var ownerID = $('#ownerName').attr('data-id');
		var vehicleRegistrationNo = $("#vehicleRegistrationNo option:selected").val();
		var vehicleEngineNo = $("#vehicleEngineNo").val();
		var vehicleChassisNo = $("#vehicleChassisNo").val();
		var vehicleProductionYear = $("#vehicleProductionYear").val();
		var vehicleOriginalStatus = $("#vehicleOriginalStatus option:selected").val();
		var vehicleEngineCapacity = $("#vehicleEngineCapacity").val();
		var vehicleNumberOfSeat = $("#vehicleNumberOfSeat").val();
		var vehicleColor = $("#vehicleColor").val();
		var vehicleFuelType = $("#vehicleFuelType option:selected").val();
		var vehiclePurpose = $("#vehiclePurpose").val();
		var vehicleBrand = $("#vehicleBrand").val();
		var vehicleModel = $("#vehicleModel").val();
		var vehicleType = $("#vehicleType").val();
		var vehicleLadenWeight = $("#vehicleLadenWeight").val();
		var vehicleUnladenWeight = $("#vehicleUnladenWeight").val();
		var vehicleKerbWeight = $("#vehicleKerbWeight").val();

		if (application_type == '01' || application_type == '03') {
			var newVehicleRegistrationNo = $("#oldVehicleRegistrationNo option:selected").val();
			var vehicleIDToReplaceRegistrationNo = $("#oldVehicleRegistrationNo").attr('data-id');

			$.ajax({
				url: apiURL + 'changeVehicleRegistrationNumber/' + vehicleIDToReplaceRegistrationNo,
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify({
					new_registration_number_id: newVehicleRegistrationNo,
					registration_number_id: vehicleRegistrationNo,
					engine_number: vehicleEngineNo,
					chassis_number: vehicleChassisNo,
					production_year: vehicleProductionYear,
					original_status: vehicleOriginalStatus,
					engine_capacity: vehicleEngineCapacity,
					number_of_seat: vehicleNumberOfSeat,
					color: vehicleColor,
					fuel_type: vehicleFuelType,
					purpose: vehiclePurpose,
					brand: vehicleBrand,
					model: vehicleModel,
					vehicle_type: vehicleType,
					laden_weight: vehicleLadenWeight,
					unladen_weight: vehicleUnladenWeight,
					kerb_weight: vehicleKerbWeight
				}),
				beforeSend: function () {
					$('#confirm-submit-form-btn-spinner').show();
					$('#confirm-submit-form-btn').attr('disabled', 'disabled');
					$('#confirm-close-form-btn').attr('disabled', 'disabled');
				},
				success: function (results) {
					console.log(results);

					register(results.id.toString(), ownerID, function (err, contract_results) {
						console.log(err, contract_results);

						if (err != null) {
							revertFailedChangeRegistrationNumber(results.id, vehicleIDToReplaceRegistrationNo, newVehicleRegistrationNo, vehicleRegistrationNo);

							$('#confirm-submit-form-btn-spinner').hide();
							$('#confirm-submit-form-btn').removeAttr('disabled');
							$('#confirm-close-form-btn').removeAttr('disabled');
							$('#confirmationModal').modal('hide');

							displayAlert("Error registering. Please reset form and try again later.", "danger");
							scrollToTop();

						} else {
							window.open('https://ropsten.etherscan.io/tx/' + contract_results);
						}
					});
				},
				error: function () {

				}
			});
		} else {
			$.ajax({
				url: apiURL + "vehicles",
				type: 'POST',
				contentType: 'application/json',
				data: JSON.stringify({
					registration_number_id: vehicleRegistrationNo,
					engine_number: vehicleEngineNo,
					chassis_number: vehicleChassisNo,
					production_year: vehicleProductionYear,
					original_status: vehicleOriginalStatus,
					engine_capacity: vehicleEngineCapacity,
					number_of_seat: vehicleNumberOfSeat,
					color: vehicleColor,
					fuel_type: vehicleFuelType,
					purpose: vehiclePurpose,
					brand: vehicleBrand,
					model: vehicleModel,
					vehicle_type: vehicleType,
					laden_weight: vehicleLadenWeight,
					unladen_weight: vehicleUnladenWeight,
					kerb_weight: vehicleKerbWeight
				}),
				beforeSend: function () {
					$('#confirm-submit-form-btn-spinner').show();
					$('#confirm-submit-form-btn').attr('disabled', 'disabled');
					$('#confirm-close-form-btn').attr('disabled', 'disabled');
				},
				success: function (results) {
					console.log(results);

					register(results.id.toString(), ownerID, function (err, contract_results) {
						console.log(err, contract_results);

						if (err != null) {
							deleteFailedRegistration(results.id, vehicleRegistrationNo);

							$('#confirm-submit-form-btn-spinner').hide();
							$('#confirm-submit-form-btn').removeAttr('disabled');
							$('#confirm-close-form-btn').removeAttr('disabled');
							$('#confirmationModal').modal('hide');

							displayAlert("Error registering. Please reset form and try again later.", "danger");
							scrollToTop();

						} else {
							window.open('https://ropsten.etherscan.io/tx/' + contract_results);
						}
					});
				},
				error: function (error) {
					console.log(error);

					$('#confirm-submit-form-btn-spinner').hide();
					$('#confirm-submit-form-btn').removeAttr('disabled');
					$('#confirm-close-form-btn').removeAttr('disabled');
					$('#confirmationModal').modal('hide');

					displayAlert("Error registering. Please reset form and try again later.", "danger");
					scrollToTop();
				}
			});
		}
	});

	// Choose Vehicle Registration Area
	$("#registrationAreaOption").on('change', function () {
		getLatestRunningNumberByArea(this.value, $('#vehicleRegistrationNo'));
	});

	// Choose Vehicle Registration Area
	$("#oldRegistrationAreaOption").on('change', function () {
		getLatestRunningNumberByArea(this.value, $('#oldVehicleRegistrationNo'));
	});

	// Reset Form
	$('#reset-form-btn').on('click', function () {
		window.location.reload();
	});
});

// Setup Vehicle Information Section or/and Old Vehicle Information Section
function setupVehicleSection() {
	$('#submit-form-btn').show();

	switch (application_type) {
		case '00':
			$('#div-vehicle-info').show();

			var areaIDToSearch = $("#registrationAreaOption option:selected").val();

			getLatestRunningNumberByArea(areaIDToSearch, $('#vehicleRegistrationNo'));

			break;
		case '01':
			$('#div-old-vehicle-info').show();
			break
		case '02':
			$('#div-vehicle-info').show();
			break
		case '03':
			$('#div-old-vehicle-info').show();
			break
	}
}

// Get Latest Running Number for given area and setup the select option
function getLatestRunningNumberByArea(area_id, selection_to_setup) {
	$.ajax({
		url: apiURL + "areas/latest_number?area_id=" + area_id,
		type: 'GET',
		contentType: 'application/json',
		beforeSend: function () {
			selection_to_setup.attr('disabled', 'disabled');
		},
		success: function (results) {
			if (results.data.length < 1) {
				displayAlert("Error getting running number. Please try again later.", "danger");
				scrollToTop();
			} else {
				var latestNumber = results.data[0].latestVehicleRegistrationNumber;

				selection_to_setup.html($('<option>', { 'value': latestNumber.id }).text(latestNumber.registration_number));

				selection_to_setup.removeAttr('disabled');
			}
		},
		error: function (error) {
			console.log(error);

			displayAlert("Error getting running number. Please try again later.", "danger");
			scrollToTop();
		}
	});
}

function deleteFailedRegistration(id, registration_number_id) {
	$.ajax({
		url: apiURL + "vehicles/" + id,
		type: 'DELETE',
		contentType: 'application/json',
		data: JSON.stringify({
			registration_number_id: registration_number_id,
		}),
		success: function (results) {
			console.log(results);
		},
		error: function (error) {
			console.log(error);
		}
	});
}

function revertFailedChangeRegistrationNumber(newVehicleID, oldVehicleID, newVehicleRegistrationNo, oldVehicleRegistrationNo) {
	$.ajax({
		url: apiURL + 'revertChangeVehicleRegistrationNumber/' + oldVehicleID,
		type: 'POST',
		contentType: 'application/json',
		data: JSON.stringify({
			new_registration_number_id: newVehicleRegistrationNo,
			id_to_delete: newVehicleID,
			registration_number_id: oldVehicleRegistrationNo,
		}),
		success: function (results) {
			console.log(results);
		},
		error: function (error) {
			console.log(error);
		}
	});
}