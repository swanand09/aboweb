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
        $sql1 = "	
                select C.dept_ids,C.bouq_uid,D.designation as nom_bouquet, C.cat_uid, C.nom_categorie, C.chain_uid, C.nom_chaines, C.logo as img_logo, C.icon as img_icon,C.order FROM 
                  (
                     select E.dept_ids, E.bouq_uid, E.cat_uid, F.nom as nom_categorie,F.order, E.chain_uid, G.designation as nom_chaines, G.logo,G.icon FROM `m_m_bouq_chain` E, `mod_wa_categories` F, `mod_wa_chaines` G 
                     WHERE F.uid= E.cat_uid AND G.uid=E.chain_uid AND E.disable = 0 ORDER BY F.order
                  ) C
                 INNER JOIN `mod_wa_bouquets` D
                 ON C.bouq_uid = D.uid WHERE D.disable = 0 AND C.dept_ids like '%?%' AND D.ValidExterne in(1,4,5,6,7,8) ORDER BY D.uid,C.cat_uid, C.order,C.chain_uid
                ";
       
       $query1 = $this->db->query($sql1, array($this->deptId)); 
       
       if($query1->num_rows() > 0)
       {
         $prevBouquet = "";
         $prevCategorie = "";
         $counter =0;
         $chaineArr = array();
         $countNoChain = 0;
        // $bouquet
         
         foreach($query1->result() as $key=>$val)
         {
            if(($counter==0)||($prevBouquet == $val->nom_bouquet&&$prevCategorie ==  $val->nom_categorie)){
              array_push($chaineArr, array("nom_chaines"=> $val->nom_chaines, "img_icon"=>$val->img_icon));
             
            }   
            
            if($counter>0&&(($prevBouquet == $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie)||($prevBouquet != $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie))){
                $this->maTv[$prevBouquet][$prevCategorie] = $chaineArr;  
                $chaineArr = array();
                array_push($chaineArr, array("nom_chaines"=> $val->nom_chaines, "img_icon"=>$val->img_icon)); 
            }
            $countNoChain++;
            if($prevBouquet!=$val->nom_bouquet){
                $this->maTv[$prevBouquet]["nombreChaine"] = $countNoChain;  
                $countNoChain = 0;
            }
           
             $prevBouquet   = $val->nom_bouquet;
             $prevCategorie = $val->nom_categorie;
             
             $counter++;
         }
         $this->maTv["ULTRA"] = array_filter($this->maTv["ULTRA"],array(new retrieveUnikChaine($this->maTv["GIGA"]),'filterUnique'));
         $this->maTv["GIGA"] = array_filter($this->maTv["GIGA"],array(new retrieveUnikChaine($this->maTv["MEGA"]),'filterUnique'));
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
 
 class retrieveUnikChaine
 {
   
    private $bouquet = array();
    function __construct($bouquet)
    {
         $this->bouquet = $bouquet;      
    }

    function filterUnique($i) 
    {
        if(!in_array($i,$this->bouquet)){
            return $i;
          }
     
    }
 }