<?php

class Reservations_Modele extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
    }

    public function getReservations($client = 0) {
        $query = null;
        if ($client == 0) {
            $this->db
                    ->select('*')
                    ->from('reservation')
                    ->join("type_hebergement", "reservation.typeheb_id = type_hebergement.typeheb_id")
                    ->join("adherent", "adherent.adh_id = reservation.adh_id")
                    ->order_by('res_date_reserv');
        } else {
            $this->db
                    ->select('*')
                    ->from('reservation')
                    ->join("type_hebergement", "reservation.typeheb_id = type_hebergement.typeheb_id")
                    ->join("adherent", "adherent.adh_id = reservation.adh_id")
                    ->where(array('reservation.adh_id' => $client))
                    ->order_by('res_date_reserv');
        }

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getReservation($id) {
        $this->db
                ->select('*')
                ->from('reservation')
                ->join("type_hebergement", "reservation.typeheb_id = type_hebergement.typeheb_id")
                ->join("adherent", "adherent.adh_id = reservation.adh_id")
                ->where(array('res_id' => $id))
                ->order_by('res_date_reserv');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function insertReservations($client) {
        $data = array(
            'res_date_reserv' => date("Y-m-d H:i:s"),
            'res_valide' => 'En attente',
            'res_datedebut' => $this->input->post('dateDebut'),
            'res_datefin' => date("Y-m-d", strtotime(date("Y-m-d", strtotime($this->input->post('dateDebut'))) . " + 1 week")),
            'res_tarif' => 400,
            'res_menage' => $this->input->post('menage'),
            'res_pension' => $this->input->post('pension'),
            'typeheb_id' => $this->input->post('type_heb'),
            'adh_id' => $client,
            'heb_id' => null,
        );

        return $this->db->insert('reservation', $data);
    }

    public function updateReservation($etat) {
        $data = array(
            'res_valide' => $etat,
            'res_datedebut' => $this->input->post('dateDebut'),
            'res_datefin' =>  date("Y-m-d", strtotime(date("Y-m-d", strtotime($this->input->post('dateDebut'))) . " + 1 week")),
            'res_tarif' => $this->input->post('tarif'),
            'res_menage' => $this->input->post('menage'),
            'res_pension' => $this->input->post('pension'),  
            'typeheb_id' => $this->input->post('type_heb'),            
        );

        $this->db->set($data)->where('res_id', $this->input->post('idReservation'))->update('reservation');
    }

    public function delectReservation($id) {
        if (!is_array($id)) {
            $this->db->where(array('res_id' => $id));
            $this->db->delete('reservation');
        } else {
            foreach ($id as $i):
                $this->db->where(array('res_id' => $i));
                $this->db->delete('reservation');
            endforeach;
        }
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
