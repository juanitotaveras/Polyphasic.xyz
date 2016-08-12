<?php
	//require_once('../forum/SSI.php');
/*	session_start();
	ini_set('display_errors', 'On');   // error checking
	error_reporting(E_ALL);    // error checking
	$script = $_SERVER['PHP_SELF'];*/ 
	$levels = 0;
	require "./header.php"; 

?>
	
	

  <link rel="stylesheet" href="http://polyphasic.xyz/home.css">
  <div class="row panels" id="row_1"> 
    <div class="col-lg-6" id='about_big'>
    <div class='jumbotron'>
      <h2><strong>Polyphasic.xyz</strong> is the world hub for content and discussion regarding alternative sleep schedules.</h2>
      <br>
      <p> <b>Polyphasic sleep</b> is the practice of sleeping in multiple segments to increase sleep quality and decrease overall sleep time. <span id='notice' class='glyphicon glyphicon-exclamation-sign' data-toggle="popover" data-placement="bottom" title='DISCLAIMER' data-trigger="hover" data-content='Polyphasic sleep has not been researched extensively by the scientific community. Many schedules are largely experimental and should only be attempted with the approval of a medical professional.'></span></p>
     </div> <!-- end jumbotron -->
     </div> <!-- end about_big col-sm-6 -->
		
  <div class="col-lg-6">
   <div id="sched_carousel" class="carousel carousel-fade" data-interval="10000" data-ride="carousel" data-pause="hover">
    <h2 id="sched_title">Schedules</h2>  
 <!--      Indicators THIS MAKES LITTLE BUBBLES APPEAR UNDER CAROUSEL -->
      <ol class="carousel-indicators">
        <li data-target="#sched_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="1" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="2" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="3" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="4" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="5" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="6" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="7" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="8" class="active"></li>
        <li data-target="#sched_carousel" data-slide-to="9" class="active"></li>
      </ol> 
 <!--     wrapper for slides -->
     <div class="carousel-inner" role="listbox">
       <div class="item active">
         <img src="./schedules/schedule_pics/mono.png" alt="Monophasic">
         <div class="carousel-caption">
           <h2 class="sched_head" id="monotxt">Monophasic</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/siesta.png" alt="Siesta">
         <div class="carousel-caption">
           <h2 class="sched_head" id="siestatxt">Siesta</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/triphasic.png" alt="Triphasic">
         <div class="carousel-caption">
           <h2 class="sched_head" id="tritxt">Triphasic</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/seg_w_siesta.png" alt="Segmented with Siesta">
         <div class="carousel-caption">
           <h2 class="sched_head" id="seg_w_siestatxt">Segmented with Siesta</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/dc1.png" alt="Dual Core 1">
         <div class="carousel-caption">
           <h2 class="sched_head" id="dc1txt">Dual Core 1</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/dymaxion.png" alt="Dymaxion">
         <div class="carousel-caption">
           <h2 class="sched_head" id="dymaxtxt">Dymaxion</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/uberman.png" alt="Uberman">
         <div class="carousel-caption">
           <h2 class="sched_head" id="ubermantxt">Uberman</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/e3.png" alt="Everyman 3">
         <div class="carousel-caption">
           <h2 class="sched_head" id="e3txt">Everyman 3</h2>
         </div>
       </div>   
       <div class="item">
         <img src="./schedules/schedule_pics/e4.png" alt="Everyman 4">
         <div class="carousel-caption">
           <h2 class="sched_head" id="e4txt">Everyman 4</h2>
         </div>
       </div>   
       <div class="item">
         <a href="./schedules/segmented.php">
         <img src="./schedules/schedule_pics/segmented.png" alt="Segmented">
         <div class="carousel-caption">
           <h2 class="sched_head" id="segtxt">Segmented</h2>
         </div>
         </a>
       </div>
     </div> <!-- end carousel inner -->

    <!-- Left and right controls -->
  <a class="left carousel-control" href="#sched_carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#sched_carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>   
  </div> <!--end col w/ carousel-->
                        </div> <!-- end row w/ jumbotron and carousel -->
