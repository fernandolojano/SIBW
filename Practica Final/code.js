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
	document.getElementById("myCommentsPanel").style.overflow ="hidden";
	
}

function starsReplace(comment){
	var stars = "";
	for(var i=0; i < comment.length; i++){
		stars+="*";
	}
	return stars;
}


function bannedWords(){
	var checkComment = document.getElementById("Comentario").value;
	var error=0;
	for(var i = 0; i < banned.length;i++){
		var checkWord = banned[i];
		if((checkComment.toLowerCase()).indexOf(checkWord.toString())>-1){
			var newWord = checkComment.replace(checkComment,starsReplace(checkComment));
			
			error = error+1;
		}
	}
	if(error>0){
		document.getElementById("Comentario").value = newWord;
	}
}

function mailValidator(correo) {
	 if (/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo)) {
        return true;
		
	} 
	else {
		alert('Formato email incorrecto');
		return false;
	}
}

function checkEmpty(name, title, comment){
	if(name!='' && title!='' && comment!=''){
		return true;
	}
	else{
		alert("Por favor, rellene todos los campos antes de continuar");
		return false;
	}

}


document.getElementById("boton").addEventListener("click",function createComment(e){
	var name = document.getElementById("Nombre").value;
	var email = document.getElementById("Correo").value;
	var commentTitle = document.getElementById("TituloComentario").value;
	var today = new Date();
	var datePost = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
	var comment = document.getElementById("Comentario").value;

	if(checkEmpty(name,commentTitle,comment) && mailValidator(email)){
		alert('Done!');

	}
	return false;

});




window.onload = function(){
document.getElementById("buttonOpen").onclick = openPanel;
document.getElementById("buttonClose").onclick = closePanel;
document.getElementById("Comentario").onkeyup = bannedWords;
}





