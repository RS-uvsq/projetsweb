{% if mof is defined %}
{% for u in mof %}
<fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:340px;margin-top:2%;margin-bottom:2%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" >{{u['nom']}}</h3>
    <div id="de1">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Nom:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{u['nom']}}</span> </br> </br>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Prénom:</span><span style="color:#A0AEC1;text-shadow: none !important;">{{u['prenom']}}</span></br></br>

<form action="/rolemodif/{{u['id']}}?mod={{u['nom']}}" method="GET">
<span style="color:white;font-weight:bold;text-shadow: none !important;">Rôle precedent:</span></br>
<p style="color:red;text-shadow: none !important;">
 
</p>
<span style="color:white;font-weight:bold;text-shadow: none !important;">Rôle:</span></br></br>
<div class="radio"> 
{% for u in li %}
<input type="radio" name="grou" value="{{u['id']}}"  required><span style="color:#FF9900;text-shadow: none !important;">{{u['name']}}</span>
{% endfor %}
</div> 
</div>

</br>

    <input type="submit"  value="Soumettre" class="bottom3"/>
   </form> 
<br>
<span style="margin-left:6%; margin-top:3%;font-weight:bold;text-shadow: none !important;"><span style="color:#A0AEC1">Role par Defaut:</span><span style="color:red;" >Autre</span>
</fieldset>
{% endfor %}
{% endif %}