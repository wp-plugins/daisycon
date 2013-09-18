<?php 
/* Daisycon prijsvergelijkers
 * File: general.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalSettings{

	public function adminSettings(){
		
		$output = 	'<div style="width:900px;">
					<h1>Daisycon prijsvergelijkers</h1>
					Daisycon biedt haar publishers twee gratis prijsvergelijkers waarmee je doormiddel van een shorttag direct een vergelijker op je WordPress-website kunt plaatsen. Maak een keuze tussen de telecomvergelijker (die abonnementen inclusief toestel vergelijkt) of de Sim only-vergelijker.
					<br/><br/>
					Om de plugins te gebruiken moet je aangemeld zijn als publisher bij Daisycon. <a href="http://www.daisycon.com/nl/publishers/" target="_blank">Klik hier om je gratis aan te melden.</a>
					<br/><br/>
					<a href="http://mobielvergelijker.affiliateprogramma.eu/telecomvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Telecomvergelijker.</a>
					<br/><br/>
					<a href="http://mobielvergelijker.affiliateprogramma.eu/sim-only-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Sim only-vergelijker.</a>
					<br/><br/>
					<h2>Andere plugins van Daisycon</h2>
					<a href="http://wordpress.org/extend/plugins/affiliate-marketing-xml-product-feed-importer-for-daisycon/" target="_blank">Download hier de Daisycon plugin</a> waarmee je alle productfeeds van Daisycon kan gebruiken. 
					<br/><br/>
					<a href="http://www.daisycon.com/nl/tools/" target="_blank">Bekijk hier alle tools die Daisycon voor haar publishers beschikbaar heeft.</a>
					
					</div>			
					';
		
		echo $output;
	}
}
?>