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
							console.log(results);

							$("#ownerCategory").removeAttr("disabled", "disabled");
							$("#IDNumberToSearch").removeAttr("disabled", "disabled");
							$("#get-owner-info-btn").removeAttr("disabled", "disabled");
							$("#get-owner-info-btn-spinner").hide();

							if (results.length < 1) {
								displayAlert("Information not found! Please make sure identification number is entered correclty", "danger");
								scrollToTop();
							} else {
								$('.alert').alert('close');

								$('#div-owner-info-1').hide();
								$('#ownerName').attr('data-id',results[0].id);
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

							$("#ownerCategory").removeAttr("disabled", "disabled");
							$("#IDNumberToSearch").removeAttr("disabled", "disabled");
							$("#get-owner-info-btn").removeAttr("disabled", "disabled");
							$("#get-owner-info-btn-spinner").hide();

							displayAlert("Error getting information. Please try again later.", "danger");
							scrollToTop();
						}
					});
					break;
				default:
					break;
			}
		};
	});

	// 3. Submit form
	$('#submit-form-btn').on('click', function () {
		var vehicleRegistrationNo = $("#vehicleRegistrationNo option:selected").val();
		var vehicleEngineNo = $("#vehicleEngineNo").val();
		var vehicleChassisNo = $("#vehicleChassisNo").val();
		var vehicleProductionYear = $("#vehicleProductionYear").val();
		var vehicleOriginalStatus = $("#vehicleOriginalStatus option:selected").val();
		var vehicleEngineCapacity = $("#vehicleEngineCapacity").val();
		var vehicleFuelType = $("#vehicleFuelType option:selected").val();
		var vehiclePurpose = $("#vehiclePurpose").val();
		var vehicleBrand = $("#vehicleBrand").val();
		var vehicleModel = $("#vehicleModel").val();
		var vehicleType = $("#vehicleType").val();
		var vehicleLadenWeight = $("#vehicleLadenWeight").val();
		var vehicleUnladenWeight = $("#vehicleUnladenWeight").val();
		var vehicleCurbWeight = $("#vehicleCurbWeight").val();

		if (removeWhitespaceAndDash(vehicleEngineNo) != '' && removeWhitespaceAndDash(vehicleChassisNo) != '' && removeWhitespaceAndDash(vehiclePurpose) != '' && removeWhitespaceAndDash(vehicleBrand) != '' && removeWhitespaceAndDash(vehicleModel) != '' && removeWhitespaceAndDash(vehicleType) != '') {
			
		}

		$('#div-confirm-application-type').show();
		$('#div-confirm-owner-info').show();
		$("#confirmationModal").modal({ backdrop: 'static', keyboard: false });
	});

	// Choose Vehicle Registration Area
	$("#registrationAreaOption").on('change', function () {
		getLatestRunningNumberByArea(this.value, $('#vehicleRegistrationNo'));
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