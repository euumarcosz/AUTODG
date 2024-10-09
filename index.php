<?php
include 'includes/db.php';

$db = conectarBanco();
$resultados = $db->query('SELECT * FROM registros ORDER BY data_registro DESC');

$total_autorizacoes = 0;
$data_atual = date('Y-m-d');
$total_autorizacoes = $db->querySingle("SELECT SUM(quantidade) FROM registros WHERE DATE(data_registro) = '$data_atual'");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Contador de Autorização Digital</title>
</head>
<body>
    <div class="container">
        <h1>Registro de Autorizações</h1>
        <h2>Total de Autorizações Hoje: <?php echo $total_autorizacoes; ?></h2>
        <form action="registrar.php" method="post">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" required>
            <label for="observacao">Observação:</label>
            <input type="text" name="observacao">
            <button type="submit">Registrar</button>
        </form>

        <h2>Registros</h2>
        <table>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Quantidade</th>
                <th>Observação</th>
            </tr>
            <?php while ($row = $resultados->fetchArray()): ?>
            <tr>
                <td><?php echo date('d/m/Y', strtotime($row['data_registro'])); ?></td>
                <td><?php echo date('H:i:s', strtotime($row['data_registro'])); ?></td>
                <td><?php echo $row['quantidade']; ?></td>
                <td><?php echo $row['observacao']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

