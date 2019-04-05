@extends('layouts.app')

@section('title')
<title>Vehicle Registration Portal - Transfer of Vehicle Ownership</title>
@endsection

@section('js')
<script src="/js/transfer_vehicle_ownership.js"></script>
@endsection

@section('main')
<section>
	<h3>Transfer of Vehicle Ownership</h3>
	
	{{-- Div containing Owner Information --}}
	<div class="row" id="div-owner-info" style="display:block">
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
				<div class="card-header">Vehicle Information</div>
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
						<label for="oldVehicleRegistrationNo" class="col-sm-3 col-form-label">Vehicle Registration No. for Old Vehicle</label>
						<div class="col-sm-9">
							<input type="text" id="oldVehicleRegistrationNo" class="form-control-plaintext required readonly">
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

	{{-- Div containing Owner Information --}}
	<div class="row" id="div-new-owner-info" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card">
				<div class="card-header">New Owner Information</div>
				{{-- Part for user to enter identification number --}}
				<form class="card-body was-validated" style="display:block" id="div-new-owner-info-1" novalidate>
					<div class="form-group">
						<label for="newOwnerCategoryOption">Owner Category</label>
						<div>
							<select id="newOwnerCategoryOption" class="form-control">
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
						<label for="newIDNumberToSearch">National Identification No./Identity No.</label>
						<input type="text" class="form-control" id="newIDNumberToSearch" placeholder="Enter National Identification No./Identity No." required>
						<div class="invalid-feedback">
							Please enter valid identification number!
						</div>
						<small>Enter Identification Number without space or "-"</small>
					</div>
					<button class="btn btn-primary" type="button" id="get-new-owner-info-btn">
						<span class="spinner-border spinner-border-sm" id="get-new-owner-info-btn-spinner" style="display:none"></span>
						<span>Get Information</span>
					</button>
				</form>
				{{-- Part to show owner information --}}
				<div class="card-body" style="display:none" id="div-new-owner-info-2">
					<div class="form-group row">
						<label for="newOwnerName" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerName" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerCategory" class="col-sm-3 col-form-label">Owner Category</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerCategory" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerIDNumber" class="col-sm-3 col-form-label">Identification No./ Passport/ Police/ Military/ Company/ Organizations</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerIDNumber" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerAddress" class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea rows="4" readonly class="form-control-plaintext" id="newOwnerAddress">
							</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerPostalCode" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerCity" class="col-sm-3 col-form-label">City</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerCity" value="">
						</div>
					</div>
					<div class="form-group row">
						<label for="newOwnerState" class="col-sm-3 col-form-label">State</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="newOwnerState" value="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- Div containing submit and reset button --}}
	<div class="row" id="div-submit-reset" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card">
				<div class="btn-group">
					<button class="btn btn-success" type="button" id="submit-form-btn" style="">Submit</button>
					<button class="btn btn-danger" type="button" id="reset-form-btn">Reset Form</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection