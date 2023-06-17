<!DOCTYPE html>
<html>
<head>
  <title>Registro de Aluno</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <br>
    <h2>REGISTRAR NOVO ALUNO</h2>
    <form action="salvar.php" method="post">
      <div class="form-group">
        <label class="form-txt" for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do aluno" required>
      </div>
      <div class="form-group">
        <label class="form-txt" for="sobrenome">Sobrenome:</label>
        <input type="text" class="form-control" id="sobrenome" placeholder="Digite o sobrenome do aluno" name="sobrenome" required>
      </div>
      <div class="form-group">
        <label class="form-txt" for="email">Email:</label>
        <input type="text" class="form-control" id="email" placeholder="Digite o email do aluno" name="email" required>
      </div>
      <input type="hidden" name="operacao" value="adicionar">
      <button type="submit" class="btn btn-success">Salvar</button>
      <a href="tabela.php" class="btn btn-info">Voltar</a>
    </form>
  </div>
</body>
</html>