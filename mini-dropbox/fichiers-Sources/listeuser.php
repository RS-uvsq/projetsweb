 {% if tabl1 is defined %}
<table class="sot2"  style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;  border-radius: 20px;background:#A9A9A9;">


		<tr id="lignetable">
	<th  ><h2  style="text-shadow: none !important;color:black;">Nom </h2></th>
	<th  ><h2  style="text-shadow: none !important;color:black;">Prenom</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:black;">mail</h2></th>
    <th  ><h2  style="text-shadow: none !important;color:black;">Date d'inscription</h2></th>
    <th  ><h2  style="text-shadow: none !important;color:black;">Groupe</h2></th>
    <th  ><h2  style="text-shadow: none !important;color:black;">Connecté</h2></th>
	
	</tr>
	{% for u in tabl1 %}
	<tr>
	<td > <span style="text-align:center;font-size:17px ;color:white;text-shadow: none !important;">{{u['nom']}}</span></td>
	<td > <span style="text-align:center;font-size:17px ;color:white;text-shadow: none !important;">{{u['prenom']}}</span></td>
	<td> <span style="text-align:center;font-size:17px ;color:white;text-shadow: none !important;">{{u['mail']}}</span></td>
	<td > <span style="text-align:center;font-size:17px ;color:white;text-shadow: none !important;">{{u['date']}}</span></td>
        { set g=u['groupe']}
        
         <td > <span style="text-align:center;font-size:17px ;color:white;text-shadow: none !important;">{{val[u['groupe']]}}</span></td>
  <td >  {% if u['connecte']==1 %}
        <p id="vert"> </p> 
         {% else%}
    <p id="rouge"> </p>
    {% endif %}
        </td>
	</tr>
	{% endfor%} 
	 </table>
   
 {% endif %}
    