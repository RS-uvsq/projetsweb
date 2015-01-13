$(document).ready(function(){
    ///depart
   
    $('#cmservice').html("<img src='images/load.gif'>");
    $('#cmservice').load("menu/smenu/enregistrec.php",function(){
        $('#mservice').show('explode',800);
       // $('#cmservice').show('drop',800);
    });
   
   
           
        
   
   
   
    $('.mservice').click(function(){
       
    
        $('#cmservice').html("<img src='images/load.gif'>");
    $('#cmservice').load("menu/smenu/"+this.id+".php");
   });
    
    
    
});