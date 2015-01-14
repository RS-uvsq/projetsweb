


$(document).ready(function(){
   
    $('.men').click(function(){
   
	   if(this.id=="ajoutfichier")
  {
  $.ajax({
            url : "/projetbdd/groupefichier", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		        
		       
				 var dv = document.querySelector("#groupe");
				 
                     dv.innerHTML ="";
                     for(g in data)
					 {
					
					
    
					  var  inputradio=$( '<input type="checkbox" name="prenom[]" value='+data[g].idag+ '><span style="color:#FF9900;text-shadow: none !important;"> '+data[g].name+ '</span>' );
					inputradio.appendTo(dv);
					
					 
					 }
					 
					 }
					 }
					 );
  }
	  
   });
	
 
					 }
					 );