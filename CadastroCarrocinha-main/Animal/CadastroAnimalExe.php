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
           //upload foto
           $nome_foto = "";
           if(file_exists($_FILES['foto']['tmp_name'])){
               $pasta_destino = 'fotos/';
               $extensao = strtolower(substr($_FILES['foto']['name'],-4));
               $nome_foto = $pasta_destino . date('Ymd-His').$extensao;
               move_uploaded_file($_FILES['foto']['tmp_name'], $nome_foto);
           }

            $nome = $_POST['nome'];
            $especie = $_POST['especie'];
            $raca = $_POST['raca'];
            $dataNascimento = $_POST['data_nascimento'];
            $castrado = $_POST['castrado'] == "Sim" ? true : false;
            $pessoa = $_POST['pessoa'];
            echo "<h1>Dados da cidade</h1>";
            echo "Nome: $nome</br>";
            echo "Especie: $especie</br>";
            echo "Raça: $raca</br>";
            echo "Data de Nascimento: $dataNascimento </br>";
            echo "Castrado: " . ($castrado ? "Sim" : "Não") . "</br>";
            // INSERT INTO cidade (nome, especie, raca, data_nascimento, castrado, id_pessoa, idade)
            // VALUES ('$nome', '$especie', '$raca', $pessoa, $castrado == "sim" ? 0 : 1, $idade)
            $castrado = $castrado ? 0 : 1;
            $dataNascimentoFormatada = date('Y-m-d', strtotime($dataNascimento));
            $sql = "INSERT INTO animal (nome, especie, raca, data_nascimento, castrado, id_pessoa, foto)";
            $sql .= " VALUES('" . $nome . "', '" . $especie . "', '" . $raca . "', '" . $dataNascimentoFormatada . "', $castrado, $pessoa, '$nome_foto')";
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