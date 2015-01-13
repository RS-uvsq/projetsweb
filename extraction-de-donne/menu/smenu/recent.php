 <style>
    .cerfa
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
    .cerfa:hover
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
        
    }
 </style>
 <script>
    $(document).ready(function(){
        $('.cerfa').click(function(){
           
       //  $('#pt').html("<a href='cerfa.php?id="+this.id+"' target='blank'>djjdf<br><img src=rep/traiter/"+this.id+".jpg width='600px'></a>");
         $.post('action',{requete:'afcerfa',id:this.id},function(data){
           $('#photos').html(data)
         });
        });
    });
 </script>
 
 <?php
include('../../configuration/connexion.php');
$rs=$db->query("select * from cerfa limit 12");
$rs=$rs->fetchAll();

foreach($rs as $row)
{
   //print_r( $row);
  $id= $row['ID'];
  $titre=$row['TITRE'];
  $img="<img src='rep/traiter/$id.jpg' alt='$titre' title='$titre' height=200px>";
  echo "<div class='cerfa' id='$id'><div class='call'></div> $img</div><!--<a href='cerfa.php?id=$id' target='blank'>$titre</a>-->";
   
  /* foreach($row as $val)
   {
    echo $val['ID'];
    echo '<br>';
   }*/
}

?>