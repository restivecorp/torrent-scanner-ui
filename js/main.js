 $(document).ready(function () {

 	$(".ts-sidebar-menu li a").each(function () {
 		if ($(this).next().length > 0) {
 			$(this).addClass("parent");
 		};
 	})
 	var menux = $('.ts-sidebar-menu li a.parent');
 	$('<div class="more"><i class="fa fa-angle-down"></i></div>').insertBefore(menux);
 	$('.more').click(function () {
 		$(this).parent('li').toggleClass('open');
 	});
	$('.parent').click(function (e) {
		e.preventDefault();
 		$(this).parent('li').toggleClass('open');
 	});
 	$('.menu-btn').click(function () {
 		$('nav.ts-sidebar').toggleClass('menu-open');
 	});


	 // $('#zctb').DataTable();

	 $('#zctb').dataTable( {
		"pageLength": 100
		} );



	 $("#input-43").fileinput({
		showPreview: false,
		allowedFileExtensions: ["zip", "rar", "gz", "tgz"],
		elErrorContainer: "#errorBlock43"
			// you can configure `msgErrorClass` and `msgInvalidFileExtension` as well
	});

 });

 function validate() {
   url = is_valid_url(document.getElementById("search").value);
   epi = is_valid_episode(document.getElementById("lastepisode").value);

   if (!url) {
     alert("Invalid URL.\nCopy complete URL, of the serie, from torrent web page.");
   }

   if (!epi) {
     alert("Incorrect episode format.\nMust be formatted as pattern [s]x[n][n] :: 1x01 or 2x30 or 11x19");
   }

   return url && epi;
 }

 function is_valid_url(str) {
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
    return regexp.test(str);
 }

 function is_valid_episode(str) {
    var regexp = /\dx\d/g;
    return regexp.test(str);
 }
