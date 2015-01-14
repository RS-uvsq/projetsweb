<?php

    $error    = NULL;
    $filename = NULL;

    if (isset($_FILES['uploadFile']) && $_FILES['uploadFile']['error'] === 0) {

        $filename = $_FILES['uploadFile']['name'];
		
        $targetpath = '/web/vuefile/' . $filename; // On stocke le chemin où enregistrer le fichier
        
        // On déplace le fichier depuis le répertoire temporaire vers $targetpath
        if (@move_uploaded_file($_FILES['uploadFile']['tmp_name'], $targetpath)) { // Si ça fonctionne
            {$error = 'OK';
			
			 $nm=basename($_FILES['uploadFile']['name']);
             $extractnamefile=substr($nm,strripos($nm,'.'));
			}
        } else { // Si ça ne fonctionne pas
            $error = "Échec de l'enregistrement !";
        }
    } else {
        $error = 'Aucun fichier réceptionné !';
    }

// Et pour finir, on écrit l'appel vers la fonction uploadEnd : 
?>

<script>
alert("<?php echo $filename; ?>");
    window.top.window.uploadEnd("<?php echo $error; ?>", "<?php echo $targetpath; ?>","<?php echo $extractnamefile; ?>");
</script>