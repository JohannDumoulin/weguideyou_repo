

var btns = document.getElementsByClassName("toggleModalProfil")
var menu = document.getElementById("menuProfil")
var body = document.getElementsByTagName("body")[0]

for(btn of btns) {
	btn.addEventListener("click", function() {
		menu.classList.toggle("hidden")
		body.classList.toggle("t")
	})
}

