
			    <div class="col-md-12" style="margin-bottom:-100px;margin-top:-50px">
				    <div class="gnSlider gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
				        <div class="flex-container">
				            <div class="flexslider loading">
				                <ul class="slides">
								@forelse($recent_news as $final_new)

				                    <li>
				                        <div class="item-wrap">
				                            <h3><p data-bottomtext="0"><span style='font-size:35px;color:#4EBCFF'>Heading:</span> {{$final_new->heading}}</p></h3>
				                        </div>
				                    </li>
				                    @empty
									<li>
				                        <div class="item-wrap">
				                            <p data-bottomtext="0">No Rcent Heding</p>
				                        </div>
				                    </li>
                                @endforelse
				                    
				                </ul>
				            </div>
				        </div>
			        </div><!-- /.gnSlider -->
				</div><!-- /.col-md-12  carousel-->