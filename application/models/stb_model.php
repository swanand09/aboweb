<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */ 
class Stb_model extends CI_Model
{
   var $CI;
   var $localite;
   var $deptId;
   var $maTv = array();
    public function __construct()
    {
        parent::__construct();
        $this->load->database('stb');
    }
    
   
    
    public function retrievChainesList()
    {
        $this->localite = $this->session->userdata("localite");   
        switch($this->localite)
        {
            case "GP":
                $this->deptId = 1;
            break;
            case "RE":
                $this->deptId = 3;
            break;
            case "MQ":
                $this->deptId = 2;
            break;
            case "GF":
                $this->deptId = 4;
            break;
        }
        $sql = "	
                select C.dept_ids,C.bouq_uid,D.designation as nom_bouquet, C.cat_uid, C.nom_categorie, C.chain_uid, C.nom_chaines, C.logo as img_logo, C.icon as img_icon,C.order FROM 
                  (
                     select E.dept_ids, E.bouq_uid, E.cat_uid, F.nom as nom_categorie,F.order, E.chain_uid, G.designation as nom_chaines, G.logo,G.icon FROM `m_m_bouq_chain` E, `mod_wa_categories` F, `mod_wa_chaines` G WHERE F.uid= E.cat_uid AND G.uid=E.chain_uid AND E.disable = 0 order by F.order
                  ) C
                 INNER JOIN `mod_wa_bouquets` D
                 ON C.bouq_uid = D.uid WHERE D.disable = 0 AND C.dept_ids like '%?%' ORDER BY D.designation,C.order
                ";
        
        $query = $this->db->query($sql, array($this->deptId)); 
        
       if($query->num_rows() > 0)
       {
         $prevBouquet = "";
         $prevCategorie = "";
         $counter =0;
         foreach($query->result() as $key=>$val)
         {
             if(($prevBouquet==""&&$prevCategorie=="")||($prevBouquet==$val->nom_bouquet&&$prevCategorie!=$val->nom_categorie))
              $this->maTv[$val->nom_bouquet][$val->nom_categorie] = array_filter($query->result(),array(new retrieveBouquet($val->nom_bouquet,$val->nom_categorie),'isBouquet'));
              
              $prevBouquet   = $val->nom_bouquet;
              $prevCategorie = $val->nom_categorie;
                                   
              $counter++;
         }
        
       }
       return $this->maTv;
    }
    
    
}

class retrieveBouquet 
{
    private $bouquet;
    private $categorie;
    function __construct($bouquet,$categorie)
    {
         $this->bouquet = $bouquet;
         $this->categorie = $categorie;
    }

    function isBouquet($i) 
    {
        if($i->nom_bouquet==$this->bouquet&&$i->nom_categorie==$this->categorie)
        return $i;
    }
 }