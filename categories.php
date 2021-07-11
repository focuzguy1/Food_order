<?php include('partials-front/menu.php');?>



    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            
			
			<?php
			$sql = "SELECT * FROM tbl_category WHERE active='Yes'";
			
			//Execute the query
			$res = mysqli_query($conn, $sql);
			
			//count row
			$count = mysqli_num_rows($res);
			
			//cjecl whether categ is avail or not
			if($count >0){
				while($row = mysqli_fetch_assoc($res)){
					$id = $row['id'];
					$title = $row['title'];
					$image_name = $row['image_name'];
					?>
					<a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
						<div class="box-3 float-container">
							<?php
								if($image_name==""){
									//image is not available
									echo "<div class='error'> Image Not Found</div>";
								}else{
									//image available
									?>
									<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">

									<?php
								}
							?>
							
							<h3 class="float-text text-white"><?php echo $title; ?></h3>
						</div>
					</a>
					
					<?php
				}
				
			}else{
				echo "<div class='error'>Category Not Found.</div>";
			}
			
			?>

           
           <!-- <a href="#">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
            </a>
            <a href="#">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/pizza.jpg" alt="Pizza" class="img-responsive img-curve">

                <h3 class="float-text text-white">Pizza</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsive img-curve">

                <h3 class="float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
            </a>-->

            

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>