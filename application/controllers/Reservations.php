<?php

class Reservations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Reservations_Modele');
        $this->load->library('session');
        
        $this->load->view('templates/header');
        
        if (!isset($this->session->identifiant)) 
            redirect("Adherent/connexion");
        else
            $this->load->view('templates/menuConnecter');

        $this->load->view('templates/footer');
    }
    
    //Méthode pour le formulaire permettant d'effectuer une réservation
    public function formulaire() {
        $data['datesReservations'] = $this->getDateReservations();
        $data['hebergements'] = $this->Reservations_Modele->getTypeHebergement();
        $this->form_validation->set_rules('username', 'Username', 'callback_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("reservations/formulaire", $data);
            //$this->load->view("templates/footer");
        }

        $this->Reservations_Modele->insertReservations();
    }
    
    //Vérification que l'utilisateur a bien saisi un type hébergement
    public function check($str) {
        if ($this->input->post('type_heb') == null) {
            $this->form_validation->set_message('check', "Vous devez cocher un type d'hébergement");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //Méthode permmettant de récupérer les dates disponibles de la réservation
    public function getDateReservations() {
        $dates = array();
        $file = fopen("dates.csv", "r");
        $i = 0;
        while ($date = fgets($file)) {
            $dates[$i] = $date;
            $i++;
        }
        fclose($file);
        return $dates;
    }

    //Méthode permettant d'afficher toutes les réservations du client
    public function afficher($client = 0) {
        $client = $this->session->identifiant;
        $data["reservations"] = $this->Reservations_Modele->getReservation($client);

        $this->load->view("reservations/afficher", $data);        
    }

    //Méthode permettant de supprimer les réservations sélectionnées par le client
    public function delectReservation() {
        if ($this->input->post('resid') == null)
            redirect("Reservations/afficher");
        $this->Reservations_Modele->delectReservation($this->input->post('resid'));
        redirect("Reservations/afficher");
    }

}
