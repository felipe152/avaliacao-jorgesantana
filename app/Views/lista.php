<?php echo view('template/top'); ?>
<p><a href="<?php echo site_url('paciente/0') ?>" class="btn">Inserir novo paciente</a></p>
<table width="50%" border="1" style="margin: 0 auto;">
	<tr>
		<th>Nome</th>
		<th>Idade</th>
		<th>Telefone</th>
		<th>Matricula</th>
		<th>Ação</th>
	</tr>
	<?php if (empty($lista)): ?>
	<tr>
		<td colspan="4">Nenhum registro foi encontrado.</td>
	</tr>	
	<?php else:?>
		<?php foreach ($lista as $row): ?>	
	<tr>
		<td><?php echo $row['nome'] ?></td>
		<td><?php echo $row['idade'] ?></td>
		<td><?php echo $row['telefone'] ?></td>
		<td><?php echo $row['matricula'] ?></td>
		<td>
			<a href="<?php echo site_url('paciente/'.$row['id']); ?>">Editar</a> |
			<a onclick="return confirm('Deseja realmente deletar?');" href="<?php echo site_url('paciente/'.$row['id'].'/deletar'); ?>">Deletar</a>
		</td>
	</tr>
		<?php endforeach ?>
	<?php endif ?>
</table>
<?php echo view('template/footer'); ?>