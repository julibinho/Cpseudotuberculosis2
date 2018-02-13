 <html>
    <title>Traitement domain</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="traitement.css"  />
<body> 	
<div id="bloc_page">
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
if ((!empty($_POST['pfamd']) && empty($_POST['pfamn'])) || (!empty($_POST['pfamn']) && !empty($_POST['pfamd'])) )
{
    $host = 'localhost';

    $user = 'root';

    $pass = 'bactu217';

    $db = 'Cpseudotuberculosis';

    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );

    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());

    $select = 'SELECT g.geneID,p.PFAM_DOMAIN_NAME, p.PFAM_ACC_NUMBER,t.strainID,t.biovar ,p.START_DOMAIN,p.END_DOMAIN
		FROM pfam p , sequence s , strains t , genes g
		WHERE  p.PFAM_DOMAIN_NAME="'.$_POST['pfamd'].'"
 		AND t.strainID=g.strainID AND g.sequenceID=s.sequenceID AND s.sequenceID=p.CladeHitID ' ;

    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );

    $total = mysqli_num_rows($result);

    if($total) {

?>    	
<table>
            <tr>
	    <th bgcolor="#669999" ><b>Protein ID</b></th>
	    <th bgcolor="#669999"><b> pfam domain name </b></th>
	    <th bgcolor="#669999"><b> pfam accurate number </b></th>
	    <th bgcolor="#669999"><b> size </b></th>
            <th bgcolor="#669999"><b> strain </b></th>
	    <th bgcolor="#669999"><b> start domain </b></th>
            <th bgcolor="#669999"><b> end domain </b></th>
          </tr>
<?php

        while($row = mysqli_fetch_array($result)) { 
?>
            <tr>
	    <td ><a href="general_information.php?geneID=<?php echo $row["geneID"] ?>">   <?php echo $row["geneID"] ?> </a></td>
	    <td >  <?php echo $row["PFAM_DOMAIN_NAME"] ?> </td>
	    <td > <?php echo $row["PFAM_ACC_NUMBER"] ?>  </td>
	    <td > <?php echo $row["END_DOMAIN"] - $row["START_DOMAIN"] + 1 ?>  </td>
	    <td > <?php echo $row["strainID"] ?>  </td>
            <td > <?php echo $row["START_DOMAIN"] ?>  </td>
	    <td > <?php echo $row["END_DOMAIN"] ?>  </td>

         </tr>
<?php
       } 
?>
        </table>	
	


       
<?php   
}  

    else echo 'Pas d\'enregistrements dans cette table 1...';
   
}

else if ((!empty($_POST['pfamn']) ) && (empty($_POST['pfamd'])) ) {

    $host = 'localhost';

    $user = 'root';

    $pass = 'bactu217';

    $db = 'Cpseudotuberculosis';

    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );

    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());

    $select = 'SELECT g.geneID,p.PFAM_DOMAIN_NAME, p.PFAM_ACC_NUMBER,t.strainID,t.biovar ,p.START_DOMAIN,p.END_DOMAIN
		FROM pfam p , sequence s , strains t , genes g
		WHERE  p.PFAM_ACC_NUMBER="'.$_POST['pfamn'].'"
 		AND t.strainID=g.strainID AND g.sequenceID=s.sequenceID AND s.sequenceID=p.CladeHitID';

    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );

    $total = mysqli_num_rows($result);


    if($total) {

?>

<table>
            <tr>
	    <th bgcolor="#669999"><b>Protein ID </b></th>
	    <th bgcolor="#669999"><b> pfam domain name </b></th>
	    <th bgcolor="#669999"><b> pfam accurate number </b></th>
	    <th bgcolor="#669999"><b> size </b></th>
            <th bgcolor="#669999"><b> strain </b></th>
	    <th bgcolor="#669999"><b> start domain </b></th>
            <th bgcolor="#669999"><b> end domain </b></th>
          </tr>
<?php

        while($row = mysqli_fetch_array($result)) { 
?>
            <tr>
	    <td > <a href="general_information.php?geneID=<?php echo $row["geneID"] ?>">  <?php echo $row["geneID"] ?> </a> </td>	    
	    <td >  <?php echo $row["PFAM_DOMAIN_NAME"] ?> </td>
	    <td > <?php echo $row["PFAM_ACC_NUMBER"] ?>  </td>
	    <td > <?php echo $row["END_DOMAIN"] - $row["START_DOMAIN"] + 1 ?>  </td>
	    <td > <?php echo $row["strainID"] ?>  </td>
            <td > <?php echo $row["START_DOMAIN"] ?>  </td>
	    <td > <?php echo $row["END_DOMAIN"] ?>  </td>
        </tr>
 <?php     } 
?>
        </table>
<?php   } 

    else echo 'Pas d\'enregistrements dans cette table 2...'; 
}
?>
</div>  
</body>
</html>
