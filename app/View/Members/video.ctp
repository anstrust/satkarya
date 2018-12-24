<body onload="myNewSrc()">
<h1 style="margin-top:70px;"><?php echo $info['Video']['title'];?></h1>
    <div id="section-title" >
	
	
        <video preload="auto" onended="myAddListener()" autoplay controls width="480" height="360" title="" poster="https://placehold.it/350x150">
        <source src="" type="video/mp4">
        </video>
    </div>
</body>

<script type="text/javascript">

//array of video source files you will be looping through
var videoSources = ["<?php echo HTTP_ROOT.'files/'.$info['Video']['video']; ?>", ];

          var currentIndex = 0;
    // listener function changes src
          function myNewSrc() {
              var myVideo = document.getElementsByTagName('video')[0];
              myVideo.src = videoSources[currentIndex];
              myVideo.load();
          }


    // add a listener function to the ended event
          function myAddListener(){
              var myVideo = document.getElementsByTagName('video')[0];
              currentIndex = (currentIndex+1) % videoSources.length;
              myVideo.src = videoSources[currentIndex];
              myVideo.addEventListener('ended', myNewSrc, false);

          }

</script>