<div class="row panels" id="row_2">
     <div class="col-lg-6" id="news_panel">
                        <h2 id="news_head"> News </h2>
			<div id="latest_posts">
      <table class="table-responsive">
        <tr>
        <td>Null date</td>
<?php
	echo '<td>' . $context['random_news_line'] . '</td>';

?>
        </tr>
            
        <tr>
          <td>January 5, 2016</td>
          <td><p>Forums currently being built.</p></td>
        </tr>
        <tr>
          <td>December 1, 2015</td>
          <td><p>New Napchart available on site - app creates custom sleep schedules!</p></td>
        </tr>
        <tr>
          <td>December 1, 2015</td>
          <td><p>Polyphasic.xyz now live </p></td>
        </tr>
        <tr>
          <td>December 1, 2015</td>
          <td><p>Polyphasic blogger puredoxyk releases latest version of Ubersleep </p></td>
        </tr>
        <tr>
          <td>December 1, 2015</td>
          <td><p>Sleep researcher Claudio Stampi publishes study on the Uberman schedule </p></td>
        </tr>
		
      </table>
        </div> <!-- latest posts -->
     </div>
    <div class="col-lg-6" id="stampi_video_panel">
     <h2 id="uberman_title">Uberman Sleep Schedule Study </h2>
     <div class="intrinsic-container">
     <iframe src="http://www.youtube.com/embed/myi2sRph69A" id="stampi_video" allowfullscreen>Dr. Claudio Stampi's study on the Uberman schedule</iframe>
      </div> <!-- end intrinsic-container -->
     </div> 

