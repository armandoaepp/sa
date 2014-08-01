;
/*CAPTURAR EL ANCHO DEL NAVEGADOR*/
	function dimensiones_navegador()
	{
		var tamanio = [0, 0];
		// PARA QUE JQUERY NO HAGA COMFLICTO CON LA DEMAS LIBRERIAS
		var jqn= jQuery.noConflict();
	 	// ancho y alto del navegador
	 	width_navegador = jqn(window).width();
	 	height_navegador = jqn(window).height();
		tamanio = [width_navegador, height_navegador]
		return tamanio ;
	}
/*OCULTANDO EMERGENTE*/
	function ocultar_emergente()
	{
		var jqn= jQuery.noConflict();
		jqn("#emergente").css("display","none");
		jqn("#emergente").css("left","");
		jqn("#emergente").css("top","");
		jqn("#emergente").css("height","");
		jqn("#vidrio").css("display","none");

		return false;
	}
/*EJECUTAR FUNCION AL REDIMENCIONAR VENTANA*/
	window.onresize = function()
	{
		if (window.document.getElementById("vidrio_espera_")!==null) {
		    if(window.document.getElementById("vidrio_espera_").style.display == "block" && window.document.getElementById("popup_espera_").style.display == "block")
		    {
		        abrir_popup_espera();
		    }
		}
		if (window.document.getElementById("vidrio")!==null && window.document.getElementById("emergente")!==null) {
		    if(window.document.getElementById("vidrio").style.display == "block" && window.document.getElementById("emergente").style.display == "block")
		    {
		        mostrar_emergente();
		    }
		}
	}
/*MOSTRANDO EMERGENTE*/
	function mostrar_emergente()
	{
		// PARA QUE JQUERY NO HAGA COMFLICTO CON LA DEMAS LIBRERIAS
		var jqn= jQuery.noConflict();
	 	// ancho y alto del navegador
	 	// w = jqn(window).width();
	 	// h = jqn(window).height();
	 	var dimensiones =  dimensiones_navegador() ;
		var width =  dimensiones[0];
		var height =  dimensiones[1];

		// ancho y alto del emergente
		var ancho_popup = jq("#emergente").width() ;
		var alto_popup  = jq("#emergente").height();


	   //Centrar el popup
	   w = (width/2) - (ancho_popup/2) - 5 ;
	   h = (height/2) - (alto_popup/2);
		// darle posicion del div
		jqn("#emergente").css("left",w + "px");
		jqn("#emergente").css("top",h + "px");
		jqn("#vidrio").css("display","block");
		//  animamos
		jqn("#emergente").fadeIn(1000);
	     // jq("#emergente").slideDown();
	     return false;
	}


/*MOSTRANDO EMERGENTE*/
	function abrir_popup_espera()
	{
		var ancho_alto		= dimensiones_navegador();
		var ancho_navegador = ancho_alto[0];
		var alto_navegador	= ancho_alto[1];

		var ancho_popup	= 126;
		var alto_popup	= 126;

		var left	= (ancho_navegador - ancho_popup) / 2;
		var top	= (alto_navegador - alto_popup) / 2;

		xajax.$('popup_espera_').style.left	= left + "px";
		xajax.$('popup_espera_').style.top	= top + "px";

		xajax.$('vidrio_espera_').style.display="block";
		xajax.$('popup_espera_').style.display="block";
		console.log(left+" - "+ top) ;
	}
/*OCULTANDO EMERGENTE*/
	function cerrar_popup_espera()
	{
		xajax.$('vidrio_espera_').style.display="none";
	    xajax.$('popup_espera_').style.display="none";

	}


/*ABRIR Y CERRAR AUTOMATICAMENTE EMERGENTE*/
    function mostrar()
    {
        abrir_popup_espera();
    }
    function ocultar()
    {
        cerrar_popup_espera();
    }

    xajax.callback.global.onRequest = mostrar;
    xajax.callback.global.onComplete = ocultar;
