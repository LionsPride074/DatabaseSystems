let newReview = document.querySelector("#newreview");

let titleWidget = document.querySelector("#title");
let titleErr = document.querySelector("#titleErr");

let gameplay1Widget = document.querySelector("#gameplay1");
let gameplay2Widget = document.querySelector("#gameplay2");
let gameplay3Widget = document.querySelector("#gameplay3");
let gameplay4Widget = document.querySelector("#gameplay4");
let gameplay5Widget = document.querySelector("#gameplay5");
let gameplayErr = document.querySelector("#gameplayErr");

let graphics1Widget = document.querySelector("#graphics1");
let graphics2Widget = document.querySelector("#graphics2");
let graphics3Widget = document.querySelector("#graphics3");
let graphics4Widget = document.querySelector("#graphics4");
let graphics5Widget = document.querySelector("#graphics5");
let graphicsErr = document.querySelector("#graphicsErr");

let wb1Widget = document.querySelector("#wb1");
let wb2Widget = document.querySelector("#wb2");
let wb3Widget = document.querySelector("#wb3");
let wb4Widget = document.querySelector("#wb4");
let wb5Widget = document.querySelector("#wb5");
let wbErr = document.querySelector("#wbErr");

function checkForm(event) {
	
	if (titleWidget.value == null || titleWidget.value == "") {
		titleErr.style.visibility = "visible";
		event.preventDefault();
	}
	
	if (!gameplay1Widget.checked && !gameplay2Widget.checked && !gameplay3Widget.checked && !gameplay4Widget.checked && !gameplay5Widget.checked) {
		gameplayErr.style.visibility = "visible";
		event.preventDefault();
	}
	if (!graphics1Widget.checked && !graphics2Widget.checked && !graphics3Widget.checked && !graphics4Widget.checked && !graphics5Widget.checked) {
		graphicsErr.style.visibility = "visible";
		event.preventDefault();
	}
	if (!wb1Widget.checked && !wb2Widget.checked && !wb3Widget.checked && !wb4Widget.checked && !wb5Widget.checked) {
		wbErr.style.visibility = "visible";
		event.preventDefault();
	}
}

newReview.addEventListener("submit", checkForm);