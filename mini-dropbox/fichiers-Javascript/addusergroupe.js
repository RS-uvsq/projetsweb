


$(document).ready(function(){
 
    
  			
					$('#fat').click(function(e) {
    e.preventDefault();
 

	   if($("#vale").val()=="")
	     alert("Veuillez saisir le nom de votre groupe Utilisateur");
		 else
		 {
		 
	  
  $.ajax({
            url : "/projetbdd/adduserg", // on donne l'URL du fichier de traitement
             type : "post",
            data:"ng="+$("#vale").val(),
            dataType: 'text',
           success: function(data) {
		        
		       alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				$("#vale").val("");
					 }
					 }
					 );
					 }
  
    });
  
					
					} );
					
					