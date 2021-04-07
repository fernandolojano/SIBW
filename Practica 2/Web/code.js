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
	var banned = new Array("tonto", "tonta", "estupido", "estupida", "imbecil", "aburrido", "aburrida");
	var checkComment = document.getElementById("Comentario").value;
	var wordsList = checkComment.split(" ");
	var singleWord = wordsList.pop();

	for(var i = 0; i < banned.length;i++){
		var checkWord = banned[i];
		if((checkWord.toLowerCase()).indexOf(wordsList)!=-1){
			var newWord = checkComment.replace(checkComment,starsReplace(checkComment));
			
			checkComment.value = newWord;
		}
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
	e.preventDefault();
	var name = document.getElementById("Nombre").value;
	var email = document.getElementById("Correo").value;
	var commentTitle = document.getElementById("TituloComentario").value;
	var today = new Date();
	var datePost = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
	var comment = document.getElementById("Comentario").value;

	if(checkEmpty(name,commentTitle,comment) && mailValidator(email)){
		var newComm =document.getElementById("opinion").cloneNode(true);
		newComm.innerHTML = '<h3 class="mainTitle">'+commentTitle+
		'<h4 class="authorOpinion"><i>'+name+'</i></h4><h5 class="dateOpinion">'+datePost+
		'</h5><p><cite>'+comment+' </cite></p>';
		document.getElementById("myCommentsPanel").appendChild(newComm);
		alert('Done!');

	}
	return false;

});




window.onload = function(){
document.getElementById("buttonOpen").onclick = openPanel;
document.getElementById("buttonClose").onclick = closePanel;
document.getElementById("Comentario").onkeyup = bannedWords;
}





