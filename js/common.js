

/*
 * 		Load All Javascript		
 */
 
// Create list of js files to load
var jslibraries = [
	"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"					/// jquery
];

// Only load these files on screen and not mobile
/* /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) */
if( window.innerWidth > 1024 ) {
	//console.log("non mobile");
	jslibraries.push(
		"http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js",	/// easing - for nagivation
		"plugins/agency/js/agency.js",
		
		//"https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.12/p5.min.js",				/// p5
		//"https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.12/addons/p5.dom.min.js",		/// p5 DOM
		//"js/p5_fall_2017.js",															/// T9Hacks p5 js
	);
}

/* Load the files dynamically
 * Source for these scripts: http://www.javasqript.com/2016/02/dynamically-loading-javascript-files.html
 */

// loadScript - Loads a single Javascript file into the browser
// Arguments:
//    url - the address of the script file
//    callback - called when the script has been loaded
var loadScript = (function(url, callback) {
	if (callback == null) { callback = function() {}; }
	var head = document.getElementsByTagName("head")[0];
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.addEventListener("load", function() {
		script.onLoad = null;
		callback(script);
	});
	script.onLoad = function () {};
	script.src = url;
	head.appendChild(script);
});

// loadScriptsSeq - Loads multiple scripts into the browser, in sequence
// Arguments:
//    urls - an array of addresses for the script files to load, in required order of execution
//    callback - a function called when all the scripts have been loaded
var loadScriptsSeq = (function(urls, callback) {
	if (callback == null) { callback = function() {}; }
	return (function iLoadScripts(urls, index, callback) {
		loadScript(urls[index], function() {
			if (index == urls.length - 1) { callback(); }
			else { iLoadScripts(urls, index + 1, callback); }
		});
	}(urls, 0, callback));
});

// loadScriptsPar - Loads multiple script files into the browser, in parallel
// Arguments:
//    url - an array of addresses for the script files to load
//    callback - a function called when all the scripts have been loaded
var loadScriptsPar = (function(urls, callback) {
   if (callback == null) { callback = function() {}; }
   var count = 0;
   urls.forEach(function(url) {
      loadScript(url, function() {
         count++;
         if (count == urls.length) {
            callback();
         }
      });
   });
});

// Call to load the js files
loadScriptsSeq(jslibraries, function() {});

/*
 * End of loading javascript
 */
 
 
 
 
 /* 
  * GOOGLE ANALYTICS
  */
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-37395837-5', 'auto');
ga('send', 'pageview');
/* 
 * END GOOGLE ANALYTICS
 */