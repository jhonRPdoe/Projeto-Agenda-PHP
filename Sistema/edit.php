<?php
    include_once("templates/header.php")
?>
    <div class="container">
        <?php include_once("templates/backbtn.html"); ?>
        <h1 id="main-title">Editar Contato</h1>
        <form id="create-form" action="<?= $BASE_URL ?>/config/process.php" method="post">
            <input type="hidden" name="type" value="edit">
            <input type="hidden" name="id" value="<?= $contact["id"]; ?>">
            <div class="form-group">
                <label for="nome">Nome do contato:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?= $contact["nome"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone do contato:</label>
                <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" value="<?= $contact["telefone"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">email do contato:</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" value="<?= $contact["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="observacoes">Observações:</label>
                <textarea type="text" class="form-control" id="observacoes" name="observacoes" placeholder="Insira qualquer informação útil" rows="3"><?= $contact["observacoes"]; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
<?php
    include_once("templates/footer.php")
?>