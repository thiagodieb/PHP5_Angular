//alert("ola pagina html - 2");

var num1 = 10;

function alteracaoPorValor(v){
	v = 15;
}
alteracaoPorValor(num1);
console.log(num1);



var pessoa = {'nome':'Cremilda','idade':45};

function alteracaoPorReferencia(ob){
	ob.cpf = "123.112.123-34";
}
alteracaoPorReferencia(pessoa);
console.log(pessoa);
