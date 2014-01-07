$(function(){
	var codepostalvalue;
	var codePostalSet = new Array();
	var villeSet = { "data":[{'codepostal':'97100','ville':'BASSE TERRE'},{'codepostal':'97110','ville':'POINTE A PITRE'},{'codepostal':'97111','ville':'MORNE A L\'EAU'},{'codepostal':'97112','ville':'GRAND BOURG'},{'codepostal':'97113','ville':'GOURBEYRE'},{'codepostal':'97114','ville':'TROIS RIVIERES'},{'codepostal':'97115','ville':'SAINTE ROSE'},{'codepostal':'97116','ville':'POINTE NOIRE'},{'codepostal':'97117','ville':'PORT LOUIS'},{'codepostal':'97118','ville':'SAINT FRANCOIS'},{'codepostal':'97119','ville':'VIEUX HABITANTS'},{'codepostal':'97120','ville':'SAINT CLAUDE'},{'codepostal':'97121','ville':'ANSE BERTRAND'},{'codepostal':'97122','ville':'BAIE-MAHAULT'},{'codepostal':'97123','ville':'BAILLIF'},{'codepostal':'97125','ville':'BOUILLANTE'},{'codepostal':'97126','ville':'DESHAIES'},{'codepostal':'97127','ville':'LA DESIRADE'},{'codepostal':'97128','ville':'GOYAVE'},{'codepostal':'97129','ville':'LAMENTIN'},{'codepostal':'97130','ville':'BANANIER'},{'codepostal':'97130','ville':'CAPESTERRE BELLE EAU'},{'codepostal':'97130','ville':'SAINTE MARIE'},{'codepostal':'97131','ville':'LES MANGLES'},{'codepostal':'97131','ville':'PETIT CANAL'},{'codepostal':'97132','ville':'BOUILLANTE'},{'codepostal':'97132','ville':'PIGEON'},{'codepostal':'97133','ville':'SAINT BARTHELEMY'},{'codepostal':'97134','ville':'SAINT LOUIS'},{'codepostal':'97136','ville':'TERRE DE BAS'},{'codepostal':'97137','ville':'TERRE DE HAUT'},{'codepostal':'97139','ville':'LES ABYMES'},{'codepostal':'97140','ville':'CAPESTERRE DE MARIE GALANTE'},{'codepostal':'97141','ville':'VIEUX FORT'},{'codepostal':'97142','ville':'LES ABYMES'},{'codepostal':'97150','ville':'SAINT MARTIN'},{'codepostal':'97160','ville':'LE MOULE'},{'codepostal':'97170','ville':'PETIT BOURG'},{'codepostal':'97180','ville':'DOUVILLE'},{'codepostal':'97180','ville':'SAINTE ANNE'},{'codepostal':'97190','ville':'LE GOSIER'},{'codepostal':'97200','ville':'FORT DE FRANCE'},{'codepostal':'97211','ville':'RIVIERE PILOTE'},{'codepostal':'97212','ville':'SAINT JOSEPH'},{'codepostal':'97213','ville':'GROS MORNE'},{'codepostal':'97214','ville':'LE LORRAIN'},{'codepostal':'97215','ville':'PETIT BOURG'},{'codepostal':'97215','ville':'RIVIERE SALEE'},{'codepostal':'97216','ville':'L\'AJOUPA BOUILLON'},{'codepostal':'97217','ville':'LES ANSES D\'ARLETS'},{'codepostal':'97218','ville':'BASSE POINTE'},{'codepostal':'97218','ville':'GRAND RIVIERE'},{'codepostal':'97218','ville':'MACOUBA'},{'codepostal':'97220','ville':'LA TRINITE'},{'codepostal':'97221','ville':'LE CARBET'},{'codepostal':'97222','ville':'BELLEFONTAINE'},{'codepostal':'97222','ville':'CASE PILOTE'},{'codepostal':'97223','ville':'LE DIAMANT'},{'codepostal':'97224','ville':'DUCOS'},{'codepostal':'97225','ville':'LE MARIGOT'},{'codepostal':'97226','ville':'LE MORNE VERT'},{'codepostal':'97227','ville':'SAINTE ANNE'},{'codepostal':'97228','ville':'SAINTE LUCE'},{'codepostal':'97229','ville':'LES TROIS ILETS'},{'codepostal':'97230','ville':'MORNE DES ESSES'},{'codepostal':'97230','ville':'SAINTE MARIE'},{'codepostal':'97231','ville':'LE ROBERT'},{'codepostal':'97231','ville':'VERT PRE'},{'codepostal':'97232','ville':'LE LAMENTIN'},{'codepostal':'97233','ville':'SCHOELCHER'},{'codepostal':'97234','ville':'FORT DE FRANCE'},{'codepostal':'97240','ville':'LE FRANCOIS'},{'codepostal':'97250','ville':'FONDS ST DENIS'},{'codepostal':'97250','ville':'LE PRECHEUR'},{'codepostal':'97250','ville':'SAINT PIERRE'},{'codepostal':'97260','ville':'LE MORNE ROUGE'},{'codepostal':'97270','ville':'SAINT ESPRIT'},{'codepostal':'97280','ville':'LE VAUCLIN'},{'codepostal':'97290','ville':'LE MARIN'},{'codepostal':'97300','ville':'CAYENNE'},{'codepostal':'97310','ville':'KOUROU'},{'codepostal':'97311','ville':'ROURA'},{'codepostal':'97312','ville':'ST ELIE'},{'codepostal':'97313','ville':'ST GEORGES'},{'codepostal':'97314','ville':'SAUL'},{'codepostal':'97315','ville':'SINNAMARY'},{'codepostal':'97316','ville':'PAPAICHTON'},{'codepostal':'97317','ville':'APATOU'},{'codepostal':'97318','ville':'JAVOUHEY'},{'codepostal':'97319','ville':'AWALA YALIMAPO'},{'codepostal':'97320','ville':'ST LAURENT DU MARONI'},{'codepostal':'97330','ville':'CAMOPI'},{'codepostal':'97340','ville':'GRAND SANTI'},{'codepostal':'97340','ville':'POMPIDOU PAPA ICHTON'},{'codepostal':'97350','ville':'IRACOUBO'},{'codepostal':'97351','ville':'MATOURY'},{'codepostal':'97352','ville':'CACAO'},{'codepostal':'97353','ville':'KAW'},{'codepostal':'97354','ville':'REMIRE MONTJOLY'},{'codepostal':'97355','ville':'MACOURIA'},{'codepostal':'97355','ville':'MACOURIA TONATE'},{'codepostal':'97356','ville':'MONTSINERY TONNEGRANDE'},{'codepostal':'97360','ville':'MANA'},{'codepostal':'97370','ville':'MARIPASOULA'},{'codepostal':'97380','ville':'OUANARY'},{'codepostal':'97390','ville':'REGINA'},{'codepostal':'97400','ville':'BELLE PIERRE'},{'codepostal':'97400','ville':'LE BRULE'},{'codepostal':'97400','ville':'ST DENIS'},{'codepostal':'97400','ville':'ST FRANCOIS'},{'codepostal':'97410','ville':'BASSE TERRE'},{'codepostal':'97410','ville':'GRAND BOIS'},{'codepostal':'97410','ville':'MONT VERT'},{'codepostal':'97410','ville':'ST PIERRE'},{'codepostal':'97410','ville':'TERRE SAINTE'},{'codepostal':'97411','ville':'BOIS DE NEFLES ST PAUL'},{'codepostal':'97412','ville':'BRAS PANON'},{'codepostal':'97412','ville':'RIVIERE DU MAT'},{'codepostal':'97413','ville':'CILAOS'},{'codepostal':'97413','ville':'PALMISTE ROUGE'},{'codepostal':'97414','ville':'ENTRE DEUX'},{'codepostal':'97416','ville':'LA CHALOUPE'},{'codepostal':'97417','ville':'LA MONTAGNE'},{'codepostal':'97417','ville':'ST BERNARD'},{'codepostal':'97417','ville':'ST DENIS'},{'codepostal':'97418','ville':'LA PLAINE DES CAFRES'},{'codepostal':'97419','ville':'LA POSSESSION'},{'codepostal':'97419','ville':'LA RIVIERE DES GALETS'},{'codepostal':'97419','ville':'LE DOS D ANE'},{'codepostal':'97419','ville':'SAINT DENIS'},{'codepostal':'97419','ville':'STE THERESE'},{'codepostal':'97420','ville':'LE PORT'},{'codepostal':'97421','ville':'LA RIVIERE'},{'codepostal':'97421','ville':'LES MAKES'},{'codepostal':'97422','ville':'LA SALINE'},{'codepostal':'97423','ville':'LE GUILLAUME'},{'codepostal':'97424','ville':'LE PITON ST LEU'},{'codepostal':'97424','ville':'LE PLATE'},{'codepostal':'97425','ville':'LES AVIRONS'},{'codepostal':'97425','ville':'TEVELAVE'},{'codepostal':'97426','ville':'LES TROIS BASSINS'},{'codepostal':'97426','ville':'TROIS BASSINS'},{'codepostal':'97427','ville':'L ETANG SALE'},{'codepostal':'97427','ville':'L ETANG SALE LES BAINS'},{'codepostal':'97429','ville':'PETITE ILE'},{'codepostal':'97430','ville':'LE TAMPON'},{'codepostal':'97430','ville':'LES TROIS MARES'},{'codepostal':'97430','ville':'PONT D YVES'},{'codepostal':'97430','ville':'TAMPON 14EME KM'},{'codepostal':'97431','ville':'LA PLAINE DES PALMISTES'},{'codepostal':'97432','ville':'RAVINE DES CABRIS'},{'codepostal':'97433','ville':'HELL BOURG'},{'codepostal':'97433','ville':'LA POSSESSION'},{'codepostal':'97433','ville':'SALAZIE'},{'codepostal':'97434','ville':'LA SALINE LES BAINS'},{'codepostal':'97434','ville':'ST GILLES LES BAINS'},{'codepostal':'97435','ville':'BERNICA'},{'codepostal':'97435','ville':'ST GILLES LES HAUTS'},{'codepostal':'97435','ville':'TAN ROUGE'},{'codepostal':'97436','ville':'ST LEU'},{'codepostal':'97437','ville':'STE ANNE'},{'codepostal':'97438','ville':'RIVIERE DES PLUIES'},{'codepostal':'97438','ville':'ROLAND GARROS AEROPORT'},{'codepostal':'97438','ville':'STE MARIE'},{'codepostal':'97439','ville':'LE PITON STE ROSE'},{'codepostal':'97439','ville':'STE ROSE'},{'codepostal':'97440','ville':'CAMBUSTON'},{'codepostal':'97440','ville':'LA CRESSONNIERE'},{'codepostal':'97440','ville':'ST ANDRE'},{'codepostal':'97441','ville':'STE SUZANNE'},{'codepostal':'97442','ville':'BASSE VALLEE'},{'codepostal':'97442','ville':'ST PHILIPPE'},{'codepostal':'97450','ville':'ST LOUIS'},{'codepostal':'97460','ville':'BELLEMENE'},{'codepostal':'97460','ville':'ST PAUL'},{'codepostal':'97470','ville':'ST BENOIT'},{'codepostal':'97480','ville':'LES LIANES'},{'codepostal':'97480','ville':'ST JOSEPH'},{'codepostal':'97480','ville':'VINCENDO'},{'codepostal':'97490','ville':'BOIS DE NEFLES ST DENIS'},{'codepostal':'97490','ville':'LA BRETAGNE'},{'codepostal':'97490','ville':'MOUFIA'},{'codepostal':'97490','ville':'STE CLOTILDE'}]};
	var voieSet = ['Abbaye','Agglomeration','Aire(s)','Allee(s)','Ancien chemin','Ancienne route(s)','Anse','Arcade(s)','Autoroute','Avenue','Barriere(s)','Bas chemin','Bastide','Baston','Beguinage(s)','Berge(s)','Bois','Boucle','Boulevard','Bourg','Butte','Cale','Camp','Campagne','Camping','Carre','Carreau','Carrefour','Carriere(s)','Castel','Cavee','Centre(al)','Chalet','Chapelle','Charmille','Chateau','Chaussee(s)','Chemin Rural','Chemin vicinal (aux)','Cheminement(s)','Chemin(s)','Chez','Cite(s)','Cloitre','Clos','Col','Colline(s)','Contour','Corniche(s)','Cote(au)','Cottage(s)','Cour','Cours','Darse','Degre(s)','Descente(s)','Digue(s)','Domaine(s)','Ecluse(s)','Eglise','Enceinte','Enclave','Enclos','Escalier(s)','Espace','Esplanade(s)','Faubourg','Ferme(s)','Fontaine','Fort','Forum','Fosse(s)','Foyer','Galerie(s)','Gare','Garenne','Grand boulevard','Grande(s) ensemble(s)','Grande(s) rue(s)','Grille','Grimpette','Groupement','Groupe(s)','Halle(s)','Hameau(x)','Haut(s) chemin(s)','Hippodrome','HLM','Ile','Immeuble(s)','Impasse(s)','Jardin(s)','Jetee(s)','Levee','Lieu dit','Lotissement(s)','Mail','Maison forestiere','Manoir','Marche(s)','Mas','Metro','Montee(s)','Moulin(s)','Musee','Nouvelle route','Palais','Parc(s)','Parking','Parvis','Passage','Passage a niveau','Passerelle(s)','Passe(s)','Patio','Pavillon(s)','Peripherique','Peristyle','Petite avenue','Petite impasse','Petite route','Petite rue','Petites(s) allee(s)','Place','Placis','Plage(s)','Plaine','Plan','Plateau(x)','Pointe','Pont(s)','Porche','Port','Porte','Portique(s)','Poterne','Pourtour','Pre','Presqu ile','Promenade','Quai','Quartier','Raccourci','Raidillon','Rampe','Rempart','Residence(s)','Roc(ade)','Rond point','Roquet','Rotonde','Route','Rue','Ruelle','Sente(ier)','Square','Stade','Station','Terrain','Terrasse(s)','Terre plein','Tertre(s)','Tour','Traverse','Val(lee)(lon)','Venelle(s)','Via','Vieille route','Vieux chemin','Village(s)','Villa(s)','Voie(s)','Zone','Zone a urbaniser','Zone artisanale','Zone d amenagement Concerte','Zone d amenagement Differe','Zone industrielle'];
	var complementnoSet = ['A','B','bis','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','ter','U','V','W','X','Y','Z'];
	
	//console.log(filteredVilleSet);
	$.each(villeSet.data,function(key,value){
		codePostalSet.push(value.codepostal);
	});

	//Add autocomplete data to controls Voie & Codepostal
	$('.type_voie').autocomplete({ source:voieSet });
	$('.comp_numero').autocomplete({ source:complementnoSet });
	$('.code_postal').autocomplete({ 
		source:$.unique(codePostalSet), 
		minLength:3, 
	}); //removing duplicate data

	//autocomplete ville depending on codepostal
	autocompleteVille('#ville2','#codepostal2',codePostalSet,villeSet);
	autocompleteVille('#ville3','#codepostal3',codePostalSet,villeSet);

	//testing 
	validateVilleEntryList();
});


