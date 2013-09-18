<?php 
/* Daisycon prisjvergelijkers
 * File: telecom.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalCom{

	public function adminTelecom(){
		
		$output = 	'<div style="width:900px;">
					<img src="http://images.daisycon.net/daisycon_website/daisyconwebsite/img/layout/blog/telecomver_publishtools_100x100.gif" alt="" title="" style="float:left;margin-right:20px;" /><h1>Daisycon telecomvergelijker</h1>
					Daisycon heeft exclusief voor haar publishers een gratis telecomvergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat verschillende telefoonabonnementen met elkaar te vergelijken.
					<br/><br/>
					Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://mobielvergelijker.affiliateprogramma.eu/telecomvergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
					<br/><br/>
					<h1>Standaardgebruik</h1>
					Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in en vul indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank" title="Wat is een SubID?">SubID</a> in. Het SubID wordt automatisch gevuld met het model en de provider. Daarachter is ruimte voor je eigen SubID (max 12 tekens). Bij amount vul je het aantal resultaten in: <strong>5, 10, 25 of 50</strong>
					<br/><br/>
						
					<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
						[daisycon_telecom mediaid="XXXXX" amount="10" subid=""]
					
					</div>					
					';
		
		wp_register_script( 'general', 'http://developers.affiliateprogramma.eu/mobielvergelijker/general.js');
		
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
					
					function getMobiles()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=wpMobiles&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_mobiles").html(data); 
											
							}
						});
					}
					
					function getBrands()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=wpBrands&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_brand").html(data); 
											
							}
						});
					}
					
					function getProviders()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=wpProviders&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_provider").html(data); 
											
							}
						});
					}
					
					function getPrograms()
					{	 
						jQuery.ajax({
							url: "http://developers.affiliateprogramma.eu/mobielvergelijker/includes/data.php?method=wpPrograms&jsoncallback=?",
							dataType: "jsonp",
							async: true,
							success: function(data){
								
								jQuery("#custom_programs").html(data); 
											
							}
						});
					}
					
					jQuery(document).ready(function() {
						getBrands();
						getProviders();
						getMobiles();
						getPrograms();
					});	
					</script>
					
					
					';
		
		$output .= 	'
					<p>&nbsp;</p>
		
					<h1>Geavanceerd gebruik</h1>
					
							
					<br/>
					
					<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;">
					
						[daisycon_telecom mediaid="XXXXX" amount="10" subid="" provider="0" mobiles="all" duration="24" programs="all" minmob="0" maxmob="1000" minmin="100" maxmin="500" minint="200" maxint="5000" minab="0" maxab="100"]
					
					</div>
					
					<p>&nbsp;</p>
					
					<h3>Filtereigenschappen</h3>
					Standaard worden de filters ingesteld op 100 belminuten en 200MB internet. De min/max abonnement- en toestelprijs is niet ingevuld. Deze standaardwaarden kan je hieronder aanpassen. Door hiermee te spelen kan je je bezoekers direct de beste aanbieding tonen. Ook voorkom je dat je b.v. een iPhone abonnement zonder internet vergelijkt.
					<br/>
					<div style="width:130px; float:left;"><u>Toestelprijs</u></div><div style="width:130px; float:left;">minmob - maxmob</div> =&nbsp; 0 t/m 1000<br/>
					<div style="width:130px; float:left;"><u>Minuten</u></div><div style="width:130px; float:left;">minmin - maxmin</div> =&nbsp; 0 t/m 2000<br/>
					<div style="width:130px; float:left;"><u>Internet</u></div><div style="width:130px; float:left;">minint - maxint</div> =&nbsp; 0 t/m 6000<br/>
					<div style="width:130px; float:left;"><u>Abonnementsprijs</u></div><div style="width:130px; float:left;">minab - maxab</div> =&nbsp; 0 t/m 250
					<br/><br/>
					<h3>Titel van de telecomvergelijker</h3>
					Met de optie <strong>title=""</strong> is het mogelijk om een titel boven de vergelijker te plaatsen. Standaard wordt deze tussen de h2 tags geplaatst. Deze optie is niet verplicht.
					<br/><br/>				
					<h3>Contractduur</h3>
					Gebruik de onderstaande aantal maanden om in te vullen bij <strong>duration=""</strong>. Als je op zowel 12 als 24 maanden wilt zoeken gebruik je <strong>duration="0"</strong>.<br/>
					<i>12, 24</i>
					<br/><br/>				
					<h3>Providers</h3>
					Gebruik de onderstaande namen om in te vullen bij <strong>provider=""</strong>. Het is alleen mogelijk om &eacute;&eacute;n provider te selecteren. Als je alle providers wilt gebruik je <strong>provider="0"</strong>.  <br/>
					<div id="custom_provider"></div>
					<br/>
					<h3>Merken</h3>					
					Gebruik de onderstaande namen om in te vullen bij <strong>mobiles=""</strong>. Het is mogelijk om meerdere merken te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>&mobiles="Apple,HTC,Samsung"</strong>. Als je alle merken wilt gebruik je <strong>mobiles="all"</strong>.<br/>
					<div id="custom_brand"></div>
					</div>
					<br/>
					<h3>Programma&#39;s</h3>
					Gebruik de onderstaande nummers om in te vullen bij <strong>programs=""</strong>. Het is mogelijk om meerdere programma&#39;s te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>&programs="77,496,1783"</strong>. Als je alle programma&#39;s wilt gebruik je <strong>programs="all"</strong>.<br/><br/>
					<div id="custom_programs"></div>
					<br/>
					<h3>Mobiele telefoons</h3>
					Gebruik de onderstaande nummers om in te vullen bij <strong>mobiles=""</strong>. Het is mogelijk om meerdere telefoons te selecteren, dit doe je door komma&#39;s te gebruiken zoals: <strong>&mobiles="159,289,15"</strong>. Als je alle mobiele telefoons wilt gebruik je <strong>mobiles="all"</strong>.<br/><br/>
					<div id="custom_mobiles"></div>
						
		
					';
		
		echo $output;
	}
	
	
	public function telecomAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'ui', 'http://developers.affiliateprogramma.eu/mobielvergelijker/jquery.nouislider.min.js');
			wp_register_script( 'general', 'http://developers.affiliateprogramma.eu/mobielvergelijker/general.js');
	
			// Register stylesheet files
			wp_register_style('stylesheet1', 'http://developers.affiliateprogramma.eu/mobielvergelijker/example.min.css');
			wp_register_style('stylesheet2', 'http://developers.affiliateprogramma.eu/mobielvergelijker/nouislider.fox.css');
	
			// Add all files to head
			wp_enqueue_script( 'general' );
			wp_enqueue_script( 'ui' );
			wp_enqueue_style( 'stylesheet1');
			wp_enqueue_style( 'stylesheet2' );
			
			if( empty($array['amount']) ){
				$array['amount'] = 10;
			}
			
			if( empty($array['provider']) ){
				$array['provider'] = 0;
			}
			
			if( empty($array['duration']) ){
				$array['duration'] = 24;
			}
			
			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}
			
			if( empty($array['minmob']) ){
				$array['minmob'] = 0;
			}
			
			if( empty($array['maxmob']) ){
				$array['maxmob'] = 1000;
			}
			
			if( empty($array['minmin']) ){
				$array['minmin'] = 100;
			}
			
			if( empty($array['maxmin']) ){
				$array['maxmin'] = 500;
			}
			
			if( empty($array['minint']) ){
				$array['minint'] = 200;
			}
			
			if( empty($array['maxint']) ){
				$array['maxint'] = 5000;
			}
			
			if( empty($array['minab']) ){
				$array['minab'] = 0;
			}
			
			if( empty($array['maxab']) ){
				$array['maxab'] = 100;
			}
			
			if( empty($array['mobiles']) ){
				$array['mobiles'] = 'all';
			}
			
			// Add comparator
			$result = '	<script type="text/javascript">
							mediaid="'.$array['mediaid'].'";
							subid="'.$array['subid'].'";
							entry='.$array['amount'].';
							provider="'.$array['provider'].'";
							duration='.$array['duration'].';
							col="1111111";
							programs="'.$array['programs'].'";
							header="FFFFFF";
							background_price="E2F0FB";
							border="ECECEC";
							button_text="Bekijken";
							button_color="FF8300";
							button_hover="FF9E3D";
							button_textcolor="FFFFFF";
							font="Arial";
							slider="3694C7";
							minMob="'.$array['minmob'].'";
							maxMob="'.$array['maxmob'].'";
							minMin="'.$array['minmin'].'";
							maxMin="'.$array['maxmin'].'";
							minInt="'.$array['minint'].'";
							maxInt="'.$array['maxint'].'";
							minAb="'.$array['minab'].'";
							maxAb="'.$array['maxab'].'";
							mobiles="'.$array['mobiles'].'";</script>';
			
		if(!empty( $array['title'] )){
			$result .= '	<h2>'.$array['title'].'</h2>';
		}
		
			$result .= '	<div id="mobile-comparator-wrapper" class="mobile-comparator-wrapper" style="background-color:#FFFFFF !important;"></div>';
		}
			
		return($result);
	}
}
?>