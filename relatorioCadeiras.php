<?php
//Fará a conexão com o nosso banco de dados imaginaria
require_once("includes/conectarBD.php");
define('fpdf186/FPDF_FONTPATH', 'font/');
require('fpdf186/fpdf.php');
//Irá instanciar a classe. P=Retrato, mm =tipo de medida utilizada, no caso milímetros, tipo de folha = A4
$pdfCadeira = new FPDF("P","mm","A4");
$pdfCadeira->AddPage();
//Aqui, estamos definindo a fonte a ser utilizada
$pdfCadeira->SetFont('Arial', 'B', 10);
//Aqui, estamos definindo o cabeçalho do nosso relatório
//SetY: Move a abscissa atual de volta para margem esquerda e define a ordenada.
//Se o valor passado for negativo, ele será relativo à margem inferior da página. sintaxe: SetY(float y)
$pdfCadeira->SetY("13");
$pdfCadeira->Cell(0,5,utf8_decode('HyperSeat - Cadeiras de Alta Performance'),0,1,'R');
$pdfCadeira->Cell(0,0,'',1,1,'L');
//Ln: Faz uma quebra de linha. A abscissa corrente volta para a margem
//esquerda e a ordenada é somada ao valor passado como parâmetro.
//sintaxe: Ln([float h])
$pdfCadeira->Ln(8);
//Aqui, estamos definindo os Labels de Título do formulário
$pdfCadeira->Cell(20, 5, 'ID');
$pdfCadeira->SetX(30);
$pdfCadeira->Cell(20, 5, 'Fabricante');
$pdfCadeira->SetX(85);
$pdfCadeira->Cell(20, 5, 'Modelo');
$pdfCadeira->SetX(125);
// Busca os dados no banco de dados
$busca = mysqli_query($conn, "SELECT cadID, cadFabricante, cadModelo FROM cadeiras");
while ($resultado = mysqli_fetch_array($busca))
{
$pdfCadeira->ln(8);
$pdfCadeira->Cell(20, 5, $resultado['cadID']);
$pdfCadeira->SetX(30);
$pdfCadeira->Cell(20, 5, $resultado['cadFabricante']);
$pdfCadeira->SetX(85);
$pdfCadeira->Cell(20, 5, $resultado['cadModelo']);
$pdfCadeira->SetX(125);
}
// Aqui, estamos definindo o rodapé posicionado verticalmente com 270 mm
//e seus respectivos largura, altura e alinhamento
$pdfCadeira->SetY("270");
//Aqui, buscaremos a data atual do sistema
$data = date("d/m/Y");
$rodape = "impresso em: ".$data;
$logo = "Hyperseat";
$pdfCadeira->Cell(0,0,'',1,1,'L');
$pdfCadeira->Cell(0,5, $logo ,0,0,'L');
$pdfCadeira->Cell(0,5, $rodape ,0,1,'R');
//Aqui, é a saída do arquivo PDF
$pdfCadeira->Output( );
?>