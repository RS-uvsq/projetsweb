<script>
            $(document).ready(function(){
                $('.btsup').click(function(){
                   $('#c'+this.id).slideDown();
                });
                
                $('.cnon').click(function(){
                    d=this.id.split('n');
                    $('#cb'+d[1]).slideUp();
                });
                $('.coui').click(function(){
                    d=this.id.split('s');
                    $.post('action.php',{requete:'supchamp',id:d[1]},function(data){
                         $('#db'+d[1]).remove();
                         $('#vision').html(data);
                    });
                });
                
                
                
            //////////////////////////////////////////////   1 
                
          $('.btap_').keyup(function(){
            b=this.id;
            a=this.id.split('a');
             //alert(a[0]+" ****"+a[1]+" ****"+a[2]+"**** "+a[3]);
             $.post('action.php',{requete:'adoptbox',id:a[1],type:a[0],num:a[2],contenu:$('#'+b).val()},function(data){
                //alert('#f'+b);
          //alert( ' $(.'+b+').html(data)');
         // alert(a[2]);
          $('#f'+b).html(data);
             });
          });
          
          $('.btap_').focus(function(){
            b=this.id;
            a=this.id.split('a');
             //alert(a[0]+" ****"+a[1]+" ****"+a[2]+"**** "+a[3]);
             $.post('action.php',{requete:'adoptbox',id:a[1],type:a[0],num:a[2],contenu:$('#'+b).val()},function(data){
                //alert('#f'+b);
          //alert( ' $(.'+b+').html(data)');
         // alert(a[2]);
          $('#f'+b).html(data);
             });
          });
          
          
          
          ////////////////////////////////////////////////////////////////2
          
          
          
          $('.btap_tab').keyup(function(){
            b=this.id;
            a=this.id.split('a');
            
            // alert(a[0]+" ****"+a[1]/*+" ****"+a[2]+"**** "+a[3]*/);
             $.post('action.php',{requete:'adoptbox2',id:a[0],num:a[1],contenu:$('#'+b).val()},function(data){
                //alert('#f'+b);
          //alert( ' $(.'+b+').html(data)');
          $('#f'+b).html(data);
             });
          });
          
          
           $('.btap_tab').focus(function(){
            b=this.id;
            a=this.id.split('a');
            
            // alert(a[0]+" ****"+a[1]/*+" ****"+a[2]+"**** "+a[3]*/);
             $.post('action.php',{requete:'adoptbox2',id:a[0],num:a[1],contenu:$('#'+b).val()},function(data){
                //alert('#f'+b);
          //alert( ' $(.'+b+').html(data)');
          $('#f'+b).html(data);
             });
          });
        /////////////////////////////////////////////////////////////////////////////////////  3  
            /////modifier un champs
             $('.chx').keyup(function(){
                b=this.id;
            a=this.id.split('c');
            //  alert(a[0]+"  "+a[1]+"  "+ $('#'+b).val());
                $.post('action.php',{requete:'modchamp',sigle:a[0],id:a[1],valeur:$('#'+b).val()},function(data){
              
          $('#s'+b).html(data);
             });
            });
             
             
             
             
             
              $('.chx').focus(function(){
                b=this.id;
            a=this.id.split('c');
             // alert(a[0]+"  "+a[1]+"  "+ $('#'+b).val());
                $.post('action.php',{requete:'modchamp',sigle:a[0],id:a[1],valeur:$('#'+b).val()},function(data){
              
          $('#s'+b).html(data);
             });
            });
              
              ///modifier barette
               $('.chx2').change(function(){
                var bxi=0;
                if( $('#'+this.id).is(':checked') ){
    bxi=1;
} else {
    bxi=0;
} 
                b=this.id;
            a=this.id.split('c');
           
            //  alert(a[0]+"  "+a[1]+"  "+ bxi);
                $.post('action.php',{requete:'modchamp',sigle:a[0],id:a[1],valeur:bxi},function(data){
              
         // $('#vision').html(data);
             });
            });
             
             
             
             
            /////////////////////////////////////////////////////////
            
            });
        </script>