<!DOCTYPE html >
<html>
    <head>
        <title>cloud uvsq</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="/web/css/style.css" />
		
    </head>
    <body>
		<div class="wrapper">
			<h1>Pcloud UVSQ</h1>
			<h2>profiter de vos documents</h2>
			
			 {% if etape1 is defined %}
                	<div  class="form_wrapper1">
                  <form class="register" action="/inscription" method="post">
                      
                     
                     
                   
				
						<h3>Inscription</h3>
                          
						<div class="column">
							<div>
								<label>Nom :</label>
								<input type="text" name="nom" />
								<span class="error">This is an error</span>
                                
							</div>
                            <label>Email:</label>
								<input type="text" name="mail" />
								
							
						</div>
						<div class="column">
							<div>
								<label>Prenom:</label>
								<input type="text"/ name="prenom">
							
							</div>
							<div>
								<label>Mot de passe:</label>
								<input type="password" name="pass"/>
								
							</div>
						</div>
						<div class="bottom">
							<div class="remember">
								
								<span>Bienvenue dans Pcloud</span>
							</div>
							<input type="submit" value="S'enregistrer" />
							<a href="index.php" rel="login" class="linkform">Vous avez déjà un compte? identifier vous ici</a>
							
						 </div>
                      
					</form>
           </div>
                        {% endif %}
                  
                      {% if etape2 is defined %}
            	<div  class="form_wrapper">
					<form class="login active" action="" mehode="">
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" />
							
						</div>
						<div>
							<label>Password: <a href="" rel="forgot_password" class="forgot linkform">Forgot your password?</a></label>
							<input type="password" />
							
						</div>
						<div class="bottom">
							<div class="remember"><span>Bienvenue dans Pcloud</span></div>
							<input type="submit" value="Se connecter"></input>
							<a href="/register" rel="register" class="linkform">You don't have an account yet? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
                      </div>
                        {% endif %}
                  {% if etape3 is defined %}
					<form class="forgot_password">
						<h3>Forgot Password</h3>
						<div>
							<label>Username or Email:</label>
							<input type="text" />
							<span class="error">This is an error</span>
						</div>
						<div class="bottom">
							<input type="submit" value="Send reminder"></input>
							<a href="index.html" rel="login" class="linkform">Suddenly remebered? Log in here</a>
							<a href="/register" rel="register" class="linkform">You don't have an account? Register here</a>
							<div class="clear"></div>
						</div>
					</form>
				</div>
				<div class="clear"></div>
          {% endif %}
			</div>
			<a class="back" href="http://tympanus.net/codrops/2011/01/06/animated-form-switching/">back to the Codrops tutorial</a>
		
		

		
    </body>
</html>