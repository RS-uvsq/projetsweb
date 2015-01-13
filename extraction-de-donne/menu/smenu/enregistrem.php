<?php
    session_start();
    unset($_SESSION['champ']);
    $_SESSION['champ']=array();//tableau de champs
    $_SESSION['cpt']=0; // compteur du nombre de champs
    $_SESSION['textm']=''; // texte de l' autocomplete

    ?>
    
    
  
<script src='java/enregistrem.js'></script>
<!--<script src='autoc/autc.js'></script>-->
<link  rel='stylesheet'   href='autoc/style.css'> </link>


<div id='senregistrem'>
    <div id='ajc' >
        Libell&#233;<input type='text' id='tmcerfa' style='width:550px'>
         <span class='option' id='cnop'>Nombre des cases:<input type='text' id='nop' ></span>
        <span id='ctab' class='option'>
            <span> Nombre de ligne:<input type='text'  id='nbl'></span>
          <span>  Nombre de colone:<input type='text' id='nbc'></span>
          </span>  
      <span id='ema'>
        <input type='hidden' id='mdcerfa' >
       <input type='hidden' id='mfcerfa'>
        </span>
        Type<select id='tpcerfa'> 
        <option  value='textp'>textp</option>
        <!--<option value='radio'>radio</option>-->
         <option value='box'>box</option>
         <option value='tab'>tab</option>
        </select>
        <span id='ajp'> 
       <span>ajouter Apres </span><select id='dif'>
            <option value='premier' >titre du cerfa </option>
        </select>
        
        </span>
        
        <input type='button' value='ajouter' id='btmcerfa'>
            
            <input type='button' value='autocp' id='autocp'>
             <span style='font-size: 10px' id='feed-autocp'>desactiv&#233;</span> 
            <img  id='enhaut' src='images/haut.png' height=25px style='cursor: pointer;float: right;display: none'>
          
    </div>
    
    
    <br>
    <br>
        <div id='meg'>
 <span class='label' > Numero du cerfa: </span><input type='text' id='id_cerfa'  ><br>
  <div class='nchamp'>
    <span class='label'> Titre du cerfa:</span><textarea id='titre_cerfa'></textarea>
    <hr>
  </div>
   <div id='traitauto'>
    <!--ici que les elements s' ajoutent-->
   <!-- à effacer--> <div id='vision'></div>
   </div>
   <input type='button' value='enregistrer le model' id='ermdl'>
    <div id='fermdl'></div>
   </div><!--menug-->
   
   
   
   <div id='med'>
    
   <!--  <span style='float: right'>
        
        <form method='post' action='menu/smenu/text.php?nm=ok' target='previsualiser' enctype='multipart/form-data' >
 <input type='file' name='tof'  >
        <input type='submit' value='charger' name='submit'>
    </form>
        
     </span>
     <iframe name='previsualiser' width='590' height='400'  src='menu/smenu/text.php' frameborder='0' allowfullscreen>-->
     <script src="upload/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="upload/uploadify.css">
    <form>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true">
	</form>
    
    
    
    
     <script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
                    
                    
                    $.post('upload/apercu.php',{requete:'ancien'},function(data){
            $('#catr').html(data);
           });
                    
			$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'upload/uploadify.swf',
                                'buttonText' : ' un fichier',
				'uploader' : 'upload/uploadify.php?modele=1',
                                'onQueueComplete' : function(uploads) {
           // alert(uploads.successful + ' files were uploaded successfully.');
           
           $.post('upload/apercu.php',{requete:'modele'},function(data){
            $('#cat').prepend(data);
           });
        }
                                 
			});
		});
	</script>
        
        <div id='cat'>
            
        </div>
        
   </div><!--menud-->
   
   
    
</div><!--senredistrem-->
<div id='autoc'><div id='sp'>saisir un text</div></div>
<div id='fautx'>fermer</div>