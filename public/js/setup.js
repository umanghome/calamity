var submitButton = document.getElementById("submit-button");
var calamityName = document.getElementById("calamity_name");
var areaList = document.getElementById("area_list");

submitButton.onclick = function(e) {
	if (calamityName.value.length == 0) {
		alert("Calamity Name cannot be empty!");
		return false;
	}
	if (areaList.value.length == 0) {
		alert("Please provide at least one area.");
		return false;
	}
	
	if (confirm("Are you sure you want to proceed?") == false) {
		return false;
	}

	return true;
};