				    
				  
  
  
	      function update1() {
   setInterval(Game, 1000);
}
  function Game() {

 $.ajax({
            url : "/puissance4/api/play_event", // on donne l'URL du fichier de traitement
             type : "GET",
			 data:"post="+id,
            dataType: 'json',
           success: function(data) {
               
               
 if( vale==1)
	  {
      var dv = document.querySelector("#game");
     
	 
	  //tableau à deux dimsensions qui contientra les balises <td> de chaque ligne <tr>
     
	  
	  //tableau qui stockera les lignes (balise <tr> de la table
      var tabe_2 = [];
	  }
           

      
     



      var erreur = -1;// booleen qui indique si une colone de la  table est  complemetement rempli 

	  if( vale==1)
	  {
	   tabe = document.createElement("table");
      tabe.id="tub";
     
      tabe.className =1;
      tabe.style.cssFloat = "left";
	  }

     

      //construction de la table et ajout dans la balise "div"
     
if( vale==1)
                {
                
      for (var i = 0; i < ligne; i++) {
          var nrow = document.createElement("tr");
          nrow.style.textAlign = "center";
          nrow.id = i;
          tabe_2[i] = nrow;
          tabe_1[i] = new Array();

          for (var j = 0; j < coln; j++) {
              tabe_1[i][j] = document.createElement("td");


              tabe_1[i][j].dataset['column'] = j;
			  

              tabe_2[i].appendChild(tabe_1[i][j]);
          }
          tabe.appendChild(tabe_2[i]);
          
      }
       
    
           
                }
				else
				{
				
				      
			
				}


      //une fonction qui permet  de donner la main a chaque joueur

      function Set(row, column, player, turn) {


          var elt = tabe_1[row][column];
          elt.className = player;
          if (player == "joueur1")
              turn = 2;
          if (player == "joueur2")
              turn = 1;

      }


      //cette fonction permet d'affecter à une case libre de la table la couleur qui identifie le joueur qui est en action 

      function play(column,absi) {
          var teste = 0;
          var lign=0;
		  
		           
          for (var i = ligne - 1; i >= 0; i--) {

              if (!tabe_1[i][column].className) {
                  teste = 1;
                  if (turn == 1) {
                      h = column; //NUMERO COLONE
                      mem = i; // NUMERO LIGNE
                      lign=i;

                      tyj = 1;
                      if (co1 == "jaune") {
                          ply = "joueur2";


                          tabe_1[i][column].className = "joueur2";
                      } 
					  else {
					   ply = "joueur1";
					  if (co1 == "rouge") {
                         


                          tabe_1[i][column].className = "joueur1";
						  }
						  if (co1 == "vert") {
                        

                          ply="joueurd";
                          tabe_1[i][column].className = "joueurd";
						  }
                      }

                      turn = 2;

                  } else {
                      if (turn == 2) {
                          tyj = 2;
                          h = column;
                          mem = i;
                           lign=i;
                          if (co2 == "jaune") {


                              ply = "joueur2";

                              tabe_1[i][column].className = "joueur2";
                          } else {
                               ply = "joueur1";
					  if (co2 == "rouge") {
                         


                          tabe_1[i][column].className = "joueur1";
						  }
						  if (co2 == "vert") {
                        

                          ply="joueurd";
                          tabe_1[i][column].className = "joueurd";
						  }
                          }
                          turn = 1;

                      }
                  }

                  return lign;


              }
          }
//}

          if (teste == 0) {

              erreur = 1;

          }

      




      }




      //MON GESTIONNAIRE DEVENEMENT

     /*                                                                                                                                                                                                                                                                                                                                      function Gestionnaire(element, event, func) {
          if (element.addEventListener) {
              element.addEventListener(event, func, false);
          } else {
              element.attachEvent('on' + event, func);
              
          }
      }*/


      // fonction qui renvoie la valeur de la variable "finalgame"(=2 si le joeur gagne)
	  

	         
      function gagnant(pet) {

                     

          ic = parseInt(pet); //   NUMERO COLONNE


          if (ic + 1 <= 6 && ic - 1 >= 0 && mem - 1 >= 0) {

              var des1 = ic;

              // identifie l'alignement horizontale  lorsque le  coup  du joueur est un coup qui n'est pas extrémité  de l'alignement d'une meme couleur

              if (ic - 2 >= 0 && des1 - 2 >= 0) {
                  nm = tabe_1[mem][des1 + 1].className;

                  if (nm == ply && tabe_1[mem][des1 - 1].className == ply && tabe_1[mem][des1 - 2].className == ply) {
                      bl = 1;
                      tabl[0] = tabe_1[mem][des1];
                      tabl[1] = tabe_1[mem][des1 - 1];
                      tabl[2] = tabe_1[mem][des1 + 1];
                      tabl[3] = tabe_1[mem][des1 - 2];

                  }
              }

              if (bl != 1 && ic + 2 <= 6) {
                  nm = tabe_1[mem][des1 - 1].className;
                  if (nm == ply && tabe_1[mem][des1 + 1].className == ply && tabe_1[mem][des1 + 2].className == ply) {
                      bl = 1;
                      tabl[0] = tabe_1[mem][des1];
                      tabl[1] = tabe_1[mem][des1 + 1];
                      tabl[2] = tabe_1[mem][des1 - 1];
                      tabl[3] = tabe_1[mem][des1 + 2];
                      console.log("bong2");
                  }


              }
              // identifie l'alignement diagonale droite  à partir d'un coup qui n'est pas extrémité des 4 couleur alignés

              if (bl != 1 && mem + 2 <= 5 && des1 - 2 >= 0 && mem + 1 <= 5) {

                  nm = tabe_1[mem - 1][des1 + 1].className;
                  if (nm == ply && tabe_1[mem + 1][des1 - 1].className == ply && tabe_1[mem + 2][des1 - 2].className == ply)
                      bl = 1;
                  tabl[0] = tabe_1[mem][des1];
                  tabl[1] = tabe_1[mem + 1][des1 - 1];
                  tabl[2] = tabe_1[mem + 2][des1 - 2];
                  tabl[3] = tabe_1[mem - 1][des1 + 1];

              }

              if (bl != 1 && des1 + 2 <= 6 && mem + 1 <= 5 && mem - 2 >= 0) {
                  nm = tabe_1[mem + 1][des1 - 1].className;
                  if (nm == ply && tabe_1[mem - 1][des1 + 1].className == ply && tabe_1[mem - 2][des1 + 2].className == ply)
                      bl = 1;
                  tabl[0] = tabe_1[mem][des1];
                  tabl[1] = tabe_1[mem - 1][des1 + 1];
                  tabl[2] = tabe_1[mem + 1][des1 - 1];
                  tabl[3] = tabe_1[mem - 2][des1 + 2];
              }
              //identifie l'alignement diagonale gauche  à partir d'un coup qui n'est pas extrémité des 4 couleurs alignés


              if (bl != 1 && mem + 1 <= 5 && des1 + 2 <= 6 && mem + 2 <= 5) {
                  nm = tabe_1[mem - 1][des1 - 1].className;
                  if (nm == ply && tabe_1[mem + 1][des1 + 1].className == ply && tabe_1[mem + 2][des1 + 2].className == ply)
                      bl = 1;
                  tabl[0] = tabe_1[mem][des1];
                  tabl[1] = tabe_1[mem + 1][des1 + 1];
                  tabl[2] = tabe_1[mem - 1][des1 - 1];
                  tabl[3] = tabe_1[mem + 2][des1 + 2];
              }

              if (bl != 1 && des1 - 2 >= 0 && mem + 1 <= 5 && mem - 2 >= 0) {
                  nm = tabe_1[mem + 1][des1 + 1].className;
                  if (nm == ply && tabe_1[mem - 1][des1 - 1].className == ply && tabe_1[mem - 2][des1 - 2].className == ply)
                      bl = 1;
                  tabl[0] = tabe_1[mem][des1];
                  tabl[1] = tabe_1[mem - 1][des1 - 1];
                  tabl[2] = tabe_1[mem - 2][des1 - 2];
                  tabl[3] = tabe_1[mem + 1][des1 + 1];
              }



          }

          //identifie l'alignement horizontale(de la gauche vers la droite) en lisant à partir de l'extrémité gauche  


          if (ic + 3 <= 6 && bl == -1) {
              v = 5;
              var des = ic;
              var inc = 0;

              tabl[0] = tabe_1[mem][des];

              des = des + 1;
              while (des <= ic + 3 && bl) {
                  inc = inc + 1;
                  nm = tabe_1[mem][des].className;
                  tabl[inc] = tabe_1[mem][des];

                  if (nm) {
                      if (nm == ply) {
                          des++;
                          bl = 1;
                      } else {
                          bl = 0;



                      }
                  } else {
                      bl = 0;



                  }




              }

              //si la verification de l'alignement horitontal(de la gauche vers la droite) a échoué 

              if (bl == 0) {

                  inc = 0;

                  //tente de  vérifier si  il y'a  un  alignement  en diagonal(droit)  allant du bas (extrémité) vers le haut


                  if (mem - 3 >= 0) {
                      bl = -1;
                      des = ic;
                      tabl[inc] = tabe_1[mem][des];
                      var me = mem - 1;

                      des = des + 1;
                      while (des <= ic + 3 && bl) {
                          inc++;

                          nm = tabe_1[me][des].className;
                          tabl[inc] = tabe_1[me][des];


                          if (nm) {
                              if (nm == ply) {
                                  des++;
                                  me--;
                                  bl = 1;
                              } else {
                                  bl = 0;
                              }

                          } else {
                              bl = 0;
                          }

                      }
                  }

                  //tente de  vérifier si  il y'a  un  alignement  en diagonal(gauche)  allant du haut (extrémité) vers le bas

                  if (mem + 3 <= 5 && bl == 0) {
                      inc = 0;
                      bl = -1;
                      des = ic;
                      tabl[inc] = tabe_1[mem][des];
                      var me = mem + 1;


                      des = des + 1;
                      while (des <= ic + 3 && bl) {

                          inc++;
                          nm = tabe_1[me][des].className;
                          tabl[inc] = tabe_1[me][des];


                          if (nm) {
                              if (nm == ply) {
                                  des++;
                                  me++;
                                  bl = 1;
                              } else {
                                  bl = 0;
                              }

                          } else {
                              bl = 0;
                          }

                      }

                  }


              } //fin if

          }
          if (bl == -1)
              bl = 0;
          if (ic - 3 >= 0 && bl == 0) {



              inc = 0;
              var cb = ic;
              bl = -1;

              //tente de  vérifier si  il y'a  un  alignement  horizontal en  allant de droite à gauche  

              while (cb >= ic - 3 && bl) {
                  tabl[inc] = tabe_1[mem][cb];
                  nm = tabe_1[mem][cb].className;
                  inc++;
                  if (nm) {
                      if (nm == ply) {
                          cb--;
                          bl = 1;

                      } else {
                          bl = 0;

                      }
                  } else {
                      bl = 0;

                  }


              }
              if (bl == 0) {


                  //tente de  vérifier si  il y'a  un  alignement  en diagonal(droit)  allant du haut (extrémité) vers le bas  


                  if (mem + 3 <= 5) {

                      bl = -1;
                      des = ic;
                      inc = 0;
                      tabl[inc] = tabe_1[mem][des];
                      var me = mem + 1;

                      des = des - 1;

                      while (des >= ic - 3 && bl) {

                          inc++;
                          nm = tabe_1[me][des].className;
                          tabl[inc] = tabe_1[me][des];


                          if (nm) {
                              if (nm == ply) {
                                  des--;
                                  me++;
                                  bl = 1;
                              } else {
                                  bl = 0;
                              }

                          } else {
                              bl = 0;
                          }

                      }

                  }

                  //tente de  vérifier si  il y'a  un  alignement  en diagonal(gauche)  allant du bas (extrémité) vers le haut


                  if (mem - 3 >= 0 && bl == 0) {
                      bl = -1;
                      des = ic;

                      var me = mem - 1;
                      inc = 0;

                      des = des - 1;

                      while (des >= ic - 3 && bl) {
                          inc++;

                          nm = tabe_1[me][des].className;
                          tabl[inc] = tabe_1[me][des];


                          if (nm) {
                              if (nm == ply) {
                                  des--;
                                  me--;
                                  bl = 1;
                              } else {
                                  bl = 0;
                              }

                          } else {
                              bl = 0;
                          }

                      }

                  }


              }

          }
          if (bl == -1)
              bl = 0;


          //tente de  vérifier si  il y'a  une verticale   allant du haut (extrémité) vers le bas

          if (mem + 3 <= 5 && bl == 0) {

              var c = mem + 1;
              inc = 0;
              tabl[inc] = tabe_1[mem][ic];
              bl = -1;




              while (c <= mem + 3 && bl) {
                  inc++;
                  nm = tabe_1[c][ic].className;
                  tabl[inc] = tabe_1[c][ic];
                  if (nm) {
                      if (nm == ply) {

                          c++;

                          bl = 1;
                      } else {
                          bl = 0;


                      }
                  } else {
                      bl = 0;
                  }
              }



          } 

         
          if (bl == 1) {

              console.log("le" + " " + ply + " " + "gagne " + "veuillez cliquer sur la table pour reprendre le jeux");
              finalgame = 2;

                ter=1;
              if (tyj == 1) {
                  if (sc1 > 0)
				  {
                      sc1 = sc1 + 1;
					  var value1 = document.getElementById('c1');
				   value1.value=sc1;
					  }
                  else {
                      if (sc2 == 0)
                          sc2 = 0;
                      sc1 = 1;
					   var value1 = document.getElementById('c1');
				   value1.value=sc1;
                  }
                  if (co1 == "jaune") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash2";
                  } else {
				   if (co1 == "rouge") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash1";
						  }
						  if (co1 == "vert") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash3";
						  }
                  }


                  var txt = document.getElementById('somme');
				   
                  var ne = document.createTextNode(nam1 + " " + "gagne la partie");
                  txt.appendChild(ne);



              }




              if (tyj == 2) {
                  if (sc2 > 0)
				  {
                      sc2 = sc2 + 1;
					  var value2 = document.getElementById('c2');
				   value2.value=sc2;
					  }
                  else {
                      sc2 = 1;
					   var value1 = document.getElementById('c2');
				   value1.value=sc2;
                      if (sc1 == 0)
                          sc1 = 0;
                  }
                  if (co2 == "jaune") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash2";
                  } else {
                       if (co2 == "rouge") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash1";
						  }
						  if (co2== "vert") {
                      for (var i = 0; i < 4; i++)
                          tabl[i].className = "flash3";
						  }
                  }

                  

              }




            
               
     if(data.demandeur==data.challenged)
     {
     $.ajax({
            url : "/puissance4/api/play_event", // on donne l'URL du fichier de traitement
             type : "GET",
			 data:"s1="+sc1+"&s2="+sc2+"&post="+id
            
            
                        });
          }

          }
          if (bl == 0)
              bl = -1;
			  
			  return  finalgame ;

      }
	   
	  
	

 if (tyj == 1) {
		  
              var toure = document.getElementById('tour');
              var text = toure.firstChild;
              if (text)
                  toure.removeChild(text);
              var ne1 = document.createTextNode("Dernier avoir jouer:" + " " + nam1);
              toure.appendChild(ne1);
          }
          if (tyj == 2) {
              var toure = document.getElementById('tour');
              var text = toure.firstChild;
              if (text)
                  toure.removeChild(text);
              var ne1 = document.createTextNode("Dernier avoir jouer:" + " " + nam2);
              toure.appendChild(ne1);
          }

      //Fonction qui retourne 1 (si toutes les cases de la table sont remplis) . si non

      function f() {


          for (var i = 0; i < ligne; i++) {

              for (var j = 0; j < coln; j++) {
                  if (!tabe_1[i][j].className)


                  {

                      return 0;
                  }



              }


          }
          return 1;
      }
	  var  m="";
	       if(data.jA!=1 && data.jA!=2) 
	       {
	           if(part==1)
	           {
	            turn=2;
	            m=1;
	           }
	           else
	          m=2;
	       }
	       else
	       m=data.jA;
		             
					       
			             
				    console.log(part+":"+data.demandeur);
			   
				
				if(debut==1 && data.challenged==data.demandeur)
					{
					    var  fa="";
					    if(part==1)
			           fa=2;
			           else
			             if(part==2)
			           fa=1;
			           else
			         if(part==-1)
			           fa=1;
					console.log(part);
					 if(fa==1)
					 {
					     
					  console.log("Serveur>"+" "+nam1+" "+"vous êtes invité à débuter la partie!Attention! Il vous serez impossible de joueur deux fois de suite!");
			        alert("Serveur>"+" "+nam1+" "+"vous êtes invité à débuter la partie!Attention! Il vous serez impossible de joueur deux fois de suite!");
					}
					if(fa==2)
					{
					
					//m=1;
					console.log("Serveur>"+" "+nam1+" "+"vous êtes invité à patienter"+" "+nam2+" "+" débutera en premier  la partie! Attention! Il vous serez impossible de joueur deux fois de suite!");
			        alert("Serveur>"+" "+nam1+" "+"vous êtes invité à patienter"+" "+nam2+" "+" débutera en premier  la partie! Attention! Il vous serez impossible de joueur deux fois de suite!");
					}
					
					
			        debut=0;
					}
					////
					
					if(data.challenged==data.demandeur && m==2)
					  {
					     	console.log(data.demandeur+" "+"joue");
					    if(cliquer!=1)
					    fin=0;
						
					  }
					  else
					  {
					  if(data.challenged==data.demandeur && m==1)
					        {
					           
							console.log(data.challenged+" "+"ne joue pas");
							 fin=2;
							 cliquer=0;
							}
					  }
							if(data.challenged!=data.demandeur && m==1)
					  {
					      if(cliquer!=1)
					    fin=0;
						console.log(data.demandeur+" "+"joue");
						
					  }
					  else
					  {
						
					  if(data.challenged!=data.demandeur && m==2)
					        {
					           cliquer=0;
							console.log(data.demandeur+" "+"ne joue pas");
							 fin=2;
							}
           }
					
					

			//cette partie permet de préciser lequel des joueurs débutera la partie
			 
			 if(debut==1 && data.challenged!=data.demandeur){
			    var  fa="";
					    if(part==1)
			           fa=2;
			           else
			             if(part==2)
			           fa=1;
			           else
			         if(part==-1)
			           fa=1;
					console.log(part);
			                     if(fa==1)
			        alert("Serveur>"+" "+nam2+" "+"vous êtes invité à patienter"+" "+nam1+" "+" débutera en premier  la partie! Attention! Il vous serez impossible de joueur deux fois de suite!");
					if(fa==2)
			        alert("Serveur>"+" "+nam2+" "+"vous êtes invité à débuter la partie!Attention! Il vous serez impossible de joueur deux fois de suite!");
			        debut=0;
			 }
			 
		//  cette partie(la condition) permet de mettre à jour la case cliquée sur la table de l'adversaire qui n'a pas la main mise
			 if(data.ord && data.x && finalgame!=2 )
					   {
					 var bool=1;
				    
				       
                          
                                if(tabe_1[data.x][data.ord].className) 
                                  bool=0;
                           
				        
				          
				        
				           if(bool)
				           {
				               turn=data.jA;
							   
				               var tarcisse=play(data.ord,data.x);
				                finpartie=gagnant(data.ord);
				                
				           }
                        
					 
					 }
					 
					 //permet d'afficher une alert après avoir cliquer sur "accepter" ou "refuser" et permet de cacher le texte et  les liens  affichés,par la suite
					 if(clic==1)
					 {
					     clic=0;
					  var s1=document.getElementById("cache1");
				       var s2=document.getElementById("cache2");
				       var  texte=document.getElementById("texte");
				  texte.style.visibility="hidden";
				       s1.style.visibility="hidden";
				        s2.style.visibility="hidden";
				        alert("Serveur>patienter pendant quelques secondes ,le Serveur recueille la réponse de votre adversaire");
					 }
					 
					
					 if(data.reponse==0)
					{
					    if(data.rep1==0)
					    {
					    if(data.challenged!=data.demandeur)
					    alert(nam1 +" "+ "ne  souhaite plus continué le jeux ,vous serez  reconduit dans la page userlist");
					    
					    if(data.challenged==data.demandeur)
					    alert("vous serez  reconduit dans la page userlist");
					}
					else
					{
					    if(data.rep2==0)
					    {
					    if(data.challenged==data.demandeur)
					    alert(nam2 +" "+"ne  souhaite plus continué le jeux ,vous serez  reconduit dans la page userlist");
					    
					    if(data.challenged!=data.demandeur)
					    alert("vous serez  reconduit dans la page userlist");
					}
					}
					   
					    window.location.href="/puissance4/api/reject?idgame="+id+"&user="+1+" ";
					    
					 
					 }
					 	 if(data.reponse==1 && rep==0)
					{
					    rep=1;
					   
					    alert("Génial! votre adversaire  a accepté de reprendre la partie:");
					           if(data.jA==1 && part==-1)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+1;
					      if(data.jA==2 && part==-1)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+1;
					     if(data.jA==1 && part==1)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+2;
					     if(data.jA==1 && part==2)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+1;
					      if(data.jA==2 && part==2)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+1;
					      if(data.jA==2 && part==1)
					     window.location.href="/puissance4/play?idgame="+id+"&part="+2;
						
					         
					      
						
						
					    
					 
					 }
			     
			     //Si il y'a un gagnant  cette partie demande au joueur "d'accepter ou de refuser de continuer"
			   if(finalgame==2  &&  fi==0)
				{
				    
				    
				    fi=1;
				    var  texte=document.getElementById("texte");
				  texte.style.visibility="visible";
				 var s1=document.getElementById("cache1");
				  var s2=document.getElementById("cache2");
				  
				
				 var a1=document.createElement("a");
                 var a2=document.createElement("a");
				 a1.href="";
				  a2.href="";
				a1.appendChild(document.createTextNode("Accepter"));
                             a2.appendChild(document.createTextNode(" "+"Refuser"));
							 s1.appendChild(a1);
					s2.appendChild(a2);
					a1.style.cssText='text-decoration:underline;color:blue;';
             a1.onmouseout = function() { this.style.color= 'blue';};
             a1.onmouseover=function() { this.style.color= 'yellow';};
			 a2.style.cssText='text-decoration:underline;color:blue;';
             a2.onmouseout = function() { this.style.color= 'blue';};
             a2.onmouseover=function() { this.style.color= 'yellow';};
					a1.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
					
                     clic=1;
                      var d="";
					  
					  
					 
					   if(data.challenged==data.demandeur)
					   {
                      $.ajax({
            url : "/puissance4/api/play", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "j1="+1,
             success: function(data) {
                 
                            
                           
                         }
            
                        });
						}
						else
						{
						if(data.challenged!=data.demandeur)
					   {
                      $.ajax({
            url : "/puissance4/api/play", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "j2="+1,
             success: function(data) {
                 
                            
                           
                         }
            
                        });
						}
						}
  
                   e.preventDefault();
                 });
				 a2.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
					
                     clic=1;
                      var d="";
					  
					  
					 
					   if(data.challenged==data.demandeur)
					   {
                      $.ajax({
            url : "/puissance4/api/play", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "j1="+0,
             success: function(data) {
                 
                            
                           
                         }
            
                        });
						}
						else
						{
						if(data.challenged!=data.demandeur)
					   {
                      $.ajax({
            url : "/puissance4/api/play", // on donne l'URL du fichier de traitement
             type : "GET",
            data : "j2="+0,
             success: function(data) {
                 
                            
                           
                         }
            
                        });
						}
						}
  
                   e.preventDefault();
                 });

				
				}
      //  GESTIONNAIRE D'EVENEMENT
      tabe.addEventListener('click', function (e) {
          
            
			/*if(fin==2)
			{
			    alert(data.ord+"trrtr");
			    var h=gagnant(data.ord);
			}*/
			
			if(finalgame!=2)
			{
			 debut=0;
			
			if(data.challenged!=data.demandeur && fin==2)
			{
			 fin=3;
			 console.log("impossible de jouer, c'est à "+" "+nam1+" "+"de jouer!");
			}
			if(data.challenged==data.demandeur && fin==2)
			{
			    fin=3;
			 
			console.log("impossible de jouer, c'est à "+" "+nam2+" "+"de jouer!");
			}
		
		cliquer=1;
          //alert(data.fin);
        var pass5="";
       
          var target = e.target || e.srcElement;
          
          if (target.dataset['column'] && fin == 0 && erreur != 1 ) {
              pass5=play(target.dataset['column'],-1);
             
                     // alert("y: " + target.dataset['column']+" "+"x:"+pass5); 
          if (erreur == 1 && fin == 0 ) {
              console.log("Veuillez jouer sur une case non occupée");
              erreur = -1;
			  
              var toure = document.getElementById('tour');
              var text = toure.firstChild;
              if (text)
                  toure.removeChild(text);
              var ne1 = document.createTextNode("Veuillez jouer sur une case non occupée");
              toure.appendChild(ne1);
          
          }



          var final = f();
          //Si la table est rempli sans un gagnant
          if (final) {
              console.log("Vous êtes à égaliter veuillé cliquer sur le plateau pour recommencer");
              var txt = document.getElementById('somme');
			   var warn = txt.firstChild;
              if (warn)
                  txt.removeChild(warn);
              var ne = document.createTextNode("Vous êtes à égaliter !");
              txt.appendChild(ne);
              finalgame==2 ;

              fin = 1;
              bl = 1;


          }
          if (fin == 2 ) {
              fin = 1;

          }
          var finpartie=""; // Convert the table into a javascript object
             // alert(tabe_1[0][1].className);
    if (erreur != 1 && fin!=1)
    {
       
	  finpartie=gagnant(target.dataset['column']);
	  
	  
    }
	if(data.fin==2)
	finpartie=2;
    fin=2;
    
             $.ajax({
            url : "/puissance4/api/play", // on donne l'URL du fichier de traitement
             type : "GET",
              data:"tourgame="+tyj+"&colone="+target.dataset['column']+"&line="+pass5+"&fin="+finpartie,
               
             
                      });
                     
              
          }
		   
                  

      
	 
	  
	  }
	  });


if(  vale==1)
{
      dv.appendChild(tabe);
      vale=2;
}

}
});


  }