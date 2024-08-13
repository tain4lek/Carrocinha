<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/listagem.css">
    <title>Lista Ciadades</title>
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
            $sql = "SELECT * FROM cidade";
            // Executa a consulta
            $result = mysqli_query($con, $sql);
            ?>
            <h1>Consulta de Cidades</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Estado</th>
                        <th>Alterar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['estado'] . "</td>";
                        echo "<td><a href='alteraCidade.php?id=" . $row['id'] . "'>Alterar</a></td>";
                        echo "<td><a href='deletaCidade.php?id=" . $row['id'] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>