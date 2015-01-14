

<!DOCTYPE html>
<head>
  
   
   <link rel="stylesheet" href="/web/styles.css">
   
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="web/css/style.css" />
		<script src="web/js/cufon-yui.js" type="text/javascript"></script>
		<script src="web/js/ChunkFive_400.font.js" type="text/javascript"></script>
		
   <script src="web/script.js"></script>
    <script src="web/gestion.js" > </script>
    <script src="web/jquery.js" > </script>
    <script src="web/jquery-ui.js"></script>
     <script src="web/state.js"></script>
	  <script src='web/index.js'></script>
    
   
<title>Pcloud-Gestion de données</title>


<!--<script>
$(document).ready(function(){
$.post('/controle',function(data){
alert(data);
});
});
</script>-->
<link rel="stylesheet" type="text/css" href="web/gestion.css">
</head>
<body id="gest"   onload="update();">
{%  include 'web/model1.php' %}
    
   {%  include 'web/menu1.php' %}
    <div id="stat">
<fieldset class="sot" style="border: medium solid #BDB76B
;width:25%;margin-left:0%;height:78px;margin-top:2%;margin-bottom:2%">
     <h3   style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%" >Nombre de Connecté:<span id="nbc" style="color:white;font-weight:bold"></span></h3>
   
</fieldset>
      
    <fieldset class="sot" style="border: medium solid #BDB76B
;width:25%;margin-left:0%;height:78px;margin-top:2%;margin-bottom:2%">
   <h3   style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%" >Nombre de demande:<span id="nbd" style="color:white;font-weight:bold"></span></h3>
    
</fieldset>
    <fieldset class="sot" style="border: medium solid #BDB76B
;width:25%;margin-left:0%;height:78px;margin-top:2%;margin-bottom:2%">
       <h3  style="font-family:Comic Sans MS;font-size:17px;color:#D2B48C;text-align:center;text-shadow: none !important;margin-top:5%" >Nombre d'inscrit:<span  id="nbi"style="color:white;font-weight:bold"></span></h3>
    
</fieldset>
</div>
    {% if vu is defined %}
<p align="center" style="position:relative;top:30px;color:red;">{{vu}}</p>

{% endif %}
    
    
    
    {%  include 'web/listefichier.php' %}
    
 {% include 'web/listeuser.php' %}
    
 {%  include 'web/createlien.php' %}
    
    
    {% if lec is defined %}
<fieldset  class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
<h3 id="fac" style="font-size:17px;color:white;text-shadow: none !important;" >Lien- Groupe utilisateurs-Groupe Fichiers existant:</h3>


     <div class='cs'>
         <ul> 
                             {% for u in lec %}     
                           <li style="font-weight:bold;text-shadow: none !important;background-color:#C0C0C0;color:black;height:30px;margin-left:8%;padding-left:7%;list-style: none;"> {{u['a2']}} <span style="color:red">peut voir </span> {{u['a1']}}</li>
   
                        {% endfor %}
             </ul>
    </div>
                                
</fieldset>
       {% endif %}
 {% if sview is defined %}
  
				<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:2%;margin-bottom:4%">
<h3 id="fac" style="font-size:17px;color:white;text-shadow: none !important;" >Suppression d'un Lien de lecture</h3>	
					<form class="login active" method="POST"  action="/SRelation">

       
                                                       
       <label style="  margin-top:5% !important;
     margin-left:60%;text-shadow: none !important;color:white">Groupe D'utilisateurs: </label>  
                 <div class="tes">      
       <select  name="userg"  id="fileg"  style="  margin-top:2% !important;
     margin-left:61% !important;width:180px;height:34px;text-shadow: none !important;" >
                           <div class="tejs1"> 
                            {% for u in svus %}     
                  <option  value="{{u['id']}}">{{u['name']}}</option>
                        {% endfor %}
        </select>
					</div>	
                        <div class="tejs2"> 
           <label style="color:white;margin-left:25%;text-shadow: none !important;">Groupe De Fichiers:</label>
            <select  name="fileg" id="fileg"    style="margin-left:25%; width:180px;height:34px;text-shadow: none !important;">
                   {% for v in svuf %}     
                   <option  value="{{v['idag']}}">{{v['name']}}</option>
                      {% endfor %}
                      </select>
                        </div>
                 
						
							
							<input class="bt" type="submit" value="Soumettre"></input>
                        
                        
                        
                        
                        
                        
                    
						
					</form>
				
				
