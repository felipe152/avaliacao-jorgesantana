<?php echo view('template/top'); ?>
<?php if (!empty($msg)): ?>
	<p><?php echo $msg; ?></p>
<?php endif ?>

<fieldset>
	<legend>Importar arquivo</legend>
	<form action="<?php echo site_url('importacao'); ?>" method="post" enctype="multipart/form-data">
		<input name="arquivo" type="file">
		<input type="submit" name="enviar" value="Enviar">
	</form>
	<p>Faça <a href="<?php echo site_url('download') ?>" target="_blank">download do modelo</a> para evitar erros.</p>
</fieldset>
<?php echo view('template/footer'); ?>