<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Editer une Religion: <?=$data->nom_religion?></h3>
	
					<span class="float-right">
						<?php include_once "menu_religions.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
			<div class="row">
			<div class="col-md-4">
		<?=form_open('datas/Religions/edit/',NULL, ['id_religion'=>$data->id_religion])?>

			<div class='form-group'><label>nom_religion</label><?php echo form_error('nom_religion'); ?>
			<?=form_input('nom_religion',set_value('nom_religion',$data->nom_religion),"class='form-control' placeholder='nom'")?>
						<?php echo form_error('nom_religion','<div class="text-danger">', '</div>'); ?></div>

<div class='row'>
		<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div></div><div class='col-md-8'>
		
				<input type="hidden" id="sort" name="sort" value="<?= $sort?>"> 
		<?php echo $this->session->flashdata('msg');?>
		<h3 class="card-title text-bold"> Religions</h3><br>

<?php echo form_label('','hidden')?>
	<table class='table table-striped table-bordered'>
	<thead>
			<th>#</th>
			<th>Nom</th>
			<th>Options</th>
		</thead>
		<tbody>
			<?php foreach ( $datas as $data ): ?>
				<tr>
					<td><?=$data->id_religion?></td>
					<td><?=$data->nom_religion?></td>
					<td>
						<a href='<?=base_url('datas/Religions/edit/0/'.$data->id_religion);?>'><span class="fa fa-edit"></span></a>
						<a href='<?=base_url('datas/Religions/delete/'.$data->id_religion);?>' class='text-danger'><span class="fa fa-trash"></span></a>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
    		<?php echo $this->pagination->create_links(); ?>

			
		</div></div></section></div>