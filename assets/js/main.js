(function ($) {
	"use strict";

	// Mobile Menu

	$(".navbar-toggler").on("click", function () {
		$(this).toggleClass("active");
	});

	$(".navbar-nav li a").on("click", function () {
		$(".sub-nav-toggler").removeClass("active");
	});

	var subMenu = $(".navbar-nav .sub-menu");

	if (subMenu.length) {
		subMenu
			.parent("li")
			.children("a")
			.append(function () {
				return '<button class="sub-nav-toggler"> <i class="fa fa-angle-down"></i> </button>';
			});

		var subMenuToggler = $(".navbar-nav .sub-nav-toggler");

		subMenuToggler.on("click", function () {
			$(this).parent().parent().children(".sub-menu").slideToggle();
			return false;
		});
	}

	//Home Page Slide

	$('.homepage-slides').owlCarousel({
		items: 1,
		dots: false,
		nav: true,
		loop: true,
		autoplay: true,
		autoplayTimeout: 5000,
		navText: ["<i class='la la-angle-left'></i>", "<i class='la la-angle-right'></i>"]
	});


	$(".homepage-slides").on("translate.owl.carousel", function () {
		$(".single-slide-item h1").removeClass("animated fadeInUp").css("opacity", "1");
		$(".single-slide-item h5").removeClass("animated fadeInDown").css("opacity", "1");
	});

	$(".homepage-slides").on("translated.owl.carousel", function () {
		$(".single-slide-item h1").addClass("animated fadeInUp").css("opacity", "1");
		$(".single-slide-item h5").addClass("animated fadeInDown").css("opacity", "1");
	});


	//jQuery Sticky Area 
	$('.sticky-area').sticky({
		topSpacing: 0,
	});

	//Progress Bar JS

	$("#bar1").barfiller({
		barColor: "#FFD857",
		duration: 5000,
	});

	$("#bar2").barfiller({
		barColor: "#FFD857",
		duration: 6000,
	});

	$("#bar3").barfiller({
		barColor: "#FFD857",
		duration: 7000,
	});

	$("#bar4").barfiller({
		barColor: "#FFD857",
		duration: 5000,
	});

	$("#bar5").barfiller({
		barColor: "#FFD857",
		duration: 6000,
	});

	$("#bar6").barfiller({
		barColor: "#FFD857",
		duration: 7000,
	});

	//Counter Up

	$(".counter-number span").counterUp({
		delay: 10,
		time: 1000,

	});

	// Testimonial Carousel

	$('.team-carousel').owlCarousel({
		items: 1,
		margin: 30,
		dots: false,
		nav: false,
		loop: true,
		autoplay: true,
		responsiveClass: true,
		responsive: {
			575: {
				items: 1,
				nav: false,
				dots: false,
			},

			767: {
				items: 2,
				nav: false
			},

			990: {
				items: 2,
				loop: true,

			},
			1200: {
				items: 3,
				dots: true,
				loop: true,
			}
		}
	});


	// Logo Carousel 

	$('.logo-carousel').owlCarousel({
		items: 6,
		margin: 30,
		dots: false,
		nav: false,
		loop: true,
		autoplay: true,
	});


	//Isotope Filter

	$('.port-menu li').on('click', function () {
		var selector = $(this).attr('data-filter');

		$('.port-menu li').removeClass("active");

		$(this).addClass("active");

		$(".portfolio-list").isotope({
			filter: selector,
			percentPosition: true,
		});

	});


	//jQuery Animation  
	new WOW().init(

	);


	// SCROLLTO THE TOP

	// Show or hide the sticky footer button



	// Animate the scroll to top
	$('.go-top').on("click", function (event) {
		event.preventDefault();

		$('html, body').animate({
			scrollTop: 0
		}, 1500);
	});


	//Magnific Pop-up

	$('.video-play-btn').magnificPopup({
		type: 'iframe'

	});


	// Active Bacground Color  

	$(".single-testimonial-box").on("mouseover", function () {
		$(".single-testimonial-box").removeClass("active");
		$(this).addClass("active");
	});


	$(".single-service-item").on("mouseover", function () {
		$(".single-service-item").removeClass("active");
		$(this).addClass("active");
	});


	// Menu Active Color 
	
	$(".main-menu .navbar-nav .nav-link").on("click", function () {
		$(".main-menu .navbar-nav .nav-link").removeClass("active");
		$(this).addClass("active");
	});

	jQuery(window).on("load", function () {
		jQuery(".site-preloader-wrap, .slide-preloader-wrap").fadeOut(1000);
	});


	if ($("form[name=donate-form]").length > 0) {
		$("form[name=donate-form]").validate({
			rules: {
				mobile: {
					required: true,
					minlength: 10,
					maxlength: 10,
					digits: true,
				},
				email: {
					required: true,
					minlength: 10,
					maxlength: 100,
					email: true,
				},
				name: {
					required: true,
					minlength: 5,
					maxlength: 100,
				},
				amount: {
					required: true,
					digits: true,
					maxlength: 15,
				}
			},
			errorPlacement: function(error, element) {},
			submitHandler: function (form) {
				$(form).find("button[type=submit]").prop("disabled", true);
				let data = $(form).serialize();
				let options = {
					// live api key
					key: "rzp_live_3ygbpg00SHxl8e",
					secret: "aQXtybZY7Vh2vnxoj2hbtkpI",
					// testing api key
					// key: "rzp_test_Ge1Qs5hnblIosq",
					// secret: "PuPriDW3GdFHdfwQcUuhjH2c",
					amount: form.amount.value * 100, // 2000 paise = INR 20
					description: "HIMMAT DONATION",
					prefill: {
						name: form.name.value,
						contact: form.mobile.value,
						email: form.email.value,
					},
					handler: function (response) {
						data += "&payment_id=" + response.razorpay_payment_id;
						$.ajax({
							url: $('#base_url').val() + "save-donation",
							type: "POST",
							dataType: "json",
							data: data,
							success: function (msg) {
								alert(msg.msg);
								location.reload();
							},
						});
					},
					modal: {
						ondismiss: function () {
							$(form).find("button[type=submit]").prop("disabled", false);
						},
					},
				};
				const rzp1 = new Razorpay(options);
				rzp1.open();
				return;
			}
		});
	}
	/* $("form[name=donate-form]").submit(function(e) {
		e.preventDefault();
		let price = parseInt(this.amount.value);
		if (isNaN(price)) {
			alert("Please enter valid amount.");
			return false;
		}
		let options = {
          live api key
          key: "rzp_live_Jf7dJMbtMe1xSC",
          secret: "7QSfgUjxMW5xWKY3ingxBgWN",
          testing api key
          "key": "rzp_test_Ge1Qs5hnblIosq",
		  "secret": "PuPriDW3GdFHdfwQcUuhjH2c",
          amount: price * 100, // 2000 paise = INR 20
          description: "HIMMAT DONATION",
          prefill: {
            name: response.name,
            contact: response.mobile,
            email: response.email,
          },
          handler: function (response) {
            data += "&payment_id=" + response.razorpay_payment_id;
            $.ajax({
              url: base_url + "save-order",
              type: "POST",
              dataType: "json",
              data: data,
              success: function (msg) {
                Swal.fire({
                  icon: msg.error ? "error" : "success",
                  title: msg.error ? "Oops..." : "Success",
                  text: msg.message,
                }).then((result) => {
                  $(form).find("button[type=submit]").prop("disabled", false);
                  if (msg.redirect) window.location.href = msg.redirect;
                });
                return;
              },
            });
          },
          modal: {
            ondismiss: function () {
              $(form).find("button[type=submit]").prop("disabled", false);
            },
          },
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        return;
	}); */

}(jQuery));

