<!-- Passo 4 - Começe a programar construindo o R do CRUD index.php  -->

<!-- Ao terminar, ative o XAMPP, 
     abra o browser no localhost/agenda 
     e veja o resultado. -->


     <!-- Passo 4 - Começe a programar construindo o R do CRUD index.php  -->

<!-- Ao terminar, ative o XAMPP, 
     abra o browser no localhost/agenda 
     e veja o resultado. -->

     <?php 

//Página de Listagem (lista todos os contatos)
include_once("templates/header.php");

?>

<div class="container">

<!-- Exibe  mensagem de cada operação CRUD(se existir) 
OBS: Note as mensagens de erro e sucesso em config/processo.php-->

<?php if(isset($printMsg) && $printMsg != ''): ?>
     <p id="msg"><?= $printMsg ?></p>
<?php endif ;?>

<h1 id="main-title">Minha Agenda</h1>

<?php if(count($contacts) > 0) :?>

<table class="table" id="contacts-table">
<thead>
     <tr>
          <th scope="col">#</th>
          <th scope="col">Nome</th>
          <th scope="col">Telefone</th>
          <th scope="col"></th>
     </tr>
</thead>
<tbody>

<!-- O código percorre o array de $contacts e imprime ps dados de ada um em uma linha de tabela . com botões de editar e excluir -->
<?php foreach($contacts as $contact):?>
     <tr>
      <td scope="row" class="col-id"><?=$contact["id"]?></td>
      <td scope="row"><?=$contact["name"]?></td>
      <td scope="row"><?=$contact["phone"]?></td>

      <!-- Botões de ação para cada contato (Visualizar, Editar e Excluir) -->
      <td class="actions">
          <a href="<?=$BASE_URL?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
          <a href="<?=$BASE_URL?>edit.php?id=<?= $contact["id"] ?>"><i class="fas fa-edit edit-icon"></i></a>
          
          <form class="delete-form" action="<?= $BASE_URL?>/config/process.php" method="POST">
          <input type="hidden" name="type" value="delete">
          <input type="hidden" name="id" value="<?= $contact["id"]?>">
          <button type="submit" onclick="confirmDelete()" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
     </form>
      </td>
     </tr>
     <?php endforeach; ?>
</tbody>
</table>
<?php else: ?>

<!-- Exibe a mensagem(Ainda não há contatos na sua agenda) se não tiver contatos -->
<p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL?>create.php">clique aqui para adicionar</a>.</p>
<?php endif; ?>     
</div>

<script>

//Função para confirmar exclusão de contato (No Alert do navegador)
function confirmDelete() {
let confirmDelete = confirm("Tem certeza que deseja excluir este contato ?");
if(!confirmDelete) {
     event.preventDefault();
}
}
</script>

<?php

//Inclui footer
include_once("templates/footer.php");

?>