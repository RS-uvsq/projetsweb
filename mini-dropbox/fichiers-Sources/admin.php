
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>cloud uvsq</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="web/css/style.css" />
		<script src="web/js/cufon-yui.js" type="text/javascript"></script>
		<script src="web/js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
    </head>
    <body   style="background: url(/web/my2.jpg) repeat top left;">
		<div class="wrapper">
			<h1>Pcloud UVSQ</h1>
			<h2>Espace de partage de documents</h2>
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
					
					<form class="login active" method="POST"  action="/accueille">
						<h3>Administrateur</h3>
						<div>
							<label>Nom:</label>
							<input type="text" name="nom"/>
							<span class="error">erreur</span>
						</div>
						<div>
							<label>Mot de pass:</label>
							<input type="password" name="password"/>
							<span class="error">erreur</span>
						</div>
						
						<div class="bottom">
							 <a class="back" href="/">Connexion user</a>
							<input type="submit" value="Se connecter"></input>
							<div class="clear"></div>
						</div>
					</form>
				
				</div>

			</div>
			
		</div>
		
{% if message is defined  %}
<p style="position:relative;left:570px;top:320px;color:red;font-weight:bold;">{{message}} </p>
{% endif %}
{%  include 'web/model2.php' %}
    
    </body>
</html>