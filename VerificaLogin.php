<?php

$dsn = 'mysql:host=localhost;dbname=agendabd1';
$usuario = 'root';
$senha = '';

try {
$pdo = new PDO($dsn, $usuario, $senha);
} catch (PDOException $e) {
echo 'Erro: ' . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$login = $_POST['login'];
$senha = $_POST['senha'];

$stmt = $pdo->prepare('SELECT * FROM tbusuarios WHERE login = :login');
$stmt->bindParam(':login', $login);
$stmt->execute();

if ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) {
$usuarioRec = $usuario['senha'];

if ($senha == $usuarioRec) {
    session_start();
    $_SESSION['login'] = true;

    if ($usuario['tipo'] == '1') {

    header('Location: pginicio.php');
    } else {

    header('Location: acessorestrito.php');
    }
}else{
    echo 'Senha incorreta.';
}
}else{
    echo 'Usuário não encontrado.';
}
}
?>