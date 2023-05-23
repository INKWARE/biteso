<?php
/**
 * CodeIgniter customazition settings of pdf of differents pdf
 *
 * Version 1.0, October - 2017
 * Author: THADDEE NDAYIZEYE <...@gmail.com>
 *
 * Copyright (c) 2023 THADDEE NDAYIZEYE
 * Released under the MIT license

 */

defined('BASEPATH') OR exit('No direct script access allowed');

/*
    Table: gr_fiche_identification
*/
$config['gr_fiche_identification'] = array(
    'fields'=>array('nouveau_matricule','nom','prenom','id_categorie','id_sexe','id_ethnie','id_corps_origine','date_naissance','id_etat_civil'),
    'columns'=>array("#",'Matricule','Nom','Prenom','Categorie','Sexe','Ethnie','Corps d\'origine','Nee','Etat civil'),
    'sizes'=>array('5','18','25','25','21','13','20','30','20','18'),
    'orientation' => "P"
);

/*
    Table: gr_fiche_carriere
*/
$config['gr_fiche_carriere'] = array(
    'fields'=>array('id_identification','id_departement','id_service','id_categorie','id_grade','id_niveau_formation '),
    'columns'=>array("#",'Nom','Departement','Service','Categorie','Grade','Niveau formation'),
    'sizes'=>array('5','40','20','30','30','30','30'),
    'orientation' => "P"
);

/*
    gr_ayants_droit
*/ 

$config['gr_ayants_droit'] = array(
    'fields'=>array('id_identification','id_categorie_ayant_droit','nom','prenoms','date_naissance','ref_extrait_naissance','date_marriage','ref_extrait_marriage','date_divorce','date_deces','ref_cert_deces','prise_en_charge'),
    'columns'=>array('#','Soldat','Categorie','Ayant droit','Naissance','Prise en charge'),
    'sizes'=>array('5','55','25','50','20','35'),
    'orientation' => "P"
);

// gr_historique_situations
$config['gr_historique_situations'] = array(
    'fields'=>array('id_identification','id_situation','date_debut','date_fin','observation'),
    'columns'=>array('#','Soldat','Situation','D.Debut','D.Fin','Observation'),
    'sizes'=>array('5','50','20','20','20','75'),
    'orientation' => "P"
);

// mv_cotations
$config['mv_cotations'] = array(
    'fields'=>array('id_cotation','id_type_cote','id_identification','code','annee','points1','points2','note_obtenue'),
    'columns'=>array('#','Soldat','Type code','Code','Annee','Point 1','Point 2','Note obtenue'),
    'sizes'=>array('5','50','30','20','20','20','20','25'),
    'orientation' => "P"
);


// mv_etudes_faites
$config['mv_etudes_faites'] = array(
    'fields'=>array('id_etudes','id_identification','id_type_etudes','etablissement','periode_etude','ref_equivalence','note_obtenue','date_obtention','id_pays'),
    'columns'=>array('#','Soldat','Etudes','Etablissement','Periode','Note','Date','Pays'),
    'sizes'=>array('5','50','20','40','20','15','20','20'),
    'orientation' => "P"
);

// mv_formations_stages
// mv_avancement_grades
// mv_fiche_mutations
// mv_actions_disciplinaires
// mv_dossiers_penals
// mv_absences
// mv_renforcements
// mv_dictinctions_honorifiques
// mv_accidents_roulage
// mv_accidents_travail
// mv_exemptions_service