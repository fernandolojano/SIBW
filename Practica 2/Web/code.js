// JavaScript Document

function openPanel() {
	document.getElementById("myCommentsPanel").style.opacity = "1";	
	document.getElementById("myCommentsPanel").style.zIndex="6";
	document.getElementById("buttonOpen").style.zIndex="0";

}


function closePanel(){
	document.getElementById("myCommentsPanel").style.opacity= "1";
	document.getElementById("myCommentsPanel").style.zIndex = "0";	
	document.getElementById("buttonOpen").style.zIndex="6";
	
}

function bannedWords(){
	var banned = new Array("lero", "reko", "nora");
	var checkComment = document.getElementById("Comentario").value;
	var error=0;

	for(var i = 0; i < banned.length;i++){
		var checkWord = banned[i];
		if((checkComment.toLowerCase()).indexOf(checkWord.toString())>-1){
			error = error+1;
		}
	}

	if(error>0){
		document.getElementById("Comentario").value.replace(/./igm, '*');
		alert("Bad word!");
	}


}


window.onload = function(){
document.getElementById("buttonOpen").onclick = openPanel;
document.getElementById("buttonClose").onclick = closePanel;
//document.getElementById("boton").onclick = createOpinion;
document.getElementById("Comentario").onkeyup = bannedWords;
}



/*
function createOpinion(){
	//var name = document.getElementById("Nombre");
	var email = document.getElementById("Correo");
	//var comment = document.getElementById("Comentario");
	

	
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(email)){
		alert("Email Correcto");
	} else {alert("Formato email incorrecto");}


}

*/






