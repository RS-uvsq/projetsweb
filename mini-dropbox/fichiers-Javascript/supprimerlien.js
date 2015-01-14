$(document).ready(function(){
 
 
    
  			
					$('#fat').click(function(e) {
					var file="";
					var user="";
					  e.preventDefault();
					//$( "#fileg" ).change(function(){
  $("#fileg option:selected").each(function () 
  {
 
  user=$(this).val();
  
  }
  );
 

  
  $("#fileg1 option:selected").each(function () 
  {
   file=$(this).val();
   
  }
  );
  
    //  alert("yoyo"+" "+user+" "+file);           
		 
	 
	  $.ajax({
            url : "/projetbdd/SRelation", // on donne l'URL du fichier de traitement
             type : "post",
            data:"fileg="+file+"&userg="+user,
            dataType: 'text',
           success: function(data) {
		        
				alert(data);
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
				
                //alert($(this).val());
				
				 $.ajax({
            url : "/projetbdd/viewupdate", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		  // 
		  
		            datagu=data.vus;
					datagf=data.vuf;
		        var dv1=document.querySelector("#fileg");
				
				 var dv2=document.querySelector("#fileg1");
				 dv2.innerHTML=" ";
				  dv1.innerHTML=" ";
				
				 for(g in datagu)
					 {
					
				
					var option=document.createElement('option');
					option.value=datagu[g].id;
						
					option.appendChild(document.createTextNode(datagu[g].name));
                     dv1.appendChild(option);
     
					 }
				
                     for(g in datagf)
					 {
					
				
					var option=document.createElement('option');
					option.value=datagf[g].idag;
						
					option.appendChild(document.createTextNode(datagf[g].name));
                     dv2.appendChild(option);
     
					 }
					
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 });
             
					 }
					 }
					 );
	  
 
					
  
    });
  
					
					
					
					
 
 
 /////////////////////////////////////////
 $( "#fileg" )
  .change(function(){
  $("#fileg option:selected").each(function () {
                //alert($(this).val());
				
				 $.ajax({
            url : "/projetbdd/updatelien", // on donne l'URL du fichier de traitement
             type : "post",
			 data:"userg="+$(this).val(),
            dataType: 'json',
           success: function(data) {
		  // 
		
		             
		        var dv1=document.querySelector("#fileg");
				
				 var dv2=document.querySelector("#fileg1");
				 dv2.innerHTML=" ";
				
				
				
                     for(g in data)
					 {
					
				
					var option=document.createElement('option');
					option.value=data[g].idag;
						
					option.appendChild(document.createTextNode(data[g].name));
                     dv2.appendChild(option);
     
					 }
					
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 });
              });
			 
			  
      
  
  });
  
  //e.preventDefault();
	   // alert("data");
	 
 $.ajax({
            url : "/projetbdd/viewupdate", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		  // 
		        var dv1=document.querySelector("#fileg");
				 var dv2=document.querySelector("#fileg1");
				data1=data.vus;
				data2=data.vuf;
				
				 var control=0;
                     for(g in data1)
					 {
					
				
					var option=document.createElement('option');
					option.value=data1[g].id;
						if(control==0)
					option.selected="selected";
					option.appendChild(document.createTextNode(data1[g].name));
                     dv1.appendChild(option);
     control= control+1;
					 }
					 for(g in data2)
					 {
				var option=document.createElement('option');
					option.value=data2[g].idag;
					option.appendChild(document.createTextNode(data2[g].name));
                     dv2.appendChild(option);
    
					 }
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 }
					 );
  
   
  
					
					} );
					