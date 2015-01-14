 {% if tabl2 is defined %}
<table class="sot1"  style="border: medium solid #BDB76B
;width:53%;margin-left:21%;height:325px;margin-top:5%;margin-bottom:4%;  border-radius: 20px;background:#A9A9A9;">


		<tr id="lignetable">
	<th  ><h2  style="text-shadow: none !important;color:black;">Nom du fichier</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:black;">Auteur</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:black;">Description</h2></th>
	<th  ><h2  style="text-shadow: none !important;color:black;">Date de Parution</h2></th>
	
	</tr>
	{% for u in tabl2 %}
	<tr>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['nom']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['auteur']}}</span></td>
	<td> <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['description']}}</span></td>
	<td > <span style="font-size:17px ;color:white;text-shadow: none !important;">{{u['date']}}</span></td>
       
	</tr>
	{% endfor%} 
	 </table>
    

     
    
                                

 {% endif %}
    