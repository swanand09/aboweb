<html>
<head>
	<title>Formulaire SEPA</title>
	<style>
	.small-box{border-bottom: 1px solid #939598;border-left: 1px solid #939598; border-top: 1px solid #939598; float: left; height: 25px;width: 17px;}
	.small-box.space{ border-right: 1px solid #939598; margin-right: 8px;}
	.small-box.end{border-right: 1px solid #939598;}
	.fillintheblanks { border-bottom: 1px dotted #000000; width: 100%; }
	.desc { color: #808080; font-size: 0.95em; font-style: italic; clear: both; }
	body { font-family:'Helvetica'}
	img { width: 100%; }
	h1 { color:#fff;margin: 0;}
	th { background-color: #000;}
	.box { border:1px solid #000; }
	.box h3 {border-bottom: 1px dotted; margin: 0; text-align: center; padding: 6px; font-size: 13px;}
	table { width:1000px; }
	table table { width: 100%;}
	.w_50 { width:50%; }
	.w_20 { width:20%; }
	.w_25 { width:25%; }
	.w_30 { width:30%; }
	.w_70 { width:70%; }
	.w_75 { width:75%; }
	.border-bottom{ border-bottom: 1px solid;}
	.textarea {}
	</style>
</head>
<body>
<!--Mandat de prelevement+logo + reference -->
<table border="1">
	<tr>
		<th colspan="2">
			<h1 class='text-center'>MANDAT DE PRELEVEMENT SEPA</h1>
		</th>
	</tr>
	<tr>
		<td class="w_50"><?php echo image('dompdf/logo.png',NULL,array("width"=>"1000px")); ?></td>
		<td class="w_50">
			<label>REFERENCE UNIQUE DU MANDAT<span>(PARTIE RESERVEE A MEDIASERV)</span></label>
		</td>
	</tr>
</table>

<!--First paragraph-->
<table border="1">
	<tr>
		<td>
			En signant ce formulaire de mandat, vous :
			<ul>
				<li>- autorisez MEDIASERV &agrave; envoyer des instructions &agrave; votre banque pour d&eacute;biter votre compte, et votre banque &agrave; d&eacute;biter votre compte conform&eacute;ment aux instructions de MEDIASERV.</li>
				<li>- reconnaissez que la notification de tout pr&eacute;l&egrave;vement SEPA s'op&egrave;re par le biais de la facture au plus tard 5 jours ouvr&eacute;s avant sa date d'&eacute;ch&eacute;ance pour le premier pr&eacute;l&egrave;vement et au plus tard 2 jours ouvr&eacute;s pour les suivants. </li>
			</ul>
			En cas de r&eacute;clamation relative aux pr&eacute;l&egrave;vements SEPA, ou en cas de r&eacute;vocation ou modification du mandat vous devez adresser votre demande : 
			pour les Antilles-Guyane &agrave; MEDIASERV, BP 378 - 97288 LAMENTIN CEDEX 2,<br/>
			et pour la R&eacute;union &agrave; MEDIASERV - BP 20204 97493 SAINTE-CLOTILDE CEDEX.
		</td>
	</tr>
</table>

<table class="border-bottom" border=1>
	<tr>
		<td class="w_30">VOTRE NOM: <div class="desc">Nom/Pr&eacute;noms du d&eacute;biteur</div></td>
		<td colspan="2"><div class="fillintheblanks"></div></td>
	</tr>
	<tr>
		<td>VOTRE ADRESSE:<div class="desc">Num&eacute;ro et nom de la rue</div></td>
		<td colspan="2"><div class="fillintheblanks">&nbsp;</div></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table border=1>
				<tr>
					<td rowspan="2" class="w_20">CODE POSTAL:</td>
					<td class="w_30"><div class="fillintheblanks"><?php echo $test;?></div></td>
					<td class="w_20">VILLE:</td>
					<td class="w_30"><div class="fillintheblanks">&nbsp;</div></td>
				</tr>
				<tr>
					<td class="w_30">&nbps;</td>
					<td class="w_20">PAYS:</td>
					<td class="w_30"><div class="fillintheblanks">&nbsp;</div></td
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>LES COORDONNEES</td>
		<td>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box end"></div>
			<div class="desc">IBAN(International Bank Account Number)</div>
		</td>
	</tr>
	<tr>
		<td>DE VOTRE COMPTE</td>
		<td>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box end"></div>
			<div class="desc">BIC(Bank identifier Code)</div>
		</td>
	</tr>
</table>

<!-- Nom du creancier -->
<table border=1 class="border-bottom">
	<tr>
		<td rowspan="4" class="w_30">NOM DU CREANCIER</td>
		<td colspan="6"> MEDIASERV</td>
	</tr>
	<tr><td colspan="6">FR43ZZZ411195</td></tr>
	<tr><td colspan="6">Tour Secid 6&egrave;me &eacute;tage - Place de la R&eacute;novation</td></tr>
	<tr>
		<td>CODE POSTAL:</td>
		<td>97110</td>
		<td>VILLE:</td>
		<td>POINTE-&agrave;-PITRE</td>
		<td>PAYS:</td>
		<td>FRANCE</td>
	</tr>
</table>

<!--Type de paiement-->
<table>
	<tr>
		<td>TYPE DE PAIEMENT :</td>
		<td> PAIEMENT RECURRENT/REPETITF</td>
		<td>PAIEMENT PONCTUEL</td>
	</tr>
	<tr>
		<td>SIGNE A : <div class="desc">Lieu</div></td>
		<td><div class="fillintheblanks">&nbsp;</div></td>
		<td>
			DATE:
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box space"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box"></div>
			<div class="small-box end"></div>
		</td>
	</tr>
	<tr>
		<td>SIGNATURE(S)</td>
		<td>VEUILLER SIGNER ICI:</td>
		<td><div class="textarea"></div></td>
	</tr>
	<tr>
		<td colspan="3">Note : Vos droits concernant le présent mandat sont expliqués dans un document que vous pouvez obtenir auprès de votre banque.</td>
	</tr>
</table>

</body>
</html>

