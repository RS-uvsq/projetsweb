
 <fieldset class="sot" style="border: medium solid #BDB76B
;width:53%;margin-left:18%;margin-top:2%">
      <h3 id="fac" style="font-size:17px;color:#00FA9A;text-shadow: none !important;" > Ajout de Fichier</h3>
<form   enctype="multipart/form-data" action="/projetbdd/addfile"   method="post"   >
    <div id="pose">
 <p style="padding-left:11px;padding-top:45px;">
		   
     <label style="font-family:Comic Sans MS;"><span style="text-decoration:underline;font-weight:bolder;color:black;">N</span><span style="color:white;text-shadow: none !important;">om du fichier </span></label> 
     <label style="font-family:Comic Sans MS;padding-left:185px;"><span style="text-decoration:underline;font-weight:bolder;color:black;">T</span><span style="color:white;text-shadow: none !important;;">ype de fichier:</span></label> 
 </p>
 <p style="padding-left:11px;padding-top:0px;">
          <input class="yes" type="text" name="file"  style="width:220px;height:30px;"  required/>
		  <input  class="yes" type="text" name="tfile"  style="width:270px;height:30px;"  required />
         </p >
          <p style="padding-left:140px;padding-top:6px;">
              <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">A</span><span style="color:white;text-shadow: none !important;">uteur:</span></label>
    	   
           </p>
           <p  style="padding-left:135px;padding-top:0px;">
		   <input   class="yes" type="text" name="aufile" value="" id="login" style="width:295px;height:30px;" required />
		    </p>
		 <p style="padding-left:140px;padding-top:6px;">
             <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">D</span><span style="color:white;text-shadow: none !important;">'ate d'édition:</span></label></p>
   <p  style="padding-left:135px;padding-top:0px;">
		   <input   class="yes"type="date" name="dafile"  style="width:295px;height:30px;"  required/>
		    </p>
    </div>
			
    	   <p style="padding-left:140px;padding-top:6px;">
               <label style="font-family:Comic Sans MS"><span style="text-decoration:underline;font-weight:bolder;color:black;">A</span><span style="color:white"><span style="color:white;text-shadow: none !important;">ffecter ce fichier  à un groupe de fichier:</span></span></label>
    	   </p>
		   <p class="radio" style="padding-left:35px;padding-top:6px;"> 
		   <div id="groupe">
		   </div>
         
    </p>
			
			<p  style="padding-left:35px;padding-top:10px;">
			
                <label id="picture" style="font-family:Comic Sans MS;padding-left:0px;"><span style="text-decoration:underline;font-weight:bolder;color:black;">F</span><span style="color:white;text-shadow: none !important;">ichier:</span></label>
			
			  
		   </p>
		   <p style="font-family:Comic Sans MS;padding-left:35px;" >
         

		   <input  value=" " style="color:#FF9900;text-shadow: none !important;" class="yes" type="file" name="ffile"  id="file"  style="width:210px;height:30px;"  required />
		   </p>
		   
		   
    <label style="font-family:Comic Sans MS"> <span style="text-decoration:underline;font-weight:bolder;color:black;">D</span><span style="color:white;text-shadow: none !important;">escription :</span></label>
		   <p style="padding-left:px;padding-top:0px;">
		  
 <textarea  rows="6" cols="10"; name="dfile" style="margin-left:25%;width:300px;"  placeholder="Tapez ici vos commentaires" required="required"></textarea>
               
			
			
    
							
							
			                 <input type="submit"  class="bottom1" value="Soumettre"/>
			                    
						
  
			</form>
</fieldset>



