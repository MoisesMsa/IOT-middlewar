<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>IOT</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
	<div class="container">
	    <a class="navbar-brand" href="#"><i class="font-weight-bold">IOT</i></a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#corNavbar02" aria-controls="corNavbar02" aria-expanded="false" aria-label="Alterna navegação">
	      <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse float-rigth" id="corNavbar02">
	      <ul class="navbar-nav mr-auto">
	        <li class="nav-item">
	          <a class="nav-link" href="#">Sair</a>
	        </li>
	      </ul>
	    </div>
	</div>
  </nav>


	<div class="container">
		<section class="content">
			  <?php                    
				if(isset($_view) && $_view)
			    	$this->load->view($_view);
			   ?>   
		</section>
	</div>
</body>
</html>
