<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $data = $_POST;

    //MODIFICAÇÃO DE DADOS
    if(!empty($data)) {
        //CRIAR CONTATO
        if($data["type"] == "create") {
            $nome = $data["nome"];
            $telefone = $data["telefone"];
            $email = $data["email"];
            $observacao = $data["observacoes"];
    
            $query = "INSERT INTO contatos (nome, telefone, email, observacoes) VALUES (:nome, :telefone, :email, :observacoes)";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":observacoes", $observacao);
            
            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato criado com sucesso!";
        
            } catch (PDOException $e) {
                //Erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        // EDITAR CONTATO
        } else if($data["type"] == "edit") {
            $nome = $data["nome"];
            $telefone = $data["telefone"];
            $email = $data["email"];
            $obervacoes = $data["obervacoes"];
            $id = $data["id"];

            $query = "UPDATE contatos SET nome = :nome, telefone = :telefone, email = :email, observacoes = :observacoes WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":observacoes", $observacoes);
            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato atualizado com sucesso!";
        
            } catch (PDOException $e) {
                //Erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        // DELETA CONTATO
        } else if($data["type"] == "delete") {
            $id = $data["id"];

            $query = "DELETE FROM contatos WHERE id = :id";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":id", $id);

            try {
                $stmt->execute();
                $_SESSION["msg"] = "Contato removido com sucesso!";
        
            } catch (PDOException $e) {
                //Erro na conexão
                $error = $e->getMessage();
                echo "Erro: $error";
            }
        }

        // REDIRECT HOME
        header("location:" . $BASE_URL . "/../index.php");

    //SELECÃO DE DADOS
    } else {
        $id;

        if(!empty($_GET)) {
            $id = $_GET["id"];
        }
    
        // Retorna o dado de um contato
        if(!empty($id)) {
            $query = "SELECT * FROM contatos WHERE id = :id";
    
            $stmt = $conn->prepare($query);
    
            $stmt->bindParam(":id", $id);
    
            $stmt->execute();
    
            $contact = $stmt->fetch();
        } else {
            // Retorna todos os contatos
            $contacts = [];
    
            $query = "SELECT * FROM contatos";
    
            $stmt = $conn->prepare($query);
    
            $stmt->execute();
    
            $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }  
    }

    // FECHAR CONEXÃO
    $conn = null;
 