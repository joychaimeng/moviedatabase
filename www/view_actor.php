<!doctype html>
<html>
<title>Actor Info</title>
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





					<div class="container" style="margin-top: 50px;text-align: center">
				      <h2 style="margin-bottom: 10px;">Actor Information</h2>
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

				            //execute query
				            if($id!=""){

				            
 							//Actor Info-----------------------
				              echo "<div class=\"container\" style=\"margin-top:30px;\"><h3>Actor Info</h3>";
				              $actor_query = "SELECT last, first, sex,dob, dod FROM Actor WHERE id = $id;";
				              $actor_result = mysql_query($actor_query, $db_connection) or die(mysql_error());
				              $row = mysql_fetch_row($actor_result);
				              $dod = $row[4];
				              if($dod=="")  $dod="Still Alive";

				              //display table
				              echo "<table class=\"table table-bordered\">
				                      <thead>
				                        <tr>
				                          <th scope=\"col\">Name</th>
				                          <th scope=\"col\">Sex</th>
				                          <th scope=\"col\">Date of Birth</th>
				                          <th scope=\"col\">Date of Death</th>
				                        </tr>
				                      </thead>
				                      <tbody>";
				                      
				              //data section
				              echo "<tr><td>" . $row[1] ." ".$row[0]. "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>".$dod."</td></tr>";
				     
				              echo "</tbody></table>";

				              mysql_free_result($actor_result);




				              //MOVIE-----------------------
				              echo "<div class=\"container\" style=\"margin-top:30px\"><h3>Related Movie Info</h3>";
				              $movie_query = "SELECT ma.role, m.id, m.title, m.year FROM MovieActor ma, Movie m WHERE m.id=ma.mid AND ma.aid = $id;";
				              $movie_result = mysql_query($movie_query, $db_connection) or die(mysql_error());

				              //display table
				              echo "<table class=\"table table-bordered\">
				                      <thead>
				                        <tr>
				                          <th scope=\"col\">Movie Title</th>
				                          <th scope=\"col\">Year</th>
				                          <th scope=\"col\">Role</th>
				                        </tr>
				                      </thead>
				                      <tbody>";
				              //data section
				              while($row = mysql_fetch_row($movie_result)) {
				                $title = "<a href=\"view_movie.php?id=".$row[1]."\">".$row[2]."</a>";
				                echo "<tr><td>" . $title . "</td><td>" . $row[3] . "</td><td>" . $row[0] . "</td></tr>";
				              }
				              echo "</tbody></table>";

				              mysql_free_result($movie_result);


				            }

				            //close db connection
				            mysql_close($db_connection);

				          ?>


				        </div>
				      </div>
				    </div>


	<script src="./css/jquery-3.2.1.slim.min.js"></script>
    <script src="./css/popper.min.js"></script>
    <script src="./css/bootstrap.min.js"></script>

  	
  </body>



</html>
