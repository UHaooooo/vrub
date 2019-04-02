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
				<div class="row" id="div-confirm-old-vehicle-info" style="display:none">
					<div class="col-sm-12">
						<div class="card"  >
							<div class="card-header">Old Vehicle Information</div>
							<div class="card-body" style="display:block">
								<div class="form-group row">
									<label for="confirmOldVehicleRegistrationNo" class="col-sm-3 col-form-label">New Vehicle Registration No. for Old Vehicle</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleRegistrationNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleEngineNo" class="col-sm-3 col-form-label">Engine No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleEngineNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleChassisNo" class="col-sm-3 col-form-label">Chassis No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleChassisNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleProductionYear" class="col-sm-3 col-form-label">Production Year</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleProductionYear" value="2008" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleOriginalStatus" class="col-sm-3 col-form-label">Original Status</label>
									<div class="col-sm-9">
										<input type="text" id="confirmOldVehicleOriginalStatus" class="form-control-plaintext" value="A - Newly Import Vehicle" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleEngineCapacity" class="col-sm-3 col-form-label">Engine Capacity</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleEngineCapacity" value="2000" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleNumberOfSeat" class="col-sm-3 col-form-label">Number of Seat</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleNumberOfSeat" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleColor" class="col-sm-3 col-form-label">Color</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleColor" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleFuelType" class="col-sm-3 col-form-label">Fuel Type</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleFuelType" value="0 - Petrol" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehiclePurpose" class="col-sm-3 col-form-label">Purpose</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehiclePurpose" value="Persendirian" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleBrand" class="col-sm-3 col-form-label">Brand</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleBrand" value="Perodua" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleModel" class="col-sm-3 col-form-label">Brand</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleModel" value="Myvi" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleType" class="col-sm-3 col-form-label">Vehicle Type</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmOldVehicleType" value="Car" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleLadenWeight" class="col-sm-3 col-form-label">Laden Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleLadenWeight" value="950" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleUnladenWeight" value="900" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmOldVehicleKerbWeight" class="col-sm-3 col-form-label">Kerb Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmOldVehicleKerbWeight" value="800" required readonly>
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
									<label for="confirmVehicleRegistrationNo" class="col-sm-3 col-form-label">Vehicle Registration No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleRegistrationNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleEngineNo" class="col-sm-3 col-form-label">Engine No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleEngineNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleChassisNo" class="col-sm-3 col-form-label">Chassis No.</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleChassisNo" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleProductionYear" class="col-sm-3 col-form-label">Production Year</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleProductionYear" value="2008" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleOriginalStatus" class="col-sm-3 col-form-label">Original Status</label>
									<div class="col-sm-9">
										<input type="text" id="confirmVehicleOriginalStatus" class="form-control-plaintext" value="A - Newly Import Vehicle" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleEngineCapacity" class="col-sm-3 col-form-label">Engine Capacity</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleEngineCapacity" value="2000" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleNumberOfSeat" class="col-sm-3 col-form-label">Number of Seat</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleNumberOfSeat" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleColor" class="col-sm-3 col-form-label">Color</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleColor" value="" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleFuelType" class="col-sm-3 col-form-label">Fuel Type</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleFuelType" value="0 - Petrol" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehiclePurpose" class="col-sm-3 col-form-label">Purpose</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehiclePurpose" value="Persendirian" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleBrand" class="col-sm-3 col-form-label">Brand</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleBrand" value="Perodua" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleModel" class="col-sm-3 col-form-label">Brand</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleModel" value="Myvi" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleType" class="col-sm-3 col-form-label">Vehicle Type</label>
									<div class="col-sm-9">
										<input type="text" class="form-control-plaintext" id="confirmVehicleType" value="Car" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleLadenWeight" class="col-sm-3 col-form-label">Laden Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleLadenWeight" value="950" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleUnladenWeight" class="col-sm-3 col-form-label">Unladen Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleUnladenWeight" value="900" required readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="confirmVehicleKerbWeight" class="col-sm-3 col-form-label">Kerb Weight (KG)</label>
									<div class="col-sm-9">
										<input type="number" class="form-control-plaintext" id="confirmVehicleKerbWeight" value="800" required readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-success" id="confirm-submit-form-btn">
					<span class="spinner-border spinner-border-sm" id="confirm-submit-form-btn-spinner" style="display:none"></span>
					<span>Confirm</span></button>
					<button type="button" class="btn btn-danger" data-dismiss="modal" id="confirm-close-form-btn">Close</button>
				</div>
				
			</div>
		</div>
	</div>