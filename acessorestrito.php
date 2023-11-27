<!DOCTYPE html>
<html lang="en">
<head>
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <br>


    <form method="GET">
        <label for="search">Pesquisar por Nome:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Pesquisar">
    </form>

    <table>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Endereço</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>

        <?php
        include('conn.php');

       
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $sql = 'SELECT * FROM agendatb';

        if (!empty($search)) {
            $sql .= ' WHERE nome LIKE :search';
        }

        $stmt = $pdo->prepare($sql);

      
        if (!empty($search)) {
  
            $searchParam = '%' . $search . '%';
            $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);
        }

        $stmt->execute();

        while ($row = $stmt->fetch()) {
            echo "<tr><br>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['tel']}</td>";
            echo "<td>{$row['celular']}</td>";
            echo "<td>{$row['endereco']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>

            </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>