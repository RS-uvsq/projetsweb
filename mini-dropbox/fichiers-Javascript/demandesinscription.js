	
var s="";
   $(document).ready(function(){
     var tab=[];
    $('.men').click(function(){
   
      if(this.id=="demandesinscription")
	  {
	  
	  refreshplayline();
	  }
	  
   });
  
        
		
	    
   function refreshplayline(){
   
   
   

	
	
        $.ajax({
            url : "/projetbdd/controledemande", // on donne l'URL du fichier de traitement
             type : "GET",
            dataType: 'json',
           success: function(data) {
		         
		        var usersgroupe=data.ug;
				var users=data.us;
				if(typeof(users)!='number')
				{
				
				
				  var dv = document.querySelector("#tesnote12");
				   if(dv==null){}
				   else
				  dv.innerHTML="";
              var body=document.createElement("tbody");
              var table=document.createElement("table");
			  var map = new Object();
			   var map1 = new Object();
			  function get(k) {
             return map[k];
                      }
					   function get1(k) {
             return map1[k];
                      }
			  
			  
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
				var th5=document.createElement("th");
				var th6=document.createElement("th");
				var th7=document.createElement("th");
				 var h31=document.createElement("h3");
				 h31.style.cssText=' text-align:center;';
				  var h32=document.createElement("h3");
				  h32.style.cssText=' text-align:center;';
				   var h33=document.createElement("h3");
				   h33.style.cssText=' text-align:center;';
				    var h34=document.createElement("h3");
					h34.style.cssText=' text-align:center;';
					 var h35=document.createElement("h3");
					 h35.style.cssText=' text-align:center;';
					  var h36=document.createElement("h3");
					 h36.style.cssText=' text-align:center;';
					var bod=document.createElement("tbody");
					map['1'] = th1;
					map['2'] = th2;
					map['3'] =th3;
					map['4'] =th4;
					map['5'] =th5;
					map['6'] =th6;
					map['7'] =th7;
					
					var dc1=document.createTextNode("Nom");
					var span1=document.createElement("span");
					span1.appendChild(dc1);
					var dc2=document.createTextNode("Prenom");
					var span2=document.createElement("span");
					span2.appendChild(dc2);
					var dc3=document.createTextNode("Mail");
					var span3=document.createElement("span");
					span3.appendChild(dc3);
					var dc4=document.createTextNode("Date de demande");
					var span4=document.createElement("span");
				   span4.appendChild(dc4);
					var dc5=document.createTextNode("Choix");
					var span5=document.createElement("span");
					var dc6=document.createTextNode("Role");
					var span6=document.createElement("span");
					var dc7=document.createTextNode("Reponse");
					var span7=document.createElement("span");
					
					
					span5.appendChild(dc5);
					span6.appendChild(dc6);
					span7.appendChild(dc7);
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span6.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span7.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				th6.appendChild(h35.appendChild(span6));
		
				th5.appendChild(h35.appendChild(span5));
				th7.appendChild(h36.appendChild(span7));
				for(var i=1;i<8;i++)
				{
				
				get(i).style.cssText=' background:#D2B48C;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th6);
				tr1.appendChild(th5);
				tr1.appendChild(th7);
				
				head.appendChild(tr1);
				table.appendChild(head);
				
				     for(f in users)
					 {
					
					  var lign=document.createElement("tr");
					   var accepte=document.createElement("a");
					    var refuse=document.createElement("a");
						 var td5=document.createElement("td");
					  var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td6=document.createElement("td");
						   var td7=document.createElement("td");
						 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					map1['6'] =td6;
					map1['7'] =td7;
					
						 td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].prenom)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].mail)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				accepte.id=users[f].id;
				 tab[users[f].id]=td7;
				refuse.id=users[f].id;
				 accepte.appendChild(h32.appendChild(document.createTextNode("Accepter"+"/")));
				 refuse.appendChild(h32.appendChild(document.createTextNode("Refuser")));
				 var radiodiv=document.createElement("div");
                     radiodiv.class="radio";
					 radiodiv.style.cssText=' height:50%;width:300px; overflow:scroll; overflow-x: hidden;';
					   var grou="grou"+users[f].id;
                         // var  inputradio15=$('<select id="moi " name="grou"> </select>');
                          
                         var dve = document.querySelector("#fi");
					  var sel=document.createElement('select');
					sel.name=grou;
                         sel.id="fi";
                        sel.style.cssText="width:180px;height:25px;text-shadow: none !important;";
											
					td6.appendChild(sel);
					
                     for(g in usersgroupe)
					 {
					
					
					 var divrep=document.createElement("div");
					 divrep.id=usersgroupe[g].id;
                         var option=document.createElement('option');
					option.value=usersgroupe[g].id;
						
					
					option.appendChild(document.createTextNode(usersgroupe[g].name));
                    // dve.appendChild(option);
    
					 // var  inputradio=$('<option  value= '+ usersgroupe[g].id+' >' +usersgroupe[g].name+'</option>' );
					  
					 //myspan.style.cssText='color:#FF9900;text-shadow: none !important;';
					sel.appendChild(option);
					td6.appendChild(sel);
					 
					 }
                          var val2="";
                           
                          sel.addEventListener('change', function(e) {
                                 val2=this.options[this.selectedIndex].value;
                          });
				  accepte.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                     var grou="grou"+this.id;
                    var val=$('input[type=radio][name='+grou+']:checked').val();
				  var t=tab[this.id];
                    //  alert(val2);
					//alert("id:"+this.id+" "+"groupe:"+val);
                     $.ajax({
            url : "/projetbdd/ajout", // on donne l'URL du fichier de traitement
             type : "post",
            data:"n="+this.id+"&groupe="+val,
			datatype:'json',
             success: function(data) {
                 
                            if(data.erreur==1)
							{
							alert("Le groupe d'utilisateur sélectionné n'a aucune vue sur aucun fichier,crée un lien  à partir de l'onglet Droit de lecture");
                           var balisep=$('<img src="web/images/erreur.png" alt="user" height=30px />');
					balisep.appendTo(t);
                         }
						 else{
						var balisep=$('<img src="web/images/valider.png" alt="user" height=30px />');
					balisep.appendTo(t);
					}
            
                    
             }});
  
                   e.preventDefault();
				  // refreshplayline();
                } );
				 
				 refuse.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                    var val=$('input[type=radio][name='+grou+']:checked').val();
                   
                      $.ajax({
            url : "/projetbdd/delete", // on donne l'URL du fichier de traitement
             type : "post",
             data:"n="+this.id+"&groupe="+val,
             success: function(data) {
                 
                             var balisep=$('<img src="web/images/erreur.png" alt="user" height=30px />')
					balisep.appendTo(t);
                           
                         }
            
                        });
  
                   e.preventDefault();
                 });
				  accepte.style.cssText='text-decoration:underline;color:blue; cursor:pointer;';
             accepte.onmouseout = function() { this.style.color= 'yellow';};
             accepte.onmouseover=function() { this.style.color= '#D2B48C';};
			 refuse.style.cssText='text-decoration:underline;color:red; cursor:pointer;';
             refuse.onmouseout = function() { this.style.color= 'red';};
             refuse.onmouseover=function() { this.style.color= '#D2B48C';};
			 td5.appendChild(accepte);
			 td5.appendChild(refuse);
				for(var i=1;i<8;i++)
				{
				
				get1(i).style.cssText='  background:#2F4F4F;width:2px;color:white';
				}
				      
					 td7.appendChild(divrep);
				lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td6);
				lign.appendChild(td5);
				lign.appendChild(td7);
					 bod.appendChild(lign);
					 }
					  table.style.cssText='border: medium solid #BDB76B;width:53%;height:200px;margin-left:6%;';//height:325px;top:30%;border-radius: 20px;background:#A9A9A9;';
			   $("table.sot5 th").css({" height":"200px"});
				table.appendChild(bod);
				dv.appendChild(table);
				}
				else
				{
				  

				document.getElementById("ask").innerHTML="";
				document.querySelector("#sot").style.cssText='visibility:visible';
				document.getElementById("tos").innerHTML="IL n'existe aucune demandes!";
				
				}
				
		   }
		   }
		   );
               
             
        
    
       
		
    
}
 setInterval(refreshplayline, 20000);
  }); 
   
  