    <section class="produtos-cadastro">
        <div class="cadastro-titulo">
            <h1>Alterar Produto</h1>
        </div>

    <?php 
        $sql = "SELECT * FROM cadeiras WHERE cadID=".$_REQUEST["id"];
        $res = $conn->query($sql);
        $row = $res->fetch_object();
    ?>

        <div class="produtos-form">
            <form name="form" id="form" action="?page=salvar" method="POST">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php print $row->cadID; ?>">
                
                <div class="form-fabricante">Fabricante:</div><input required type="text" id="fabricanteProduto" name="cadFabricante" value="<?php print $row->cadFabricante; ?>">
                <div class="form-modelo">Modelo:</div><input required type="text" id="modeloProduto" name="cadModelo" value="<?php print $row->cadModelo; ?>">
            
            <label for="aplicar" class="aplicar">
                <br><button>Alterar</button>
            </label>
            </form>
        </div>
    </section>
    <!-- <script src="produtos.js"></script> -->
</body>
</html>