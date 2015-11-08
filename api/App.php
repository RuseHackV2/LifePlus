<?php	
	
	/**		
		* App class		
	*/	
	session_start();	
	
	class App {		
		
		/** Function that gets nearby venues			
			* @param $city			
			* @param $query			
			* @return string			
		*/		
		public static function getNearVenue($city, $query) {			
			require('config.php');			
			$url = $fsURL . "/explore" . "?client_id=" . $foursquareId . "&client_secret=" . $foursquareSecret . "&near=" . $city . "&query=" . $query . "&v=20151107" . "&m=foursquare";			
			
			$venuesList = self::doGet($url);			
			$venueData = array();			
			foreach ($venuesList['response']['groups'][0]['items'] as $venueObj) {				
				
				$tmpVenueData = array(				
                "id" => $venueObj['venue']['id'],				
                "name" => $venueObj['venue']['name'],				
                "address" => $venueObj['venue']['location']['address'],				
                "lat" => $venueObj['venue']['location']['lat'],				
                "lng" => $venueObj['venue']['location']['lng'],				
                "city" => $venueObj['venue']['location']['city'],				
                "country" => $venueObj['venue']['location']['country'],				
                "rating" => $venueObj['venue']['rating'],				
                "isOpen" => $venueObj['venue']['hours']['isOpen'],				
                "photourl" => $venueObj['tips'][0]['photourl'],				
                "canonicalUrl" => $venueObj['tips'][0]['canonicalUrl'],				
                "text" => $venueObj['tips'][0]['text']				
				);				
				
				array_push($venueData, $tmpVenueData);				
			}			
			
			return json_encode($venueData);			
		}		
		
		/**			
			* Function that post to APIs and get data			
			* @param $url			
			* @return mixed			
		*/		
		public static function doGet($url) {			
			$obj = json_decode(file_get_contents($url), true);			
			return $obj;			
		}		
		
	}	
	
	if ($_GET['get'] && $_GET['get'] == "data") {		
		if ($_GET['city']) {			
			$city = $_GET['city'];			
			} else {			
			$city = 'Bulgaria';			
		}		
		
		if ($_GET['query']) {			
			$query = $_GET['query'];			
			} else {			
			$query = 'healthy';			
		}		
		
		$venuesList = App::getNearVenue($city, $query);		
		echo $venuesList;		
	}	
	
	if ($_POST['picUrl']) {
		$_SESSION['picUrl'] = "images/sample-avatar.jpg";
		if ($_POST['picUrl'] != "") {
			$_SESSION['picUrl'] = $_POST['picUrl'];
		}
	}
	
	if ($_POST['name']) {
		if ($_POST['name'] == "undefined") {
			$_SESSION['name'] = "Не сте влезли!";
			} else {
			$_SESSION['name'] = $_POST['name'];
		}
	}					