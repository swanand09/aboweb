<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Wsdl_interrogeligib_model extends CI_Model
{
   var $CI;
   var $nusoap_client;
    public function __construct()
    {
        parent::__construct();
        try
        {
            $this->nusoap_client = new nusoap_client("http://192.168.64.46/WebserviceAboweb/Service.asmx?wsdl",true); 
        }catch(Exception $e){
             throw new Exception( $this->nusoap_client->getError(), 0, $e);
        }
        
    }
    
    public function retrieveInfo($num_tel)
    {
        $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <interrogeEligibilite xmlns="msvaboweb">
                                      <_numero>'.$num_tel.'</_numero>
                                    </interrogeEligibilite>','',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/interrogeEligibilite";
        $result = $this->nusoap_client->send($soapEligib,'msvaboweb/interrogeEligibilite');
         return  $result;
        /*
        $result = 
                    Array
(
    "interrogeEligibiliteResult" => Array
        (
            "Id" => "1585",
            "Localite" => "GP",
            "Ligne" => Array
                (
                    "Numero" => "0590823178",
                    "Debit_emmission" => "1.2799999713897705",
                    "Debit_de_reception" => "22",
                    "Eligible_ADSL" => "true",
                    "Eligible_televison" => "true",
                    "Eligible_degroupage_partiel" => "false",
                    "Eligible_dégroupage_total" => "true",
                ),

            "Villes" => Array
                (
                    "WS_Ville" => Array
                        (
                            "Code_postal" => "97110",
                            "Code_ville" => "POINTE A PITRE"
                        )

                ),

            "Catalogue" => Array
                (
                    "Produits" => Array
                        (
                            "WS_Produit" => Array
                                (
                                    0 => Array
                                        (
                                            "Ordre" => "3",
                                            "Libelle" => "Bouquet Ultra",
                                            "Tarif" => "25",
                                            "Tarif_promo" => "25",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3600",
                                                            "Dummy" => "13",
                                                            "Categorie" => "BOUQUET_TV",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Télévision mediaserv;Bouquet Ultra"
                                                                ),

                                                            "Tarif" => "25"
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "BOUQUET_TV",
                                            "Id_web" => "3600",
                                            "Id_crm" => "3600"
                                        ),

                                    1 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "Conservation du numéro FT",
                                            "Tarif" => "0",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => "",
                                            "Defaut" => "true",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "PORTABILITE",
                                            "Id_web" => "3581",
                                            "Id_crm" => "3581"
                                        ),

                                    2 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "é la communication@jusqu'é 2 méga",
                                            "Tarif" => "34.99",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "1",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            0 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3583",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "PROMOTION",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Promotion spéciale souscription web 1 mois offert"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            1 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3583",
                                                                    "Dummy" => "12",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => Array
                                                                                (
                                                                                    0 => "Forfait Internet;jusqu'é 2 méga",
                                                                                    1 => "Forfait Téléphonie;é la communication"
                                                                                )

                                                                        ),

                                                                    "Tarif" => "34.99"
                                                                )

                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FORFAIT",
                                            "Id_web" => "3583",
                                            "Id_crm" => "3583",
                                        ),

                                    3 => Array
                                        (
                                            "Ordre" => "2",
                                            "Libelle" => "illimitée vers 53 destinations Soir&WE@jusqu'é 2 méga",
                                            "Tarif" => "39.99",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "1",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            0 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3584",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "PROMOTION",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Promotion spéciale souscription web 1 mois offert"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            1 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3584",
                                                                    "Dummy" => "12",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => Array
                                                                                (
                                                                                    0 => "Forfait Internet;jusqu'é 2 méga",
                                                                                    1 => "Forfait Téléphonie;illimitée vers 53 destinations Soir&WE",
                                                                                )

                                                                        ),

                                                                    "Tarif" => "39.99"
                                                                )

                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FORFAIT",
                                            "Id_web" => "3584",
                                            "Id_crm" => "3584"
                                        ),

                                    4 => Array
                                        (
                                            "Ordre" => "6",
                                            "Libelle" => "illimitée 53 dest. 24h/24 + mobile local/métropole 24h/24@débit max",
                                            "Tarif" => "54.99",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "1",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            0 => Array
                                                                (
                                                                    Id_web => "0",
                                                                    "Id_crm" => "3588",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "PROMOTION",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Promotion spéciale souscription web 1 mois offert"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            1 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3588",
                                                                    "Dummy" => "12",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => Array
                                                                                (
                                                                                    "0" => "Forfait Internet;débit max",
                                                                                    "1" => "Forfait Téléphonie;illimitée 53 dest. 24h/24 + mobile local/métropole 24h/24"
                                                                                )

                                                                        ),

                                                                    "Tarif" => "54.99"
                                                                )

                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FORFAIT",
                                            "Id_web" => "3588",
                                            "Id_crm" => "3588"
                                        ),

                                    5 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "Location modem ADSL",
                                            "Tarif" => "3.50",
                                            "Tarif_promo" => "3.50",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3591",
                                                            "Dummy" => "0",
                                                            "Categorie" => "IAD",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Location modem ADSL;box mediaserv"
                                                                ),

                                                            "Tarif" => "3.50"
                                                        )

                                                )

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "IAD",
                                            "Id_web" => "3591",
                                            "Id_crm" => "3591"
                                        ),

                                    6 => Array
                                        (
                                            "Ordre" => "2",
                                            "Libelle" => "Bouquet Giga",
                                            "Tarif" => "20",
                                            "Tarif_promo" => "20",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3598",
                                                            "Dummy" => "13",
                                                            "Categorie" => "BOUQUET_TV",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Télévision mediaserv;Bouquet Giga"
                                                                ),

                                                            "Tarif" => "20"
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "BOUQUET_TV",
                                            "Id_web" => "3598",
                                            "Id_crm" => "3598"
                                        ),

                                    7 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "Bouquet Méga",
                                            "Tarif" => "10",
                                            "Tarif_promo" => "10",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3599",
                                                            "Dummy" => "13",
                                                            "Categorie" => "BOUQUET_TV",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Télévision mediaserv;Bouquet Mega"
                                                                )

                                                            "Tarif" => "10"
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "BOUQUET_TV",
                                            "Id_web" => "3599",
                                            "Id_crm" => "3599"
                                        ),

                                    8 => Array
                                        (
                                            "Ordre" => "3",
                                            "Libelle" => "Option BeIN Sport",
                                            "Tarif" => "9",
                                            "Tarif_promo" => "9",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3603",
                                                            "Dummy" => "1",
                                                            "Categorie" => "OPTION_TV",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Option;BeIN Sport",
                                                                )

                                                            "Tarif" => "9",
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "OPTION_TV",
                                            "Id_web" => "3603",
                                            "Id_crm" => "3603"
                                        ),

                                    9 => Array
                                        (
                                            "Ordre" => "2",
                                            "Libelle" => "Option Eden",
                                            "Tarif" => "9",
                                            "Tarif_promo" => "9"
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3606",
                                                            "Dummy" => "1",
                                                            "Categorie" => "OPTION_TV",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Option;Eden"
                                                                ),

                                                            "Tarif" => "9"
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "OPTION_TV",
                                            "Id_web" => "3606",
                                            "Id_crm" => "3606"
                                        ),
                                    10 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "Facture papier simple",
                                            "Tarif" => "1.50",
                                            "Tarif_promo" => "1.50",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3611",
                                                            "Dummy" => "0",
                                                            "Categorie" => "FACTURATION",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Envoi des Factures;Facture papier simple",
                                                                ),

                                                            "Tarif" => "1.50"
                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FACTURATION",
                                            "Id_web" => "3611",
                                            "Id_crm" => "3611"
                                        ),

                                    11 => Array
                                        (
                                            "Ordre" => "2",
                                            "Libelle" => "Facture électronique",
                                            "Tarif" => "0",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            "Id_web" => "0",
                                                            "Id_crm" => "3613",
                                                            "Dummy" => "0",
                                                            "Categorie" => "FACTURATION",
                                                            "Type" => "RECURRENT",
                                                            "Libelle" => Array
                                                                (
                                                                    "string" => "Envoi des Factures;Facture électronique"
                                                                ),

                                                            "Tarif" => "0"
                                                        )

                                                ),

                                            "Defaut" => "true",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FACTURATION",
                                            "Id_web" => "3613",
                                            "Id_crm" => "3613"
                                        ),

                                    12 => Array
                                        (
                                            "Ordre" => "1",
                                            "Libelle" => "Bouquet de base",
                                            "Tarif" => "0",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "0",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            0 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3650",
                                                                    "Dummy" => "13",
                                                                    "Categorie" => "TELEVISION",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Télévision mediaserv;Bouquet de base"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            1 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3615",
                                                                    "Categorie" => "VOD_PVR",
                                                                    "Type" => "ONESHOT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Option enregistreur numérique"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            2 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3616",
                                                                    "Dummy" => "0",
                                                                    "Categorie" => "VOD_PVR",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Vidéo é la demande"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            3 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3654",
                                                                    "Categorie" => "STB",
                                                                    "Type" => "CAUTION",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Caution Décodeur;TV mediaserv"
                                                                        ),

                                                                    "Tarif" => "50"
                                                                ),

                                                            4 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3654",
                                                                    "Dummy" => "0",
                                                                    "Categorie" => "STB",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Location Décodeur;TV mediaserv"
                                                                        ),

                                                                    "Tarif" => "5"
                                                                )

                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "false",
                                            "Categorie" => "TELEVISION",
                                            "Id_web" => "3650",
                                            "Id_crm" => "3650"
                                        ),

                                    13 => Array
                                        (
                                            "Ordre" => "4",
                                            "Libelle" => "illimitée vers 53 destinations 24h/24@débit max",
                                            "Tarif" => "44.99",
                                            "Tarif_promo" => "0",
                                            "Duree_mois_promo" => "1",
                                            "Valeurs" => Array
                                                (
                                                    "WS_Produit_Valeur" => Array
                                                        (
                                                            0 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3656",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "PROMOTION",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => "Promotion spéciale souscription web 1 mois offert"
                                                                        ),

                                                                    "Tarif" => "0"
                                                                ),

                                                            1 => Array
                                                                (
                                                                    "Id_web" => "0",
                                                                    "Id_crm" => "3656",
                                                                    "Dummy" => "12",
                                                                    "Categorie" => "FORFAIT",
                                                                    "Type" => "RECURRENT",
                                                                    "Libelle" => Array
                                                                        (
                                                                            "string" => Array
                                                                                (
                                                                                    "0" => "Forfait Internet;débit max",
                                                                                    "1" => "Forfait Téléphonie;illimitée vers 53 destinations 24h/24"
                                                                                )

                                                                        ),

                                                                    "Tarif" => "44.99"
                                                                )

                                                        )

                                                ),

                                            "Defaut" => "false",
                                            "Modifiable" => "true",
                                            "Obligatoire" => "true",
                                            "Categorie" => "FORFAIT",
                                            "Id_web" => "3656",
                                            "Id_crm" => "3656
                                        )

                                )

                        ),

                    "Promo_libelle" => "Promotion spéciale souscription web 1 mois offert",
                    "Dependances" => Array
                        (
                            "WS_Produit_Dependance" => Array
                                (
                                    0 => Array
                                        (
                                            "Libelle_selected" => "Bouquet Ultra",
                                            "Libelle_affecte" => "Option BeIN Sport",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3600",
                                            "Id_crm_affecte" => "3603"
                                        ),

                                    1 => Array
                                        (
                                            "Libelle_selected" => "Bouquet Ultra",
                                            "Libelle_affecte" => "Option Eden",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3600",
                                            "Id_crm_affecte" => "3606"
                                        ),

                                    2 => Array
                                        (
                                            "Libelle_selected" => "é la communication@jusqué 2 méga",
                                            "Libelle_affecte" => "illimitée 53 dest. 24h/24 + mobile local/métropole 24h/24@débit max",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3583",
                                            "Id_crm_affecte" => "3588"
                                        ),

                                    3 => Array
                                        (
                                            "Libelle_selected" => "é la communication@jusqué 2 méga",
                                            "Libelle_affecte" => "illimitée vers 53 destinations 24h/24@débit max",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3583",
                                            "Id_crm_affecte" => "3656"
                                        ),

                                    4 => Array
                                        (
                                            "Libelle_selected" => "illimitée vers 53 destinations Soir&WE@jusqué 2 méga",
                                            "Libelle_affecte" => "illimitée 53 dest. 24h/24 + mobile local/métropole 24h/24@débit max"
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3584",
                                            "Id_crm_affecte" => "3588"
                                        ),

                                    5 => Array
                                        (
                                            "Libelle_selected" => "illimitée vers 53 destinations Soir&WE@jusqué 2 méga",
                                            "Libelle_affecte" => "illimitée vers 53 destinations 24h/24@débit max",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3584",
                                            "Id_crm_affecte" => "3656"
                                        ),

                                    6 => Array
                                        (
                                            "Libelle_selected" => "Bouquet Ultra",
                                            "Libelle_affecte" => "Bouquet de base",
                                            "Type" => "REQ",
                                            "Id_crm_selected" => "3600",
                                            "Id_crm_affecte" => "3650"
                                        ),

                                    7 => Array
                                        (
                                            "Libelle_selected" => "Bouquet Giga",
                                            "Libelle_affecte" => "Bouquet de base",
                                            "Type" => "REQ",
                                            "Id_crm_selected" => "3598",
                                            "Id_crm_affecte" => "3650"
                                        ),

                                    8 => Array
                                        (
                                            "Libelle_selected" => "Bouquet Méga",
                                            "Libelle_affecte" => "Bouquet de base",
                                            "Type" => "REQ",
                                            "Id_crm_selected" => "3599",
                                            "Id_crm_affecte" => "3650"
                                        ),

                                    9 => Array
                                        (
                                            "Libelle_selected" => "Option BeIN Sport",
                                            "Libelle_affecte" => "Bouquet de base",
                                            "Type" => "REQ",
                                            "Id_crm_selected" => "3603",
                                            "Id_crm_affecte" => "3650"
                                        ),

                                    10 => Array
                                        (
                                            "Libelle_selected" => "Option Eden",
                                            "Libelle_affecte" => "Bouquet de base",
                                            "Type" => "REQ",
                                            "Id_crm_selected" => "3606",
                                            "Id_crm_affecte" => "3650"
                                        ),

                                    11 => Array
                                        (
                                            "Libelle_selected" => "illimitée vers 53 destinations 24h/24@débit max",
                                            "Libelle_affecte" => "é la communication@jusqué 2 méga",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3656",
                                            "Id_crm_affecte" => "3583"
                                        ),

                                    12 => Array
                                        (
                                            "Libelle_selected" => "illimitée vers 53 destinations 24h/24@débit max",
                                            "Libelle_affecte" => "illimitée vers 53 destinations Soir&WE@jusqué 2 méga",
                                            "Type" => "INC",
                                            "Id_crm_selected" => "3656",
                                            "Id_crm_affecte" => "3584"
                                        )

                                )

                        ),

                    "Autorise_parrainage" => "false",
                    "Promo_id_web" => "0"
                )

        )

        );*/
        
       
    }
    
   public function saveInfo(){
        
       $soapEligib = $this->nusoap_client->serializeEnvelope('
                                    <enregistreSouscription xmlns="msvaboweb">
                                      <_produits_souscris>
                                        <_adresse_installation></_adresse_installation>
                                        <_adresse_livraison></_adresse_livraison >
                                        <_adresse_facturation></_adresse_facturation>
                                      </_produits_souscris>
                                      <_email></_email>
                                      <_renonce_delai_retractation></_renonce_delai_retractation> 
                                      <_information_contact></_information_contact> 
                                      <_cartebleue></_cartebleue>
                                      <_rib></_rib>
                                    </enregistreSouscription>','',array(),'document', 'literal'); 
        $this->nusoap_client->operation = "msvaboweb/enregistreSouscription";
        $result = $this->nusoap_client->send($soapEligib,'msvaboweb/enregistreSouscription');
        return  $result;
   }
}