<? php
session_start();
//Código para destruir a sessão toda vez que a página index for carregada.
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<title>Autenticação de Usuário</title>
</head>
<body>
<h1>Login</h1>
<form method="post" action="verificaLogin.php">
<label>Login:</label>
<input type="text" name="login" required><br>
<label>Senha :</label>
<input type="password" name="senha" required><br>
<input type="submit" value="Entrar">
</form>
</body>
</html>