function donate(form) {
  var data = $(form).serialize();
  console.log(data);return;
  $.ajax({
    url: $(form).attr("action"),
    type: "POST",
    dataType: "json",
    data: data,
    success: function (response) {
      if (response.error == true) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: response.message,
        }).then((result) => {
          $(form).find("button[type=submit]").prop("disabled", false);
        });
        return;
      } else {
        var totalAmount = response.message;

        var options = {
          /*live api key*/
          key: "rzp_live_Jf7dJMbtMe1xSC",
          secret: "7QSfgUjxMW5xWKY3ingxBgWN",
          /*testing api key*/
          /* "key": "rzp_test_Ih6FtVWFIhWHOC",
                    "secret": "rLPBMsXLE70mTDiciFObL64u", */
          amount: totalAmount * 100, // 2000 paise = INR 20
          description: "Payment",
          prefill: {
            name: response.name,
            contact: response.mobile,
            email: response.email,
          },
          handler: function (response) {
            data += "&payment_id=" + response.razorpay_payment_id;
            $.ajax({
              url: base_url + "save-order",
              type: "POST",
              dataType: "json",
              data: data,
              success: function (msg) {
                Swal.fire({
                  icon: msg.error ? "error" : "success",
                  title: msg.error ? "Oops..." : "Success",
                  text: msg.message,
                }).then((result) => {
                  $(form).find("button[type=submit]").prop("disabled", false);
                  if (msg.redirect) window.location.href = msg.redirect;
                });
                return;
              },
            });
          },
          modal: {
            ondismiss: function () {
              $(form).find("button[type=submit]").prop("disabled", false);
            },
          },
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
        return;
      }
    },
  });
}