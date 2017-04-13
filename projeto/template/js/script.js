
var bts = document.getElementsByClassName("edicao")

for (var i = bts.length - 1; i >= 0; i--) {
	bts[i].addEventListener('click',function(){
		var id = this.getAttribute("text");
		mostrar("bloco_"+id);
	});
}
 
function mostrar(elt){
	var bloco = document.getElementById(elt);	
	bloco.setAttribute("style","display:block");
}
function esconder(elt){
	var bloco = document.getElementById(elt);
	bloco.setAttribute("style","display:none");
}