<html>
<head>
	<title>Formulaire</title>
	<style>
	body { font-family:'Helvetica'}
	h2 { color:#65b755;}
	.box { border:1px solid #000; }
	.box h3 {border-bottom: 1px dotted; margin: 0; text-align: center; padding: 6px; font-size: 13px;}
	table { width:1000px; }
	table table { width: 100%;}
	.w2 { width:50%; }
	.w_25 { width:25%;}
	.w_30 { width:30%;}
	.w_70 {width:70%;}
	.w_75 { width:75%;}
	.block { display:block; }
	.inline { display: inline;}
	.dotted-bottom { border-bottom: 1px dotted #000; }
	.dotted-left { border-left: 1px dotted #000; }
	.field { padding: 8px;}
	.p10 { padding:10px;}
	.r10 { margin-right: 10px;}
	.l10 { margin-left: 10px;}
	.t10 { margin-top:10px;}
	.t20 { margin-top:20px;}
	.text-center { text-align: center;}
	.sqr td{ border-bottom: 1px solid;border-right: 1px solid;}
	.sqr td.first{border-left:1px solid;}
	</style>
</head>
<body>
	<!-- LOGO & proprietaire & A qui adresser.. -->
	<table style='margin-left:auto;margin-right:auto;'>
		<tr><td colspan='2'><?php echo image('dompdf/logo.png',NULL,array("width"=>"1000px")); ?></td></tr>
		<tr>
			<td class='w2'>
				<div class='box r10 t20'>
					<h3>PROPRI&Eacute;TAIRE DE LA LIGNE</h3>
					<table>
						<tr><td class='w_30 field'><label>N&deg; de contrat:</label></td><td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td></tr>
						<tr><td class='w_30 field'><label>N&deg; de t&eacute;l&eacute;phone:</label></td><td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td></tr>
						<tr><td class='w_30 field'><label>Nom:</label></td><td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td></tr>
						<tr><td class='w_30 field'><label>Pr&eacute;nom:</label></td><td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td></tr>
					</table>
				</div>
			</td>
			<td valign='top' class='w2'>
				<div class='box l10 t20'>
					<h3>A QUI ADRESSER CE FORMULAIRE?</h3>
					<ul>
						<li>
							Par voie postale &aacute; l'une des adresses suivantes :
							<br/><strong>Guadeloupe</strong>: Mediaserv /BP91 / 97153 Point &agrave; Pitre Cedex
							<br/><strong>Martinique</strong>: Mediaserv /BP378 / 97288 Lamentin Cedex 2
							<br/><strong>R&eacute;union</strong>: Mediaserv /BP20204 / 97493 Ste clotilde Cedex
						</li>
						<li>En le d&eacute;posant dans votre Espace Mediaserv le plus proche : <a href='#'>O&ugrave; trouver les espaces Mediaserv</a></li>
					</ul>
				</div>
			</td>
		</tr>
	</table>

	<!--Demande de prélèvement bancaire & No, National -->
	<table style='margin-left:auto;margin-right:auto;'>
		<tr>
			<td valign='middle' width='70%'><h2>DEMANDE DE PR&Eacute;L&Egrave;VEMENT BANCAIRE</h2></td>
			<td width='30%'>
				<div class='box p10'>
					<div>N&deg; NATIONAL D'&Eacute;METTEUR</div>
					<div><strong>411195</strong></div>
				</div>
			</td>
		</tr>
	</table>

	<!--Compte a débiter..-->
	<table style='margin-left:auto;margin-right:auto;'>
		<tr>
			<td colspan='2'>J'autorise la soci&eacute;t&eacute; Mediaserv &agrave; faire pr&eacute;lever, en sa faveur, aupr&egrave;s de l'&eacute;tablissement teneur de mon compte, les sommes dont je lui serai redevable. La pr&eacute;sente demande est valable jusqu'&agrave; annulation de ma part &agrave; notifier en temps voulu &agrave; Mediaserv.</td>
		</tr>
		<tr>
			<td class='w2'>
				<div class='box r10 t10'>
					<h3>NOM, PR&Eacute;NOMS ET ADRESSE DU D&Eacute;BITEUR</h3>
					<table>
						<tr>
							<td class='w_30 field'><label>Nom:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Pr&eacute;nom:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Adresse:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Code Postal:</label></td>
							<td class='w_25'><div class='dotted-bottom' style='height:20px;'></div></td>
							<td class='field text-center'><label>Ville:</label></td>
							<td class='w_25'><div class='dotted-bottom' style='height:20px;'></div></td>
						</tr>
					</table>				
				</div>
			</td>
			<td class='w2'>
				<div class='box l10 t10'>
					<h3>DESINGATION DE L'ETABLISSEMENT TENEUR DU COMPTE A DEBITER</h3>
					<table>
						<tr>
							<td class='w_30 field'><label>Banque:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Adresse:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Code postal:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Ville:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
					</table>					
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class='box r10 t20'>
					<h3>COMPTE A D&Eacute;BITER</h3>
					<table width='100%'>
						<tr><td class='text-center' style='border-bottom:1px dotted;'>Codes</td><td style='border-bottom:1px dotted; border-left:1px dotted;'>&nbsp;</td></tr>
						<tr>
							<td>
								<table>
									<tr><td class='text-center' >&Eacute;tablissement</td><td class='text-center'>Guichet</td></tr>
									<tr>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td style='border-left:1px dotted;'>
								<table>
									<tr><td class='text-center'>N&deg; de compte</td><td class='text-center'>Cl&eacute; R.I.B</td></tr>
									<tr>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
		
				</div>
			</td>
			<td>
				<div class='l10 t20'>
					<table>
						<tr><td class='w_25'><label>Fait &aacute;:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
						<tr><td class='w_25'><label>Le:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
						<tr><td class='w_25'><label>Signature:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
			<div class='t10' style='font-size:10px;'>
			Les informations contenues dans la pr&eacute;sente demande ne seront utilis&eacute;es que pour les seules n&eacute;cessit&eacute;s de la gestion et pourront donner lieu &agrave; exercice du droit individuel d'acc&egrave;s aupr&egrave;s du cr&eacute;ancier &agrave; l'adresse ci-dessus, dans les conditions pr&eacute;vues par la d&eacute;lib&eacute;rations N&deg;80 du 01.04.80 de la Commission Informatique et Libert&eacute;.</div>
			</td>
		</tr>
	</table>


	<!--AUTORISATION DE PRELEVEMENT BANCAIRE-->
	<table style='margin-left:auto;margin-right:auto;'>
		<tr>
			<td valign='middle' width='70%'><h2>AUTORISATION DE PR&Eacute;L&Egrave;VEMENT BANCAIRE</h2></td>
			<td width='30%'>
				<div class='box p10'>
					<div>N&deg; NATIONAL D'&Eacute;METTEUR</div>
					<div><strong>411195</strong></div>
				</div>
			</td>
		</tr>
	</table>

	<table style='margin-left:auto;margin-right:auto;'>
		<tr>
			<td colspan='2'>J'autorise la soci&eacute;t&eacute; Mediaserv &agrave; faire pr&eacute;lever, en sa faveur, aupr&egrave;s de l'&eacute;tablissement teneur de mon compte, les sommes dont je lui serai redevable. La pr&eacute;sente demande est valable jusqu'&agrave; annulation de ma part &agrave; notifier en temps voulu &agrave; Mediaserv.</td>
		</tr>
		<tr>
			<td class='w2'>
				<div class='box r10 t10'>
					<h3>NOM, PR&Eacute;NOMS ET ADRESSE DU D&Eacute;BITEUR</h3>
					<table>
						<tr>
							<td class='w_30 field'><label>Nom:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Pr&eacute;nom:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Adresse:</label></td>
							<td colspan='3' class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Code Postal:</label></td>
							<td class='w_25'><div class='dotted-bottom' style='height:20px;'></div></td>
							<td class='field text-center'><label>Ville:</label></td>
							<td class='w_25'><div class='dotted-bottom' style='height:20px;'></div></td>
						</tr>
					</table>	
				</div>
			</td>
			<td class='w2'>
				<div class='box l10 t10'>
					<h3>DESINGATION DE L'ETABLISSEMENT TENEUR DU COMPTE A DEBITER</h3>
					<table>
						<tr>
							<td class='w_30 field'><label>Banque:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Adresse:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Code postal:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
						<tr>
							<td class='w_30 field'><label>Ville:</label></td>
							<td class='w_70'><div class='dotted-bottom' style='width:95%;height:20px;'></div></td>
						</tr>
					</table>					
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<div class='box r10 t20'>
					<h3>COMPTE A D&Eacute;BITER</h3>
					<table width='100%'>
						<tr><td class='text-center' style='border-bottom:1px dotted;'>Codes</td><td style='border-bottom:1px dotted; border-left:1px dotted;'>&nbsp;</td></tr>
						<tr>
							<td>
								<table>
									<tr><td class='text-center' >&Eacute;tablissement</td><td class='text-center'>Guichet</td></tr>
									<tr>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
							<td style='border-left:1px dotted;'>
								<table>
									<tr><td class='text-center'>N&deg; de compte</td><td class='text-center'>Cl&eacute; R.I.B</td></tr>
									<tr>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
										<td class='sqr w2 text-center'>
											<table class='text-center'>
												<tr>
													<td class='first'>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
													<td>1</td>
												</tr>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
		
				</div>
			</td>
			<td>
				<div class='l10 t20'>
					<table>
						<tr><td class='w_25'><label>Fait &aacute;:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
						<tr><td class='w_25'><label>Le:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
						<tr><td class='w_25'><label>Signature:</label></td><td class='w_75'><div class='dotted-bottom' style='width:100%'></div></td></tr>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan='2'>
			<h2 class='text-center t10' style='font-size:21px'>Merci de remplir <b>les deux parties</b> ci-dessus et de <b>renvoyer le tout</b> &agrave; Mediaserv, sans les s&eacute;parer en y joignant obligatoirement un relev&eacute;
			&eacute; d'identit&eacute; bancaire (R.I.B.), postal (R.I.P.) ou de caisse d'&eacute;pargne (R.I.C.E.).</h2>
			<div class='t10 text-center' style='font-size:10px;'>
			Les informations contenues dans la pr&eacute;sente demande ne seront utilis&eacute;es que pour les seules n&eacute;cessit&eacute;s de la gestion et pourront donner lieu &agrave; exercice du droit individuel d'acc&egrave;s aupr&egrave;s du cr&eacute;ancier &agrave; l'adresse ci-dessus, dans les conditions pr&eacute;vues par la d&eacute;lib&eacute;rations N&deg;80 du 01.04.80 de la Commission Informatique et Libert&eacute;.</div>
			</td>
		</tr>
	</table>

</body>
</html>