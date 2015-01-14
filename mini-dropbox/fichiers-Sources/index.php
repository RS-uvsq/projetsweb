<?php
require_once 'vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use \DB\MySQL as mysql;



$app = new Application();

// Configuration
$app['debug'] = true;


//précision de l'emplacement de mes fichiers templates
 $app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), 
               array('twig.path' => '.'));
         
    //s1 et s2 sont les scores respectifs du joueur 1 et 2  et vaut 0 au debut du jeux    
     
    //game1 est l'id du premier champ de texte et game2 du second champ du texte
    //c1 et c2 sont les couleurs respectif du joueur 1 et du joueur 2
    // n1 contient le nom du joueur 1 et n2 celui du joueur 2
    
     
 
$app->register(new Silex\Provider\SwiftmailerServiceProvider());

    $app['swiftmailer.options'] = array(
        'host' => 'smtp.gmail.com',
        'port' => 465,
        'username' => 'mvouyorick@gmail.com',
        'password' => 'CHRISTDIEU26chyl?',
        'encryption' => 'ssl',
        'auth_mode' => 'login',
        'transport'=> 'smtp',
    );
//medhi**********************DEBUT
$app->match('/utilisateurSession', function(Application $app,Request $req) {

$nom=$req->request->get('nom');
       $passut=$req->request->get('password');
    // $passut=md5($passut);
    
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
		 return $app['twig']->render("/projetbdd/web/connexionutil.html",array( 'existpa'=>$existpa));
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
								return $app->redirect('/projetbdd/utilisateur'); 
							
						
					}
					else
					{
						if(count($resmp) >= 1 && $resetat['etat']==0 && count($res2) == 0){
						$etatnonva="vous n'est pas encore validé par l administrateur , veuillez attendre votre validation";
						return $app['twig']->render("web/medh/connexionutil.html",array( 'etatnonva'=>$etatnonva));
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
		return $app['twig']->render("web/medh/utilisateur.php" ,array('resmo'=>$resmo,'nom'=>$nomutli));
		
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

		return $app['twig']->render('web/medh/utilisateur.php',array( 'modreus'=>'Modification reussite','nom'=>$nom));
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
          
             
          // return  print_r($message);
			$query55 = $db->prepare($message);
            $query55->execute();
			$groupevall=$query55->fetchAll(); 
                    
         
		}
catch ( Exception $e ) {
	return $app['twig']->render('web/medh/admin.php',array( 'message'=>'Vous ne faite pas partie des users mysql'));
}
              
 $app['session']->set('tab',$groupevall);
       
         
		return $app['twig']->render("web/medh/utilisateur.php" ,array( 'm'=>$groupevall,'nom'=>$nom,'acc'=>1));
 }
     else
          return $app->redirect('/');
         
 });


   $app->post('/enregistrement', function(Application $app,Request $req) {
	 
	 	$nomu=$req->request->get('nom');
	 $prenomu=$req->request->get('prenom');
	 $mailu=$req->request->get('mail');
	 $passwordu=$req->request->get('password');
      // $passwordu=md5($passwordu);
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



//medhi***********************FIN


 $app->get('/telechargement/{n}', function(Application $app,Request $req,$n) {
     
     



     $file = 'web/vuefile/'.$n; 

if (file_exists($file)) { 
    header('Content-Description: File Transfer'); 
    header('Content-Type: application/octet-stream'); 
    header('Content-Disposition: attachment; filename="'.basename($file).'"'); 
    header('Content-Transfer-Encoding: binary'); 
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
    header('Pragma: public'); 
    header('Content-Length: ' . filesize($file)); 
    ob_clean(); 
    flush(); 
    readfile($file); 
    exit; 
    
   
 }
     else
      return  $app->redirect("/projetbdd/utilisateur");
     
 }
          );

 $app->get('/', function(Application $app,Request $req) {
	 
       
	 return $app['twig']->render("web/connexionutil.html",array(""));
 
}); 
$app->get('/deconnect', function(Application $app,Request $req) {
	  $db = new PDO('mysql:host=localhost;dbname=pcloud',"root","root24");
           if($app['session']->get('nomuse') && $app['session']->get('nomuse')!="root")
           {
               $valeur=0;
               $nom=$app['session']->get('nomuse');
                $sql =" UPDATE users SET connecte=? WHERE nom=?";
              
             $q=$db->prepare($sql);

             $q->execute(array($valeur,$nom));
           }
	 return $app['twig']->render("web/connexionutil.html",array(""));
 
}); 
$app->match('/bn', function(Application $app,Request $req) {
      
      return $app['twig']->render("web/index.php",array("etape2"=>'1'));

}
          );


      

$app->get('/Viewuser', function(Application $app,Request $req)
          
{
     $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
    $n=1;
     $sth = $db->prepare("SELECT id,nom,prenom,mail,groupe,date,connecte FROM users WHERE etat='$n'");
        $sth->execute();
        $c=$sth->fetchAll();
     $sth1 = $db->prepare("SELECT * FROM gausers");
        $sth1->execute();
        $c1=$sth1->fetchAll();
        $valeur=array();
    
        foreach($c1 as $k)
				{     
                    $v=$k['id'];
					$valeur[$v]=$k['name'];
                }
			$tab=array("val1"=>$c,"val2"=>$valeur,"val3"=>$c1);	
return $app->json($tab);			
    //return $app['twig']->render("web/gestion.php",array("inp"=>0,"tabl1"=>$c,"val"=>$valeur));
    
}
         );
$app->get('/Viewfile', function(Application $app,Request $req)
          
{
     $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
     $n=1;
     $sth = $db->prepare("SELECT nom,auteur,type,date,description FROM fichiers ");
        $sth->execute();
        $c=$sth->fetchAll();
    return $app['twig']->render("web/gestion.php",array("inp"=>0,"tabl2"=>$c));
    
}
         );

       


$app->get('/subscription', function(Application $app,Request $req) {

       
          $rep=$req->query->get('accept');
          $grou=$req->query->get('grou');
   
           if($rep==2)
           {
                  if($grou)
              return  $app->redirect('/ajout/'.$n.'?grou='.$grou);
               else
                    return  $app->redirect('/ajout/'.$n);
           }
               
               if($rep==3)
               {
                    if($grou)
           return  $app->redirect('/delete/'.$n.'?grou='.$grou);
                    else
                    return  $app->redirect('/delete/'.$n);
               }
              
            else
              return $app->redirect("/gestion"); 
    
               

}
          );
$app->get('/gestion', function(Application $app,Request $req) {
    
       if($req->query->get('es'))
           $u="Oooups,Vous avez omis de précisé l'action sur le fichier précedent";
    else
        
        $u="OOuuups,Vous avez oumis de précisé votre choix sur la demande d'inscription";
     return $app['twig']->render("web/gestion.php",array("u"=>$u,'inp'=>'1'));
}
         );
//recherche de fichiers
$app->post('/utilisateur1', function(Application $app,Request $req) {
		$nom=$app['session']->get('nomuse');
	$passut=$app['session']->get('passuse');

	
	   	 $nomf=$req->request->get('nomf');
		  $description=$req->request->get('mocle');
		   $auteur=$req->request->get('nomau');
	
			  $db = new PDO('mysql:host=localhost;dbname=pcloud',$nom, $passut);
			 $mes=$nomf.":".$description.":".$auteur;
   
       
      try
		{  
		//$db= $app['session']->get('dbse');
		$query55 = $db->prepare("SELECT TABLE_NAME FROM information_schema.VIEWS");
			$query55->execute();
			$groupevall=$query55->fetchAll();
          
			$message="";
            
             if(count($groupevall)==1)
             {
				
					$message="SELECT * FROM"." ".$groupevall['0']['0']. " where nom like '%".$nomf."%' and description like '%".$description."%'  and auteur like '%".$auteur."%' ";
				
             }
			else
			{
				for($i=0;$i<count($groupevall) ;$i++)
				{         
					  if($i==0 ){$message=$message." SELECT * FROM"." ".$groupevall[$i]['0']. " where nom like '%".$nomf."%' "." and description like '%".$description."%'  and auteur like '%".$auteur."%'  UNION "." ";
							
					   }
					   else
						{
							  if($i!=count($groupevall)-1){
									$message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." where nom like '%".$nomf."%' "." and description like '%".$description."%'  and auteur like '%".$auteur."%'  UNION "." ";
									
							   }
								else
								{	
									$message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." where nom like '%".$nomf."%' and description like '%".$description."%'  and auteur like '%".$auteur."%' ";
								
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
    
		return $app['twig']->render("web/medh/utilisateur.php" ,array( 'ms'=>$groupevall,'nom'=>$nom));
 });

$app->match('/acceuiluser', function(Application $app,Request $req) {

  
return $app['twig']->render("web/medh/utilisateur.php" ,array( "acc"=>1,'nom'=>$app['session']->get('nomuse')));
  
});
//connexion utilisateur

$app->match('/recuptab', function(Application $app,Request $req) {

  
return $app['twig']->render("web/medh/utilisateur.php" ,array( "disponible"=>1,'m'=>$app['session']->get('tab'),'nom'=>$app['session']->get('nomuse')));
  
});
		
        $app->match('/recherchefile', function(Application $app,Request $req) {

  
return $app['twig']->render("web/medh/utilisateur.php" ,array( "cherch"=>1,'nom'=>$app['session']->get('nomuse')));
  
});

		   
		   
 


   


 $app->post('/cherchef/{n}', function(Application $app,$n,Request $req) {
 
	
	 $nomf=$req->request->get('nomf');
	 $motcle=$req->request->get('motcle');
	 $nomaut=$req->request->get('nomau');
	 $datefi=$req->request->get('datef');
	 $db3 = new PDO('mysql:host=localhost;dbname=pcloud','root','root24');
	  $query3 = $db3->prepare("select * FROM fichiers where nom like '%".$nomf."%' and description like '%".$motcle."%' and auteur like '%".$nomaut."%' and date like '%".$datefi."%'");
      $query3->execute();
	 
	 $resultatf=$query3->fetchAll();
	                  if($resultatf){}
                         else
					return "ESSAIE";
		return $app['twig']->render("web/utilisateur.php" ,array('s'=>$resultatf,'nom'=>$n));
		
		
           });

 $app->match('/utilisateur', function(Application $app,Request $req) {
     $nom=$req->request->get('nom');
       $pass=$req->request->get('password');
    
    // return   $pass;
        $app['session']->set('nm',$nom);
      try
      {          
          $db = new PDO('mysql:host=localhost;dbname=pcloud',$nom,$pass);
          
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
                  if($i==0 )
                      $message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." "."UNION"." ";
                else
                {
                    
                      if($i!=count($groupevall)-1)
                   $message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." "."UNION"." ";
                    else
                   $message=$message."SELECT * FROM"." ".$groupevall[$i]['0']." ";
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
              
 
                     if($groupevall)
		return $app['twig']->render("web/utilisateur.php" ,array( 'm'=>$groupevall,'nom'=>$nom));
     else
     {
         $er="IL n'y a aucun fichier pour le Moment";
         return $app['twig']->render("web/utilisateur.php" ,array( 'u'=>$er,'error'=>1));
     }
 });







 $app->post('/userstate',function(Application $app,Request $req) {
     
     
 }
           );

  $app->post('/accueille', function(Application $app,Request $req) {
      
       
    // $nom1=$_POST['nom','erreur'];
      
       $nom=$req->request->get('nom');
        $pass=$req->request->get('password');
		
     
     
      try
      {          
	 
     
          $db = new PDO('mysql:host=localhost;dbname=pcloud',$nom,$pass);
         
              
             $app['session']->set('root',$nom);
             $app['session']->set('pass',$pass);
              if($nom=="root")
              {
                  
                
                 
       /*$message = Swift_Message::newInstance('Wonderful Subject')
  ->setFrom(array('mvouyorick@gmail.com'))
  ->setTo(array('yoricklionel@yahoo.fr'))
  ->setBody('Here is the message itself')
  ;
 
    $rest=$app['mailer']->send($message);*/
                 
     
                  return $app['twig']->render('web/menu/home.php',array( 'inp'=>'1'));
              }
          else
          {
             
              return $app->redirect('/testeb'); 
          }
                }
catch ( Exception $e ) {
 
    
     return $app['twig']->render('/projetbdd',array( 'message'=>'Vous ne faite pas partie des users mysql'));
   
  
}
     
      }
 
  );

 $app->match('/uv', function(Application $app,Request $req) {

 return $app['twig']->render('web/index.html',array( ''));
   } 
  );
 $app->match('/administrateur', function(Application $app,Request $req) {

 return $app['twig']->render('web/administrateur/admin.php',array( 'inp'=>''));
   } 
  );
   
   $app->post('delete', function(Application $app,Request $req) {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

$n=$req->request->get('n');
 $db->exec("DELETE FROM  users WHERE id='$n'");
      $sth = $db->prepare("SELECT * FROM users WHERE etat='0'");
      $sth->execute();
      $c = $sth->fetchAll();

              
             $mytab=array();
			 
           return $app->json($mytab);
        
 }
 );
   
    $app->post('ajout', function(Application $app,Request $req) {

      $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
     

       $f=$req->request->get('groupe');
	    $n=$req->request->get('n');
      
          $val4=intval($n);
         $grou=intval($f);
          $valeur=1;
         $name=0;
        $pass=0;
        $sth = $db->prepare("SELECT nom,password,mail FROM users WHERE id='$val4'");
        $sth->execute();
        $c=$sth->fetchAll();
       $mail="dodo";
        foreach($c as $ta)
		     {
              
		     $name=$ta['nom'] ;
            $pass=$ta['password'];
            $mail=$ta['mail'];
              
        
              }
                    if($grou){}
        else
            $grou=1;
                $to="yoricklionel@yahoo.fr";
        $sign=0;
$subject  = 'Testing sendmail.exe';
$message  = "Bienvenu sur plcoud Mr/Mme"." "."yyo"." "."Vous pouvez dès à présent vous connectés avec vos identifiant";
$headers  = 'From: sender@gmail.com' . "\r\n" .
            'Reply-To: sender@gmail.com' . "\r\n" .
            'MIME-Version: 1.0' . "\r\n" .
            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
    $sign=1;

   
              $sql =" UPDATE users SET etat=? ,groupe=? WHERE id=?";

             $q=$db->prepare($sql);

             $q->execute(array($valeur,$grou,$val4));
        
            //on crée un utilisateur dans mysql
         
          
       $db->query('CREATE USER '.$name.'@localhost IDENTIFIED BY "'.$pass.'"');
        
         $sth = $db->prepare("SELECT  name  FROM gfichieruser,addgf  WHERE idg='$grou' and idf=idag");
        $sth->execute();
        $c=$sth->fetchAll();
        $bool=0;
      /* print_r($c);
        
        return "hello";*/
           foreach($c as $ta)
           {
               $f=$ta['name'];
             
              $rep=$db->exec("GRANT SELECT  ON ".$f." TO '$name'@'localhost' ");
                if($rep==0)
                {
                   
                     $bool=1;
                    
                   
                }
             
               
           }
   
         
                         if($bool)
                         {
                              
                             
                               
                              $mytab=array("erreur"=>0);
                              return $app->json($mytab);
                         }
        else
        {
           
            $valeur=0;
            $grou=1;
             
        
            $db->exec("DROP USER '$name'@'localhost'");
             $sql =" UPDATE users SET etat=? ,groupe=? WHERE id=?";

             $q=$db->prepare($sql);

             $q->execute(array($valeur,$grou,$val4));
            
          $mytab=array("erreur"=>1);
          return $app->json($mytab);
        }
        // on leur permet de voir la liste des utilsateur et la liste des groupes d'utilisateur
          /*$db->exec("GRANT SELECT  ON  pcloud.users TO '$name'@'localhost' ");
          $db->exec("GRANT SELECT  ON  pcloud.gusers TO '$name'@'localhost' ");*/
       
       
              
        
        

   } 
  );

$app->match('/groupefichier', function(Application $app,Request $req) {

 $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
$t = $db->prepare("SELECT * FROM addgf");
                  $t->execute();
                  $li=$t->fetchAll();
				  return $app->json($li);
}
);

$app->match('/modif', function(Application $app,Request $req) {
    
    
    
}
           );
 $app->match('/addfile', function(Application $app,Request $req) {


            $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));


            $id1=$req->request->get('file');
     //$HTTP_POST_VARS['file'];
    
        $id2=$req->request->get('tfile');
     // $file=$_FILES['ffile'];
         
       
        $id3=$req->request->get('dafile');
        $id8=$req->request->get('keyfile');
        $id4=$req->request->get('aufile');
         $id7=$req->request->get('dfile');
        
       
         
          $id5=$req->request->get('grouf');
         $val1=intval($id5);
     $d=$req->request->get('prenom');
    $file = $req->files->get('ffile');
   
           $dir="web/vuefile/";
           $name="aucun fichier";
         
                   
           $nm=basename($_FILES['ffile']['name']);
           $extractnamefile=substr($nm,strripos($nm,'.'));
                
              $my=$db->prepare("SELECT * FROM fichiers WHERE role='$nm'");
                  $my->execute();
                 $yors=$my->fetchAll();
                   if($yors)
                   {
                       $id1=$nm+" "+" existe déjà!";
                        return $app['twig']->render('web/menu/home.php',array( 'file'=>$id1));

                   }
                       
      
           
                 
            $stmt = $db->prepare("INSERT INTO fichiers (nom,type,auteur,date,description) VALUES (:cha1,:cha2,:cha3,:cha4,:cha5)");
             $stmt->bindParam(':cha1',$id1);
             $stmt->bindParam(':cha2',$id2);
              $stmt->bindParam(':cha3',$id4);
             $stmt->bindParam(':cha4',$id3);
              $stmt->bindParam(':cha5',$id7);
            
     
             $stmt->execute();
       $ide=$db->lastInsertId();
      
    $q1=$db->prepare("UPDATE fichiers SET role=?  WHERE id='$ide'");

             $q1->execute(array($nm));
      $name=$id1.$extractnamefile;
	 // if (@move_uploaded_file($_FILES['ffile']['tmp_name'], $targetpath)) { // Si ça fonctionne
           
           if( $file->move($dir,$nm))
		    $er = 'OK';
			else
			$er="ko";
         if($d)
         {
        foreach( $d as $valeur)
{
            
             $stmt = $db->prepare("INSERT INTO gfichiers  (numf,numaf) VALUES (?,?)");
             $stmt->bindParam(1,$ide);
             $stmt->bindParam(2,$valeur);
             $stmt->execute();
   
}
         }
     else
     {
         $valeur=1;
           $stmt = $db->prepare("INSERT INTO gfichiers  (numf,numaf) VALUES (?,?)");
             $stmt->bindParam(1,$ide);
             $stmt->bindParam(2,$valeur);
             $stmt->execute();
     }
   
         
     
           $sth = $db->prepare("SELECT * FROM  fichiers");
     $sth->execute();
    $q= $sth->fetchAll();
$t = $db->prepare("SELECT * FROM addgf");
                  $t->execute();
                  $li=$t->fetchAll();
         $mes="Le fichier"." ".$id1." "."a bien été ajouté dans la base de données";
          
           return $app['twig']->render('web/menu/home.php',array( 'file'=>$id1));
}
);

$app->match('/lien', function(Application $app,Request $req)
            {
                
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

              
                   $s8=$db->prepare("SELECT addgf.name AS a1 , gausers.name AS a2 FROM gfichieruser,gausers,addgf  WHERE idg=id AND idf=idag");
        $s8->execute();
        $c8=$s8->fetchAll();
              
                  
                
                 return $app['twig']->render('web/gestion.php',array("inp"=>0 ,"lec"=>$c8));
});

$app->match('/state', function(Application $app,Request $req)
            {
                $n=1;
         $db = new PDO('mysql:host=localhost;dbname=pcloud',"root","root24");
$o=$db->prepare("SELECT * FROM users WHERE etat='$n'");
                
                  $o->execute();
                 
                 $c=$o->fetchAll();
              
                $n=0;
                $m=1;
                $t1=$db->prepare("SELECT * FROM users WHERE etat='$n'");
                  $t1->execute();
                 $c9=$t1->fetchAll();
                 $t2=$db->prepare("SELECT * FROM users WHERE connecte='$m'");
                  $t2->execute();
                 $c10=$t2->fetchAll();
                  $t5=$db->prepare("SELECT * FROM  addgf");
                  $t5->execute();
                 $c5=$t5->fetchAll();
                 $t6=$db->prepare("SELECT * FROM  gausers ");
                  $t6->execute();
                 $c6=$t6->fetchAll();
                $t7=$db->prepare("SELECT * FROM  fichiers ");
                  $t7->execute();
                 $c7=$t7->fetchAll();
                $va=-1;
                     if(count($c10)){$va=count($c10);}
                         else
                         $va=0;
                $tab=array("nbi"=>count($c),"nbd"=>count($c9),"nbc"=>$va,"ngf"=>count($c5),"ngu"=>count($c6),"ndf"=>count($c7));
                
                 return $app->json($tab);
            }
           );
                
$app->match('/definegroupe',function(Application $app,Request $req)
{
 
  $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
  $n=$req->request->get('userg');
   $t1=$db->prepare("SELECT name,idag FROM addgf WHERE idag NOT IN (SELECT idf FROM   gfichieruser   WHERE    idg='$n')");
                  $t1->execute();
              
                  $li1=$t1->fetchAll();
				  if($li1)
				    return $app->json($li1);
					else
					{
					$t1=$db->prepare("SELECT * FROM addgf");
                  $t1->execute();
                  $li1=$t1->fetchAll();
				  return $app->json($li1);
					}
}
);
$app->match('/updatelien',function(Application $app,Request $req)
{
 
  $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
  $n=$req->request->get('userg');
   $t1=$db->prepare("SELECT name,idag FROM addgf WHERE idag IN (SELECT idf FROM   gfichieruser   WHERE    idg='$n')");
                  $t1->execute();
              
                  $li1=$t1->fetchAll();
				  if($li1)
				    return $app->json($li1);
					else
					{
					$t1=$db->prepare("SELECT * FROM addgf");
                  $t1->execute();
                  $li1=$t1->fetchAll();
				  return $app->json($li1);
					}
}
);
$app->match('/vg', function(Application $app,Request $req)
            {
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
$t = $db->prepare("SELECT * FROM addgf");
                  $t->execute();
                  $li=$t->fetchAll();
				  $fic=$req->request->get("fic");
                if($fic)
				{
			  $t1=$db->prepare("SELECT nom,date,auteur,type,description FROM fichiers,gfichiers  WHERE numaf='$fic' and numf=id ");
			   $t1->execute();
			   $li1=$t1->fetchAll();
			   return $app->json(array('vus'=>$li1));
			  }
                
                 
                   return $app->json(array('vus'=>$li));
                
});
$app->match('/view', function(Application $app,Request $req)
            {
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
$t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
              $n=1;
			  $t1=$db->prepare("SELECT name,idag FROM addgf WHERE idag NOT IN (SELECT idf FROM   gfichieruser   WHERE    idg='$n')");
                
                  $t1->execute();
                  $li1=$t1->fetchAll();
				
                  
              
                  
                   return $app->json(array('vus'=>$li,'vuf'=>$li1));
                
});
$app->match('/userliste', function(Application $app,Request $req)
            {
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

            
			  $t1=$db->prepare("SELECT * FROM users");
                
                  $t1->execute();
                  $li1=$t1->fetchAll();
				
                  
              
                  
                   return $app->json(array('vuf'=>$li1));
                
});
$app->match('/viewupdate', function(Application $app,Request $req)
            {
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
$t = $db->prepare("SELECT * FROM gausers WHERE id IN(SELECT idg FROM gfichieruser)");
                  $t->execute();
                  $li=$t->fetchAll();
              $n=1;
			 
                $t1=$db->prepare("SELECT name,idag FROM addgf WHERE idag IN (SELECT idf FROM   gfichieruser   WHERE    idg='$n')");
				$t1->execute();
                  $li1=$t1->fetchAll();
				
                  
              
                  
                   return $app->json(array('vus'=>$li,'vuf'=>$li1));
                
});
$app->match('/supView', function(Application $app,Request $req)
            {
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
       $t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
              
                $t1=$db->prepare("SELECT * FROM addgf");
                  $t1->execute();
                  $li1=$t1->fetchAll();
                 
                 return $app['twig']->render('web/gestion.php',array( 'inp'=>'0','svus'=>$li,'svuf'=>$li1,'sview'=>'1'));
});
$app->match('/enginefile', function(Application $app,Request $req) {

      $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
       $rep=$req->request->get('accept');
    $n=intval($req->request->get('n'));
    if($rep)
    {
        if($rep==3)
        {
           $db->exec("DELETE FROM  fichiers WHERE id='$n'");
      return $app->json(array("mot"=>"Le fichier a été supprimé"));
   
    }
}

    
 

        $id1=$req->request->get('nfile');
        $id2=$req->request->get('tfile');
        $id3=$req->request->get('dafile');
        $id8=$req->request->get('keyfile');
        $id4=$req->request->get('aufile');
         $id7=$req->request->get('dfile');
          $id9=$req->request->get('prenom');
     $v=0;
    
     if($id1 || $id1 || $id2 || $id3 || $id8 || $id4 || $id7|| $id9 )
     {
         $v=1;
     }
    else
    return $app->json(array("mot"=>"Compléter au moins une option du fichier"));
                        if(empty($id1))
                        {}
                      else
                      {
                        
             $q=$db->prepare("UPDATE fichiers SET nom=?  WHERE id='$n'");

             $q->execute(array($id1));
}
         
         if(empty($id2))
                        {}
                      else
                      {
                           

             $q=$db->prepare("UPDATE fichiers SET type=?  WHERE id='$n'");
             $q->execute(array($id2));
}
         
         if(empty($id3))
                        {}
                      else
                      {
                            $q=$db->prepare("UPDATE fichiers SET date=?  WHERE id='$n'");
             $q->execute(array($id3));
}
         
        
         
         if(empty($id4))
                        {}
                      else
                      {
                            $q=$db->prepare("UPDATE fichiers SET auteur=?  WHERE id='$n'");
             $q->execute(array($id4));
}
           
         
         if(empty($id7))
                        {}
                      else
                      {
                             $q=$db->prepare("UPDATE fichiers SET description=?  WHERE id='$n'");
             $q->execute(array($id7));
}
         
         
    
   
        
           if(empty($id9)){}
            else
           {
                
                 $db->exec("DELETE FROM  gfichiers WHERE numf='$n'");
                $d=$req->request->get('prenom'); 
                
                  foreach( $id9 as $valeur)
                     {
            
             $stmt = $db->prepare("INSERT INTO gfichiers  (numf,numaf) VALUES (?,?)");
             $stmt->bindParam(1,$n);
             $stmt->bindParam(2,$valeur);
             $stmt->execute();
   
                       }
                 

                
           }
   
       
            $sth = $db->prepare("SELECT * FROM fichiers ");
           $sth->execute();
          $c = $sth->fetchAll();

              
              if($c)
              {
                 // return $app['twig']->render('web/gestion.php',array( 'files'=>$c,'mot'=>'0','inp'=>'0'));

                  
           return $app->json(array("mot"=>"modicafication(s) validée"));
         }
         else
         {
             
         return $app->json(array("mot"=>"modicafication(s) validée"));
        }
}
);

 $app->match('/supfile/{n}', function(Application $app,Request $req,$n)
  {

$db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));
    
 
  });
$app->match('/troln', function(Application $app,Request $req) {
      
     if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
        $sth = $db->prepare("SELECT * FROM  users WHERE etat='0'");
             $sth->execute();
             $q=$sth->fetchAll();
   
                 if($q)
                   return $app['twig']->render('web/gestion.php',array('listename'=>$q,'inp'=>'0'));
      else
      {
           
           return $app['twig']->render('web/gestion.php',array('inp'=>"1","u"=>"Il n'ya aucune demandes enregistréés"));
      }
                 
              
      
      
       
             }
             );
$app->match('/rol', function(Application $app,Request $req) {
      
     if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
      
                 
        $sth = $db->prepare("SELECT * FROM  users WHERE etat='1'");
             $sth->execute();
             $q=$sth->fetchAll();
   
                 if($q)
                   return $app['twig']->render('web/gestion.php',array('listrol'=>$q,'inp'=>'0'));
      else
      {
           
           return $app['twig']->render('web/gestion.php',array('inp'=>"1","u"=>"Il n'ya aucune demande enregistré"));
      }
                 
              
      
      
       
             }
             );
  $app->match('/trol', function(Application $app,Request $req) {
      
        if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
       $fil=$req->query->get('fil');
      if($fil)
      {
           $sth5 = $db->prepare("SELECT idag,name FROM addgf,gfichiers WHERE numf='$fil' and idag=numaf");
        $sth5->execute();
        $c1=$sth5->fetchAll();
       
             $sth = $db->prepare("SELECT * FROM  fichiers WHERE id='$fil'");
             $sth->execute();
             $c=$sth->fetchAll();
            return $app->json(array("c1"=>$c,"c2"=>$c1));
      }
        $sth = $db->prepare("SELECT * FROM  fichiers");
             $sth->execute();
             $q=$sth->fetchAll();
       $sth5 = $db->prepare("SELECT * FROM addgf");
        $sth5->execute();
        $c1=$sth5->fetchAll();
       
                 if($q)
                  return $app->json(array("c1"=>$q,"c2"=>$c1));
      else
           return $app->json(array(""));
     
              
      
      
       
             }
             );

 $app->match('/op',  function(Application $app,Request $req) {
     
$f=file_get_contents("web/gestion.php");
     return $f;
 }
            );
			//////////////////////////////////////////////////
			  $app->match('/controledemande', function(Application $app,Request $req) {
			  
			  if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
                {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

                 }
             else
              return $app->redirect('/projetbdd');
			  $n=0;
			 $user = $db->prepare("SELECT * FROM users WHERE  etat='$n' ");
			  $user->execute();
              $userval=$user->fetchAll();
			  if($userval){}
			  else
			  $userval=1;
			  $usergroupe = $db->prepare("SELECT * FROM gausers  ");
			  $usergroupe ->execute();
              $usergroupeval=$usergroupe ->fetchAll();
                  $tableau=array("ug"=>$usergroupeval,"us"=>$userval);
				   return $app->json( $tableau);
				   }
				   );
			
			
			
			/////////////////////////////////////////////////////////
    $app->match('/controle', function(Application $app,Request $req) {
       
        
        
         $db=0;
          if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
            

         $id=$req->query->get('etat');
          $n=$req->query->get('es');
         $fi=$req->query->get('fi');
         $fin=$req->query->get('fin');
         $ec=$req->query->get('ec');
         $rol=$req->query->get('rol');
        $val=$req->query->get('val');
         $error=$req->query->get('error');
       
        
       if( $app['session']->get('pass')  &&  $app['session']->get('root')=="root")
       {
      
          
         $val=intval($val);
           if($id)
        $val=intval($id);
                    
           
           
           if($val==6)
           {
                return $app['twig']->render('web/gestion.php',array('inp'=>'1'));
           }
 
         if($val==1)
         {
             
               if($error)
               {
                
               $u="Le groupe d'utilisateur choisis n'a aucun droit de lecture sur  un groupe de fichiers ,veuillez en crée au moins un en utilisant l'onglet DROIT DE LECTURE ";
                    return $app['twig']->render('web/gestion.php',array('u'=>$u,'inp'=>'1'));
               }
              if($fin)
                  {
                 
                   $sth = $db->prepare("SELECT * FROM users WHERE  id='$fin'");
                   $sth->execute();
                   $q=$sth->fetchAll();
                  $t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
             return $app['twig']->render('web/gestion.php',array('m'=>$q,'inp'=>'0','li'=>$li));
                  }
                  else
                  {
                   
                      $a="Un utilisateur  vient d'être enrégistré";
                       if(isset($n))
                       {
             return $app['twig']->render('web/gestion.php',array('u'=>$a,'inp'=>'1'));  }
                      else
                      {
                          $a="Une Inscription à été rejetter";
                           if($ec)
                               return $app['twig']->render('web/gestion.php',array('u'=>$a,'inp'=>'1')); 
                          else
                  return  $app->redirect("/troln");
                      }
                  }
             
            
         }
          if($val==2)
         {
           $t = $db->prepare("SELECT * FROM addgf");
                  $t->execute();
                  $li=$t->fetchAll();
           return $app['twig']->render('web/gestion.php',array('ajout'=>'1','inp'=>'0','li'=>$li));
         
         }
          if($val==3)
         {
                  if($fi)
                  {
                   $sth = $db->prepare("SELECT * FROM  fichiers WHERE id='$fi'");
             $sth->execute();
             $q=$sth->fetchAll();
                       $sth = $db->prepare("SELECT idgf FROM gfichiers WHERE  idfichier='$fi'");
                   $sth->execute();
                   $c=$sth->fetchAll();
                        $i=0;
                        $d=array();
                     foreach($c as $g)
                     {
                         $d[$i]=$g['idgf'];
                         $i++;
                     }
                        $a=-1;
                        $b=-1;
                        $c=-1;
                          if(isset($d[0]))
                        $a=$d[0];
                         if(isset($d[1]))
                              $b=$d[1];
                         if(isset($d[2]))
                              $c=$d[2];
                           $t = $db->prepare("SELECT * FROM addgf");
                  $t->execute();
                  $li=$t->fetchAll();
             return $app['twig']->render('web/gestion.php',array('files'=>$q,'inp'=>'0','a'=>$a,'b'=>$b,'c'=>$c,'li'=>$li));
                  }
                 else
                 {
                     if( $req->query->get('fauls') ||  $req->query->get('sup') ||   $req->query->get('modif'))
                 {
                          $a=$req->query->get('fauls'); 
              $b=$req->query->get('sup'); 
            $v=$req->query->get('modif'); 
              if($a)
                  $f="Aucun fichier n'a été modifié";
              else
              if($v)
                  $f="Un  fichié  vient d'être  modifier";
                  else
              {
                 
                  
                        $f=0;
              }
               if($b)
                  $f="un fichier a été Supprimé";
                
                 
                   return $app['twig']->render('web/gestion.php',array('u'=>$f,'inp'=>'1'));
              
               
                  }
              else
                 return  $app->redirect("/trol");
            
          
         
         }
          }
            if($val==4)
         {
                $sth = $db->prepare("SELECT * FROM gausers WHERE ");
                   $sth->execute();
                   $q=$sth->fetchAll();
                if( $req->query->get('meq'))
                {
         $messagem="Le rôle nouvellement affecté,a été pris en compte";
 return $app['twig']->render('web/gestion.php',array( 'inp'=>'1','u'=>$messagem));
                }
                else
                {
                     if($error)
               {
                
               $u="Impossible de mettre à jours le rôle,Le groupe choisi   n'a aucune vue sur un groupe de fichiers  ,veuillez en crée au moins un en utilisant l'onglet DROIT DE LECTURE";
                    return $app['twig']->render('web/gestion.php',array('u'=>$u,'inp'=>'1'));
               }
                  
                          if($rol)
                          {
                             $sth = $db->prepare("SELECT * FROM users WHERE  id='$rol'");
                   $sth->execute();
                   $q=$sth->fetchAll(); 
                               $t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
                    return $app['twig']->render('web/gestion.php',array('mof'=>$q,'inp'=>'0','li'=>$li));
                              
                          }
                    else
                    {
                   $sth = $db->prepare("SELECT * FROM users WHERE  etat='1'");
                   $sth->execute();
                   $q=$sth->fetchAll();
                         
                       $u="il n'y a aucun utilisateur inscrit dans pcloud";
                    
                          if($q)
                                  
             return $app['twig']->render('web/gestion.php',array('listrol'=>$q,'inp'=>'0'));
                    else
                         return $app['twig']->render('web/gestion.php',array('inp'=>'1',"motif"=>$u));
                          }
                        
                   
            
                
                
                }
                
          
          
         
         }
         if($val==5)
         {
          
              $app['session']->set('root',null);
              $app['session']->set('pass',null);
             return $app->redirect('/');
         
         }
return $app['twig']->render('web/gestion.php',array( 'inp'=>'1'));
    }
        else
        {
             
              return $app->redirect('/testeb');
            
        }
   } 
  );
 $app->match('/adduserg', function(Application $app,Request $req) 
             {
                 
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 
                   if($req->request->get('ng'))
                 {
                       
                 $nom=$req->request->get('ng');
                  $stmt = $db->prepare("INSERT INTO gausers (name) VALUES (:cha1)");
             $stmt->bindParam(':cha1',$nom);
            $u="le groupe utilisateur,".$nom.", a été crée avec succès";
              $stmt->execute();
			     
                        return "succès";
             }
                 
                    
             // return $app['twig']->render('web/gestion.php',array( 'ag'=>'1',"inp"=>0));
                   
                 
             }
            );

//Supprimer une relation groupe user-> groupe fichiers 
$app->match('/SRelation', function(Application $app,Request $req) 
             {
                  $file=$req->request->get('fileg');
                   $user=$req->request->get('userg');
                  if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 $t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
              
                $t1=$db->prepare("SELECT * FROM addgf");
                  $t1->execute();
                  $li1=$t1->fetchAll();
               //  return $user.":".$file;
                 
                
                
                 $name1=0;
                 $name2=0;
                $reponse=$db->exec("DELETE  FROM  gfichieruser WHERE idg='$user' and idf='$file' ");
                
                    
                  $s = $db->prepare("SELECT name FROM gausers WHERE id='$user'");
        $s->execute();
        $c=$s->fetchAll();
                     
                  $s1=$db->prepare("SELECT name FROM addgf WHERE idag='$file'");
        $s1->execute();
        $c1=$s1->fetchAll();
                    
        foreach($c as $ta)
		     {
              
		     $name1=$ta['name'] ;
              
        
              }
                  foreach($c1 as $ta)
		     {
              
                        
		     $name2=$ta['name'] ;
                      
              
        
              }
                  $sth3= $db->prepare("SELECT  nom FROM users WHERE groupe='$user' ");
             $sth3->execute();
            $b3=$sth3->fetchAll();  
                
          foreach($b3 as $ta)
           {
         $va=$ta['nom'];
              
         $rep1=$db->exec("REVOKE SELECT ON pcloud.".$name2." FROM '$va'@'localhost'");
              
     } 
                      if($reponse)
                      {
                     
         $verif = $db->prepare("SELECT idf FROM gfichieruser WHERE idg='$user'");
        $verif->execute();
        $c=$verif->fetchAll();
        $verif1= $db->prepare("SELECT nom FROM users WHERE groupe='$user'");
        $verif1->execute();
        $c1=$verif1->fetchAll();
                             if($c){}
                            else
                            {
                                if($c1)
                                {
                                    $h=1;
                                  $stmt = $db->prepare("INSERT INTO gfichieruser (idg,idf) VALUES (:cha1,:cha2)");
             $stmt->bindParam(':cha1',$user);
             $stmt->bindParam(':cha2',$h);
             $stmt->execute();
                                    
             $sth3= $db->prepare("SELECT  nom FROM users WHERE groupe='$user' ");
             $sth3->execute();
            $b3=$sth3->fetchAll();
            $pc="pcloud";
                                   
          foreach($b3 as $ta)
           {
         $va=$ta['nom'];
         $rep=$db->exec("GRANT SELECT ON pcloud.".$pc." TO '$va'@'localhost'");           
     } 
            
                                   
                            }
                                
                            }
                  $u="Le groupe d'utilisateur"." ".$name1.",ne beneficie plus le droit de lecture sur le groupe de  fichiers ,".$name2;
				  return $u;
                      }
                
             }
           );
$app->match('/Relation', function(Application $app,Request $req) 
             {
                 
            
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 
                  $file=$req->request->get('fileg');
                   $user=$req->request->get('userg');
                  $s1=$db->prepare("SELECT name FROM addgf WHERE idag='$file'");
        $s1->execute();
        $c1=$s1->fetchAll();
                  foreach($c1 as $ta)
		     {
              
                        
		     $name2=$ta['name'] ;
                      
              
        
              }
                 $name2=strtolower($name2);
                
                  $query55 = $db->prepare("SELECT TABLE_NAME FROM information_schema.VIEWS WHERE TABLE_NAME='$name2'");
          $query55->execute();
                 $res=$query55->fetchAll();
               
                        
                 if($res)
                 {
	  $groupevall=$query55->fetchAll();
                  $essaie = $db->prepare("SELECT * FROM gfichieruser");
                  $essaie->execute();
                  $result=$essaie->fetchAll();
                 $bool=0;
                  $t = $db->prepare("SELECT * FROM gausers");
                  $t->execute();
                  $li=$t->fetchAll();
              
                $t1=$db->prepare("SELECT * FROM addgf");
                  $t1->execute();
                  $li1=$t1->fetchAll();
                 foreach($result as $ta)
		     {
                   if($ta['idg']==$user && $ta['idf']==$file)
                   {
                   
                        $bool=1;
		               break;
                       }
              
        
              }
                  $name1="";
        $name2="";
                 if($bool==0)
                 {
                  
                 $stmt = $db->prepare("INSERT INTO gfichieruser (idg,idf) VALUES (:cha1,:cha2)");
             $stmt->bindParam(':cha1',$user);
             $stmt->bindParam(':cha2',$file);
             $stmt->execute();
                
                 $s = $db->prepare("SELECT name FROM gausers WHERE id='$user'");
        $s->execute();
        $c=$s->fetchAll();
                     
                  $s1=$db->prepare("SELECT name FROM addgf WHERE idag='$file'");
        $s1->execute();
        $c1=$s1->fetchAll();
                    
                     
                  
        foreach($c as $ta)
		     {
              
		     $name1=$ta['name'] ;
              
        
              }
                     
                  foreach($c1 as $ta)
		     {
              
                        
		     $name2=$ta['name'] ;
                      
              
        
              }
                    
                  $u=$name1." "."Beneficie maintenant le  droit de lecture du groupe de fichier"." ".$name2;
                   
                       
                      $sth2 = $db->prepare("SELECT  *  FROM users WHERE groupe='$user'");
                      $sth2->execute();
        $c1=$sth2->fetchAll();
                    
                      foreach($c1 as $c)
           {
                           $f=$c['nom'];
                           
                            $db->exec("DROP USER '$f'@'localhost'");
                          
                      }
                    $sth = $db->prepare("SELECT  name  FROM gfichieruser,addgf  WHERE idg='$user' and idf=idag");
        $sth->execute();
        $c3=$sth->fetchAll();
                      
                     $rep=array();
                 foreach($c1 as $c)
           {
                           $f1=$c['nom'];
                       $p=$c['password'];
                                 
                      $db->query('CREATE USER '.$f1.'@localhost IDENTIFIED BY "'.$p.'"');
                       
                          foreach($c3 as $ta)
           {
               $f=$ta['name'];
             
              $rep[]=$db->exec("GRANT SELECT  ON ".$f." TO '$f1'@'localhost' ");  
                          
                      }
                          
                      }
                  
                      
                
             
 
                    
        
                    return $u;
                                     
               // return $app['twig']->render('web/gestion.php',array('u'=>$u,"inp"=>1)); 
                 
                 
             }
                 
                     
            }
                
            }
           );



//crée une vue
$app->match('/cview', function(Application $app,Request $req) 
             {
                 
                  
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                  $query55 = $db->prepare("SELECT TABLE_NAME FROM information_schema.VIEWS ");
          $query55->execute();
	  $groupevall=$query55->fetchAll();
                  $sth = $db->prepare("SELECT * FROM addgf");
        $sth->execute();
        $c=$sth->fetchAll();
         
            
             if(count($groupevall)==count($c))
             {
                 $m="Toutes les vues  ont déjà été crée sur chaque  groupe de Fichiers";
                  return $app['twig']->render('web/gestion.php',array( 'u'=>$m,"inp"=>1));   
             }
          else
          {
            
               
                   $sth = $db->prepare("SELECT * FROM addgf WHERE  NOT EXISTS (SELECT TABLE_NAME FROM information_schema.VIEWS WHERE name=TABLE_NAME)");
        $sth->execute();
        $c=$sth->fetchAll();
                
                      if($c){}
                 else
                     $c=-1;
              return $app['twig']->render('web/gestion.php',array( 'vieW'=>1,'vus'=>$c,"inp"=>0));  
                 
             }
                  
                 
             }
           );
//crée une vue

$app->match('/defaultg', function(Application $app,Request $req) 
             {
                 
                 $file=$req->request->get('userg');
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                   if($req->request->get('ng'))
                 {
                        $name=$req->request->get('ng');
                       $number=1;
                        $sth = $db->prepare("SELECT * FROM addgf WHERE idag='$number' ");
                $sth->execute();
                $c=$sth->fetchAll();
                 $val="";
                       if($c)
                       {
               foreach($c as $ta)
		     {
                   $val=strtolower($ta['name']);
                   
              }
                           $b=1;
                            $db->query("DROP VIEW $val");
                           
                            $sql =" UPDATE addgf SET name=? WHERE idag=?";
             $q=$db->prepare($sql);
             $q->execute(array($name,$b));
                   }
                       
                  
                
                else
                {
                  $stmt = $db->prepare("INSERT INTO addgf (idag,name) VALUES (1,:cha1)");
             $stmt->bindParam(':cha1',$name);
           
              $stmt->execute();
                   }
                       $id=1;
                       // 
             
            $nom=$req->request->get('ng');
                   
             $rep=$db->query("CREATE VIEW ".$nom." AS SELECT nom, type,auteur,date,description,role FROM fichiers,gfichiers WHERE id=numf and numaf=".$id."");
               
               
                  $u="le groupe de Fichier par defaut,".$nom.", a été crée avec succès";
             
                  return $app['twig']->render('web/gestion.php',array( 'u'=>$u,"inp"=>1)); 
                 
             
                   }
                  else
                 {
                      if($req->query->get('val'))
                      {
                           $u="Impossible de crée un Groupe de Fichier Sans nom";
                           return $app['twig']->render('web/gestion.php',array( 'u'=>$u,"inp"=>1)); 
                      }
                    
                      return $app['twig']->render('web/gestion.php',array( 'def'=>1,"inp"=>0));   
                    
                 }
                
                 
                
             }
           );
$app->match('/addgf', function(Application $app,Request $req) 
             {
                 
                 $file=$req->request->get('userg');
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                   if($req->request->get('ng'))
                 {
                 $name=$req->request->get('ng');
                  $stmt = $db->prepare("INSERT INTO addgf (name) VALUES (:cha1)");
             $stmt->bindParam(':cha1',$name);
           
              $stmt->execute();
                       $id=$db->lastInsertId();
                       // 
             
            $nom=$req->request->get('ng');
                   
             $rep=$db->query("CREATE VIEW ".$nom." AS SELECT nom, type,auteur,date,description,role FROM fichiers,gfichiers WHERE id=numf and numaf=".$id."");
               
               
                  $u="le groupe de Fichier,".$nom.", a été crée avec succès";
                   return "suuces";
                 
             
                   }
                
                 
                 
                 ///////////
             }
           );
        
        
$app->match('/supvw', function(Application $app,Request $req) 
             {
                 
                 $file=$req->request->get('userg');
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
            
                 $sth = $db->prepare("SELECT * FROM addgf WHERE idag='$file' ");
                $sth->execute();
                $c=$sth->fetchAll();
                 $val="";
               foreach($c as $ta)
		     {
                   $val=strtolower($ta['name']);
                   
              }
                  
                
                
                
                 $m="La vue"." ".$val." "."a été supprimé avec succès";
                $sth3= $db->prepare("SELECT  groupe,nom FROM users,gfichieruser,addgf WHERE name='$val' AND idag=idf AND idg=groupe");
             $sth3->execute();
                  $b3=$sth3->fetchAll(); 
                  $sth4= $db->prepare("SELECT  groupe,nom FROM users,gfichieruser,addgf WHERE name='$val' AND idag=idf AND idg=groupe");
             $sth4->execute();
            
                  $b7=$sth4->fetchAll();  
                 $grou=0;
                 $response=$db->exec("DELETE  FROM  gfichieruser WHERE idf='$file' ");
          foreach($b3 as $ta)
           {
         $va=$ta['nom'];
              $grou=$ta['groupe'];
             
              
         $rep1=$db->exec("REVOKE SELECT ON pcloud.".$val." FROM '$va'@'localhost'");
         
              
        
              
     } 
               
                // return   "hello";
                
                  $db->query("DROP VIEW $val");
               
                 
                  foreach($b3 as $ta)
           {
         $va=$ta['nom'];
              $grou=$ta['groupe'];
                  $verif = $db->prepare("SELECT idf FROM gfichieruser WHERE idg='$grou'");
        $verif->execute();
        $c=$verif->fetchAll();
                     
                          //return "hello";
                             if($c){ }
                            else
                            {
                              // print_r($grou);
                                    $h=1;
                                  $stmt = $db->prepare("INSERT INTO gfichieruser (idg,idf) VALUES (:cha1,:cha2)");
             $stmt->bindParam(':cha1',$grou);
             $stmt->bindParam(':cha2',$h);
             $stmt->execute();
                                    
            $pc="pcloud";
         
        
        $rep=$db->exec("GRANT SELECT ON pcloud.".$pc." TO '$va'@'localhost'");           
     
            
                                    
                            }
                                
                            }
                 
                 
                 
                 
                 
                 
                 
                 
             
                   return $app['twig']->render('web/gestion.php',array( 'u'=>$m,"inp"=>1));   
             }
           );

//suprimer une vue
$app->match('/supcview', function(Application $app,Request $req) 
             {
                   
                  $file=$req->request->get('userg');
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 $sth = $db->prepare("SELECT * FROM addgf WHERE idag='$file' ");
                $sth->execute();
                $c=$sth->fetchAll();
                 $val="";
               foreach($c as $ta)
		     {
                   $val=$ta['name'];
                   
              }
                 $p="pcloud";
                   $sth = $db->prepare("SELECT * FROM addgf WHERE  EXISTS(SELECT TABLE_NAME FROM information_schema.VIEWS WHERE name=TABLE_NAME and name!='$p')");
        $sth->execute();
        $c=$sth->fetchAll();
                
                      if($c){ return $app['twig']->render('web/gestion.php',array( 'svieW'=>1,"vus"=>$c,"inp"=>0)); }
                 else
                 {
                     $p="Il n'existe aucune vue sur un Groupe de Fichiers";
                    return $app['twig']->render('web/gestion.php',array( 'u'=>$p,"inp"=>1)); 
                 }
             
             }
           );
 /*$app->match('/addgf', function(Application $app,Request $req) 
             {
                 
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 
                   if($req->request->get('ng'))
                 {
                 $nom=$req->request->get('ng');
                  $stmt = $db->prepare("INSERT INTO addgf (name) VALUES (:cha1)");
             $stmt->bindParam(':cha1',$nom);
            $u="le groupe de Fichier,".$nom.", a été crée avec succès";
              $stmt->execute();
                        return $app['twig']->render('web/gestion.php',array( 'u'=>$u,"inp"=>1)); 
             }
              return $app['twig']->render('web/gestion.php',array( 'af'=>'1',"inp"=>0));   
                 
             }
            );*/
$app->match('/deletegu', function(Application $app,Request $req) 
             {
                 
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 $erreur=0;
				 $n=1;
                   $sth = $db->prepare("SELECT * FROM gausers WHERE id!='$n'");
        $sth->execute();
        $c=$sth->fetchAll();
                   $mt=array();
                $tol="";
                      if($c){
                      
                     
                        
                       foreach($c as $ta)
		     {
                   $val10=$ta['id'];
                                       $sth = $db->prepare("SELECT * FROM users WHERE groupe='$val10'");
                                       $sth->execute();
                                       $tol=$sth->fetchAll();
                                      $mt[$val10]=count($tol);
                   
              }
                      
                      
                      
                      
                      }
                 else
                     $erreur=-1;
					 $tab=array("c"=>$c,"erreur"=>$erreur,"mt"=>$mt);
					 return $app->json($tab);
             // return $app['twig']->render('web/gestion.php',array( 'listeuser'=>$c,"inp"=>0));   
                 
             }
            );
$app->match('/deleteuser', function(Application $app,Request $req) 
             {
                 
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
		
              return $app->redirect('/');
                 $n=$req->request->get('n');
                $new=1;
                 $stk = $db->prepare("SELECT * FROM gausers WHERE id='$n' ");
                $stk->execute();
                $c=$stk->fetchAll();
                 $val="";
               foreach($c as $ta)
		     {
                   $val=strtolower($ta['name']);
                   
              }
                $sql =" UPDATE users SET groupe=? WHERE groupe=?";
             $q=$db->prepare($sql);
             $q->execute(array($new,$n));
                
                          
                               
             $reponse=$db->exec("DELETE FROM  gausers WHERE id='$n'");
             
                
                        
                return $val;
                 
             
                 
             }
            );
$app->match('/Musers', function(Application $app,Request $req) 
             {            if($req->query->get('re'))
                  $u="Le groupe d'utilisateur,".$req->query->get('u').",a été supprimé";
              else
                   $u="Le groupe d'utilisateur,".$req->query->get('u').",est le groupe par defaut ,il ne peut  être supprimé!";
                  
                  return $app['twig']->render('web/gestion.php',array( 'u'=>$u,"inp"=>1)); 
             }
           );
$app->match('/deletegf', function(Application $app,Request $req) 
             {
                 
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 $erreur=0;
				 $n=1;
                   $sth = $db->prepare("SELECT * FROM addgf WHERE idag!='$n'");
        $sth->execute();
        $c=$sth->fetchAll();
                 $mt=array();
                $tol="";
                      if($c){
                      
                      
                        
                       foreach($c as $ta)
		     {
                   $val10=$ta['idag'];
                                       $sth = $db->prepare("SELECT * FROM gfichiers WHERE numaf='$val10'");
                                       $sth->execute();
                                       $tol=$sth->fetchAll();
                                      $mt[$val10]=count($tol);
                   
              }
                      
                      
                      
                    
                      }
                 else
                     $erreur=-1;
					 return $app->json(array( "val"=>$c,"erreur"=>$erreur,"mt"=>$mt) ); 
                 
             }
            );
$app->match('/deletef',function(Application $app,Request $req)
            {
                
                   if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
                 $n=$req->request->get("n");
                $new=1;
                 $sth = $db->prepare("SELECT numf FROM gfichiers WHERE numaf='$n'");
                $sth->execute();
                $c=$sth->fetchAll();
                $val=array();
                $verif=0;
				 $yors = $db->prepare("SELECT * FROM addgf WHERE idag='$n' ");
                $yors->execute();
                $yorsc=$yors->fetchAll();
                 $val10="";
               foreach($yorsc as $ta)
		     {
                   $val10=strtolower($ta['name']);
                   
              }
               foreach($c as $ta)
		     {
                   $val[]=$ta['numf'];
                   
             
              }
                  
                $reponse=1;
                          if($n!=1) 
                          {
             $db->exec("DELETE   FROM  addgf WHERE idag='$n'");
            
                              
                          }
                else
                {
                    if($n==1)
                    $reponse=0;
                }
                
                $pren=1;
              
                 
               
                     $verif=0;
                      if($reponse)
                      {
               for($i=0;$i<count($val);$i++)
		     {
                   
                   $va= $val[$i];
                   
                
                
                $stmt = $db->prepare("INSERT INTO gfichiers (numf,numaf) VALUES (:cha1, :cha2)");
             $stmt->bindParam(':cha1',$va);
             $stmt->bindParam(':cha2',$pren);
                    $stmt->execute();
                  
               }
                          
                      }
           
                  
                
                $value=$req->query->get("name");
                
                
                $sth3= $db->prepare("SELECT  groupe,nom FROM users,gfichieruser,addgf WHERE name='$value' AND idag=idf AND idg=groupe");
             $sth3->execute();
                  $b3=$sth3->fetchAll(); 
                  $sth4= $db->prepare("SELECT  groupe,nom FROM users,gfichieruser,addgf WHERE name='$value' AND idag=idf AND idg=groupe");
             $sth4->execute();
            
                  $b7=$sth4->fetchAll();  
                 $grou=0;
                 $response=$db->exec("DELETE  FROM  gfichieruser WHERE idf='$n' ");
          foreach($b3 as $ta)
           {
         $va=$ta['nom'];
              $grou=$ta['groupe'];
             
              
         $rep1=$db->exec("REVOKE SELECT ON pcloud.".$value." FROM '$va'@'localhost'");
         
              
        
              
     } 
               
                // return   "hello";
                
                  $db->query("DROP VIEW $value");
               
                 
                  foreach($b3 as $ta)
           {
         $va=$ta['nom'];
              $grou=$ta['groupe'];
                  $verif = $db->prepare("SELECT idf FROM gfichieruser WHERE idg='$grou'");
        $verif->execute();
        $c=$verif->fetchAll();
                     
                          //return "hello";
                             if($c){ }
                            else
                            {
                              // print_r($grou);
                                    $h=1;
                                  $stmt = $db->prepare("INSERT INTO gfichieruser (idg,idf) VALUES (:cha1,:cha2)");
             $stmt->bindParam(':cha1',$grou);
             $stmt->bindParam(':cha2',$h);
             $stmt->execute();
                                    
            $pc="pcloud";
         
        
        $rep=$db->exec("GRANT SELECT ON pcloud.".$pc." TO '$va'@'localhost'");           
     
            
                                    
                            }
                                
                            }
                 
                
                
                
                
                
                
                
                
                 
                
                
                        
              
                 return $val10;/*/Mfile?u=".$req->query->get("name").""."&rep=".$reponse."");*/
            }
           );
$app->match('/Mfile', function(Application $app,Request $req) 
             {
                       if($req->query->get('rep'))
                  $u="Le groupe de fichier"." ".$req->query->get('u')." "."a été supprimé";
                 else
                      $u="Le groupe de fichier,".$req->query->get('u').",est le groupe par defaut il ne peut être supprimé";
                     
                  return $app['twig']->render('web/gestion.php',array( 'u'=>$u,"inp"=>1)); 
             }
           );
     $app->match('/changefile/{n}', function(Application $app,Request $req,$n) {


        $id1=$req->query->get('groupn');
        $id2=$req->query->get('groupt');
        $id3=$req->query->get('groupeaut');
        $id3=$req->query->get('groupd');
        $id4=$req->query->get('groupdes');
         $val1=intval($id1);
         $val2=intval($id2);
         $val3=intval($id3);
          $val4=intval($id4);
          $val5=intval($n);
          $valeur=1;
         $id=$req->query->get('etat');
         $val=intval($id);
        
 return $app['twig']->render('web/gestion.php',array( ''));
   } 
  );

$app->match('/rolemodif', function(Application $app,Request $req) {

      $f=$req->request->get('groupe');
	  $n=$req->request->get('n');
	  $td=$req->request->get('td');
      $val=intval($n);
        if( $app['session']->get('root') && 
                   $app['session']->get('pass'))
    {
       
         $db = new PDO('mysql:host=localhost;dbname=pcloud',$app['session']->get('root'),$app['session']->get('pass'));

 }
        else
              return $app->redirect('/');
  
      
            $va="";
            $pass="";
          $sth = $db->prepare("SELECT  nom,password  FROM users WHERE id='$val' ");
        $sth->execute();
     foreach($sth as $ta)
           {
         $va=$ta['nom'];
         $pass=$ta['password'];
         
     }
   
              $tes = $db->prepare("SELECT  idf  FROM gfichieruser WHERE idg='$f' ");
              $tes->execute();
              $reps=$tes->fetchAll();
   
              if($reps)
             {
			  $sql =" UPDATE users SET groupe=? WHERE id=?";

             $q=$db->prepare($sql);

             $q->execute(array($f,$val));
           $db->exec("DROP USER '$va'@'localhost'");
              
           $db->query('CREATE USER '.$va.'@localhost IDENTIFIED BY "'.$pass.'"');
        
           
 
       $sth = $db->prepare("SELECT  name  FROM gfichieruser,addgf  WHERE idg='$f' and idf=idag");
        $sth->execute();
        $c=$sth->fetchAll();
        $bool=0;
    
           foreach($c as $ta)
           {
               $f=$ta['name'];
             
              $rep=$db->exec("GRANT SELECT  ON ".$f." TO '$va'@'localhost' ");
                if($rep==0)
                {
                   
                     $bool=1;
                    
                   
                }
             
               
           }
                
    return  $app->json(array("a"=>$td,"b"=>1));
   
            }
          else
         return $app->json(array("a"=>$td,"b"=>0));
    
   } 
  );

$app->run();


?>
