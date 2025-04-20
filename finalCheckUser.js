let newUser = document.querySelector("#newUser");

let emailWidget = document.querySelector("#email");
let emailErr = document.querySelector("#emailErr");

let usernameWidget = document.querySelector("#username");
let usernameErr = document.querySelector("#usernameErr");

let passwordWidget = document.querySelector("#password");
let passwordErr = document.querySelector("#passwordErr");

function checkForm(event) {
	
	if (emailWidget.value == null || emailWidget.value == "") {
		emailErr.style.visibility = "visible";
		event.preventDefault();
	}
	
	if (usernameWidget.value == null || usernameWidget.value == "") {
		usernameErr.style.visibility = "visible";
		event.preventDefault();
	}
	
	if (passwordWidget.value == null || passwordWidget.value == "") {
		passwordErr.style.visibility = "visible";
		event.preventDefault();
	}
}

newUser.addEventListener("submit", checkForm);