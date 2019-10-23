<?php

//  Fichier model

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    public function listeCategorie()
    {
        // Charge la librairie 'database' si non paramétré dans config
        $this->load->database();
        // Exécute la requête
        $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent is null');
        // Récupération des résultats
        $result = $requete->result();
        
        return $result;
    }
    
    public function SousCategories()
    {
        // Charge la librairie 'database' si non paramétré dans config
        $this->load->database();
        // Exécute la requête
        $requete = $this->db->query('SELECT * FROM categories WHERE cat_parent = ?', array($_POST["cat_id"]));
        // Récupération des résultats
        
        if ($requete) // Si la requête contient des informations
        {
            $SousCategories = $requete->result();
            
            if ($SousCategories && is_array($SousCategories) && count($SousCategories)>0)
            {
                // var_dump($aSousCategories);
                return $SousCategories;
            }
        }
    }
    
}
?>