<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
	<link rel="stylesheet" href="site.css" />
        <title> search cog </title>
    </head>
    
<body>	
	<header> 
		<div id="titre" >
			<div id="logo">
				<img src="images/OvDB.png" alt="OvDB" />
				<h1> OveDB </h1> 
			</div>
		</div>
	<nav>
		<div class="menu">	
			<ul>
 				<li><a href="#">Item 1</a></li>
 				<li><a href="#">Item 2</a></li>
 				<li><a href="#">Item 3</a></li>
				<li><a href="#">Item 4</a></li>
			</ul>
		</div>
	</nav>
	</header>
	
	<section>
    	<form method="post" action="traitement.php">
	<h1>  Search </h1>
    	<p>
	<label for="idprot">ID protein</label> <input type="text" name="idp" id="idprot" placeholder="Ex : ADL19909.1" />
    	</p>
	<p> 
		<label for="strain">Strains</label> 
	   	<table  name="strain" id="strain" >
		    <td width="500" class="style1">
			    <select name="strain" id="strain" > 
				<?php		
					// on se connecte à MySQL
					$db = mysqli_connect("localhost", "root", "bactu217");
					// on sélectionne la base
					mysqli_select_db($db,'Cpseudotuberculosis');
					$sql = "SELECT strainID from strains  ";
					$req = mysqli_query($db,$sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysqli_connect_error()); ?>
					    <option> strains </option>
					    <?php while ($donnees = mysqli_fetch_assoc($req))
					    {
    						//Liste déroulante 
    						echo'<option name="strain" id="strain" value ="'.$donnees['strainID'].'">'.$donnees['strainID'].'</option>'; 
    					     }
    				    ?> 
    			   </select> 
    		   </td>
             </table>
        </p>
	<section>
  	<p>
		<button type= "submit"> Search </button>
  	</p>
  	</section>
	</form>
	</section>

</body>
</html>
