<?php include('partials-front/menu.php');?>

<?php 
	//check whther id is passed or not from index.php
	if(isset($_GET['category_id']))
	{
		//category id is set and get the id
		$category_id = $_GET['category_id'];
		//GET the category title based on category ID
		$sql = "SELECT title FROM tbl_category WHERE id=$category_id";
		
		$res = mysqli_query($conn,$sql);//execute
		
		//get the value from db
		$row = mysqli_fetch_assoc($res);
		//get the title
		$category_title = $row['title'];
	}else{
		//category no passed
		//redirect to home page
		header('location:'.SITEURL);
	}
?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
			<?php 
			//create sql query to get foos based on selected query
				$sql2 = "SELECT * FROM  tbl_food WHERE category_id = $category_id";
				
				//execute the query
				$res2 = mysqli_query($conn, $sql2);
				$count2= mysqli_num_rows($res2);
				
				//check whether food is available or not
				if($count2 > 0){
					while($row2 = mysqli_fetch_assoc($res2)){
						$id = $row2['id'];
						$title= $row2['title'];
						$price = $row2['price'];
						$description = $row2['description'];
						$image_name = $row2['image_name'];
						
					?>
						 <div class="food-menu-box">
							<div class="food-menu-img">
							<?php
								if($image_name ==""){
									//image is available
									echo "<div class='error'>Image Not Available<div>";
								}else{
									?>
									<img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve"> <!--and we display the image-->

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

								<a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
							</div>
						</div>
					<?php
				}
			}else{
				echo "<div class='error'> Food Not Available </div>";
			}
			?>

          

          
           <!-- <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="images/menu-momo.jpg" alt="Chicke Hawain Momo" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>Chicken Steam Momo</h4>
                    <p class="food-price">$2.3</p>
                    <p class="food-detail">
                        Made with Italian Sauce, Chicken, and organice vegetables.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>-->


            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php');?>