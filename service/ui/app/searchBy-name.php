

<?php include("service/ui/common/header.php"); ?>
<script type="text/javascript">
   $(document).ready(function(){
   
   function loadData(page,letter){  
   $(".ser_pag").hide();   
   					$(".outr_load").show();                   
                       $.ajax
                       ({
                           type: "POST",
                           url: SITEURL+'search-Alpha',
   						data:{"page":page,"letter":letter},
                           success: function(msg)
                           {
                               //console.log(msg);
                                   
                                  $(".ser_pag").html(msg);
								  // procedures();
								   $(".outr_load").hide();                 
								   $(".ser_pag").show();
                           }
                       });
                   }
   setTimeout(function(){loadData(1,'a')}, 3000);  // For first time page load default results
   $(".alphabets").click(function(){
                        $(".ser_pag").hide();
	   $(".outr_load").show(); 
	   $(".alpha").removeClass("active");
	   $(this).parent().addClass("active");
                       var the_letter = $(this).attr("target");
					   $(".alpha").val(the_letter);
   					//alert(the_letter);
					setTimeout(function(){loadData(1,the_letter)}, 3000);
                      
                   });
   				
   				$(".searchbtn").click(function(){
                       var the_letter = $('.textarea').val();
   					//alert(the_letter);
   loadData(1,the_letter);
                      
                   });
   				
                   $('.ser_pag .rvwpaginatin li.activ').live('click',function(){
                                       $(".ser_pag").hide();
	   $(".outr_load").show(); 
                       var page = $(this).attr('p');
					   var the_letter =  $(".alpha").val();
                       setTimeout(function(){loadData(page,the_letter)}, 3000);
                       
                   });   
   $('#go_btn').live('click',function(){
                       var page = parseInt($('.goto').val());
                       var no_of_pages = parseInt($('.total').attr('a'));
                       if(page != 0 && page <= no_of_pages){
                           loadData(page);
                       }else{
                           alert('Enter a PAGE between 1 and '+no_of_pages);
                           $('.goto').val("").focus();
                           return false;
                       }
                       
                   });
               			
   });
   
   
</script><input type="hidden" class="alpha" value="A">
<section class="team-modern-12" >
   <div class="container">
      <div class="container1">
         <div class="jumbotron">
            <h1> Find Doctors by Name </h1>
         </div>
         <div class="doctorsearchbox">
            <div class="bluebox">
               <form class="texlab">
                  <ul>
                     <li><label class="searchname">Search by Name</label></li>
                     <li><input type="text" name="fname" placeholder="Doctor Name" class="textarea"></li>
                  </ul>
                  <div class="docsearchbtn">
                     <input type="button" value="Search" class="searchbtn">
                  </div>
               </form>
            </div>
         </div>
         <div class="menuicons" style="margin-left: 2%;">
            <ul>
               <li class="alpha"><a target="Z" class="alphabets">Z</a></li>
               <li class="alpha"><a target="Y" class="alphabets">Y</a></li>
               <li class="alpha"><a target="X" class="alphabets" >X</a></li>
               <li class="alpha"><a target="W" class="alphabets">W</a></li>
               <li class="alpha"><a target="V" class="alphabets">V</a></li>
               <li class="alpha"><a target="U" class="alphabets">U</a></li>
               <li class="alpha"><a target="T" class="alphabets">T</a></li>
               <li class="alpha"><a target="S" class="alphabets">S</a></li>
               <li class="alpha"><a target="R" class="alphabets">R</a></li>
               <li class="alpha"><a target="Q" class="alphabets">Q</a></li>
               <li class="alpha"><a target="P" class="alphabets">P</a></li>
               <li class="alpha"><a target="O" class="alphabets">O</a></li>
               <li class="alpha"><a target="N" class="alphabets">N</a></li>
               <li class="alpha"><a target="M" class="alphabets">M</a></li>
               <li class="alpha"><a target="L" class="alphabets">L</a></li>
               <li class="alpha"><a target="K" class="alphabets">K</a></li>
               <li class="alpha"><a target="J" class="alphabets">J</a></li>
               <li class="alpha"><a target="I" class="alphabets">I</a></li>
               <li class="alpha"><a target="H" class="alphabets">H</a></li>
               <li class="alpha"><a target="G" class="alphabets">G</a></li>
               <li class="alpha"><a target="F" class="alphabets">F</a></li>
               <li class="alpha"><a target="E" class="alphabets">E</a></li>
               <li class="alpha"><a target="D" class="alphabets">D</a></li>
               <li class="alpha"><a target="C" class="alphabets">C</a></li>
               <li class="alpha"><a target="B" class="alphabets">B</a></li>
               <li class="alpha"><a target="A" class="alphabets">A</a></li>
               <!--<li class="recent"><a target="" class="alphabets">RECENT</a></li>-->
            </ul>
         </div>
      </div>
      <div class="clearfix"></div>
      <div class="prflpg_clm3" style="width:100%;">
      <div class="outr_load"></div>
         <div class="pfl_clm3_lft ser_pag" style="width:100%;">
              
         </div>
        <!-- <div class="rvwpaginatin"><ul>
               <li p="1" class="inactiv">First</li>
               <li class="inactiv">Prev</li>
               <li p="1" style="color:%23fff;background-color:%23006699; width:10px;" class="activ">1</li>
               <li p="2" class="activ">2</li>
               <li p="3" class="activ">3</li>
               <li p="4" class="activ">4</li>
               <li p="5" class="activ">5</li>
               <li p="6" class="activ">6</li>
               <li p="7" class="activ">7</li>
               <li p="2" class="activ">Next</li>
               <li p="417" class="activ">Last</li>
            </ul>
         </div>-->
      </div>
   </div>
</section>
<?php include("service/ui/common/footer.php"); ?>
