<!DOCTYPE html>
<head>
     <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/projetbdd/web/medh/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="/projetbdd/web/medh/css/style.css" />
		<script src="/projetbdd/web/medh/js/cufon-yui.js" type="text/javascript"></script>
		<script src="/projet/web/medh/js/ChunkFive_400.font.js" type="text/javascript"></script>
		
   <script src="/projetbdd/web/medh/script.js"></script>
    <script src="/projetbdd/web/medh/gestion.js" > </script>
    <script src="/projetbdd/web/medh/jquery.js" > </script>
    <script src="/projetbdd/web/medh/jquery-ui.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
		function submitForm() {
				
				/*alert('texte');
			   var frm = document.getElementsByID('frmsf');
			  */
			  if(document.getElementsByName('nomf')[0].value="" && document.getElementsByName('mocle')[0].value="" && document.getElementsByName('nomau')[0].value="" && document.getElementsByName('datef')[0].value=""){
			   alert('vide');
			   return false; // Prevent page refresh
			   }
			   else
			   {
			   alert('set');
			   return true;
			   }
			}
		</script>
   
<title>Pcloud-{{nom}}</title>

<link rel="stylesheet" type="text/css" href="/projetbdd/web/medh/gestion.css">
</head>
<body id="gest">
{%  include 'web/medh/model3.php' %}
      {% if  error  is defined %}
    <p align="center" style="font-size:17px;position:relative;top:120px;color:#00FF00;text-shadow: none !important;">{{u}}</p>
    {% endif %}
   
    <div id='cssmenu'>
<ul>
   <li><a href="/projetbdd/acceuiluser"><span >Accueil</span></a></li>
    
  <li ><a  href="/projetbdd/recuptab"><span>Afficher tous les fichiers</span></a></li>
  
    <li ><a  href="/projetbdd/modifierUser1"><span>Modifier les coordonnes</span></a></li>
    
   <li class='last'><a href='/projetbdd/deconnect' ><span>Deconnexion</span></a></li>
</ul>
</div>


    {% if  acc is defined %}
  <fieldset class="sot" style="border: medium solid #BDB76B;width:53%;margin-left:21%;height:325px;margin-top:2%;margin-bottom:4%">
<p  id="cache" align="center" style="font-family:Comic Sans MS;position:relative;top:105px;" ><span style="color:black;font-weight:bold;font-size:200%;text-shadow: none !important;">Bienvenue <span id=""style="color:#00FF00">{{nom}}</span></span><span style="color:white;text-shadow: none !important;">   dans votre espace personnel.Pour profiter au mieux  de votre </span> <span style="color:black;font-weight:bold;font-size:200%;text-shadow: none !important;">Pcloud</span> </span><span style="color:white;text-shadow: none !important;">servez vous des onglets au dessus.</span></p>
 
    </fieldset>
 {%  endif  %}
 
 
	
	  {% if  modreus is defined %}
   <p  id="cache" align="center" style="font-family:Comic Sans MS;position:relative;top:105px;" >
   <span style="color:green;font-weight:bold;font-size:200%;text-shadow: none !important;">{{modreus}}</span>
   </p>
 {%  endif  %}
 
 
 {% if  cherch is defined %}
 {% endif %}
  {% if  resmo is defined %}
	<div id="cherch" >
		  <fieldset class="sot" style="border: medium solid #BDB76B;width:41%">
		   <h3 id="fic" style="text-shadow: none !important;" > Modification des coordonees de {{nom}}</h3>
		   <form action="/projetbdd/modifierUser2"   method="post" id="frmsf">
	
			
		 <p style="padding-left:140px;padding-top:6px;">
             <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">N</span><span style="color:white;text-shadow: none !important;">om:</span></label>
			 </p>
   <p  style="padding-left:135px;padding-top:0px;">
   {% for uut in resmo %}
		   <input   class="yes" type="text" name="prenomutilisateur"  value="{{uut['prenom']}}" style="width:295px;height:30px;" />
		    {% endfor%} 
			</p>
	
			
			 <p style="padding-left:140px;padding-top:6px;">
             <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">M</span><span style="color:white;text-shadow: none !important;">ail:</span></label>
			 </p>
   <p  style="padding-left:135px;padding-top:0px;">
     {% for uut in resmo %}
		   <input   class="yes" type="text" name="mailutilisateur"  value="{{uut['mail']}}"  style="width:295px;height:30px;" />
		{% endfor%}		   
		   </p>
			
			                 <input  class="bottom1" type="submit"  value="valider" onclick="submitForm()"/>
			                    </p>
					
			</form>
	</fieldset>
		    
	</div>

 {% endif %}
 	 {% if  disponible  is defined  %}


 

 <div id="tab" >

      <br>
<div class="tblfich" style="width: 85%;text-align: center;margin-left: auto; margin-right: auto;height:500px;overflow: auto;">
	<br>
	 <h3 id="fic" style="font-family:Comic Sans MS;text-shadow: none !important;color:white" > Listes des Documents Disponibles </h3>

<div id="cherch" >
      <fieldset style="margin-left: auto;margin-top: 10px;border: 1px solid #000;background: none repeat scroll 0% 0% #2F4F4F;margin-left: auto;margin-right: auto;">
     
