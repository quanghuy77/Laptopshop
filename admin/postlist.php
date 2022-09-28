<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/post.php' ?>
<?php
    $post = new post();
     if(isset($_GET['delid'])){
        $id = $_GET['delid']; 
        $delcat = $post->del_category_post($id);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category Post List</h2>
                <div class="block">    
                <?php

                if(isset($delcat)){
                    echo $delcat;
                }

                ?>    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Post Name</th>
							<th>Category Post Desc</th>
							<th>Category Post Status</th>
						
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$show_cate = $post->show_category_post();
						if($show_cate){
							$i = 0;
							while($result = $show_cate->fetch_assoc()){
								$i++;
							
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['title'] ?></td>
							<td><?php echo $result['description'] ?></td>
							<td><?php 
									if($result['status']=='0'){
											echo 'Hien thi';
									}else{
										echo 'an';
									}
							
							?></td>
							<td><a href="postedit.php?catid=<?php echo $result['id_cate_post'] ?>">Edit</a> || <a onclick = "return confirm('Are you want to delete?')" href="?delid=<?php echo $result['id_cate_post'] ?>">Delete</a></td>
						</tr>
						<?php
					}
						}
						?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

