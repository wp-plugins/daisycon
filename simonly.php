<?php 
/* Daisycon prijsvergelijkers
 * File: simonly.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalSim{

	public function adminSimonly(){
		
		global $wpdb;
		
		$cMediaid = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix."daisycon_tools");
		
		if (count($cMediaid) == 0){
			$mediaid = 'XXXXX';
		}else{
			$mediaid = $cMediaid->media_id;
		}
		
		$output = 	'<div style="width:900px;">
					<img src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/simonly_affiliate_tools.gif" alt="" title="" style="float:left;margin-right:20px;" />  <h1>Daisycon Sim only-vergelijker</h1>
					Daisycon heeft exclusief voor haar publishers een gratis Sim only-vergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende sim only-abonnementen met elkaar te vergelijken.
					<br/><br/>
					Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://mobielvergelijker.affiliateprogramma.eu/sim-only-vergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
					<br/><br/>
					<h1>Standaardgebruik</h1>
					Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in en vul indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank" title="Wat is een SubID?">SubID</a> in. Het SubID wordt automatisch gevuld met het de provider, het aantal belminuten, SMS-jes, MB&#39;s en de prijs van het abonnement. Daarachter is ruimte voor je eigen SubID (max 12 tekens). Bij amount vul je het aantal resultaten in: <strong>5, 10, 25 of 50</strong>
					<br/><br/>
						
					<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
						[daisycon_simonly mediaid="'.$mediaid.'" amount="10" subid=""]
					
					</div>					
					';
		
		wp_register_script( 'generalSim', 'http://developers.affiliateprogramma.eu/mobielvergelijker/general.js');
		
		$output .= 	'
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
					
					function getProviders()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=simProviders&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_providers").html(data); 
											
							}
						});
					}
					
					function getPrograms()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=simPrograms&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_programs").html(data); 
											
							}
						});
					}
					
					jQuery(document).ready(function() {
						getProviders();
						getPrograms();
					});	
					</script>
					
					
					';
		
		$output .= 	'
					<p>&nbsp;</p>
		
					<h1>Geavanceerd gebruik</h1>
					
							
					<br/>
					
					<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;">
					
						[daisycon_simonly mediaid="'.$mediaid.'" amount="10" subid="" provider="all" duration="all" programs="all" minsms="0" maxsms="2500" minmin="0" maxmin="2500" minint="0" maxint="6500" minab="0" maxab="100"]
					
					</div>
					
					<p>&nbsp;</p>
					
					<h3>Filtereigenschappen</h3>
					Standaard worden de filters ingesteld op 0 t/m 2500 belminuten, 0 t/m 6500MB internet en 0 t/m 2500 SMS&#39;jes. Deze waarden komen overeen met onbeperkt. De min/max abonnement- en toestelprijs is niet ingevuld. Deze standaardwaarden kan je hieronder aanpassen. Door hiermee te spelen kan je je bezoekers direct de beste aanbieding tonen. 
					<br/>
					<div style="width:130px; float:left;"><u>SMS</u></div><div style="width:130px; float:left;">minsms - maxsms</div> =&nbsp; 0 t/m 2500<br/>
					<div style="width:130px; float:left;"><u>Minuten</u></div><div style="width:130px; float:left;">minmin - maxmin</div> =&nbsp; 0 t/m 2500<br/>
					<div style="width:130px; float:left;"><u>Internet</u></div><div style="width:130px; float:left;">minint - maxint</div> =&nbsp; 0 t/m 6500<br/>
					<div style="width:130px; float:left;"><u>Abonnementsprijs</u></div><div style="width:130px; float:left;">minab - maxab</div> =&nbsp; 0 t/m 100
					<br/><br/>
					<h3>Titel van de Sim only-vergelijker</h3>
					Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
					<br/><br/>				
					<h3>Contractduur</h3>
					Gebruik de onderstaande aantal maanden om in te vullen bij <strong>duration=""</strong>. Als je op zowel 12 als 24 maanden wilt zoeken gebruik je <strong>duration="all"</strong>.<br/>
					<i>1, 12, 24</i>
					<br/><br/>				
					<h3>Providers</h3>
					Gebruik de onderstaande namen om in te vullen bij <strong>provider=""</strong>. Het is alleen mogelijk om &eacute;&eacute;n provider te selecteren. Als je alle providers wilt gebruik je <strong>provider="all"</strong>.  <br/>
					<div id="custom_providers"></div>
					<br/>
					<h3>Programma&#39;s</h3>
					Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>&programs="77,496,671"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.<br/>
					<div id="custom_programs"></div>
						
		
					';
		
		echo $output;
	}
	
	
	public function simonlyAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'ui_sim', 'http://developers.affiliateprogramma.eu/Simonlyvergelijker/jquery.nouislider.min.js');
			wp_register_script( 'general_sim', 'http://developers.affiliateprogramma.eu/Simonlyvergelijker/general.js');
	
			// Register stylesheet files
			wp_register_style('stylesheet1_sim', 'http://developers.affiliateprogramma.eu/Simonlyvergelijker/style.css');
			wp_register_style('stylesheet2_sim', 'http://developers.affiliateprogramma.eu/Simonlyvergelijker/nouislider.fox.css');
	
			// Add all files to head
			wp_enqueue_script( 'general_sim' );
			wp_enqueue_script( 'ui_sim' );
			wp_enqueue_style( 'stylesheet1_sim');
			wp_enqueue_style( 'stylesheet2_sim' );
			
			if( empty($array['amount']) ){
				$array['amount'] = 10;
			}
			
			if( empty($array['provider']) ){
				$array['provider'] = 'all';
			}
			
			if( empty($array['duration']) ){
				$array['duration'] = 'all';
			}
			
			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}
			
			if( empty($array['minsms']) ){
				$array['minsms'] = 0;
			}
			
			if( empty($array['maxsms']) ){
				$array['maxsms'] = 2500;
			}
			
			if( empty($array['minmin']) ){
				$array['minmin'] = 0;
			}
			
			if( empty($array['maxmin']) ){
				$array['maxmin'] = 2500;
			}
			
			if( empty($array['minint']) ){
				$array['minint'] = 0;
			}
			
			if( empty($array['maxint']) ){
				$array['maxint'] = 6500;
			}
			
			if( empty($array['minab']) ){
				$array['minab'] = 0;
			}
			
			if( empty($array['maxab']) ){
				$array['maxab'] = 100;
			}
					
			// Add comparator
			$result = '	<script type="text/javascript">
							var daisyconSimonlyMediaId='.$array['mediaid'].';
							var daisyconSimonlySubId="'.$array['subid'].'";
							var daisyconSimonlyLimit='.$array['amount'].';
							var daisyconSimonlyProviders="'.$array['provider'].'";
							var daisyconSimonlyDuration="'.$array['duration'].'";
							var daisyconSimonlyPrograms="'.$array['programs'].'";
							var daisyconSimonlyActionColor="FF8201";
							var daisyconSimonlyButton="Bekijken";
							var daisyconSimonlyMinAb="'.$array['minab'].'";
							var daisyconSimonlyMaxAb="'.$array['maxab'].'";
							var daisyconSimonlyMinMin="'.$array['minmin'].'";
							var daisyconSimonlyMaxMin="'.$array['maxmin'].'";
							var daisyconSimonlyMinSms="'.$array['minsms'].'";
							var daisyconSimonlyMaxSms="'.$array['maxsms'].'";
							var daisyconSimonlyMinInternet="'.$array['minint'].'";
							var daisyconSimonlyMaxInternet="'.$array['maxint'].'";
						</script>';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="daisyconSimonlyComperator" style="background-color:#FFFFFF !important;"></div>';
		}
			
		return($result);
	}
}
?>