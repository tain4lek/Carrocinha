<?php
include('../includes/conexao.php');
$id = $_GET['id'];
$sql = "SELECT * FROM animal WHERE id=$id";
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
    <link rel="stylesheet" href="../css/cadastro.css" />
    <title>Altera Animal</title>
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
            <h2>Alteração de Animal</h2>
            <form action="AlteraAnimalExe.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php
                    if($row['foto']!= ""){
                        echo "<img src='".$row['foto']."' width = '80' height= '100'/><br>";
                    }
                    ?>
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" id="foto" accept="image*/">
                </div>
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $row['nome'] ?>" />
                </div>
                <div>
                    <label for="especie">Espécie</label>
                    <input type="text" name="especie" id="especie" value="<?php echo $row['especie'] ?>" />
                </div>
                <div>
                    <label for="raca">Raça</label>
                    <input type="text" name="raca" id="raca" value="<?php echo $row['raca'] ?>" />
                </div>
                <div>
                    <label for="data_nascimento">Data de Nascimento ou Adoção</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo $row['data_nascimento'] ?>" />
                </div>
                <div class="inline">
                    <label>Cadastrado:</label>
                    <input type="radio" name="castrado" id="castradoSim" value="sim" <?php echo $row['castrado'] == 1 ? "checked" : "" ?> /><label id="castradoSim">Sim</label>
                    <input type="radio" name="castrado" id="castradoNao" value="nao" <?php echo $row['castrado'] == 0 ? "checked" : "" ?> /><label id="castradoNao">Não</label>
                </div>
                <div><label for="pessoa">Pessoa</label>
                    <select name="pessoa" id="pessoa">
                        <?php
                        include('../includes/conexao.php');
                        $sql = "SELECT * FROM pessoa";
                        $result = mysqli_query($con, $sql);
                        while ($rowPessoa = mysqli_fetch_array($result)) {
                            echo "<option value='" . $rowPessoa['id'] . "' " . ($rowPessoa['id'] == $row['id_pessoa'] ? "selected" : "") . ">" . $rowPessoa['nome'] . "/" . $rowPessoa['email'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <input type="hidden" name='id' value='<?php echo $row['id'] ?>'>
                <div>
                    <button class="botao_submit" type="submit">Alterar</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>