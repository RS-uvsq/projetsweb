$(document).ready(function(){
   
    $('#contenu').html("<img src='images/load.gif'>");
    $('#contenu').load('menu/accueil.php');
   
   $('.menu').click(function(){
    $('#contenu').html("<img src='images/load.gif'>");
    $('#contenu').load('menu/'+this.id+'.php');
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