</div> <!-- end row w/ video player and news -->
<div class="row panels" id="row_3"> <!-- start row w/ poylsleep reasons and news -->
  <div class="col-lg-6 col-sm-12" id="evidence">
    <h2> The Science Behind It</h2>
    <div id="evidence_sub">
    <ol>
      <li>Polyphasic sleep is the characteristic sleep pattern in nature: monophasic sleep is an exception reserved to humans, a handful of other mammalian species, and some birds. <sup><a href="#" data-toggle="tooltip" title="Ball, Chapter 3">[1]</a></sup></li>
      <li> Sleep fragmentation is observed in particular in certain mammals living in dangerous environments. <sup><a href="#" data-toggle="tooltip" title="Stampi, Chapter 1">[2]</a></sup> </li>
      <li> Polyphasic sleep is the typical sleep pattern during the first few months of human life, during which a 3- to 4-hr cycle in sleep wake behavior is normally displayed. <sup><a href="#" data-toggle="tooltip" title="Salzarulo and Fagioli, Chapter 4; Webb, Chapter 5">[3]</a></sup></li>
      <li>In the elderly, nocturnal sleep tends to become more fragmented and daytime naps may become relatively frequent, even in healthy, alert individuals. <sup><a href="#" data-toggle="tooltip" title="Webb, Chapter 5">[4]</a></sup></li>
      <li>Subjects studied in situations isolated from time cues (including "disentrained" and/or bed-rest conditions) show a marked tendency to have multiple naps in addition to the major sleep episode. <sup><a href="#" data-toggle="tooltip" title="Campbell, Chapter 6">[5]</a></sup></li>
      <li>Studies conducted in cultures isolated from modern societies (such as the Temiars and Ibans tribes) show that they permanently adopt polyphasic sleep patterns. <sup><a href="#" data-toggle="tooltip" title="Petre Quadens, 1983; Stampi, Chapter 1">[6]</a></sup></li><
      <li>Four-hour cycles in sleep propensity (<i>a</i> and <i>b</i>) or in SWS(<i>c</i>) have been recognized in constant bed rest<sup><a href="#" data-toggle="tooltip" title="Nakagawa, 1980; Zulley, 1988">[6]</a></sup>, (<i>b</i>) following ultrashort sleep-wake paradigms<sup><a href="#" data-toggle="tooltip" title="Lavie, Chapter 8">[7]</a></sup>, and <i>(c)</i> in the frequent sleep episodes of narcoleptic patients <sup><a href="#" data-toggle="tooltip" title="Billbiard et al., Chapter 15">[8]</a></sup>. This ultradian cycle is superimposed on the circadian cycle and the midafternoon peak in sleep propensity<sup><a href="#" data-toggle="tooltip" title="Dignes, Chapter 9">[9]</a></sup>.</li>
      <li>Recent studies, focused primarily on modeling the effects of sleep apnea on performance and sleepiness, suggest that a fragmented nocturnal sleep consisting of many short sleep episodes (4 min-2.5 hr) can yield as much recuperation as much longer, continuous sleep <sup><a href="#" data-toggle="tooltip" title="Bonnet, 1986; Magee et al., 1987; Naitoh, Chapter 13">[10]</a></sup>.</li>
      <li>The remarkable recuperative value of brief naps, which normally occurs with or without prior sleep deprivation, has been documented in a large number of studies <sup><a href="#" data-toggle="tooltip" title="Dignes, Chapter 9; Naitoh, Chapter 13; Angus et al., Chapter 14">[6]</a></sup>.</li>
      <li>Finally, many experiments have provided direct evidence that adult humans have a surprsing ability to adapt to different types - and different levels - of polyphasic sleep-wake behavior.</li>

    </ol>
    </div> <!-- end evidence_sub -->
  </div>  <!-- end col-sm-6 EVIDENCE -->
     <div id="notables_panel" class="col-lg-6 col-sm-12" style="display:none">
     <h2 id = "notables_title"> Notable Polyphasers </h2>
       <div id="notables_sub">
         <div id="davinci_panel"> 
           <img src="./notable_polyphasers/davinci.jpg" class="img-circle img-responsive" id="davinci_pic">
           <div id="davinci_text">
           <p> Leonardo DaVinci was a 16th centery artist, inventor , and ....... lorem ipsum blah blah blah text goes here and stuff I will fill this in with some good stuff later maybe maybe later. </p>
           </div>
         </div> <!-- end davinci panel -->
         <div id="edison_panel">
           <img src="./notable_polyphasers/edison.jpg" class="img-circle img-responsive" id="edison_pic" alt="Thomas Edison">
           <div id="edison_text">
             <p>Thomas Edison (1847 – 1931) was an American businessman and inventor. He invented the phonograph, motion picture camera, and the light bulb, among hundreds of other inventions. He took one or two brief naps on most days to counterbalance the intensity of his work. Per multiple first-hand accounts, he always awoke from his naps reinvigorated rather than groggy, ready to devour the rest of the day with full alertness and zest. 
             </p>
             <p>
            " … For myself I never found need of more than four or five hours' sleep in the twenty-four."
             <p>
           </div> <!-- edison_text -->
         </div> <!-- end edison panel -->
         <div id="fuller_panel">
           <img src="./notable_polyphasers/fuller.png" class="img-circle img-responsive" id="fuller_pic" alt="Buckminster Fuller">
           <div id="fuller_text">
             <p>Mauris vitae pretium nisl. Sed sit amet diam consequat libero pharetra aliquam. Mauris a lacus pellentesque, dapibus enim quis, congue tortor. Quisque urna nunc, porta at sapien ut, accumsan viverra ipsum. Curabitur luctus neque sapien. Nam et dolor tempus, aliquet tellus vulputate, ornare lorem. Praesent non varius lectus. Quisque tincidunt tincidunt orci. Sed tristique risus sit amet arcu aliquet, id pharetra ante fermentum. Phasellus placerat blandit ligula, at pretium turpis pulvinar cursus.  </p>
           </div> <!-- fuller_text -->
         </div> <!-- end fuller panel -->
         <div id="mull_panel">
           <img src="./notable_polyphasers/mullenweg3.png" class="img-circle img-responsive" id="mull_pic" alt="Matt Mullenweg">
           <div id="mull_text">
             <p>Mauris vitae pretium nisl. Sed sit amet diam consequat libero pharetra aliquam. Mauris a lacus pellentesque, dapibus enim quis, congue tortor. Quisque urna nunc, porta at sapien ut, accumsan viverra ipsum. Curabitur luctus neque sapien. Nam et dolor tempus, aliquet tellus vulputate, ornare lorem. Praesent non varius lectus. Quisque tincidunt tincidunt orci. Sed tristique risus sit amet arcu aliquet, id pharetra ante fermentum. Phasellus placerat blandit ligula, at pretium turpis pulvinar cursus.  </p>
           </div> <!-- mull_text -->
         </div> <!-- end mull_panel -->
       </div>  <!-- end notables_sub -->
     </div> <!-- end notables_panel -->

                   
