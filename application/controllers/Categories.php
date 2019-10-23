<?php
        // Fichier controller
        
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller
{
   /* public function Categories()
    {     // Charge le modèle 'produits_model'
        
        $this->load->model('Categories_model');
        
        // On appelle la méthode listeCategories() du modèle,
        // qui retourne le tableau de résultat ici affecté dans la variable $aCategorie (un tableau)
        // remarque la syntaxe $this->nom_modele->methode()
        $aCategorie = $this->categories_model->listeCategorie();
       
        
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue
        $aViewCategorie['ajout'] = $aCategorie;
        // Appel de la vue avec transmission du tableau
        $this->load->view('ajout', $aViewCategorie);
    }*/
    
    public function SousCategories()
    {
        
        if ($this->input->is_ajax_request())    // Si la requête est une requête ajax
            // Charge le modèle 'categories_model'
            $this->load->model('Categories_model');
            {   
                
                $SousCategories = $this->Categories_model->SousCategories(array($_POST["cat_id"]));
            
        
            echo json_encode($SousCategories);
        }
        
    }
}

?>