</fieldset>
			</div>
			
		
 
{% endif %}       
        

 {% if m is defined %}
{% for u in m %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:435px;margin-top:2%;margin-bottom:2%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >{{u['nom']}}</h3>
    <div id="de">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Nom:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{u['nom']}}</span> </br> </br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Prénom:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{u['prenom']}}</span></br></br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Date de la demande:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{u['date']}}</span></br></br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Email:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{ u['mail']}}</span></br>
</br>

<form action="/subscription/{{u['id']}}" method="GET">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Rôle:</span></br></br>
<div class="radio"> 
{% for u in li %}
    <input type="radio" name="grou" value="{{u['id']}}" ><span  style="color:#FF9900;text-shadow: none !important;">{{u['name']}}</span>
{% endfor %}
</div> 
</br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Decision:</span></br></br>
<input type="radio" name="accept" value="2" ><span  style="color:#FF9900;text-shadow: none !important;">Validé L'inscription</span>
<input type="radio" name="accept" value="3" ><span  style="color:#FF9900;text-shadow: none !important;">Rejeté L'inscription</span>
</div>
 
							
<input type="submit"  value="Soumettre" class="bottom3"/>

                               
   
</form>





</br>
<span style="margin-left:6%;font-weight:bold;text-shadow: none !important;"><span style="color:#A0AEC1">Role par Defaut:</span><span style="color:red;" >Autre</span>
</fieldset>
{% endfor %}
{% else %}
{% if inp is defined and  inp==0 %}
{% else %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:2%;margin-bottom:4%">
				
<p  align="center" style="position:relative;top:105px;" ><span style="color:black;font-weight:bold;font-size:200%;text-shadow: none !important;">Bienvenue</span><span style="color:white;text-shadow: none !important;"> dans votre page administration.Prenez le contrôle de votre</span> <span style="color:black;font-weight:bold;font-size:200%;text-shadow: none !important;">Pcloud</span> </span><span style="color:white;text-shadow: none !important;"> en vous servant  des onglets au dessus.</span></p>
{% if u is defined %}
<p align="center" style="font-size:17px;position:relative;top:120px;color:#00FF00;text-shadow: none !important;">{{u}}</p>

{% endif %}
</fieldset>
      
{% endif %}
{% if ag is defined %}

<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >Ajout D'un Groupe d'utilisateurs </h3>
    
     <form   class="login active" action="/adduserg" method="POST">				
						
							 
				 <input type="texte" name="ng"  style="margin-left:65%;width:200px;height:36px;margin-top:17%" required />
    
						
							
			                 <input class="bot" type="submit"  value="Soumettre" />
                            
						
					</form>
				
				

			
			
	

</form> 

</fieldset>
{%endif%}
{% if af is defined %}

<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > 
          
          
          
          Ajout D'un Groupe de Fichiers
        
    
    </h3>
<form class="login active"  action="/addgf?val=1" method="POST">
    
						
						
                            <input type="texte" name="ng"  style="margin-left:65%;width:200px;height:36px;margin-top:17%" required />
    
						
							
			                 <input class="bot" type="submit"  value="Soumettre" />
						
							 
							
							
						
					</form>
				
				

			
	</fieldset>
{%endif%}
     {% if def is defined %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > 
          
         
           Groupe de Fichier par Defaut
          
       
    
    </h3>
<form class="login active"  action="/defaultg" method="POST">
    
						
						
                            <input type="texte" name="ng"  style="margin-left:65%;width:200px;height:36px;margin-top:17%" required />
    
						
							
			                 <input class="bot" type="submit"  value="Soumettre" />
						
							 
							
							
						
					</form>
				
				

			
	</fieldset>


{%endif%}
{% if listeuser is defined %}
{% if listeuser!=-1 %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
<h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >Supprimer un Groupe d'utilisateur </h3>

{% for u in listeuser %}
<p  class="lien"><span style="color:black;text-shadow: none !important">{{u['id']}}) </span><a  class="tas" href="/deleteuser/{{u['id']}}?name={{u['name']}}" style="font-weight:bold;color:white;text-shadow: none !important;
     margin-right:20%">{{u['name']}}</a> </p>  
{% endfor %}

    
</fieldset>

{% else %}
<p  class="lien">Aucun groupe d'utilisateur n'existe</p>

{% endif %}




{% endif %}
{% if listegf is defined %}
{% if listegf!=-1 %}

<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >Supprimer  Un Groupe de Fichiers</h3>
{% for u in  listegf %}
<p  class="lien"> <span style="color:black;text-shadow: none !important"> {{u['idag']}}) </span> <a   class="tas" href="/deletef/{{u['idag']}}?name={{u['name']}}" style="font-weight:bold;color:white;text-shadow: none !important;">{{u['name']}} </a> </p>  
{% endfor %}
    </fieldset>
{% else %}
<p  class="lien">Aucun groupe de fichier n'existe</p>

{% endif %}

{% endif %}


{% if listename is defined %}


<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >Selectionné une Demande</h3>
<div id="ftag">
{% for u in listename %}
<p  class="lien"><span style="color:black;">{{u['id']}}) </span><a  class="tas" style="font-weight:bold;color:white;text-shadow: none !important;" href="/controle?etat=1 &fin={{u['id']}}
    ">{{u['nom']}}  {{u['prenom']}} </a> </p>  
{% endfor %}
    </div>
    </fieldset>
{% endif %}

