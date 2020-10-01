<!DOCTYPE html>
<html>
<head>
	<title>Avaliação</title>
</head>
<body>
	<?php if (!empty($msg)): ?>
		<p><?php echo $msg; ?></p>
	<?php endif ?>
	<fieldset>
		<legend>Login</legend>
		<form action="" method="post">
			<label>Usuario:</label>
			<input type="text" name="usuario" value="">
			<label>Senha:</label>
			<input type="password" name="senha" value="">
			<input type="submit" name="enviar" value="Acessar">
		</form>
	</fieldset>
 
</body>
</html>