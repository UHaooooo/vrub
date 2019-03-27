$(document).ready(function () {
	// Setup for Bootstrap Validation
	window.addEventListener('load', function () {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function (form) {
			form.addEventListener('submit', function (event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
});

// Generate an Alert inside div-alert
function displayAlert(message, alertType = "success") {
	var dismissBtn = $('<button>', { 'type': 'button', 'class': 'close', 'data-dismiss': 'alert' }).html('<span>&times;</span>');

	$('#alert-div').html($('<div>', { 'class': 'alert alert-' + alertType }).html(message).append(dismissBtn));
}

// Return the text for application type
function getApplicationTypeText(code) {
	switch (code) {
		case '00':
			return "00 - Registration Using Running Number";
			break;
		case '01':
			return "01 - Registration Using Running Number & Change Vehicle Registration Number";
			break;
		case '02':
			return "02 - Registration Using Tender Number";
			break;
		case '03':
			return "03 - Registration Using Tender Number & Change Vehicle Registration Number";
			break;
		case '06':
			return "06 - Registration of New Trailer";
			break;
		case '18':
			return "18 - Re-Registration of Vehicle";
			break;
		default:
			return "00 - Registration Using Running Number";
			break;
	}
}

// Return the text for owner category
function getOwnerCategoryText(code) {
	switch (code) {
		case '1':
			return "1 - Malaysia Citizen";
			break;
		case '2':
			return "2 - Polis";
			break;
		case '3':
			return "3 - Military";
			break;
		case '4':
			return "4 - Company/Organisation";
			break;
		case '5':
			return "5 - Malaysia Permanent Resident";
			break;
		case '6':
			return "6 - Birth Certificate";
			break;
		case '7':
			return "7 - Non-Malaysian";
			break;
		default:
			return "1 - Malaysia Citizen";
			break;
	}
}

// Return the text for owner category
function getOriginalStatusText(code) {
	switch (code) {
		case 'A':
			return "A - Newly Import Vehicle";
			break;
		case 'B':
			return "B - Used Import Vehicle";
			break;
		case 'C':
			return "C - Assembled Locally";
			break;
		case 'D':
			return "D - Built Locally";
			break;
		case 'E':
			return "E - Built & Assembled Locally";
			break;
		case 'F':
			return "F - Assembled Locally Using Used Imported Component";
			break;
		case 'G':
			return "G - Reconstructed";
			break;
		default:
			return "A - Newly Import Vehicle";
			break;
	}
}

// Return the text for owner category
function getFuelTypeText(code) {
	switch (code) {
		case '0':
			return "0 - Petrol";
			break;
		case '1':
			return "1 - Diesel";
			break;
		case '2':
			return "2 - Liquefied Petroleum Gas";
			break;
		case '3':
			return "3 - Petrol & Liquefied Petroleum Gas";
			break;
		case '4':
			return "4 - Natural Gas for Vehicle (NGV)";
			break;
		case '5':
			return "5 - Petrol & Natural Gas for Vehicle (NGV)";
			break;
		case '6':
			return "6 - Diesel & Natural Gas for Vehicle (NGV)";
			break;
		case '7':
			return "7 - Green Diesel";
			break;
		case '8':
			return "8 - Green Diesel & Natural Gas for Vehicle (NGV)";
			break;
		case '9':
			return "9 - Others";
			break;
		default:
			return "0 - Petrol";
			break;
	}
}

// Remove whitespace and "-"
function removeWhitespaceAndDash(input) {
	return input.replace(/-/g, '').replace(/ /g, '');
}

// Scroll to top
function scrollToTop() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
}