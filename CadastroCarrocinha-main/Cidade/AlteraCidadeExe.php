<?php
include('../includes/conexao.php');
$id = $_POST['id'];
$nome = $_POST['nome'];
$estado = $_POST['estado'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/deletar.css" />
    <title>Resultado</title>
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
        <div class="principal">
            <h1>Alteração de cidade</h1>
            <?php
            echo "<p>Id: $id</p>";
            echo "<p>Nome: $nome</p>";
            echo "<p>Estado: $estado</p>";
            $sql = "UPDATE cidade SET nome = '$nome', estado = '$estado' WHERE id = $id";
            $result = mysqli_query($con, $sql);
            if ($result)
                echo "Dados atualizados!";
            else
                echo "Erro ao atualizar dados!\n" . mysqli_error($con);
            ?>
        </div>
    </section>
</body>

</html>