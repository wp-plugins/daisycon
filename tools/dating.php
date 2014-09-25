<?php 
/* Daisycon prijsvergelijkers
 * File: dating.php
 * 
 * View for the shorttags to be displayed on the website
 * 
 */

class generalDating{

	public function adminDating(){
		
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
							
							jQuery.ajax
							({
								url: "http://developers.affiliateprogramma.eu/wordpressplugin/json.php?method=insertMenuVergelijker&website='.base64_encode($_SERVER['SERVER_NAME']).'&mediaid='.$mediaid.'&item=dating&jsoncallback=?",
								dataType: "jsonp",
								cache: false,
								success: function(html)
								{
								} 
							});
					</script>
		';
		
		$output .= 	'	<div style="width:900px;">
						<img src="http://www.daisycon.com/shared/daisyconwebsite/img/layout/blog/publish-tools_vakantievergelijker_paxz_100.png" alt="" title="" style="float:left;margin-right:20px;" /> <h1>Daisycon Datingsitevergelijker</h1>
						Daisycon heeft exclusief voor haar publishers een gratis datingsitevergelijker ontwikkeld. De tool is eenvoudig te installeren en stelt de bezoekers van jouw website in staat een groot aanbod van dating websites te bekijken en vergelijken. 
						<br/><br/>
						Plak onderstaande shorttag in je blogpost of pagina en de vergelijker verschijnt direct op je website. <a href="http://vergelijkers.daisycon.com/datingsitevergelijker/" target="_blank">Klik hier om de demowebsite te bekijken</a>.
						<br/><br/>
						<h1>Standaardgebruik</h1>
						Vul je <a href="http://www.daisycon.com/nl/faq/publishers/affiliate_marketing/waar_vind_ik_mijn_media_id/" target="_blank" title="Waar vind ik mijn Media ID?">Media ID</a> op de plek van XXXXX in. Je Media ID kun je ook opslaan, zodat hij standaard wordt ingevuld. Dit doe je bij het menu-item <a href="admin.php?page=daisycontools">Introductie</a>. Je kunt indien gewenst een <a href="http://www.daisycon.com/nl/blog/hoe_gebruik_je_sub_ids/" target="_blank">Sub ID</a> invullen.
						<br/><br/>
							
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_dating mediaid="'.$mediaid.'" subid=""]
						</div>					
						
						<p>&nbsp;</p>
					
						<h1>Geavanceerd gebruik</h1>
						<div onclick="select_all(this)" style="cursor:pointer;width:800px;text-align: center; border: 1px solid #cecece; background: #f3f3f3; color: #333333; padding: 5px; margin-bottom: 10px; border-radius: 5px;" >	
							[daisycon_dating mediaid="'.$mediaid.'" subid=""]
						</div>	
						
						<h3>Voorkeur</h3>
						<strong>Gebruik de onderstaande optie om in te stellen wat de gefilterde orientatie is. Het is mogelijk om &eacute;&eacute;n van de onderstaande te gebruiken:</strong>
						<div style="width:401px;">
							<div style="width:200px;float:left;">Man op zoek naar een vrouw</div> <span style="float:left;margin-left:50px;">orientation="m2f"</span>
							<div style="width:200px;float:left;">Vrouw op zoek naar een man</div> <span style="float:left;margin-left:50px;">orientation="f2m"</span>
							<div style="width:200px;float:left;">Man op zoek naar een man</div> <span style="float:left;margin-left:50px;">orientation="m2m"</span>
							<div style="width:200px;float:left;">Vrouw op zoek naar een vrouw</div> <span style="float:left;margin-left:50px;">orientation="f2f"</span>
						</div>
						
						<div style="clear:both;"><br/></div>
						
						<h2>Filters</h2>
						
						De onderstaande opties zijn allemaal in combinatie met elkaar te gebruiken. Het betreft hier de filters in de datingsitevergelijker. Iedere optie heeft twee mogelijkheden: <strong>yes</strong> en <strong>no</strong>
						
						<h3>Wat zoek je?</h3>
						<div style="width:200px;float:left;">Algemeen</div><span style="float:left;margin-left:50px;">general="yes"</span><br/>
						<div style="width:200px;float:left;">Alleenstaande ouders</div><span style="float:left;margin-left:50px;">singleparents="yes"</span><br/>
						<div style="width:200px;float:left;">Christelijk</div><span style="float:left;margin-left:50px;">christian="yes"</span><br/>
						<div style="width:200px;float:left;">Homoseksueel/Biseksueel</div><span style="float:left;margin-left:50px;">gay="yes"</span><br/>
						<div style="width:200px;float:left;">Hoger opgeleid</div><span style="float:left;margin-left:50px;">highlyeducated="yes"</span><br/>

