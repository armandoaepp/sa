<?php
include ("../models/Enlace.php");
?>

<!doctype html>
<html lang="es">
<head>
    <?php $xajax->printJavascript();?>

	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<link rel="stylesheet" href="./css/style2014.css">

	<title></title>
</head>
<style>

body{
	background: #E1E4EB;
}
.contenedor{
	margin-top: 15%!important
}

#login{
  max-width:400px;
  margin:0 auto;
  margin-top:8px;
  margin-bottom:2%;
  transition:opacity 1s;
  -webkit-transition:opacity 1s;


}


#login h1{
  background:#3399cc;
  padding:20px 0;
  font-size:140%;
  font-weight:300;
  text-align:center;
  color:#fff;
}

form{
  background:#f0f0f0;
  padding:6% 4%;
}

.c12 fieldset input.caja-text{
  width:92%!important;
  background:#fff;
  margin-bottom:4%!important;
  border:1px solid #ccc;
  padding:1% 4%!important;
  height: 35px ;
}
.c12 fieldset span.pre{
  height: 35px ;
  font-size: 20px;
  color: #2288bb;


}

button{
  width:100%;
  background:#3399cc;
  border:0;
  padding:4%;
  font-family: 'open_sans_regular',sans-serif;
  font-size:100%;
  color:#fff;
  cursor:pointer;
  transition:background .3s;
  -webkit-transition:background .3s;

  -webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-radius: 8px;
	font-size: 20px ;
}

button:hover{
  background:#2288bb;
}
#msjlogueo{
	color: red ;
}
fieldset input{ text-transform: none!important}
@media only screen and (max-width : 480px)  {

	.contenedor{
		margin-top: 1%!important
	}
	.c12 fieldset input.caja-text{
	  width:90%!important;
	}

}
</style>
<script type='text/javascript'>
		document.onkeypress=function(e){
		//capturo todos los campos o puedo especificar el campo especifico
		var boton=(document.all);
		// var boton=(document.getElementById("btningresar"));
		//funcion abrevidad de if else
		tecla=(boton) ? event.keyCode : e.which;
		//si tecla es igual a enter, es decir 13 que ejecute el click
		if(tecla==13){
			document.getElementById("btnIngresar").click();
			//return false;
		  }
		}
	</script>
<body>

<div id="login" class="contenedor">
 <!--  <div id="triangle"></div> -->
  <h1>Log in</h1>
  <form  class="hform" id="frmLogin"  name="frmLogin">

	<fieldset class="c12 ">
		<fieldset class="row ">
		    <span class="pre icon-user"></span>
		    <input type="text" class="pre caja-text" name="Usuario_" id="Usuario_" placeholder="Usuario"  onfocus required>
		</fieldset>
	</fieldset>

	<fieldset class="c12 ">
		<fieldset class="row ">
		    <span class="pre icon-lock"></span>
		    <input type="text" class="pre caja-text" name="UsuarioPassword_" id="UsuarioPassword_" placeholder="Password" required>
		</fieldset>
	</fieldset>
	<button  id="btnIngresar" type="button" onclick="xajax_Validar_Acceso(xajax.getFormValues(frmLogin))"> Ingresar</button>

  </form>
	        <div id="msjlogueo" class="text-center"></div>
</div>


</body>
</html>