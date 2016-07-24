<html>
   <head>
      <title> LearnCode | <?php echo explode(",", file_get_contents("tasks/inf/"   . htmlspecialchars($_GET["id"]) . ".txt"))[0] ?> </title>
      <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="mz/js/materialize.js"></script>
      <script src="cm/lib/codemirror.js"></script>
      <link rel="stylesheet" href="cm/lib/codemirror.css">
      <script src="cm/mode/javascript/javascript.js"></script>
      <link rel="stylesheet" href="cm/theme/monokai.css">
      <link rel="stylesheet" href="css/lc.css">
      <script src="https://cdn.rawgit.com/jquery/esprima/2.7.2/esprima.js"></script>
      <script type="text/javascript">
         // @param filename The name of the file WITHOUT ending
         function playSound(filename){
             document.getElementById("sound").innerHTML='<audio autoplay="autoplay"><source src="/snd/' + filename + '.mp3" type="audio/mpeg" /><source src="' + filename + '.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3" /></audio>';
         }

         $(document).ready(function () {
           $('div.hidden').fadeOut(4000);
         });
      </script>
   </head>
   <body>
      <?php if(file_exists ('tasks/code/' . htmlspecialchars($_GET["id"]) . '.txt')){} else {
         header("Location: /404.php"); /* Redirect browser */
         exit();
         }
         ?>
      <!-- <div class="card-panel red lighten-2">Welcome to LearnCode.edu</div> -->
      <!-- Page Layout here -->
      <div class="row">
         <div class="col s12 grey darken-4 z-depth-4 lc_head">
            <h6 style="color:#000; float:left;  font-weight:400;"><a style="color:#fff;" href="index.php"><b>LearnCode.edu</b>Learn to code, for free</a></h6>
            <h6 style="color:#eeeeee; float:right; font-weight:400;" class=> <?php echo explode(",", file_get_contents("tasks/inf/"   . htmlspecialchars($_GET["id"]) . ".txt"))[0] ?> <a href="selecttask.php"> Return to Selection Page</a></h6>
         </div>
         <div id="pagecontent">
            <!-- Navigation Panel -->
            <div class="col s6 m4 l3 grey lighten-3 lc_nav">
               <div class="lc_task">
                  <h5> Task: </h5>
                  <ol id="lc_task_steps" type="1">
                  </ol>
               </div>
               <hr class="z-depth-1">
               <div class="lc_theory">
                  <h5> Theory: </h5>
                  <p id="lc_theory_text" class="paratext"></p>
               </div>
            </div>
            <!-- End Navigation Panel -->
            <!--Body Panel -->
            <div class="col s12 m8 l9 lc_con">
               <textarea id="editor"><?php echo file_get_contents('tasks/code/' . htmlspecialchars($_GET["id"]) . '.txt') ?></textarea>
               <a id="mainButton" class="waves-effect waves-light btn" style="width: 9%; position: absolute; bottom: 2%; z-index:5" onclick="checkCode()" href="#">Check</a>
               <a id="hintButton" class="waves-effect waves-light btn" style="display:none" onclick="giveHint()" href="#">Hint</a>
            </div>
            <!-- End Body Panel -->
         </div>
      </div>
      <div id="sound"></div>
      <script>
         document.getElementById("lc_theory_text").innerHTML = "<?php echo file_get_contents("tasks/theory/"   . htmlspecialchars($_GET["id"]) . ".txt");?>"
         document.getElementById("lc_task_steps").innerHTML = "<?php echo file_get_contents("tasks/task/" . htmlspecialchars($_GET["id"]) . ".txt");?>"
      </script>
      <!-- Create a simple CodeMirror instance -->
      <script>
         var cmInstance = CodeMirror.fromTextArea(editor,
         	{
         		lineNumbers:true,
         		firstLineNumber: 1,
         		mode : "javascript",
         		theme: "monokai",
         	}
         );

         function onSuccess(){
           document.getElementById("")
         	document.getElementById("mainButton").innerHTML = "Continue";

           document.getElementById("hintButton").style = "display: none;";
         	document.getElementById("mainButton").style = "display: none;";

         	Materialize.toast("Congratulations, you've completed this task!", 6000, "toastSuccess");
         	playSound("succ");
           setTimeout(redirect, 1000);
         }

         function redirect(){
           document.getElementById("mainButton").onClick = window.location = ("task.php?id=" + <?php echo htmlspecialchars($_GET["id"])  + 1 ?>);
         }

         function onFailure(){
         	document.getElementById("mainButton").innerHTML = "Check Again";
         	document.getElementById("mainButton").style = "width: 9%; position: absolute; bottom: 2%; z-index:5; background-color:red;"

           document.getElementById("hintButton").style= "background-color: #fff; color: #000 ; margin-left: 10%; position: absolute; bottom: 2%; z-index:5;"

         	playSound("fail");
         }

         function giveHint(){
           Materialize.toast('<?php echo explode(",", file_get_contents("tasks/inf/"   . htmlspecialchars($_GET["id"]) . ".txt"))[2] ?>', 16000, "toastHint");
         }

         function checkCode(){
         	    		var returnval;
                   var hasSuccess = false;

                   try {
                       returnval = eval(cmInstance.getValue());
                   } catch (e) {
                       if (e instanceof SyntaxError) {
                           alert(e.message);
                       }
                   }

                   console.log("Given answer: " + returnval);

         	    		if(returnval == <?php echo explode(",", file_get_contents("tasks/inf/"   . htmlspecialchars($_GET["id"]) . ".txt"))[1] ?>){
                     hasSuccess = true;
         	    			onSuccess();
         	    		} else {
         	    			if(returnval == undefined){
         	    				Materialize.toast("Oops, you haven't returned anything, make sure you return statement is valid.", 6000, "toastFailure");
         	    			} else {
         	    				Materialize.toast("Oops, you've returned '" + returnval + "' - that doesn't seem correct", 6000, "toastFailure");
         	    			}
         	    			onFailure();
         	    		}

               if(!hasSuccess){

                 onFailure();
                 console.log("Syntax Error in Submission")
               }
          	}

         if(parseInt(<?php htmlspecialchars($_GET["id"]) ?>) < 2){
           Materialize.toast('Welcome to LearnCode, your can find your instructions on the left, and your development enviroment on the right. ', 8000);
           Materialize.toast('LearnCode supports teaching of Javascript, and is aimed to provide an  introduction to the fundamentals of programming.	', 16000);
         }

         console.log($(window).width());
         if($(window).width() < 601){
         	console.log("Device Resolution Not Supported")
         	$('body').replaceWith("<center><h5>Horizontal Resolution Too Low (<600px)</h5>");
         }

         $('a').click(function(e){
           if(window.goto=$(this).attr("href") != "#"){
             window.goto=$(this).attr("href");
               $('body').fadeOut('fast',function(){
                 document.location.href=window.goto;
               });
             e.preventDefault();
           }
         });
      </script>
   </body>
</html>
