<html>
  <head>
    <title>Video Player - {{{$videoId}}}</title>
    <link href="//vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/4.12/video.js"></script>
  </head>
  <body>
    <video class="video-js vjs-default-skin"
  controls preload="auto" width="640" height="264"
  poster="http://video-js.zencoder.com/oceans-clip.png">
   <source src="http://tmg.pw/raw/{{{$videoId}}}" type='{{{$videoMime}}}' />
   <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
  </video>
  </body>
</html>