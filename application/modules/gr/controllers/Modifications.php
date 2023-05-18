<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Modifications extends Admin_Controller{

	public function __construct(){
	parent::__construct();
	    $this->data['page_title'] = 'Promotions';
	}

	public function index(){

        $table = $this->uri->segment(4);

        $this->load->library( 'pagination' );
        $config[ 'base_url' ]      = base_url( 'gr/Modifications/index/'.$table );
        $config[ 'per_page' ]      = 10;
        $config[ 'num_links' ]     = 2;
        $config[ 'total_rows' ] = $this->db->where(['table_name'=>$table, 'event'=>'update'])->get( 'user_audit_trails' )->num_rows();
        $this->pagination->initialize( $config );
        $this->data[ 'listing' ] = true;
        $this->data[ 'datas' ]   = $this->db->where(['table_name'=>$table, 'event'=>'update'])->order_by( 'id', 'ASC' )->get( 'user_audit_trails', $config[ 'per_page' ],$this->uri->segment( 5 ))->result();
       
        $this->data[ 'title' ] = 'Les modifications';
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
                
                $insert = $this->db->insert('user_audit_trails_validate',$this->input->post());
                
                if(!empty($insert)){
                    $this->session->set_flashdata('msg','<div class="alert alert-success">Cette modification a été sauvegardé avec succès.</div>');
                }else{
                    $this->session->set_flashdata('msg','<div class="alert alert-danger">Cette modification a échoué </div');
                }
                
                redirect(base_url('gr/Modifications/index/'.$table));
            }

        $this->data[ 'title' ] = "Validation d'une modification";
        $this->data['table'] = $table;
        $this->data['data'] = $data;
        $this->render_template('modifications/traite', $this->data);
    }
}
        