	
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
				
				
				  var dv = document.querySelector("#tesnote11");
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
			//  table.class="sot5";
			  
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
					var dc4=document.createTextNode("Date D'inscription");
					var span4=document.createElement("span");
				   span4.appendChild(dc4);
					var dc5=document.createTextNode("Groupe");
					var span5=document.createElement("span");
					var dc6=document.createTextNode("Connecté");
					var span6=document.createElement("span");
					
					
					
					span5.appendChild(dc5);
					span6.appendChild(dc6);
					
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span6.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				th6.appendChild(h35.appendChild(span6));
		
				th5.appendChild(h35.appendChild(span5));
				for(var i=1;i<7;i++)
				{
				
				get(i).style.cssText=' background:#D2B48C;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th5);
				tr1.appendChild(th6);
				
				
				head.appendChild(tr1);
				table.appendChild(head);
				
				     for(f in users)
					 {
					
					  var lign=document.createElement("tr");
					   var modif=document.createElement("a");
					    var refuse=document.createElement("a");
						
					  var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td5=document.createElement("td");
						  var td6=document.createElement("td");
						   if(users[f].connecte==0)
						{
						 var balisep=$('<img src="web/images/eteind.png" alt="user" height=30px />');
					balisep.appendTo(td6);
						}
						else
						{
						 var balisep=$('<img src="web/images/connecté.png" alt="user" height=30px />');
					balisep.appendTo(td6);
					
					}
						
						   
							
						    //td7.appendChild(span7);
						   var td8=document.createElement("td");
						 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					map1['6'] =td6;
					
					var tg=users[f].groupe;
				td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].prenom)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].mail)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				td5.appendChild(h34.appendChild(document.createTextNode(valg[tg])));
			            
			    
			 
				for(var i=1;i<7;i++)
				{
				
				get1(i).style.cssText='  background:#2F4F4F;width:2px;color:white';
				}
				      
					
				lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td5);
				lign.appendChild(td6);
				
					 bod.appendChild(lign);
					 }
			 table.style.cssText='border: medium solid #BDB76B;width:70%;height:600px;margin-left:6%;'//height:325px;top:30%;border-radius: 20px;background:#A9A9A9;';
			   $("table.sot5 th").css({" height":"120px"});
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
 setInterval(refreshplayline, 4000);
  }); 
   
  