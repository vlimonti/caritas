<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>4 King</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ url('css/site.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/headers.css') }}">
</head>
<body>
	<div class="container">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
		  	<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
				<img src="{{ url('images/F.png') }}" alt="Logo" width="30%;">
		  	</a>
	
		  	<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<li><a href="{{ route('site.home') }}" class="nav-link px-2 link-secondary">Home</a></li>
				<li><a href="{{ route('site.about') }}" class="nav-link px-2 link-dark">Sobre</a></li>
				<li><a href="{{ route('site.plans') }}" class="nav-link px-2 link-dark">Planos</a></li>
		  	</ul>
	
		  	<div class="col-md-3 text-end">
				<a href="{{ route('login') }}">
					<button type="button" class="btn btn-outline-primary me-2">Login</button>
			  	</a>
		  	</div>
		</header>
	</div>

<div class="demo">
    <div class="container">
    	@yield('content')
    </div>
</div>

</body>
</html>