<?php 
function js($up = false) {
	$p = ($up) ? "../" : "";
?>
<!-- jQuery -->
<script src="<?php echo $p; ?>js/jquery-1.11.3.min.js" type="text/javascript"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $p; ?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Plugin JavaScript -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script src="<?php echo $p; ?>plugins/agency/js/cbpAnimatedHeader.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo $p; ?>plugins/agency/js/agency.js"></script>


<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-37395837-5', 'auto');
  ga('send', 'pageview');
</script>


<!-- Facebook Share Button -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1734809350067997";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php }?>