
	<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
			<div class="card-header">
				<h3 class="card-title text-uppercase">Ajouter un historique de situation</h3>  
				
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
		
		<?=form_open('gr/Historique_situations/add')?>
		
		<div class="row">			
			<div class='col-md-6'>
				<input type="hidden" name="id_identification" value="<?=$id_identification?>">
				<label>Situation</label>
				<?=form_dropdown('id_situation',$this->My_model->multi_dropdown('gr_situations', ['id_situation','nom_situation']),set_value('id_situation'),"class='form-control select2' placeholder='id_situation'")?>
				<?php echo form_error('id_situation','<div class="text-danger">', '</div>'); ?>
			</div>
		</div>

		<div class="row">	
			<div class='col-md-3'>
				<label>Date debut</label>
				
				<div class="input-group date" id="date_debut" data-target-input="nearest">
					<?=form_input('date_debut',set_value('date_debut'),"class='form-control datetimepicker-input', id='date_debut' placeholder='YYYY-MM-DD'")?>
					<div class="input-group-append" data-target="#date_debut" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_debut','<span class="text-danger">', '</span>'); ?>
			</div>

			<div class='col-md-3'>
				<label>Date debut</label>
				
				<div class="input-group date" id="date_fin" data-target-input="nearest">
					<?=form_input('date_fin',set_value('date_fin'),"class='form-control datetimepicker-input', id='date_fin' placeholder='YYYY-MM-DD'")?>
					<div class="input-group-append" data-target="#date_fin" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
				</div>
				<?php echo form_error('date_fin','<span class="text-danger">', '</span>'); ?>
			</div>
		</div>
		<div class="row">			
			<div class='col-md-6'>
				<label>Observation</label>
				<?=form_textarea('observation',set_value('observation'),"class='form-control' placeholder='observation'")?>
				<?php echo form_error('observation','<div class="text-danger">', '</div>'); ?>
			</div>			
		</div>
			<div class='row' style="margin:6px">
				<?=form_submit('','Enregistrer','class="btn btn-sm btn-primary"')?><?=form_close()?>
			</div>
	</section>
</div>