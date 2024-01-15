<?php 
include 'includes/cabecalho.php';
?>

<!-- CREATE TABLE cadeiras ( 

cadID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT, 

cadFabricante VARCHAR(100) NULL, 

cadModelo VARCHAR(100) NULL, 

PRIMARY KEY(cadID) 

);  -->

<div>
    <?php 
    include("./includes/conectarBD.php");
    switch(@$_REQUEST["page"]){
      case "novo":
          include("formIncluirCadeiras.php");
          break;
      case "listar":
          include("produtos.php");
          break;
      case "salvar":
          include("salvar-cadeiras.php");
          break;
      case "editar":
          include("formAlterarCadeiras.php");
          break;
      case "error":
          include("erro.php");
          break;
      case "pesquisar":
          include("pesquisarCadeiras.php");
          break;
      default: 
          include("home.php");
      };
    ?>

<?php 
include 'includes/rodape.php';
?>
