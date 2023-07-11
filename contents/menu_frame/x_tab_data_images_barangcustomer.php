<style>
	* {
		box-sizing: border-box
	}

	body {
		margin: 0
	}

	.mySlides {
	display: flex; 
	align-items: center;
  	justify-content: center;
	padding-bottom: 15px;
	padding-top: 20px;
	}

	img {
		vertical-align: middle;
	}

	/* Slideshow container */
	.slideshow-container {
		max-width: 1000px;
		position: relative;
		margin: auto;
	}

	/* Next & previous buttons */
	.prev,
	.next {
		cursor: pointer;
		position: absolute;
		top: 50%;
		width: auto;
		padding: 16px;
		margin-top: -22px;
		color: white;
		font-weight: bold;
		font-size: 18px;
		transition: 0.6s ease;
		border-radius: 0 3px 3px 0;
		user-select: none;
	}

	/* Position the "next button" to the right */
	.next {
		right: 0;
		border-radius: 3px 0 0 3px;
	}

	/* On hover, add a black background color with a little bit see-through */
	.prev:hover,
	.next:hover {
		background-color: rgba(0, 0, 0, 0.8);
	}

	/* Caption text */
	.text {
		color: #f2f2f2;
		font-size: 15px;
		padding: 8px 12px;
		position: absolute;
		bottom: 8px;
		width: 100%;
		text-align: center;
	}

	/* Number text (1/3 etc) */
	.numbertext {
		color: #f2f2f2;
		font-size: 12px;
		padding: 8px 12px;
		position: absolute;
		top: 0;
	}

	/* The dots/bullets/indicators */
	.dot {
		cursor: pointer;
		height: 50px;
		width: 50px;
		margin: 0 2px;
		/*background-color: #bbb;*/
		/*border-radius: 50%;*/
		display: inline-block;
		align-items: center;
  		justify-content: center;
		transition: background-color 0.6s ease;
	}

	.active,
	.dot:hover {
		background-color: #717171;
	}



	/* On smaller screens, decrease text size */
	@media only screen and (max-width: 300px) {

		.prev,
		.next,
		.text {}
	}
</style>


<div id="tabimages" style="position:absolute;top:35px;right:100px;">
	<div class="slideshow-container">
		<?php
		if ($edit["mode"] != "add" && count($arr_images) > 0) {
			for ($counter_images = 0; $counter_images < count($arr_images); $counter_images++) { ?>
				<div class="mySlides">
					<img src="<?= $arr_images[$counter_images]; ?>" onclick="popup('<?= $arr_images[$counter_images]; ?>')" style="width:100%;height:180px;">
					<div class="text"></div>
				</div>
			<?php } ?>

		<?php }
		?>
	</div>
	<div style="text-align:center">
		<span><a id="button_prev" onclick="prevCarousel()" style="font-size:24px;font-weight: bold">&lt;</a></span>
		<?php for ($counter_images = 0; $counter_images < count($arr_images); $counter_images++) { ?>
			<span id="dot_<?= $counter_images + 1; ?>" class="dot" onclick="currentSlide(<?= $counter_images + 1 ?>)"><img src="<?= $arr_images[$counter_images]; ?>" style="width:100%;height:100%;"></span>
		<?php } ?>
		<span><a id="button_next" onclick="nextCarousel()" style="font-size:24px;font-weight: bold">&gt;</a></span>
	</div>
</div>

<script>
	$(document).ready(function() {
		$("#tabimages").prependTo("#tab_i1_data");
		$(".dot").hover(function() {
			var temp = $(this).attr('id');
			var index = temp.slice(-1);
			slideIndex = index;
			showSlides(index);
		})
		startCarousel();
		hideButton();
	});

	let slideIndex = 1;
	let carrouseLIndex = 0;
	let arraylength = <?= count($arr_images) ?>;
	showSlides(slideIndex);

	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function prevCarousel() {
		carrouseLIndex--;
		let dots = document.getElementsByClassName("dot");
		for (i = 0; i < arraylength; i++) {
			dots[i].style.display = "none";
		}
		for (i = 0; i < 3; i++) {
			dots[carrouseLIndex + i].style.display = "inline-block";
		}
		hideButton();
	}

	function nextCarousel() {
		carrouseLIndex++;
		let dots = document.getElementsByClassName("dot");
		for (i = 0; i < arraylength; i++) {
			dots[i].style.display = "none";
		}
		for (i = 0; i < 3; i++) {
			dots[carrouseLIndex + i].style.display = "inline-block";
		}
		hideButton();
	}

	function startCarousel() {
		let dots = document.getElementsByClassName("dot");
		for (i = 0; i < arraylength; i++) {
			dots[i].style.display = "none";
		}

		for (i = 0; i < 3; i++) {

			if (dots[i] == undefined) {} else {
				dots[i].style.display = "inline-block";
			}
		}
	}

	function hideButton() {
		let prev_button = document.getElementById("button_prev");
		let next_button = document.getElementById("button_next");
		if (carrouseLIndex < 1) {
			// prev_button.style.display = "none";
			prev_button.onclick = function() {
				dummyFunction();
			};
		} else {
			// prev_button.style.display = "inline-block";
			prev_button.onclick = function() {
				prevCarousel();
			};
		}
		console.log(carrouseLIndex);
		if (carrouseLIndex > arraylength - 4) {
			next_button.onclick = function() {
				dummyFunction();
			};
		} else {
			next_button.onclick = function() {
				nextCarousel();
			};
		}
	}

	function showSlides(n) {
		let i;
		let slides = document.getElementsByClassName("mySlides");
		let dots = document.getElementsByClassName("dot");
		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
	}

	function dummyFunction() {
		return false;
	}

	function popup(nama) {
		var temp = nama.split("/");
		var namafile = temp[temp.length - 1];
		// alert(namafile);
	}
</script>