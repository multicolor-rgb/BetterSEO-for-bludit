<?php
    class BetterSEO extends Plugin {

        public function init(){
            $this->dbFields = array(
        'geocheck'=> '',
    'facebookcheck'=>'',
         'dublincheck'=>'',
         'dublin'=>'',
         'favx'=>'',
            );
        }


        public function form(){
            $folder        = PATH_CONTENT.'betterSEO'.DS;
            $geocodefile     = $folder . 'geocode.txt';

            $html = '
		<style>
        .seoguy{
            background:#fafafa;
            border:solid 1px #ddd;
            padding:20px;
            box-sizing:border-box;
            display:block;
            width:100%;
        }

        .seoguy p{
            margin:0;
            margin-bottom:10px;
            margin-top:10px;
        }

        .seoguy hr{
            border:none;
            border-bottom:dotted 1px rgba(0,0,0,0.6);
            margin:20px 0;
        }

        .seoguy textarea,input{
            border:solid 1px rgba(0,0,0,0.3);
            border-bottom:solid 3px green;
        }

        .seoguy textarea{
            box-sizing:border-box;
            width:100%;
        }
        
        .checkbox-circle{
            width:15px;
            height:15px;
            background:#fff;
            display:block;
            border-radius:50%;
            transition:all 250ms linear;
        }

        .seoguy input[type="checkbox"]  + .checkbox{
        
            width:60px;
            height:25px;
            border-radius:15px;
            background:red;
            display:block;
            padding:5px;
            box-sizing:border-box;
            margin-bottom:10px;
        }

        .seoguy input[type="checkbox"]:checked + .checkbox{
            content:"sd";
            background:green;
            display:block;
        }

        input[type="checkbox"]:checked + .checkbox .checkbox-circle{
            margin-left:35px;
        }

        .seoguy input[type="checkbox"]{
            display:none;

        }

         .leader{
            font-size:0.9rem;
            font-style:italic;
            color:rgba(0,0,0,0.6);
        }

        .seoguy h3{
            margin:0;
        }

        .seoguy .submit{
            width:200px;
            height:40px;
            display:block;
            padding:10px;
            text-align:center;
            margin-top:20px;
        }

        .tab{
            width:100%;
            height:50px;
            border-bottom:solid 1px #ddd;
            display:flex;
            margin-bottom:20px;
        }

        .tab-item{
            width:100px;
            height:50px;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
        }

        .tab-item-active{
            border:solid 1px #ddd;
            border-bottom:solid 1px #fff;	
        }

        .tab-item p{
            margin:0;
            padding-bottom:5px;
        }

        .tab-item-active p{
            border-bottom:solid 3px green;	
        }

        .seocode{background:#fafafa;color:rgba(0,0,0,0.8);width:100%;border:solid 1px #ddd;display:block;padding:15px;box-sizing:border-box;border-left:solid 5px green;font-style:italic;}


        .ul-linker{
list-style-type:none;
margin:0 !important;
padding:0;


        }

        .ul-linker li{
            padding:10px;border-bottom:solid 1px #ddd;
        }

        .ul-linker li:nth-child(2n){
            background:#fafafa;
        }

        .seoguy-select{
            width:100%;
            padding:10px;
            border:solid 1px rgba(0,0,0,0.3);
background:#fff;
margin-top:10px;
border-bottom:solid 3px green;

        }
		</style>


		<div class="tab">

			<div class="tab-item tab-item-active"><p>Setup</p></div>
			<div class="tab-item"><p>Help</p></div>

		</div>

		<div class="tab-content-1">
		
			<div class="seoguy">
 

			<h3>GeoLocation</h3>

			<p class="leader">GeoLocation (Visit generator  <a target="_blank" href="https://www.geo-tag.de/generator/en.html">here</a>.)</p>

	 

               
            <select name="geocheck">
            <option value="on" '.($this->getValue('geocheck')==="on"?"selected":"").'>On</option>
            <option value="off" '.($this->getValue('geocheck')==="off"?"selected":"").'>Off</option>
            
            </select>
            <br>

			<textarea name="geocode" style="height:150px">'.@file_get_contents($geocodefile).'</textarea>
			
			<hr>
			<h3 style="margin-top:20px;">Facebook</h3>
			<p class="leader">Open Graph protocol (for FB etc.)</p>
		
            <select name="facebookcheck">
            <option value="on" '.($this->getValue('facebookcheck')==="on"?"selected":"").'>On</option>
            <option value="off" '.($this->getValue('facebookcheck')==="off"?"selected":"").'>Off</option>
            
            </select>

		 
			<hr>
			<br>
			
			<h3>Dublin Core</h3>
			<p class="leader">Metadata Element Set</p>
			
		 
            
            <select name="dublincheck">
            <option value="on" '.($this->getValue('dublincheck')==="on"?"selected":"").'>On</option>
            <option value="off" '.($this->getValue('dublincheck')==="off"?"selected":"").'>Off</option>
            
            </select>

			<p>Lang. code:</p>
			<input type="text" style="width:100%;padding:10px;box-sizing:border-box;" name="dublin" placeholder="en" value="'.$this->getValue('dublin').'">

			<hr>

			<h3 style="margin-top:20px;"> Favicons</h3>
			<p class="leader"> Favicons (icons need to be included in a folder named "fav" within your themes dir.)</p>

	
            
            <select name="favx">
            <option value="on" '.($this->getValue('favx')==="on"?"selected":"").'>On</option>
            <option value="off" '.($this->getValue('favx')==="off"?"selected":"").'>Off</option>
            
            </select>


			<hr>

 			</div>

		</div>

		<div class="tab-content-2">



			<h3>More Info:</h4>

			<ul class="leader ul-linker">	
				<li>GeoLocation Meta Tags / Geotagging. Used for custom results in Google. Generator <a href="https://www.geo-tag.de/generator/en.html" target="_blank">here.</a></li>
				<li>Open Graph protocol, more info <a href="https://ogp.me/" target="_blank">here.</a></li>
				<li>Dublin Core Metadata, more info <a href="http://purl.org/dc/elements/1.1/" target="_blank">here.</a></li>
				<li>Favicons. Generator <a href="https://www.favicon-generator.org/" target="_blank">here.</a></li>
			</ul>

		</div>

		<script>
		document.querySelector(".tab-content-2").style.display="none";

		document.querySelectorAll(".tab-item")[0].addEventListener("click",(e)=>{

			e.preventDefault();

			document.querySelectorAll(".tab-item").forEach(x=>{x.classList.remove("tab-item-active")});
			document.querySelectorAll(".tab-item")[0].classList.add("tab-item-active");
			document.querySelector(".tab-content-1").style.display="block";

			document.querySelector(".tab-content-2").style.display="none";

		});

		document.querySelectorAll(".tab-item")[1].addEventListener("click",(e)=>{

			e.preventDefault();

			document.querySelectorAll(".tab-item").forEach(x=>{x.classList.remove("tab-item-active")});
			document.querySelectorAll(".tab-item")[1].classList.add("tab-item-active");
			document.querySelector(".tab-content-1").style.display="none";
			document.querySelector(".tab-content-2").style.display="block";

		});






		</script>
		
		<div style="padding:20px;text-align:center;box-sizing:border-box;background:#C21010;color:#fff;margin-top:20px;" id="paypal">

			<p>If you want support my work, and you want to see new plugins:) </p>

			<a href="https://www.paypal.com/donate/?hosted_button_id=TW6PXVCTM5A72">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"  />
			</a>

			
 		</div>
		';

        	
	return $html;
          
        }


        public function siteHead(){
global $page;
global $site;
 
            
$folder        = PATH_CONTENT.'betterSEO'.DS;
$geocodefile      = $folder . 'geocode.txt';


		$seo = '';

		if($this->getValue('geocheck')=='on'){
		$seo .='
		<!-- GeoLocation Meta Tags / Geotagging. Used for custom results in Google. Generator here https://www.geo-tag.de/generator/en.html -->
		'.@file_get_contents($geocodefile).'
        <!-- GeoLocation Meta Tags end -->
        
        ';           ;
		
		};

		if($this->getValue('facebookcheck')=='on'){

		$imageseo = $this->getValue('fbimage');

			 

		$seo .='
		
		<!-- Facebook, more here https://ogp.me/ 
		=================================================== -->
		<meta property="og:type" content="article">
		<meta property="og:site_name" content="'.$site->title().'">
		<meta property="og:title" content="'.$site->title().'">
		<meta property="og:description" content="'.$page->description().'">
		<meta property="og:url" content="'.$site->url().'">
		<meta property="og:image" content="'.$page->coverImage().'">

        <!-- Facebook, end
		=================================================== -->

		';

		};

		if($this->getValue('dublincheck')=='on'){

		$seo .='
		<!-- Dublin Core Metadata Element Set
		=================================================== -->
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
		<meta name="DC.Format" content="text/html" />
		<meta name="DC.Type" content="article" />
		<meta name="DC.Language" content="'.$this->getValue('dublin').'" />
		<meta name="DC.Title" content="'.$page->title().'|'.$site->title().'" />
		<meta name="DC.Creator" content="'.$page->description().'"/>
		<meta name="DC.Date" content="'.$page->date().' +0000">

        <!-- Dublin End
		=================================================== -->


		';

		};

		if($this->getValue('favx')=='on'){

		$seo .='
		<!-- Favicons. Generator here: https://www.favicon-generator.org/ 
		=================================================== -->
		<link rel="icon" type="image/png" sizes="36x36" href="'.DOMAIN_THEME.'fav/android-icon-36x36.png">
		<link rel="icon" type="image/png" sizes="48x48" href="'.DOMAIN_THEME.'fav/android-icon-48x48.png">
		<link rel="icon" type="image/png" sizes="72x72" href="'.DOMAIN_THEME.'fav/android-icon-72x72.png">
		<link rel="icon" type="image/png" sizes="96x96" href="'.DOMAIN_THEME.'fav/android-icon-96x96.png">
		<link rel="icon" type="image/png" sizes="144x144" href="'.DOMAIN_THEME.'fav/android-icon-144x144.png">
		<link rel="icon" type="image/png" sizes="192x192" href="'.DOMAIN_THEME.'fav/android-icon-192x192.png">
		
		<link rel="apple-touch-icon" sizes="192x192" href="'.DOMAIN_THEME.'fav/apple-icon.png">
		<link rel="apple-touch-icon" sizes="57x57" href="'.DOMAIN_THEME.'fav/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="'.DOMAIN_THEME.'fav/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="'.DOMAIN_THEME.'fav/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="'.DOMAIN_THEME.'fav/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="'.DOMAIN_THEME.'fav/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="'.DOMAIN_THEME.'fav/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="'.DOMAIN_THEME.'fav/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="'.DOMAIN_THEME.'fav/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="'.DOMAIN_THEME.'fav/apple-icon-180x180.png">
		<link rel="apple-touch-icon" sizes="192x192" href="'.DOMAIN_THEME.'fav/apple-icon-precomposed.png">
		
		<link rel="shortcut icon" type="image/x-icon" href="'.DOMAIN_THEME.'fav/favicon.ico" />
		<link rel="icon" type="image/png" sizes="16x16" href="'.DOMAIN_THEME.'fav/favicon-16x16.png">
		<link rel="icon" type="image/png" sizes="32x32" href="'.DOMAIN_THEME.'fav/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="'.DOMAIN_THEME.'fav/favicon-96x96.png">
		
		<meta name="msapplication-TileImage" content="'.DOMAIN_THEME.'fav/ms-icon-70x70.png">
		<meta name="msapplication-TileImage" content="'.DOMAIN_THEME.'fav/ms-icon-144x144.png">
		<meta name="msapplication-TileImage" content="'.DOMAIN_THEME.'fav/ms-icon-150x150.png">
		<meta name="msapplication-TileImage" content="'.DOMAIN_THEME.'fav/ms-icon-310x310.png"> 
		';

		};

		echo $seo;


        }


        public function post(){
            parent::post();
$data = $_POST['geocode'];
 $folder        = PATH_CONTENT.'betterSEO'.DS;
$filename      = $folder . 'geocode.txt';
$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);
 
if ($folder_exists) {
  file_put_contents($filename, $data);

}


        }

    }
?>