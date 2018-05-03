<!doctype html>
<html>
<title>Add Actor Movie Relation</title>
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
				    <form class="form-inline my-2 my-lg-0"  action="search.php" method="GET">
				      <input type="text" class="form-control mr-sm-2" name="smallsearch" type="search" placeholder="Search..." aria-label="Search">
				      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smallsubmit">Search</button>
				    </form>
	  			</div>
			</nav>

			<div class="container" style ="margin-left:5%;margin-top: 1%">
			<h2 style="margin-bottom: 20px;"> Add an Actor-Movie Relation to Database </h2>
			<div class="row justify-content-md-left">
			<div class="col-md-8">

			<form action="./add_actor_movie.php" method="GET">

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

              //dropdown menus
              $actor_query = "SELECT id, first, last, dob FROM Actor ORDER BY first";
              $actor_arr = mysql_query($actor_query, $db_connection) or die(mysql_error());
              $selectActor = "";

              if (mysql_num_rows($actor_arr) > 0){
                while ($row = mysql_fetch_row($actor_arr)) {
                  $id = $row[0];
                  $first = $row[1];
                  $last = $row[2];
                  $dob = $row[3];
                  $dod = $row[4];
                  $selectActor.="<option value=\"$id\">".$first." ".$last." ( Born on ".$dob." ) </option>";
                }
                mysql_free_result($actor_result);
              }

              $movie_query = "SELECT id, title, year FROM Movie ORDER BY title";
              $movie_arr = mysql_query($movie_query, $db_connection) or die(mysql_error());
              $selectMovie = "";

              if (mysql_num_rows($movie_arr) > 0){
                while ($row = mysql_fetch_row($movie_arr)) {
                  $id = $row[0];
                  $title = $row[1];
                  $year = $row[2];
                  
                  $selectMovie.="<option value=\"$id\">".$title." ( Produced in ".$year." )</option>";
                }
                mysql_free_result($movie_result);
              }
              mysql_close($db_connection);
              
            ?>

            <div class="form-group row">
              <div class="col-sm-8">
               <label class="col-sm-4 col-form-label">Movie</label>
               
                <select class="form-control" name="mid">
                  <?=$selectMovie?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-8">
               <label class="col-sm-4 col-form-label">Actor</label>
               
                <select class="form-control" name="aid">
                  <?=$selectActor?>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-sm-8">
               <label class="col-sm-4 col-form-label">Role</label>
               
                <input type="text" class="form-control" name="role" maxlength="50">
              </div>
            </div> 

            <div class="container" style ="margin-left:20%;margin-top: 1%">
            <button type="submit" name="submit" class="btn btn-outline-success my-2 my-sm-0">Click to Add</button>
           </div>

          </form>

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
      $mid=mysql_escape_string($_GET["mid"]);
      $aid=mysql_escape_string($_GET["aid"]);
      $role=mysql_escape_string(trim($_GET["role"]));

      //check form input
      if(isset($_GET['submit'])){
          //update MovieActor table
          $query = "INSERT INTO MovieActor (mid, aid, role) VALUES('$mid', '$aid', '$role')";
          $result = mysql_query($query, $db_connection) or die(mysql_error());

          //output results
          echo "<div class=\"container\" style=\"margin-top:30px\"><p>New movie-actor relation added!</p></div>";
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


	<script src="./css/jquery-3.2.1.slim.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>

  	
  </body>
</html>
