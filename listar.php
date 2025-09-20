<?php
include 'cabecalho.php';
?>
<link rel="stylesheet" href="style-listar.css" />

<body>    
    <div class="container">
        <h2>LISTAGEM DE PRODUTOS</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require 'conexao.php';
                $sql = "SELECT * FROM produtos";
                $stmt = $pdo->query($sql);
                while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$produto['id']."</td>";
                    echo "<td>".$produto['nome']."</td>";
                    echo "<td>R$ ".number_format($produto['preco'], 2, ',', '.')."</td>";
                    echo "<td>".$produto['quantidade']."</td>";
                    echo "
                        <td>
                            <div class='btn-group'>
                                <a href='form_atualizar.php?id=".$produto['id']."' class='btn btn-primary'>Atualizar</a>
                                <a href='apagar.php?id=".$produto['id']."' class='btn btn-danger' onclick='return confirm(\"Tem certeza que deseja apagar este produto?\");'>Apagar</a>
                            </div>
                        </td>
                    ";
                    echo "</tr>";                                        
                }
                ?>
            </tbody>
        </table>
        <a href='index.php' class='btn btn-secondary'>Voltar</a>
    </div>
</body>
</html>
