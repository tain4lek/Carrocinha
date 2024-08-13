<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/deletar.css">
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
            <?php
            include('../includes/conexao.php');
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cidade = $_POST['cidade'];
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $cep = $_POST['cep'];
            echo "<h1>Dados do Cliente</h1>";
            echo "Nome: $nome</br>";
            echo "E-mail: $email</br>";
            echo "Endereço: $endereco</br>";
            echo "Bairro: $bairro</br>";
            echo "CEP: $cep</br></br>";
            // INSERT INTO cliente (nome, email, endereco, bairro, cep, id_cidade)
            // VALUES ('$nome', '$email', '$endereco', '$bairro', '$cep', $cidade)
            $sql = "INSERT INTO pessoa (nome, email, endereco, bairro, cep, id_cidade)";
            $sql .= " VALUES('" . $nome . "', '" . $email . "', '" . $endereco . "', '" . $bairro . "', '" . $cep . "', " . $cidade . ")";
            echo $sql;
            // Executa comando no banco de dados
            $result =  mysqli_query($con, $sql);
            if ($result) {
                echo "<h2>Dados cadastrados com sucesso!</h2>";
            } else {
                echo "<h2>Erro ao cadastrar!</h2>";
                echo mysqli_error($con);
            }
            ?>
        </div>
    </section>
</body>

</html>