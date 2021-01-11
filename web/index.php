<?php
  require_once("config.php");

  $searchandfindonly = false;
  if(isset($_GET['only']) && $_GET['only'] != "" && $_GET['only'] == 'true') {
  	$searchandfindonly = true;
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>AndroidActivities</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="ApplicationReader">
<meta name="author" content="Crazy Marvin">
<link rel="shortcut icon" type="image/x-icon" href="https://poopjournal.rocks/ApplicationReader/style/images/favicon.png" />
<link href="style/css/bootstrap.css" rel="stylesheet">
<link href="style/css/settings.css" rel="stylesheet">
<link href="style/js/google-code-prettify/prettify.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="style/css/color/gray.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href="style/type/fontello.css" rel="stylesheet">
<script defer src="https://pro.fontawesome.com/releases/v5.7.2/js/all.js" integrity="sha384-I3Hhe9TkmlsxzooTtbRzdeLbmkFQE9DVzX/19uTZfHk1zn/uWUyk+a+GyrHyseSq" crossorigin="anonymous"></script>
<script src="https://instant.page/5.1.0" type="module" integrity="sha384-by67kQnR+pyfy8yWP4kPO12fHKRLHZPfEsiSXR8u2IKcTdxD805MGUXBzVPnkLHw"></script>
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if lt IE 9]>
<script src="style/js/html5shiv.js"></script>
<![endif]-->
<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://poopjournal.rocks/piwik/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '24']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
</head>
<body data-spy="scroll" data-target=".nav-collapse" data-offset="100">
<div class="body-wrapper">
  <section id="lightbox" class="dark-wrapper">
    <div class="section-head">
      <div class="container">
        <h1>Search and find</h1>
      </div>
      <!-- /.container --> 
    </div>
    <!-- /.section-head -->
    <div class="container lightbox-wrapper">
      <div class="inner">
	<div class="alert alert-success" id="copyplace"></div>
      	
      	<div class="row">
        		<div class="span6">
	        		<div class="alert alert-success" id="packagenames"></div>
	        	</div>
        		<div class="span6">
	        		<div class="alert alert-success" id="componentinfos"></div>
	        	</div>
	 </div>
	 <fieldset>
         	 	<button type="button" style="float:right;height:50px;" class="btn" id="searchbutton" onclick="search()">Search</button>
            		<div style="overflow: hidden; padding-right: .5em;">
                		<input type="text" id="searchterm" name="seachterm" placeholder="Search for apps...">
             		</div>
                <div id="circularG"  style="margin-left:auto; margin-right:auto">
                  <div id="circularG_1" class="circularG">
                  </div>
                  <div id="circularG_2" class="circularG">
                  </div>
                  <div id="circularG_3" class="circularG">
                  </div>
                  <div id="circularG_4" class="circularG">
                  </div>
                  <div id="circularG_5" class="circularG">
                  </div>
                  <div id="circularG_6" class="circularG">
                  </div>
                  <div id="circularG_7" class="circularG">
                  </div>
                  <div id="circularG_8" class="circularG">
                  </div>
                </div>
	 </fieldset>
        <!-- /.filter -->
        
        <ul id="applicationlist" class="items thumbs" style="height:auto!important;">
        </ul>
        <!--/.items--> 
      </div>
      <!--/.inner--> 
    </div>
    <!--/.container--> 
  </section>
  <!--/#lightbox-->
  
  <footer class="light-wrapper text-center">
    <div class="container inner">
      <p>© 2019 Mike Penz & Crazy Marvin. All rights reserved. Theme by elemis.</p>
      <ul class="social gray">
      	<li><a target="_blank" href="https://poopjournal.rocks/ApplicationReader/legal/tos.html"><i class="fal fa-balance-scale"></i></a></li> <!-- Terms of Service -->
      	<li><a target="_blank" href="https://poopjournal.rocks/ApplicationReader/legal/pp.html"><i class="fal fa-user-secret"></i></a></li> <!-- Privacy Policy -->
      	<li><a target="_blank" href="https://mikepenz.com/"><i class="fas fa-home-heart"></i></a></li> <!-- Mike Penz' homepage -->
        <li><a target="_blank" href="https://twitter.com/mike_penz"><i class="fab fa-twitter-square"></i></a></li>
        <li><a target="_blank" href="https://www.facebook.com/mikepenz"><i class="fab fa-facebook-square"></i></a></li>
        <li><a target="_blank" href="https://github.com/mikepenz"><i class="fab fa-github-square"></i></a></li>
      </ul>
      <!-- /.social --> 
    </div>
    <!-- /.container -->
  </footer>
  <!-- /footer -->
