<section class="produtos">
        <div class="produtos-titulo">
            <h1>Lista de Produtos</h1>
        </div>
            <div class="container">
            <div class="btn-add-container">
                <a href="?page=novo"><button type="submit" class="btn-add">Adicionar Produto<i class='bx bx-plus'></i></button></a>
            </div>
            <div class="btn-add-container">
                <a href="?page=listar"><button type="submit" class="btn-add">Voltar<i class='bx'></i></button></a>
            </div>
            <?php 
            print "<form action='?page=pesquisar' method='POST'>";
            ?>
                    <input type="hidden" name="acao" value="pesquisar">
                    <input type="text" placeholder="Digite o modelo ou fabricante..." name="cadPesquisa" id="fabricanteProduto">
                    <label for="aplicar" class="aplicar">
                    <button type="submit">Pesquisar</button>
                    </label>
                </label>
            </form>
            </div>
        </div>
    </section>

    <section class="produtos-lista">
        <div class="container-tabelas">
<!-- As linhas da tabela serão inseridas aqui dinamicamente -->
<?php
  $cadPesquisa = $_POST["cadPesquisa"];
  $sql = "SELECT * FROM cadeiras WHERE cadModelo='$cadPesquisa' OR cadFabricante='$cadPesquisa'";
  $res = $conn->query($sql);

  $qtd = $res->num_rows;
  if($qtd > 0){
    
print   "<table class='tabela-itens'>";
print        "<thead>";
print            "<tr>";
print                "<th>ID</th>";
print                "<th>Fabricante</th>";
print                "<th>Modelo</th>";
print                "<th>Alterar</th>";
print                "<th>Remover</th>";
print            "</tr>";
print        "</thead>";
print        "</table>";
print   "<table class='tabela-produtos' id='corpoTabela'>";
print       "<tbody>";
    while($row = $res->fetch_object()){
    print "<tr>";
    print "<td>".$row->cadID."</td>";
    print "<td>".$row->cadFabricante."</td>";
    print "<td>".$row->cadModelo."</td>";
    print "<td> <a onclick=\"location.href='?page=editar&id=".$row->cadID."';\"><i class='bx bxs-edit-alt'></i></a>  </td>";  

    print "<td> <a onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar&acao=excluir&id=".$row->cadID."';}else{false;}\" ><i class='bx bxs-trash-alt'></i></a> </td>";
    print "</tr>";
    };
    print               "</tbody>";
    print           "</table>";
    print       "</div>";
    print   "</section>";
  } else{
    print "<p class='alert alert-danger'>Nenhum produto cadastrado.</p>";
  }
?> 
    <!-- <script src="produtos.js"></script> -->
</body>
</html>