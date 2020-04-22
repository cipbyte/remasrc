<?php echo $this->renderElement('maquetado/menu_seguridad')?>
<h2 class="titulo_modulo">ADMINISTRACION DE CONEXIONES A MUNICIPIOS</h2>
<?php echo $frm->create('Conexion',array('action' => 'add'));?>

<div class="areaDatoForm">
	<h3>MODIFICAR CONEXION</h3>
	<table class="tbl_form">
		<tr>
			<td>MUNICIPALIDAD</td>
			<td><?php echo $frm->input('municipalidad',array('size'=>60,'maxlength'=>60));?></td>
		</tr>
		<tr>
			<td>DOMICILIO</td>
			<td><?php echo $frm->input('domicilio',array('size'=>60,'maxlength'=>60));?></td>
		</tr>
		<tr>
			<td>TELEFONOS</td>
			<td><?php echo $frm->input('telefonos',array('size'=>60,'maxlength'=>60));?></td>
		</tr>
		<tr>
			<td>RESPONSABLE</td>
			<td><?php echo $frm->input('responsable',array('size'=>60,'maxlength'=>60));?></td>
		</tr>
		<tr>
			<td>EMAIL</td>
			<td><?php echo $frm->input('email',array('size'=>60,'maxlength'=>60));?></td>
		</tr>		
		<tr>
			<td>URL APLICACION REMAS</td>
			<td><?php echo $frm->input('app_remas_remoto',array('size'=>60,'maxlength'=>200));?></td>
		</tr>
		<tr>
			<td>PIN ACCESO REMOTO</td>
			<td><?php echo $frm->input('pin_remoto',array('size'=>60,'maxlength'=>60));?></td>
		</tr>		
		<tr>
			<td>PIN ACCESO LOCAL</td>
			<td style="font-size:large;color: purple;font-family: monospace;"><?php echo $this->data['Conexion']['pin_local']?><?//php echo $frm->input('pin_local',array('size'=>60,'maxlength'=>60,'disabled' => 'disabled'));?></td>
		</tr>												
		<tr>
			<td>ACTIVO</td>
			<td><?php echo $frm->input('activo');?></td>
		</tr>				
	</table>
</div>
<?php echo $frm->input('id');?>	

<?php echo $frm->btnGuardarCancelar(array('URL' => '/conexiones'))?>