</div> <!-- end row w/ polysleep reasons and news-->
 <div class="row panels" id="row_4"> <!-- start row w/ Terminology and Sleep Stages -->
  <div class="col-sm-6" id="term">
    <div id="term_head_panel">
    <h3 id = "term_head">Terminology</h3><!--<span id="term_expand" class="glyphicon glyphicon-triangle-bottom"></span>
   --> </div> <!-- end term head panel -->
   	
    <p><strong> Polyphasic sleep </strong> is the practice of sleeping more than once per 24-hour period. </p>
    <p><strong> Monophasic sleep </strong> is the practice of sleeping once per 24-hour period. </p>
    <p><strong> Exaptation </strong>, also known as <i>naptation</i>, is the process by which person will take exclusively twenty-minute naps for several days to have an easier time transitioning into a particular sleep schedule. </p>
   <p>The <strong> circadian clock </strong> is what allows organisms to coordinate their behavior and biology with the day-night cycle, and oscillates in humans in 24-hour cycles.</p>
    </div> <!-- end term -->

  <div class="col-sm-6" id="">
    <h3 id = "stage_head"> Sleep stages </h3>
   
    <p><strong>REM</strong>, or <a href="./back"> Rapid Eye Movement</a> is a unique stage of sleep in which the eyes move rapidly and the sleeper has vivid dreams. This stage is said to consolidate memory and restore mental clarity. </p>
    <p><strong>SWS</strong>, or <i>Slow Wave Sleep</i>, is a sleep stage which repairs the body and performs immunal and hormonal functions. When woken up at this stage, a person is said to be in zombiemode. </p>
    <p><strong>NREM </strong> is used to describe non-REM sleep. Both SWS and light sleep are considered NREM sleep stages.</p>
    <p><strong>LNREM </strong> is used to describe light non-REM sleep. Polyphasic sleepers consider this to be a useless intermediate sleep stage, which can be reduced by sleeping in more frequent, well-timed blocks. More LNREM than REM and SWS sleep is indicative of poorer sleep quality. </p>
    <p><strong> Zombiemode </strong> is a term that describes the very fatigued state one is in when they are woken up from SWS. </p>
    <p><strong> Core </strong> refers to a block of sleep that is at least 30 minutes long. </p>
    <p><strong> Nap </strong> is a block of sleep that is under 30 minutes long. Even under sleep deprivation, short naps nromally produce remarkable recuperative effects, disproportionate to their duration. </p>
    <p><strong> Sleep pressure </strong> refers to how much the body needs sleep, and is characterized by which stage of sleep is most needed. High REM sleep pressure means the person feels mentally fatigued and will dream as soon as they fall asleep. High SWS sleep pressure means the person is physically fatigued and can fall into deep sleep without necessarily feeling mentally fatigued. </p>
    <p><b>Sleep intertia</b>, also known as <b>zombie mode</b> is the phenomenom of impaired alertness usually experienced upon awakening from sleep. It normally dissipates 15 minutes after awakening, and can be indicative of waking up from SWS.
    <!-- from Why We Nap, Claudio Stampi, page 12 -->
    <p>A <b>Zeitgeber</b> is any external or environmental cue that entrains or synchronizes an organism's biological rhythms to the Earth's 24-hour light/dark cycle and 12 month cycle.</p> <!-- Minors and Waterhouse 1981a -->
	</div>  <!-- end stages-->
</div> <!-- end row with term and stages -->
		</div>  <!-- end main -->
<!--</div> --> <!-- end main_container -->

<!-- Chatbox 
<h3 id = "login_text"> Log in to chat </h3>
<img src="./Chat/chatbox.png" alt="chatbox" id="chatbox">

  <div class="footer" id="demo">
    created 10/9/2015
    &copy; Polyphasic.xyz - Kayne Khoury, Juanito Taveras
  </div> -->
</body>
</html>

