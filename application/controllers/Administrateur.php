<?php

class Administrateur extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reservations_Modele');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->view('templates/header');
        $this->load->view('templates/menuAdmin');
        $this->load->view('templates/footer');
    }
    
    public function index() {
        
    }
    
    public function createUser() {
        $this->load->view('adherent/inscription');
    }

    public function setUsers() {
        
    }

    public function setReservations() {
        $data['reservations'] = $this->Reservations_Modele->getReservations();
        $this->load->view('reservations/setReservations', $data);
    }

}
