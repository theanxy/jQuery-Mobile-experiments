{* 
    Ogólny szablon aplikacji.
    
    @package index.tpl
    @author Wojciech Zając
    @version 1.2 23.09.2011
*}
<!DOCTYPE html> 
<html> 
	<head> 
	<title>USOS — {$title}</title> 
	<meta charset=utf-8>
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<link rel="stylesheet" href="_ui/css/jquery.mobile-1.0b3.css" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&subset=latin,latin-ext" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="_ui/css/main.css" />
	<script type="text/javascript" src="_ui/js/jquery-1.6.3.min.js"></script>
	<script type="text/javascript" src="_ui/js/main.js"></script>
	<script type="text/javascript" src="_ui/js/jquery.mobile-1.0b3.min.js"></script>
</head> 

<body data-role="page">

	<div class="container">

		<div data-role="header">
{if $smarty.get.wyswietl != ''}
			<a href="./" data-icon="arrow-l">Główna</a>
			<!-- http://mrgan.tumblr.com/post/10492926111/labeling-the-back-button -->
{/if}
			<h1>{$title}</h1>
{if !empty($smarty.session.uzytkownik)}
			<a href="?wyswietl=wyloguj" class="wyloguj">Wyloguj</a>
{/if}
		</div><!-- /header -->

		<div data-role="content">

{include file="inner/$layout.tpl"}

		</div><!-- /content -->

		<div data-role="footer">
			{if !empty($smarty.session.uzytkownik)}
				<h4>{$smarty.session.uzytkownik.imie} {$smarty.session.uzytkownik.nazwisko} ({$smarty.session.uzytkownik.typ|capitalize})</h4>
			{else}
				<h4>Niezalogowany!</h4>
			{/if}
		</div><!-- /footer -->
	</div>
</html>