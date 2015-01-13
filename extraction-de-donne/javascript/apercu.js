 <script>
 
       $(document).ready(function(){
        
        $('.apc').click(function(){
            
           
            $('#photo').html("<img src='upload/user/<?php echo $id; ?>/cerfa/"+this.id+".jpg' width='696px'>");
           });
        
        
        
        $('#photo').click(function(){
            
            
            $('#photo').html('');
           });
        
        $('.bt_t').click(function(){
            
            a=this.id;
            a=a.substring(2);
            //alert(a);
           $('#r'+a).html("<img src='images/ex.gif'> 0% extration des donn&#233es ");
            $.post('action.php',{requete:'tcerfa',id:a},function(data){
                
                $('#routeur').html(data);
            });
            });
           
        
       
            ///tout selectionner selectionner --------------------
           $('#ts').click(function(){
            
            $('.ckb').attr('checked',false);
            $('.ckb').trigger('click');
            $.post('action.php',{requete:'toutselectioner'},function(data){
               $('#routeur').html(data); 
            });

           });
           
           
           
           
           
           ///tout selectionner deselectionner --------------------
           $('#tds').click(function(){
            
            $('.ckb').attr('checked',false);
           // $('.ckb').trigger('click');
            $.post('action.php',{requete:'deselectioner'},function(data){
               $('#routeur').html(data); 
            });

           });
           
           
           
           
           
           
           
           
           $('.ckb').change(function(){
            
           if (! $('#'+this.id).prop('checked')) {
                $.post('action.php',{requete:'enlever',id:this.id},function(data){
                $('#routeur').html(data);
            });
            }
            else{
          
            $.post('action.php',{requete:'selection',id:this.id},function(data){
                $('#routeur').html(data);
            });
            }
            
           });
           
           $('#trm').hover(function(){
            $('#dtrm').show('slide');
           });
           $('#dtrm').click(function(){
            $('#dtrm').slideUp();
           });
           
         //////supprimer le cerfa à traiter
         $('#sup').click(function(){
           $.post('action.php',{requete:'suppcerfa'},function(data){
             $('#routeur').html(data);
           });
         });
         
         ////traiment multiple solo
         
           $('#tra').click(function(){
           $.post('action.php',{requete:'smultiple'},function(data){
             $('#routeur').html(data);
           });
         });
           
           //////////traitement multiple acm
          $('#trm').click(function(){
          
           $.post('action.php',{requete:'amultiple'},function(data){
             $('#routeur').html(data);
           });
          
          
          });
           
       });
       
    </script>