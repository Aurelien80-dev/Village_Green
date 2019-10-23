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

class Personnel extends CI_Controller
{
    public function inscription_personnel()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load ->library ('form_validation');
        $this->load->library('javascript');
        $this-> form_validation->set_rules ('nom' , 'nom', 'trim|required|min_length[5]|max_length[12]');
        $this-> form_validation->set_rules ('prenom' , 'prenom', 'trim|required|min_length[5]|max_length[12]');
        
        $this-> form_validation->set_rules ('password' , 'password' , 'trim|required|min_length[6]|max_length[12]');
        
        if ($data = $this->input->post())
        {
            $data = $this->security->xss_clean($data);// variable qui rends des script innofensive
            unset($data['password2']);
            unset($data['adresseOpt']);
            
            $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $this->db->set('d_inscription','now()',false);
           
            $this->db->insert("personnel", $data);
            
        }
        if($this->input->post() == FALSE)
        {
            $this->load->view('inscription_personnel');
        }
        else
        {
            
            redirect('Customers/confirm_clients');
        }
        
        
    }
    
    // Fonction qui gere le formulaire login
    // Elle va verifier le Login et le mot de passe present dans la database et rediriger l'utilisateur sur la page d'acceuil
    public function connexion()
    {     $this->output->enable_profiler(True);
        $this->load->helper('form');
        $this->load->view('login_personnel');
        
        if ($data = $this->input->post()) {
            
            $email = $data["email"];
            $password = $data["password"];
            $this->load->model('Personnel_model');
            $email = $this->Personnel_model->connexion($email);
            
            
            if ($email)
            {
                if (password_verify($password, $email->password))
                {
                    // C'est cool !!!
                    $this->session->personnel = $email;
                    $this->session->connected = true;
                    $this->session->password = true;
                    $this->session->pe_id = $email->pe_id;
                    $this->session->message = "Bravo !!!";
                    $this->session->service = $email->service;
                    redirect('personnel/menu');
                }
                else
                {
                    $this->session->Personnel_model = null;
                    $this->session->message = "Le mot de passe ne correspond pas !!!";
                    $data = array ();
                    redirect('produits/home');
                }
            }
            else
            {
                $this->session->Customers_model = null;
                $this->session->message = "Problème avec l'adresse mail !!!";
                $data = array ();
                redirect('produits/home');
            }
            
        }
    }
    // Fonction qui va gerer la deconnexion
    public function logout()
    {
        
        $this->session->Pesonnel_model = null;
        $this->session->message = null;
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        redirect("produits/home");
    }
    
    public function details_clients()
    {  //$this->output->enable_profiler(False);
        // error_log(__FILE__.":L".__LINE__);
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        
        
        if ($this->session->clients) {
            
            $pe_id= $this->session->connected;
            $aView["personnel"] = $pe_id;
            $this->load->view('details_clients',$aView);
            
        }
        else{
            redirect(site_url("produits/home"));
        }
    }
    
    public function modif_clients()
    {
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
       
        
        $pe_id = $this->session->pe_id;
        if( $this->input->post())
        {
            $data = $this->input->post();
            $data = $this->security->xss_clean($data);
            unset($data['mail']);
            $this->db->where('pe_id', $pe_id);
            
            $this->db->update('clients', $data);
            // redirect('Customers/details_clients');
            
        }
        $this->load->view('modif_clients');
        
        
        
    }
    public function menu()
    {
        $this->load->view('menu_personnel');
        
        
        
        
    }
    
}

   









