<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Vehicle Registration Portal - Home</title>
	<script src="/js/app.js"></script>
	<script src="/js/smart_contract.js"></script>
	<script src="/js/util.js"></script>
	<style>
		body{
			margin: 0;
		}
		
		.flexbox-wrapper {
			display: flex;
			min-height: 100vh;
			flex-direction: column;
		}
		
		main {
			flex: 1 0 auto;
		}
		
		nav{
			padding: 10px;
		}
		
		footer {
			background-color: rgb(0, 51, 102);
			height: 70px;
		}
		
		.customSection {
			padding: 5px;
			border: 1px black solid;
		}
	</style>
</head>
<body>
	<section class="flexbox-wrapper">
		<header>
			<nav style="background-color:rgb(0, 51, 102)"><a href="/"><img src="/image/logo.png" alt="Logo"></a></nav>
		</header>
		<main>
			<section id="generalSection" class="customSection">
				<h4 class="sectionTitle">General</h4>
				<button onclick="check()">Check Account</button>
				<br><br>
				<button onclick="getNumOfRecords()">Get Number Of Records</button>
			</section>
			<section id="registerSection" class="customSection">
				<h4 class="sectionTitle">Register</h4>
				<input type="text" name="registerVehicleID" id="registerVehicleID" placeholder="Vehicle ID">
				<input type="text" name="registerOwnerID" id="registerOwnerID" placeholder="Owner ID">
				<button onclick="register()">Register</button>
			</section>
			<section id="getOwnerIDSection" class="customSection">
				<h4 class="sectionTitle">Get Owner ID</h4>
				<input type="text" name="getOwnerID" id="getOwnerID" placeholder="Vehicle ID">
				<button onclick="getOwnerID()">Get OwnerID</button>
			</section>
			<section id="transferOwnerSection" class="customSection">
				<h4 class="sectionTitle">Transform Owner</h4>
				<input type="text" name="transferVehicleID" id="transferVehicleID" placeholder="Vehicle ID">
				<input type="text" name="transferOldOwnerID" id="transferOldOwnerID" placeholder="Old Owner ID">
				<input type="text" name="transferNewOwnerID" id="transferNewOwnerID" placeholder="New Owner ID">
				<button onclick="transferOwner()">Transfer Owner</button>
			</section>
			<section id="deleteRecordSection" class="customSection">
				<h4 class="sectionTitle">Delete Record</h4>
				<input type="text" name="deleteVehicleID" id="deleteVehicleID" placeholder="Vehicle ID">
				<button onclick="deleteRecord()">Delete Record</button>
			</section>
		</main>
		<footer>
			
		</footer>
	</section>
</body>
</html>