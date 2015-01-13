<script>
    $(document).ready(function(){
    ///depart
    $('#caccueil').html("<img src='images/load.gif'>");
    $('#caccueil').load("menu/smenu/recent.php",function(){
        $('#maccueil').show('explode',800);
        $('#caccueil').show('drop',800);
    });
   
   
           
        
   
   
   
    $('.maccueil').click(function(){
       
    
        $('#caccueil').html("<img src='images/load.gif'>");
    $('#caccueil').load("menu/smenu/"+this.id+".php");
   });
    
    
    
});
</script>



<style>
    #maccueil
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
    
    .maccueil
  {
    width: 200px;
    height: 20px;
   
    display: inline-block;
    text-align: center;
    cursor: pointer;
   /* background: #cdcdcd;*/
  }
  .maccueil:hover
  {
    width: 200px;
    background:#cdcdcd;
    display: inline-block;
    text-align: center;
    text-decoration: underline;
  }
  #caccueil
  {
    /*background: red;*/
   text-align: center;
   width:600px;
   float: left;
   display: none;
   height: 700px;
   overflow: auto;
   
  }
  #photos
  {
    /*background: red;*/
   text-align: center;
   width:600px;
   float: right;
  
  }
  
    
</style>



<div id='maccueil'>
<span class='maccueil' id='recent'>recent </span>
<span class='maccueil' id='modele'>modele </span>
<span class='maccueil' id='utilisateur'>Utilisateur</span>
</div>

<div id='caccueil'>

</div>
<div id='photos'>
   
</div>







