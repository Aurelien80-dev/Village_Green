<?php


defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * \Controller Commande
 * \author Lenglet Aurelien
 * \version 1.0
 * \date 07 aout 2019
 * \brief La classe commande permet de gerer la sexion commande.
 * \details Cette classe permet de créer un panier, d'y ajouter ou d'en supprimer des produits, de l'afficher, de le modifier et de le supprimer
 */

class Provider extends CI_Controller
{
    public function ajout_provider()
    {
        if ($data = $this->input->post())
        {
            $data = $this->security->xss_clean($data);// variable qui rends des script innofensive
            $this->db->set('d_ajout','now()',false);
            $this->db->set('role','Commerciale');
            $this->db->insert("fournisseurs", $data);
     
            
            
            
        } 
            $this->load->view('ajout_fournisseur');
            
            
            
        }
        public function liste_provider()
        {$requete =  $this->db->query('Select * from fournisseurs');
           
        $data['fournisseur'] = $requete->result();
        $this->load->view('liste_fournisseur', $data);
        
        }
        
        public function details($id_fou)
        {
            $requete = $this->db->query("SELECT * FROM fournisseurs WHERE id_fou = ?", $id_fou);
            $data['id_fou'] = $id_fou;
            $model["fournisseurs"] = $requete->result();
            
            $this->load->view("details_provider", $model);
            
            
        }
        
        
        public function modif_provider($id_fou)
        {
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->database();
            $this->output->enable_profiler(false);
            
          
            if( $this->input->post())
            {   
                $data = $this->input->post();
                $data = $this->security->xss_clean($data);
                unset($data['mail']);
                $this->db->where('id_fou', $id);
                $this->db->set('d_modif','now()',false);
                $this->db->update('fournisseurs', $data);
                 redirect('provider');
                
            } else
            {
                $requete = $this->db->query("SELECT * FROM fournisseurs WHERE id_fou = ?", $id_fou);
                $aView["fournisseurs"] = $requete->row(); // première ligne du résultat
            $this->load->view('modif_provider', $aView);
             
            }
        }
        public function supp_provider($id_fou)
        {               $this->output->enable_profiler(True);
            
            $this->load->helper('form');
            $this->load->helper('url');
            $this->load->database();
                $requete= $this->db->query("SELECT * FROM fournisseurs WHERE id_fou= ?", $id_fou);
                $model["fournisseurs"] = $requete->result();
                
            // condition si le bouton supprimer et poster
           if ($this->input->post("Supprimer"))
            {   
               
              
            
            $this->db->where('id_fou', $id_fou);
            $this->db->delete('fournisseurs');/*! requete qui supprime le produits selectionnez sur le catalogue*/
            
            }
           
            $requete = $this->db->query("SELECT * FROM fournisseurs WHERE id_fou = ?", $id_fou);
            $aView["fournisseurs"] = $requete->result(); // première ligne du résultat
            $this->load->view('supp_provider', $aView);
        }
            
            
        
    
    
        
    
    
    
    
    
    
    
    
    
    
    
    
    
}
    
