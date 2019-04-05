@extends('layouts.app')

@section('title')
<title>Vehicle Registration Portal - Vehicle Registration</title>
@endsection

@section('js')
<script src="/js/new_vehicle_registration.js"></script>
@endsection

@section('main')
<section>
	<h3>Vehicle Registration</h3>
	
	<div class="row">
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">Application Type</div>
				{{-- Part for user to choose application type --}}
				<div class="card-body" id="div-choose-app-type" style="display:block">
					<h6>Application Type</h6>
					<div class="btn-group-vertical btn-group-lg">
						<button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="00">00 - Registration Using Running Number</button>
						<button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="01">01 - Registration Using Running Number & Change Vehicle Registration Number</button>
						<button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="02">02 - Registration Using Tender Number</button>
						<button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="03">03 - Registration Using Tender Number & Change Vehicle Registration Number</button>
						{{-- <button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="06">06 - Registration of New Trailer</button>
						<button type="button" class="btn btn-primary btn-lg application-type-btn" data-type="18">18 - Re-Registration of Vehicle</button> --}}
					</div>
				</div>
				{{-- Part to show application type --}}
				<div class="card-body" id="div-show-app-type" style="display:none">
					<div class="form-group row">
						<label for="applicationType" class="col-sm-3 col-form-label">Application Type</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="applicationType" value="00 - Registration Using Running Number" data-type="00">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{-- Div containing Owner Information --}}
	<div class="row" id="div-owner-info" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card">
				<div class="card-header">Owner Information</div>
				{{-- Part for user to enter identification number --}}
				<form class="card-body was-validated" style="display:block" id="div-owner-info-1" novalidate>
					<div class="form-group">
						<label for="ownerCategoryOption">Owner Category</label>
						<div>
							<select id="ownerCategoryOption" class="form-control">
								<option value="1">1 - Malaysia Citizen</option>
								<option value="2">2 - Polis</option>
								<option value="3">3 - Military</option>
								<option value="4">4 - Company/Organisation</option>
								<option value="5">5 - Malaysia Permanent Resident</option>
								<option value="6">6 - Birth Certificate</option>
								<option value="7">7 - Non-Malaysian</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="IDNumberToSearch">National Identification No./Identity No.</label>
						<input type="text" class="form-control" id="IDNumberToSearch" placeholder="Enter National Identification No./Identity No." required>
						<div class="invalid-feedback">
							Please enter valid identification number!
						</div>
						<small>Enter Identification Number without space or "-"</small>
					</div>
					<button class="btn btn-primary" type="button" id="get-owner-info-btn">
						<span class="spinner-border spinner-border-sm" id="get-owner-info-btn-spinner" style="display:none"></span>
						<span>Get Information</span>
					</button>
				</form>
				{{-- Part to show owner information --}}
				<div class="card-body" style="display:none" id="div-owner-info-2">
					<div class="form-group row">
						<label for="ownerName" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerName" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCategory" class="col-sm-3 col-form-label">Owner Category</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCategory" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerIDNumber" class="col-sm-3 col-form-label">Identification No./ Passport/ Police/ Military/ Company/ Organizations</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerIDNumber" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerAddress" class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea rows="4" readonly class="form-control-plaintext" id="ownerAddress">
							</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerPostalCode" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCity" class="col-sm-3 col-form-label">City</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCity" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerState" class="col-sm-3 col-form-label">State</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerState" value="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	{{-- Div containing old vehicle information --}}
	<div class="row" id="div-old-vehicle-info" style="display:none">
		<div class="col-lg-6 col-sm-12">
			<div class="card"  >
				<div class="card-header">Old Vehicle Information</div>
				<div class="card-body" style="display:block" id="div-old-vehicle-info-1">
					<div class="form-group">
						<label for="registrationNumberToSearch">Vehicle Registration No.</label>
						<input type="text" class="form-control" id="registrationNumberToSearch" placeholder="Enter Vehicle Registration No. for Old Vehicle">
					</div>
					<button class="btn btn-primary" type="button" id="get-old-vehicle-info-btn">
						<span class="spinner-border spinner-border-sm" id="get-old-vehicle-info-btn-spinner" style="display:none"></span>
						<span>Get Information</span>
					</button>
				</div>
				<form class="card-body was-validated" style="display:none" id="div-old-vehicle-info-2" novalidate>
					<div class="form-group row">
						<label for="oldRegistrationAreaOption" class="col-sm-3 col-form-label">Vehicle Registration Area</label>
						<div class="col-sm-9">
							<select id="oldRegistrationAreaOption" class="form-control">
								<option value="1">Johor</option>
								<option value="2">Kedah</option>
								<option value="3">Langkawi</option>
								<option value="4">Kelantan</option>
								<option value="5">Malacca</option>
								<option value="6">Negeri Sembilan</option>
								<option value="7">Pahang</option>
								<option value="8">Penang</option>
								<option value="9">Perak</option>
								<option value="10">Perlis</option>
								<option value="11">Selangor</option>
								<option value="12">Terengganu</option>
								<option value="13">West Coast</option>
								<option value="14">Sandakan</option>
								<option value="15">Kudat</option>
								<option value="16">Tawau</option>
								<option value="17">Beaufort</option>
								<option value="18">Keningau</option>
								<option value="19">Lahad Datu</option>
								<option value="20">Kuching</option>
								<option value="21">Sibu</option>
								<option value="22">Miri</option>
								<option value="23">Sarikei</option>
								<option value="24">Bintulu</option>
								<option value="25">Limbang</option>
								<option value="26">Kota Samarahan</option>
								<option value="27">Kapit</option>
								<option value="28">Sri Aman</option>
								<option value="29">Kuala Lumpur</option>
								<option value="30">Labuan</option>
								<option value="31">Putrajaya</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleRegistrationNo" class="col-sm-3 col-form-label">New Vehicle Registration No. for Old Vehicle</label>
						<div class="col-sm-9">
							<select id="oldVehicleRegistrationNo" class="form-control">
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleEngineNo" class="col-sm-3 col-form-label">Engine No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleEngineNo" value="52WVC10338" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleChassisNo" class="col-sm-3 col-form-label">Chassis No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleChassisNo" value="2H2XA59BWDY987665" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleProductionYear" class="col-sm-3 col-form-label">Production Year</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleProductionYear" value="2008" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleOriginalStatus" class="col-sm-3 col-form-label">Original Status</label>
						<div class="col-sm-9">
							<input type="text" id="oldVehicleOriginalStatus" class="form-control-plaintext" value="A - Newly Import Vehicle" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleEngineCapacity" class="col-sm-3 col-form-label">Engine Capacity</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleEngineCapacity" value="1329" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleNumberOfSeat" class="col-sm-3 col-form-label">Number of Seat</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleNumberOfSeat" value="5" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleColor" class="col-sm-3 col-form-label">Color</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleColor" value="Black" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleFuelType" class="col-sm-3 col-form-label">Fuel Type</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleFuelType" value="0 - Petrol" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehiclePurpose" class="col-sm-3 col-form-label">Purpose</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehiclePurpose" value="Persendirian" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleBrand" class="col-sm-3 col-form-label">Brand</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleBrand" value="Perodua" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleModel" class="col-sm-3 col-form-label">Model</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleModel" value="Myvi" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleType" class="col-sm-3 col-form-label">Vehicle Type</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="oldVehicleType" value="Car" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleLadenWeight" class="col-sm-3 col-form-label">Laden Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleLadenWeight" value="1000" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleUnladenWeight" value="960" required readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="oldVehicleKerbWeight" class="col-sm-3 col-form-label">Kerb Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="oldVehicleKerbWeight" value="975" required readonly>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	{{-- Div containing vehicle information --}}
	<div class="row" id="div-vehicle-info" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card"  >
				<div class="card-header">Vehicle Information</div>
				<form class="card-body was-validated" novalidate>
					<div class="form-group row" id="div-registration-area-option">
						<label for="registrationAreaOption" class="col-sm-3 col-form-label">Vehicle Registration Area</label>
						<div class="col-sm-9">
							<select id="registrationAreaOption" class="form-control">
								<option value="1">Johor</option>
								<option value="2">Kedah</option>
								<option value="3">Langkawi</option>
								<option value="4">Kelantan</option>
								<option value="5">Malacca</option>
								<option value="6">Negeri Sembilan</option>
								<option value="7">Pahang</option>
								<option value="8">Penang</option>
								<option value="9">Perak</option>
								<option value="10">Perlis</option>
								<option value="11">Selangor</option>
								<option value="12">Terengganu</option>
								<option value="13">West Coast</option>
								<option value="14">Sandakan</option>
								<option value="15">Kudat</option>
								<option value="16">Tawau</option>
								<option value="17">Beaufort</option>
								<option value="18">Keningau</option>
								<option value="19">Lahad Datu</option>
								<option value="20">Kuching</option>
								<option value="21">Sibu</option>
								<option value="22">Miri</option>
								<option value="23">Sarikei</option>
								<option value="24">Bintulu</option>
								<option value="25">Limbang</option>
								<option value="26">Kota Samarahan</option>
								<option value="27">Kapit</option>
								<option value="28">Sri Aman</option>
								<option value="29">Kuala Lumpur</option>
								<option value="30">Labuan</option>
								<option value="31">Putrajaya</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleRegistrationNo" class="col-sm-3 col-form-label">Vehicle Registration No.</label>
						<div class="col-sm-9">
							<select id="vehicleRegistrationNo" class="form-control" required>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleEngineNo" class="col-sm-3 col-form-label">Engine No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleEngineNo" value="" required>
							<div class="invalid-feedback">
								Please enter valid engine number!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleChassisNo" class="col-sm-3 col-form-label">Chassis No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleChassisNo" value="" required>
							<div class="invalid-feedback">
								Please enter valid chassis number!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleProductionYear" class="col-sm-3 col-form-label">Production Year</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleProductionYear" value="" required>
							<div class="invalid-feedback">
								Please enter valid production year!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleOriginalStatus" class="col-sm-3 col-form-label">Original Status</label>
						<div class="col-sm-9">
							<select id="vehicleOriginalStatus" class="form-control">
								<option value="A">A - Newly Import Vehicle</option>
								<option value="B">B - Used Import Vehicle</option>
								<option value="C">C - Assembled Locally</option>
								<option value="D">D - Built Locally</option>
								<option value="E">E - Built & Assembled Locally</option>
								<option value="F">F - Assembled Locally Using Used Imported Component</option>
								<option value="G">G - Reconstructed</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleEngineCapacity" class="col-sm-3 col-form-label">Engine Capacity</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleEngineCapacity" value="" required>
							<div class="invalid-feedback">
								Please enter valid engine capacity!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleNumberOfSeat" class="col-sm-3 col-form-label">Number of Seat</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleNumberOfSeat" value="" required>
							<div class="invalid-feedback">
								Please enter valid number of seat!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleColor" class="col-sm-3 col-form-label">Color</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleColor" value="" required>
							<div class="invalid-feedback">
								Please enter valid vehicle color!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleFuelType" class="col-sm-3 col-form-label">Fuel Type</label>
						<div class="col-sm-9">
							<select id="vehicleFuelType" class="form-control">
								<option value="0">0 - Petrol</option>
								<option value="1">1 - Diesel</option>
								<option value="2">2 - Liquefied Petroleum Gas</option>
								<option value="3">3 - Petrol & Liquefied Petroleum Gas</option>
								<option value="4">4 - Natural Gas for Vehicle (NGV)</option>
								<option value="5">5 - Petrol & Natural Gas for Vehicle (NGV)</option>
								<option value="6">6 - Diesel & Natural Gas for Vehicle (NGV)</option>
								<option value="7">7 - Green Diesel</option>
								<option value="8">8 - Green Diesel & Natural Gas for Vehicle (NGV)</option>
								<option value="9">9 - Others</option>
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehiclePurpose" class="col-sm-3 col-form-label">Purpose</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehiclePurpose" value="" required>
							<div class="invalid-feedback">
								Please enter valid purpose for the vehicle!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleBrand" class="col-sm-3 col-form-label">Brand</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleBrand" value="" required>
							<div class="invalid-feedback">
								Please enter valid vehicle brand!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleModel" class="col-sm-3 col-form-label">Model</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleModel" value="" required>
							<div class="invalid-feedback">
								Please enter valid vehicle model!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleType" class="col-sm-3 col-form-label">Vehicle Type</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="vehicleType" value="" required>
							<div class="invalid-feedback">
								Please enter valid vehicle type!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleLadenWeight" class="col-sm-3 col-form-label">Laden Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleLadenWeight" value="" required>
							<div class="invalid-feedback">
								Please enter valid laden weight!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleUnladenWeight" value="" required>
							<div class="invalid-feedback">
								Please enter valid unladen weight!
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleKerbWeight" class="col-sm-3 col-form-label">Kerb Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control" id="vehicleKerbWeight" value="" required>
							<div class="invalid-feedback">
								Please enter valid kerb weight!
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	{{-- Div containing submit and reset button --}}
	<div class="row" id="div-submit-reset" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card">
				<div class="btn-group">
					<button class="btn btn-success" type="button" id="submit-form-btn" style="display:none">Submit</button>
					<button class="btn btn-danger" type="button" id="reset-form-btn">Reset Form</button>
				</div>
			</div>
		</div>
	</div>
	
	@include('inc.confirmation_modal')
</section>
@endsection