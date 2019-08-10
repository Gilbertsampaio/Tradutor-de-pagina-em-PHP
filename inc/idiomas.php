<div class="idiomas">
	<ul class="list-inline links-list pull-right">
		<li class="dropdown language-selector">
			<a class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
	<?php

		if(!isset($_GET['idioma']) && !isset($_SESSION['idioma'])){
			
			echo '<img style="width: 30px; height: auto" src="img/pt-br.png" />';
			    
		} else if(!isset($_GET['idioma']) && isset($_SESSION['idioma'])){

		    echo '<img style="width: 30px; height: auto" src="img/'.$_SESSION['idioma'].'.png" />';

		} else if(isset($_GET['idioma'])){

			echo '<img style="width: 30px; height: auto" src="img/'.$_GET['idioma'].'.png" />';

		};

	?>
		  </a>
		  <ul class="dropdown-menu pull-right">
		    <li>
		      <a href="?idioma=pt-br">
		        <img style="width: 16px; height: auto" src="img/pt-br.png" />
		        <span>Português</span>
		      </a>
		    </li>
		    <li class="active">
		      <a href="?idioma=en-us">
		        <img style="width: 16px; height: auto" src="img/en-us.png" />
		        <span>English</span>
		      </a>
		    </li>
		    <li>
		      <a href="?idioma=es-es">
		        <img style="width: 16px; height: auto" src="img/es-es.png" />
		        <span>Español</span>
		      </a>
		    </li>
		    <li>
		      <a href="?idioma=fr-fr">
		        <img style="width: 16px; height: auto" src="img/fr-fr.png" />
		        <span>François</span>
		      </a>
		    </li>
		  </ul>
		</li>
	</ul>
</div>