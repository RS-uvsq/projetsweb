
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
{% endif %}