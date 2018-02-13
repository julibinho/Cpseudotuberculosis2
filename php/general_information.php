Sélectionnez


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="general_information.css"  />
	<title>Onglets</title>
	<style>
		#onglets{
			display: none;
		}
		#onglets li{
			position: relative;
			float: left;
			list-style: none;
			padding: 2px 5px 7px;
			margin-right: 5px;
			border: 1px solid #1175AE;
			cursor: pointer;
			background-color: #EEEEEE;
			color: #0D5995;
			z-index: 1;
		}
			#onglets .actif{
			border-bottom: none;
			font-weight: bold;
			z-index: 10;
		}
			#contenu{
			clear: both;
			position: relative;
			margin: 0 20px;
			padding: 10px;
			border: 5px solid #0D5995;
			z-index: 5;
			top: -6px;
			background-color: #EEEEEE;
			color: #0F67A1;
			width: 900px;
			overflow: hidden;
			border-radius: 15px;
		}
	</style>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
		$(function() {
			$('#onglets').css('display', 'block');
			$('#onglets').click(function(event) {
				var actuel = event.target;
				if (!/li/i.test(actuel.nodeName) || actuel.className.indexOf('actif') > -1) {
					alert(actuel.nodeName)
					return;
				}
				$(actuel).addClass('actif').siblings().removeClass('actif');
				setDisplay();
			});
			function setDisplay() {
				var modeAffichage;
				$('#onglets li').each(function(rang) {
					modeAffichage = $(this).hasClass('actif') ? '' : 'none';
					$('.item').eq(rang).css('display', modeAffichage);
				});
			}
			setDisplay();
		});
	</script>
</head>
<body>
<div id="bloc_page">
<header> 
		<div id="titre" >

			<div id="logo">
<!--
				<img border="0" src="/home/julianab/Desktop/sana/o.jpg" alt="" hspace="0">
				<img border="0" src="/home/julianab/Desktop/sana/v.jpg" alt="" hspace="0">
				<img border="0" src="/home/julianab/Desktop/sana/e.jpg" alt="" hspace="0">
				<img border="0" src="/home/julianab/Desktop/sana/d.jpg" alt="" hspace="0">
				<img border="0" src="/home/julianab/Desktop/sana/b.jpg" alt="" hspace="0">
-->
				<h1> OveDB </h1> 
			</div>
		</div>         
	</header>
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
	<ul id="onglets">
		<li class="actif">General Information</li>
		<li>Fonction</li>
		<li>Homology</li>
		<li>Pathogenicity</li>
	</ul>
	<div id="contenu">
		<div class="item">
			<h2>Premier onglet</h2>
            <p>
		<label for ="geneID" > <b> Protein ID : </b> </label> <input type = "hidden" name="geneID" id="geneID"> <b> 
<?php
   $host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT g.geneID FROM genes g where g.geneID="'.$_GET['geneID'].'"  ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
    while($row = mysqli_fetch_array($result)) { 

	echo $row["geneID"] ; } 
?>  </b> </label> 
    	    </p>
	    <p>
		<label> <b> taxon : </b> </label> <label> <b> <?php 
$host = 'localhost';
    $user = 'root';
    $pass = 'bactu217'; 
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT g.taxon FROM genes g where g.geneID="'.$_GET['geneID'].'" ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );   
while($row = mysqli_fetch_array($result)) { 

echo $row["taxon"] ; } ?> </b> </label> 
    	    </p>
	    <p>
		<label> <b> strainID : </b> </label> <label> <b> <?php 
$host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT s.strainID FROM strains s , genes g where g.strainID=s.strainID and g.geneID="'.$_GET['geneID'].'" ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
while($row = mysqli_fetch_array($result)) { 

echo $row["strainID"] ; }  ?> </b> </label> 
    	    </p>
	    <p>
		<label> <b> Biovar : </b> </label> <label> <b> <?php $host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT s.biovar FROM genes g , strains s  where g.strainID=s.strainID and g.geneID="'.$_GET['geneID'].'"  ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
 while($row = mysqli_fetch_array($result)) { 

echo $row["biovar"] ; } ?> </b> </label> 
    	    </p>
     
		</div>
		<div class="item">
			<h2>Deuxième onglet</h2>

<p>
		<label for ="geneID" > <b> Pfam Domain Name : </b> </label> <input type = "hidden" name="geneID" id="geneID"> <b> 
<?php
   $host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT g.geneID FROM genes g where g.geneID="'.$_GET['geneID'].'"  ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
    while($row = mysqli_fetch_array($result)) { 

	echo $row["geneID"] ; } 
?>  </b> </label> 
    	    </p>
	    <p>
		<label> <b> taxon : </b> </label> <label> <b> <?php 
$host = 'localhost';
    $user = 'root';
    $pass = 'bactu217'; 
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT g.taxon FROM genes g where g.geneID="'.$_GET['geneID'].'" ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );   
while($row = mysqli_fetch_array($result)) { 

echo $row["taxon"] ; } ?> </b> </label> 
    	    </p>
	    <p>
		<label> <b> strainID : </b> </label> <label> <b> <?php 
$host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT s.strainID FROM strains s , genes g where g.strainID=s.strainID and g.geneID="'.$_GET['geneID'].'" ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
while($row = mysqli_fetch_array($result)) { 

echo $row["strainID"] ; }  ?> </b> </label> 
    	    </p>
	    <p>
		<label> <b> Biovar : </b> </label> <label> <b> <?php $host = 'localhost';
    $user = 'root';
    $pass = 'bactu217';
    $db = 'Cpseudotuberculosis';
    $link = mysqli_connect ($host,$user,$pass) or die ('Erreur : '.mysqli_connect_error() );
    mysqli_select_db($link,$db) or die ('Erreur :'.mysqli_connect_error());
    $select = 'SELECT s.biovar FROM genes g , strains s  where g.strainID=s.strainID and g.geneID="'.$_GET['geneID'].'"  ' ;
    $result = mysqli_query($link,$select) or die ('Erreur SQL ! '.mysqli_connect_error() );  
 while($row = mysqli_fetch_array($result)) { 

echo $row["biovar"] ; } ?> </b> </label> 
    	    </p>

		</div>
		<div class="item">
			<h2>Troisième onglet</h2>
		</div>
	</div>
</div>
</body>
</html>

