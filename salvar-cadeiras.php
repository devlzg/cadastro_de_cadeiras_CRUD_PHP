<?php 
  switch($_REQUEST["acao"]){
    case "cadastrar":
      $cadFabricante = $_POST["cadFabricante"];
      $cadModelo = $_POST["cadModelo"];

      $sql = "INSERT INTO cadeiras (cadFabricante, cadModelo) VALUES ('{$cadFabricante}', '{$cadModelo}')";

      $res = $conn ->query($sql);

      if($res==true){
        print "<script>alert('Cadastrado com sucesso!');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      } else{
        print "<script>alert('Não foi possível cadastrar.');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      }
    break;
    case "editar":
      $cadFabricante = $_POST["cadFabricante"];
      $cadModelo = $_POST["cadModelo"];

      $sql = "UPDATE cadeiras SET
                    cadFabricante ='{$cadFabricante}',
                    cadModelo ='{$cadModelo}'
                WHERE cadID=".$_REQUEST["id"];

      $res = $conn ->query($sql);

      if($res==true){
        print "<script>alert('Alterado com sucesso!');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      } else{
        print "<script>alert('Não foi possível alterar.');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      }
    break;
    case "excluir":

      $sql = "DELETE FROM cadeiras WHERE cadID=".$_REQUEST["id"];
      
      $res = $conn ->query($sql);

      if($res==true){
        print "<script>alert('Excluido com sucesso!');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      } else{
        print "<script>alert('Não foi possível excluir.');</script>";
        print "<script>location.href='?page=listar';</script>"; 
      }
    break;
  };
?>