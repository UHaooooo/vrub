@extends('layouts.app')

@section('title')
<title>Vehicle Registration Portal - Vehicle Registration Number</title>
@endsection

@section('js')
<script src="/js/vehicle_registration_number.js"></script>
@endsection

@section('main')
<section>
	<h3>Vehicle Registration Number</h3>
	
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
	
	<div class="row" id="div-tender-section" style="display:none">
		<div class="col-lg-6  col-sm-12">
			<div class="card" >
				<div class="card-header">Tender Section</div>
				{{-- Part for user to enter identification number --}}
				<form class="card-body was-validated" style="display:block" id="" novalidate>
					<div class="form-group">
						<label for="tenderSessionOption">Tender Session</label>
						<div>
							<select id="tenderSessionOption" class="form-control">
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="tenderNumber">Tender Number</label>
						<div>
							<input type="number" min="1" max="9999" id="tenderNumber" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="tenderNumber">Tender Amount</label>
						<div>
							<input type="number:" id="tenderAmount" class="form-control" required>
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
					<button class="btn btn-success" type="button" id="submit-form-btn" style="">Submit</button>
					<button class="btn btn-danger" type="button" id="reset-form-btn">Reset Form</button>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection