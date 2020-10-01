<?php echo view('template/top'); ?>
<style>
	label{
		display: block;
		margin: 10px 0;
	}
	label b {display: inline-block; width: 30%;}
</style>
<fieldset style="width: 30%; margin: 0 auto; padding: 20px;">
	<legend>Formulário de Paciente</legend>

<?php
	if ($msg!='') {
		echo '<p>'.$msg.'<p>';
	}
	echo form_open('paciente/'.$reg['id']); 
	echo form_hidden('id', 'id');
?>
	<label>
		<b>Nome:</b>
		<?php echo form_input(['name'=>'nome','value'=>$reg['nome']]); ?>
	</label>
	<label>
		<b>Idade:</b>
		<?php echo form_input(['name'=>'idade','type'=>'number','value'=>$reg['idade']]); ?>
	</label>
	<label>
		<b>Telefone:</b>
		<?php echo form_input(['name'=>'telefone','value'=>$reg['telefone']]); ?>
	</label>
	<label>
		<b>Matricula:</b>
		<?php echo form_input(['name'=>'matricula','value'=>$reg['matricula']]); ?>
	</label>
	<div>
		<?php echo form_submit('mysubmit', 'Gravar', 'class="btn"'); ?>
	</div>
	<?php echo form_hidden('id',$reg['id']); ?>
	<?php echo form_close();  ?>
</fieldset>
<?php echo view('template/footer'); ?>