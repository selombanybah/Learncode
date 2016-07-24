<html>
   <head>
      <title> LearnCode | Select Task </title>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="mz/js/materialize.js"></script>
      <script src="cm/lib/codemirror.js"></script>
      <link rel="stylesheet" href="cm/lib/codemirror.css">
      <script src="cm/mode/javascript/javascript.js"></script>
      <link rel="stylesheet" href="cm/theme/monokai.css">
      <link rel="stylesheet" href="css/lc.css">
      <link rel="stylesheet" href="css/lchome.css">
      <script>
         $(document).ready(function () {
         $('div.hidden').fadeIn(1000).removeClass('hidden');
         });
      </script>
   </head>
   <body>
      <div class="hidden" style="display:none">
         <a href="#" onClick="scrollDown()" class="arrow" style="z-index:5"><img src="dat/arrow.png"></a>
         <script>
            function scrollDown(){
              $('html,body').animate({
                  scrollTop: window.scrollY + window.innerHeight
             }, 1000);
            }
         </script>
         <!-- <div class="card-panel red lighten-2">Welcome to LearnCode.edu</div> -->
         <!-- Page Layout here -->
         <div class="row headerbar">
            <div class="col s12 grey lighten-4 lc_head">
               <h6 style="color:#000; float:left;  font-weight:400;"><a style="color:#000;" href="index.php"><b>LearnCode.edu</b>Learn to code, for free</a></h6>
               <a href="index.php" style="padding-top:4px; line-height: 30px; float:right;">Return to Home</a>
            </div>
         </div>
         <?php
            for ($i = 0; $i <= 100; $i++) {
                if(file_exists ('tasks/code/' . $i . '.txt')){
                  echo '    <!-- Task Block Begin -->

                            <div class="parallax-container" style="height:20%">
                              <div class="parallax"><img src="dat/sc2.png"></div>
                            </div>

                            <div class="section white">
                              <div style="width:50%;" class="row container">
                                    <h4> <b> ' . explode(",", file_get_contents("tasks/inf/"   . $i . ".txt"))[0] . ' </h4>
                                    <p style="padding:0px">' . substr(file_get_contents("tasks/theory/"   . $i . ".txt"), 0, 420)  . '...
                                    </p>
                                    <div class="center promo promo-example">
                                      <a href="task.php?id=' . $i .'"> Begin Learning</a>
                                    </div>
                              </div>
                            </div>

                            <!-- Task Block End -->';
                  }
                }

                echo '    <div id="botPara" style="height:20%" class="parallax-container">
                            <div class="parallax"><img src="dat/sc2.png"></div>
                          </div>

                          <div id="botSec" class="section white">
                            <div style="width:50%;" class="row container">
                              <div class="row">
                                  <div class="col s4">
                                    <div class="center promo promo-example">
                                      <p class="light center">The information contained in this website is for general information purposes only. The information is provided by LearnCode and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose.</p>
                                    </div>
                                  </div>
                                  <div class="col s4">
                                    <div class="center promo promo-example">
                                      <p class="light center">Any reliance you place on such information is therefore strictly at your own risk.
                                                              In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.Through this website you are able to link to other websites which are not under the control of LearnCode. We have no control over the nature, content and availability of those sites. </p>
                                    </div>
                                  </div>
                                  <div class="col s4">
                                    <div class="center promo promo-example">
                                      <p class="light center">The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.
                                      Every effort is made to keep the website up and running smoothly. However, [business name] takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control. We hope that your experience is as enjoyable as possible, all rights reserved, learncode.edu and its affiliates</p>
                                    </div>
                                  </div>
                                </div>
                             </div>
                          </div>'
            ?>
      </div>
      <div id="sound"></div>
      <!-- Create a simple CodeMirror instance -->
      <script>
         $(document).ready(function(){
             $('.parallax').parallax();
         });
         console.log($(window).width());
         if($(window).width() < 601){
         	console.log("Device Resolution Not Supported")
         	$('body').replaceWith("<center><h5>Horizontal Resolution Too Low (<600px)</h5>");
         }
      </script>
      </div>
   </body>
</html>
