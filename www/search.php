<!DOCTYPE html>
<html>
	<head>
		<title>Search</title>
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
				    <form class="form-inline my-2 my-lg-0">
				      <input type="text" class="form-control mr-sm-2" name="smallsearch" type="search" placeholder="Search..." aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smallsubmit">Search</button>
				    </form>
	  			</div>
			</nav>


			    		<!--Main search area-->

			<div class="container" style="margin-top: 18%; margin-left: 20%;">
			      <h2 style="margin-bottom: 20px; margin-left:13%">Search for Movie or Actors</h2>
			      <div class="row justify-content-md-left">
			        <div class="col-md-8">

			          <form action="./search.php" method="GET">
			             <div class="input-group">
						      <input type="text" class="form-control" name="bigsearch" aria-label="Text input with dropdown button" placeholder="Search...">
						      <div class="input-group-btn">
						        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Search in...
						        </button>
						        <div class="dropdown-menu dropdown-menu-right">
						    	 <button type="submit" name="search_all" class="dropdown-item">All</button> 

						          <button type="submit" name="search_actor" class="dropdown-item">Actor</button>
						          <button type="submit" name="search_movie" class="dropdown-item">Movie</button> 

						        </div>
						      </div>
			    		</div>
			          </form>

			        </div>
			      </div>
			    </div>













			
		 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./css/jquery-3.2.1.slim.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>

   <?php

      //establish connection
      $db_connection = mysql_connect("localhost", "cs143", "");
      if(!$db_connection) {
          $errmsg = mysql_error($db_connection);
          print "Database connection Error: " . $errmsg . "<br />";
          exit(1);
      }

      //select database
      $db_select = mysql_select_db("CS143", $db_connection);
      if(!$db_select) {
          $errmsg = mysql_error();
          print "Database selection Error: " . $errmsg . "<br />";
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





 	  $bigsearch = mysql_escape_string($_GET["bigsearch"]);
      $keyword_array = explode(' ', $bigsearch);

      //execute query smallserch
      if(isset($_GET['search_actor']) && trim($bigsearch)!=""){
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

       }





      if(isset($_GET['search_movie']) && trim($bigsearch)!=""){
          //FOR ACTORS---------------------------
          //find actor results
         
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






      if(isset($_GET['search_all']) && trim($bigsearch)!=""){
       
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









	</body>
</html>