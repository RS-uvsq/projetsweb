  $(document).ready(function(){
     var tab=[];
                var nom = document.querySelector("#op"); 
                var type = document.querySelector("#op1");  
                var Auteur = document.querySelector("#op2"); 
                var Ad= document.querySelector("#op3");
       var dv1=document.querySelector("#fileg1");
        var gr=document.querySelector("#gr");
        var dv=document.querySelector("#ca");
       var mdv=document.querySelector("#md");
      dv.style.cssText="visibility:hidden";
 
        var desc= document.querySelector("#op4");
      $("#fr").submit(OnSubmit);
       function OnSubmit(){
           
          
             $.ajax({
            url : "/projetbdd/enginefile", // on donne l'URL du fichier de traitement
             type : "post",
            data: $(this).serialize()+"&n="+mdv.class,
            dataType: 'json',
           success: function(data) {
		        
		       alert(data.mot);
                 nom.placeholder="";
                type.placeholder="";
                Auteur.placeholder="";
               Ad.innerHTML="";
                nom.innerHTML="";
                 type.innerHTML="";
                 Auteur.innerHTML="";
                
                 desc.innerHTML="";
               // Ad.appendChild(document.createTextNode(data[0].date));
                desc.placeholder=" ";
                dv.style.cssText="visibility:hidden";
               teste();
				//$("#vale").val("");
					 }
					 }
					 );
					 
           return false; 
       }
					/*$('#fat').click(function(e) {
   
 

	  
		 
	  

  
    });*/
      teste();
 function teste()
      {
	 $.ajax({
            url : "/projetbdd/trol", // on donne l'URL du fichier de traitement
             type : "GET",
            dataType: 'json',
           success: function(data) {
		  // 
		        var dv1=document.querySelector("#fileg");
				
				 //alert(data);
               // alert(data.c2);
                dv1.innerHTML=" ";
               
              dat=data.c2;
               data=data.c1;
				
				 var control=0;
                     for(g in data)
					 {
					
				
					var option=document.createElement('option');
					option.value=data[g].id;
						
					option.appendChild(document.createTextNode(data[g].nom));
                     dv1.appendChild(option);
     control= control+1;
					 }
                
               gr.innerHTML="";
				for( u in dat )
                {
                
var op=$('<input type="checkbox" name="prenom[]" value="'+dat[u].idag+'" ><span style="color:#FF9900;text-shadow: none!important;">'+dat[u].name+'</span></input>');
                    op.appendTo(gr);
           }
                        
		     
					 }
					 }
					 );
  }
       var dve = document.querySelector("#fileg");
                          dve.addEventListener('change', function(e) {
                                 val2=this.options[this.selectedIndex].value;
                             // alert(val2);
                              mdv.class=val2;
                               $.ajax({
            url : "/projetbdd/trol", // on donne l'URL du fichier de traitement
             type : "GET",
              data:"fil="+val2,                  
            dataType: 'json',
           success: function(data) {
            
               dv1.innerHTML=" ";
                  nom.placeholder="";
                type.placeholder="";
                Auteur.placeholder="";
                 nom.placeholder="";
                type.placeholder="";
                Auteur.placeholder="";
               Ad.innerHTML="";
               // Ad.appendChild(document.createTextNode(data[0].date));
               
               // Ad.appendChild(document.createTextNode(data[0].date));
                desc.placeholder=" ";
               dat=data.c2;
              data=data.c1;
               // $("#nom").css('color', 'red');
                     dv.style.cssText="visibility:visible";
               nom.appendChild(document.createTextNode(data[0].nom));
		        nom.placeholder=data[0].nom;
                type.placeholder=data[0].type;
                Auteur.placeholder=data[0].auteur;
                Ad.appendChild(document.createTextNode(data[0].date));
                desc.placeholder=data[0].description;
             
                 for(g in dat)
					 {
					
				
					var option=document.createElement('option');
					option.value=dat[g].idag;
						
					option.appendChild(document.createTextNode(dat[g].name));
                     dv1.appendChild(option);
     
					 }
              
         
		     
           }
        });
                          });
       
  });