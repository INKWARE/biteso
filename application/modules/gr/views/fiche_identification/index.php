<div class="content-wrapper" style="min-height: 357.039px;">
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title text-bold"><?=$title?></h3>

                <span class="float-right">
                    <a href='<?=base_url('gr/Fiche_identification/add')?>' class="btn btn-info btn-sm"><i
                            class="fa fa-plus"></i> <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_new')?></span></a>
                    <a class="btn btn-primary btn-sm" href="<?=base_url('gr/Fiche_identification')?>"><i
                            class="fa fa-list"></i>
                        <span class="d-none d-sm-inline">&nbsp;<?=$this->lang->line('identity_menu_list')?></span>
                    </a>
                </span>

            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('msg');?>
                <table class='table table-striped table-bordered' id="tables">
                    <thead>
                        <th>#</th>
                        <th><?=$this->lang->line('identity_list_matricule')?></th>
                        <th><?=$this->lang->line('identity_list_category')?></th>
                        <th><?=$this->lang->line('identity_list_nom')?></th>
                        <th>Prenom</th>
                        <th><?=$this->lang->line('identity_list_gerne')?></th>
                        <th><?=$this->lang->line('identity_list_ethnie')?></th>
                        <th><?=$this->lang->line('identity_list_origine')?></th>
                        <th><?=$this->lang->line('identity_list_statut')?></th>
                        <th><?=$this->lang->line('identity_list_nee')?></th>
                        <th><?=$this->lang->line('identity_list_lieu')?></th>
                        <th><?=$this->lang->line('identity_list_localt')?></th>
                        <th><?=$this->lang->line('identity_list_promo')?></th>
                        <th><?=$this->lang->line('identity_list_options')?></th>
                        </thead>
                    <tbody>
                        
                    </tbody>
                </table>

            </div>
        </div>
    </section>
</div>