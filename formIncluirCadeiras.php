<section class="produtos-cadastro">
        <div class="cadastro-titulo">
            <h1>Cadastre seu Produto</h1>
        </div>
        <div class="produtos-form">
            <form action="?page=salvar" method="POST">
                    <input type="hidden" name="acao" value="cadastrar">
                <div class="form-fabricante">Fabricante:</div>
                    <input type="text" name="cadFabricante" id="fabricanteProduto" autofocus required>
                <div class="form-modelo">Modelo:</div>
                    <input type="text" name="cadModelo" id="modeloProduto" required>
                <label for="aplicar" class="aplicar">
                    <br><button type="submit">Cadastrar</button>
                </label>
            </form>
        </div>
    </section>
    <!-- <script src="produtos.js"></script> -->
</body>
</html>