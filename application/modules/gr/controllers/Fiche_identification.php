<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Fiche_identification extends Admin_Controller{

		public function __construct(){
			parent::__construct();
			$this->data['page_title'] = $this->lang->line('identity_title');
			$this->data['js'] = base_url()."assets/js/pages/Fiche_identification.js";
			$this->data['url_list'] = "";
		}

		public function index(){
			$this->load->library( 'pagination' );
			$this->data[ 'title' ] = $this->lang->line('identity_title');
			$this->data[ 'url_list' ] = "gr/Fiche_identification/fetch_data";
			$this->render_template('fiche_identification/index', $this->data);
		}

		public function fetch_data(){
			$table = "gr_fiche_identification";
			$primary = $this->config->item($table)['primary'];
			$select_column = $this->config->item($table)['fields'];
			$order_column = $this->config->item($table)['order'];
			$search_column = $this->config->item($table)['search'];

			$fetch_data = $this->My_model->make_datatables($table, $primary, $order_column, $search_column, $select_column,[]);

			$array_data = array();
			foreach ($fetch_data as $data) {				
					$colline = get_db_occurency("gr_collines", array('id_colline',$data->id_colline)); 
					$commune = get_db_occurency("gr_communes", array('id_commune ',$colline->id_commune)); 
					$province = get_db_occurency("gr_provinces", array('id_province',$commune->id_province)); 

					$sub_array = array();
				
					$sub_array[] =$data->id_identification;
					$sub_array[] =$data->matricule;
					$sub_array[] =get_db_value("gr_categories","nom_categorie",array("id_categorie",$data->id_categorie));
					$sub_array[] =$data->nom;
					$sub_array[] =$data->prenom;
					$sub_array[] =get_db_value("gr_sexes","nom_sexe",array("id_sexe",$data->id_sexe));
					$sub_array[] =get_db_value("gr_ethnies","nom_ethnie",array("id_ethnie",$data->id_ethnie));
					$sub_array[] =get_db_value("gr_corps_origine","nom_corps_origine",array("id_corps_origine",$data->id_corps_origine));
					$sub_array[] =get_db_value("gr_etat_civil","nom_etat_civil",array("id_etat_civil",$data->id_etat_civil));
					$sub_array[] =$data->date_naissance;
					$sub_array[] =$data->ville_naissance;
					$sub_array[] =$province->nom_province."/".$commune->nom_commune."/".$colline->nom_colline;
					$sub_array[] =get_db_value("gr_promotions","nom_promotion",array("id_promotion",$data->id_promotion));
					$sub_array[] ="
						<a href='".base_url('gr/Fiche_identification/view/'.$data->id_identification)."'><span class='fa fa-eye'></span></a>
						&nbsp; 
						<a href='".base_url('gr/Fiche_identification/edit/'.$data->id_identification)."'><span class='fa fa-edit'></span></a>
						&nbsp;
						<a href='".base_url('gr/Fiche_identification/delete/'.$data->id_identification)."' class='delete'><span class='fa fa-trash text-danger'></span></a></td>";
					
					$array_data[] = $sub_array;
			}

			$output = array(
				"draw" => intval($_POST["draw"]),
				"recordsTotal" =>$this->My_model->get_all_data($table),
				"recordsFiltered" => $this->My_model->get_filtered_data($table, $primary, $order_column, $search_column, $select_column, []),
				"data" =>$array_data
			);

			echo json_encode($output);

		}

		public function add(){
			$this->form_validation->set_rules('matricule', 'Matricule', 'required');
			$this->form_validation->set_rules('nouveau_matricule', 'Nouveau_matricule', 'required');
			$this->form_validation->set_rules('ancien_matricule', 'Ancien_matricule', 'required');
			$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
			$this->form_validation->set_rules('nom', 'Nom', 'required');
			$this->form_validation->set_rules('prenom', 'Prenom', 'required');
			//$this->form_validation->set_rules('photo_psp', 'Photo_psp', 'required');
			$this->form_validation->set_rules('id_sexe', 'Id_sexe', 'required|numeric');
			$this->form_validation->set_rules('id_ethnie', 'Id_ethnie', 'required|numeric');
			$this->form_validation->set_rules('id_corps_origine', 'Id_corps_origine', 'required|numeric');
			$this->form_validation->set_rules('id_etat_civil', 'Id_etat_civil', 'required|numeric');
			$this->form_validation->set_rules('nombre_enfant', 'Nombre_enfant', 'required|numeric');

			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('id_etat_civil') == 1){
				$this->form_validation->set_rules('conjoin_salarie', 'Conjoin_salarie', 'required');				
			}
			
			$this->form_validation->set_rules('date_naissance', 'Date_naissance', 'required');
			$this->form_validation->set_rules('annee_naissance', 'Annee_naissance', 'required|numeric');
			$this->form_validation->set_rules('anne_pension_min', 'Anne_pension_min', 'required|numeric');
			$this->form_validation->set_rules('annee_pension_max', 'Annee_pension_max', 'required|numeric');
			$this->form_validation->set_rules('id_pays_naissance', 'Id_pays_naissance', 'required|numeric');
			$this->form_validation->set_rules('ville_naissance', 'Ville_naissance', 'required');
			$this->form_validation->set_rules('id_province', 'id_province', 'required|numeric');
			$this->form_validation->set_rules('id_commune', 'id_commune', 'required|numeric');
			$this->form_validation->set_rules('id_colline', 'Id_colline', 'required|numeric');
			$this->form_validation->set_rules('id_promotion', 'Id_promotion', 'required|numeric');
			$this->form_validation->set_rules('noms_pere', 'Noms_pere', 'required');
			$this->form_validation->set_rules('noms_mere', 'Noms_mere', 'required');
			$this->form_validation->set_rules('numero_inss', 'Numero_inss', 'required');
			$this->form_validation->set_rules('numero_mfp', 'Numero_mfp', 'required');
			$this->form_validation->set_rules('numero_psp', 'Numero_psp', 'required');
			$this->form_validation->set_rules('id_religion', 'Id_religion', 'required|numeric');
			$this->form_validation->set_rules('id_groupe_sanguin', 'Id_groupe_sanguin', 'required|numeric');

			$file_name = "";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){	
				$file_name = date('YmdHis').'_'.$_FILES['photo_psp']['name'];	
				$this->form_validation->set_rules('photo_psp', 'Photo passeport', $this->fdnb_library->upload_file('photo_psp', $file_name));
			}

			if($this->form_validation->run()){

				$insert = $this->db->insert('gr_fiche_identification',$_POST);

				if(!empty($insert)){
					$this->session->set_flashdata('msg','Entry added succesfuly');
				}else{
					$this->session->set_flashdata('msg','Error while inserting data');
				}
			redirect(base_url('gr/Fiche_identification/index'));
			}
			$this->data[ 'title' ] = 'Fiche Identification';
			$this->render_template('fiche_identification/add', $this->data);

		}

		public function view($id){
			$this->data['data'] = $this->db->get_where('gr_fiche_identification',array('id_identification'=>$id))->row();
			$this->data['documents'] = $this->db->select('*')->where('id_identification',$id)->from('gr_documents_joints dc')->join('gr_type_documents td', 'dc.id_type_document=td.id_type_document')->get()->result();
			$this->data[ 'title' ] = 'Fiche Identification';
			$this->data['title_top_bar'] = get_db_soldat_titre($id);
			$this->render_template('fiche_identification/view', $this->data);
		}

		public function edit($id){

			$this->data['data'] = $this->db->get_where('gr_fiche_identification',array('id_identification'=>$id))->row();

			$this->form_validation->set_rules('matricule', 'Matricule', 'required');
			$this->form_validation->set_rules('nouveau_matricule', 'Nouveau_matricule', 'required');
			$this->form_validation->set_rules('ancien_matricule', 'Ancien_matricule', 'required');
			$this->form_validation->set_rules('id_categorie', 'Id_categorie', 'required|numeric');
			$this->form_validation->set_rules('nom', 'Nom', 'required');
			$this->form_validation->set_rules('prenom', 'Prenom', 'required');
			//$this->form_validation->set_rules('photo_psp', 'Photo_psp', 'required');
			$this->form_validation->set_rules('id_sexe', 'Id_sexe', 'required|numeric');
			$this->form_validation->set_rules('id_ethnie', 'Id_ethnie', 'required|numeric');
			$this->form_validation->set_rules('id_corps_origine', 'Id_corps_origine', 'required|numeric');
			$this->form_validation->set_rules('id_etat_civil', 'Id_etat_civil', 'required|numeric');
			$this->form_validation->set_rules('nombre_enfant', 'Nombre_enfant', 'required|numeric');

			if($_SERVER['REQUEST_METHOD'] == 'POST' && $this->input->post('id_etat_civil') == 1){
				$this->form_validation->set_rules('conjoin_salarie', 'Conjoin_salarie', 'required');				
			}
			$this->form_validation->set_rules('date_naissance', 'Date_naissance', 'required');
			$this->form_validation->set_rules('annee_naissance', 'Annee_naissance', 'required|numeric');
			$this->form_validation->set_rules('anne_pension_min', 'Anne_pension_min', 'required|numeric');
			$this->form_validation->set_rules('annee_pension_max', 'Annee_pension_max', 'required|numeric');
			$this->form_validation->set_rules('id_pays_naissance', 'Id_pays_naissance', 'required|numeric');
			$this->form_validation->set_rules('ville_naissance', 'Ville_naissance', 'required');
			$this->form_validation->set_rules('id_province', 'id_province', 'required|numeric');
			$this->form_validation->set_rules('id_commune', 'id_commune', 'required|numeric');
			$this->form_validation->set_rules('id_colline', 'Id_colline', 'required|numeric');
			$this->form_validation->set_rules('id_promotion', 'Id_promotion', 'required|numeric');
			$this->form_validation->set_rules('noms_pere', 'Noms_pere', 'required');
			$this->form_validation->set_rules('noms_mere', 'Noms_mere', 'required');
			$this->form_validation->set_rules('numero_inss', 'Numero_inss', 'required');
			$this->form_validation->set_rules('numero_mfp', 'Numero_mfp', 'required');
			$this->form_validation->set_rules('numero_psp', 'Numero_psp', 'required');
			$this->form_validation->set_rules('id_religion', 'Id_religion', 'required|numeric');
			$this->form_validation->set_rules('id_groupe_sanguin', 'Id_groupe_sanguin', 'required|numeric');
			
			$file_name = "";
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				if(!empty($_FILES['photo_psp']['name'])){
					$file_name = date('YmdHis').'_'.$_FILES['photo_psp']['name'];			
					$this->form_validation->set_rules('photo_psp', 'Photo passeport', $this->fdnb_library->upload_file('photo_psp', $file_name));
				}
			}

			if($this->form_validation->run()){
				$this->db->where('id_identification',$id);

				if(!empty($_FILES['photo_psp']['name'])){
					$_POST['photo_psp'] = $file_name;
				}else{
					unset($_POST['photo_psp']);
				}				
				
				$insert = $this->db->update('gr_fiche_identification',$_POST);

				if(!empty($insert)){
					$this->session->set_flashdata('msg','Entry updated succesfuly');
				}else{
					$this->session->set_flashdata('msg','Error updating inserting data');
				}

				redirect(base_url('gr/Fiche_identification/index'));
			}
			$this->data[ 'title' ] = 'Edit Fiche Identification';
			$this->render_template('fiche_identification/edit', $this->data);		
		}

		public function delete($id){
			if($this->db->delete('gr_fiche_identification',array('id_identification'=>$id))){
				$this->session->set_flashdata('msg','Entry deleted succesfuly');
				redirect(base_url('gr/Fiche_identification/index'));
			}
		}

		
	public function get_communes()
	{
		# code...
		$id_province = $this->uri->segment(4);
		$id_commune = $this->uri->segment(5);

		
		$communes = $this->My_model->get_all('gr_communes',['id_province'=>$id_province]);

		$options = "<option value='0'> -Selectionner- </option>";
		if($communes){
			foreach ($communes as $commune) {
				# code...
				$selected = $id_commune == $commune->id_commune?"selected":"";
				$options .= "<option $selected value='". $commune->id_commune."'>".$commune->nom_commune."</option>";
			}  
		}

		echo $options;
	}

	public function get_collines()
	{
		# code...
		$id_colline = $this->uri->segment(4);
		$id_commune = $this->uri->segment(5);

		
		$collines = $this->My_model->get_all('gr_collines',['id_commune'=>$id_commune]);

		$options = "<option value='0'> -Selectionner- </option>";
		if($collines){
			foreach ($collines as $colline) {
				# code...
				$selected = $id_colline == $colline->id_colline?"selected":"";
				$options .= "<option $selected value='". $colline->id_colline."'>".$colline->nom_colline."</option>";
			}  
		}

		echo $options;
	}

	public function change_profile($id)
	{
		$this->db->where('id_identification',$id);
		$file_name = date('YmdHis').'_'.$_FILES['photo_psp']['name'];	

		if(!empty($_FILES['photo_psp']['name']) && $this->fdnb_library->upload_file('photo_psp', $file_name)){			
			$array['photo_psp'] = $file_name;
			$insert = $this->db->update('gr_fiche_identification',$array);
		}			
		
		redirect(base_url('gr/Fiche_identification/view/'.$id));
	}

	public function ajout_document($id)
	{
		$data['id_identification'] =$id;
		$data['id_type_document'] = $this->input->post('id_type_document');
		$file_name = $id."_".date('YmdHis').'_'.$_FILES['photo_psp']['name'];	
		$folder="uploads/document_joint/";
		
		if(!empty($_FILES['photo_psp']['name']) && $this->fdnb_library->upload_file('photo_psp', $file_name, $folder)){			
			$data['fichier_joint']=$file_name;
			$check_file = $this->db->get_where('gr_documents_joints', ['id_identification'=>$id, 'id_type_document'=>$this->input->post('id_type_document')])->row();
			
			// echo "<pre>";
			// print_r($check_file);
			// echo "</pre>";

			$doc = $this->db->get_where('gr_type_documents',['id_type_document'=>$this->input->post('id_type_document')])->row();
			$insert = FALSE;
			if(!empty($check_file)){
				$this->db->where(['id_identification',$id, 'id_type_document'=>$this->input->post('id_type_document')]);
				$insert = $this->db->update('gr_documents_joints', $data);

				if($insert){ 
					$this->session->set_flashdata('msg',"<div class='alert alert-success'>Le document ".$doc->nom_type_document." mis à jour avec succès</div>");
				}
			}else{
				$insert = $this->db->insert('gr_documents_joints', $data);
				if($insert){
					$this->session->set_flashdata('msg',"<div class='alert alert-success'>Le document ".$doc->nom_type_document." a été ajouté avec succès</div>");
				}

			}			
		}		
		
		redirect(base_url('gr/Fiche_identification/view/'.$id));
	}

	
}

			