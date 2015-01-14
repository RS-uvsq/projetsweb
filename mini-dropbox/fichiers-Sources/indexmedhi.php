


<?php

$app->match('/utilisateurSession', function(Application $app,Request $req) {

$nom=$req->request->get('nom');
       $passut=$req->request->get('password');
	    $db = new PDO('mysql:host=localhost;dbname=pcloud','root','root24');
	
	  $querydouble1 = $db->prepare("select * FROM users where nom = '".$nom."'");
      $querydouble1->execute();
		$res1 = $querydouble1->fetchAll();
		$resetat = $querydouble1->fetch();
		  
		$querydouble2 = $db->prepare("SELECT * FROM mysql.user where user = '".$nom."'");
      $querydouble2->execute();
		$res2 = $querydouble2->fetchAll();
		
		$querydouble22 = $db->prepare("SELECT * FROM mysql.user where user = '".$nom."' and password ='".$passut."'");
      $querydouble22->execute();
		$res22 = $querydouble22->fetchAll();
		
			$quermp = $db->prepare("select * FROM users where nom = '".$nom."' and password = '".$passut."'");
      $quermp->execute();
		$resmp = $quermp->fetchAll();
 
		if (count($res1) == 0 && count($res2) == 0)
		{
	   $existpa="cet utilisateur n'existe pas clicker sur le lien 'inscrivez vous'";
		 return $app['twig']->render("web/connexionutil.html",array( 'existpa'=>$existpa));
	  }
	
	   else{
	   
		   if(count($res1) >= 1 && count($resmp) == 0){
				$mpincor="Mot de pass incorrecte";
				return $app['twig']->render("web/connexionutil.html",array( 'mpincor'=>$mpincor));
		   }
			else{
			
				if (count($resmp) >= 1 && $resetat['etat']==1 || count($res2) >= 1)
					{
						
								$app['session']->set('nomuse',$nom);
								$app['session']->set('passuse',$passut);
								return $app->redirect('/utilisateur'); 
							
						
					}
					else
					{
						if(count($resmp) >= 1 && $resetat['etat']==0 && count($res2) == 0){
						$etatnonva="vous n'est pas encore validé par l administrateur , veuillez attendre votre validation";
						return $app['twig']->render("web/connexionutil.html",array( 'etatnonva'=>$etatnonva));
						}
					
				  }
			  }
			 
		}
		
});


		   
$app->get('/modifierUser1', function(Application $app,Request $req) {
	$nomutli=$app['session']->get('nomuse');
	$passut=$app['session']->get('passuse');
	
	    $dbadmin = new PDO('mysql:host=localhost;dbname=pcloud',"root","root24");
		  
		$que = $dbadmin->prepare("SELECT * FROM users WHERE nom LIKE '".$nomutli."'");
      
		$que->execute();
		$resmo = $que->fetchAll();
		return $app['twig']->render("web/utilisateur.php" ,array('resmo'=>$resmo,'nom'=>$nomutli));
		
		//recuperer les info dans un formulaire
		
}	);	

 
$app->match('/modifierUser2', function(Application $app,Request $req) {

	$nom=$app['session']->get('nomuse');
	$passut=$app['session']->get('passuse');
	
		//$nomusr=$req->request->get('nomutilisateur');
		$prenomusr=$req->request->get('prenomutilisateur');
		//$motps=$req->request->get('motdepass');
		$mailus=$req->request->get('mailutilisateur');
	
	
	
	    $dbadmin = new PDO('mysql:host=localhost;dbname=pcloud',"root","root24");
		  
		$que = $dbadmin->prepare("UPDATE users SET prenom ='".$prenomusr."',mail='".$mailus."' WHERE  nom = '".$nom."'");
      
		$que->execute();
		
		/*$que2 = $dbadmin->prepare("UPDATE mysql.user SET user ='".$nomusr."'  WHERE  user = '".$nom."'");
      
		$que2->execute();
								$app['session']->set('nomuse',$nomusr);
								$app['session']->set('passuse',$motps);*/
		
//return $app->redirect('/utilisateur');

		return $app['twig']->render('web/utilisateur.php',array( 'modreus'=>'Modification reussite','nom'=>$nom));
}	);


	  
 
 $app->get('/utilisateur', function(Application $app,Request $req) {
	$nom=$app['session']->get('nomuse');
	$passut=$app['session']->get('passuse');
     $q=0;
     if($nom && $passut)
     {
          $valeur=1;
              
            

			//try{
          $dbadmin = new PDO('mysql:host=localhost;dbname=pcloud',"root","root24");
			  $db = new PDO('mysql:host=localhost;dbname=pcloud',$nom,$passut);
          $q=$dbadmin->prepare("UPDATE users SET connecte=? WHERE nom=?");

            $gh= $q->execute(array($valeur,$nom));
			  // $app['session']->set('dbse',$db);
			//  }
			 // catch(Exception $e){
			//  }
       
      try
		{  
		//$db= $app['session']->get('dbse');
		$query55 = $db->prepare("SELECT TABLE_NAME FROM information_schema.VIEWS");
			$query55->execute();
			$groupevall=$query55->fetchAll();
			$message="";
            
             if(count($groupevall)==1)
             {
				
                 $message="SELECT * FROM"." ".$groupevall['0']['0'];
				
             }
			else
			{
				for($i=0;$i<count($groupevall) ;$i++)
				{         
					  if($i==0 ){
						
						   
							  $message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." "."UNION"." ";
						
					   }
					   else
						{
							  if($i!=count($groupevall)-1){
									
									$message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." "." UNION"." ";
								
							   }
								else
								{	
									$message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." ";
									
							   }
						}   
				}
			}
          
             
          
			$query55 = $db->prepare($message);
            $query55->execute();
			$groupevall=$query55->fetchAll(); 
		}
catch ( Exception $e ) {
	return $app['twig']->render('web/admin.php',array( 'message'=>'Vous ne faite pas partie des users mysql'));
}
              
 $app['session']->set('tab',$groupevall);
        
		return $app['twig']->render("web/utilisateur.php" ,array( 'm'=>$groupevall,'nom'=>$nom,'acc'=>1));
 }
     else
          return $app->redirect('/');
         
 });


   $app->post('/enregistrement', function(Application $app,Request $req) {
	 
	 	$nomu=$req->request->get('nom');
	 $prenomu=$req->request->get('prenom');
	 $mailu=$req->request->get('mail');
	 $passwordu=$req->request->get('password');
	 $db = new PDO('mysql:host=localhost;dbname=pcloud','root','root24');
	
	  $querydouble = $db->prepare("select * FROM users where nom like '%".$nomu."%'");
      $querydouble->execute();
		$res = $querydouble->fetchAll();
 
		if (count($res) == 0)
		{
					
				$mailu = htmlspecialchars($mailu);
			 
				  if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i",$mailu))
					{
					     $stmt = $db->prepare("INSERT INTO users (nom,prenom,password,mail,date,groupe,etat,connecte) VALUES (:cha1, :cha2, :cha3, :cha4, NOW(),1,0,0)");
						 $stmt->bindParam(':cha1',$nomu);
						 $stmt->bindParam(':cha2',$prenomu);
						 $stmt->bindParam(':cha3',$passwordu);
						 $stmt->bindParam(':cha4',$mailu);
				  
						 $stmt->execute();
			 
						 $bienvenu="bienvenue '" . $nomu . "' vous recevrez un email de validation par l administrateur ";
						 return $app['twig']->render("web/connexionutil.html",array( 'bvnu'=>$bienvenu));
					}
				  else
					{
					  $mailInvalid = "L' adresse eMail est invalide ";
					  return $app['twig']->render("web/connexionutil.html",array( 'mailInvalid'=>$mailInvalid));
					}
			  
		}
		else{
		
		 $dejaExiste="l' utilisateur '" .$nomu ."' existe deja veuillez choisir un autre nom";
		 return $app['twig']->render("web/connexionutil.html",array( 'existdeja'=>$dejaExiste));
		}
         
}); 

?>