{% endif %}
{% if OS is defined %}
<p style="margin-left:35%;margin-top:120px;color:green;font-weight:bold;text-shadow: none !important;"></p>
{% endif %}
{% if mofv is defined %}
<p align="center" style="position:relative;top:30px;color:red;">{{mofv}}</p>
{% endif %}
{% if good is defined %}
<p align="center" style="position:relative;top:30px;color:red;">{{good}}</p>
{% endif %}
{%  include 'web/addfile.php' %}
{% if  fal is defined %}
<p align="center" style="position:relative;top:120px;color:green;text-shadow: none !important;">{{fal}}</p>
{% endif %}
{% if  fich is defined %}
<p style="margin-left:450px;margin-top:120px;color:green;font-weight:bold;text-shadow: none !important;">{{fich}}</p>
{% endif %}
{%  include 'web/modifs.php' %}
{% if motif is defined %}
<p style="margin-left:35%;margin-top:120px;color:green;font-weight:bold;text-shadow: none !important;">{{motif}}</p>
{% endif %}
 {%  include 'web/modirole.php' %}

{% if listrol is defined %}


<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
<h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > Selectionné un Utilisateur</h3>
<div id="ftag">
{% for u in listrol %}
<p  class="lien"><span style="color:gray;">{{u['id']}}) </span><a  class="tas" style="font-weight:bold;color:white;text-shadow: none !important;" href="/controle?etat=4 &rol={{u['id']}}
    ">{{u['nom']}}</a> </p>  
{% endfor %}
    </div>
    </fieldset>
{% endif %}
{% if liste is defined %}

<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%">
<h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > Selectionné un  fichier</h3>
<div id="ftag">
{% for u in liste %}
<p  class="lien"><span style="color:black;">{{u['id']}}) </span><a  class="tas" style="font-weight:bold;color:white;text-shadow: none !important;" href="/controle?etat=3 &fi={{u['id']}}
    ">{{u['nom']}}</a> </p>  
{% endfor %}
    </div>

    
</fieldset>



{% endif %}

{%  include 'web/model2.php' %}

</body>
</html>