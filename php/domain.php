<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
	<link rel="stylesheet" href="domain.css" />
        <title> Protein Domain </title>
    </head>
    
<body>		<div id="bloc_page">
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
</header>
	</nav>
	<section>
    	<form method="post" action="traitement_domain.php">
	<h1>  Search </h1>
    	
	<p>
	<label for="pfamd"> PFAM Domain Name </label> <input type="text" name="pfamd" id="pfamd" placeholder="Ex : ABC_ATPase" />
    	</p>
	<p>
	<label for="pfamn"> PFAM Accurate Number </label> <input type="text" name="pfamn" id="pfamn" placeholder="Ex : PF09818" />
    	</p>
		<button type= "submit"> Search </button>
  	</p>
  	</section>
	</form>
	</section>
</div>
</body>
</html>
