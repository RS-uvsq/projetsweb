$(document).ready(function(){
   setInterval(refreshdemande, 2000);

   function refreshdemande()
   {
    $.ajax({
            url : "/projetbdd/state", // on donne l'URL du fichier de traitement
             type : "post",
            dataType:'json',
           success: function(data)
           {
               
               var nbrd=data.nbd;
               var nbi=data.nbi;
                var nbc=data.nbc;
                var ngf=data.ngf;
                var ngu=data.ngu;
                var ndf=data.ndf;
				if(nbrd){}
				else
				nbrd=0;
				if(nbi){}
				else
				nbi=0;
				if(nbc){}
				else
				nbc=0;
				
              
               document.getElementById("nbd").innerHTML=nbrd;
               document.getElementById("nbi").innerHTML=nbi;
                document.getElementById("nbc").innerHTML=nbc;
                document.getElementById("ngf").innerHTML=ngf;
                document.getElementById("ngu").innerHTML=ngu;
               document.getElementById("ndf").innerHTML=ndf;
               
           }
    }
          );
   
   }
   });


 