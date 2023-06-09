<?=$fragmentTitle?>
<span class="float-right"> 
    <a class='btn btn-info btn-sm' href="<?php echo base_url('mouvement/Etudes_faites/add/'.$id_identification)?>"><i class='fa fa-plus'></i>
        <span class='d-none d-sm-inline'>&nbsp;Nouveau</span>
    </a>    
</span>

<table class='table table-condensed table-hover table-stripped'>
    <thead>
        <tr>
            <th>#</th>
            <th>Etudes</th>
            <th>Etablissement</th>
            <th>Pays</th>
            <th>P&eacute;riode</th>
            <th>Ref. equivalence</th>
            <th>Note Obtenue</th>
            <th>Date Obtention</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php 
          foreach ($datas as $data) {  
            $date_obt = !empty(($data->date_obtention))?(new DateTime($data->date_obtention))->format('d/m/Y'):"";      
        ?>
            <tr>
                <td><?=$data->id_etudes?></td>
                <td><?=get_db_value("mv_types_etudes","type_etudes",array("id_types_etudes",$data->id_type_etudes))?></td> 
                <td><?=$data->etablissement?></td> 
                <td><?=get_db_value("gr_pays","nom_pays",array("id_pays",$data->id_pays))?></td>
                <td><?=$data->periode_etude?></td>
                <td><?=$data->ref_equivalence?></td>
                <td><?=$data->note_obtenue?></td>
                <td><?=$date_obt?></td>
                <td>
                    <a href="<?php echo base_url('mouvement/Etudes_faites/edit/'.$id_identification.'/'.$data->id_etudes)?>">
                        <span class="fa fa-edit"></span>
                    </a>

                    <a href="<?php echo base_url('mouvement/Etudes_faites/delete/'.$id_identification.'/'.$data->id_etudes)?>">
                        <span class="fa fa-trash text-danger"></span>
                    </a>
                </td>             
            </tr>
        <?php } ?>
    </tbody>
</table>