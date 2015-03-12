<?php
require_once 'vendor/autoload.php';
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;



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
    
 
 
  

$app->register(new Silex\Provider\DoctrineServiceProvider(),
  array('db.options' => array(
        'driver'   => 'pdo_mysql',
        'host'     =>"localhost",  // pas touche à ça : spécifique pour C9 !
        'user'     => 'root',  // vous pouvez mettre votre login à la place
        'password' => 'root24',
        'dbname' => 'game'  // mettez ici le nom de la base de données
  )));
  $app->match('/yors', function(Application $app,Request $req) {
      
     
     
          $base = $app['db']->executeQuery('SELECT * FROM users');
        
          $result = $base->fetchAll();
       
          $log1=$req->request->get('play1');
       
          $pass1=sha1($req->request->get('pass1').$log1);
          
        $sth1 = $app['db']->prepare("SELECT * FROM users WHERE log=? AND pass=?");
     $sth1->execute(array($log1,$pass1));
      
          $results = $sth1->fetchAll();
        if( $req->getMethod()=="POST")
      {
          if( $results  )
          {
          
         
          $imag1="";
         
          
          $true1=0;
          
          $clog1="";
         
          $slog1="";
          
           foreach ($results as $row) 
           {
                
                $clog1=$row['couleur1'];
                $imag1=$row['adressim'];
                $slog1=$row['gagnees'];
                
                
           }
             
                 $app['session']->set('user1',$log1);
                  $app['session']->set('score1',$slog1);
                   $app['session']->set('cp1',$clog1);
                    $app['session']->set('connexion',"TRUE");
                   $vrai=TRUE;
                       $app['session']->set('image1', $imag1);
                        
                     $app['db']->executeUpdate('UPDATE users SET connecte=TRUE WHERE log = ?', array($log1));
                     return $app->redirect('/puissance4/userlist');
             
           
      }
      else
       return $app['twig']->render('web/puissance4accueil.html',array("message"=>"Les informations transmisent n'ont pas permis de vous identifié!"));
      }
      else
      {  
          
          if($base)
   return $app['twig']->render('web/puissance4accueil.html',array('message'=>"",'tablebd'=>$result));
   else
        return $app['twig']->render('web/puissance4accueil.html',array('message'=>""));
      
      }
       });
              
   $app->match('/', function(Application $app,Request $req) {
       
       
    return $app['twig']->render('web/puissance4accueil.html',array('message'=>""));
   
   }
  );
  
  $app->get('/play', function(Application $app, Request $req) {
      
      
	 
	  
          $id=$req->query->get('idgame');
		  $part=$req->query->get('part')?$req->query->get('part'):-1;//part est la variable qui retourne le num du dernier joueur qui a joué une fois le match repris
             if($req->query->get('idgame'))
                $app['session']->set('idgame',$id);
                if($id)
                {}
                else
                $id=$app['session']->get('idgame');
                 $sth1 = $app['db']->prepare("SELECT rebegin1,rebegin2 FROM parties WHERE id=?");
     $sth1->execute(array($id));
     
 $q1 = $sth1->fetchAll();
 
 foreach($q1 as $ta1)
		     {
		      $reponse1=$ta1['rebegin1'];
		       $reponse2=$ta1['rebegin2'];
		     
		     }
		     if(ord($reponse1)==48 || ord($reponse1)==49)
		     {
		      $app['db']->executeUpdate("UPDATE parties SET rebegin1=?  WHERE id='$id'",array(null));
		       $app['db']->executeUpdate("UPDATE parties SET rebegin2=?  WHERE id='$id'",array(null));
			      
				   
					  
					     
	      $app['db']->executeUpdate("UPDATE parties SET etat=?  WHERE id='$id'",array("accepte"));
		     }
          $name1="";
          $name2="";
          $c1="";
         $c2="";
		 $val=0;
          $score1="";
           $score2="";
           $photo1="";
           $photo2="";
         
    $sth1 = $app['db']->prepare("SELECT challenger,challenged FROM parties WHERE id='$id'");
     
 $sth1->execute();
 $q1 = $sth1->fetchAll();
  $sth2 = $app['db']->prepare("SELECT log,couleur1,gagnees,adressim FROM users WHERE joue='$id'");
 $sth2->execute();
  $q2 = $sth2->fetchAll();
 
 
          foreach($q1 as $ta1)
		     {
		     $name1=$ta1['challenged'];
		      $name2=$ta1['challenger'];
		      
		        if($req->query->get('idgame'))
		        {
		      $app['session']->set('challenger',$name2);
               $app['session']->set('challenged',$name1);
		        }
		       
		     }
		      foreach($q2 as $ta1)
		     {
		        if($name1==$ta1['log'])
		        {
		          $c1=$ta1['couleur1'];
		          $score1=$ta1['gagnees'];
		           $photo2=$ta1['adressim'];
		        }
		           if($name2==$ta1['log'])
		           {
		           $c2=$ta1['couleur1'];
		           $score2=$ta1['gagnees'];
		            $photo1=$ta1['adressim'];
		     }
		     }
          
	             if( $photo1=="aucun fichier")
	             $photo1=-1;
	             if( $photo2=="aucun fichier")
	             $photo2=-1;
        $s1=$req->query->get('s1')?$req->query->get('s1'):-1;
		$s2=$req->query->get('s2')?$req->query->get('s2'):-1;
		
		     
		   if($s1==-1)
		   {
		       $s1= $score1;
		   }
		   
		   
		   if($s2==-1)
		  {
		      $s2=$score2;
		  }
		   
		          /* if($req->query->get('rebegin'))
		           
           $app['db']->executeUpdate('UPDATE parties SET rebegin1=? and rebegin2=? WHERE id=?', array("","",$id));*/     
		     
    return $app['twig']->render('web/puissance4.html', array(
    'n1' =>$name1,
    'n2' =>$name2,
    'c1' =>$c1,
    'c2' =>$c2,
      'S1' =>$s1,
    'S2' =>$s2,
    'id'=>$id,
	'part'=>$part,
	'photo1'=>$photo1,
	'photo2'=>$photo2,
      ));
	  
	  
  });
  //enregistrement du joueur
   $app->match('/signup', function(Application $app,Request $req) {
       
      if( $req->getMethod()=="POST")
      {
       if($req->request->get('pass') && $req->request->get('login') && $req->request->get('nom')&& $req->request->get('prenom'))
       {
           
           /////////////////////
           $file = $req->files->get('file');
           $dir="/puissance4/image/";
           $name="aucun fichier";
           
           if($file)
           {
           
       $size=$_FILES["file"]["size"];
           $nm=$file->getClientOriginalName();
           $extractnamefile=substr($nm,strripos($nm,'.'));
       $typefile=array('.gif','.jpeg','.png','.jpg');
       if(in_array($extractnamefile, $typefile))
       {
            $name=$req->request->get('login').$extractnamefile;
            $file->move($dir,$name);
       }
      
           }
           $q = $app['db']->prepare('INSERT INTO users VALUES (?, ?, ?, ?, ?, ?,?,?,?,?,?)');
            $rows="";
try {
    // Envoyer la requête
    $r=$req->request->get('pass').$req->request->get('login');
    
    $rows = $q->execute(array($req->request->get('login'),sha1($r),$req->request->get('couleur1'),'vert',0,0,$req->request->get('nom'),$req->request->get('prenom'),$name,FALSE,-1));
} catch (Doctrine\DBAL\DBALException $e) {
            
             $v=$req->request->get('nom');
   
   return $app['twig']->render('/puissance4/web/identification.html',array('pass'=>'Ce Login existe déja, Choisissez en un autre!','n'=>$v));
   
}
           /////////////////////
          
           
       
          if($rows)
           return $app->redirect('/puissance4');
       }
   }
           else
   return $app['twig']->render('web/identification.html',array('pass'=>""));}
  );
  $app->get('/logout', function(Application $app,Request $req) {
      $id=$req->request->get('idgame');
         
         $app['db']->executeUpdate('UPDATE users SET connecte=? WHERE log=?', array(0,$app['session']->get('user1')));     
       $app['session']->set('user1',null);
	   $app['session']->set('challenger',null);
      $app['session']->set('challenged',null);
	   
  return $app->redirect('/');
  }
   
   
  );
