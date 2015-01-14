	
var s="";
 var zap="";
   $(document).ready(function(){
   
   
  
        var tab=[];
		refreshplayline();
	    
   function refreshplayline(){
   
   
   
 var maptd = new Object();
			  function getd(k) {
             return maptd[k];
                      }
	
	
        $.ajax({
            url : "/projetbdd/Viewuser", // on donne l'URL du fichier de traitement
             type : "GET",
            dataType: 'json',
           success: function(data) {
		         
		        var usersgroupe=data.val3;
				var valg=data.val2;
				var users=data.val1;
				if(typeof(users)!='number')
				{
				
				
				  var dv = document.querySelector("#tesnote1");
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
			 // table.class="sot5";
			  
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
				var th5=document.createElement("th");
				var th6=document.createElement("th");
				var th7=document.createElement("th");
				var th8=document.createElement("th");
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
					  var h37=document.createElement("h3");
					  h37.style.cssText=' text-align:center;';
					var bod=document.createElement("tbody");
					map['1'] = th1;
					map['2'] = th2;
					map['3'] =th3;
					map['4'] =th4;
					map['5'] =th5;
					map['6'] =th6;
					map['7'] =th7;
					map['8'] =th8;
					
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
					var dc6=document.createTextNode("Nouveau Role");
					var span6=document.createElement("span");
					var dc7=document.createTextNode("Reponse");
					var span7=document.createElement("span");
					var span8=document.createElement("span");
					var dc8=document.createTextNode("Role precedent");
					
					
					span5.appendChild(dc5);
					span6.appendChild(dc6);
					span7.appendChild(dc7);
					span8.appendChild(dc8);
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span6.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span7.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span8.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				th8.appendChild(h37.appendChild(span8));
				th6.appendChild(h35.appendChild(span6));
		
				th5.appendChild(h35.appendChild(span5));
				th7.appendChild(h36.appendChild(span7));
				for(var i=1;i<9;i++)
				{
				
				get(i).style.cssText=' background:#D2B48C;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th8);
				tr1.appendChild(th6);
				tr1.appendChild(th5);
				tr1.appendChild(th7);
				
				head.appendChild(tr1);
				table.appendChild(head);
				
				     for(f in users)
					 {
					
					  var lign=document.createElement("tr");
					   var modif=document.createElement("a");
					    var refuse=document.createElement("a");
						 var td5=document.createElement("td");
					  var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td6=document.createElement("td");
						   var td7=document.createElement("td");
						   
						maptd[users[f].id]=td7;
						
						    var span7=document.createElement("span");
							span7.id=users[f].id+"a";
							
						    //td7.appendChild(span7);
						   var td8=document.createElement("td");
						 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					map1['6'] =td6;
					map1['7'] =td7;
					map1['8'] =td8;
					var tg=users[f].groupe;
						 td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].prenom)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].mail)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				td8.appendChild(h34.appendChild(document.createTextNode(valg[tg])));
				modif.id=users[f].id;
				
				//modif.data-auteur="yann";
				
				modif.dataset['column'] =td7;
                   tab[users[f].id]=td7;
				   
				//modif.setAttribute("title",td7);
				
				 modif.appendChild(h32.appendChild(document.createTextNode("Soumettre")));
				 var radiodiv=document.createElement("div");
                     radiodiv.class="radio";
					 radiodiv.style.cssText=' height:50%;width:300px; overflow:scroll; overflow-x: hidden;';
					
					  var grou="grou"+users[f].id;
                     for(g in usersgroupe)
					 {
					
					
					 var divrep=document.createElement("div");
					 divrep.id=usersgroupe[g].id;
    
					  var  inputradio=$('<input  type="radio" name="'+grou+ '" value= '+ usersgroupe[g].id+' >' +'<span  style="color:#FF9900;text-shadow: none !important;">'+usersgroupe[g].name+'</span>' );
					  
					 //myspan.style.cssText='color:#FF9900;text-shadow: none !important;';
					inputradio.appendTo(radiodiv);
					td6.appendChild(radiodiv);
					 
					 }
				  modif.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                     var grou="grou"+this.id;
					  //var balisep=$('<img src="web/images/valider.png" alt="user" height=30px />')
					//balisep.appendTo(el.dataset['column']);
					//alert("yoyo"+ tab[this.id]);
					var balisep=$('<img src="web/images/valider.png" alt="user" height=10px />')
					//alert(tab[this.id]);
					var t=tab[this.id];
					//t.appendChild(document.createTextNode("hellllllllllllo"));
					
					//balisep.appendTo(tab[this.id]);
                    var val=$('input[type=radio][name='+grou+']:checked').val();
				
					
                      $.ajax({
            url : "/projetbdd/rolemodif", // on donne l'URL du fichier de traitement
             type : "post",
            data:"n="+this.id+"&groupe="+val+"&td="+tab[this.id],
			datatype:'json',
             success: function(data) {
                // t.appendChild(document.createTextNode("hellllllllllllo"));
                            if(data.b==0)
							{
							t.innerHTML="";
							alert("Le groupe d'utilisateur sélectionné n'a aucune vue sur aucun fichier,crée un lien  à partir de l'onglet Droit de lecture");
							 var balisep=$('<img src="web/images/erreur.png" alt="user" height=30px />');
					balisep.appendTo(t);
					}
							else
							{
							t.innerHTML="";
							zap=1;
                          // alert("modification validée");
						   var balisep=$('<img src="web/images/valider.png" alt="user" height=30px />')
					balisep.appendTo(t);
						    //t.appendChild(document.createTextNode("hellllllllllllo"));
						   }
						
                         }
            
                        });
 
                   e.preventDefault();
				   
				  
                 });
				 
		     modif.style.cssText='text-decoration:underline;color:blue; cursor:pointer;';
             modif.onmouseout = function() { this.style.color= 'yellow';};
             modif.onmouseover=function() { this.style.color= '#D2B48C';};
			
			 td5.appendChild(modif);
			 
				for(var i=1;i<9;i++)
				{
				
				get1(i).style.cssText='  background:#2F4F4F;width:2px;color:white';
				}
				      
					 td7.appendChild(divrep);
				lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td8);
				lign.appendChild(td6);
				lign.appendChild(td5);
				lign.appendChild(td7);
					 bod.appendChild(lign);
					 
					 }
// 20px;background:#A9A9A9;';
			  // $("table.sot5 th").css({" height":"120px"});
                      table.style.cssText='border: medium solid #BDB76B;width:53%;height:600px;margin-left:6%;';//height:325px;top:30%;border-radius:
				table.appendChild(bod); 
				dv.appendChild(table);
				}
				else
				{
				  

				/*document.getElementById("ask").innerHTML="";
				document.querySelector("#sot").style.cssText='visibility:visible';
				document.getElementById("tos").innerHTML="IL n'existe aucune demandes!";*/
				
				}
				
		   }
		   
		   }
		   );
               
             
        
    
   
		
    
}
  setInterval(refreshplayline, 8000);   
  }); 
   
  