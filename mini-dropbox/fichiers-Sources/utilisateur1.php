


<!DOCTYPE html>
<html>
<head>
<title>Pcloud-Gestion de données</title>

 <style type="text/css">
*{
	margin:0;
	padding:0;
}
body{
	/*font-family:"Trebuchet MS", "Myriad Pro", Arial, sans-serif;
	font-size:14px;
	background:#f4f4f4 url(web/images/bg.gif) repeat top left;
	color:#333;
	text-shadow:1px 1px 1px #fff;
	overflow-y:scroll;*/
}
#bodyuser {
	font-family:"Trebuchet MS", "Myriad Pro", Arial, sans-serif;
	font-size:14px;
	background:  url(/web/my2.jpg) repeat;
	color:#333;
	text-shadow:1px 1px 1px #fff;
	
}
h1{
	font-size:56px;
}
h2{
	font-size:20px;
	padding:0px 0px 40px 0px;
	color:#aaa;
}
h2 span{
	color:#ffa800;
}
a{
	color:#777;
}
a:hover{
	color:#222;
}
p{
	padding:5px 0px;
}
.wrapper{
	width:960px;
	margin:20px auto;
	min-height:550px;
}
.box{
	width:49%;
}
.left{
	float:left;
}
.right{
	float:right;
}
.clear{
	clear:both;
}
a.back{
	color:#777;
	position:fixed;
	top:5px;
	right:10px;
	text-decoration:none;
	
}
/* Form Style */
.form_wrapper{
	background:#fff;
	border:1px solid #ddd;
	margin:0 auto;
	width:80%;
	font-size:16px;
	-moz-box-shadow:1px 1px 7px #ccc;
	-webkit-box-shadow:1px 1px 7px #ccc;
	box-shadow:1px 1px 7px #ccc;
}
.form_wrapper h3{
	padding:20px 30px 20px 30px;
	background-color:#EFF5F5;
	color:#fff;
	font-size:25px;
	border-bottom:1px solid #ddd;
}
.form_wrapper form{
	display:none;
	background:#fff;
}
.form_wrapper .column{
	width:47%;
	float:left;
}
form.active{
	display:block;
}
form.login{
	width:auto;
}
form.register{
	width:auto;
}
form.forgot_password{
	width:auto;
}
.form_wrapper a{
	text-decoration:none;
	color:#777;
	font-size:12px;
}
.form_wrapper a:hover{
	color:#000;
}
.form_wrapper label{
	display:block;
	padding:10px 30px 0px 30px;
	margin:10px 0px 0px 0px;
}
.form_wrapper input[type="text"],
.form_wrapper input[type="password"]{
	border: solid 1px #E5E5E5;
	background: #FFFFFF;
	margin: 5px 30px 0px 30px;
	padding: 9px;
	display:block;
	font-size:13px;
	width:76%;
	background: 
		-webkit-gradient(
			linear,
			left top,
			left 25,
			from(#FFFFFF),
			color-stop(4%, #EEEEEE),
			to(#FFFFFF)
		);
	.ground: 
		-moz-linear-gradient(
			top,
			#FFFFFF,
			#EEEEEE 1px,
			#FFFFFF 25px
			);
	-moz-box-shadow: 0px 0px 8px #f0f0f0;
	-webkit-box-shadow: 0px 0px 8px #f0f0f0;
	box-shadow: 0px 0px 8px #f0f0f0;
}
.form_wrapper input[type="text"]:focus,
.form_wrapper input[type="password"]:focus{
	background:#feffef;
}
#lignetable {
vertical-align: middle;
background: -moz-linear-gradient(center top , #005FBF 5%, #003F7F 100%) repeat scroll 0% 0% #005FBF;
border-color: #000;
-moz-border-top-colors: none;
-moz-border-right-colors: none;
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
border-image: none;
border-width: 0px 1px 1px 0px;
text-align: left;
padding: 7px;
font-size: 10px;
font-family: Arial;
font-weight: normal;
color: #000;
}
.titfus{
color: #FFF;
text-align:center;
margin-left:auto;
margin-right:auto;
font-size: 18px;
}
.titfuscham{

text-align:center;
margin-left:auto;
margin-right:auto;
font-size: 17px;
}
.tblfich tr:nth-child(2n+1) {
vertical-align: middle;
background: -moz-linear-gradient(center top , #FFF 5%, #D3E9FF 100%) repeat scroll 0% 0% #FFF;
border-style: solid;
border-color: #000;
-moz-border-top-colors: none;
-moz-border-right-colors: none;
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
border-image: none;
border-width: 0px 1px 1px 0px;
text-align: left;
padding: 7px;
font-size: 10px;
font-family: Arial;
font-weight: normal;
color: #000;
}

.tblfich tr:nth-child(2n) {
vertical-align: middle;
background:  #FFF;
border-style: solid;
border-color: #000;
-moz-border-top-colors: none;
-moz-border-right-colors: none;
-moz-border-bottom-colors: none;
-moz-border-left-colors: none;
border-image: none;
border-width: 0px 1px 1px 0px;
text-align: left;
padding: 7px;
font-size: 10px;
font-family: Arial;
font-weight: normal;
color: #000;
}
.form_wrapper .bottom{
	background-color:#EFF5F5;
	border-top:1px solid #ddd;
	margin-top:20px;
	clear:both;
	color:#fff;
	text-shadow:1px 1px 1px #000;
}
.form_wrapper .bottom a{
	display:block;
	clear:both;
	padding:10px 30px;
	text-align:right;
	color:#ffa800;
	text-shadow:1px 1px 1px #000;
}
.form_wrapper a.forgot{
	float:right;
	font-style:italic;
	line-height:24px;
	color:#ffa800;
	text-shadow:1px 1px 1px #fff;
}
.form_wrapper a.forgot:hover{
	color:#000;
}
.form_wrapper div.remember{
	float:left;
	width:140px;
	margin:20px 0px 20px 30px;
	font-size:11px;
}
.form_wrapper div.remember input{
	float:left;
	margin:2px 5px 0px 0px;
}
.form_wrapper span.error{
	visibility:hidden;
	color:red;
	font-size:11px;
	font-style:italic;
	display:block;
	margin:4px 30px;
}
.form_wrapper input[type="submit"] {
	background: #e3e3e3;
	border: 1px solid #ccc;
	color: #333;
	font-family: "Trebuchet MS", "Myriad Pro", sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 8px 0 9px;
	text-align: center;
	width: 150px;
	cursor:pointer;
	float:right;
	margin:15px 20px 10px 10px;
	text-shadow: 0px 1px 0px #fff;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0px 0px 2px #fff inset;
	-webkit-box-shadow: 0px 0px 2px #fff inset;
	box-shadow: 0px 0px 2px #fff inset;
}

.form_wrapper input[type="button"] {
	background: #e3e3e3;
	border: 1px solid #ccc;
	color: #333;
	font-family: "Trebuchet MS", "Myriad Pro", sans-serif;
	font-size: 14px;
	font-weight: bold;
	padding: 8px 0 9px;
	text-align: center;
	width: 150px;
	cursor:pointer;
	float:right;
	margin:15px 20px 10px 10px;
	text-shadow: 0px 1px 0px #fff;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	border-radius: 4px;
	-moz-box-shadow: 0px 0px 2px #fff inset;
	-webkit-box-shadow: 0px 0px 2px #fff inset;
	box-shadow: 0px 0px 2px #fff inset;
}
.form_wrapper input[type="submit"]:hover {
	background: #d9d9d9;
	-moz-box-shadow: 0px 0px 2px #eaeaea inset;
	-webkit-box-shadow: 0px 0px 2px #eaeaea inset;
	box-shadow: 0px 0px 2px #eaeaea inset;
	color: #222;
}
#titrfrmuti{
text-align: left;
margin-left: 2%;
color:#808080;
}
  </style>

  <script src="web/jquery.js" > </script>
<script src="web/gestion.js" > </script>
<!--<script>
$(document).ready(function(){
$.post('/controle',function(data){
alert(data);
});
});
</script>-->

<link rel="stylesheet" type="text/css" href="web/gestion.css">

<meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />

        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <!--<link rel="stylesheet" type="text/css" href="web/css/style2.css" />-->
		<script src="web/js/cufon-yui.js" type="text/javascript"></script>
		<script src="web/js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
			
		</script>

</head>
	<body  onload="update();">
	<div  id="bodyuser">

	<table width="100%" cellpadding="5" cellspacing="2" align="center">
<tr bgcolor="#d2d2ff">
<td>
<br><br>
<div>
<h1 id="yh" align="left" style="color:#FFF;font-size:238%;margin-left:31px;float:left;margin-bottom: 47px;">
{%if nom is defined %}
	    <span style="color:red;font-size:250%;float:left"></span>Utilisateur <span style="color:green">mehdi</span></h1>
		{%endif%}
<a style="float: right;color:#727272;margin-right: 10px; font-size:25px;margin-top: 11px;" href="/" >deconnexion</a>
</div>
<br><br>
</td>
</tr>
</table>

<div  style="width: 100%;">

			
			
<div class="content" style="text-align: center;margin-left: auto;margin-right: auto;">
		<div id="form_wrapper" class="form_wrapper" style="width: 86%;">
		
		<form  class="login active" name="formech" action="cherchef" method="post">
						<h3 style="text-align:left;">Filtrage par critere</h3>
						<div style="text-align:center;margin-left:auto;margin-right:auto;">
						<div style="float:left;">
							<label>Nom de document</label>
							<input type="text" name="nomf"/>
							<span class="error">erreur</span>
						</div>
						<div  style="float:left;">
							<label>Mots clés:</label>
							<input type="text" name="motcle"/>
							<span class="error">erreur</span>
						</div>
						<div style="float:left;">
							<label>Auteur:</label>
							<input type="text" name="nomaut"/>
							<span class="error">erreur</span>
						</div>
						<div  style="float:left;">
							<label>Date:</label>
							<input type="text" name="datef"/>
							<span class="error">erreur</span>
						</div>
						</div>
						<div class="bottom">
							<input type="hidden" name="nomutl" value="{{nom}}"/>
							<input type="submit" value="  Chercher" style="float:left;margin-left:10px;"></input>
							<input type="submit"  value="  actualiser" style="float:left;margin-left:10px;"></input>
								<div class="clear"></div>
						</div>
					</form>
		</div>

			
	</div>
<br>

<div class="tblfich" style="width: 85%;text-align: center;margin-left: auto; margin-right: auto;height:500px;overflow: auto;">
	<br>
	 <h3 id="titrfrmuti"><a rel="#" onclick="cherche()"> Liste de tout les documents de </a><span style="text-decoration:underline;color:green;z-index:1000px;">{{nom}}</span></h3>
	<br>

	<table  id="tabuserfil">

	 {% if  m  is defined and m!=0 %}
		
		<tr id="lignetable">
	<th class="titfus">nom fichier</th>
	<th class="titfus">auteur</th>
	<th class="titfus">Description</th>
	<th class="titfus">Date de parution</th>
	<th class="titfus">voir</th>
	</tr>
	{% for u in m %}
	<tr>
	<td class="titfuscham"> {{u['nom']}}</td>
	<td class="titfuscham"> {{u['auteur']}}</td>
	<td class="titfuscham"> {{u['description']}}</td>
	<td class="titfuscham"> {{u['date']}}</td>
	<td class="titfuscham"><a href="./web/dnld.png"  download="./{{u['nom']}}" ><img src="web/dnld.png"  style=" margin-left: auto;margin-right: auto;" ></a></td>
	</tr>
	{% endfor%} 
	 
		 {% else %}
		 <h2 style="color:red; text-align:center;margin-left:auto;margin-left:auto;margin-top:15px;">Fichier non trouvés</h2>
		 
       {% endif %}
		</table>
		
	 
</div>
	
	</div>
	<table width="100%"  align="center" style="margin-top:25%;">
<tr bgcolor="#d2d2ff">
<td>
<h1 style="color:white;font-size:100%;" align="center">
<span style="color:white;font-size:200%;" align="center">&copyUVSQ </span>
</h1>-</td>
</tr>
</table>

	
	<!-- The JavaScript -->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
		function cherche()
{
document.forms["formech"].submit();
}

</script>
   </div>
</body>



</html>

