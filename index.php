
<?php include('partials-front/menu.php'); ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
	<?php
		if(isset($_SESSION['order'])){
			echo $_SESSION['order'];
			unset($_SESSION['order']);
		}
	?>
	
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

           <!-- 

            <a href="#">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsive img-curve">

                <h3 class="float-text text-white">Momo</h3>
            </div>
            </a>-->
			<?php 
			
			//create sql query to display categories from database //limit 3 will DISPLAY 3 ROWS OF DATA
			
			$sql = "SELECT * FROM tbl_category WHERE  active ='Yes' AND featured = 'Yes' LIMIT 3";
			//execute the query
			$res = mysqli_query($conn, $sql);
			
			$count = mysqli_num_rows($res);//count rows to check whether the category is available or not
			
			
				if($count >0){
					while($row = mysqli_fetch_assoc($res)){
						//get the values like id, title, image_name
						$id = $row['id'];
						$title = $row['title'];
						$image_name = $row['image_name'];
						?>
							<a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
							<div class="box-3 float-container">
							<?php
								//we have to check if image name is available-->
								
								if($image_name ==""){
									echo "<div class='error'> Image not Available </div>";
								}else
								{
									//image Available
									?>
									<img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="pizza" class="img-responsive img-curve">
									<?php
								}
								?>
								
								<h3 class="float-text text-white"><?php echo $title; ?></h3>
								</div>
								</a>
								<?php
									}
			
					
								}
							else{
								echo "<div class='error'> Category Not Added </div>";
							}
			
			
			?>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

           <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Food Title</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>-->

			<?php 
				//getting foods from db that are active andfeatured
				$sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
				$res2 = mysqli_query($conn, $sql2);
				
				$count2 = mysqli_num_rows($res2);
				
				//check whether food avai or not
				if($count2 > 0){
					while($row = mysqli_fetch_assoc($res2)){
						$id = $row['id'];
						$title = $row['title'];
						$description = $row['description'];
						$price = $row['price'];
						$image_name = $row['image_name'];
						?>
						
							 <div class="food-menu-box">
									<div class="food-menu-img">
									<?php
									//check whether image avail or not
									if($image_name ==""){
										echo "<div class='error'>Image Not Available</div>";
									}else{
										//image available
										?>
											<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicken Hawain Burger" class="img-responsive img-curve">

										<?php
									}
									?>
								</div>

									<div class="food-menu-desc">
										<h4><?php echo $title;?></h4>
										<p class="food-price"><?php echo $price;?></p>
										<p class="food-detail">
											<?php echo $description;?></p>
										<br>
																				<!-- we created the variable food_id, it get method because we are passing variable in url-->
										<a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
									</div>
								</div>
						<?php
						
						}
					}else{
						
						echo "<div class='error'>Food Not Available </div>";
					}
				?>

            </div>


            <div class="clearfix"></div>

            

        

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>