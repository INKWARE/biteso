<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer un type de mission: <?=$data->type_mission?></h3>
	
					<span class="float-right">
						<?php include_once "menu_types_missions.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('mouvement/Types_missions/edit/',NULL, ['id_type_mission'=>$data->id_type_mission])?>

			<div class='form-group'>
				<label>Type de mission</label>
				<?=form_input('type_mission',set_value('type_mission',$data->type_mission),"class='form-control' placeholder='type_mission'")?>
				<?php echo form_error('type_mission','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Types de mission</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
		<thead>
			<th>#</th>
			<th>Type de mission</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_type_mission?></td>
					<td><?=$data->type_mission?></td>
					<td>
						<a href='<?=base_url('mouvement/Types_missions/edit/0/'.$data->id_type_mission);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('mouvement/Types_missions/delete/'.$data->id_type_mission);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>