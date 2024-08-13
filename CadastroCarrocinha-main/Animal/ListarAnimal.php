<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/listagem.css">
    <title>Lista dos Animais</title>
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
        <div class="principal flex inverter_column">
            <?php
            include('../includes/conexao.php');
            $sql ="SELECT FLOOR(datediff(curdate(), data_nascimento) / 365) as idade, ani.id, ani.nome nomeAnimal, ani.especie,ani.raca, ani.data_nascimento, ani.castrado, ani.foto, don.nome nomeDono, don.email FROM animal ani LEFT JOIN pessoa don ON don.id = ani.id_pessoa";
            // Executa a consulta
            $result = mysqli_query($con, $sql);
            ?>
            <h1>Consulta de Animais</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Espécie</th>
                        <th>Raça</th>
                        <th>Data de Nascimeto/Adoção</th>
                        <th>Idade</th>
                        <th>Castrado</th>
                        <th>Dono</th>
                        <th>Alterar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $castrado = $row['castrado'] == 1 ? "Sim" : "Não";
                        /*$dataNascimentoFormatada = date('Y-m-d', strtotime($row['data_nascimento']));
                        $dataAtual = new DateTime();
                        $dataNascimentoOb = new DateTime($dataNascimentoFormatada);
                        $idadeOb = $dataNascimentoOb->diff(new DateTime(date('Y-m-d')));
                        $idade = $idadeOb->format('%Y');*/
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        if($row['foto']=="")
                        echo "<td></td>";
                        else
                        echo "<td><img src=".$row ['foto']." width='80' heigth='100'></td>";
                        echo "<td>" . $row['nomeAnimal'] . "</td>";
                        echo "<td>" . $row['especie'] . "</td>";
                        echo "<td>" . $row['raca'] . "</td>";
                        echo "<td>" . $row['data_nascimento'] . "</td>";
                        echo "<td>" . $row['idade'] . " anos </td>";
                        echo "<td>" . $castrado . "</td>";
                        echo "<td>" . $row['nomeDono'] . "/" . $row['email'] . "</td>";
                        echo "<td><a href='alteraAnimal.php?id=" . $row['id'] . "'>Alterar</a></td>";
                        echo "<td><a href='deletaAnimal.php?id=" . $row['id'] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>