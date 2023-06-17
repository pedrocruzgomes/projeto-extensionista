<!DOCTYPE html>
<html>
<head>
  <title>Listagem de Alunos</title>
  <meta Nome="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script>
    function alterarItem(id) {
      window.location.href = "alterar.php?id=" + id;
    }
  </script>
    <style>
    body{
      background-color: #D3D3D3;
    }
    .form-control{
      border-radius: 15px;
    }
    .btn-primary{
      border-radius: 15px;
    }
  </style>
</head>
<body>
  
<div class="modal fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">INFORMAÇÕES DO ALUNO</h4>
      </div>
      <div class="modal-body">
        <p>ID: <span id="alunoId"></span></p>
        <p>Nome: <span id="alunoNome"></span></p>
        <p>Sobrenome: <span id="alunoSobrenome"></span></p>
        <p>Email: <span id="alunoEmail"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <br>
  <h2>ALUNOS CADASTRADOS</h2>
  <div class="table-responsive">
    <br>
    <a href="adicionar.php" class="btn btn-primary">
      <i class="fa fa-plus"></i> Adicionar Aluno
    </a>
    <p><br></p>
    <table class="table table-striped">
    <thead>
      <tr class="table-dark">
        <th scope="col" style="width:10%">ID</th>
        <th scope="col" style="width:30%">Nome</th>
        <th scope="col" style="width:30%">Sobrenome</th>
        <th scope="col" style="width:30%">Email</th>
        <th scope="col" style="width:10%">Visualizar</th>
        <th scope="col" style="width:10%">Atualizar</th>
        <th scope="col" style="width:10%">Excluir</th>
      </tr>
    </thead>
      <tbody>
        <?php
        include 'conexao.php';

        $sql = "SELECT * FROM aluno";

        $result = $conexao->query($sql);
        if ($conexao->error) {
          die("Erro na consulta: " . $conexao->error);
        }
        ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['sobrenome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td align="center" style="cursor: pointer;"><i class="fa fa-eye" style="color: #000000;" aria-hidden="true"></i></td>
            <td align="center"><a href="alterar.php?id=<?php echo $row['id']; ?>"><i class="fa fa-edit" style="color: #000000;"></i></a></td>
            <td align="center"><a href="#" 
                   class="delete-btn" 
                   data-id="<?php echo $row['id']; ?>">
                  <i class="fa fa-trash" style="color: #000000;"></i>
                </a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</div>
<script>
$(document).ready(function(){
  $(".delete-btn").click(function(e){
    e.preventDefault();
    var alunoId = $(this).data('id'); 
    
    var userConfirmation = confirm('Você realmente deseja excluir este aluno do cadastro?');
    if(userConfirmation){
      window.location.href = "excluir.php?id=" + alunoId;
    }
  });

  $(".fa-eye").click(function(){
    var $row = $(this).closest("tr");
    var alunoId = $row.find("td:nth-child(1)").text();
    var alunoNome = $row.find("td:nth-child(2)").text();
    var alunoSobrenome = $row.find("td:nth-child(3)").text();
    var alunoEmail = $row.find("td:nth-child(4)").text();

    $("#alunoId").text(alunoId);
    $("#alunoNome").text(alunoNome);
    $("#alunoSobrenome").text(alunoSobrenome);
    $("#alunoEmail").text(alunoEmail);

    $("#modal-info").modal();
  });
});
</script>
</body>
</html>