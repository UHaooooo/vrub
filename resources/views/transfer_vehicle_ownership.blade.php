@extends('layouts.app')

@section('title')
<title>Vehicle Registration Portal - Transfer of Vehicle Ownership</title>
@endsection

@section('main')
<section>
	<h3>Transfer of Vehicle Ownership</h3>
	
	<div class="row">
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">Transfer Ownership For:</div>
				<div class="card-body" style="display:none">
					<div class="form-group">
						<label for="registrationNumberToSearch">Vehicle Registration No.</label>
						<input type="text" class="form-control" id="registrationNumberToSearch" placeholder="Enter Vehicle Registration No.">
					</div>
					<button class="btn btn-primary" type="button">Get Information</button>
				</div>
				<div class="card-body" style="display:block">
					<div class="form-group row">
						<label for="vehicleRegistrationNumber" class="col-sm-3 col-form-label">Vehicle Registraion No.</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="vehicleRegistrationNumber" value="CBX8898">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" >
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">Vehicle Information</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="vehicleRegistrationNo" class="col-sm-3 col-form-label">Vehicle Registration No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleRegistrationNo" value="CBX8898" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleEngineNo" class="col-sm-3 col-form-label">Engine No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleEngineNo" value="52WVC10338" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleChassisNo" class="col-sm-3 col-form-label">Chassis No.</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleChassisNo" value="2H2XA59BWDY987665" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleProductionYear" class="col-sm-3 col-form-label">Production Year</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleProductionYear" value="2008" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleOriginalStatus" class="col-sm-3 col-form-label">Original Status</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleOriginalStatus" value="A - Newly Import Vehicle" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleEngineCapacity" class="col-sm-3 col-form-label">Engine Capacity</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleEngineCapacity" value="2000">
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleFuelType" class="col-sm-3 col-form-label">Fuel Type</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleFuelType" value="0 - Petrol" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehiclePurpose" class="col-sm-3 col-form-label">Purpose</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehiclePurpose" value="Persendirian" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleBrand" class="col-sm-3 col-form-label">Brand</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleBrand" value="Perodua" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleModel" class="col-sm-3 col-form-label">Brand</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleModel" value="Myvi" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleType" class="col-sm-3 col-form-label">Vehicle Type</label>
						<div class="col-sm-9">
							<input type="text" class="form-control-plaintext" id="vehicleType" value="Car" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleLadenWeight" class="col-sm-3 col-form-label">Laden Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleLadenWeight" value="950" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleUnladenWeight" value="900" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="vehicleCurbWeight" class="col-sm-3 col-form-label">Curb Weight (KG)</label>
						<div class="col-sm-9">
							<input type="number" class="form-control-plaintext" id="vehicleCurbWeight" value="800" readonly>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">Current Owner Information</div>
				<div class="card-body">
					<div class="form-group row">
						<label for="ownerEmail" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerEmail" value="Lim Yu Hao">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCategory" class="col-sm-3 col-form-label">Owner Category</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCategory" value="1 - Malaysia Citizen">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerIDNumber" class="col-sm-3 col-form-label">Identification No./ Passport/ Police/ Military/ Company/ Organizations</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerIDNumber" value="970814-33-5035">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerAddress" class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea rows="4" readonly class="form-control-plaintext" id="ownerAddress">D513, Scotpine, Persiaran Sungai Long 1
							</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerPostalCode" value="43000">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCity" class="col-sm-3 col-form-label">City</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCity" value="Kajang">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerState" class="col-sm-3 col-form-label">State</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerState" value="Selangor">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">New Owner Information</div>
				<div class="card-body" style="display:block">
					<div class="form-group">
						<label for="IDNumberToSearch">National Identification No./Identity No.</label>
						<input type="text" class="form-control" id="IDNumberToSearch" placeholder="Enter National Identification No./Identity No.">
					</div>
					<button class="btn btn-primary" type="button">Get Information</button>
				</div>
				<div class="card-body" style="display:none">
					<div class="form-group row">
						<label for="ownerEmail" class="col-sm-3 col-form-label">Name</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerEmail" value="Lim Yu Hao">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCategory" class="col-sm-3 col-form-label">Owner Category</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCategory" value="1 - Malaysia Citizen">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerIDNumber" class="col-sm-3 col-form-label">Identification No./ Passport/ Police/ Military/ Company/ Organizations</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerIDNumber" value="970814-33-5035">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerAddress" class="col-sm-3 col-form-label">Address</label>
						<div class="col-sm-9">
							<textarea rows="4" readonly class="form-control-plaintext" id="ownerAddress">D513, Scotpine, Persiaran Sungai Long 1
							</textarea>
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerPostalCode" value="43000">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerCity" class="col-sm-3 col-form-label">City</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerCity" value="Kajang">
						</div>
					</div>
					<div class="form-group row">
						<label for="ownerState" class="col-sm-3 col-form-label">State</label>
						<div class="col-sm-9">
							<input type="text" readonly class="form-control-plaintext" id="ownerState" value="Selangor">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-6  col-sm-12">
			<div class="card">
				<div class="btn-group">
					<button class="btn btn-success" type="button">Submit</button>
					<button class="btn btn-danger" type="button">Reset Form</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection