<?php

    class Reservations_Modele extends CI_Model {
        
        public function __construct() {
            $this->load->database();
            $this->load->helper('url');
            $this->load->library('session');
        }
        
        public function insertReservations() {    
            $data = array(
                'res_date_reserv' => date("Y-m-d H:i:s"), 
                'res_valide' => 'En attente', 
                'res_datedebut' => $this->input->post('dateDebut'),
                'res_datefin' => date("Y-m-d", strtotime(date("Y-m-d", strtotime($this->input->post('dateDebut'))) . " + 1 week")),//->add(new DateInterval('5D')), 
                'res_tarif' => 400, 
                'res_menage' => $this->input->post('menage'), 
                'res_pension' => $this->input->post('pension'), 
                'typeheb_id' => $this->input->post('type_heb'), 
                'adh_id' =>  $this->session->identifiant, 
                'heb_id' => null,                               
            );
            
            return $this->db->insert('reservation', $data);
        }
        
        public function getReservation($client) {
            $this->db->select();
            $this->db->from('reservation');
            $this->db->join("type_hebergement", "reservation.typeheb_id = type_hebergement.typeheb_id");
            $this->db->where(array('adh_id' => $client));  
            
            $query = $this->db->get();
            
            return $query->result_array();
        }
        
        public function delectReservation($id)  {
            foreach ($id as $i):
                $this->db->where(array('res_id' => $i));
                $this->db->delete('reservation');
            endforeach; 
        }     
        
         public function getTypeHebergement($heb = 0) {
            $query = null;
            if ($heb == 0)
                $query = $this->db->get('type_hebergement');
            else {
                $query = $this->db->select();
                $query->from('type_hebergement');
                $query->where(array('typeheb_id' => $heb));       
            }
                
            return $query->result_array();
        }
       
    }