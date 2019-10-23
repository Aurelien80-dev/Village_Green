<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers_model extends CI_Model
{
    public function inscription($data)
    {
        $this->db->insert('clients',$data);
    }
    
    public function connexion($email)
    {
        
        $results = $this->db->get_where('clients',array('email'=>$email))->row();
        return $results;
        
    }
    
    
    public function dateConnexion($data)
    {
        $this->db->update('clients',$data);
    }
    
    public function bloquerUtilisateur($email)
    {
        $bloque = 1;
        $data = array('bloque' => $bloque);
        $this->db->where('email',$email);
        $this->db->update('clients',$data);
    }
    
    public function changerMdp($id,$mdp)
    {
        
        $data = array('password ' => $password );
        $this->db->where('email',$id);
        
        $this->db->update(password_hash($data["password "], PASSWORD_DEFAULT));
    }
    
    public function estBloque($id)
    {
        $this->db->select('bloque');
        $results = $this->db->get_where('clients',array('cli_id'=>$id))->row();
        if ($results->bloque == '0')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function liste_clients()
    {
       $requete = $this->db->query('Select * from clients');
        $data['liste_clients'] = $requete->result();
        return $data;
    }
    
    
    
}