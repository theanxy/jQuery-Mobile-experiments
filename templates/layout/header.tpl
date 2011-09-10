<!DOCTYPE html> 
<html> 
	<head> 
	<title>USOS — {$title}</title> 
	<meta charset=utf-8>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="_ui/css/jquery.mobile-1.0b3.css" />
	<link rel="stylesheet" href="_ui/css/main.css" />
	<script type="text/javascript" src="_ui/js/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" src="_ui/js/main.js"></script>
	<script type="text/javascript" src="_ui/js/jquery.mobile-1.0b3.min.js"></script>
</head> 

<body data-role="page">

	<div class="container">

		<div data-role="header">
			{if $smarty.get.wyswietl != ''}
				<a href="/" data-icon="home">Powrót</a>
			{/if}
			<h1>{$title}</h1>
		</div><!-- /header -->

		<div data-role="content">