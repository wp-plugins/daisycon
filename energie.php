<?php 
/* Daisycon prijsvergelijkers
 * File: energie.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalEnergy{

	public function adminEnergy(){
		
		global $wpdb;

		$cMediaid = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
		if (count($cMediaid) == 0){
			$mediaid = 'XXXXX';
		}else{
			$mediaid = $cMediaid->media_id;
		}
		
		$output = '
					<script type="text/javascript">
							function select_all(el) {
								if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
									var range = document.createRange();
									range.selectNodeContents(el);
									var sel = window.getSelection();
									sel.removeAllRanges();
									sel.addRange(range);
								} else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
									var textRange = document.body.createTextRange();
									textRange.moveToElementText(el);
									textRange.select();
								}
							}
							
							function getAanbieders(){ 
								jQuery.ajax({
									url: "http://developers.affiliateprogramma.eu/Energievergelijker/config/data.php?method=getStringAanbieders&jsoncallback=?",
									dataType: "jsonp",
									async: true,
									success: function(data){
										jQuery("#aanbieders").html(data); 			
									}
								});
							}
							
							jQuery(document).ready(function() {
								getAanbieders();
							});	
							
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/energievergelijker-tools.gif" alt="" title="" style="float:left;margin-right:20px;" /><h1>Daisycon energievergelijker</h1>
						Daisycon heeft exclusief voor haar publishers een gratis energievergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende energie aanbieders met elkaar te vergelijken.
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://prijsvergelijkers.affiliateprogramma.eu/energievergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Bij amount vul je het aantal resultaten in dat je wil tonen en je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_energie mediaid="'.$mediaid.'" subid="" amount="10"]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						
						<br/>
					
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;">
						
							[daisycon_energie mediaid="'.$mediaid.'" subid="" programs="all" duur="all" duurzaam="all" view="all" sidebar="1" huis="appartement" personen="enkel" meter="enkel"]
						
						</div>
						
						<p>&nbsp;</p>
						
						<h3>Programma&#39;s</h3>
						Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>programs="3,4,8"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.<br/>
						<div id="aanbieders"></div>
						<br/><br/>
						
						<h3>Aantal</h3>
						Het aantal resultaten om weer te geven. Gebruik de onderstaande opties om in te vullen bij <strong>amount=""</strong>:
						<br/><i>3, 5, 10, 15</i>
						<br/><br/>

						<h3>Titel van de Energievergelijker</h3>
						Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
						<br/><br/>		
						
						<h2>Filters</h2>
						<hr style="border:1px solid #ccc;">
						
						<h3>Uitlijning filters / sidebar</h3>
						Filters kunnen aan de bovenkant of aan de zijkant geplaatst worden. Gebruik de onderstaande waarden om in te vullen bij <strong>sidebar=""</strong>:
						<br/>
						<div style="width: 70px; float: left;">0</div> = Bovenkant<br/>
						<div style="width: 70px; float: left;">1</div> = Zijkant
						<br/><br/>
						
						<h3>Contractduur</h3>
						In de sidebar kunnen standaard een aantal waarden van het contractduur aangevinkt zijn. Het is mogelijk om meerdere jaren te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>duur="1,2,5"</strong>. Wil je alles aangevinkt hebben dan kun je <strong>duur="all"</strong> gebruiken. <br/>
						<i>1, 2, 3, 4, 5</i>
						<br/><br/>
						
						<h3>Duurzaam</h3>
						In de sidebar kun je filteren op duurzaamheid. Je kunt drie soorten van duurzaamheid selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>duurzaam="groen,gemengd"</strong>. Wil je alles aangevinkt hebben dan kun je <strong>duurzaam="all"</strong> gebruiken. De onderstaande waarden kunnen hier ingevuld worden:<br/>
						<i>groen, grijs, gemengd</i>
						<br/><br/>
						
						<h2>Verbruik instellen</h2>
						<hr style="border:1px solid #ccc;">
						<h3>Huis</h3>
						Standaard kan het verbuik ingesteld worden aan de hand van het soort huis. De volgende opties kunnen ingevuld worden in <strong>huis=""</strong>:
						<br/>
						<i>appartement, tussenwoning, hoekwoning, vrijstaand</i>
						<br/><br/>
						
						<h3>Personen</h3>
						Standaard kan het verbuik ingesteld worden aan de hand van het aantal personen in een huishouden. De volgende opties kunnen ingevuld worden in <strong>personen=""</strong>:
						<div style="width: 170px; float: left;">enkel</div> <br/><br/>
						<div style="width: 170px; float: left;">duo</div> <br/>
						<div style="width: 170px; float: left;">familie_klein</div> <i>(Gezin van 3 personen)</i><br/>
						<div style="width: 170px; float: left;">familie_middel</div> <i>(Gezin van 4 personen)</i><br/>
						<div style="width: 170px; float: left;">familie_groot</div> <i>(Gezin van 5 personen)</i><br/>
						<br/>
						
						<h3>Meter</h3>
						Standaard kan het verbuik ingesteld worden aan de hand van de soort meter. De volgende opties kunnen ingevuld worden in <strong>meter=""</strong>:<br/>
						<i>enkel, dubbel</i>
						<br/><br/>		
						
						Er zijn nog meer opties die gebruikt kunnen worden. Gebruik de <a href="http://www.daisycon.com/nl/tools/energievergelijker/" target="_blank">generator</a> als je meer opties wil hebben.';
										
		echo $output;
	}
	
	public function energyAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'energie', 'http://developers.affiliateprogramma.eu/Energievergelijker/general.js');
			
			// Register stylesheet files
			wp_register_style('stylesheet_energie', 'http://developers.affiliateprogramma.eu/Energievergelijker/style.css');
		
			// Add all files to head
			wp_enqueue_script( 'energie' );
			wp_enqueue_style( 'stylesheet_energie' );
					
			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}
			
			if( empty($array['duur']) ){
				$array['duur'] = 'all';
			}
			
			if( empty($array['amount']) ){
				$array['amount'] = '10';
			}
			
			if( empty($array['duurzaam']) ){
				$array['duurzaam'] = 'all';
			}
			
			if( empty($array['sidebar']) ){
				$array['sidebar'] = 1;
			}
			
			if( empty($array['huis']) ){
				$array['huis'] = 'Appartement';
			}
						
			if( empty($array['personen']) ){
				$array['personen'] = 'enkel';
			}
			
			if( empty($array['meter']) ){
				$array['meter'] = 'enkel';
			}
						
			// Add comparator
			$result = '<script type="text/javascript">
							daisyconEnergyMediaID='.$array['mediaid'].';
							daisyconEnergySubID="";
							daisyconEnergyActionPackets="all";
							daisyconEnergyPackets="all";
							daisyconEnergyCompanies="'.$array['programs'].'";
							daisyconEnergyDuration="'.$array['duur'].'";
							daisyconEnergyDuurzaam="'.$array['duurzaam'].'";
							daisyconEnergyView="all";
							daisyconEnergyUrl="";
							daisyconEnergyAmount="'.$array['amount'].'";
							daisyconEnergySidebar="'.$array['sidebar'].'";
							daisyconEnergyHouse="'.$array['huis'].'";
							daisyconEnergyPersons="'.$array['personen'].'";
							daisyconEnergyMeter="'.$array['meter'].'";
							daisyconEnergyviewColums="1,1,1,1,1,1";
							daisyconEnergyColor="00A6DA";
							daisyconEnergyTextColor="FFFFFF";
							daisyconEnergyActionColor="FF8201";
						</script>';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="daisyconEnergyComparator">
								<div id="daisyconEnergyFilters"></div>
								<div id="daisyconEnergyTableContainer"></div>
							</div>';
		}
			
		return($result);
	}
}
?>