$(document).ready(function(){
 
    
  			
	file();				
   
 

	function file()
{	
	 
  $.ajax({
            url : "/projetbdd/deletegf", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		        var dv=document.querySelector("#ftag");
                var mt=data.mt;
				data=data.val;
				   if(dv){dv.innerHTML="";}
				   
				
                     for(g in data)
					 {
					var p=document.createElement('p');
					p.class="lien";
					p.style.cssText="float:left; padding-top: 50px;text-align: center;margin-left:25%;";
					var span=document.createElement('span');
					var balisep=$('<img src="web/images/armoire.png" alt="user" height=80px />');
				  var br=$('<br>');
					var a=document.createElement('a');
					a.class="tas";
					a.href="#";
					a.style.cssText="font-weight:bold;color:white;text-shadow: none !important;margin-right:20%" ;
					a.id=data[g].idag ;
					a.appendChild(document.createTextNode(data[g].name+" ("+mt[data[g].idag]+" "+"fichiers)"));
					balisep.appendTo(p);
					br.appendTo(p);
					p.appendChild(a);
					dv.appendChild(p);
					a.onmouseover=function() { this.style.color= '#D2B48C';};
					a.onmouseout = function() { this.style.color= 'white';};
					 a.addEventListener('click', function(e) {
                    var el= e.target||event.srcElement;
                     var grou="grou"+this.id;

    	$.ajax({
            url : "/projetbdd/deletef", // on donne l'URL du fichier de traitement
             type : "post",
			 data:"n="+this.id,
            dataType: 'text',
           success: function(data) {
		        
				     
				alert("Le goupe de fichier"+ " "+data+" "+" a été supprimé");
				a.removeEventListener("click","");
				
					 }
					 }
					 );
  
                   e.preventDefault();
					
					 }
					 );
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 }
					 }
					 );
  
   
  }
  setInterval(file, 7000);
					
					} );
					