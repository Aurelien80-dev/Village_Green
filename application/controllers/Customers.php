
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Customers extends CI_Controller
{// Fonction qui gere l'inscription et l'ajoute a la base donnee
          
      
    public function confirm_clients()
    {
        $this->load->view('confirm_clients');
    }
    
    
        public function inscription_clients()
    {   
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load ->library ('form_validation');
        $this->load->library('javascript');
        $this-> form_validation->set_rules ('nom' , 'nom', 'trim|required|min_length[5]|max_length[12]');
        $this-> form_validation->set_rules ('prenom' , 'prenom', 'trim|required|min_length[5]|max_length[12]');
        $this-> form_validation->set_rules('email' , 'email' , 'trim|required|valid_email');
        $this-> form_validation->set_rules ('password' , 'password' , 'trim|required|min_length[6]|max_length[12]');      
        
        if ($data = $this->input->post()) 
        {
            
            
            
            $data = $this->security->xss_clean($data);// variable qui rends des script innofensive
           unset($data['password2']);
           unset($data['adresseOpt']);
           
           $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
            $this->db->set('d_inscription','now()',false);
            $this->db->set('ROLE','Particulier');
            $this->db->insert("clients", $data);
           
        }
        if($this->input->post() == FALSE)
        {        
            $this->load->view('inscription_clients');
        }
        else
        {
        
            redirect('Customers/confirm_clients');
        }
         
        
      }    
      
    // Fonction qui gere le formulaire login
    // Elle va verifier le Login et le mot de passe present dans la database et rediriger l'utilisateur sur la page d'acceuil 
    public function connexion()
    {  
        $this->load->helper('form');
    
        
        if ($data = $this->input->post()) {
            
            $email = $data["email"];
            $password = $data["password"];
            $this->load->model('Customers_model');
            $email = $this->Customers_model->connexion($email);
        
            $_SESSION [ 'clients' ];
           
            if ($email) 
            {
                if (password_verify($password, $email->password)) 
                {   
                    // C'est cool !!!
                    $this->session->clients = $email;
                    $this->session->connected = true;
                    $this->session->password = true;
                    $this->session->cli_id = $email->cli_id; 
                    $this->session->message = "Bravo !!!";
                    $this->session->ROLE = $email->ROLE;
                      redirect('Customers/details_clients');  
                }                
                else 
                {
                    $this->session->Customers_model = null;
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
        
        $this->session->Customers_model = null;
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
         
            $cli_id= $this->session->connected;
           $requete =  $this->db->query('Select * from commande_valider where commande_valider.cli_id = ?', $this->session->cli_id );
              $aView['commande'] = $requete->result();   
          
           
           
           $aView["clients"] = $cli_id;
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
        $this->output->enable_profiler(True);
        
        $cli_id = $this->session->cli_id;
        if( $this->input->post())
        {
            $data = $this->input->post();
            $data = $this->security->xss_clean($data);
           unset($data['mail']);
            $this->db->where('cli_id', $cli_id);
       
            $this->db->update('clients', $data);
           // redirect('Customers/details_clients');
            
        }
        $this->load->view('modif_clients');
        
        
        
    }
    public function supp_clients()
    {        $this->output->enable_profiler(True);
    $cli_id = $this->session->cli_id;
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->database();
        // condition si le bouton supprimer et poster
        $cli_id = $this->session->connected;
        
        if ($this->input->post("Supprimer"))
        {   $data = $this->security->xss_clean($data);/*! */
        $this->input->post();
        $this->db->where('cli_id', $cli_id);
        $this->db->delete('clients', $cli_id);/*! requete qui supprime le clients en passant par la session*/
        //$this->session->sess_destroy();
        redirect(site_url('Produits/home'));
        } 
        
        
        
        else if($this->input->post('Annuler'))
        {
            redirect('customers/details_clients');
            
            
            
        }
        else {
          
            
            $this->load->view('supp_clients');
        }
    }
    
    public function liste_clients()
    {$requete =  $this->db->query('Select * from clients');
    $data['clients'] = $requete->result();
    $this->load->view('liste_clients', $data);
    
    }
    



}






?>