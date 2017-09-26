<?php
$file_name = $_GET["file"];
if ($_GET["image"])
    $image_name = $_GET["image"];

$json_file = 'uploads/'.preg_replace("/\.[^.]+$/", "", $file_name).'.json';

$data = file_get_contents ($json_file);
$json = json_decode($data, true);

?>
<!DOCTYPE html>
<!--[if IE 7]><html class="no-js ie7 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
    <head>
        <meta charset="utf-8"> 
        
        <!-- TITLE OF SITE -->
        <title> Resume </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Materialize portfolio one page template, Using for personal website." />
        <meta name="keywords" content="cv, resume, portfolio, materialize, onepage, personal, blog" />
        <meta name="author" content="Siful Islam, DeviserWeb">
        
        <!-- FAVICON -->
        <link rel="icon" href="images/favicon.ico"> 

        
        <!-- GOOGLE FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:500,300,400' rel='stylesheet' type='text/css'>
        
        <!-- FRAMEWORK CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
        <!--<link rel="stylesheet" href="css/lightbox.css">-->
        
        <!-- FONT ICONS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        
        <!-- ADDITIONAL CSS -->
         <link rel="stylesheet" href="assets/css/timeline.css">
         <link rel="stylesheet" href="assets/css/animate.css">
         <link rel="stylesheet" href="assets/css/nav.css">
         <link rel="stylesheet" href="assets/css/jquery.fancybox.css">
        
        <!--   COUSTOM CSS link  -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!--   COLOUR  -->
        <link rel="stylesheet" href="assets/css/color/lime.css" title="lime">
        <link rel="stylesheet" href="assets/css/color/red.css" title="red">
        <link rel="stylesheet" href="assets/css/color/green.css" title="green">
        <link rel="stylesheet" href="assets/css/color/purple.css" title="purple">
        <link rel="stylesheet" href="assets/css/color/orange.css" title="orange">
        
        <!-- STYLE SWITCH STYLESHEET ONLY FOR DEMO -->
        <link rel="stylesheet" href="assets/css/demo.css">
    </head>
    <body>
        <!-- =========================================
                           HEADER TOP   
        ==========================================-->
        <header id="header-top"> <!--Start: "Header Area"-->
            <div class="container">
                <div class="row">
                    <div class="top-contact col m12 s12 right">
                        <span><i class="fa fa-envelope"></i> <a href="mailto:"><?php echo implode($json["basics"]["email"]) ?></a></span>
                        <span><i class="fa fa-phone"></i> <a href="tel:">+<?php echo implode($json["basics"]["phone"]) ?></a></span> 
                    </div>  
                </div>
            </div>
            
            <!-- =========================================
                           NAVIGATION   
            ==========================================-->
            <div id="header-bottom" class="z-depth-1"> <!--Start: "Header Area"-->
                <div id="sticky-nav">
                    <div class="container">
                        <div class="row">
                            <nav class="nav-wrap"> 
                                <ul class="hide-on-med-and-down group"  id="example-one">
                                    <li class="current_page_item"><a href="#header-top">Home</a></li>
                                    <li><a href="#about">About</a></li>                                
                                    <li><a href="#skills">Skills</a></li>                                
                                    <li><a href="#works">Works</a></li>                                
                                    <li><a href="#portfolio">Portolio</a></li>                                
                                    <li><a href="#education">Education</a></li>
                                    <li><a href="#contact-form">Contact</a></li>
                                </ul>
                                <ul class="side-nav" id="slide-out">
                                    <li><a href="#header-bottom" class="active">Home</a></li>
                                    <li><a href="#about">About</a></li>                                
                                    <li><a href="#skills">Skills</a></li>                                
                                    <li><a href="#works">Works</a></li>                                
                                    <li><a href="#portfolio">Portolio</a></li>                                
                                    <li><a href="#education">Education</a></li>
                                    <li><a href="#contact-form">Contact</a></li>
                                </ul>
                                <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> <!--End: Header Area-->
        </header> <!--End: Header Area-->
        
        <!-- =========================================
                        ABOUT   
        ==========================================-->
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="intro z-depth-1 col m12">
                        <div class="col m12 s12">
                            <div class="profile-pic wow fadeIn a1" data-wow-delay="0.1s" >
                                <img src=<?php echo 'uploads/'.$image_name ?> alt="">
                            </div>
                        </div>
                        <div class="col m12 s12 co-centered wow fadeIn a2" data-wow-delay="0.2s">
                            <div class="intro-content col m10 s12">
                                <h2><?php echo ($json["basics"]["name"]["firstName"]) ?> <?php echo ($json["basics"]["name"]["surname"]) ?></h2>
                                <span> <?php echo $json["basics"]["title"] ?></span>
                                <span> <?php echo "<br>", implode($json["basics"]["address"]) ?></span>
                                <p>Hello everyone, My name is <?php echo ($json["basics"]["name"]["firstName"]) ?> <?php echo ($json["basics"]["name"]["surname"]) ?>
                                   <?php 
                                   for ($x = 0; $x <= sizeof($json["summary"]); $x++) {
                                        echo implode($json["summary"][$x]);
                                    }  ?> </p>
                                <a href="#" class="btn waves-effect">Download CV</a>
                                <a href="#contact-form" class="btn btn-success waves-effect">Contact Me</a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </section>
        
        <!-- =========================================
                           SKILLS   
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>Skills</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3>Professional Skills </h3>
                                    
                                    <?php
                                    for ($x=0; $x<sizeof($json["skills"][0]); $x++){
                                        if ($json["skills"][0][$x] != ''){
                                    echo  "<span>", $json["skills"][0][$x], "</span>";  
                                    echo "<div class='progress'>
                                        <div class='determinate'> 70% </div>
                                    </div>" ;
                                        }
                                    };
                                    ?>                                  
                                    
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>Personal Skills </h3>
                                    <?php
                                    for ($x=0; $x<sizeof($json["skills"][1]); $x++){
                                    if ($json["skills"][1][$x] != ''){
                                    echo  "<span>", $json["skills"][1][$x], "</span>";  
                                    echo "<div class='progress'>
                                        <div class='determinate'> 70% </div>
                                    </div>" ;
                                    }
                                    };
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- ========================================
                WORKS EXPERIENCE  
        ==========================================-->
        
        <section id="works">
            <div class="container">
                <div class="row">
                    <div class="section-title">
                        <h2> <i class="fa fa-suitcase"> </i>Work Experience</h2>
                    </div>
                    <div id="cd-timeline" class="cd-container">
                        <?php
                            for ($x=0; $x<sizeof($json["work_experience"]); $x++){
                                if($json["work_experience"][$x]["date_start"] != '')
                                    echo  "<div class='cd-timeline-block wow fadeIn a",$x+2,"'"," data-wow-delay='0.",$x+2,"'s>
                			<div class='cd-timeline-img'>
                			</div> <!-- cd-timeline-img -->
                			<div class='cd-timeline-content col m5 s12 z-depth-1'>
                				<a href=''><h2>",($json["work_experience"][$x]["jobtitle"]),"</h2></a>
                				<span> ",($json["work_experience"][$x]["date_start"]),"</span> TO
                                <span> ",($json["work_experience"][$x]["date_end"]),"</span>
                                <p> ",($json["work_experience"][$x]["organization"]),".</p>
                                <p> ",($json["work_experience"][$x]["jobtitle"]),".</p>
                				<p> ",($json["work_experience"][$x]["text"]),".</p>
                			</div> <!-- cd-timeline-content -->
                		</div> <!-- cd-timeline-block --> ";
                                    };
                                    ?> 
                	</div>	
                </div>
            </div>
        </section>
          <!-- =========================================
                           INTERSET AND HOBBIES
        ==========================================-->
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-gears"></i>INTEREST AND HOBBIES</h2>
                    </div>
                    <div class="skill-line z-depth-1">
                        <div class="row">
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a1"  data-wow-delay="0.1s">
                                    <h3> Interest</h3>
                                    
                                    <?php
                                    for ($x=0; $x<sizeof($json["misc"][0]); $x++){
                                        if ($json["misc"][0][$x] != '')
                                         echo  "<span>", $json["misc"][0][$x], "</span><br>";
                                        

                                    };
                                    ?>                                  
                                    
                                </div>
                            </div>
                            <div class="col m6 s12">
                                <div class="col m2 skill-icon">
                                    <i class="fa fa-calendar-o"></i>
                                </div>
                                <div class="skill-bar col m10 wow fadeIn a2" data-wow-delay="0.2s">
                                    <h3>Hobbies </h3>
                                    <?php
                                    for ($x=0; $x<sizeof($json["misc"][1]); $x++){
                                        if ($json["misc"][1][$x] != '')
                                         echo  "<span>", $json["misc"][1][$x], "</span><br>";
                                        

                                    };
                                    ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      
        <!-- =========================================
                EDUCATION  
        ==========================================-->
        <section id="education">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-graduation-cap"></i>Education</h2>
                    </div>
                    
                    <div class="cd-container" id="ed-timeline">
                         <?php
                            for ($x=0; $x<sizeof($json["education"]); $x++){
                                if($json["education"][$x]["date_start"] != '')
                                    echo  "<div class='cd-timeline-block wow fadeIn a",$x+2,"'"," data-wow-delay='0.",$x+2,"'s>
                			<div class='cd-timeline-img'>
                			</div> <!-- cd-timeline-img -->
                			<div class='cd-timeline-content col m5 s12 z-depth-1'>
                				<span> ",($json["education"][$x]["date_start"]),"</span> TO
                                <span> ",($json["education"][$x]["date_end"]),"</span>
                                <p> ",($json["education"][$x]["organization"]),".</p>
                                <p> ",($json["education"][$x]["edutitle"]),".</p>
                				<p> ",($json["education"][$x]["text"]),".</p>
                			</div> <!-- cd-timeline-content -->
                		</div> <!-- cd-timeline-block --> ";
                                    };
                                    ?> 
                		
                    
                </div>
            </div>
        </section>

        <!-- =========================================
                CONTACT  
        ==========================================-->
        <section id="contact-form">
            <div class="container">
                <div class="row">
                    <div class="section-title wow fadeIn a1" data-wow-delay="0.1s">
                        <h2> <i class="fa fa-send"></i>Contact</h2>
                    </div>
                    <div class="contact-form z-depth-1" id="contact">   
                        <div class="row">                                   
                            <form id="contactForm" data-toggle="validator">
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="input-field col m6 s12 wow fadeIn a2" data-wow-delay="0.2s">
                                    <label for="name" class="h4">Full Name *</label>
                                    <input type="text" class="form-control validate" id="name" required data-error="NEW ERROR MESSAGE">
                                </div>
                                <div class="input-field col m6 s12 wow fadeIn a4" data-wow-delay="0.4s">
                                    <label for="email" class="h4">Email *</label>
                                    <input type="email" class="form-control validate" id="email"  required>                
                                </div>
                                <div class="input-field col m6 s12 wow fadeIn a3" data-wow-delay="0.3s">
                                    <label for="last_name" class="h4">Subject *</label>
                                    <input type="text" class="form-control validate" id="last_name" required>
                                </div> 
                                <div class="input-field col m6 s12 wow fadeIn a5" data-wow-delay="0.5s" >
                                    <select>
                                      <option value="">Choose your Budget</option>
                                      <option value="1">$10000-$20000</option>
                                      <option value="2">$50000-$100000</option>
                                      <option value="3">$50000-$1000000</option>
                                    </select>
                                </div>
                                <div class="input-field col m12 s12 wow fadeIn a6" data-wow-delay="0.6s">
                                    <label for="message" class="h4 ">Message *</label>
                                    <textarea id="message" class="form-control materialize-textarea validate" required></textarea>           
                                </div>
                                <button type="submit" id="form-submit" class="btn btn-success waves-effect wow fadeIn a7" data-wow-delay="0.7s">Submit</button>
                                                             
                            </form>                                     
                        </div> 
                    </div>
                    
                    <!-- =========================================
                            INTEREST  
                    ==========================================-->
                    
                    <div class="interests col s12 m12 l12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row">
                            <ul class="z-depth-1"> <!-- interetsr icon start -->
                                <li><i class="fa fa-facebook-official tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Facebook"></i></li>
                                <li><i class="fa fa-twitter tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Twitter"></i></li>
                                <li><i class="fa fa-linkedin tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="linkedin"></i></li>
                                <li><i class="fa fa-whatsapp tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Whatsapp"></i></li>
                                <li><i class="fa fa-youtube tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Youtube"></i></li>
                                <li><i class="fa fa-vimeo tooltipped col m2 s6" data-position="top" data-delay="50" data-tooltip="Vimeo"></i></li>
                            </ul> <!-- interetsr icon end -->
                        </div>
                    </div>  
                </div>
            </div> 
        </section>
		
        <!-- SCRIPTS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js'></script>
    <script src="https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>  
    <script src="assets/js/masonry.pkgd.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="assets/js/validator.min.js"></script>
    <script src="assets/js/modernizr.js"></script>
    <script src="assets/js/jquery.sticky.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <!-- wow js-->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/init.js"></script>
    
        <!-- =========================================================
            STYLE SWITCHER | ONLY FOR DEMO NOT INCLUDED IN MAIN FILES
        ===========================================================-->
        
        <!-- Style switter js -->
        <script src="assets/js/styleswitcher.js"></script>
        
        <div class="cv-style-switch" id="switch-style">
            <a id="toggle-switcher" class="switch-button icon_tools"> <i class="fa fa-cogs"></i></a>
            <div class="switched-options">                
                <div class="config-title">
                    Colors :
                </div>
                <ul class="styles">
                    <li><a href="index.html#" onclick="setActiveStyleSheet('red'); return false;" title="Red">
                    <div class="red"></div>
                    </a></li>                    
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('purple'); return false;" title="purple">
                    <div class="purple"></div>
                    </a></li>

                    <li><a href="index.html#" onclick="setActiveStyleSheet('orange'); return false;" title="orange">
                    <div class="orange"></div>
                    </a></li>
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('green'); return false;" title="green">
                    <div class="green"></div>
                    </a></li>
                    
                    <li><a href="index.html#" onclick="setActiveStyleSheet('lime'); return false;" title="lime">
                    <div class="lime"></div>
                    </a></li>

                    <li class="p">
                        ( NOTE: Pre Defined Colors. You can change colors very easily )
                    </li>
                </ul>
            </div>
        </div>
    </body>
</html>
