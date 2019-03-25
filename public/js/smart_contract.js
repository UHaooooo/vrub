var contractABI, contractAddress, contractInstance;
var apiURL = "http://localhost:8088/api/";
//$(document).ready(function() {
window.addEventListener('load', async () => {
	if (window.ethereum) {
		web3 = new Web3(ethereum);
	} else {
		web3 = new Web3(web3.currentProvider);
	}

	await ethereum.enable();

	console.log("gaodim");

	if (typeof web3 != 'undefined') {
		// web3 = new Web3(window.web3 ? window.web3.currentProvider : new Web3.providers.HttpProvider('https://ropsten.infura.io/v3/f763031162874b41b36dd8376a4107b5'));

		contractABI = [{"constant":false,"inputs":[{"name":"_vehicleID","type":"bytes32"}],"name":"deleteRecord","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[],"name":"kill","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_vehicleID","type":"bytes32"},{"name":"_ownerID","type":"bytes32"}],"name":"register","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"constant":false,"inputs":[{"name":"_vehicleID","type":"bytes32"},{"name":"_oldOwnerID","type":"bytes32"},{"name":"_newOwnerID","type":"bytes32"}],"name":"transferOwner","outputs":[],"payable":false,"stateMutability":"nonpayable","type":"function"},{"inputs":[],"payable":false,"stateMutability":"nonpayable","type":"constructor"},{"payable":true,"stateMutability":"payable","type":"fallback"},{"constant":true,"inputs":[{"name":"_vehicleID","type":"bytes32"}],"name":"checkIsVehicleExists","outputs":[{"name":"isExists","type":"bool"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"getNumOfRecords","outputs":[{"name":"_numOfRecords","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[{"name":"_vehicleID","type":"bytes32"}],"name":"getOwnerID","outputs":[{"name":"_ownerID","type":"bytes32"}],"payable":false,"stateMutability":"view","type":"function"},{"constant":true,"inputs":[],"name":"numOfRecords","outputs":[{"name":"","type":"uint256"}],"payable":false,"stateMutability":"view","type":"function"}];

		contractAddress = '0xDd1A7e246Cd6281Aab70BBfFA2BF5f9644151eb6';

		contractInstance = web3.eth.contract(contractABI).at(contractAddress);

		//console.log(contractInstance);
		//console.log(web3);

	} else {
		alert("Please install Metamask to continue.");
	}
});

function check() {
	(async () => {
		const accounts = await web3.eth.getAccounts(function (err, results) {
			console.log(err, results);
		});
	})();
}

async function register() {
	var vehicleIDInput = $("#registerVehicleID").val();
	var ownerIDInput = $("#registerOwnerID").val();

	var vehicleID = web3.fromAscii(vehicleIDInput);
	var ownerID = web3.fromAscii(ownerIDInput);

	console.log(vehicleID); console.log(ownerID);

	await ethereum.enable();

	contractInstance.register(vehicleID, ownerID, { gasPrice: web3.toWei(getGasPrice(), 'gwei') }, function (err, results) {
		console.log(err, results);
	});
}

function getNumOfRecords() {
	contractInstance.getNumOfRecords(function (err, results) {
		console.log(err, results.c[0]);
	});
}

function getOwnerID() {
	var vehicleID = web3.fromAscii($("#getOwnerID").val());

	contractInstance.getOwnerID(vehicleID, function (err, results) {
		if (results != "0x08c379a000000000000000000000000000000000000000000000000000000000") {
			var rawOwnerID = web3.toAscii(results);

			ownerID = rawOwnerID.replace(/\u0000/g, '');

			console.log(err, ownerID);
		} else {
			console.log("Vehicle not found.");
		}
	});
}

function transferOwner() {
	var transferVehicleID = web3.fromAscii($("#transferVehicleID").val());
	var transferOldOwnerID = web3.fromAscii($("#transferOldOwnerID").val());
	var transferNewOwnerID = web3.fromAscii($("#transferNewOwnerID").val());

	contractInstance.transferOwner(transferVehicleID, transferOldOwnerID, transferNewOwnerID, function (err, results) {
		console.log(err, results);
	});
}

function deleteRecord() {
	var vehicleID = web3.fromAscii($("#deleteVehicleID").val());

	contractInstance.deleteRecord(vehicleID, function (err, results) {
		console.log(err, results);
	});
}

function getGasPrice() {
	var gasPriceData = $.ajax({
		url: "https://www.ethgasstation.info/json/ethgasAPI.json",
		async: false,
		dataType: 'json'
	}).responseJSON;

	return gasPriceData.average / 10;
}