<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getLastestSliderProduct = $product->getLastestSliderProduct();
				if($getLastestSliderProduct){
					while($resultdell = $getLastestSliderProduct->fetch_assoc()){
				 ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultdell['productId'] ?>"> <img src="admin/uploads/<?php echo $resultdell['image'] ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						
						<p><?php echo $resultdell['productName'] ?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultdell['productId']  ?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			   <?php
			}}
			    ?>	
			   
			</div>
			
		  <div class="clear"></div>
		</div>

			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
            <div id="myCarousel" class="carousel slide"  data-ride="carousel">
			  <!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner">
<?php
						$get_slider = $product->show_slider();
						if($get_slider){
							$i = 0;
							while($result_slider = $get_slider->fetch_assoc()){
								$i++;

						 ?>
			    <div  class="item <?php if($i==1){ echo 'active';}else{ echo '';} ?>">
			      <img style="width:100%; height: 400px;" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>"/>
			    </div>

			    <?php
			    }
			    } 
			    ?>
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
			  <section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<?php
						$get_slider = $product->show_slider();
						if($get_slider){
							while($result_slider = $get_slider->fetch_assoc()){

						 ?>
						<li><img src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>"/></li>
						<?php
							}
						}

						 ?>
				    </ul>
				  </div>
	      </section> 
	      
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
 </div>
