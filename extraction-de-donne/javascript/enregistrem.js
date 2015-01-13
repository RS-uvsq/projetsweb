$(document).ready(function(){
    traiteauto='non';
    
    $(function() {
    $( "#ajc" ).resizable({ minWidth: 160 });
  });
    
     $(function() {
    $( "#ajc" ).draggable();
  });
    
   $('#tpcerfa').change(function(){
    
    if ($('#tpcerfa').val()=='radio' || $('#tpcerfa').val()=='box' ) {
        
        $('#cnop').show();
        $('#ema').hide();
        $('#ctab').hide();
    }
    else if ($('#tpcerfa').val()=='tab') {
        $('#cnop').hide();
        $('#ema').hide();
        $('#ctab').show();
    }
    else
    {
        $('#cnop').hide();
         $('#ctab').hide();
        $('#ema').show();
    }
   });
    
    
        $('#btmcerfa').click(function(){
      ////////post pur faire apparaitre le 
     // alert('ok');$
     bt=$('#dif').val();
      if ($('#tpcerfa').val()=='textp') {
    $.post('action.php',{requete:'ajchmod',libele:$('#tmcerfa').val(),mdebut:$('#mdcerfa').val(),mfin:$('#mfcerfa').val(),type:$('#tpcerfa').val(),position:bt},function(data){
      
      if (bt=='premier') {
        //code
      $('#traitauto').prepend(data);
      }
      else
      {
        $('#'+bt).after(data);
      }
      
      
    });
      }
      else if (/*$('#tpcerfa').val()=='radio' ||*/ $('#tpcerfa').val()=='box' ) {
       $.post('action.php',{requete:'ajchmod',type:$('#tpcerfa').val(),nombre:$('#nop').val(),libele:$('#tmcerfa').val(),position:bt},function(data){
     
     
      if (bt=='premier') {
        //code
      $('#traitauto').prepend(data);
      }
      else
      {
        $('#'+bt).after(data);
      }
     
       
    });
      }
      else
      {
        $.post('action.php',{requete:'ajchmod',type:$('#tpcerfa').val(),ligne:$('#nbl').val(),colone:$('#nbc').val(),libele:$('#tmcerfa').val(),position:bt},function(data){

       if (bt=='premier') {
        //code
      $('#traitauto').prepend(data);
      }
      else
      {
        $('#'+bt).after(data);
      }
      
      
    });
      }
   ////////post pour actualiser la liste d' ajout
   
    
    });
   
            
            
            /////monter automatiquement
             $('#enhaut').click(function(){
        
            
            $('body,html').animate({scrollTop:0},1000);
            
         });
            
            //////enregistré le model
            $('#ermdl').click(function(){
                $('#fermdl').html("<img src='images/load.gif'>");
                if ($('#id_cerfa').val()=='') {
                   $('#fermdl').html("<div class='erreur'> veuillez saisir un numero pour votre modele</div>");
                }
                else if ($('#titre_cerfa').val()=='') {
                   $('#fermdl').html("<div class='erreur'> veuillez saisir un titre pour votre modele</div>");
                }
                else
                {
                $.post('action.php',{requete:'ermodel',id :$('#id_cerfa').val(),titre:$('#titre_cerfa').val()},function(data){
                    $('#fermdl').html(data)
                });
                }
            });
            
            $('#autocp').click(function(){
                if (traitauto=='non') {
                   /* $.post('action.php',{requete:'activeautom'},function(data){
                     // alert(data);
                       $('#vision').html(data);
                    });*/
                   
                    $('#feed-autocp').html('active');
                     traitauto='oui';
                }
                else{
                    traitauto='non';
                    $('#feed-autocp').html('desactiv&#233;');
                }
                
            });
            
           
        
       
            
            
            
            
            
            
});