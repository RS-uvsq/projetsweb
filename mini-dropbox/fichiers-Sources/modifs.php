{% if files is defined %}
{% for u in files %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:19%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > Modification-Suppréssion</h3>
	<form action="/projetbdd/enginefile/{{u['id']}}" method="POST">
        <div id="center">
        <div id="place">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Nom du fichier:</span> </br>
<input type="text" name="nfile" id="op" placeholder="{{u['nom']}}" /><br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Type de fichier:</span><br>
<input type="text" name="tfile" id="op" placeholder="{{u['type']}}" ><br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Auteur du fichier:</span></br>
<input type="text" name="aufile" id="op" placeholder="{{u['auteur']}}" /><br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Date d'édition:</span></br>
<input type="date" name="dafile" id="op" placeholder="{{ u['date']}}" /></br>
</div>
<div id="fp">
<br>
<p style="color:red;">
 
</p>
</div>
<span style="color:white;font-weight:bold;text-shadow: none !important;margin-top:10%;margin-left:5%;"id="op">Redefinir les groupes du fichier:</span></br>
   {% for u in li %}
        <input type="checkbox" name="prenom[]" value="{{u['idag']}}" ><span style="color:#FF9900;text-shadow: none !important;">{{u['name']}}</span>
          {% endfor %}
</br>
 <div id="des">
<span style="color:white;font-weight:bold;margin-top:78px;text-shadow: none !important;">Description du fichier:</span><br>
<textarea rows="5" cols="6" name="dfile" style="width:300px;" placeholder="{{ u['description']}}"></textarea>
</div>
</br>
</div>
<input type="radio" name="accept" value="2" ><span  style="color:#FF9900;text-shadow: none !important;">Modifier Le Fichier</span>
<input type="radio" name="accept" value="3" ><span  style="color:#FF9900;text-shadow: none !important;">Supprimer Le Fichier</span>
	
							
			                 <input type="submit" class="bottom5"  value="Soumettre" />
			                    
							

                               
   <div class="clear1"></div>

</form>


</fieldset>

{% endfor %}
{% endif %}