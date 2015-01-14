
<!DOCTYPE html >
    <head>
      
            
             <link rel="stylesheet" href="web/css/styles.css">
			  <link rel="stylesheet" href="web/css/gestion.css">
			  <script src="web/script/jquery.js"></script>
               <script src="web/script/jqueryui.js"></script>
			   <script src='web/menu/js/menu.js'></script>
			    <script src="web/actiononglet/jsdemande/demandesinscription.js" >var s=""; </script>
				<script src="web/actiononglet/jsdemande/jsajoutfichier.js"> </script>
				
					<script src="web/actiononglet/jsdemande/addusergroupe.js"> </script>
					<script src="web/actiononglet/jsdemande/state.js"> </script>
				
				
			
    
    </head>

   
    
    <body id="gest">
        
        <nav  style="text-shadow: none !important;background:black;width:100%;height:200%; opacity: 0.6;" >
        <img   src="web/images/pl1.png" alt="vsq" style="text-align:center; height:100px;position:absolute;left:40%;top:3%"  >
<h1><span style="color:#778899;font-family:Comic Sans MS">Pcloud-<span style="font-size:35px">Administrateur</span></span> </h1>
        <h2 style=" padding-bottom:1px;text-shadow: none !important;color:gray">Gestion de données</h2>
</nav>
 <div id='cssmenu'>
<ul>
   <li><a  class='men' href='#' id="accueil"><span >Accueil</span></a></li>
   <li ><a  class='men' href='#' id="demandesinscription"><span>Demande en cours</span></a></li>
     <li class='active has-sub'><a href='#'><span>Gestion de Fichiers</span></a>
      <ul>
         <li class='has-sub'><a class='men' href='#' id="ajoutfichier"><span style="text-shadow: none !important;">Ajouter un fichier</span></a> </li>
         <li class='has-sub'><a   class='men' href='#' id="modificationfichier"><span style="text-shadow: none !important;">Supprimer/Modfier un fichier</span></a></li>
        
      </ul>
   </li>
    <li class='active has-sub'><a href='#'><span>Gestion de Groupes</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span style="text-shadow: none !important;">Groupe D'utilisateurs</span></a> 
          
          <ul>
         <li class='has-sub'><a class='men'  href='#' id="addusergroupe"><span style="text-shadow: none !important;">Ajouter un Groupe</span></a> </li>
         <li class='has-sub'><a   class='men' href='#' id="supusergroupe"><span  style="text-shadow: none !important;">Supprimer un Groupe</span></a></li>
      </ul>
          </li>
         <li class='has-sub'><a href='#'><span style="text-shadow: none !important;">Groupe de Fichiers</span></a>
          
           <ul>
         <li class='has-sub'><a class='men' href='#' id="addfilegroupe"><span style="text-shadow: none !important;">Ajouter un Groupe</span></a> </li>
         <li class='has-sub'><a class='men' href='#' id="supfilegroupe"><span style="text-shadow: none !important;">Supprimer un Groupe</span></a></li>
      </ul>
          
          </li>
      </ul>
   </li>
    <li class='active has-sub'><a href='#'><span>Droit de Lecture</span></a>
     <ul>
         <li class='has-sub'><a class='men' href='#' id="lienlecture"><span style="text-shadow: none !important;">Crée un lien de lecture</span></a> </li>
         <li class='has-sub'><a  class='men' href='#' id="supprimerlien"><span style="text-shadow: none !important;">Supprimer un lien de lecture</span></a></li>
         
      </ul>
    </li>
    
   <li><a href='#'><span>Role</span></a>
    
    <ul>
         <li class='has-sub'><a a class='men' href='#' id="usermodifrole"><span  style="text-shadow: none !important;">Modifier le rôle d'un utilisateur</span></a> </li>
        
      </ul>
    </li>
     <li class='active has-sub'><a href='#'><span>Données</span></a>
     <ul>
         <li class='has-sub'><a class='men' href='#' id="listeuser"><span style="text-shadow: none !important;" >Liste des Utilisateurs</span></a> </li>
         <li class='has-sub'><a class='men' href='#' id="groupefile"><span style="text-shadow: none !important;">Liste des Fichiers</span></a></li>
          
      </ul>
    </li>
   <li class='last'><a href='/projetbdd'><span>Deconnect</span></a></li>
</ul>
</div>

<fieldset class="sot" style="border: medium solid #BDB76B
;width:98%;background:#D2691E!important;margin-left:0%;height:50px;margin-top:1%">
      
    
    <div style="float:left; ">Nombre de Connecté:<br><span id="nbc" style="color:white;font-weight:bold"><br></span></div>
<div style="float:left;padding-left:5%" >Nombre de demandes:<br><span id="nbd" style="color:white;font-weight:bold"></span></div>
<div  style="float:left;padding-left:2%">Nombre d'inscrit:<br><span  id="nbi"style="color:white;font-weight:bold"></span></div>
  <div  style="float:left;padding-left:2%">Nombre de Fichiers:<br><span  id="ndf" style="color:white;font-weight:bold"></span></div>
    <div  style="float:left;padding-left:2%">Nombre de Groupe de Fichiers:<br><span  id="ngf"style="color:white;font-weight:bold"></span></div>
     <div  style="float:left;padding-left:2%">Nombre de Groupe d'utilisateurs:<br><span  id="ngu"style="color:white;font-weight:bold"></span></div>
<div style="float:left;padding-left:2%" >Dernier Fichier Ajouté:<br><span  id="nbf"style="color:white;font-weight:bold">{% if file is defined %}{{file}}{% endif %}</span></div> 	

						
				
                            
				

</fieldset>


   <div  id='contenu'>
   
   </div>
   
 
 </body>
  </html