<form action="/projetbdd/utilisateur1"   method="post" id="frmsf">

	 <table style="margin-left: auto;margin-right: auto;text-align: center;">
		   <tr>
		   		  <td>
		 <div style="padding-left:13px;padding-top:2px;">
          
		      <input type="submit"  value="Filtrage par Critere" style="height: 28px;cursor: pointer;width: 185px;background: url('/projetbdd/web/medh/my2.jpg') repeat scroll left top #F4F4F4;border-bottom: 1px solid #DDD;border-radius: 20px;color: #FFF;font-size: 18px;margin-top: 16px;"/>
			                    
								</div>
								</td>
		  
 <div style="padding-left:11px;padding-top:0px;">
 <td>
 <table>
 <tr>
 <td>
 <label style="font-family:Comic Sans MS;"><span style="text-decoration:underline;font-weight:bolder;color:black;">N</span><span style="color:white;text-shadow: none !important;">om du fichier </span></label> 
    <br>
          <input class="yes" type="text" name="nomf"  style="width: 175px;height: 24px;"  />
</td>
<td>

		   <label style="font-family:Comic Sans MS;"><span style="text-decoration:underline;font-weight:bolder;color:black;">D</span><span style="color:white;text-shadow: none !important;;">escription:</span></label> 
<br>
		  <input  class="yes" type="text" name="mocle"  style="width: 175px;height: 24px;"  />
     </td>
<td>
        
              <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">A</span><span style="color:white;text-shadow: none !important;">uteur:</span></label>
<br>    	 
		 <input   class="yes" type="text" name="nomau" value="" id="login" style="width: 175px;height: 24px;"/>
		      </td>
<td>
			 <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">D</span><span style="color:white;text-shadow: none !important;">'ate d'édition:</span></label>
			<br>   
			<input   class="yes"type="date" name="datef"  style="width: 175px;height: 24px;" />
		      </td>
</tr>
</table>
		 </td>
		  </div > 

			</tr>
			</table>
			</form>
			
			<br>
</fieldset>

</div>

 {% if  m  is defined and m!=0 %}
	<table  style="width:100%;" id="tabuserfil">

	
		
		<tr id="lignetable">
	<th  ><span  style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%;padding: 0px 0px 7px !important;">Nom du fichier</span></th>
	<th  ><span style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%;padding: 0px 0px 7px !important;">Auteur</span></th>
	<th  ><span style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%;padding: 0px 0px 7px !important;">Description</span></th>
	<th  ><span  style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%;padding: 0px 0px 7px !important;">Date de Parution</span></th>
	<th ><span  style="font-family:Comic Sans MS;font-size:17px;color:yellow;text-align:center;text-shadow: none !important;margin-top:5%;padding: 0px 0px 7px !important;">Telecharger</span></th>
	</tr>
	{% for u in m %}
	<tr>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['nom']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['auteur']}}</span></td>
	<td> <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['description']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['date']}}</span></td>
        {% set h=u['nom']~u['role']%}
	<td class="titfuscham"><a href="/projetbdd/telechargement/{{h}} "target="blank"><img src="/projetbdd/web/medh/dg.gif"  style=" margin-left: auto;margin-right: auto;" alt="telechargement"></a></td>
	</tr>
	{% endfor%} 
	
	 </table>
		  
		  {% endif %}
		  	
    	       {% if  ms  is defined and ms!=0 %}
<div id="res" style="text-align: center;margin-left: auto; margin-right: auto;overflow: auto;">

		<table  style="width:100%;" id="tabuserfil">
		<tr id="lignetable">
	<th  ><h2  style="text-shadow: none !important;color:green;">Nom de document</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:green;">Auteur</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:green;">Description</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:green;">Date de Parution</h2></th>
	<th ><h2  style="text-shadow: none !important;color:#FF9900;">Telecharger</h2></th>
	</tr>
	{% for us in ms %}
	<tr>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{us['nom']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{us['auteur']}}</span></td>
	<td> <span style="font-size:17px ;color:white;text-shadow: none !important;">{{us['description']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{us['date']}}</span></td>
        {% set h=us['nom']~us['role']%}
	<td class="titfuscham"><a href="/projetbdd/telechargement/{{h}} "target="blank"><img src="/projetbdd/web/medh/dg.gif"  style=" margin-left: auto;margin-right: auto;" alt="telechargement"></a></td>
	</tr>
	{% endfor%} 
	
		

		
</div>
    

	   {% if  aucunfichier  is defined and aucunfichier !=0 %}
		 
		 <h2 style="color:red; text-align:center;margin-left:auto;margin-left:auto;margin-top:15px;">{{aucunfichier}}</h2>
		 {% endif %}

		 

	
	  
		</table>
		
		</div>
		
		
		
		
		
		
		{% endif %}	 
    </div>
   {% endif %}	 
	
	<table width="100%"  align="center" style="margin-top:25%;">
<tr bgcolor="#d2d2ff">

</tr>
</table>
   </div>
</div >
{%  include 'web/medh/model2.php' %}

</body>
</html>