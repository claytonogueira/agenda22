<!DOCTYPE html>
<html>
<head>
    <title>Excluir usuário</title>
</head>
<body>
    <h2>Deseja excluir o usuário?</h2>
    <form method="post">
        <button type="submit" name="executar" value="1">Sim</button>
        <button type="submit" name="executar" value="2">Não</button>
    </form>
 
    <?php
    if (isset($_POST['executar'])) {
        $exc = $_POST['executar'];
        if ($exc == 1) {
            
                include('conn.php');
                $exc = 0;
                $id = $_GET['id'];
                $stmt = $pdo->prepare('DELETE FROM agendatb WHERE codCliente = ?');
                $stmt->execute([$id]);
                
                header('Location: agenda.php');
        }elseif ($exc == 2){
            header("Location: agenda.php");
        }
    }
    ?>
 
</body>
</html>