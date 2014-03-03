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
   var $dbObj;
   var $connected;
    public function __construct()
    {
        parent::__construct();
         try{ 
            $this->dbObj = $this->load->database('stb',TRUE);         
            $this->connected = $this->dbObj->initialize();
            if($this->connected==FALSE){
                  throw new Exception("UNE ERREUR S'EST PRODUITE. VEUILLEZ RÉ-ESSAYER.");
            }
        }catch(Exception $e){
          $this->maTv = array("error"=>$e->getMessage());
        }
        
    }
    
    public function retrievChainesList($fluxData)
    {
        if(isset($this->maTv["error"])){
            return $this->maTv;
        }
        
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
        
        $idWebBouq = "1,";
        $countId   = 0;
        $nomBouq   = "";
        foreach($fluxData["bouquetTv"] as $key=>$val){
             foreach($val as $key2=>$val2){
               $idWebBouq .= $val2["id_web"].",";
               $nomBouq   .= $key2.",";  
               $countId++;
            }
        }     
        $idWebBouq = rtrim($idWebBouq, ",");
        $nomBouq   = rtrim($nomBouq, ",");
        //bouquet
        $sql1 = "select C.dept_ids,C.bouq_uid,D.designation as nom_bouquet, C.cat_uid, C.nom_categorie, C.chain_uid, C.nom_chaines, C.logo as img_logo, C.icon as img_icon,C.order FROM 
                  (
                     select E.dept_ids, E.bouq_uid, E.cat_uid, F.nom as nom_categorie,F.order, E.chain_uid, G.designation as nom_chaines, G.logo,G.icon FROM `m_m_bouq_chain` E, `mod_wa_categories` F, `mod_wa_chaines` G 
                     WHERE F.uid= E.cat_uid AND G.uid=E.chain_uid AND E.disable = 0 ORDER BY F.order
                  ) C
                 INNER JOIN `mod_wa_bouquets` D
                 ON C.bouq_uid = D.uid WHERE D.disable = 0 AND C.dept_ids like '%?%' AND D.ValidExterne in(".$idWebBouq.") ORDER BY D.uid,C.cat_uid, C.order,C.chain_uid
                ";
    
       
       $query1 = $this->dbObj->query($sql1, array($this->deptId)); 
      
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
             $countNoChain++;
            }   
            
            if($counter>0&&(($prevBouquet == $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie)||($prevBouquet != $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie)||$key==(sizeof($query1->result())-1))){
                $this->maTv["Bouquet"][$prevBouquet][$prevCategorie] = $chaineArr;  
                $chaineArr = array();
                array_push($chaineArr, array("nom_chaines"=> $val->nom_chaines, "img_icon"=>$val->img_icon));
                $countNoChain++;
             
            }
             
            if(($prevBouquet!=$val->nom_bouquet&&$prevBouquet!="")||$key==(sizeof($query1->result())-1)){
                $this->maTv["Bouquet"][$prevBouquet]["nombreChaine"] = $countNoChain;  
                $countNoChain = 0;
            }
           
             $prevBouquet   = $val->nom_bouquet;
             $prevCategorie = $val->nom_categorie;
            
             $counter++;
         }
        // $this->maTv["Bouquet"]["ULTRA"] = array_filter($this->maTv["ULTRA"],array(new retrieveUnikChaine($this->maTv["GIGA"]),'filterUnique'));
         //$this->maTv["Bouquet"]["GIGA"] = array_filter($this->maTv["GIGA"],array(new retrieveUnikChaine($this->maTv["MEGA"]),'filterUnique'));
       }
       
       
       //fitrer les chaines de bouquets
      $nomBouq = explode(",", $nomBouq);
      /*
      foreach($nomBouq as $key=>$val){
         if($key>0){
             foreach($this->maTv["Bouquet"][strtoupper($nomBouq[0])] as $key2=>$val2){
                 if(is_array($val2)){
                     
//                    foreach($val2 as $key3=>$val3){                       
                        $this->maTv["Bouquet"][strtoupper($val)][$key2] = array_filter($this->maTv["Bouquet"][strtoupper($val)][$key2],array(new retrieveUnikChaine($val2),'filterUnique'));
//                    }
                 }
             }   
         }
      }*/
      $newArr = array();
       foreach($nomBouq as $key=>$val){
         if($key>0){
             foreach($this->maTv["Bouquet"][strtoupper($nomBouq[0])] as $key2=>$val2){
                 if(is_array($val2)){
                     
//                    foreach($val2 as $key3=>$val3){                       
                        //$this->maTv["Bouquet"][strtoupper($val)][$key2] = array_filter($this->maTv["Bouquet"][strtoupper($val)],array(new retrieveUnikChaine($val2),'filterUnique'));
                    foreach($val2 as $key3=>$val3){
                     $newArr = array_diff($this->maTv["Bouquet"][strtoupper($val)][$key2][$key3], $val3);                       
                        if(!empty($newArr)){
                            $this->maTv["Bouquet"][strtoupper($val)][$key2][$key3] = $newArr;
                        }else{
                            unset($this->maTv["Bouquet"][strtoupper($val)][$key2][$key3]);
                        }
                   }
                 }
             }   
         }
      }
      foreach($nomBouq as $key=>$val){
         if($key>1){
             foreach($this->maTv["Bouquet"][strtoupper($nomBouq[1])] as $key2=>$val2){
                 if(is_array($val2)){
                     
//                    foreach($val2 as $key3=>$val3){                       
                        //$this->maTv["Bouquet"][strtoupper($val)][$key2] = array_filter($this->maTv["Bouquet"][strtoupper($val)],array(new retrieveUnikChaine($val2),'filterUnique'));
                    foreach($val2 as $key3=>$val3){
                     $newArr = array_diff($this->maTv["Bouquet"][strtoupper($val)][$key2][$key3], $val3);                       
                        if(!empty($newArr)){
                            $this->maTv["Bouquet"][strtoupper($val)][$key2][$key3] = $newArr;
                        }else{
                            unset($this->maTv["Bouquet"][strtoupper($val)][$key2][$key3]);
                        }
                   }
                 }
             }   
         }
      } 
       $idWebOption = "";
        $countId =0;
        foreach($fluxData["optionTv"] as $key=>$val){
            foreach($val as $key2=>$val2){
             //  $idWebOption .=($countId==(sizeof($val)-1))?$val2["id_web"].",":$val2["id_web"];
                $idWebOption .= $val2["id_web"].",";
               $countId++;
            }
        }
       $idWebOption =  rtrim($idWebOption, ",");
        //options
        $sql2 = "select C.dept_ids,C.bouq_uid,D.designation as nom_bouquet, C.cat_uid, C.nom_categorie, C.chain_uid, C.nom_chaines, C.logo as img_logo, C.icon as img_icon,C.order FROM 
                  (
                     select E.dept_ids, E.bouq_uid, E.cat_uid, F.nom as nom_categorie,F.order, E.chain_uid, G.designation as nom_chaines, G.logo,G.icon FROM `m_m_bouq_chain` E, `mod_wa_categories` F, `mod_wa_chaines` G 
                     WHERE F.uid= E.cat_uid AND G.uid=E.chain_uid AND E.disable = 0 ORDER BY F.order
                  ) C
                 INNER JOIN `mod_wa_bouquets` D
                 ON C.bouq_uid = D.uid WHERE D.disable = 0 AND C.dept_ids like '%?%' AND D.ValidExterne in(".$idWebOption.") AND D.etat=2 ORDER BY D.uid,C.cat_uid, C.order,C.chain_uid
                ";
        
         
        $query2 = $this->dbObj->query($sql2, array($this->deptId)); 
       
        if($query2->num_rows() > 0)
        {
            $prevBouquet = "";
            $prevCategorie = "";
            $counter =0;
            $chaineArr = array();
          //  $countNoChain = 0;
            foreach($query2->result() as $key=>$val)
            {
                if(($counter==0)||($prevBouquet == $val->nom_bouquet&&$prevCategorie ==  $val->nom_categorie)){
                    array_push($chaineArr, array("nom_chaines"=> $val->nom_chaines, "img_icon"=>$val->img_icon));
                    // $countNoChain++;
                }   
                
                if($counter>0&&(($prevBouquet == $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie)||($prevBouquet != $val->nom_bouquet&&$prevCategorie !=  $val->nom_categorie)||$key==(sizeof($query2->result())-1))){
                    $this->maTv["Options"][strtoupper($prevBouquet)][$prevCategorie] = $chaineArr;  
                    $chaineArr = array();
                    array_push($chaineArr, array("nom_chaines"=> $val->nom_chaines, "img_icon"=>$val->img_icon)); 
                    // $countNoChain++; 
                }
                /*
                if($prevBouquet!=$val->nom_bouquet&&$prevBouquet!=""||$key==(sizeof($query2->result())-1)){
                    $this->maTv["Options"][$prevBouquet]["nombreChaine"] = $countNoChain;  
                    $countNoChain = 0;
                }*/

                $prevBouquet   = $val->nom_bouquet;
                $prevCategorie = $val->nom_categorie;

                $counter++;
            }
        }
       return $this->maTv;
    }
    
   public function reformatBouquet($bouquetArr){
       foreach($bouquetArr as $key=>$val){
           if($key!="BASIQUE"){
               foreach($val as $key2=>$val2){
                   
               }
           }
       }
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
//        if(!in_array($this->bouquet,$i)){
//            return $i;
//          }
     return array_diff($i,$this->bouquet);
    }
 }