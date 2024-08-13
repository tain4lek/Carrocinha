<?php
include('../includes/conexao.php');
$id = $_GET['id'];
$sql = "SELECT * FROM pessoa WHERE id=$id";
$result = mysqli_query($con, $sql);
$rowPessoa = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/cadastro.css" />
  <title>Alterar Pessoa</title>
</head>

<body>
  <div class="menu">
    <a href="#" class="brand"><img src="../img/logo-gato.webp" alt=""></a>
    <nav>
      <ul>
        <li><a href="#">Cidade</a>
          <ul>
            <li><a href="../Cidade/CadastroCidade.html">Cadastrar</a></li>
            <li><a href="../Cidade/ListarCidade.php">Visualizar</a></li>
          </ul>
        </li>
        <li><a href="">Pessoa</a>
          <ul>
            <li>
              <a href="../Pessoa/CadastroPessoa.php">Cadastrar</a>
            </li>
            <li>
              <a href="../Pessoa/ListarPessoa.php">Visualizar</a>
            </li>
          </ul>
        </li>
        <li><a href="">Animal</a>
          <ul>
            <li>
              <a href="../Animal/CadastroAnimal.php">Cadastrar</a>
            </li>
            <li>
              <a href="../Animal/ListarAnimal.php">Visualizar</a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
  <section>
    <div class="principal box">
      <h2>Atualização de Pessoa</h2>
      <form action="./AlteraPessoaExe.php" method="post">
        <div>
          <label for="nome">Nome</label>
          <input type="text" name="nome" id="nome" value="<?= $rowPessoa['nome'] ?>" />
        </div>
        <div>
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" value="<?= $rowPessoa['email'] ?>" />
        </div>
        <div>
          <label for="endereco">Endereco</label>
          <input type="text" name="endereco" id="endereco" value="<?= $rowPessoa['endereco'] ?>" />
        </div>
        <div>
          <label for="bairro">Bairro</label>
          <input type="text" name="bairro" id="bairro" value="<?= $rowPessoa['bairro'] ?>" />
        </div>
        <div>
          <label for="cep">CEP</label>
          <input type="text" name="cep" id="cep" value="<?= $rowPessoa['cep'] ?>" />
        </div>
        <input type="hidden" name='id' value='<?php echo $rowPessoa['id'] ?>'>
        <div><label for="cidade">Cidade</label>
          <select name="cidade" id="cidade">
            <?php
            $sql = "SELECT * FROM cidade";
            $result = mysqli_query($con, $sql);
            while ($rowCidade = mysqli_fetch_array($result)) {
              echo "<option value='" . $rowCidade['id'] . "' " . ($rowCidade['id'] == $rowPessoa['id_cidade'] ? "selected" : "") . ">" . $rowCidade['nome'] . "/" . $rowCidade['estado'] . "</option>";
            }
            ?>
          </select>
        </div>
        <button class="botao_submit" type="submit">Alterar</button>
      </form>
    </div>
  </section>
</body>

</html>