<?php
// include_once "../../lib/mpdf/mpdf.php";
function Rpt_Generar_Pdf( $typeHoja = "A4")
{

		$mpdf = new mPDF('utf-8', $typeHoja );
		$mpdf->useOddEven = 1;	// Use different Odd/Even headers and footers and mirror margins

		# encabezado para PDF
		$header = Header_Pdf() ;
		$mpdf->SetHTMLHeader($header, 'O' ) ;
		$mpdf->SetHTMLHeader($header, 'E' ) ;

		# pie para PDF
		$footer = Footer_Pdf() ;
		$mpdf->SetHTMLFooter($footer , 'O' );
		$mpdf->SetHTMLFooter($footer , 'E' );

		$stylesheet = file_get_contents('./css/style-pdf.css');
		$mpdf->WriteHTML($stylesheet,1);

		return $mpdf ;

}

function Header_Pdf()
{
	$header = '
			<table class="table-pdf c12" >
				<tr class="pdf-header" >
					<td class="c6"> Selva Andina </td>
					<td class="c6 text-right" >{DATE d-m-Y}</td>
				</tr>
			</table>
	' ;

	return $header ;
}

function Footer_Pdf()
{
	$footer = '<table class="table-pdf c12" >
				<tr class="pdf-footer" >
					<td class="c6"> By Power Planeatec </td>
					<td class="c6 text-right" >{PAGENO}/{nbpg}</td>
				</tr>
			</table>' ;

	return $footer ;
}

// Rpt_Generar_Pdf("") ;