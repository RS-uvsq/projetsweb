 <style>
    .cerfa,cerfa2
    {
        width: 130px;
        height: 200px;
        background: #a5bdd7;
        display: inline-block;
        margin: auto;
          margin: 5px;
          overflow: hidden;
          padding: 2px;
    }
    .cerfa:hover,cerfa2:hover
    {
        box-shadow:1px 1px 3px #000;
        cursor: pointer;
    }
    img
    {
        /*box-shadow:1px 1px #cdcdcd;*/
        cursor: pointer;
    }
    .call
    {
        margin: 0px;
        color: green;
    }
    .call2
    {
        margin: 0px;
        color: blue;
    }
    
 </style>
 <script>
    $(document).ready(function(){
        $('.cerfa').click(function(){
            $(this).html("<img src='images/load.gf' >");
          $.post('action.php',{requete:'armoire',id:this.id},function(data){
            $('#caccueil').html(data);
          });
        });
    });
 </script>
 
 <?php
include('../../configuration/connexion.php');
$rs=$db->query("select * from modele limit 12");
$rs=$rs->fetchAll();

foreach($rs as $row)
{
   

  $id= $row['ID_CERFA'];
  $titre=$row['TITRE'];
  $rs2=$db->query("select COUNT(id) from cerfa  where ID_CERFAE='$id'") or die('erreur');
  $rs2=$rs2->fetch();
   $nb=$rs2['COUNT(id)'];
 
  $img="<img src='images/armoire.png' alt='$titre' title='$titre' width=100px>";
  echo "<div class='cerfa' id='$id'><div class='call'>$id</div> $img <div class='call2'>($nb)</div> $titre</div><!--<a href='cerfa.php?id=$id' target='blank'>$titre</a>-->";
   
  /* foreach($row as $val)
   {
    echo $val['ID'];
    echo '<br>';
   }*/
}

?>