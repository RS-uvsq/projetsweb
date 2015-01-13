

<?php
include('../../configuration/connexion.php');
$id=$_SESSION['id'];
$r=$db->query("select tolerance from utilisateur where id_personne=$id");
$r=$r->fetch();
$tolerance= $r['tolerance'];
?>
<style>
    #princip
    {
        width:294px;
          padding:3px;
        background:#a5bdd7;
        margin:auto;
        text-align:center;
        color:#ffffff;
        height:800px;
      
        
    }
    #titre
    {
       
        width:300px;
        background:yellow;
        margin:auto;
         margin-top:20px;
        text-align:center;
        color: #544f4f;
        border-top-left-radius:10px;
        border-top-right-radius:10px;
        background:#d9d4d4;
    }
    #titre2
    {
       
        width:294px;
        background:yellow;
        margin:auto;
         margin-top:20px;
        text-align:center;
        color: #544f4f;
        background:#d9d4d4;
        
    }
    body
{
    
    background:#faf8f8;
    margin:auto;
}
    form
    {
    /*text-align:left;*/
    }
    input
    {
    width:250px;
    }
    select
    {
    width:254px;
    }
    #photo
    {
    width:280px;
    height:250px;
    margin:auto;
   overflow:hidden;
    text-align:center;
    }
    .erreur
    {
    padding: 2px;
    background: #eeb09b;
     border: groove;
     color:#000;
    }
        
    </style>
<div id='titre'>Modifier les parametres</div>
<div id='princip'>
<?php
echo"tolerence:<select id='parm'>";
for ($i=0;$i<=100;$i++)
{
    if($i==$tolerance)
    {
        echo "<option value='$i' selected>$i<option>";
    }
    else{
       echo "<option value='$i'>$i<option>"; 
    }
}

echo"</select>";

?>
<div id='feedback'></div>
</div>
<script>
    $(document).ready(function(){
        $('#parm').change(function(){
            $.post('action.php',{requete:'tolerance',valeur:$('#parm').val()},function(data){
              $('#feedback').html(data);
            });
        });
    });
</script>
