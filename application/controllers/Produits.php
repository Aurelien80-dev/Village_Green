<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Produits extends CI_Controller
{
    public function Home()
    {
        $this->load->view('home');                        
    }
    
    public function listes()
    {
        /*! Requete pour charger le model */
        // $this->output->enable_profiler(True);
        $this->load->helper('url');
        $this->load->model('produits_model');
        $aListe = $this->produits_model->listes();
        $aView["listes"] = $aListe;
        $this->input->post(); //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
      
        $this->load->view('listes', $aView);
        
        
        
        
        
        
        
        
        
        // suite de la fontion sans le model
        /* $resultats = $this->db->query("select * from produits");
         $aListe = $resultats->result();
         $aView['listes'] = $aListe;
         $this->load->view("listes", $aView);*/
    }
    
    /*!
     * \brief affiche le détail d'un produit
     *
     * \version 1.0
     * \date 06/08/2019 15:56:01
     * \author Lenglet Aurelien
     */
    public function details($id)
    {
        
        
        
        $requete = $this->db->query("SELECT * FROM produits WHERE pro_id = ?", $id);
        $model["listes"] = $requete->result();
        
        $this->load->view("detail_produits", $model);
    }
    /*!
     * \brief fonction s'occupe du formulaire d'ajout
     *\disponible que si l'utilisateur a les droits d'admin
     * \version 1.0
     * \date 06/08/2019 15:56:01
     * \author Lenglet Aurelien
     
     */
    public function ajout()
    {
        
        $this->load->helper('form');
        
        $this->load->database();
        $requete = $this->db->query('Select pro_photo from produits');
        $photos = $requete->result();
        $this->load->model('categories_model');
        
        $categories = $this->categories_model->listeCategorie();
        $model['categories'] = $categories;
        
        
        
        
        if($this->input->post()) {
            
            $pro_id = $this->input->post('pro_id');
            
            
            $config['upload_path']  = './assets/images/produits/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $pro_id ;
            $config['overwrite'] = true;
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('pro_photo'))
            {
                $upload =  print_r($this->upload->data());
            }
            else
            {
                $upload =   print_r($this->upload->display_errors());
            }
           
            $extension = substr(strrchr($_FILES['pro_photo']['name'], '.'), 1);
            // Je rajoute l'extension de la photo (car pas un post mais un files)
            $data = $this->input->post();
            $data = $this->security->xss_clean($data);
            unset($data['email']);
            unset($data['mail']);
            unset($data['categories']);
            $this->db->insert('produits', $data);
            redirect(site_url('Produits/listes'));
        }
        else {
            $this->load->view('ajout_produits', $model);
        }
        
        
        
        
    }
    
    public function modif($id)
    {  $this->load->helper('form');
    $this->load->helper('url');
    
    $this->load->database();
    $produits = $this->input->post("pro_id");
    
    if ($this->input->post())
    {  
    
    
    
    
    $data = $this->input->post();
        $data = $this->security->xss_clean($data);
        unset($data['email']);
        
        $this->db->where('pro_id', $id);
    $this->db->update('produits', $data);
    redirect('Produits/listes');
    }
    else
    {
        $produits = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", array($id));
        $aView["produits"] = $produits->row(); // première ligne du résultat
        $this->load->view('modif_produits', $aView);
    }
    }
    public function supp($id)
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        // condition si le bouton supprimer et poster
        if ($this->input->post("Supprimer"))
        {   $data = $this->security->xss_clean($data);/*! */
      
        $this->db->where('pro_id', $id);
        $this->db->delete('produits');/*! requete qui supprime le produits selectionnez sur le catalogue*/
        redirect(site_url('Produits/listes'));
        }
        else {
            $requete= $this->db->query("SELECT * FROM produits WHERE pro_id= ?", array($id));
            $model["listes"] = $requete->result();
            $this->load->view('supp_produits', $model);
        }
    }
    
    public function produits_categorie($cat_id)
    {
        
        
        $this->load->helper('url');
        $this->load->database();
        $requete = $this->db->query('Select * from produits join categories on categories.cat_id = produits.pro_cat_parent where cat_id= ?',array($cat_id));
        
        $model["listes"] = $requete->result();
        $this->load->view('produits_categorie', $model); 
        
        
        
        
    }
    
    public function produits_souscategorie($cat_id)
    {
        $this->load->helper('url');
        $this->load->database(); 
        $requete = $this->db->query('Select * from produits join categories on categories.cat_id = produits.pro_cat_id where cat_id= ?',array($cat_id));
       
        $model["listes"] = $requete->result();
        
        
        $this->load->view('produits_souscategorie', $model); 
    }
    
    public function commander()
    {
          $data=$this->input->post();
          $this->load->helper('form');
           
           if ($this->session->panier == null)
           {           
               $aPanier[] = $data;   
               $this->session->panier = $aPanier;                   
               redirect("produits/listes");            
        } 
        else //si le panier existe        
        {                     
            $aPanier = $this->session->panier;            
            $idProduit=$this->input->post('pro_id');            
            $sortie = false;            
                     
            foreach ($aPanier as $produit) //on cherche si le produit existe déjà dans le panier            
            { 
                    if ($produit->pro_id == $idProduit)                
                    {                    
                        $sortie = true;                    
                    }  
            }
            
            if ($sortie) //si le produit existe déjà, l'utilisateur est averti
            {   
                echo '<div class="alert alert-danger">Ce produit est déjà dans le panier.</div>';
                // $this->load->view('listes', $aView);
                redirect("produits/listes");
            }
            else
            { //sinon le produit est ajouté dans le panier
                
                array_push($aPanier, $data);
                $this->session->panier = $aPanier;
                                
                // $this->load->view('listes',$aView);
                redirect("produits/listes");
            }
        }
        
      
    }
    public function affiche()
    { $requete =  $this->db->query('Select taux_remise from clients');
      $remise = $requete->result();
        
        $this->load->view('panier');
   
    
    }
    
    
    
    public function listePrixCroissants()
    {  $this->load->model('produits_model');
    
    $aView["liste_produits"] = $this->produits_model->listeBoutiquePrixCroissants();
    if ($this->input->post()) //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
    {
        $this->ajoute($aView,$this->input->post());
    }
    else
    {
        $this->load->view('listes',$aView);
    }
    }
    
    /**
     * \brief Méthode qui liste les produits par prix décroissants et affiche la page boutique
     * \details Cette méthode affiche la page boutique lors du premier chargement de cette page, ou appelle la méthode ajoute()
     *          lorsque l'utilisateur ajoute un produit dans le panier, en classant les produits par prix décroissants
     * \param   aView    données issues du tableau produits de la base de données où les produits sont classés par prix décroissants
     */
    
    public function listePrixDecroissants()
    {
        $this->load->model('produits_model');
        $aView["listes"] = $this->produits_model->listeBoutiquePrixDecroissants();
        if ($this->input->post()) //deuxième appel de la page quand une tentative d'ajout au panier est effectuée
        {
            $this->ajoute($aView,$this->input->post());
        }
        else
        {
            $this->load->view('listes',$aView);
        }
    }
    public function efface()
    {
        $this->session->panier=array();
        $this->affiche();
    }
    public function effaceProduit($id)
    {
        $tab=$this->session->panier;
       
        
            
         
            ; //le panier prend la valeur du tableau temporaire et ne contient donc plus le produit à supprimer
            $this->affiche();
        
        
        
    }
    
    /**
     * \brief Méthode qui diminue la quantité d'un des produits du panier
     * \details Cette méthode permet de diminuer d'une unité la quantité du produit dont le numéro est \a id.
     *          Elle bloque l'opération quand la quantité arrive à 1.
     *          Une fois la quantité diminuée, la page panier est rechargée.
     * \param   id    correspond au numéro du produit dont la quantité doit être diminuée
     */
    
    public function qtemoins($id)
    {
        $tab=$this->session->panier; //tableau panier placé dans un tableau tab
        $temp=array(); //tableau temporaire vide
        for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
        {
            if ($tab[$i]['pro_id'] !== $id) //quand le produit rencontré dans le tableau tab ne correspond pas au produit dont la qté doit être diminuée
            {
                array_push($temp, $tab[$i]); //les données de ce produit sont ajoutées dans le tableau temporaire
            }
            else //sinon la quantité du produit est décrémentée sauf si on est à 1
            {
                if ($tab[$i]['pro_qte'] > 1)
                {
                    $tab[$i]['pro_qte']--;
                }
                else
                {
                    $tab[$i]['pro_qte'] = 1;
                }
                array_push($temp, $tab[$i]); //les nouvelles données sont introduites dans le tableau temporaire
            }
        }
        $tab=$temp;
        unset($temp);
        $this->session->panier=$tab; //les données du tableau temporaire remplacent les anciennes données du tableau
        $this->affiche();
    }
    
    /**
     * \brief Méthode qui accroît la quantité d'un des produits du panier
     * \details Cette méthode permet d'incrémenter d'une unité la quantité du produit dont le numéro est \a id.
     *          Une fois la quantité incrémentée, la page panier est rechargée.
     * \param   id    correspond au numéro du produit dont la quantité doit être augmentée
     */
    
    public function qteplus($id)
    {
        $tab=$this->session->panier;
        $temp=array();
        for ($i=0; $i<count($tab); $i++) //on parcourt le tableau produit après produit
        {
            if ($tab[$i]['pro_id'] !== $id)
            {
                array_push($temp, $tab[$i]);
            }
            else
            {
                $tab[$i]['pro_qte']++;
                array_push($temp, $tab[$i]);
            }
        }
        $tab=$temp;
        unset($temp);
        $this->session->panier=$tab;
        $this->affiche();
    }

}