<!-- Passo 7 - Começe a programar construindo o U do CRUD edit.php  -->

<?php

    //Pagian de Atualização
    
    // Include header
    include_once("templates/header.php")
?>

<div class="container">

    <!-- Botão de Voltar -->
    <?php include_once("templates/backbtn.html") ?>

    <h1 id="main-title">Editar Contato</h1>
    <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="post">

        <input type="hidden" name="type" value="edit">

        <!-- ID do Contato -->
        <input type="hidden" name="id" value="<?= $contact['id'] ?>">

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

        <!-- Botão para atualizar o formulario -->
        <button type="submit" class="btn btn-primary">atualizar</button>

    </form>
</div>

<?php
    // Include o footer da página
    include_once("templates/footer.php")
?>