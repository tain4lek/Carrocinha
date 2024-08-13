<?php
include('../includes/conexao.php');
$id = $_GET['id'];
$sql = "SELECT * FROM cidade WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Alateração da Cidade</title>
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
        <div class="principal box-cidade">
            <h2>Alterar Cidade</h2>
            <form action="AlteraCidadeExe.php" method="post">
                <input type="text" name="nome" class="box-inline" id="nome" value="<?php echo $row['nome'] ?>" placeholder="Novo nome?" />
                <select name="estado" id="estado" class="box-inline">
                    <option value="SP" <?php echo $row['estado'] == "SP" ? "selected" : "" ?>>SP</option>
                    <option value="RJ" <?php echo $row['estado'] == "RJ" ? "selected" : "" ?>>RJ</option>
                    <option value="MG" <?php echo $row['estado'] == "MG" ? "selected" : "" ?>>MG</option>
                </select>
                <input type="hidden" name='id' value='<?php echo $row['id'] ?>'>
                <button type="submit">Alterar</button>
            </form>
        </div>
    </section>
</body>

</html>