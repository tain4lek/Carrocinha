<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/cadastro.css" />
    <title>Cadastro Animal</title>
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
            <h2>Cadastro de Animal</h2>
            <form action="./CadastroAnimalExe.php" method="post"
            enctype="multipart/form-data">

            <div>
                <label for="foto">foto</label>
                <input type="file" name="foto" id="foto" accept="image/*" >
            </div>
                
                <div>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" />
                </div>
                <div>
                    <label for="especie">Espécie</label>
                    <input type="text" name="especie" id="especie" />
                </div>
                <div>
                    <label for="raca">Raça</label>
                    <input type="text" name="raca" id="raca" />
                </div>
                <div>
                    <label for="data_nascimento">Data de Nascimento ou Adoção</label>
                    <input type="date" name="data_nascimento" id="data_nascimento" />
                </div>
                <div class="inline">
                    <label>Castrado:</label>
                    <input type="radio" name="castrado" id="castradoSim" value="sim" class="inline" /><label id="castradoSim">Sim</label>
                    <input type="radio" name="castrado" id="castradoNao" value="nao" class="inline" /><label id="castradoNao">Não</label>
                </div>
                <div><label for="pessoa">Pessoa</label>
                    <select name="pessoa" id="pessoa">
                        <?php
                        include('../includes/conexao.php');
                        $sql = "SELECT * FROM pessoa";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "/" . $row['email'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit">Cadastrar</button>
            </form>
        </div>
    </section>
</body>

</html>