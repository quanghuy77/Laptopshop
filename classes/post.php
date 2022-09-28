<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>

<?php
	/**
	 * 
	 */
	class post
	{
		private $db;
		private $fm;
		
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function all_category(){
			
		}
		/* hàm thêm danh mục tin tức */
		public function insert_category_post($catName,$catDesc,$catStatus){

			$catName = $this->fm->validation($catName);
			$catDesc = $this->fm->validation($catDesc);
			$catStatus = $this->fm->validation($catStatus);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$catDesc = mysqli_real_escape_string($this->db->link, $catDesc);
			$catStatus = mysqli_real_escape_string($this->db->link, $catStatus);
			
			if(empty($catName) || empty($catDesc)){
				$alert = "<span class='error'>Category Post must be not empty</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category_post(title,description,status) VALUES('$catName','$catDesc','$catStatus')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='success'>Insert Category Post Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Insert Category Post Not Success</span>";
					return $alert;
				}
			}
		}
		/* hàm show danh mục tin tức */
		public function show_category_post(){
			$query = "SELECT * FROM tbl_category_post order by id_cate_post desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category_post($catName,$catDesc,$catStatus,$id){

			
			$catName = $this->fm->validation($catName);
			$catDesc = $this->fm->validation($catDesc);
			$catStatus = $this->fm->validation($catStatus);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$catDesc = mysqli_real_escape_string($this->db->link, $catDesc);
			$catStatus = mysqli_real_escape_string($this->db->link, $catStatus);

			$id = mysqli_real_escape_string($this->db->link, $id);

			if(empty($catName) || empty($catDesc)){
				$alert = "<span class='error'>Category must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category_post SET title = '$catName',description = '$catDesc',status = '$catStatus' WHERE id_cate_post = '$id'";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='success'>Category Post Updated Successfully</span>";
					return $alert;
				}else{
					$alert = "<span class='error'>Category Post Updated Not Success</span>";
					return $alert;
				}
			}

		}
		public function del_category_post($id){
			$query = "DELETE FROM tbl_category_post where id_cate_post = '$id'";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='success'>Category Post Deleted Successfully</span>";
				return $alert;
			}else{
				$alert = "<span class='error'>Category Post Deleted Not Success</span>";
				return $alert;
			}
			
		}
		public function getcatbyId($id){
			$query = "SELECT * FROM tbl_category_post where id_cate_post = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function getpostbycateid($id){
			$query = "SELECT tbl_category_post.* FROM tbl_category_post WHERE tbl_category_post.id_cate_post = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function show_category_fontend(){
			$query = "SELECT * FROM tbl_category order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}


		public function get_post_by_cat($id){
			$query = "SELECT tbl_blog.* FROM tbl_blog where tbl_blog.category_post = '$id'";
		   $result = $this->db->select($query);
		   return $result;
		}

		/* lấy tên danh mục sản phẩm */
	/* 	public function get_name_by_cat($id){
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId FROM tbl_product,tbl_category WHERE tbl_product.catId=tbl_category.catId AND tbl_product.catId ='$id' LIMIT 2";
			$result = $this->db->select($query);
			return $result;
		} */
		
		public function getpostbyid($id){
			$query = "SELECT * FROM tbl_blog where tbl_blog.id = '$id'";
		   $result = $this->db->select($query);
		   return $result;
		}


	}
?>