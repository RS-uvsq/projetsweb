<!--<script src='java/service.js'></script>-->
<script>
    $(document).ready(function(){
    ///depart
    $('#cgestion').html("<img src='images/load.gif'>");
    $('#cgestion').load("menu/smenu/parametre.php",function(){
        $('#mgestion').show('explode',800);
    });
   
   
           
        
   
   
   
    $('.mgestion').click(function(){
       
    
        $('#cgestion').html("<img src='images/load.gif'>");
    $('#cgestion').load("menu/smenu/"+this.id+".php");
   });
    
    
    
});
</script>



<style>
    #mgestion
    {
        width: 1190px;
        height: 20px;
       /* margin-top: px;*/
        background: #cdcdcd;
        padding: 5px;
        border-bottom-left-radius:10px;
        border-bottom-right-radius:10px;
        display: none;
    }
    
    .mgestion
  {
    width: 200px;
    height: 20px;
   
    display: inline-block;
    text-align: center;
    cursor: pointer;
   /* background: #cdcdcd;*/
  }
  .mgestion:hover
  {
    width: 200px;
    background:#cdcdcd;
    display: inline-block;
    text-align: center;
    text-decoration: underline;
  }
  
    
</style>
<div id='mgestion'>
<span class='mgestion' id='parametre'>parametre </span>
<span class='mgestion' id='compte'>Compte </span>
<span class='mgestion' id='historique'>Historique </span>
</div>

<div id='cgestion'>
</div>