$app->get('/userlist', function(Application $app) {
      
    
     
 $q=$app['db']->fetchAll("SELECT * FROM users WHERE connecte=true");
 $h=$app['session']->get('user1')?$app['session']->get('user1'):-1;
      
 return $app['twig']->render('web/database.html',array( 'base' => $q,'demandeur' =>$h ));
 }
   
   
  );
  $app->get('/api/userlist', function(Application $app) {
      
       
      $vrai=TRUE; 
      $ett="";
     $joueur=$app['session']->get('user1');
 $q=$app['db']->fetchAll("SELECT * FROM users WHERE connecte=TRUE");
$sth = $app['db']->prepare("SELECT challenger,id, etat,challenged,id FROM parties WHERE challenged='$joueur' or challenger='$joueur' ");
 $sth->execute();
 $q1 = $sth->fetchAll();
  if($q1)
  {
  
  }
  else
  $q1=0;
  
 $data = array('connect' =>$q,
                "demandeur"  =>$app['session']->get('user1'),"sTatus" => $q1,'etatt'=>" demande");
 
         
 
  
    return $app->json($data);

 }
   
   
  );
  $app->get('/api/challenge', function(Application $app,Request $req) {
     
      $login= $req->query->get('login');
     
     $login1=$app['session']->get('user1');
     $bool1=0;
     $bool2=0;
     
      $q=$app['db']->fetchAll('SELECT joue FROM users  WHERE log=?',array($login));
       $q1=$app['db']->fetchAll('SELECT joue FROM users  WHERE log=?',array($login1));
         foreach($q as $row)
         {
         if($row['joue']!=-1)
          $bool1=1;
         }
         foreach($q1 as $row)
         {
         if($row['joue']!=-1)
          $bool2=1;
         }
         if( $bool1==0 && $bool2==0)
         {
            
             $stmt = $app['db']->prepare("INSERT INTO parties (challenger, challenged,etat) VALUES (:cha1, :cha2,:Etat)");
             $stmt->bindParam(':cha1',$ch1);
             $stmt->bindParam(':cha2',$ch2);
             $stmt->bindParam(':Etat',$ask);
           
             $ch1 =$login1;
             $ch2 =$login;
             $ask="demande";
             $stmt->execute();
             $id=$app['db']->lastInsertId();
             
              $app['db']->executeUpdate('UPDATE users SET joue=? WHERE log=?', array($id,$login1));
               $app['db']->executeUpdate('UPDATE users SET joue=? WHERE log=?', array($id,$login));
         return  "En attente de la reponse de votre adversaire,Vous jouerez à la partie numero"." ".$id." "."du Jeux puissance 4";     
           
         }
         else
          return  "Il vous est impossible de lancer cette invitation!";
    
     
   

 
 
   

 }
   
   
  );
  $app->get('/api/accept', function(Application $app, Request $req) {
      
    
    
      $login= $req->query->get('login');
     
  $app['db']->executeUpdate('UPDATE parties SET etat=? WHERE challenger=?', array("accepte",$login));
      
        return new Response("Demande accepté", 200);
 
 }
   
   
  );
   $app->get('/api/reject', function(Application $app,Request $req) {
      
    
    
    
     $id=$req->query->get('idgame');
    
         
          $app['db']->executeUpdate('UPDATE users SET joue=? WHERE joue=?', array(-1,$id));
        
          $app['db']->exec("DELETE FROM parties  WHERE id='$id'");
            if($req->query->get('idgame'))
            {
                 return $app->redirect('/userlist');
            }
            else
         return new Response("Demande rejété", 200);
    
     
   
 }
   
   
  );
  $app->get('/api/play', function(Application $app, Request $req) {
      
    
     $id=$req->query->get('colone');
     $id1=$app['session']->get('idgame');
     $reponse1="";
     $reponse2="";
     $sth1 = $app['db']->prepare("SELECT rebegin1,rebegin2 FROM parties WHERE id='$id1'");
     $sth1->execute();
 $q1 = $sth1->fetchAll();
 foreach($q1 as $ta1)
		     {
		      $reponse1=$ta1['rebegin1'];
		       $reponse2=$ta1['rebegin2'];
		     
		     }
		      if(isset($reponse1))
         {
         
         }
         else
         $reponse1=-1;
          if(isset($reponse2))
         {
         
         }
         else
         $reponse2=-1;
   $joueur1=$app['session']->get('challenger');
    $userdefault= $app['session']->get('user1');
     $line=$req->query->get('line');
     $fin=$req->query->get('fin');
    $joueur=$req->query->get('tourgame');
	
	   
    if($joueur==1)
    $joueur="joueur1";
     
     if($joueur==2)
     {
     $joueur="joueur2";
     }
        $va1= $req->query->get('j1');
         if(isset($va1))
         {
         
         }
         else
         $va1=$reponse1;
         $va2= $req->query->get('j2');
         if(isset($va2))
         {
         
         }
         else
         $va2=$reponse2;
                           if($va1!=-1)
     $app['db']->executeUpdate('UPDATE parties SET rebegin1=?  WHERE id=?',array($va1,$app['session']->get('idgame')));
     if($va2!=-1)
     $app['db']->executeUpdate('UPDATE parties SET rebegin2=?  WHERE id=?',array($va2,$app['session']->get('idgame')));
              if($joueur)	 
    $app['db']->executeUpdate('UPDATE parties SET etat=?  WHERE id=?',array($joueur,$app['session']->get('idgame')));
    $app['db']->executeUpdate('UPDATE parties SET  plateau=? WHERE id=?',array($id,$app['session']->get('idgame')));
     $app['db']->executeUpdate('UPDATE parties SET  line=? WHERE id=?',array($line,$app['session']->get('idgame')));
     $app['db']->executeUpdate('UPDATE parties SET  fin=? WHERE id=?',array($fin,$app['session']->get('idgame')));
	 
		  
    $myplat=array("joueur"=>$joueur,"plat"=>$id,"ty"=>$app['session']->get('idgame'),"reponse"=>$va2);
      
        return $app->json($myplat);
 
 }
 );
 
 $app->get('/api/play_event', function(Application $app, Request $req) {
      
    $id=$req->query->get('post');
    $j1="";
    $x="";
    $y="";
    
   $name1="";
       $name2="";
       $partie="";
       $reponse1=-1;
       $reponse2=-1;
         
    $sth1 = $app['db']->prepare("SELECT challenger,challenged ,rebegin1,rebegin2 FROM parties WHERE id='$id'");
   
 $sth1->execute();
 $q1 = $sth1->fetchAll();
  $sth5 = $app['db']->prepare("SELECT parties FROM  users WHERE joue='$id'");
     $sth5->execute();
  $q3 = $sth5->fetchAll();
  foreach($q3 as $ta1)
		     
		     $partie=$ta1['parties'];
		     
		     
		     
          foreach($q1 as $ta1)
		     {
		     $name1=$ta1['challenged'];
		      $name2=$ta1['challenger'];
		      $reponse1=$ta1['rebegin1'];
		       $reponse2=$ta1['rebegin2'];
		     
		     }
		     
          
			$rep=-1;
			$reponsefinale="";
			
			     if(ord($reponse1)==ord($reponse2) && ord($reponse1)==49)
			     $rep=1;
			      if(ord($reponse1)==ord($reponse2) && ord($reponse1)==48)
			     $rep=0;
			     if(ord($reponse1)==49 && ord($reponse2)==48)
			      $rep=0;
			       if(ord($reponse2)==49 && ord($reponse1)==48)
			      $rep=0;
             
			     
			   
	$s1=$req->query->get('s1');
		$s2=$req->query->get('s2');
			
		     if($s1!=null && $s2!=null)
			 {
			 $h=1;
			 
		    $app['db']->executeUpdate("UPDATE users SET parties=?  WHERE joue='$id'",array($partie+1));
			 $app['db']->executeUpdate("UPDATE users SET parties=?  WHERE joue='$id'",array($partie+1));
			 $app['db']->executeUpdate('UPDATE users SET gagnees=?  WHERE log=?',array($s2,$name2));
			  $lk=$app['db']->executeUpdate('UPDATE users SET gagnees=?  WHERE log=?',array($s1,$name1));
			 }
    $q=$app['db']->fetchAll("SELECT * FROM parties WHERE id='$id'");
    if($q)
    {
        foreach($q as $v)
        {
        if($v['etat']=="joueur1")
        $j1="1";
        else
        if($v['etat']=="joueur2")
        $j1="2";
        else
        $j1="accepte";
   $x=$v['line'];
   $fin=$v['fin'];
    $y=$v['plateau'];
     
      $name=$v['challenged'];
    $df=array("jA"=>$j1,"x"=>$x,"challenged"=>$name,"ord"=>$y,"fin"=>$fin,'demandeur' => $app['session']->get('user1'),"reponse"=>$rep,"rep1"=>$reponse1,"rep2"=>$reponse2);
   return $app->json($df);
    }
 }
    else
    {
        $df=array("jA"=>0);
   return $app->json($df); 
    }
   
      
      
 
 }
 );
 
$app->run();


?>
