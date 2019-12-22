<?php

class Adherent extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Adherent_Modele');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->view('templates/header');
        $this->loadMenu();
        $this->load->view('templates/footer');
    }

    public function index() {
        $this->load->view('adherent/accueil');
    }

    //Méthode permettant d'inscrire une personnne
    public function inscription() {
        $this->form_validation->set_rules('adh_nom', 'Nom', 'required');
        $this->form_validation->set_rules('adh_prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('adh_password', 'Mot de Passe', 'required');
        $this->form_validation->set_rules('confirmmdp', 'Confirmer Mot de Passe', 'required|matches[adh_password]');
        $this->form_validation->set_rules('adh_email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('adh_tel', 'Numero de Telephone', 'required');
        $this->form_validation->set_rules('adh_adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('adh_ville', 'Ville', 'required');
        $this->form_validation->set_rules('adh_codepostal', 'Code Postal', 'required');

        if ($this->form_validation->run()) {
            $this->Adherent_Modele->inserer();
            $this->session->identifiant = $this->input->post('adh_email');
            redirect('Adherent');
        } else {            
            $this->load->view('adherent/inscription');
        }
    }

    /* Méthode de connexion pour l'utilisateur */

    public function connexion() {
        $this->form_validation->set_rules('adh_email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('adh_password', 'Mot de Passe', 'required|callback_checkPassword');

        if (isset($this->session->identifiant))
            redirect('Adherent');

        if ($this->form_validation->run()) {
            $this->session->identifiant = $this->input->post('adh_email');
            redirect("Adherent");
        } else {

            $this->load->view('adherent/connexion');
        }
    }

    /* Méthode qui déconnecte l'utilisateur */

    public function deconnexion() {
        $this->session->sess_destroy();
        redirect('Adherent/connexion');
    }

    /* Méthode qui vérifie le mot de passe de l'utilisateur dans la base de données 
     * et le mot de passe saisi par l'utilisatuer
     */

    public function checkPassword() {
        if (isset($this->session->identifiant)) {
            if ($this->Adherent_Modele->getInformation($this->session->identifiant)[0]['adh_password'] == $this->input->post('adh_password'))
                return TRUE;
        } else {
            if (isset($this->Adherent_Modele->getInformation($this->input->post('adh_email'))[0]['adh_password']) && $this->Adherent_Modele->getInformation($this->input->post('adh_email'))[0]['adh_password'] == $this->input->post('adh_password')) {
                return TRUE;
            } else {
                $this->form_validation->set_message('checkPassword', 'Mot de passe incorrecte');
                return FALSE;
            }
        }
    }

    //Méthode permettant de changer le mot de passe de l'utilisateur
    public function changePassword() {
        $this->form_validation->set_rules('adh_password', 'Mot de Passe', 'required|callback_checkPassword');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'confirpassword', 'required|matches[password]');

        $this->verifSession(0);

        if ($this->form_validation->run()) {
            $this->Adherent_Modele->changePassword();
            redirect('Adherent');
        } else {
            $this->load->view('adherent/changePassword');
            $this->load->view('templates/footer');
        }
    }

    //Méthode permettant de changer les personnes
    public function getAdherents() {
        $this->verifSession(1);
        $data['adherents'] = $this->Adherent_Modele->getInformation();
        $this->load->view('adherent/getAdherents', $data);
    }

    public function setAdherent() {
        $this->verifSession(1);
        if (!empty($this->input->post('supprimer'))) {
            $this->Adherent_Modele->delectAdherent($this->input->post('supprimer'));
            redirect('adherent/getAdherents');
        }

        $data['adherents'] = $this->Adherent_Modele->getInformation($this->input->post('modifier'));
        $this->load->view('adherent/setAdherent', $data);

        $this->form_validation->set_rules('adh_nom', 'Nom', 'required');
        $this->form_validation->set_rules('adh_prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('adh_password', 'Mot de Passe', 'required');
        $this->form_validation->set_rules('adh_email', 'E-mail', 'required|valid_email');
        $this->form_validation->set_rules('adh_tel', 'Numero de Telephone', 'required');
        $this->form_validation->set_rules('adh_adresse', 'Adresse', 'required');
        $this->form_validation->set_rules('adh_ville', 'Ville', 'required');
        $this->form_validation->set_rules('adh_codepostal', 'Code Postal', 'required');

        if (($this->form_validation->run())) {
            if (!empty($this->input->post('modifier')))
                $this->Adherent_Modele->updateAdherent($this->input->post('modifier'));
            else if (!empty($this->input->post('supprimer')))
                $this->Adherent_Modele->delectAdherent($this->input->post('supprimer'));
            redirect('adherent/getAdherents');
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
