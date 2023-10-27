<!-- Passo 6 - Começe a programar construindo o show.php  -->

<?php
    include_once("templates/header.php");
?>

    <div clas="container" id="view-contact-container">
        
        <?php include_once("templates/backbtn.html"); ?>

        <h1 id="main-title"><?= $contact["name"]?></h1>
        <p class="bold">Telefone</p>
        <p class="form-control"><?=$contact["phone"]?></p>
        <p class="bold">Telefone</p>
        <p class="form-control"><?=$contact["observations"]?></p>
</div>

<?php
    include_once("templates/footer.php");
?>