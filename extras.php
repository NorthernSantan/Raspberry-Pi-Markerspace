<!DOCTYPE html>
<html>
  <head>
    <title>Extras</title>
    <link href="style.css" rel="stylesheet" type="text/css">
	<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'G-Z30TWKV0GY');
	</script>
  </head>
  <body>
    <div class="header">
			<a href="index.html" class="logo">Raspberry Pi Makerspace</a>
			  <div class="header-right">
			    <a href="index.html">Home</a>
			    <a href="contact.html">Contact</a>
			    <a href="products.html">Products</a>
          <a class="active" href="extras.html">Other projects</a>
			  </div>
		</div>
    <div class="container">
	    <div style="text-align:center">
	      <h1>Extras</h1>
	    </div>
	    <div class="explain">
		    <p>Our devellopers have created this search function using a mysql database with information for chemistry. We hope to set up a search function for easy verification regarding test answers. 
			    This will hopefully reduce the amount of time you spend searching for answers. Currently you cna search by an Element's name or Symbol. We hope to vastly expand our database and we are always looking for suggestions for information that might be needed on a test. 
			    Please visit our contact page and send us your suggestions for what we should add next!</p>
	    </div>
	  <form method="post">
      		<label>Search</label>
      		<input type="text" name="search">
      		<input type="submit" name="submit">
      	</form>
<?php

  $con = new PDO("mysql:host=localhost;dbname=Chemistry",'colin','lego');
  if (isset($_POST["submit"]))
  {
    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM Elements WHERE name = '$str' OR symbol ='$str'");
    //$sth = $con->prepare("SELECT * FROM Elements WHERE name = 'Hydrogen'");

    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();

    if($row = $sth->fetch())
    {
      print("<br><br><br>");
      print("<table>");
      print("<tr>");
      print("<th>Name</th>");
      print("<th>Symbol</th>");
      print("<th>Atomic Number</th>");
      print("<th>Atom</th>");
      print("<th>Charge</th>");
      print("<th>Multivalent</th>");
      print("</tr><tr>");
      print("<td>" . $row->name . "</td>");
      print("<td>" . $row->symbol ."</td>");
      print("<td>" . $row->atomic_number ."</td>");
      print("<td>" . $row->atom . "</td>");
      print("<td>" . $row->charges . "</td>");
      print("<td>" . $row->multivalent . "</td>");
      print("</tr>");
      print("</table>");
    }
    else
    {
      echo "Name Does Not Exist";
    }
  }
?>
  </body>
</html>
