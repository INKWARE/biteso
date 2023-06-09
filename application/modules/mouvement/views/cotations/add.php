
	<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Faire une Cotation</h3>
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
		
		<?=form_open('mouvement/Cotations/add')?>
		


		<div class="row">			
			<input type="hidden" name="id_identification" value="<?=$id_identification?>">

			<div class='col-md-4'><label>Type cote</label>
			<?=form_dropdown('id_type_cote',$this->My_model->multi_dropdown('mv_types_cote', ['id_type_cote','type_cote']),set_value('id_type_cote'),"class='form-control' placeholder='id_type_cote'")?>
					<?php echo form_error('id_type_cote','<div class="text-danger">', '</div>'); ?></div>

			<div class='col-md-4'><label>Code</label>
				<?=form_input('code',set_value('code'),"class='form-control' placeholder='Code'")?>
				<?php echo form_error('code','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Annee</label>
				<?=form_input('annee',set_value('annee', date('Y')),"class='form-control' placeholder='annee'")?>
				<?php echo form_error('annee','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Point 1</label>
				<?=form_input('points1',set_value('points1',0),"class='form-control' placeholder='points1'")?>
				<?php echo form_error('points1','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Point 2</label>
				<?=form_input('points2',set_value('points2',0),"class='form-control' placeholder='points2'")?>
				<?php echo form_error('points2','<div class="text-danger">', '</div>'); ?>
			</div>

			<div class='col-md-4'><label>Note obtenue</label>
				<?=form_input('note_obtenue',set_value('note_obtenue'),"class='form-control' placeholder='note_obtenue'")?>
				<?php echo form_error('note_obtenue','<div class="text-danger">', '</div>'); ?>
			</div>

		</div>
		<div class='row' style='margin:6px'>
			<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
		</div>
	</section>
</div>