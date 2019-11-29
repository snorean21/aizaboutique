function crearPDFcategorys(){
	var filtro = document.getElementsByTagName("input")[1].value;
	if(filtro == "" || filtro == null){
	  filtro = "SinFiltro";
	}

	window.open('/category/pdf/'+ filtro);
}
function crearPDFproducts(){
	var filtro = document.getElementsByTagName("input")[1].value;
	if(filtro == "" || filtro == null){
	  filtro = "SinFiltro";
	}
	window.open('/product/pdf/'+ filtro);
}