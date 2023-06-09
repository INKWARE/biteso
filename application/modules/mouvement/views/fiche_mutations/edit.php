<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-uppercase">Editer une fiche de mutation</h3>
					<span class="float-right"> 
						<a class='btn btn-info btn-sm' href="<?php echo base_url('gr/Fiche_identification/view/'.$id_identification)?>"><i class='fa fa-file'></i>
							<span class='d-none d-sm-inline'>&nbsp;Retour sur détail</span>
						</a>

						<a class='btn btn-primary btn-sm' href="<?php echo base_url('gr/Fiche_identification/index')?>"><i class='fa fa-list'></i>
							<span class='d-none d-sm-inline'>&nbsp;Liste des fiches</span>
						</a>     
					</span>
				</div>
	
			<div class="card-body">
			<?=form_open('mouvement/Fiche_mutations/edit/',NULL, ['id_mutation'=>$data->id_mutation])?>

			<?php 
				echo "<pre>";
				print_r($data);
				echo "</pre>";
			?>
			<div class="row">
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-3'>
				<label>Date de mutation</label>
				<?php //echo form_input('date_mutation',set_value('date_mutation',$data->date_mutation),"class='form-control' placeholder='date_mutation'")?>
				<div class="input-group date" id="inputdate" data-target-input="nearest">
					<?=form_input('date_mutation',set_value('date_mutation', $data->date_mutation),"class='form-control datetimepicker-input', id='date_mutation'")?>
					<div class="input-group-append" data-target="#inputdate" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>

				<?php echo form_error('date_mutation','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ref. de mutation</label>
				<?=form_input('ref_mutation',set_value('ref_mutation',$data->ref_mutation),"class='form-control' placeholder='ref_mutation'")?>
				<?php echo form_error('ref_mutation','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ancien service</label>
				<?=form_dropdown('id_ancien_service',$this->My_model->multi_dropdown('gr_services',['id_service','nom_service'], $data->id_ancien_service),set_value('id_ancien_service,',$data->id_ancien_service),"class='form-control' id='id_ancien_service' placeholder='id_ancien_service'")?>
				<?php echo form_error('id_ancien_service','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nouveau service</label>
				<?=form_dropdown('id_nouveau_service',$this->My_model->multi_dropdown('gr_services',['id_service','nom_service']),set_value('id_nouveau_service,',$data->id_nouveau_service),"class='form-control' id='id_nouveau_service' placeholder='id_nouveau_service'")?>
				<?php echo form_error('id_nouveau_service','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ancienne unité</label>
				<?=form_dropdown('id_ancienne_unite',$this->My_model->multi_dropdown('gr_unites',['id_unite','nom_unite'], $data->id_ancienne_unite),set_value('id_ancienne_unite,',$data->id_ancienne_unite),"class='form-control' id='id_ancienne_unite' placeholder='id_ancienne_unite'")?>
				<?php echo form_error('id_ancienne_unite','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nouvelle unité</label>
				<?=form_dropdown('id_nouvelle_unite',$this->My_model->multi_dropdown('gr_unites',['id_unite','nom_unite']),set_value('id_nouvelle_unite,',$data->id_nouvelle_unite),"class='form-control' id='id_nouvelle_unite' placeholder='id_nouvelle_unite'")?>
				<?php echo form_error('id_nouvelle_unite','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Ancienne fonction</label>
				<?=form_dropdown('id_ancienne_fonction',$this->My_model->multi_dropdown('gr_fonctions',['id_fonction', 'nom_fonction'], $data->id_ancienne_fonction),set_value('id_ancienne_fonction,',$data->id_ancienne_fonction),"class='form-control' id='id_ancienne_fonction' placeholder='id_ancienne_fonction'")?>
				<?php echo form_error('id_ancienne_fonction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Nouvelle fonction</label>
				<?=form_dropdown('id_nouvelle_fonction',$this->My_model->multi_dropdown('gr_fonctions',['id_fonction', 'nom_fonction']),set_value('id_nouvelle_fonction,',$data->id_nouvelle_fonction),"class='form-control' id='id_nouvelle_fonction' placeholder='id_nouvelle_fonction'")?>
				<?php echo form_error('id_nouvelle_fonction','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Observations</label>
				<?=form_input('observations',set_value('observations',$data->observations),"class='form-control' placeholder='observations'")?>
				<?php echo form_error('observations','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-3'>
				<label>bp</label>
				<?=form_input('bp',set_value('bp',$data->bp),"class='form-control' placeholder='bp'")?>
				<?php echo form_error('bp','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer les changements','class="btn btn-primary"')?><?=form_close()?>
		</div>
	</section>
</div>