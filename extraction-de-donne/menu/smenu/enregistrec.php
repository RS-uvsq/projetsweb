<?php
include('../../configuration/connexion.php');
$_SESSION['cocher']=array();
$_SESSION['img']=array();
?>
 
 <style>
    #catr
    {
        width: 400px;
        float: left;
    }
    #palet
    {
        height: 50px;
    }
    #photo
    {
    margin: 5px;
    width: 700px;
    height: 1000px;
    background: #cdcdcd;
    float: right;
    padding: 2px;
    }
    .bt_t
    {
        float:right;
        cursor: pointer;
    }
    #dtrm
    {
        width: 100px;
        background:#a5bdd7;
      display: none;
      position: absolute;
      /*height: 400px;*/
      overflow: auto;
      cursor: pointer;
      
left: 700px;
box-shadow:1px 1px 3px #000;
    }
    img
    {
        cursor: pointer;
    }
 </style>
 <div id='senregistrec'>
    
    
    
    
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
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
                                'buttonText' : ' Les fichiers',
				'uploader' : 'upload/uploadify.php',
                                'onQueueComplete' : function(uploads) {
           // alert(uploads.successful + ' files were uploaded successfully.');
           
           $.post('upload/apercu.php',{requete:'nouveau'},function(data){
            $('#catr').prepend(data);
           });
        }
                                 
			});
                        
                        $('#catr').hide();
                        $('#catr').show('drop');
                        
        
		});
	</script>
    
    
 </div>
 
 <div id='palet'>
       <a href="#" class="bouton gris medium" id='ts'>Tout selectionner</a>
       <a href="#" class="bouton gris medium" id='tds'>Tout delectionner</a>
       <a href="#" class="bouton gris small" id='sup'>supprimer</a>
       <a href="#" class="bouton gris small" id='tra'>Traiter</a>
       <a href="#" class="bouton gris small" id='trm'>Traiter(0)</a><div id='dtrm'> </div>
       
    </div>
 <div id='routeur'></div>
 <div id='catr'>
    
 </div>
 
 
 <div id='photo'>
    
 </div>