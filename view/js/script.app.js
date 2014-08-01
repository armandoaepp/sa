;

var jq= jQuery.noConflict();

function js_seleccionar_fila(numFila)
{
	// Hacemos Visible el Hermono Oculta
	jq('#tbodyData>tr').removeClass("add-background-tr") ;
	jq('#tr'+numFila).addClass("add-background-tr") ;
	jq('#tr'+numFila).addClass("add-background-tr") ;
	jq('#rdCodigo'+numFila).prop("checked", true) ;
	// console.log(numFila) ;
}

function Calendar_Load(id){
		  jq( "#"+id ).datepicker();
}
function Calendar_Combo(id){
	jq("#"+id ).datepicker({
		yearRange: "-90:+5",
		changeMonth: true,
		changeYear: true,
		dateFormat: "dd/mm/yy"
	});
}
function Calendar_Combo_MaxDate(id){
	  jq( "#"+id ).datepicker({
	  		yearRange: "-90:+5",
			changeMonth: true,
			changeYear: true,
			maxDate: "0D"
	  	});
}

// cargar el calendario atraves de un clase jquery para
// funciones tienen que estar cargada la clase
function Calendar_Class(ClassCSS){
		  jq( "."+ClassCSS ).datepicker();
}


function Calendar_Objeto(obj){
		  jq(obj).datepicker();
}

function Calendar_MaxDate(id){
	  jq( "#"+id ).datepicker({
			maxDate: "0D"
	  	});
}

function Calendar_Min_Max(idMIn , IdMax)
{
	// jq(function () {
		jq("#"+idMIn).datepicker({
			maxDate: "0D",
			onClose: function (selectedDate) {
				jq("#"+IdMax).datepicker("option", "minDate", selectedDate);
			}
		});
		jq("#"+IdMax).datepicker({
			maxDate: "0D",
			onClose: function (selectedDate) {
				jq("#"+idMIn).datepicker("option", "maxDate", selectedDate);
			}

		});
}

function Calendar_Rango(idMIn , IdMax)
{
		jq("#"+idMIn).datepicker({
			onClose: function (selectedDate) {
				jq("#"+IdMax).datepicker("option", "minDate", selectedDate);
			}
		});
		jq("#"+IdMax).datepicker({
			onClose: function (selectedDate) {
				jq("#"+idMIn).datepicker("option", "maxDate", selectedDate);
			}

		});
}

// HORA
function Hora(id)
{
	jq('#'+id).timepicker({
		timeOnlyTitle:'Hora',
		hourMin:0,
		hourMax:23
	 });
	 // jq('#'+id).datetimepicker();
}
// calendar hora
function Hora_CLass(ClassCSS)
{
	jq('.'+ClassCSS).timepicker({
		timeOnlyTitle:'Hora',
		hourMin:0,
		hourMax:23
	 });
	 // jq('#'+id).datetimepicker();
}


function js_checked(id , estado) {
	jq("#"+id).attr('checked', estado);
}


// VALIDAR UN CAMPO TYPE: NUMERO
function Validar_Number(obj){
	 jq(obj).validCampoAPP('0123456789');
}
// VALIDAR UN CAMPO TYPE: TELEFONO
function Validar_Telefono(obj){
	 jq(obj).validCampoAPP('0123456789#*');
}
// VALIDAR UN CAMPO TYPE: TEXTO
function Validar_Text(obj)
{
	 jq(obj).validCampoAPP('abcdefghijklmnñopqrstuvwxyzáéíóú ');
}
// VALIDAR UN CAMPO TYPE: TEXTO Y NUMERO
function Validar_Text_Number(obj)
{
	jq(obj).validCampoAPP('abcdefghijklmnñopqrstuvwxyzáéíóú0123456789 ');
}
// VALIDAR UN CAMPO TYPE: NUMERO DECIMAL
function Validar_Decimal(id){
	 jq(obj).validCampoAPP('0123456789.');
}

function Validar_Number_Class(classCSS){
	 jq('.'+classCSS).validCampoAPP('0123456789');
}
// PARA AGREGAR FOCUS AL INPUT
function Validar_Nombre_Onfocus(id){
	jq(document).on("focus","#"+id,function(){
		jq('#'+id).validCampoAPP('0123456789');
	});
}

function Validar_Moneda(ClassCSS){
	 jq('.'+ClassCSS).validCampoAPP('0123456789.');
}

function Validar_Decimal_Class(ClassCSS){
	 jq('.'+ClassCSS).validCampoAPP('0123456789.');
}


