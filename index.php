<?php 
  require_once("inc/conn.php");
  include('inc/header.php');
  include('inc/banner.php');
 ?>
 <div class="content">
			<p id="title">Featured<strong>Product</strong></p>
		</div>


		<div class="row">
		  	<div class="leftcolumn">
		   
		    	<?php
		      	// ?page=2 => $_GET['page'] = 3 => 
		 
		        if(!empty($_GET['page']))
		        {
		          $page=$_GET['page']-1;
		        }
		        else
		        {
		          $page =0;
		        }

		    //$page = !empty($_GET['page']) ? ($_GET['page'] - 1): 0 ; //lay page hien tai
		      $product_per_page = 6; //1 trang 3 sp 
		            $offset = $product_per_page * $page; //offset chinh la phan can bo qua 

		      $sql = "SELECT * FROM giay LIMIT $offset,$product_per_page"; 
		      $rs = mysqli_query($conn, $sql);

		      if( mysqli_num_rows($rs) > 0 ){
		        while( $row = mysqli_fetch_assoc($rs) ){
		      ?>
		          <a href="single-pd.php?id=<?php echo $row['id']?>" class="product">
		          	<div class="product-image"><img src="img/<?php echo $row['anh'] ?>" title = "<?php echo $row['ten'] ?>"/></div>
		            <h2 class="product-title"><?php echo $row['ten'] ?></h2>		     
		            <p class="product-price"><?php echo $row['giatien'] . " $ "  ?></p>
		          </a>
		    <?php 

		        }//end while 

		      }//check so hang tra ve > 0 
		?>
		<br>
	</div>
	
	<?php include('inc/quangcao.php') ?>
	<?php  include('inc/pagination.php');?>
<?php 
	include('inc/footer.php');
 ?>