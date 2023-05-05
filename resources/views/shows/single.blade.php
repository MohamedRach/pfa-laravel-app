@extends("layouts.app")

@section("title", $show["title"])

@section('content')
<div class="hero mv-single-hero" style="background:url({{ $base }}@if($show["thumbnail"]){{ "/thumbnails/" . $show["thumbnail"] }}@else{{ "/posters/" . $show["poster"] }}@endif)">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

			</div>
		</div>
	</div>
</div>
<div class="page-single movie-single movie_single">
	<div class="container">
		<div class="row ipad-width2">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="movie-img sticky-sb">
					<img src="{{ $base }}/posters/{{ $show["poster"] }}" alt="">
					<div class="movie-btn">	

                        
                        @if($user && $user->hasValidSubscription())
                            <div class="btn-transform transform-vertical">
                                <div><a href="/episodes/{{ $episodes[$episodesCount - 1]["id"] }}" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Now</a></div>
                                <div><a href="/episodes/{{ $episodes[$episodesCount - 1]["id"] }}" class="item item-2 redbtn"><i class="ion-play"></i></a></div>
                            </div>
                        @else
                            <div class="btn-transform transform-vertical red">
                                <div><a href="#" class="item item-1 redbtn"> <i class="ion-play"></i> Watch Trailer</a></div>
                                <div><a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a></div>
                            </div>
                            <div class="btn-transform transform-vertical">
                                <div><a href="/subscription" class="item item-1 yellowbtn"> <i class="ion-card"></i> Subscribe</a></div>
                                <div><a href="/subscription" class="item item-2 yellowbtn"><i class="ion-card"></i></a></div>
                            </div>
                        @endif
						
					</div>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="movie-single-ct main-content">
					<h1 style="white-space: nowrap;" class="bd-hd">{{ $show["title"] }} <span>{{ date("Y", strtotime($show["releaseDate"])); }}</span></h1>
					<div class="social-btn">
						<a href="#" class="parent-btn @guest loginLink @endguest" @auth id="favorite-btn" @endauth>
							<div style="display: none;" class="loader">
								<span></span>
							</div>
							<i class="ion-heart @if($show["favorite"]) active @endif"></i> <span>@if($show["favorite"]) Remove From @else Add To @endif Favorite</span>
						</a>
						<div class="hover-bnt">
							<a href="#" class="parent-btn"><i class="ion-android-share-alt"></i>share</a>
							<div class="hvr-item">
								<a href="#" class="hvr-grow"><i class="ion-social-facebook"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-twitter"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-googleplus"></i></a>
								<a href="#" class="hvr-grow"><i class="ion-social-youtube"></i></a>
							</div>
						</div>		
					</div>
					<div class="movie-rate">
						<div class="rate">
							<i class="ion-android-star"></i>
							<p><span>8.1</span> /10<br>
								<span class="rv">56 Reviews</span>
							</p>
						</div>
						<div class="rate-star">
							<p>Rate This Movie:  </p>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star"></i>
							<i class="ion-ios-star-outline"></i>
						</div>
					</div>
					<div class="movie-tabs">
						<div class="tabs">
							<ul class="tab-links tabs-mv">
								<li class="active"><a href="#overview">Overview</a></li>
								<li><a href="#reviews"> Reviews</a></li>
								<li><a href="#cast">  Cast & Crew </a></li>
								<li><a id="AllEpisodesTrigger" href="#media">Episodes</a></li> 
								<li><a href="#moviesrelated"> Related Movies</a></li>                        
							</ul>
						    <div class="tab-content">
						        <div id="overview" class="tab active">
						            <div class="row">
						            	<div class="col-md-8 col-sm-12 col-xs-12">
						            		<p>{{ $show["description"] }}</p>
						            		<div class="title-hd-sm">
												<h4>Episodes</h4>
												<a id="AllEpisodes" href="javascript:void;" class="time">All {{ $episodesCount }} Episodes <i class="ion-ios-arrow-right"></i></a>
											</div>
											<div class="mvsingle-item media-item">
												@foreach ($episodes->slice(0, 3) as $episode)
													<div class="vd-item" style="width: 140px;">
														<div class="vd-it">
															<img style="height: calc(140px * 96/170);" class="vd-img" src="{{ $base }}/ethumbnails//{{ $episode["thumbnail"] }}" alt="">
															<a class="fancybox-media hvr-grow"  href="/episodes/{{ $episode["id"] }}">
																<i class="ion-play"></i>
															</a>
														</div>
														<div class="vd-infor">
															<h6> <a href="#">{{ $episode["title"] }}</a></h6>
															<p class="time">{{ $episode["duration"] }}</p>
														</div>
													</div>
												@endforeach
												
											</div>
											<div class="title-hd-sm">
												<h4>cast</h4>
												<a href="#" class="time">Full Cast & Crew  <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie cast -->
											<div class="mvcast-item">											
												<div class="cast-it">
													<div class="cast-left">
														<img src="/images/uploads/cast1.jpg" alt="">
														<a href="#">Robert Downey Jr.</a>
													</div>
													<p>...  Robert Downey Jr.</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="/images/uploads/cast7.jpg" alt="">
														<a href="#">James Spader</a>
													</div>
													<p>...  Ultron</p>
												</div>
												<div class="cast-it">
													<div class="cast-left">
														<img src="/images/uploads/cast9.jpg" alt="">
														<a href="#">Don Cheadle</a>
													</div>
													<p>...  James Rhodes/ War Machine</p>
												</div>
											</div>
											<div class="title-hd-sm">
												<h4>User reviews</h4>
												<a href="#" class="time">See All 56 Reviews <i class="ion-ios-arrow-right"></i></a>
											</div>
											<!-- movie user review -->
											<div class="mv-user-review-item">
												<h3>Best Marvel movie in my opinion</h3>
												<div class="no-star">
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star"></i>
													<i class="ion-android-star last"></i>
												</div>
												<p class="time">
													17 December 2016 by <a href="#"> hawaiipierson</a>
												</p>
												<p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better.</p>
											</div>
						            	</div>
						            	<div class="col-md-4 col-xs-12 col-sm-12">
						            		<div class="sb-it">
						            			<h6>Director: </h6>
						            			<p><a href="#">Joss Whedon</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Writer: </h6>
						            			<p><a href="#">Joss Whedon,</a> <a href="#">Stan Lee</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Stars: </h6>
						            			<p><a href="#">Robert Downey Jr,</a> <a href="#">Chris Evans,</a> <a href="#">Mark Ruffalo,</a><a href="#"> Scarlett Johansson</a></p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Genres:</h6>
						            			<p>
                                                    @foreach ($show["genres"] as $genre)
                                                        <a href="#">{{ $genre }}@if (!$loop->last),@endif </a>
                                                    @endforeach
                                                </p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Release Date:</h6>
						            			<p>{{ date("d-M-Y", strtotime($show["releaseDate"])); }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Run Time:</h6>
						            			<p>{{ $show["runTime"] }} min</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>MMPA Rating:</h6>
						            			<p>{{ $show["rating"] }}</p>
						            		</div>
						            		<div class="sb-it">
						            			<h6>Plot Keywords:</h6>
						            			<p class="tags">
                                                    @foreach (explode(",", $show["keywords"]) as $word)
                                                        <span class="time"><a href="#">{{ $word }}</a></span>
                                                    @endforeach
						            			</p>
						            		</div>
						            		<div class="ads">
												<img src="/images/uploads/ads1.png" alt="">
											</div>
						            	</div>
						            </div>
						        </div>
						        <div id="reviews" class="tab review">
						           <div class="row">
						            	<div class="rv-hd">
						            		<div class="div">
							            		<h3>Related Movies To</h3>
						       	 				<h2>Skyfall: Quantum of Spectre</h2>
							            	</div>
							            	<a href="#" class="redbtn">Write Review</a>
						            	</div>
						            	<div class="topbar-filter">
											<p>Found <span>56 reviews</span> in total</p>
											<label>Filter by:</label>
											<select>
												<option value="popularity">Popularity Descending</option>
												<option value="popularity">Popularity Ascending</option>
												<option value="rating">Rating Descending</option>
												<option value="rating">Rating Ascending</option>
												<option value="date">Release date Descending</option>
												<option value="date">Release date Ascending</option>
											</select>
										</div>
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="/images/uploads/userava1.jpg" alt="">
												<div>
													<h3>Best Marvel movie in my opinion</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														17 December 2016 by <a href="#"> hawaiipierson</a>
													</p>
												</div>
											</div>
											<p>This is by far one of my favorite movies from the MCU. The introduction of new Characters both good and bad also makes the movie more exciting. giving the characters more of a back story can also help audiences relate more to different characters better, and it connects a bond between the audience and actors or characters. Having seen the movie three times does not bother me here as it is as thrilling and exciting every time I am watching it. In other words, the movie is by far better than previous movies (and I do love everything Marvel), the plotting is splendid (they really do out do themselves in each film, there are no problems watching it more than once.</p>
										</div>
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="/images/uploads/userava2.jpg" alt="">
												<div>
													<h3>Just about as good as the first one!</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
													</div>
													<p class="time">
														17 December 2016 by <a href="#"> hawaiipierson</a>
													</p>
												</div>
											</div>
											<p>Avengers Age of Ultron is an excellent sequel and a worthy MCU title! There are a lot of good and one thing that feels off in my opinion. </p>

											<p>THE GOOD:</p>

											<p>First off the action in this movie is amazing, to buildings crumbling, to evil blue eyed robots tearing stuff up, this movie has the action perfectly handled. And with that action comes visuals. The visuals are really good, even though you can see clearly where they are through the movie, but that doesn't detract from the experience. While all the CGI glory is taking place, there are lovable characters that are in the mix. First off the original characters, Iron Man, Captain America, Thor, Hulk, Black Widow, and Hawkeye, are just as brilliant as they are always. And Joss Whedon fixed my main problem in the first Avengers by putting in more Hawkeye and him more fleshed out. Then there is the new Avengers, Quicksilver, Scarletwich, and Vision, they are pretty cool in my opinion. Vision in particular is pretty amazing in all his scenes.</p>

											<p>THE BAD:</p>

											<p>The beginning of the film it's fine until towards the second act and there is when it starts to feel a little rushed. Also I do feel like there are scenes missing but there was talk of an extended version on Blu-Ray so that's cool.</p>
										</div>
										<div class="mv-user-review-item">
											<div class="user-infor">
												<img src="/images/uploads/userava3.jpg" alt="">
												<div>
													<h3>One of the most boring exepirences from watching a movie</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														 26 March 2017 by<a href="#"> christopherfreeman</a>
													</p>
												</div>
											</div>
											<p>I can't right much... it's just so forgettable...Okay, from what I remember, I remember just sitting down on my seat and waiting for the movie to begin. 5 minutes into the movie, boring scene of Tony Stark just talking to his "dead" friends saying it's his fault. 10 minutes in: Boring scene of Ultron and Jarvis having robot space battles(I dunno:/). 15 minutes in: I leave the theatre.2nd attempt at watching it: I fall asleep. What woke me up is the next movie on Netflix when the movie was over.</p>

											<p>Bottemline: It's boring...</p>

											<p>10/10 because I'm a Marvel Fanboy</p>
										</div>
										<div class="mv-user-review-item ">
											<div class="user-infor">
												<img src="/images/uploads/userava4.jpg" alt="">
												<div>
													<h3>That spirit of fun</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														26 March 2017 by <a href="#"> juliawest</a>
													</p>
												</div>
											</div>
											<p>If there were not an audience for Marvel comic heroes than clearly these films would not be made, to answer one other reviewer although I sympathize with him somewhat. The world is indeed an infinitely more complex place than the world of Marvel comics with clearly identifiable heroes and villains. But I get the feeling that from Robert Downey, Jr. on down the organizer and prime mover as Iron Man behind the Avengers these players do love doing these roles because it's a lot of fun. If they didn't show that spirit of fun to the audience than these films would never be made.</p>

											<p>So in that spirit of fun Avengers: Age Of Ultron comes before us and everyone looks like they're having a good time saving the world. A computer program got loose and took form in this dimension named Ultron and James Spader who is completely unrecognizable is running amuck in the earth. No doubt Star Trek fans took notice that this guy's mission is to cleanse the earth much like that old earth probe NOMAD which got its programming mixed up in that classic Star Trek prime story. Wouldst Captain James T. Kirk of the Enterprise had a crew like Downey has at his command.</p>
											<p>My favorite is always Chris Evans because of the whole cast he best gets into the spirit of being a superhero. Of all of them, he's already played two superheroes, Captain America and Johnny Storm the Human Torch. I'll be before he's done Evans will play a couple of more as long as the money's good and he enjoys it.</p>

											<p>Pretend you're a kid again and enjoy, don't take it so seriously.</p>
										</div>
										<div class="mv-user-review-item last">
											<div class="user-infor">
												<img src="/images/uploads/userava5.jpg" alt="">
												<div>
													<h3>Impressive Special Effects and Cast</h3>
													<div class="no-star">
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star"></i>
														<i class="ion-android-star last"></i>
														<i class="ion-android-star last"></i>
													</div>
													<p class="time">
														26 March 2017 by <a href="#"> johnnylee</a>
													</p>
												</div>
											</div>
											<p>The Avengers raid a Hydra base in Sokovia commanded by Strucker and they retrieve Loki's scepter. They also discover that Strucker had been conducting experiments with the orphan twins Pietro Maximoff (Aaron Taylor-Johnson), who has super speed, and Wanda Maximoff (Elizabeth Olsen), who can control minds and project energy. Tony Stark (Robert Downey Jr.) discovers an Artificial Intelligence in the scepter and convinces Bruce Banner (Mark Ruffalo) to secretly help him to transfer the A.I. to his Ultron defense system. However, the Ultron understands that is necessary to annihilate mankind to save the planet, attacks the Avengers and flees to Sokovia with the scepter. He builds an armature for self-protection and robots for his army and teams up with the twins. The Avengers go to Clinton Barton's house to recover, but out of the blue, Nick Fury (Samuel L. Jackson) arrives and convinces them to fight against Ultron. Will they succeed? </p>

											<p>"Avengers: Age of Ultron" is an entertaining adventure with impressive special effects and cast. The storyline might be better, since most of the characters do not show any chemistry. However, it is worthwhile watching this film since the amazing special effects are not possible to be described in words. Why Pietro has to die is also not possible to be explained. My vote is eight.</p>
										</div>
										<div class="topbar-filter">
											<label>Reviews per page:</label>
											<select>
												<option value="range">5 Reviews</option>
												<option value="saab">10 Reviews</option>
											</select>
											<div class="pagination2">
												<span>Page 1 of 6:</span>
												<a class="active" href="#">1</a>
												<a href="#">2</a>
												<a href="#">3</a>
												<a href="#">4</a>
												<a href="#">5</a>
												<a href="#">6</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div>
						            </div>
						        </div>
						        <div id="cast" class="tab">
						        	<div class="row">
						            	<h3>Cast & Crew of</h3>
					       	 			<h2>Avengers: Age of Ultron</h2>
										<!-- //== -->
					       	 			<div class="title-hd-sm">
											<h4>Directors & Credit Writers</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<h4>JW</h4>
													<a href="#">Joss Whedon</a>
												</div>
												<p>...  Director</p>
											</div>
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Directors & Credit Writers</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<h4>SL</h4>
													<a href="#">Stan Lee</a>
												</div>
												<p>...  (based on Marvel comics)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JK</h4>
													<a href="#">Jack Kirby</a>
												</div>
												<p>...  (based on Marvel comics)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JS</h4>
													<a href="#">Joe Simon</a>
												</div>
												<p>...  (character created by: Captain America)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JS</h4>
													<a href="#">Joe Simon</a>
												</div>
												<p>...  (character created by: Thanos)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>RT</h4>
													<a href="#">Roy Thomas</a>
												</div>
												<p>...  (character created by: Ultron, Vision)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JB</h4>
													<a href="#">John Buscema</a>
												</div>
												<p>...  (character created by: Ultron, Vision)</p>
											</div>
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Cast</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast1.jpg" alt="">
													<a href="#">Robert Downey Jr.</a>
												</div>
												<p>...  Robert Downey Jr.</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast2.jpg" alt="">
													<a href="#">Chris Hemsworth</a>
												</div>
												<p>...  Thor</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast3.jpg" alt="">
													<a href="#">Mark Ruffalo</a>
												</div>
												<p>...  Bruce Banner/ Hulk</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast4.jpg" alt="">
													<a href="#">Chris Evans</a>
												</div>
												<p>...  Steve Rogers/ Captain America</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast5.jpg" alt="">
													<a href="#">Scarlett Johansson</a>
												</div>
												<p>...  Natasha Romanoff/ Black Widow</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast6.jpg" alt="">
													<a href="#">Jeremy Renner</a>
												</div>
												<p>...  Clint Barton/ Hawkeye</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast7.jpg" alt="">
													<a href="#">James Spader</a>
												</div>
												<p>...  Ultron</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<img src="/images/uploads/cast9.jpg" alt="">
													<a href="#">Don Cheadle</a>
												</div>
												<p>...  James Rhodes/ War Machine</p>
											</div>
										</div>
										<!-- //== -->
										<div class="title-hd-sm">
											<h4>Produced by</h4>
										</div>
										<div class="mvcast-item">											
											<div class="cast-it">
												<div class="cast-left">
													<h4>VA</h4>
													<a href="#">Victoria Alonso</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>MB</h4>
													<a href="#">Mitchel Bell</a>
												</div>
												<p>...  co-producer (as Mitch Bell)</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JC</h4>
													<a href="#">Jamie Christopher</a>
												</div>
												<p>...  associate producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>LD</h4>
													<a href="#">Louis D’Esposito</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JF</h4>
													<a href="#">Jon Favreau</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>KF</h4>
													<a href="#">Kevin Feige</a>
												</div>
												<p>...  producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>AF</h4>
													<a href="#">Alan Fine</a>
												</div>
												<p>...  executive producer</p>
											</div>
											<div class="cast-it">
												<div class="cast-left">
													<h4>JF</h4>
													<a href="#">Jeffrey Ford</a>
												</div>
												<p>...  associate producer</p>
											</div>
										</div>
						            </div>
					       	 	</div>
					       	 	<div id="media" class="tab">
						        	<div class="row">
						        		<div class="rv-hd">
						            		<div>
						            			<h3>Epsiodes of</h3>
					       	 					<h2>{{ $show["title"] }}</h2>
						            		</div>
						            	</div>
						            	<div class="title-hd-sm">
											<h4>Episodes <span>({{ $episodesCount }})</span></h4>
										</div>
										<div class="mvsingle-item media-item">
											@foreach ($episodes as $episode)
												<div class="vd-item" style="width: 170px;">
													<div class="vd-it">
														<img style="height: calc(170px * 96/170);" class="vd-img" src="{{ $base }}/ethumbnails//{{ $episode["thumbnail"] }}" alt="">
														<a class="fancybox-media hvr-grow"  href="/episodes/{{ $episode["id"] }}">
															<i class="ion-play"></i>
														</a>
													</div>
													<div class="vd-infor">
														<h6> <a href="#">{{ $episode["title"] }}</a></h6>
														<p class="time">{{ $episode["duration"] }}</p>
													</div>
												</div>
											@endforeach
										</div>
						        	</div>
					       	 	</div>
					       	 	<div id="moviesrelated" class="tab">
					       	 		<div class="row">
					       	 			<h3>Related Movies To</h3>
					       	 			<h2>Skyfall: Quantum of Spectre</h2>
					       	 			<div class="topbar-filter">
											<p>Found <span>12 movies</span> in total</p>
											<label>Sort by:</label>
											<select>
												<option value="popularity">Popularity Descending</option>
												<option value="popularity">Popularity Ascending</option>
												<option value="rating">Rating Descending</option>
												<option value="rating">Rating Ascending</option>
												<option value="date">Release date Descending</option>
												<option value="date">Release date Ascending</option>
											</select>
										</div>
										<div class="movie-item-style-2">
											<img src="/images/uploads/mv1.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">oblivion <span>(2012)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>8.1</span> /10</p>
												<p class="describe">Earth's mightiest heroes must come together and learn to fight as a team if they are to stop the mischievous Loki and his alien army from enslaving humanity...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Joss Whedon</a></p>
												<p>Stars: <a href="#">Robert Downey Jr.,</a> <a href="#">Chris Evans,</a> <a href="#">  Chris Hemsworth</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="/images/uploads/mv2.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">into the wild <span>(2014)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.8</span> /10</p>
												<p class="describe">As Steve Rogers struggles to embrace his role in the modern world, he teams up with a fellow Avenger and S.H.I.E.L.D agent, Black Widow, to battle a new threat...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Anthony Russo,</a><a href="#">Joe Russo</a></p>
												<p>Stars: <a href="#">Chris Evans,</a> <a href="#">Samuel L. Jackson,</a> <a href="#">  Scarlett Johansson</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="/images/uploads/mv3.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">blade runner  <span>(2015)</span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.3</span> /10</p>
												<p class="describe">Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help...</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Peyton Reed</a></p>
												<p>Stars: <a href="#">Paul Rudd,</a> <a href="#"> Michael Douglas</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="/images/uploads/mv4.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">Mulholland pride<span> (2013)  </span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.2</span> /10</p>
												<p class="describe">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Shane Black</a></p>
												<p>Stars: <a href="#">Robert Downey Jr., </a> <a href="#">  Guy Pearce,</a><a href="#">Don Cheadle</a></p>
											</div>
										</div>
										<div class="movie-item-style-2">
											<img src="/images/uploads/mv5.jpg" alt="">
											<div class="mv-item-infor">
												<h6><a href="#">skyfall: evil of boss<span> (2013)  </span></a></h6>
												<p class="rate"><i class="ion-android-star"></i><span>7.0</span> /10</p>
												<p class="describe">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
												<p class="run-time"> Run Time: 2h21’    .     <span>MMPA: PG-13 </span>    .     <span>Release: 1 May 2015</span></p>
												<p>Director: <a href="#">Alan Taylor</a></p>
												<p>Stars: <a href="#">Chris Hemsworth,  </a> <a href="#">  Natalie Portman,</a><a href="#">Tom Hiddleston</a></p>
											</div>
										</div>
										<div class="topbar-filter">
											<label>Movies per page:</label>
											<select>
												<option value="range">5 Movies</option>
												<option value="saab">10 Movies</option>
											</select>
											<div class="pagination2">
												<span>Page 1 of 2:</span>
												<a class="active" href="#">1</a>
												<a href="#">2</a>
												<a href="#"><i class="ion-arrow-right-b"></i></a>
											</div>
										</div>
					       	 		</div>
					       	 	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section("scripts")
	<script>
		$("#AllEpisodes").click(function() {
			$("#AllEpisodesTrigger").trigger( "click" );
		})
		$("#favorite-btn").on("click", function() {
			var loader = $(this).find(".loader");
			var icon = $(this).find("i");
			var text = $(this).find(" > span");
			var active = icon.hasClass("active");

			loader.show();
			icon.hide();

			$.ajax({
				headers: {
					"X-CSRF-TOKEN": "{{ csrf_token() }}"
				},
				type: "POST",
				url: active ? "/unfavorite" : "/favorite",
				data: {
					show: "{{ $show["id"] }}"
				},
				success: () => {
					text.text(active ? "Add To Faovrite" : "Remove From Favorite")
					icon.toggleClass("active");
					loader.hide();
					icon.show();
				},
			});
		})
	</script>
@endsection