<?php 

/* Spotify Application Client ID and Secret Key */
$client_id     = 'f77925f0471243af97142794fd2efe1d'; 
$client_secret = '75c4616ff46c42468e1f5a0395b14022'; 

/* Get Spotify Authorization Token */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,            'https://accounts.spotify.com/api/token' );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt($ch, CURLOPT_POST,           1 );
curl_setopt($ch, CURLOPT_POSTFIELDS,     'grant_type=client_credentials' ); 
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Authorization: Basic '.base64_encode($client_id.':'.$client_secret))); 

$result=curl_exec($ch);
$json = json_decode($result, true);

/* Get Spotify Artist Photo */
// echo "<pre>";
// exec('curl -i "https://api.spotify.com/v1/search?q=Maycon+%26+Vinicius+&limit=1&type=artist" -H "Accept: application/json" -H "Authorization: Bearer '.$json['access_token'].'" -H "Content-Type: application/json" 2>&1', $pp);
// echo implode("\r\n", $pp);

?>
<style>
	#nav{
		display: inline;
	}
</style>

        <div class="land_wrap">
			
						<div class="land-text_wrap">
							<div class="stripe"><h3>Please turn your device to portrait mode</h3></div>
						</div>
			
						<div class="left_phone_wrap">
							<svg class="left_phone" id="Layer_6" xmlns="http://www.w3.org/2000/svg" width="200" height="110" viewBox="0 0 370 240">
							  <path id="phone_one" class="cls-one" d="M215,33v86a12,12,0,0,1-12,12H27a12,12,0,0,1-12-12s2-12,2-43-2-43-2-43A12,12,0,0,1,27,21H203A12,12,0,0,1,215,33Z" transform="translate(-15 -21)"/>
							  <circle class="cls-two" cx="180" cy="55" r="8"/>
							</svg>
						</div>
			
		</div>	
