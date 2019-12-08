<?php

    class Adherent_Modele extends CI_Model {
        
        public function __construct() {
            $this->load->database();
            $this->load->helper('url');
        }
        
        public function inserer() {
            $data = array (
               'adh_nom' => $this->input->post('adh_nom'),
               'adh_prenom' => $this->input->post('adh_prenom'),
               'adh_password' => $this->input->post('adh_password'),
               'adh_email' => $this->input->post('adh_email'),
               'adh_tel' => $this->input->post('adh_tel'),
               'adh_adresse' => $this->input->post('adh_adresse'),
               'adh_codepostal' => $this->input->post('adh_codepostal'),
               'adh_ville' => $this->input->post('adh_ville'),              
            );
            
            return $this->db->insert('adherent', $data);
        }
        
        public function getInformation($mail){
             $this->db
             ->select('*')
             ->from('adherent')
             ->where('adh_email', $mail);
             
             $query = $this->db->get();             
             return $query->result_array();
        }
        
        public function changePassword() {
            $this->db
            ->set('adh_password',$this->input->post('password'))
            ->where('adh_email',$this->session->identifiant)
            ->update('adherent');
            
        }
    }
    
