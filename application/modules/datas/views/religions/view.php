<div class="content-wrapper" style="min-height: 357.039px;">
		<section class="content">
			<div class="card card-info card-outline">
				<div class="card-header">
					<h3 class="card-title text-bold">Détail d'une religion: <?=$data->nom_religion?></h3>
	
					<span class="float-right">
						<?php include_once "menu_religions.php";?>
					</span>
	
				</div>
	
			<div class="card-body">
	<div class='row'>
	   <div class='col-md-3'>#:<b><?=$data->id_religion?></b></div>
	   <div class='col-md-3'>Nom:<b><?=$data->nom_religion?></b></div>
	   
	</div></div>
	</div>
	</section>
</div>