						<h3>Intenties</h3>
						<div style="width:200px;float:left;">Daten</div><span style="float:left;margin-left:50px;">dating="yes"</span><br/>
						<div style="width:200px;float:left;">Relatie</div><span style="float:left;margin-left:50px;">relationship="yes"</span><br/>
						<div style="width:200px;float:left;">Sex</div><span style="float:left;margin-left:50px;">sex="yes"</span><br/>
						<div style="width:200px;float:left;">Vreemdgaan</div><span style="float:left;margin-left:50px;">cheating="yes"</span><br/>
						<div style="width:200px;float:left;">Vriendschap</div><span style="float:left;margin-left:50px;">friendship="yes"</span><br/>
		
						<h3>Opties</h3>
						<div style="width:200px;float:left;">App beschikbaar</div><span style="float:left;margin-left:50px;">app="yes"</span><br/>
						<div style="width:200px;float:left;">Videochat mogelijk</div><span style="float:left;margin-left:50px;">videochat="yes"</span><br/>
						<div style="width:200px;float:left;">Persoonlijkheidstest</div><span style="float:left;margin-left:50px;">personality="yes"</span><br/>
						<div style="width:200px;float:left;">Veilig daten keurmerk</div><span style="float:left;margin-left:50px;">safedating="yes"</span><br/>
						<div style="width:200px;float:left;">Mobiele pagina</div><span style="float:left;margin-left:50px;">mobile="yes"</span><br/>
						<div style="width:200px;float:left;">Georganiseerde evenementen</div><span style="float:left;margin-left:50px;">events="yes"</span><br/>
						<br/><br/>
						
						Geavanceerd zal nog worden aangevuld. Gebruik de <a href="http://www.daisycon.com/nl/tools/vakantietool/" target="_blank">generator</a> als je meer opties wil hebben.';
						
				
		echo $output;
	}
	
	public function datingAdv($array){

		if($array['mediaid'] == 'XXXXX' || $array['mediaid'] == 'test' || empty($array['mediaid']) ){	
			$result = 'Vul je Media ID in.';	
		}
		else
		{
			// Register jQuery files
			wp_register_script( 'dating', 'http://developers.affiliateprogramma.eu/datingsitevergelijker/vergelijker.js');
			
			// Register stylesheet files
			wp_register_style('stylesheet_dating', 'http://developers.affiliateprogramma.eu/datingsitevergelijker/example.css');
		
			// Add all files to head
			wp_enqueue_script( 'dating' );
			wp_enqueue_style( 'stylesheet_dating');
									
			$result = '';
			if(!empty( $array['title'] )){
				$result .= '	<h2>'.$array['title'].'</h2>';
			}

			$variable_array = array('app', 'videochat', 'personality', 'safedating', 'mobile', 'events', 'dating', 'relationship', 'sex', 'cheating', 'friendship', 'seniors', 'general', 'singleparents', 'christian', 'gay', 'highlyeducated', 'youth');

			foreach ($variable_array as $value)
			{
				if(empty($array[$value]))
				{
					$array[$value] = 'no';				
				}			
			}

			if( empty($array['orientation']) ){
				$array['orientation'] = 'm2f';
			}
			if( empty($array['age']) ){
				$array['age'] = '';
			}
			if( empty($array['programs']) ){
				$array['programs'] = 'all';
			}
			if( empty($array['float']) ){
				$array['float'] = 'left';
			}

			$result .= '<div class="daisycon-dating-comperator" data-mediaID="'.$array['mediaid'].'" data-subid="'.$array['subid'].'" data-app="'.$array['app'].'" data-videochat="'.$array['videochat'].'" data-personality="'.$array['personality'].'" data-safeDating="'.$array['safedating'].'" data-mobile="'.$array['mobile'].'" data-events="'.$array['events'].'" data-dating="'.$array['dating'].'" data-relationship="'.$array['relationship'].'" data-sex="'.$array['sex'].'" data-cheating="'.$array['cheating'].'" data-friendship="'.$array['friendship'].'" data-general="'.$array['general'].'" data-single_parents="'.$array['singleparents'].'" data-christian="'.$array['christian'].'" data-gay="'.$array['gay'].'" data-highly_educated="'.$array['highlyeducated'].'" data-youth="'.$array['youth'].'" data-seniors="'.$array['seniors'].'" data-orientation="'.$array['orientation'].'" data-age="'.$array['age'].'" data-programs="'.$array['programs'].'" data-float="'.$array['float'].'" data-button="D81B62" data-button-shadow="7A0E37" data-button-border="FFFFFF" data-button-text="Bekijken"></div>';

			return($result);
		}
	}
}
?>