<?php

    class Adherent extends CI_Controller {
          
    public function __construct()
    {
         parent::__construct();
         $this->load->model('Adherent_Modele');
         $this->load->helper('url_helper');
         $this->load->helper('url');
         $this->load->library('form_validation');
         $this->load->helper('form');  
         $this->load->library('session');
         $this->load->view('templates/header');    
         $this->load->view('templates/footer');
         
    }
    
    public function accueil(){
        if (isset($this->session->identifiant))
             $this->load->view('templates/menuConnecter');
         else
             $this->load->view('templates/menuDeconnecter');
        $this->load->view('adherent/accueil'); 
    }
    
    //Méthode permettant d'inscrire une personnne
    public function inscription()
    {        
        $this->form_validation->set_rules('adh_nom','Nom', 'required');
        $this->form_validation->set_rules('adh_prenom','Prenom', 'required');
        $this->form_validation->set_rules('adh_password','Mot de Passe', 'required');
        $this->form_validation->set_rules('confirmmdp','Confirmer Mot de Passe', 'required|matches[adh_password]');
        $this->form_validation->set_rules('adh_email','E-mail', 'required|valid_email');
        $this->form_validation->set_rules('adh_tel','Numero de Telephone', 'required');
        $this->form_validation->set_rules('adh_adresse','Adresse', 'required');       
        $this->form_validation->set_rules('adh_ville','Ville', 'required');
         $this->form_validation->set_rules('adh_codepostal','Code Postal', 'required');
        
        if($this->form_validation->run()){
            $this->Adherent_Modele->inserer();
            $this->load->view('adherent/accueil');            
        }
        else{       
            $this->load->view('templates/menuDeconnecter');
            $this->load->view('adherent/inscription');
        }        
    }
    
    /*Méthode de connexion pour l'utilisateur*/
     public function connexion(){
        
        $this->form_validation->set_rules('adh_email','E-mail', 'required|valid_email');
        $this->form_validation->set_rules('adh_password','Mot de Passe', 'required|callback_checkPassword');
       
        if(isset($this->session->identifiant) || $this->form_validation->run()){     
            $this->session->identifiant = $this->Adherent_Modele->getInformation()[0]['adh_id'];
            redirect("Adherent/accueil");       
        }
        else {
            $this->load->view('templates/menuDeconnecter');
            $this->load->view('adherent/connexion');
        }
    }    
    
    /*Méthode qui déconnecte l'utilisateur*/
    public function deconnexion() {
       $this->session->sess_destroy();
       redirect('Adherent/connexion');
   }
    
    /*Méthode qui vérifie le mot de passe de l'utilisateur dans la base de données 
     * et le mot de passe saisi par l'utilisatuer
     */
    public function checkPassword() {           
        if(isset($this->Adherent_Modele->getInformation()[0]['adh_password']) && $this->Adherent_Modele->getInformation()[0]['adh_password'] == $this->input->post('adh_password')){            
            return TRUE;          
        }
        else{     
            $this->form_validation->set_message('checkPassword','Mot de passe incorrecte');
            return FALSE;            
        }
        
    }
    
    //Méthode permettant de changer le mot de passe de l'utilisateur
    public function changePassword() {
        $this->form_validation->set_rules('adh_password','Mot de Passe', 'required|callback_checkPassword');
        $this->form_validation->set_rules('password','password', 'required');
        $this->form_validation->set_rules('confirmPassword','confirpassword', 'required|matches[password]');
        
        if($this->form_validation->run()){
            $this->Adherent_Modele->changePassword();
            $this->load->view('adherent/accueil');        
        }
        else{
            $this->load->view('templates/menuConnecter');
            $this->load->view('adherent/changePassword');
            $this->load->view('templates/footer');
        }         
    }
}
