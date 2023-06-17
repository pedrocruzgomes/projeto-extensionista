<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  include 'conexao.php';

  if ($conexao->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
  }

  if (isset($_POST['nome']) && isset($_POST['sobrenome']) && isset($_POST['email'])) {
    $novoNome = $_POST['nome'];
    $novoSobrenome = $_POST['sobrenome'];
    $novoEmail = $_POST['email'];

    $sqlUpdate = "UPDATE aluno SET nome = '$novoNome', sobrenome = '$novoSobrenome', email = '$novoEmail' WHERE id = $id";

    if ($conexao->query($sqlUpdate) === TRUE) {
      $conexao->close();

      header("Location: tabela.php");
      exit;
    } else {
      echo "Erro ao atualizar o registro: " . $conexao->error;
    }

    $conexao->close();
    exit;
  }

  $sql = "SELECT nome, sobrenome, email FROM aluno WHERE id = $id";
  $result = $conexao->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nome = $row['nome'];
    $sobrenome = $row['sobrenome'];
    $email = $row['email'];
  } else {
    echo "<p>Erro: Aluno não encontrado.</p>";
    exit;
  }

  $conexao->close();
} else {
  echo "<p>Erro: ID não fornecido.</p>";
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Atualizar Aluno</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #D3D3D3;
    }

    .form-control {
      border-radius: 15px;
    }

    .btn-success {
      border-radius: 15px;
    }

    .btn-info {
      border-radius: 15px;
    }

    .form-txt {
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mt-4">ATUALIZAR CADASTRO DE ALUNO</h1>

    <form action="alterar.php?id=<?php echo $id; ?>" method="POST">
      <div class="form-group">
        <label class="form-txt" for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-txt" for="sobrenome">Sobrenome:</label>
        <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>" required>
      </div>
      <div class="form-group">
        <label class="form-txt" for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
      </div>
      <button type="submit" class="btn btn-success">Salvar</button>
      <a href="tabela.php" class="btn btn-info">Voltar</a>
    </form>
  </div>
</body>
</html>