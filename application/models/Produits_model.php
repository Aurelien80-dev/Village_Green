<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produits_model extends CI_Model
{
    
    
    public function listes()
    {
        $this->load->database();
        $requete = $this->db->query('select * from produits');
        $model = $requete->result();
        return $model;
    }
    
    
    
    
    public function listeCommande()
    {
        $this->load->database();
        $requete = $this->db->query('Select * from produits join categories on produits.pro_cat_id=categories.cat_id where pro_bloque is null order by cat_nom');
        
        $model = $requete->result();
        
        return $model;
    }
    public function listeCommandePrixCroissants()
    {
        $this->load->database();
        $requete = $this->db->query('select * from produits order by produits.pro_prix');
        $model = $requete->result();
        return $model;
        
    }
    public function listeCommandePrixDecroissants()
    {
        $this->load->database();
        $requete = $this->db->query('select * from produits order by  pro_prix DESC');
        $model = $requete->result();
        return $model;
        
    }
    
    
}

?>