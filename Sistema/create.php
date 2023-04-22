<?php
    include_once("templates/header.php")
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Criar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>/config/process.php" method="post">
            <input type="hidden" name="type" value="create">
            <div class="form-group">
                <label for="nome">Nome do contato:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone do contato:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required>
            </div>
            <div class="form-group">
                <label for="email">email do contato:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email">
            </div>
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Insira qualquer informação útil" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php")
?>