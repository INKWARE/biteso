<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modifications extends Admin_Controller{

	public function __construct(){
        parent::__construct();
        $this->data['page_title'] = 'Modifications';
        $this->data['js'] = base_url()."assets/js/pages/Modifications.js";
	}

	public function index(){

        $table = $this->uri->segment(4);

        $titles = [];
        $titles['gr_fiche_identification'] = "Indentification";
        $titles['gr_fiche_carriere'] = "carriere";
        $titles['gr_ayants_droit'] = "Ayants droits";
        $titles['gr_historique_situations'] = "Historique de situations";
        $titles['mv_cotations'] = "Cotations";
        $titles['mv_etudes_faites'] = "Etudes faites";
        $titles['mv_formations_stages'] = "Formations & stages";
        $titles['mv_avancement_grades'] = "Avancement de grades";
        $titles['mv_fiche_mutations'] = "Mutations";
        $titles['mv_actions_disciplinaires'] = "Actions disciplinaires";
        $titles['mv_dossiers_penals'] = "Dossiers penals";
        $titles['mv_absences'] = "Absences";
        $titles['mv_renforcements'] = "Renforcements";
        $titles['mv_dictinctions_honorifiques'] = "Distinctions honorifiques";
        $titles['mv_accidents_roulage'] = "Accidents de roulage";
        $titles['mv_accidents_travail'] = "Accidents de travail";
        $titles['mv_exemptions_service'] = "Exemption de service";

        $this->load->library( 'pagination' );
        $config[ 'base_url' ]      = base_url( 'modifications/Modifications/index/'.$table );
        $config[ 'per_page' ]      = 10;
        $config[ 'num_links' ]     = 2;
        $config[ 'total_rows' ] = $this->db->where(['table_name'=>$table, 'event'=>'update','statut !='=>1])->get('user_audit_trails')->num_rows();
        $this->pagination->initialize( $config );
        $this->data[ 'listing' ] = true;
        $this->data[ 'datas' ]   = $this->db->where(['table_name'=>$table, 'event'=>'update','statut !='=>1])->order_by( 'id', 'ASC' )->get( 'user_audit_trails',$this->uri->segment( 5 ), $config[ 'per_page' ] )->result();
       
        $this->data[ 'title' ] = 'Les modifications: '.$titles[$table];
        $this->data['table'] = $table;
        $this->render_template('modifications/index', $this->data);
	}

    public function traite()
    {
        $id = $this->uri->segment(4);
        $data = $this->db->where(['id'=>$id])->get('user_audit_trails')->row();
        $table = $data->table_name;

        $this->form_validation->set_rules('statut', 'Statut', 'required');

            if($this->form_validation->run()){
                $this->db->set('statut', $this->input->post('statut'))->where(['id'=>$this->input->post('id_trial')])->update('user_audit_trails');
                
                $insert = $this->db->insert('user_audit_trails_validate',$this->input->post());
                
                if(!empty($insert)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success">Cette modification a été sauvegardé avec succès.</div>');
                }else{
                    $this->session->set_flashdata('msg','<div class="alert alert-danger">Cette modification a échoué </div');
                }
                
               redirect(base_url('modifications/Modifications/index/'.$table));
            }

        $this->data[ 'title' ] = "Validation d'une modification";
        $this->data['table'] = $table;
        $this->data['data'] = $data;
        $this->render_template('modifications/traite', $this->data);
    }
}
        