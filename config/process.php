<!-- Passo 3.2 - Começe a programar construindo o process.php  -->

<?php

    // Iniciar a sessão
    session_start();
    include_once("connection.php");
    include_once("url.php");

    // Recebe dados do formulário via POST
    $data = $_POST;

    // ------------------------------------------------------

    // Modificações no banco (CRUD - Create; Read; Update; Delete)
    if (!empty($data)) {
        
        //Criar cntato (CREATE)
        if ($data["type"] === "create") {
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];

            // Query de inscrição com placeholders
            $query = "INSERT INTO contacts (name, phone, observations) VALUES (:name, :phone, :observations)";

            // Preparar a query
            $stmt = $conn->prepare($query);

            // Substitui placeholders
            // bindParam() é um método do objeto PDO Statement que associa uma variavel PHP a um placeholder na query SQL preparada anteriormente.
            // No exemplo, a query contém o placeholder :name. Esta linha faz o bind da variável PHP $name para esse placeholder
            // Quando a query for executada, o PDO irá substituir :name pelo valor atual de $name de forma segura enviando SQL injection.
            $stmt->bindParam(":name", $name);

            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);

            try {
                // executar a query
                $stmt->execute();

                // Mensagem de sucesso
                $_SESSION["msg"] = "Contato criado com sucesso!";
            } catch (PDOException $e) {
                //capturar erros
                $error = $e->getMessage();
                echo "Error: $error";
            }

        // --------------------------------------------------
        // Código para atualizar (IPDATE)

        }else if($data["type"] === "edit") {
            $name = $data["name"];
            $phone = $data["phone"];
            $observations = $data["observations"];
            $id = $data["id"];

            // Query de atualização
            $query = "UPDATE contacts
                    SET name = :name, phone = :phone, observations = :observations
                    WHERE id = :id";
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":id", $id);

            try {
                
                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";
            } catch (PDOException $e) {
                //erro na conexão
                $error = $e->getMessage();
                echo "Error: $error";
            }

        // --------------------------------------------------
        // Codigo para deletar (DELETE)

        } else if($data["type"] === "delete") {

            $id = $data ["id"];
    
            // Query de remoção
            $query = "DELETE FROM contacts WHERE id = :id";
    
            $stmt = $conn->prepare($query);
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id);
    
            try{
                $stmt->execute();
                $_SESSION["msg"] = "Contato removido com sucesso!";
    
            } catch(PDOException $e){
                $error = $e->getMessage();
                echo "Erro> $error";
            }
        }
    
        header("Location:" . $BASE_URL . "../index.php");
    
    } else {
        $id;
    
        if(!empty($_GET)){
            $id = $_GET["id"];
        }
    
        if(!empty($id)){
    
            $query = "SELECT * FROM contacts WHERE id = :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt-> bindParam(":id", $id);
    
            $stmt->execute();
    
            $contact = $stmt->fetch();
        } else {
            $contacts = [];
    
            $query = "SELECT * FROM contacts";
    
            $stmt = $conn->prepare($query);
    
            $stmt->execute();
    
            $contacts = $stmt->fetchAll();
        }
    }
    
    $conn = null;