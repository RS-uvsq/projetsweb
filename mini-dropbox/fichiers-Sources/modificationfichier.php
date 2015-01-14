

<script src="web/actiononglet/jsdemande/modificationfichier.js"> </script>

<select   id="fileg"  style=" margin-top:2% !important;
     margin-left:37% ;width:180px;height:34px;text-shadow: none !important;" >
	 
                          
                        
    
						
					    </select>
						<div id="tesnote"> 
          
                       
 <fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:20%;margin-top:2%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > Modification-Suppréssion</h3>
	<form id="fr" action="/projetbdd/enginefile" method="POST">
        <div id="center">
        <div id="place">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Nom du fichier:</span> </br>
<input type="text" name="nfile" id="op"  /><br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Type de fichier:</span><br>
<input type="text" name="tfile" id="op1"  ><br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Auteur du fichier:</span></br>
        
<input type="text" name="aufile" id="op2"   /><br>
        <span style="color:white;font-weight:bold;text-shadow: none !important;">Ancienne Date:</span></br>
     <span style="color:yellow" id="op3" ></span></br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Nouvelle Date:</span></br>
<input type="date" name="dafile" id="op" placeholder="{{ u['date']}}" /></br>
</div>
<div id="fp">
<br>
<p style="color:red;">
 
</p>
</div>
<span style="color:white;font-weight:bold;text-shadow: none !important;margin-top:10%;margin-left:5%;"id="op">Groupe de Fichier Precedent:</span></br>

 

 <div id="des"></div>
  <select  name="userg"  id="fileg1"  style="margin-left:5%;width:180px;height:34px;text-shadow: none !important;" >
	 
                          
                        
    
					
					    </select>
    
</br>
<span style="color:white;font-weight:bold;text-shadow: none !important;margin-top:10%;margin-left:5%;"id="op">Redefinir les groupes du fichier:</span>
<div id="gr"></div>
</br>
</br>
<span style="color:white;font-weight:bold;margin-top:78px;text-shadow: none !important;">Description du fichier:</span><br>
<textarea  id="op4"rows="5" cols="6" name="dfile" style="width:300px;" ></textarea>

</br>
</div>
<input type="radio" name="accept" value="2" ><span  style="color:#FF9900;text-shadow: none !important;">Modifier Le Fichier</span>
<input type="radio" name="accept" value="3" ><span  style="color:#FF9900;text-shadow: none !important;">Supprimer Le Fichier</span>
	                          
                              <div id="ca">
							
			                 <input  id="fat" type="submit" class="bottom5"  value="Soumettre" />
			                    
							</div>

                               
   <div class="clear1"></div>

</form>


</fieldset>
 </div>
<div id="md"></div>
