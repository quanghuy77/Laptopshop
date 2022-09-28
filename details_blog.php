<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
?>
<?php
	if(!isset($_GET['blogid']) || $_GET['blogid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['blogid']; 
    }
    
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $catName = $_POST['catName'];
    //     $updateCat = $cat->update_category($catName,$id);
        
    // }
?>
 <div class="main">
    <div class="content">
    	<?php
	     	 $blog_detail = $pos->getpostbyid($id);
	      	 if($blog_detail){
	      	 	while($result = $blog_detail->fetch_assoc()){
	      	?>
    	<div class="content_top">
    		
    		<div class="heading">	
    		<h3>Tiêu đề tin tức : <?php echo $result['title'] ?></h3>
    		</div>
    		
    		<div class="clear"></div>

    	</div>
    	
	     <div class="section group">
	      
				<div class="col-md-12">
					
					 <h2><?php echo $result['title'] ?></h2>
					 <p><?php echo $fm->textShorten($result['description'],150); ?></p>	
					 <p><?php echo $result['content'] ?></p>	
				   <!--  -->
				</div>
		
			</div>

            <?php
			    }
             }
			    ?>
	
    </div>
 </div>
<?php 
	include 'inc/footer.php';
	
 ?>
