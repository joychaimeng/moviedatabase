<!doctype html>
<html>
<title>Moive Info</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  </head>


  <body>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<a class="navbar-brand" href="search.php">Movie Database</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

	  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
	   			<ul class="navbar-nav mr-auto">
	      			
				      <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Add
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="add_actor.php">Add Actor/Director</a>
				          	<div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="add_movie.php">Add Movie </a>
				          	<div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="add_actor_movie.php">Add Actor-Movie </a>
				          	<div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="add_director_movie.php">Add Director-Movie </a>
				          	<div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="add_com.php">Add Movie Comments </a>
				        </div>
				      </li>

				    
	    		</ul>

			  		<!--search section in the nevbar-->
				    <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
				      <input type="text" class="form-control mr-sm-2" name="smallsearch" type="search" placeholder="Search..." aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smallsubmit">Search</button>
				    </form>
	  			</div>
			</nav>



			<!--print movie info--> 
			<div class="container" style ="margin-top: 50px; text-align: center">
				<h2 style="margin-bottom: 10px"> ----- Movie Information -----</h2>
				<div class="d-flex justify-content-center">
					<div class="col-md-8">
						<?php
						 //establish connection
				            $db_connection = mysql_connect("localhost", "cs143", "");
				            if(!$db_connection) {
				                $errmsg = mysql_error($db_connection);
				                print "Database connection error: " . $errmsg . "<br />";
				                exit(1);
				            }

				            //select database
				            $db_select = mysql_select_db("CS143", $db_connection);
				            if(!$db_select) {
				                $errmsg = mysql_error();
				                print "Database selection error: " . $errmsg . "<br />";
				                exit(1);
				            } 
				     
				             //get user input
            				$id = trim($_GET["id"]);

            				if($id != ""){
            					echo "<div class=\" container\" style=\"margin-top:30px\"> <h3> Movie Info  </h3>";
            					$movie_query="SELECT title, rating, company FROM Movie WHERE id=$id; ";
            					$movie_arr = mysql_query($movie_query,$db_connection) or die (mysql_error());
            					$row = mysql_fetch_row($movie_arr);

            					//display table
            					echo "<div><b>Title:</b> ".$row[0]."</div>";
					            echo "<div><b>MPAA Rating:</b> ".$row[1]."</div>";
					            echo "<div><b>Producer:</b> ".$row[2]."</div>";
				              	mysql_free_result($movie_arr);

				              	$director_query="SELECT first, last FROM MovieDirector JOIN Director ON did = id WHERE mid=$id;";
				              	$director_arr = mysql_query($director_query,$db_connection) or die(mysql_error());

				              	echo"<div><b>Director: </b>";
				              	while($row = mysql_fetch_assoc($director_arr)){
				              		echo $row["first"] ." ";
				              		echo $row["last"] ." | ";
				              	}
				              	echo "</div>";

				              	//$row = mysql_fetch_row($director_arr);
				              	//display table
				             /* 	if($row[0]==""){
				              		echo "<div><b>Director:</b> Not Found </div>";
				              	}
				              	else{
            					echo "<div><b>Director:</b> ".$row[0]." " .$row[1]."</div>";
            					}
            					*/
				              	mysql_free_result($director_arr);

				              	$genre_query = "SELECT genre FROM MovieGenre where mid=$id ;";
				              	$genre_arr = mysql_query($genre_query,$db_connection) or die(mysql_error());
				              	echo"<div><b>Genre: </b>";
				              	while($row = mysql_fetch_assoc($genre_arr)){
				              		echo $row["genre"] ." | ";
				              	}
				              	echo "</div>";
				              	mysql_free_result($genre_arr);
            					echo "</div>";
            				}
						?>

						<!--cast -->
						<hr>
						
							<div class="container" style="margin-top: 50px;text-align: center" >
								<h2  style="margin-bottom: 10px;"> Cast in This Movie </h2> 
								<table class='table table-bordered '>
								 	 <tr><td>Actor</td><td>Role</td></tr>
								 	 <tbody>
								 	 	<?php
						                  $cast_query = "SELECT CONCAT(first, ' ', last) as name, role ,id FROM MovieActor JOIN Actor ON id =aid WHERE mid = $id ;";
						                  $cast_arr = mysql_query($cast_query,$db_connection) or die(mysql_error());
						                  	while($row = mysql_fetch_assoc($cast_arr)){
						                  		 $actor_name = "<a href=\"view_actor.php?id=".$row["id"]."\">".$row["name"]."</a>";
						                  	echo "<tr><td>" . $actor_name ."</td><td> ".$row["role"]."</td></tr>";
				              				//echo  $row["name"] ." " .$row["role"] .;
				              				}

				              		mysql_free_result($cast_arr);
						                  
						                
						                    ?>

								 	 </tbody>


								 </table>
							</div>
							<hr>
							<!--rating -->



							



							<div class="container" style="margin-top: 50px;text-align: center" >
								<h3  style="margin-bottom: 10px;"> User Rating </h3> 
									<?php
										$rating_query = "SELECT avg(rating)  FROM Review WHERE mid = $id ;";
						                 $rating_arr = mysql_query($rating_query,$db_connection) or die(mysql_error());
						                 $row = mysql_fetch_row($rating_arr);
						                 if($row[0]==""){
						                 	echo "<p>No Average Score Right Now </p>";
						                 }
						                 else{
						                 echo "<p>the average socre is: $row[0]</p>";
						             	 }

				              			mysql_free_result($rating_arr);


									?>
								
							</div>

							<hr>

							<div class="container" style="margin-top: 50px;" >
								<h3  style="margin-bottom: 10px;text-align: center"> Review </h3> 
									<?php
										 $comment_query = "SELECT name,rating, time, comment FROM Review  WHERE mid = $id ;";
						                 $comment_arr = mysql_query($comment_query,$db_connection) or die(mysql_error());
						              //   $row = mysql_fetch_row($comment_arr);
						                 
							                 while($row = mysql_fetch_assoc($comment_arr) ){

								                 

								                 	echo "<div><p><b>".$row["name"]."</b> rates this movie with score <b> ".$row["rating"] ."</b> and left a review at ". $row["time"]."</p></div>";

													echo "<div><p><b>comment: </b>". $row["comment"]."</p></div>";
								                 
								              

								                 	
							             	}
						             	
						             	if(mysql_num_rows($comment_arr)==0){
						             		echo "<div>No Comment is Found for This Movie</div>" ;
						             	}

				              			mysql_free_result($comment_arr);


									?>
								
							</div>
							<hr>
											
							<div class="container" style="margin-top: 50px;margin-bottom: 50px; margin-left: 30%;">
							    <div class="row justify-content-md-left">
							        <div class="col-md-8">

							          <form action="add_com.php" method="GET">
							             <div class="input-group">	
							             <?php									       
				      						echo "<a class=\"btn btn-outline-success my-2 my-sm-0\" href=\"add_com.php?mid=".$id."\" type=\"submit\" name=\"smallsubmit\">Click to Add a Movie Comment </a>";





				      						?>
							    		</div>
							          </form>

							        </div>
							    </div>
						 	</div>


					</div>
				</div>
			</div>






			<?php

      //establish connection
      $db_connection = mysql_connect("localhost", "cs143", "");
      if(!$db_connection) {
          $errmsg = mysql_error($db_connection);
          print "Connection failed: " . $errmsg . "<br />";
          exit(1);
      }

      //select database
      $db_select = mysql_select_db("CS143", $db_connection);
      if(!$db_select) {
          $errmsg = mysql_error();
          print "Selection failed: " . $errmsg . "<br />";
          exit(1);
      } 

      //get user input
      $smallsearch = mysql_escape_string($_GET["smallsearch"]);
      $keyword_array = explode(' ', $smallsearch);

      //execute query smallserch
      if(isset($_GET['smallsubmit']) && trim($smallsearch)!=""){
          //FOR ACTORS---------------------------
          //find actor results
          echo "<div class=\"container\" style=\"margin-top:30px; text-align: center\"><h3>Actors Found</h3>";
          $actor_query = "SELECT id, last, first, dob FROM Actor WHERE (first LIKE '%$keyword_array[0]%' OR last LIKE '%$keyword_array[0]%')";
          for($i=1; $i<count($keyword_array); $i++){
            $keyword = $keyword_array[$i];
            $actor_query = $actor_query."AND (first LIKE '%$keyword%' OR last LIKE '%$keyword%')";
          }
          $actor_result = mysql_query($actor_query, $db_connection) or die(mysql_error());
          echo "</div>";

          //display result for actor
          
          while ($row = mysql_fetch_assoc($actor_result))
          {
            echo "<div class=\"container\"  style=\" text-align: center\" ><a href=\"view_actor.php?id=".$row["id"]."\">".$row["first"]." ".$row["last"]." ( ".$row["dob"]." )</a></div>";
          }

          mysql_free_result($actor_result);

          //FOR MOVIES---------------------------
          //find movie results
          echo "<div class=\"container\" style=\"margin-top:30px; text-align: center\"><h3>Movies Found</h3>";
          $movie_query = "SELECT id, title, year FROM Movie WHERE title LIKE '%$keyword_array[0]%'";
          for($i=1; $i<count($keyword_array); $i++){
            $keyword = $keyword_array[$i];
            $movie_query = $movie_query."AND title LIKE '%$keyword%'";
          }
          $movie_result = mysql_query($movie_query, $db_connection) or die(mysql_error());
          echo "</div>";

          //display result for movie
          while ($row = mysql_fetch_assoc($movie_result))
          {
            echo "<div class=\"container\" style=\" text-align: center\"><a href=\"view_movie.php?id=".$row["id"]."\">".$row["title"]." ( ".$row["year"]." )</a></div>";
          }
          mysql_free_result($movie_result);

       }


     //close db connection
      mysql_close($db_connection);

    ?>



 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./css/jquery-3.2.1.slim.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>

  </body>

</html>
