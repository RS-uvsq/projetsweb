$(document).ready(function(){
 
    
  			
	  
   user();
 //alert("yello");

	   
	 function user()
	 {
  $.ajax({
            url : "/projetbdd/deletegu", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		        var dv=document.querySelector("#ftag1");
               var mt=data.mt;
				data=data.c;
				if(dv){dv.innerHTML="";}
                     for(g in data)
					 {
					var p=document.createElement('p');
					p.class="lien";
					p.style.cssText="float:left; padding-top: 50px;text-align: center;margin-left:25%;";
					var span=document.createElement('span');
                         var balisep=$('<img src="web/images/gu.jpg" alt="user" height=80px />');
				  var br=$('<br>');
					span.style.cssText="color:black;text-shadow: none !important";
					span.appendChild(document.createTextNode("("+mt[data[g].id]+" "+"personne(s))"));
                         balisep.appendTo(p);
					br.appendTo(p);
					var a=document.createElement('a');
					a.class="tas";
					a.href="#";
					a.style.cssText="font-weight:bold;color:white;text-shadow: none !important;margin-right:20%" ;
					a.id=data[g].id ;
					a.appendChild(document.createTextNode(data[g].name));
					p.appendChild(span);
					p.appendChild(a);
					dv.appendChild(p);
					a.onmouseover=function() { this.style.color= '#D2B48C';};
					a.onmouseout = function() { this.style.color= 'white';};
					 a.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                     var grou="grou"+this.id;
                     
				    // alert(this.id);
					$.ajax({
            url : "/projetbdd/deleteuser", // on donne l'URL du fichier de traitement
             type : "post",
			 data:"n="+this.id,
            dataType: 'text',
           success: function(data) {
		        
				     
				alert("Le goupe d'utilisateur"+ " "+data+" "+" a été supprimé");
				a.removeEventListener("click","");
				
					 }
					 }
					 );
  
                   e.preventDefault();
				  // refreshplayline();
                 });
					
						
					
/*var  balisep=$( '<p  class="lien"><span style="color:black;text-shadow: none !important">'+data[g].id +')'+ ' </span><a   class="tas" href="#"  style="font-weight:bold;color:white;text-shadow: none !important;margin-right:20%" id="'+ data[g].id +'">' + data[g].name+ '</a> </p>');  
balisep.appendTo(dv);*/
    
					
					 }
		      
					 }
					 }
					 );
					     
						 
  
   }
   setInterval(user, 7000);
					
					} );