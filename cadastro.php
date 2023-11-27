<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $telCliente = $_POST['tel'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];


    $stmt = $pdo->prepare('INSERT INTO agendatb(nome, tel, celular, endereco, email) VALUES (?, ?, ?, ?, ?)');


    $stmt->execute([$nome, $telCliente, $celular, $endereco, $email]);

    header('Location: pginicio.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Adicionar</title>
</head>
<body>
    <h2>Adicionar na Agenda</h2>
    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="tel">Telefone:</label>
        <input type="text" name="tel" required><br>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" required><br>

        <label for="email">Email:</label>
        <input type="text" name="email" required><br>

        <input type="submit" name="Adicionar" required><br>
    </form>
</body>
</html>
