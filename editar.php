<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];  
    $telCliente = $_POST['tel'];  
    $celular = $_POST['celular'];  
    $endereco = $_POST['endereco'];  
    $email = $_POST['email'];  

    $stmt = $pdo->prepare('UPDATE agendatb SET nome = ?, tel = ?, celular = ?, endereco = ?, email = ?  WHERE codCliente = ?');
    $stmt->execute([$nome, $telCliente, $celular, $endereco, $email, $id]);

    header('Location: agenda.php');
}

$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM agendatb WHERE codCliente = ?');
$stmt->execute([$id]);
$cliente = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Editar Cliente</title>
</head>
<body>
    <h2>Editar Cliente</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $cliente['codCliente']; ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?php echo $cliente['nome']; ?>" required><br>

        <label for="telCliente">Telefone:</label>
        <input type="text" name="tel" value="<?php echo $cliente['tel']; ?>" required><br>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" value="<?php echo $cliente['celular']; ?>" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" value="<?php echo $cliente['endereco']; ?>" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $cliente['email']; ?>" required><br>

        <input type="submit" value="Editar">
    </form>
</body>
</html>