</div>
<!--/.body-wrapper--> 
<script src="style/js/jquery.js"></script> 
<script src="style/js/bootstrap.min.js"></script> 
<script src="style/js/twitter-bootstrap-hover-dropdown.min.js"></script> 
<script src="style/js/jquery.themepunch.plugins.min.js"></script> 
<script src="style/js/jquery.themepunch.revolution.min.js"></script> 
<script src="style/js/jquery.fitvids.js"></script> 
<script src="style/js/jquery.slickforms.js"></script> 
<script src="style/js/jquery.isotope.min.js"></script> 
<script src="style/js/google-code-prettify/prettify.js"></script> 
<script src="style/js/jquery.easytabs.min.js"></script>
<script src="style/js/jquery.zclip.min.js"></script>
<script src="style/js/view.min.js?auto"></script> 
<script src="style/js/scripts.js"></script>
    <script type="text/javascript">
              var searching = false;

              function getPackageesCount() {
              	$.ajax({
			type: "GET",
			url: "api/count/index.php?p=true",
			beforeSend: function (){
				$("#packagenames").slideUp("slow");
			}
		}).done(function( msg ) {
			$("#packagenames").html("<strong>PackageNames:</strong> " + msg);
			$("#packagenames").slideDown("slow");
			setTimeout(getPackageesCount, 300000);
		});
              }

	 function getComponentInfoCount() {
              	$.ajax({
			type: "GET",
			url: "api/count/index.php?c=true",
			beforeSend: function (){
				$("#componentinfos").slideUp("slow");
			}
		}).done(function( msg ) {
			$("#componentinfos").html("<strong>ComponentInfos:</strong> " + msg);
			$("#componentinfos").slideDown("slow");
			setTimeout(getComponentInfoCount, 300000);
		});
              }

              function search() {
                  if (!searching) {
                      searching = true;

                      var searchterm = $("#searchterm").val();

                      if (searchterm == "") {
                          searchterm = "%";
                      }

                      $("#applicationlist").animate({
                          opacity: "hide"
                      }, "slow");

                      $("#circularG").slideDown("slow");

                      $.getJSON("api/get/index.php?q=" + searchterm + "&l=24&i=true&o=new", function(data) {
                          $("#circularG").slideUp("slow");
                          $("#applicationlist").html("");
                          $.each(data, function(index, value) {
                              var applicationInfo = value;
                              $.each(value['component_infos'], function(index_ci, value_ci) {
                                  var iconurl = applicationInfo['url'];
                                  if (iconurl == null || iconurl == "") {
                                      iconurl = "https://placehold.it/430x430/9c27b0/FFFFFF&text=" + applicationInfo['app_name'].replace(" ", "%20");
                                  }

                                  //onClick="maximizeClicked( $(this) )"
                                  $("#applicationlist").append('<li class="item thumb branding" style="background:#E4E4E4" > <a oncontextmenu="maximizeClicked($(this))"><div class="overlay"><div class="info"><h4 style="cursor:pointer;" onClick="loadLink($(this))" packagename="' + applicationInfo["package_name"] + '">' + applicationInfo['app_name'] + '</h4><span><p>Packagename:<input onClick="copyHelper($(this))" id="inputpackagename" style="margin-bottom:0px !important;height:40px !important;padding:2px 5px !important;" type="text" value="' + applicationInfo['package_name'] + '" />ComponentInfo:<input onClick="copyHelper($(this))"  id="inputcomponentinfo" style="margin-bottom:0px !important;height:40px !important;padding:2px 5px !important;" type="text" value="' + value_ci['component_info'] + '" />IconUrl:<input onClick="copyHelper($(this))"  id="inputiconurl" style="margin-bottom:0px !important;height:40px !important;padding:2px 5px !important;" type="text" value="' + iconurl + '" /></p></span></div></div><img src="' + iconurl + '" alt="" /></a></li>');
                              });
                          });

                          if (data.length == 0) {
                              $("#applicationlist").append('<li class="item thumb branding" style="background:#E4E4E4"> <a target="_blank" href="https://play.google.com/store/search?q=' + searchterm + '"><div class="overlay"><div class="info"><span><i style="font-size:230px;text-align: center;vertical-align: middle;width:100%;" class="icon-search"></i></span></div></div><img src="http://placehold.it/430x430/9c27b0/FFFFFF&text=Nothing%20found" alt="" /></a></li>');
                          }

                          $("#applicationlist").animate({
                              opacity: "show"
                          }, "slow");

                          searching = false;
                      });
                  }
              }

              function copyHelper(clickedElement) {
              	$('#copyplace').slideDown("slow");
              	$('#copyplace').attr("content", clickedElement.val());
              	$('#copyplace').html("Click here to copy: " + clickedElement.val());
              }

              function hideCopyHelper() {
              	$('#copyplace').slideUp("slow");
              }

              function maximizeClicked( clickedElement ) {
                    var clickedParent = clickedElement.parent();
                    if(clickedParent.height() == 580) {
                      clickedParent.animate({height:285, width:285},"slow", function() {
                      });
                    } else {
                       clickedParent.animate({height:580, width:580},"slow", function() {
                      });
                    }
              }

              function loadLink(clickedElement) {
                window.open("https://play.google.com/store/apps/details?id=" + clickedElement.attr("packagename"),'_newtab')
              }


    	$(document).ready(function() {
    		$('#copyplace').zclip({
    			path: 'https://poopjournal.rocks/ApplicationReader/style/swf/ZeroClipboard.swf',
    			copy: function(){
    				return $(this).attr("content");
    			},
    			afterCopy: function(){
    				$('#copyplace').html("COPIED!");
				setTimeout(hideCopyHelper, 10000);
    			}
    		});

    		$(document).on('keypress', function(e){
		    if (e.which == 13) {
		        e.preventDefault();
		        search();
		    }
		});
    		
              	hideCopyHelper();
              	getPackageesCount();
              	getComponentInfoCount();
              	
              	search();
        	});
    </script>
</body>
</html>