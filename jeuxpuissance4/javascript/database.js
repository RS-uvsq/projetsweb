	

   
	      function update() {
   setInterval(refreshplayline, 2000);
}
   function refreshplayline(){
   
   
    
	
	
        $.ajax({
            url : "/puissance4/api/userlist", // on donne l'URL du fichier de traitement
             type : "GET",
            dataType: 'json',
           success: function(data) {
               
             document.getElementById("jeux").innerHTML="";
              var dv = document.querySelector("#jeux");
              var body=document.createElement("tbody");
              var table=document.createElement("table");
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
                  th1.appendChild(document.createTextNode("Joueur"));
                  th2.appendChild(document.createTextNode("parties"));
                  th3.appendChild(document.createTextNode("Gagnée"));
                  th4.appendChild(document.createTextNode("couleur préféré"));
                   tr1.appendChild(th1);
                   var aid=" ";
                     var aid1=" ";
                    tr1.appendChild(th2);
                     tr1.appendChild(th3);
                      tr1.appendChild(th4);
                       head.appendChild(tr1);
                      table.appendChild(head);
                      var actuelogin=data.demandeur;
                       var stat=data.sTatus;
                       var d="";
                      
					   if(typeof(stat)!="number")
					   {
					   var actuelog=stat[0].challenger;
					   var  idg=stat[0].id;
					   var chlog=stat[0].challenged;
					   }
                     data=data.connect;
                    
                    
              for (f in data) 
               {
                
                 
                  
          var tr=document.createElement("tr");
           
        
            if(data[f].log!=actuelogin && data[f].joue==-1 )
            {
                var a=document.createElement("a");
                 var a1=document.createElement("a");
                 var a2=document.createElement("a");
                 
                     if(stat.challenger==data[f].log) 
                     {
                           if(stat.etat=="demande")
                           {
                            var texte=document.createTextNode(actuelogin+"demande de faire une partie:");
                             a1.appendChild(document.createTextNode("Accepter"));
                             a2.appendChild(document.createTextNode("Refuser"));
                           }
                     }
                     else
                a.appendChild(document.createTextNode("  invitation"));
                
                a.href="";
                a.id=data[f].log;
                
                      
                      
                       
                 
            
             
                 a.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                   
                   document.getElementById("message").innerHTML="";
                     document.getElementById("message").innerHTML="demande envoyé";
                      $.ajax({
            url : "/puissance4/api/challenge", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "login="+el.id,
             success: function(data) {
                 
                            var val=el.id;
                            
                           
                            document.getElementById("message").innerHTML+=data;
                           
                         }
            
                        });
  
                   e.preventDefault();
                 });
           
             a.style.cssText='text-decoration:underline;color:blue;';
             a.onmouseout = function() { this.style.color= 'blue';};
             a.onmouseover=function() { this.style.color= 'yellow';};
            }
            else
            {
                 var a=document.createElement("a");
                 
                 
           
			var a1=document.createElement("a");
                 var a2=document.createElement("a");
                 if(typeof(stat)!="number")
                 {
                      if(data[f].log==stat[0].challenger) 
                       {
                            aid=document.getElementById("message");
                            aid.class=actuelog;
                       }
                       
                      if(data[f].log== chlog) 
                       {
                            aid1=document.getElementById("message");
                            aid1.class=chlog;
                       }
                      
               
                     if(actuelogin==data[f].log  && actuelogin!=stat[0].challenger) 
                     {
                        
					 
                           if(stat[0].etat=="demande" )
                           {
						    a1.href="";
                          a1.id=data[f].log;
						   a2.href="";
                          a2.id=data[f].log;
                               
                            var texte=document.createTextNode(">"+stat[0].challenger+" "+"demande de faire une partie:");
                             a1.appendChild(document.createTextNode("Accepter"));
                             a2.appendChild(document.createTextNode(" "+"Refuser"));
							  a1.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                   
                   
                      $.ajax({
            url : "/puissance4/api/accept", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "login="+stat[0].challenger,
             success: function(data) {
                 
                             window.location.href="play?idgame="+idg+" ";
                           
                         }
            
                        });
  
                   e.preventDefault();
                 });
				  a2.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                   
                   
                      $.ajax({
            url : "/puissance4/api/reject", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "idgame="+idg,
             success: function(data) {
                 
                            
                             document.getElementsByClassName(actuelog).innerHTML=" ";
                               document.getElementsByClassName(actuelog).innerHTML=" Demande refusée";
                                document.getElementsByClassName(chlog).innerHTML=" ";
                               document.getElementsByClassName(chlog).innerHTML="New Reponse...";
                           
                            
                            window.location.href="/userlist";
                           
                           
                         }
            
                        });
  
                   e.preventDefault();
                 });
           
             a1.style.cssText='text-decoration:underline;color:blue;';
             a1.onmouseout = function() { this.style.color= 'blue';};
             a1.onmouseover=function() { this.style.color= 'yellow';};
			 a2.style.cssText='text-decoration:underline;color:blue;';
             a2.onmouseout = function() { this.style.color= 'blue';};
             a2.onmouseover=function() { this.style.color= 'yellow';};
                           }
                            else
					 {
					 
             a.appendChild(document.createTextNode("  invitation"));
            a.style.cssText='text-decoration:none;color:red;'; 
					 }
                     }
                      else
					 {
					 
					  actuelogin!=stat[0].challenger
                           if(stat[0].etat=="accepte" &&  actuelogin==stat[0].challenger)
						   {
						    window.location.href="play?idgame="+idg+" " ;
						   }
             a.appendChild(document.createTextNode("  invitation"));
            a.style.cssText='text-decoration:none;color:red;'; 
					 }
            }
					 else
					 {
					 
             a.appendChild(document.createTextNode("  invitation"));
            a.style.cssText='text-decoration:none;color:red;'; 
					 }
            }
          var myp=document.createElement("p");
          var td1=document.createElement("td");
          var td2=document.createElement("td");
          var td3=document.createElement("td");
          var td4=document.createElement("td");
           
          td1.appendChild(document.createTextNode(data[f].log));
          if(typeof(stat)!="number")
          {
              
          if(stat[0].etat=="demande" && actuelogin==data[f].log    && actuelogin!=stat[0].challenger)
          {
             
               td1.appendChild(texte);
               td1.appendChild(a1);
               td1.appendChild(a2);
              
          }
           else
           td1.appendChild(a);
               }
          else
           td1.appendChild(a);
          td2.appendChild(document.createTextNode(data[f].parties));
          td3.appendChild(document.createTextNode(data[f].gagnees));
           if(data[f].couleur1=="rouge")
           {
           myp.id="rouge"
           td4.appendChild(myp);
           }
           if(data[f].couleur1=="jaune")
           {
           myp.id="jaune"
            td4.appendChild(myp);
           }
            if(data[f].couleur1=="vide")
           {
           myp.id="vert"
            td4.appendChild(myp);
           }
          
          tr.appendChild(td1);
          tr.appendChild(td2);
          tr.appendChild(td3);
          tr.appendChild(td4);
         body.appendChild(tr);
          
               }
               table.appendChild(body);
            dv.appendChild(table);
			
           
              
  },
  
        });
        
     
       
		
    
}

   
   
  