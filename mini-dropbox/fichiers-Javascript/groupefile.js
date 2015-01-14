$(document).ready(function(){

var user=1;

  //alert($("#fileg option:first").val());
  $.ajax({
            url : "/projetbdd/vg", // on donne l'URL du fichier de traitement
            type : "post",
			data:"fic="+user,
            dataType: 'json',
           success: function(data) {
		   
		         
		             
		        var dv=document.querySelector("#tesnote");
				
				 var users=data.vus;
				 dv.innerHTML=" ";
				
				//////////////////////////////////////////////
				   var table=document.createElement("table");
			  var map = new Object();
			   var map1 = new Object();
			  function get(k) {
             return map[k];
                      }
					  
					   function get1(k) {
             return map1[k];
                      }
			//  table.class="sot5";
			  
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
				var th5=document.createElement("th");
				 var h31=document.createElement("h3");
				 h31.style.cssText=' text-align:center;';
				  var h32=document.createElement("h3");
				  h32.style.cssText=' text-align:center;';
				   var h33=document.createElement("h3");
				   h33.style.cssText=' text-align:center;';
				    var h34=document.createElement("h3");
					h34.style.cssText=' text-align:center;';
					 var h35=document.createElement("h3");
					 h35.style.cssText=' text-align:center;';
					var bod=document.createElement("tbody");
					map['1'] = th1;
					map['2'] = th2;
					map['3'] =th3;
					map['4'] =th4;
					map['5'] =th5;
					var dc1=document.createTextNode("Nom");
					var span1=document.createElement("span");
					span1.appendChild(dc1);
					var dc2=document.createTextNode("Type");
					var span2=document.createElement("span");
					span2.appendChild(dc2);
					var dc3=document.createTextNode("Auteur");
					var span3=document.createElement("span");
					span3.appendChild(dc3);
					var dc4=document.createTextNode("Date D'enregistrement");
					var span4=document.createElement("span");
				   span4.appendChild(dc4);
					var dc5=document.createTextNode("Description");
					var span5=document.createElement("span");
					
					
					
					
					span5.appendChild(dc5);
					
					
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					
					
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				
				th5.appendChild(h35.appendChild(span5));
				for(var i=1;i<6;i++)
				{
				
				get(i).style.cssText=' background:#DEB887;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th5);
				
				head.appendChild(tr1);
				table.appendChild(head);
			
                     for(f in users)
					 {
					  var lign=document.createElement("tr");
					 var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td5=document.createElement("td");
					 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].type)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].auteur)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				td5.appendChild(h34.appendChild(document.createTextNode(users[f].description)));
			            
			    
			 
				for(var i=1;i<6;i++)
				{
				
				get1(i).style.cssText='  background:url(web/images/my2.jpg);width:2px;color:white';
				}
					
                     lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td5);
				
				
					 bod.appendChild(lign);
     
					 }
			table.style.cssText='border: medium solid  #BDB76B;width:95%;height:200px;margin-top:5%;overflow-y:scroll;overflow-x:hidden;margin-left:2%';//height:325px;top:30%;border-radius: 20px;background:#A9A9A9;';
			   $("table.sot5 th").css({" height":"120px"});
				table.appendChild(bod);
				dv.appendChild(table);
					 }
					 });
 
 $("#fileg option:selected").each(function () {
               alert($(this).val());
				
				 $.ajax({
            url : "/projetbdd/vg", // on donne l'URL du fichier de traitement
            type : "post",
			data:"fic="+user,
            dataType: 'json',
           success: function(data) {
		   
		         
		             
		        var dv=document.querySelector("#tesnote");
				
				 var users=data.vus;
				 dv.innerHTML=" ";
				
				//////////////////////////////////////////////
				   var table=document.createElement("table");
			  var map = new Object();
			   var map1 = new Object();
			  function get(k) {
             return map[k];
                      }
					  
					   function get1(k) {
             return map1[k];
                      }
			//  table.class="sot5";
			  
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
				var th5=document.createElement("th");
				 var h31=document.createElement("h3");
				 h31.style.cssText=' text-align:center;';
				  var h32=document.createElement("h3");
				  h32.style.cssText=' text-align:center;';
				   var h33=document.createElement("h3");
				   h33.style.cssText=' text-align:center;';
				    var h34=document.createElement("h3");
					h34.style.cssText=' text-align:center;';
					 var h35=document.createElement("h3");
					 h35.style.cssText=' text-align:center;';
					var bod=document.createElement("tbody");
					map['1'] = th1;
					map['2'] = th2;
					map['3'] =th3;
					map['4'] =th4;
					map['5'] =th5;
					var dc1=document.createTextNode("Nom");
					var span1=document.createElement("span");
					span1.appendChild(dc1);
					var dc2=document.createTextNode("Type");
					var span2=document.createElement("span");
					span2.appendChild(dc2);
					var dc3=document.createTextNode("Auteur");
					var span3=document.createElement("span");
					span3.appendChild(dc3);
					var dc4=document.createTextNode("Date D'enregistrement");
					var span4=document.createElement("span");
				   span4.appendChild(dc4);
					var dc5=document.createTextNode("Description");
					var span5=document.createElement("span");
					
					
					
					
					span5.appendChild(dc5);
					
					
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					
					
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				
				th5.appendChild(h35.appendChild(span5));
				for(var i=1;i<6;i++)
				{
				
				get(i).style.cssText=' background:#DEB887;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th5);
				
				head.appendChild(tr1);
				table.appendChild(head);
			
                     for(f in users)
					 {
					  var lign=document.createElement("tr");
					 var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td5=document.createElement("td");
					 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].type)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].auteur)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				td5.appendChild(h34.appendChild(document.createTextNode(users[f].description)));
			            
			    
			 
				for(var i=1;i<6;i++)
				{
				
				get1(i).style.cssText='  background:#F0E68C;width:2px;color:white';
				}
					
                     lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td5);
				
				
					 bod.appendChild(lign);
     
					 }
			table.style.cssText='border: medium solid  #BDB76B;width:95%;height:200px;margin-top:5%;overflow-y:scroll;overflow-x:hidden;margin-left:2%';//height:325px;top:30%;border-radius: 20px;background:#A9A9A9;';
			   $("table.sot5 th").css({" height":"120px"});
				table.appendChild(bod);
				dv.appendChild(table);
					 }
					 });
              })
 
 $( "#fileg" )
  .change(function(){
  $("#fileg option:selected").each(function () {
               // alert($(this).val());
				
				 $.ajax({
            url : "/projetbdd/vg", // on donne l'URL du fichier de traitement
            type : "post",
			data:"fic="+$(this).val(),
            dataType: 'json',
           success: function(data) {
		   
		         
		             
		        var dv=document.querySelector("#tesnote");
				
				 var users=data.vus;
				 dv.innerHTML=" ";
				
				//////////////////////////////////////////////
				   var table=document.createElement("table");
			  var map = new Object();
			   var map1 = new Object();
			  function get(k) {
             return map[k];
                      }
					  
					   function get1(k) {
             return map1[k];
                      }
			//  table.class="sot5";
			  
               var head=document.createElement("thead");
                var tr1=document.createElement("tr");
                var th1=document.createElement("th");
                var th2=document.createElement("th");
                var th3=document.createElement("th");
                var th4=document.createElement("th");
				var th5=document.createElement("th");
				 var h31=document.createElement("h3");
				 h31.style.cssText=' text-align:center;';
				  var h32=document.createElement("h3");
				  h32.style.cssText=' text-align:center;';
				   var h33=document.createElement("h3");
				   h33.style.cssText=' text-align:center;';
				    var h34=document.createElement("h3");
					h34.style.cssText=' text-align:center;';
					 var h35=document.createElement("h3");
					 h35.style.cssText=' text-align:center;';
					var bod=document.createElement("tbody");
					map['1'] = th1;
					map['2'] = th2;
					map['3'] =th3;
					map['4'] =th4;
					map['5'] =th5;
					var dc1=document.createTextNode("Nom");
					var span1=document.createElement("span");
					span1.appendChild(dc1);
					var dc2=document.createTextNode("Type");
					var span2=document.createElement("span");
					span2.appendChild(dc2);
					var dc3=document.createTextNode("Auteur");
					var span3=document.createElement("span");
					span3.appendChild(dc3);
					var dc4=document.createTextNode("Date D'enregistrement");
					var span4=document.createElement("span");
				   span4.appendChild(dc4);
					var dc5=document.createTextNode("Description");
					var span5=document.createElement("span");
					
					
					
					
					span5.appendChild(dc5);
					
					
					span1.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span2.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span3.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span4.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					span5.style.cssText=' font-family:Comic Sans MS;font-size:20px;text-align:center;';
					
					
                th1.appendChild(h31.appendChild(span1));
                th2.appendChild(h32.appendChild(span2));
                th3.appendChild(h33.appendChild(span3));
                th4.appendChild(h34.appendChild(span4));
				
				th5.appendChild(h35.appendChild(span5));
				for(var i=1;i<6;i++)
				{
				
				get(i).style.cssText=' background:#DEB887;border-radius:8px;height:10px';
				}
                tr1.appendChild(th1);
				tr1.appendChild(th2);
				tr1.appendChild(th3);
				tr1.appendChild(th4);
				tr1.appendChild(th5);
				
				head.appendChild(tr1);
				table.appendChild(head);
			
                     for(f in users)
					 {
					  var lign=document.createElement("tr");
					 var td1=document.createElement("td");
					   var td2=document.createElement("td");
					    var td3=document.createElement("td");
						 var td4=document.createElement("td");
						  var td5=document.createElement("td");
					 map1['1'] = td1;
					map1['2'] = td2;
					map1['3'] =td3;
					map1['4'] =td4;
					map1['5'] =td5;
					td1.appendChild(h31.appendChild(document.createTextNode(users[f].nom)));
                td2.appendChild(h32.appendChild(document.createTextNode(users[f].type)));
                td3.appendChild(h33.appendChild(document.createTextNode(users[f].auteur)));
                td4.appendChild(h34.appendChild(document.createTextNode(users[f].date)));
				td5.appendChild(h34.appendChild(document.createTextNode(users[f].description)));
			            
			    
			 
				for(var i=1;i<6;i++)
				{
				
				get1(i).style.cssText='  background: url(web/images/my2.jpg);width:2px;color:white';
				}
					
                     lign.appendChild(td1);
				lign.appendChild(td2);
				lign.appendChild(td3);
				lign.appendChild(td4);
				lign.appendChild(td5);
				
				
					 bod.appendChild(lign);
     
					 }
			table.style.cssText='border: medium solid  #BDB76B;width:95%;height:200px;margin-top:5%;overflow-y:scroll;overflow-x:hidden;margin-left:2%';//height:325px;top:30%;border-radius: 20px;background:#A9A9A9;';
			   $("table.sot5 th").css({" height":"120px"});
				table.appendChild(bod);
				dv.appendChild(table);
					 }
					 });
              });
			 
			  
      
  
  });
  
  //e.preventDefault();
	   // alert("data");
	 
 $.ajax({
            url : "/projetbdd/vg", // on donne l'URL du fichier de traitement
             type : "post",
            dataType: 'json',
           success: function(data) {
		  // 
		        var dv1=document.querySelector("#fileg");
				 
				data1=data.vus;
				
				
				 var control=0;
                     for(g in data1)
					 {
					
				
					var option=document.createElement('option');
					option.value=data1[g].idag;
						if(control==0)
					option.selected="selected";
					option.appendChild(document.createTextNode(data1[g].name));
                     dv1.appendChild(option);
     control= control+1;
					 }
					 
		      // alert("le groupe"+" "+$("#vale").val()+" "+"vient d'être crée");
				//$("#vale").val("");
					 }
					 }
					 );
  
   
  
					
					} );