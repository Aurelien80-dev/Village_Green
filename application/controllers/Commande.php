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

class Commande extends CI_Controller
{
    
    
    
    public function ajout()
    {        
        $this->load->helper('form');       
        $this->load->database();        
      
      
        foreach($this->session->panier as $produits)
        {  
            
            $data['pro_id'] = $produits['pro_id'];
            $data['priuni'] = $produits['pro_prix'];
            $data['pro_qte'] = $produits['pro_qte'];
            $data['cli_id'] = $this->session->clients->cli_id;       
          
            $data = $this->security->xss_clean($data);
        $this->db->set('d_com','now()', false, 'numcom' );
        $this->db->insert('commande', $data);
  $this->db->query('UPDATE produits, commande SET produits.pro_stock = produits.pro_stock - commande.pro_qte Where produits.pro_id = commande.pro_id  and produits.pro_id = ?', $data['pro_id'] );
                    
                  
                    
                
                       
        } 
        redirect('Commande/payer');       
        }  
          
         
      
    
      
    public function payer()
    { 
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database(); 
        if($this->session->connected)
        {
       $requete =  $this->db->query('Select pro_id, priuni from commande');  
        $com['commande'] = $requete->result();                
        }        
       $this->load->view("ajout_commande", $com);       
    }
    public function valider_commande()
    {
        $this->load->helper('form');
        $this->load->database();
        $requete =  $this->db->query('Select pro_id, priuni from commande');
        
        $com['commande'] = $requete->result();    
        $data = $this->input->post();
        
        if($this->input->post())
        {    
           
           $this->db->set('d_com', 'now()', false, 'obscom','commande a expedier', 'payer', '1' );
            $this->db->insert('commande_valider', $data);
    }
    
           redirect('Produits/home');
  }
  public function liste_commande()
  {
      $requete =  $this->db->query('Select * from commande, clients join produits where produits.pro_id = commande.pro_id and commande.cli_id = clients.cli_id');
      $data['commande'] = $requete->result();
      $this->load->view('liste_commande', $data);
  
      
      
      
  }
  
      public function commande_valider()
      {
          if($this->session->personnel == true)
          {
          $requete =  $this->db->query('Select * from commande_valider' );
          $aView['commande'] = $requete->result();
          $this->load->view('commande_valider', $aView);
          }
          
      }
      public function total()
      {
          
          $requete = $this->db->query('Select sum(prix_total) as total, YEAR(d_com) as annee from commande_valider ');
          $data['commande'] = $requete->result();
          if($this->input->post())
          {   
              $this->load->helper('form');
              $this->db->set('annee', 'now()', false);
              $this->db->insert('ventes');
              
              
              
          }
              
          $this->load->view('total_ventes', $data);
          
          
          
      }
      
      
      
      
      
      
  
}