//Add autocomplete data to control ville depending on Code postal
var autocompleteVille = function(ville,codepostal,codePostalSet,villeSet)
{
	$(ville).autocomplete({
		source: function(request,response){
			var filteredVille = new Array(); //final array to contain filtered data .i.e Ville based on Codepostal
			var filteredVilleSet = new Array(); // array containing both codepostal and ville
			var re = $.ui.autocomplete.escapeRegex(request.term); //capture letter typed in textbox
			var matcher = new RegExp( "^" + re, "i" ); //create regular expression pattern
			//If codepostal is not empty, filter 'Ville' by associated codepostal
			if($.inArray($(codepostal).val(), codePostalSet) > -1) 
			{
				//Filter VilleSet array depending on codepostal
				filteredVilleSet = $.grep( villeSet.data, function(key,item) 
				{
					return key.codepostal == $(codepostal).val();
				});
			}
			else //else display all 'ville'
			{
				filteredVilleSet = villeSet.data;
			}
			// Loop through array to retrieve 'ville' only
			$.each( filteredVilleSet, function( key, value) 
			{
				filteredVille.push(value.ville);
			});
			//reassign filteredVille to match letters typed on textbox
			filteredVille= $.grep( filteredVille, function(item,index){
			    return matcher.test(item);
			});
			//return list of Ville
			response(filteredVille);
		},
		close: function( event, ui ) { //if user does not enter codepostal first
			if(this.value !="" ) {
				var filteredcodepostal = $.grep( villeSet.data, function(key,item) 
				{
					return key.ville == $(ville).val();
				});
				$(codepostal).val(filteredcodepostal[0].codepostal);
			}
		},
		minLength: 0

	}).focus(function(req,add){ // display autocomplete data onfocus / without typing any letters
		if ($(this).val().length == 0) {
			{
				$(this).autocomplete("search");
			}
    	}
	});
}


