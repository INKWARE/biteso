<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Biometrie extends MY_Controller {


    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');

        $this->db->set(['nom'=>$nom,'prenom'=>$prenom]);
        $this->db->insert('biometrie');
    }
}