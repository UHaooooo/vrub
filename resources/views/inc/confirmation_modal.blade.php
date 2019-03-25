<div class="modal fade" id="confirmationModal">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			
			{{-- Modal Header --}}
			<div class="modal-header">
				<h1 class="modal-title">Final Confirmation</h1>
			</div>
			
			{{-- Modal body --}}
			<div class="modal-body">
				<div class="row" id="div-confirm-application-type" style="display:none">
					<div class="col-sm-12">
						<div class="card" >
							<div class="card-header">Application Type</div>
							{{-- Part to show application type --}}
							<div class="card-body" id="div-show-app-type" style="display:block">
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
				<div class="row" id="div-confirm-owner-info" style="display:none">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-header">Owner Information</div>
							{{-- Part to show owner information --}}
							<div class="card-body">
								<div class="form-group row">
									<label for="confirmOwnerName" class="col-sm-3 col-form-label">Name</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerName" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerCategory" class="col-sm-3 col-form-label">Owner Category</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerCategory" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerIDNumber" class="col-sm-3 col-form-label">Identification No./ Passport/ Police/ Military/ Company/ Organizations</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerIDNumber" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerAddress" class="col-sm-3 col-form-label">Address</label>
									<div class="col-sm-9">
										<textarea rows="4" readonly class="form-control-plaintext" id="confirmOwnerAddress">
										</textarea>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerPostalCode" class="col-sm-3 col-form-label">Postal Code</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerPostalCode" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerCity" class="col-sm-3 col-form-label">City</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerCity" value="">
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOwnerState" class="col-sm-3 col-form-label">State</label>
									<div class="col-sm-9">
										<input type="text" readonly class="form-control-plaintext" id="confirmOwnerState" value="">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="div-confirm-vehicle-info" style="display:none">
					<div class="col-sm-12">
						<div class="card"  >
							<div class="card-header">Vehicle Information</div>
							<div class="card-body" style="display:block">
								<div class="form-group row">
									<label for="confirmVehicleRegistrationNo" class="col-sm-3 col-form-label">New Vehicle Registration No. for Old Vehicle</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleRegistrationNo" value="" required readonly>
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
										<input type="number" class="form-control-plaintext" id="oldVehicleEngineCapacity" value="2000" required readonly>
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
									<label for="oldVehicleModel" class="col-sm-3 col-form-label">Brand</label>
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
										<input type="number" class="form-control-plaintext" id="oldVehicleLadenWeight" value="950" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="oldVehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="oldVehicleUnladenWeight" value="900" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="oldVehicleCurbWeight" class="col-sm-3 col-form-label">Curb Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="oldVehicleCurbWeight" value="800" required readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="confirm-submit-form-btn">Confirm</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div>
			
		</div>
	</div>
</div>