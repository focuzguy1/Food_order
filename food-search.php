<?php include('partials-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php  
				//get the search keyword
				$search = $_POST['search'];
			?>
            <h2>Foods on Your Search <a href="#" class="text-white">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

	

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

			<?php
				
				//SQL query to get foods based onsearch keyword
				$sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
				
				//execute query
				$res = mysqli_query($conn,$sql);
				
				//check whether food is avail i.e count Rows
				$count = mysqli_num_rows($res);
				
				//check whether food avail or not
				if($count > 0){
					while($row = mysqli_fetch_assoc($res)){
						//get the details
						$id = $row['id'];
						$title = $row['title'];
						$price = $row['price'];
						$description = $row['description'];
						$image_name = $row['image_name'];
						//we add html inside the php below to display and fetch data into html
						?>
						
						<div class="food-menu-box">
							<div class="food-menu-img">
							
							<?php
							//check whther image name is available or not
								if($image_name==""){
									echo "<div class='error'> Image Not Available</div>";
								}else{
									?>
										<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
									<?php
								}
							?>
								
							</div>

							<div class="food-menu-desc">
								<h4><?php echo $title; ?></h4>
								<p class="food-price"><?php echo $price; ?></p>
								<p class="food-detail">
									<?php echo $description; ?>
								</p>
								<br>

								<a href="#" class="btn btn-primary">Order Now</a>
							</div>
						</div>
						<?php
					}
				}
				else{
					//food not available
					echo "<div class='error'> Food Not Found </div>";
				}
				
			?>
		</div>
			
           

          <!--  <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-burger.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Smoky Burger</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>-->

          

            <div class="clearfix"></div>

           

    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('partials-front/footer.php');?>