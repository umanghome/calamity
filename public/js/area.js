var toggleButton = document.getElementById("toggle-button");
var updateForm = document.getElementById("update-form");
var charCount = document.getElementById("char-count");
var inputField = document.getElementById("post_content");
var submitButton = document.getElementById("post-button");

toggleButton.onclick = function() {
	updateForm.className = "";
};

inputField.onkeyup = function() {
	if (inputField.value.length > 500) {
		charCount.className="text-red pull-right";
	} else {
		charCount.className="text-black pull-right";
	}

	charCount.innerHTML = 500 - inputField.value.length;
};

submitButton.onclick = function() {
	if (inputField.value.length == 0 || inputField.value.length > 500) {
		alert("The character count must be between 1 and 500.");
		return false;
	}
	return true;	
};