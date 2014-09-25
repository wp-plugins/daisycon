<?php 
/* Daisycon prijsvergelijkers
 * File: general.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalSettings{

	public function adminSettings(){

		global $wpdb;
		
		// Add Stylesheet
		wp_enqueue_style('stylesheetTools', '../includes/style.css');

		if (isset($_POST['saveform'])){

			if(empty($_POST['mediaid']))
			{
			   	echo '	
		   			<div id="message" class="warningMessage">
						<p>
							<b>Vul je Media ID in</b>
						</p>
					</div>
					';
			}
			elseif(!preg_match("/^[0-9]+$/",$_POST['mediaid']))
			{
			   	echo '	
		   			<div id="message" class="warningMessage">
						<p>
							<b>Je Media ID kan alleen maar uit cijfers bestaan</b>
						</p>
					</div>
					';
			} 
			else
			{
				$cFeeds = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
				if (count($cFeeds) == 0){
					$wpdb->insert($wpdb->prefix.'daisycon_tools', array('media_id' => $_POST['mediaid']));
				}else{				
					$wpdb->update($wpdb->prefix.'daisycon_tools', array('media_id' => $_POST['mediaid']), array('media_id' => $cFeeds->media_id));
				}
				
				echo '	
		   			<div id="message" class="successMessage">
						<p>
							<b>Opgeslagen!</b>
						</p>
					</div>
					';
				
			}
		}
		
		$cMediaid = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
		$output = 	'<div style="width:900px;">
					<img src="../wp-content/plugins/daisycon/images/vergelijkers-affiliate-marketing.png" alt="" title="" style="margin-right:20px;" />
					<br/>
					Daisycon biedt haar publishers tien gratis prijsvergelijkers waarmee je doormiddel van een shorttag direct een vergelijker op je WordPress-website kunt plaatsen. Maak een keuze tussen de Telecomvergelijker, Sim only-vergelijker, Energievergelijker, Zorgverzekeringvergelijker, Autoverzekeringvergelijker, Dagaanbiedingen-tool, Datingsitevergelijker, Vakantietool of de Wintersporttool.
					<br/><br/>
					Om de plugins te gebruiken moet je aangemeld zijn als publisher bij Daisycon. <a href="http://www.daisycon.com/nl/publishers/" target="_blank">Klik hier om je gratis aan te melden.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/telecomvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Telecomvergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/sim-only-vergelijker/" target="_blank">Bekijk hier een voorbeeld van de Sim only-vergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/zorgverzekeringvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Zorgverzekeringvergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/energievergelijker/" target="_blank">Bekijk hier een voorbeeld van de Energievergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/autoverzekeringvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Autoverzekeringvergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/reisverzekeringvergelijker/" target="_blank">Bekijk hier een voorbeeld van de Reisverzekeringvergelijker.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/wintersporttool/" target="_blank">Bekijk hier een voorbeeld van de Wintersporttool.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/vakantietool/" target="_blank">Bekijk hier een voorbeeld van de Vakantietool.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/dagaanbiedingen-tool/" target="_blank">Bekijk hier een voorbeeld van de Dagaanbiedingen-tool.</a>
					<br/><br/>
					<a href="http://vergelijkers.daisycon.com/datingsitevergelijker/" target="_blank">Bekijk hier een voorbeeld van de Datingsitevergelijker.</a>
					<br/><br/>
					<h2>Andere plugins van Daisycon</h2>
					<a href="http://wordpress.org/extend/plugins/affiliate-marketing-xml-product-feed-importer-for-daisycon/" target="_blank">Download hier de Daisycon plugin</a> waarmee je alle productfeeds van Daisycon kan gebruiken. 
					<br/><br/>
					<a href="http://www.daisycon.com/nl/tools/" target="_blank">Bekijk hier alle tools die Daisycon voor haar publishers beschikbaar heeft.</a>
					<br/><br/>
					<h2>Media ID invullen</h2>
					Vul hier onder je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank">Media ID</a> in en deze wordt dan automatisch ingevuld in de shorttags van de vergelijkers.
					<br/><br/>
					<form action="" name="saveform" method="POST" id="saveform" />
					<input type="text" name="mediaid" id="mediaid" value="'.$cMediaid->media_id.'">
					<input type="submit" name="saveform" id="saveform" value="Opslaan">
					</form>
					</div>			
					';
		
		$output .=	'<script type="text/javascript">
						jQuery.ajax
						({
							url: "http://developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid=0&item=intro&jsoncallback=?",
							dataType: "jsonp",
							cache: false,
							success: function(html)
							{
							} 
						});
					</script>';
		
		echo $output;
	}
}
?>