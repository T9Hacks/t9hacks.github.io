for(var i=0; i<slideshow.length; i++) {

	var group = slideshow[i];
	var desc = group.desc;
	var alt = group.alt;
	var folder_ext = group.folder;

	for(var j=0; j<group.images.length; j++) {
		var image = group.images[j];
		var img_src = "images/sp16_hackathon/" + folder_ext + "/" + image;

		var slide = $("<div>", {class: "slideshow_slide"})
			.append(
				$("<img>", {
					class: 'slideshow_img',
					src: img_src,
					alt: alt
				})
			)
			.append(
				$("<div>", {
					class: "slideshow_desc"
				})
				.append(
					$("<span>" + desc + "</span>")
				)
			);
		$("#slideshow_start").append(slide);

	}
}
