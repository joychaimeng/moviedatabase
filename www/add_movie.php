<!doctype html>
<html>
<title>Add Moive</title>
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
			    	<form class="form-inline my-2 my-lg-0"   action="search.php" method="GET">
				      <input type="text" class="form-control mr-sm-2" name="smallsearch" type="search" placeholder="Search..." aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smallsubmit">Search</button>
				    </form>
	  			</div>
			</nav>

			<div class="container" style ="margin-left:5%;margin-top: 1%">
			<h2 style="margin-bottom: 20px;"> Add a Movie to Database </h2>
			<div class="row justify-content-md-left">
			<div class="col-md-8">

			<form action="./add_Movie.php" method="GET">

            <div class="form-group row">
              
              <div class="col-sm-8">
              	<label class="col-sm-4 col-form-label">Title * </label>
                <input type="text" class="form-control" name="title" maxlength="50">
              </div>
            </div>

            <div class="form-group row">
              
              <div class="col-sm-8">
              	<label class="col-sm-4 col-form-label">Year * </label>
                <input type="text" class="form-control" name="year" maxlength="4">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-8">
              <label class="col-sm-4 col-form-label">Company</label>

                <input type="text" class="form-control" name="company" maxlength="50">
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-8">
              <label class="col-sm-8 col-form-label">MPAA Rating</label>

                <select class="form-control" name="rating">
                  <option value="G">G</option>
                  <option value="PG">PG</option>
                  <option value="PG-13">PG-13</option>
                  <option value="R">R</option>
                  <option value="NC-17">NC-17</option>
                  <option value="surrendere">surrendere</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-10 col-form-label">Genre (You may select multiple genres for a movie)</label>
              <div class="col-sm-10">

		            <div class="form-check form-check-inline">
		              <label class="form-check-label">
		                <input class="form-check-input" type="checkbox" name="genre_Action" value="Action">Action</input>
		              </label>
		            </div>
		            <div class="form-check form-check-inline">
		              <label class="form-check-label">
		                <input class="form-check-input" type="checkbox" name="genre_Adult" value="Adult">Adult</input>
		              </label>
		            </div>
		            <div class="form-check form-check-inline">
		              <label class="form-check-label">
		                <input class="form-check-input" type="checkbox" name="genre_Adventure" value="Adventure">Adventure</input>
		              </label>
		            </div>
		            <div class="form-check form-check-inline">
		              <label class="form-check-label">
		                <input class="form-check-input" type="checkbox" name="genre_Animation" value="Animation">Animation</input>
		              </label>
		            </div>
		            <div class="form-check form-check-inline">
		              <label class="form-check-label">
		                <input class="form-check-input" type="checkbox" name="genre_Comedy" value="Comedy">Comedy</input>
		              </label>
		            </div>

            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Crime" value="Crime">Crime</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Documentary" value="Documentary">Documentary</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Drama" value="Drama">Drama</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Family" value="Family">Family</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Fantasy" value="Fantasy">Fantasy</input>
              </label>
            </div>

            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Horror" value="Horror">Horror</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Musical" value="Musical">Musical</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Mystery" value="Mystery">Mystery</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Romance" value="Romance">Romance</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Sci-Fi" value="Sci-Fi">Sci-Fi</input>
              </label>
            </div>

            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Short" value="Short">Short</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Thriller" value="Thriller">Thriller</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_War" value="War">War</input>
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="genre_Western" value="Western">Western</input>
              </label>
            </div>

        </div>
        	<div
        	<small class="form-text text-muted"> * are required area </small>
			</div>
				            
			<div class="container" style ="margin-left:20%;margin-top: 1%">
            <button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">Click to Add</button>
           </div>
          </form>

        </div>
      </div>
    </div>

    <?php
      $db_connection = mysql_connect("localhost", "cs143", "");
      if(!$db_connection) {
          $errmsg = mysql_error($db_connection);
          print "Database connection error: " . $errmsg . "<br />";
          exit(1);
      }

      $db_select = mysql_select_db("CS143", $db_connection);
      if(!$db_select) {
          $errmsg = mysql_error();
          print "Database selection error: " . $errmsg . "<br />";
          exit(1);
      } 

      //new movie ID
      $max_ID_query = "SELECT id FROM MaxMovieID";
      $maxIDresult = mysql_query($max_ID_query, $db_connection) or die(mysql_error());
      $maxID = mysql_fetch_array($maxIDresult)[0];
      $newID = $maxID + 1;
      // input
      $title=mysql_escape_string(trim($_GET["title"]));
      $year=$_GET["year"];
      $company=mysql_escape_string(trim($_GET["company"]));
      $rating=$_GET["rating"];
      $genre=$_GET["genre"];

      if(isset($_GET['submit'])){
        if($title=="" || $year=="" || $year<1850 || $year>2020){
          echo "<div class=\"container\" style=\"margin-top:30px\"><h4>Invalid Input!</h4>";

          if($title=="")  {
           echo "<p>Please enter a valid movie title.</p>";
       		}

          if($year=="" || $year<1850 || $year>2020) { 
          	echo "<p>Please enter a valid production year between 1850 and 2020.</p>";
          	}
          	echo "</div>";
          }
        //execute query
        else{
          //update Movie table
          $movie_query = "INSERT INTO Movie (id, title, year, rating, company) VALUES('$newID', '$title', '$year', '$rating', '$company')";
          $result = mysql_query($movie_query, $db_connection) or die(mysql_error());

          //update MovieGenre table
          $genre_arr=["Action", "Adult", "Adventure", "Animation", "Comedy", "Crime", "Documentary", "Drama", "Family", "Fantasy", "Horror", "Musical", "Mystery", "Romance", "Sci-Fi", "Short", "Thriller", "War", "Western"];

          //update MaxMovieID table
          $update_maxMovieID_query = "UPDATE MaxMovieID SET id=$newID WHERE id = $maxID";
          mysql_query($update_maxMovieID_query, $db_connection) or die(mysql_error());

          
          for ($i = 0; $i < count($genre_arr); $i++) {
              $genre = $genre_arr[$i];
              if (isset($_GET["genre_" . $genre])) {
                $genre_Query = "INSERT INTO MovieGenre (mid,genre) VALUES ($newID, '$genre')";
                 $genreResult = mysql_query($genre_Query, $db_connection) or die(mysql_error());
              } 
          }
          //output results
          echo "<div class=\"container\" style=\"margin-top:0px\"><p>New movie added!</p></div>";
        }
      }
      //close db connection
      mysql_close($db_connection);
    ?>

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

      //execute query smallsearch
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


	<script src="./css/jquery-3.2.1.slim.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>

  	
  </body>
</html>