/*------------------------------------------------
* Function to prevent user from entering a value / the user must select the value from the list
* @param {jqObject} the field where the validation applies
* @param {Array[String]} validation rules for this field
* @param {int} rule index
* @param {Map} form options
* @return an error string if validation failed
*/
var validateVilleEntryList = function( field, rules, i, options ){
	
	var codePostal = $('#codepostal').val();
	var ville = $('#ville').val();
	var filteredVilleSet = new Array();
	var searchResult = new Array();
	var villeSet = { "data":[{'codepostal':'97100','ville':'BASSE TERRE'},{'codepostal':'97110','ville':'POINTE A PITRE'},{'codepostal':'97111','ville':'MORNE A L\'EAU'},{'codepostal':'97112','ville':'GRAND BOURG'},{'codepostal':'97113','ville':'GOURBEYRE'},{'codepostal':'97114','ville':'TROIS RIVIERES'},{'codepostal':'97115','ville':'SAINTE ROSE'},{'codepostal':'97116','ville':'POINTE NOIRE'},{'codepostal':'97117','ville':'PORT LOUIS'},{'codepostal':'97118','ville':'SAINT FRANCOIS'},{'codepostal':'97119','ville':'VIEUX HABITANTS'},{'codepostal':'97120','ville':'SAINT CLAUDE'},{'codepostal':'97121','ville':'ANSE BERTRAND'},{'codepostal':'97122','ville':'BAIE-MAHAULT'},{'codepostal':'97123','ville':'BAILLIF'},{'codepostal':'97125','ville':'BOUILLANTE'},{'codepostal':'97126','ville':'DESHAIES'},{'codepostal':'97127','ville':'LA DESIRADE'},{'codepostal':'97128','ville':'GOYAVE'},{'codepostal':'97129','ville':'LAMENTIN'},{'codepostal':'97130','ville':'BANANIER'},{'codepostal':'97130','ville':'CAPESTERRE BELLE EAU'},{'codepostal':'97130','ville':'SAINTE MARIE'},{'codepostal':'97131','ville':'LES MANGLES'},{'codepostal':'97131','ville':'PETIT CANAL'},{'codepostal':'97132','ville':'BOUILLANTE'},{'codepostal':'97132','ville':'PIGEON'},{'codepostal':'97133','ville':'SAINT BARTHELEMY'},{'codepostal':'97134','ville':'SAINT LOUIS'},{'codepostal':'97136','ville':'TERRE DE BAS'},{'codepostal':'97137','ville':'TERRE DE HAUT'},{'codepostal':'97139','ville':'LES ABYMES'},{'codepostal':'97140','ville':'CAPESTERRE DE MARIE GALANTE'},{'codepostal':'97141','ville':'VIEUX FORT'},{'codepostal':'97142','ville':'LES ABYMES'},{'codepostal':'97150','ville':'SAINT MARTIN'},{'codepostal':'97160','ville':'LE MOULE'},{'codepostal':'97170','ville':'PETIT BOURG'},{'codepostal':'97180','ville':'DOUVILLE'},{'codepostal':'97180','ville':'SAINTE ANNE'},{'codepostal':'97190','ville':'LE GOSIER'},{'codepostal':'97200','ville':'FORT DE FRANCE'},{'codepostal':'97211','ville':'RIVIERE PILOTE'},{'codepostal':'97212','ville':'SAINT JOSEPH'},{'codepostal':'97213','ville':'GROS MORNE'},{'codepostal':'97214','ville':'LE LORRAIN'},{'codepostal':'97215','ville':'PETIT BOURG'},{'codepostal':'97215','ville':'RIVIERE SALEE'},{'codepostal':'97216','ville':'L\'AJOUPA BOUILLON'},{'codepostal':'97217','ville':'LES ANSES D\'ARLETS'},{'codepostal':'97218','ville':'BASSE POINTE'},{'codepostal':'97218','ville':'GRAND RIVIERE'},{'codepostal':'97218','ville':'MACOUBA'},{'codepostal':'97220','ville':'LA TRINITE'},{'codepostal':'97221','ville':'LE CARBET'},{'codepostal':'97222','ville':'BELLEFONTAINE'},{'codepostal':'97222','ville':'CASE PILOTE'},{'codepostal':'97223','ville':'LE DIAMANT'},{'codepostal':'97224','ville':'DUCOS'},{'codepostal':'97225','ville':'LE MARIGOT'},{'codepostal':'97226','ville':'LE MORNE VERT'},{'codepostal':'97227','ville':'SAINTE ANNE'},{'codepostal':'97228','ville':'SAINTE LUCE'},{'codepostal':'97229','ville':'LES TROIS ILETS'},{'codepostal':'97230','ville':'MORNE DES ESSES'},{'codepostal':'97230','ville':'SAINTE MARIE'},{'codepostal':'97231','ville':'LE ROBERT'},{'codepostal':'97231','ville':'VERT PRE'},{'codepostal':'97232','ville':'LE LAMENTIN'},{'codepostal':'97233','ville':'SCHOELCHER'},{'codepostal':'97234','ville':'FORT DE FRANCE'},{'codepostal':'97240','ville':'LE FRANCOIS'},{'codepostal':'97250','ville':'FONDS ST DENIS'},{'codepostal':'97250','ville':'LE PRECHEUR'},{'codepostal':'97250','ville':'SAINT PIERRE'},{'codepostal':'97260','ville':'LE MORNE ROUGE'},{'codepostal':'97270','ville':'SAINT ESPRIT'},{'codepostal':'97280','ville':'LE VAUCLIN'},{'codepostal':'97290','ville':'LE MARIN'},{'codepostal':'97300','ville':'CAYENNE'},{'codepostal':'97310','ville':'KOUROU'},{'codepostal':'97311','ville':'ROURA'},{'codepostal':'97312','ville':'ST ELIE'},{'codepostal':'97313','ville':'ST GEORGES'},{'codepostal':'97314','ville':'SAUL'},{'codepostal':'97315','ville':'SINNAMARY'},{'codepostal':'97316','ville':'PAPAICHTON'},{'codepostal':'97317','ville':'APATOU'},{'codepostal':'97318','ville':'JAVOUHEY'},{'codepostal':'97319','ville':'AWALA YALIMAPO'},{'codepostal':'97320','ville':'ST LAURENT DU MARONI'},{'codepostal':'97330','ville':'CAMOPI'},{'codepostal':'97340','ville':'GRAND SANTI'},{'codepostal':'97340','ville':'POMPIDOU PAPA ICHTON'},{'codepostal':'97350','ville':'IRACOUBO'},{'codepostal':'97351','ville':'MATOURY'},{'codepostal':'97352','ville':'CACAO'},{'codepostal':'97353','ville':'KAW'},{'codepostal':'97354','ville':'REMIRE MONTJOLY'},{'codepostal':'97355','ville':'MACOURIA'},{'codepostal':'97355','ville':'MACOURIA TONATE'},{'codepostal':'97356','ville':'MONTSINERY TONNEGRANDE'},{'codepostal':'97360','ville':'MANA'},{'codepostal':'97370','ville':'MARIPASOULA'},{'codepostal':'97380','ville':'OUANARY'},{'codepostal':'97390','ville':'REGINA'},{'codepostal':'97400','ville':'BELLE PIERRE'},{'codepostal':'97400','ville':'LE BRULE'},{'codepostal':'97400','ville':'ST DENIS'},{'codepostal':'97400','ville':'ST FRANCOIS'},{'codepostal':'97410','ville':'BASSE TERRE'},{'codepostal':'97410','ville':'GRAND BOIS'},{'codepostal':'97410','ville':'MONT VERT'},{'codepostal':'97410','ville':'ST PIERRE'},{'codepostal':'97410','ville':'TERRE SAINTE'},{'codepostal':'97411','ville':'BOIS DE NEFLES ST PAUL'},{'codepostal':'97412','ville':'BRAS PANON'},{'codepostal':'97412','ville':'RIVIERE DU MAT'},{'codepostal':'97413','ville':'CILAOS'},{'codepostal':'97413','ville':'PALMISTE ROUGE'},{'codepostal':'97414','ville':'ENTRE DEUX'},{'codepostal':'97416','ville':'LA CHALOUPE'},{'codepostal':'97417','ville':'LA MONTAGNE'},{'codepostal':'97417','ville':'ST BERNARD'},{'codepostal':'97417','ville':'ST DENIS'},{'codepostal':'97418','ville':'LA PLAINE DES CAFRES'},{'codepostal':'97419','ville':'LA POSSESSION'},{'codepostal':'97419','ville':'LA RIVIERE DES GALETS'},{'codepostal':'97419','ville':'LE DOS D ANE'},{'codepostal':'97419','ville':'SAINT DENIS'},{'codepostal':'97419','ville':'STE THERESE'},{'codepostal':'97420','ville':'LE PORT'},{'codepostal':'97421','ville':'LA RIVIERE'},{'codepostal':'97421','ville':'LES MAKES'},{'codepostal':'97422','ville':'LA SALINE'},{'codepostal':'97423','ville':'LE GUILLAUME'},{'codepostal':'97424','ville':'LE PITON ST LEU'},{'codepostal':'97424','ville':'LE PLATE'},{'codepostal':'97425','ville':'LES AVIRONS'},{'codepostal':'97425','ville':'TEVELAVE'},{'codepostal':'97426','ville':'LES TROIS BASSINS'},{'codepostal':'97426','ville':'TROIS BASSINS'},{'codepostal':'97427','ville':'L ETANG SALE'},{'codepostal':'97427','ville':'L ETANG SALE LES BAINS'},{'codepostal':'97429','ville':'PETITE ILE'},{'codepostal':'97430','ville':'LE TAMPON'},{'codepostal':'97430','ville':'LES TROIS MARES'},{'codepostal':'97430','ville':'PONT D YVES'},{'codepostal':'97430','ville':'TAMPON 14EME KM'},{'codepostal':'97431','ville':'LA PLAINE DES PALMISTES'},{'codepostal':'97432','ville':'RAVINE DES CABRIS'},{'codepostal':'97433','ville':'HELL BOURG'},{'codepostal':'97433','ville':'LA POSSESSION'},{'codepostal':'97433','ville':'SALAZIE'},{'codepostal':'97434','ville':'LA SALINE LES BAINS'},{'codepostal':'97434','ville':'ST GILLES LES BAINS'},{'codepostal':'97435','ville':'BERNICA'},{'codepostal':'97435','ville':'ST GILLES LES HAUTS'},{'codepostal':'97435','ville':'TAN ROUGE'},{'codepostal':'97436','ville':'ST LEU'},{'codepostal':'97437','ville':'STE ANNE'},{'codepostal':'97438','ville':'RIVIERE DES PLUIES'},{'codepostal':'97438','ville':'ROLAND GARROS AEROPORT'},{'codepostal':'97438','ville':'STE MARIE'},{'codepostal':'97439','ville':'LE PITON STE ROSE'},{'codepostal':'97439','ville':'STE ROSE'},{'codepostal':'97440','ville':'CAMBUSTON'},{'codepostal':'97440','ville':'LA CRESSONNIERE'},{'codepostal':'97440','ville':'ST ANDRE'},{'codepostal':'97441','ville':'STE SUZANNE'},{'codepostal':'97442','ville':'BASSE VALLEE'},{'codepostal':'97442','ville':'ST PHILIPPE'},{'codepostal':'97450','ville':'ST LOUIS'},{'codepostal':'97460','ville':'BELLEMENE'},{'codepostal':'97460','ville':'ST PAUL'},{'codepostal':'97470','ville':'ST BENOIT'},{'codepostal':'97480','ville':'LES LIANES'},{'codepostal':'97480','ville':'ST JOSEPH'},{'codepostal':'97480','ville':'VINCENDO'},{'codepostal':'97490','ville':'BOIS DE NEFLES ST DENIS'},{'codepostal':'97490','ville':'LA BRETAGNE'},{'codepostal':'97490','ville':'MOUFIA'},{'codepostal':'97490','ville':'STE CLOTILDE'}]};

	if(codePostal)
	{

		filteredVilleSet = $.grep( villeSet.data, function(key,item) { return key.codepostal == codePostal; });
	}
	else
	{
		filteredVilleSet = villeSet.data;
	}

	searchResult = $.grep(filteredVilleSet,function(key, item) { return key.ville == ville });
	if(searchResult.length == 0 )
	{

		$(ville).autocomplete("search");
		return "Veuillez choisir une ville dans la liste";
	}

};