<!-- PAGE CONTENT -->

		<!-- Portrait View Start -->
		<div class="port_wrap" id="loggedin">
		<div id="yourPinSong">
		<div id="yourPinSongImage"></div>
		<div id="yourPinSongInfo">Your pinned song here!</div>
		</div>
				
							<div class="spotify_pin_intro">
								<h3>choose a song to pin!</h3>
								<h4>Pinned songs will appear at hotspots for other users to collect.  Make it a good one!</h4>
							</div>
				
				
							<div class="overlay"></div>
							<div class="modal inactive">
								<div class="warning_flex">
										<div class="warning_mess">
											<p>You chose "All of Me" as your pinned song.  Is this correct?</p>
										</div>
									</div>
									<div class="btn_spot_modal_wrap">
										<button class="btn_correct">correct</button>
										<button class="btn_incorrect">incorrect</button>
									</div>
								</div>
							</div>
				
							
									<div class="spotify_pin_wrap">
										<img src="graphics/spotify_purple.svg" alt="Spotify Purple Icon">
										<h3>Search Spotify:</h3>
										<form class="spotify_search_bar" id="search-form">
												<img src="graphics/magnify.svg" alt="Search Icon">
											<input type="text" name="spot_search" id="query"  onfocus="this.placeholder = ''">
											<input type="submit" id="search" class="btn btn-primary" value="Search">
										</form>
									</div>
									<div class="flex_connect">
										<h3 class="connect_user">connected to: ant_green04 - edit</h3>
									</div>
									<div id="results"></div>			
							
				
							<div class="playlist_suggestions_wrap">
								<div class="suggestions_flex">
									<h2>suggestions from your playlist!</h2>
								</div>
								<div class="song_info">
									<div class="song_flex">
										<h6>John Legend</h6>
										<h6>All of Me</h6>
									</div>
									<img class="temp" src="graphics/legend.jpeg" alt="John Legend">
									<h5 class="add modal_open">pin</h5>
								</div>
				
								<div class="song_info">
									<div class="song_flex">
										<h6>John Legend</h6>
										<h6>All of Me</h6>
									</div>
									<img class="temp" src="graphics/legend.jpeg" alt="John Legend">
									<h5 class="add">pin</h5>
								</div>
				
								<div class="song_info">
									<div class="song_flex">
										<h6>John Legend</h6>
										<h6>All of Me</h6>
									</div>
									<img class="temp" src="graphics/legend.jpeg" alt="John Legend">
									<h5 class="add">pin</h5>
								</div>
							</div>
				
				
						</div>
				
						<!-- Portrait View End  -->
						<script>
								(function() {
					
									var stateKey = 'spotify_auth_state';
					
									/**
									 * Obtains parameters from the hash of the URL
									 * @return Object
									 */
									function getHashParams() {
										var hashParams = {};
										var e, r = /([^&;=]+)=?([^&;]*)/g,
												q = window.location.hash.substring(1);
										while ( e = r.exec(q)) {
											 hashParams[e[1]] = decodeURIComponent(e[2]);
										}
										return hashParams;
									}
					
									var trackname;
									var trackartist;
									var trackhref;
									var trackimage;
									var userPinSong;
					
									//DEFINE THE ELEMENTS
									var que = document.getElementById('query');
					
									//LISTENERS
									//listen for input in form
									que.addEventListener('input', function (e) {
										console.log(this.value);
									}, false);
									//listen for sumbit, send value to searchAlbums
									document.getElementById('search-form').addEventListener('submit', function (e) {
									e.preventDefault();
									searchAlbums(que.value);
									}, false);
					
			
											var searchAlbums = function (query) {
											$.ajax({
													url: 'https://api.spotify.com/v1/search',
													headers: {
														"Authorization": "Bearer <?php echo $json['access_token']; ?>",
														"Accept": "application/json; charset=utf-8",         
														"Content-Type": "application/json; charset=utf-8"   
													},
													data: {
															q: query,
															offset: 0,
															limit: 3,
															type: 'track'
													},
													success: function (response) {
														console.log(response);
														$('#results').html("");
														var json = response;
														
														for (var i=0; i<3; i++) {
														console.log(i);
														if (json.tracks.items[i]){
														trackname = json.tracks.items[i].name;
														trackartist = json.tracks.items[i].artists[0].name;
														trackhref = json.tracks.items[i].href;
														trackimage = json.tracks.items[i].album.images[2].url;
														divid = '<div id="r' + i;
					
														$('#results').append(divid + '" class="track"><li>'+ trackname + '</li><li>' + trackartist + '</li><li class="url">' + trackhref +'</li><img src='+ trackimage +'> <input type="submit" id="p'+ i + '" class="pinSong" class="btn btn-primary" value="Pin"> </div>');
														}
													} 
													$(".pinSong").click(function(i){
															userPinSong = $(this).siblings('.url').contents().get(0).nodeValue;
															console.log(userPinSong);
															console.log($(this).siblings('.url').contents().get(0).nodeValue);
															// console.log($(this).closest('li[class]'));
															// console.log(i);
															console.log('pinned song');
															// $("#yourPinSong").html(userPinSong);
															
															$.ajax({
															url: userPinSong,
															headers: {
																"Authorization": "Bearer <?php echo $json['access_token']; ?>",
																"Accept": "application/json; charset=utf-8",         
																"Content-Type": "application/json; charset=utf-8" 
																},
															success: function(response) {
															console.log(response);
															var yourSongImage = response.album.images[0].url;
															var yourSongName = response.name;
															var yourSongArtist = response.artists[0].name;
															var resulted = "<img src='" + yourSongImage + "' width='100' height='100'>";
															var resulted2 = "<li>" + yourSongName + "</li><li>" + yourSongArtist + "</li>";
															console.log(resulted);
															$("#yourPinSongImage").html(resulted);
															$("#yourPinSongInfo").html(resulted2);
															}});
														});
					
													}
											});
											console.log('hello');
											console.log(query);
									};
					
									
									
								})();
							</script>