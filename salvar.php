<?php
include 'conexao.php';

if (isset($_POST['nome'], $_POST['sobrenome'], $_POST['email'], $_POST['operacao'])) {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $operacao = $_POST['operacao'];

    switch ($operacao) {
        case 'adicionar':
            $sql = "INSERT INTO aluno (nome, sobrenome, email) VALUES (?, ?, ?)";

            if ($stmt = $conexao->prepare($sql)) {
                $stmt->bind_param("sss", $nome, $sobrenome, $email);

                if ($stmt->execute()) {
                    header('Location: tabela.php');
                    exit;
                } else {
                    echo "Erro: " . $stmt->error;
                }
            } else {
                echo "Erro: " . $conexao->error;
            }
            break;
        case 'atualizar':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $sql = "UPDATE aluno SET nome = ?, sobrenome = ?, email = ?, WHERE id = ?";

                if ($stmt = $conexao->prepare($sql)) {
                    $stmt->bind_param("sssi", $nome, $sobrenome, $email, $id);

                    if ($stmt->execute()) {
                        header('Location: tabela.php');
                        exit;
                    } else {
                        echo "Erro: " . $stmt->error;
                    }
                } else {
                    echo "Erro: " . $conexao->error;
                }
            } else {
                echo "ID do aluno não fornecido.";
            }
            break;
        default:
            echo "Operação inválida.";
            break;
    }
} else {
    header('Location: adicionar.php');
    exit;
}

$conexao->close();
?>