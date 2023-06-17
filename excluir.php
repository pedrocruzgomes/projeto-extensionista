<?php
include 'conexao.php';

if (!isset($_GET['id'])) {
  die("Erro: ID não especificado.");
}

$id = $_GET['id'];

$sql = "DELETE FROM aluno WHERE id = ?";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
  header("Location: tabela.php");
} else {
  die("Erro ao excluir o aluno: " . $conexao->error);
}
