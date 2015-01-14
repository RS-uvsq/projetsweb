
$(document).ready(function(){
   
  
    $('#contenu').html("<img src='web/images/load.gif'>");
    $('#contenu').load('web/actiononglet/accueil.php');
   
   $('.men').click(function(){
    $('#contenu').html("<img src='web/images/load.gif'>");
	 $('#ask').html("<img src='web/images/load.gif'>");
  
      if(this.id=="demande")
	   $('#contenu').load('web/actiononglet/'+this.id+'.php');
	   else
	   if(this.id=="ajoutfichier")
    $('#contenu').load('web/actiononglet/'+this.id+'.php');
	 else
	if(this.id=="addusergroupe")
    $('#contenu').load('web/actiononglet/'+this.id+'.php');
	else 
	$('#contenu').load('web/actiononglet/'+this.id+'.php');
	  
   });
   
					 	 $('.tas').click(function(){

  
  alert("tkpkgltkg");
  /*$.ajax({
            url : "/projetbdd/deleteuser", // on donne l'URL du fichier de traitement
             type : "post",
			 data:"n="+this.id,
            dataType: 'text',
           success: function(data) {
		        
				
				alert("yehho");
					 }
					 }
					 );*/
      	
});	
   
    $(window).scroll(function(){
            
            
            
            if($(this).scrollTop()!= 0)
            {
                $('#enhaut').css('display','block');
            }
            else{
                
                $('#enhaut').css('display','none');
                
            }
    });
    
   
    
});