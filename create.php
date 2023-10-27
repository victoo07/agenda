<?php

    // Pagina de Criação

    // Include o header da página
    include_once("templates/header.php");
?>

<div class="container">

    <!-- Incliude o botão Voltar -->
    <?php include_once("templates/backbtn.html"); ?>

    <h1 id="main-title">Criar contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">

        <input type="hidden" name="type" value="create">

        <!-- Campos do formulario para entrada de dados do contato -->
        <div class="form-group">
            <label for="name">Nome do Contato</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" require>
        </div>

        <div class="form-group">
            <label for="Phone">Telefone do Contato</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone" require>
        </div>

        <div class="form-group">
            <label for="name">Observações</label>
            <input type="text" class="form-control" id="observations" name="observations" placeholder="Digite as observações" require>
        </div>

        <!-- Botão para submeter o formulario -->
        <button type="submit" class="btn btn-primary">Cadastrar</button>

    </form>

</div>

<?php
    // Include o footer da página
    include_once("templates/footer.php")
?>