    <html>
    <title>traitement cog</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="traitement.css"  />
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

<?php	
if(!empty($_POST['idp'])  ) {
    $host = 'localhost';

    $user = 'root';

    $pass = 'bactu217';

    $db = 'Cpseudotuberculosis';

    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );

    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());

    $select = 'SELECT g.geneID,g.taxon,s.strainID,s.biovar FROM strains s,genes g where g.geneID="'.$_POST['idp'].'" and g.strainID = s.strainID ' ;

    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );

    $total = mysqli_num_rows($result);

    if($total) {

?>
        <table >
            <tr>
	    <th bgcolor="#669999"><b> geneID </b></th>
	    <th bgcolor="#669999"><b> taxon </b></th>

            <th bgcolor="#669999"><b> strainID </b></th>

            <th bgcolor="#669999"><b> Biovar </b></th>

          </tr>
<?php
        while($row = mysqli_fetch_array($result)) { 
?>
            <tr>
	    <td > <?php echo $row["geneID"] ?> </td>
	    <td > <?php  echo $row["taxon"] ?> </td>
            <td > <?php echo $row["strainID"] ?> </td>
            <td > <?php echo $row["biovar"] ?>  </td>

         </tr>
<?php
       } 
?>
        </table>
<?php   
}  

    else echo 'Pas d\'enregistrements dans cette table 1...';
   
}

else if (isset($_POST['strain']) && (empty($_POST['idp']) )) {

    $host = 'localhost';

    $user = 'root';

    $pass = 'bactu217';

    $db = 'Cpseudotuberculosis';

    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );

    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());

    $select = 'SELECT g.geneID,g.taxon,s.strainID,s.biovar FROM strains s,genes g where s.strainID="'.$_POST['strain'].'" and g.strainID = s.strainID ' ;

    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );

    $total = mysqli_num_rows($result);


    if($total) {

?>
        <table>
            <tr>
	    <th bgcolor="#669999"><b> geneID </b></th>
	    <th bgcolor="#669999"><b> taxon </b></th>

            <th bgcolor="#669999"><b> strainID </b></th>

            <th bgcolor="#669999"><b> Biovar </b></th>

          </tr>
<?php

        while($row = mysqli_fetch_array($result)) { 
?>
            <tr>
	    <td >  <?php echo $row["geneID"] ?> </td>
	    <td > <?php echo $row["taxon"] ?>  </td>
            <td > <?php echo $row["strainID"] ?> </td>
            <td > <?php echo $row["biovar"] ?>  </td>

         </tr>
<?php
      } 
?>
        </table>
<?php   } 

    else echo 'Pas d\'enregistrements dans cette table 2...'; 
}

?>
</body>
</html>
