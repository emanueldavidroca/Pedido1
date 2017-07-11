$(document).ready(function(){
	$("#idCantidad").change(function(){
		truncado();
	});
});	
	function truncado(){
		var numero= 1.2;
		var numero= numero.toPrecision(1);
		console.log(/*no anda todabia */);
}