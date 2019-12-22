<?php

class Reservations extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('Reservations_Modele');
        $this->load->model('Adherent_Modele');
        $this->load->library('session');
        $this->load->view('templates/header');
        $this->loadMenu();
        $this->load->view('templates/footer');
    }

    //Méthode pour le formulaire permettant d'effectuer une réservation
    public function formulaire() {
        $this->verifSession(0);
        $data['datesReservations'] = $this->getDateReservations();
        $data['hebergements'] = $this->Reservations_Modele->getTypeHebergement();
        $this->form_validation->set_rules('username', 'Username', 'callback_check');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("reservations/formulaire", $data);
            //$this->load->view("templates/footer");
        } else {
            $this->Reservations_Modele->insertReservations($this->Adherent_Modele->getInformation($this->session->identifiant)[0]['adh_id']);
            redirect("Adherent");
        }
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
    private function getDateReservations() {
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
        $this->verifSession(0);
        $data["reservations"] = $this->Reservations_Modele->getReservations($this->Adherent_Modele->getInformation($this->session->identifiant)[0]['adh_id']);
        $this->load->view("reservations/afficher", $data);
    }

    //Méthode permettant de supprimer les réservations sélectionnées par le client
    public function delectReservation() {
        if ($this->input->post('resid') == null)
            redirect("Reservations/afficher");
        $this->Reservations_Modele->delectReservation($this->input->post('resid'));
        redirect("Reservations/afficher");
    }

    public function getReservations() {
        $this->verifSession(1);
        $data["reservations"] = $this->Reservations_Modele->getReservations();
        $this->load->view("reservations/getReservations", $data);
    }

    public function setReservation() {         
        $this->verifSession(1);
        if (!empty($this->input->post('supprimer'))) {
            $this->Reservations_Modele->delectReservation($this->input->post('supprimer'));
            redirect('Reservations/getReservations');
        }
        $data["reservation"] = $this->Reservations_Modele->getReservation($this->input->post('modifier'));
        $data["hebergements"] = $this->Reservations_Modele->getTypeHebergement();
        $this->load->view("reservations/setReservation", $data);
        $this->form_validation->set_rules('dateDebut', 'date début de séjour', 'required');

        if ($this->form_validation->run()) {

            if (!empty($this->input->post('valider')))
                $this->Reservations_Modele->updateReservation("Valide");
            if (!empty($this->input->post('modifier')))
                $this->Reservations_Modele->updateReservation($this->input->post('etat'));
            if (!empty($this->input->post('archiver')))
                $this->Reservations_Modele->updateReservation("Archiver");
            if (!empty($this->input->post('supprimer')))
                $this->Reservations_Modele->delectReservation($this->input->post("Supprimer"));
            redirect('Reservations/getReservations');
        }
    }

    public function loadMenu() {
        if (isset($this->session->identifiant)) {
            if ($this->Adherent_Modele->getInformation($this->session->identifiant)[0]['adh_niveau'] == 1)
                $this->load->view('templates/menuAdmin');
            else
                $this->load->view('templates/menuConnecter');
        } else
            $this->load->view('templates/menuDeconnecter');
    }

    public function verifSession($id) {
        if (!isset($this->session->identifiant))
            redirect('Adherent/connexion');
        if ($this->Adherent_Modele->getInformation($this->session->identifiant)[0]['adh_niveau'] != $id)
            redirect('Adherent/connexion');
    }

}
