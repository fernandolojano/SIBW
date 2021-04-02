// JavaScript Document

function openPanel() {
	document.getElementById("myCommentsPanel").style.height = "100%";
	document.getElementById("myCommentsPanel").style.opacity = "1";	
	document.getElementById("buttonOpen").style.zIndex="1";

}


function closePanel(){
	document.getElementById("myCommentsPanel").style.height = "0";
	document.getElementById("myCommentsPanel").style.opacity= "0";
	document.getElementById("buttonOpen").style.zIndex="6";
}

window.onload = function(){
document.getElementById("buttonOpen").onclick = openPanel;
document.getElementById("buttonClose").onclick = closePanel;
	
}



