


$(document).ready(function(){
 
    
  			
					$('#fat').click(function(e) {
   
  e.preventDefault();

	   if($("#vale").val()=="")
	     alert("Veuillez saisir le nom de votre groupe de fichiers");
		 else
		 {
		 
	  
  $.ajax({
            url : "/projetbdd/addgf", // on donne l'URL du fichier de traitement
             type : "post",
            data:"ng="+$("#vale").val(),
            dataType: 'text',
           success: function(data) {
		        
		       alert("le groupe de fichié"+" "+$("#vale").val()+" "+"a été crée avec succes  :) ");
				$("#vale").val("");
					 }
					 }
					 );
					 }
  
    });
  
					
					} );
					
					