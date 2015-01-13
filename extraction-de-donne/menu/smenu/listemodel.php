<style>
    
    #id_c
    {
        width: 100px;
        height: 20px;
        background: #cdcdcd;
        margin-top: 20px;
        display: inline-block;
        text-align: center;
        border-top-left-radius: 10px;
    }
     #titrem
    {
        width: 500px;
        height: 20px;
        background: #cdcdcd;
        margin-top: 20px;
        display: inline-block;
        text-align: center;
    }
     #enr
    {
        width: 300px;
        height: 20px;
        background: #cdcdcd;
        margin-top: 20px;
        display: inline-block;
        text-align: center;
    }
     #action
    {
        width: 150px;
        height: 20px;
        background: #cdcdcd;
        margin-top: 20px;
        display: inline-block;
        text-align: center;
        border-top-right-radius: 10px;
    }
    .ct
    {
        width: 1100px;
        margin: auto;
    }
    .ct2
    {
        width: 1100px;
        margin: auto;
        padding-top: 2px;
       
    }
span
    {
         margin-left: 2px;
    }
    
    
    .id_c
    {
        width: 100px;
        height: 20px;
        background: #a5bdd7;
       
        display: inline-block;
        text-align: center;
    
    }
     .titrem
    {
        width: 500px;
        height: 20px;
        background: #a5bdd7;
        display: inline-block;
        text-align: center;
    }
     .enr
    {
        width: 300px;
        height: 20px;
        background:#a5bdd7;
        display: inline-block;
        text-align: center;
    }
     .action
    {
        width: 150px;
        height: 20px;
        background:#a5bdd7;
        display: inline-block;
        text-align: center;
        /*font-size: 10px;
        cursor: pointer;*/
    }
    #liste
    {
        
    }
    .ct2 img
    {
       display: none;
    }
    
    
</style>
<script>
    $(document).ready(function(){
    
    $('.voir').click(function(){
        a=this.id;
        a=a.replace('a','#');
         a=a.replace('a','*');
        $('#fliste1').show('slide',function() {
            
            $('.fliste2').fadeIn(1000);
        });
        
        $.post('action.php',{requete:'voirmod',id:a},function(data){
            $('#f1').html(data);
            
        });
    });
    
    
    
    $('#fliste1').click(function(){
        
         $('.fliste2').hide('slide',function() {
            
            $('#fliste1').hide(500);
        });
        
    });
    
        
    });
</script>

<div id='liste'>
<div class='ct'><span id='id_c'>id cerfa</span><span id='titrem'>Titre</span><span id='enr'>enregistrer par</span><span id='action'>Action</span></div>

<?php
include('../../configuration/connexion.php');




$rs=$db->query("select * from modele ");
$rs=$rs->fetchAll();

foreach($rs as $row)
{
     $idc=$row['ID_CERFA'];
   $titre=$row['TITRE'];
    $id=$row['ID_PERSONNE'];
    $r1=$db->query("select nom, prenom from utilisateur where id_personne=$id limit 1");
$r1=$r1->fetch();
$nom= $r1['nom'];
$prenom= $r1['prenom'];
 $id=str_replace('#','a',$idc);
 $id=str_replace('*','a',$idc);
//print_r($r1);
    echo" <div class='ct2'><span class='id_c'>$idc</span><span  class='titrem'>$titre</span><span class='enr'>$nom $prenom</span><span class='action'>
    <a  id='$id' class='voir' href='#'>voir</a>
    <a id='s$id' class='supp' href='#'>supp</a>
    </span></div>";
}
//print_r($rs);
?>
</div>