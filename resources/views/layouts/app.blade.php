<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	@section('title')
	<title>Vehicle Registration Portal</title>
	@show
	
	<script src="/js/app.js"></script>
	<script src="/js/smart_contract.js"></script>
	<script src="/js/util.js"></script>
	<link rel="stylesheet" href="/css/app.css">
	
	<script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.0/dist/bootstrap-validate.js" ></script>
	
	@section('js')
	@show
	
	<style>
		body{
			margin: 0;
		}
		
		.flexbox-wrapper {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}
		
		.header-nav{
			padding: 10px;
			box-shadow: 0px 2px 8px rgb(136,136,136);
		}
		
		.content-flexbox-wrapper {
			flex: 1;
			display: flex;
		}
		
		main {
			flex: 1;
			padding: 10px;
		}
		
		.sidenav {
			flex: 0 0 15em;
			order: -1;
			background-color: rgb(204,255,102);
			border-right: 1px solid rgb(0,0,0);
			box-shadow: 2px 0px 8px rgb(136,136,136);
		}
		
		.sidenav-option {
			background-color: rgb(204,255,102);
			border-top: 1px solid rgb(0,0,0);
			border-bottom: 1px solid rgb(0,0,0);
		}
		
		footer {
			background-color: rgb(0, 51, 102);
			height: 70px;
			box-shadow: 0px -2px 8px rgb(136,136,136);
		}
		
		textarea{
			resize: none;
		}
	</style>
</head>
<body>
	<section class="flexbox-wrapper">
		<header>
			<nav class="header-nav" style="background-color:rgb(0, 51, 102)"><a href="/"><img src="/image/logo.png" alt="Logo"></a></nav>
		</header>
		<section class="content-flexbox-wrapper">
			<main>
				<div id="alert-div"></div>
				@yield('main')
			</main>
			@if(Request::route()->getName() != "login")
			<nav class="sidenav">
				<div class="list-group">
					<a href="/newVehicleRegistration" class="list-group-item list-group-item-action sidenav-option">NEW VEHICLE REGISTRATION</a>
					<a href="/editVehicleRegistrationInformation" class="list-group-item list-group-item-action sidenav-option">EDIT VEHICLE REGISTRATION INFORMATION</a>
					<a href="/transferVehicleOwnership" class="list-group-item list-group-item-action sidenav-option">TRANSFER OF VEHICLE OWNERSHIP</a>
					<a href="/vehicleLicense" class="list-group-item list-group-item-action sidenav-option">VEHICLE LICENSE</a>
					{{-- <a href="/vehicleInsurance" class="list-group-item list-group-item-action sidenav-option">VEHICLE INSURANCE</a> --}}
					<a href="/vehicleRegistrationNumber" class="list-group-item list-group-item-action sidenav-option">VEHICLE REGISTRAION NUMBER</a>
				</div>
			</nav>
			@endif
		</section>
		<footer>
			
		</footer>
	</section>
</body>
</html>