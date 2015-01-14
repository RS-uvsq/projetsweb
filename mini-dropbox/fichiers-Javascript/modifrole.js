$(document).ready(function(){
 
    
  			
			
   
 
file();
	function file()
{	
	 
  $.ajax({
            url : "/projetbdd/userliste", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		        var dv=document.querySelector("#ftag1");
				data=data.vuf;

				 $('#user').load('web/actiononglet/usermodifrole.php');
				 				    var dv1 = document.querySelector("#user");
				    dv1.style.cssText="visibility:hidden";
				//projetbdd/web
                     for(g in data)
					 {
					 
					  var dnm = document.querySelector("#nom");
					  dnm.appendChild(document.createTextNode(data[g].nom));
				   var dpn = document.querySelector("#prenom");
				    dpn.appendChild(document.createTextNode(data[g].prenom));
				    var drol= document.querySelector("#rol");
					dnm.appendChild(document.createTextNode(data[g].groupe));
					var p=document.createElement('p');
					
				 var balisep=$('<img src="web/images/utilisateur.png" alt="user" height=50px />');
				  var br=$('<br>');
                    				 
					p.class="lien";
					p.style.cssText="float:left; padding-top: 50px;text-align: center;margin-left:25%;";
					
					balisep.appendTo(p);
					br.appendTo(p);
					
					
					var a=document.createElement('a');
					a.class="tas";
					a.href="#";
					


/*<div>
<img src="" alt="user" height=50px />
</br><a>risque</a>
</div>*/
					a.style.cssText="font-weight:bold;color:white;text-shadow: none !important;margin-right:20%" ;
					a.id=data[g].id ;
					a.appendChild(document.createTextNode(data[g].nom));
					
					
					p.appendChild(a);
					dv.appendChild(p);
					a.onmouseover=function() { this.style.color= '#D2B48C';};
					a.onmouseout = function() { this.style.color= 'white';};
					 a.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                     var grou="grou"+this.id;

                   e.preventDefault();
				   var dv = document.querySelector("#field");
				  dv.innerHTML="";
				  dv1.style.cssText="visibility:visible";
				  
				  
					
					 }
					 );
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 }
					 }
					 );
  
   
  }
  
					
					} );
					