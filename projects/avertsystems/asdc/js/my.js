/*** My Custom Javascript ***/
$(document).ready(function() {
	var vpw = $( window ).width();
	var pathname = window.location.pathname;
	if ( pathname == "/" ) {
		$("h1.page-title").hide();
		$(".entry-content > figure > figcaption").hide();
	}
	if ( pathname == "/portfolio" || pathname == "/portfolio/" ) {
		$( window ).on("resize", function() {
			var lMargin = $("#post-24 .hero-section").css("margin-left");
			$("a.portfolio-submit-button").css("position","relative");
			$("a.portfolio-submit-button").css("left",lMargin);
		});
		$( window ).on("load", function() {
			var lMargin = $("#post-24 .hero-section").css("margin-left");
			$("a.portfolio-submit-button").css("position","relative");
			$("a.portfolio-submit-button").css("left",lMargin);
		});
	}
	$("#firstName").on("blur", function() {
		var firstName = $("#firstName").val();
		var fnamePattern = /[A-Za-z]{1,20}/i;
		if ( fnamePattern.test(firstName) ) {
			$("#firstName").css("border-color","green");
			$("#first-name-message").text("Good to go!");
			$("#first-name-message").css("color","green");
		} else {
			$("#firstName").css("border-color","red");
			$("#first-name-message").text("Field may not be empty. First name must be 20 characters or less.");
			$("#first-name-message").css("color","red");
		}
	});
	$("#firstName").on("focus", function() {
		$("#first-name-message").css("color","gray");
		$("#first-name-message").text("First name must be 20 characters or less.");
	});
	$("#lastName").on("blur", function() {
		var lastName = $("#lastName").val();
		var  lnamePattern = /[A-Za-z]{1,20}/i;
		if ( lnamePattern.test(lastName) ) {
			$("#lastName").css("border-color","green");
			$("#last-name-message").text("Good to go!");
			$("#last-name-message").css("color","green");
		} else {
			$("#lastName").css("border-color","red");
			$("#last-name-message").text("Field may not be empty. Last name must be 20 characters or less.");
			$("#last-name-message").css("color","red");
		}
	});
	$("#lastName").on("focus", function() {
		$("#last-name-message").css("color","gray");
		$("#last-name-message").text("Last name must be 20 characters or less.");
	});
	$("#email").on("blur", function() {
		var email = $("#email").val();
		var emailPattern = /[A-Za-z0-9]+@[A-Za-z0-9].[A-Za-z]+/i;
		if ( emailPattern.test(email) ) {
			$("#email").css("border-color","green");
			$("#email-message").text("Good to go!");
			$("#email-message").css("color","green");
		} else {
			$("#email").css("border-color","red");
			$("#email-message").text("Field may not be empty. Ex: user@website.com");
			$("#email-message").css("color","red");
		}
	});
	$("#email").on("focus", function() {
		$("#email-message").css("color","gray");
		$("#email-message").text("Ex: user@website.com");
	});
	$("#phone").on("blur", function() {
		var phone = $("#phone").val();
		var phonePattern = /[0-9]{3}-[0-9]{3}-[0-9]{4}/;
		if ( phonePattern.test(phone) ) {
			$("#phone").css("border-color","green");
			$("#phone-message").text("Good to go!");
			$("#phone-message").css("color","green");
		} else {
			$("#phone").css("border-color","red");
			$("#phone-message").text("Check format. Ex: 555-555-5555");
			$("#phone-message").css("color","red");
		}
	});
	$("#phone").on("focus", function() {
		$("#phone-message").css("color","gray");
		$("#phone-message").text("Ex: 555-555-5555");
	});
	$("#description").on("blur", function() {
		var description = $("#description").val();
		var descriptionPattern = /[\w\W]{1,500}/i;
		if ( descriptionPattern.test(description) ) {
			$("#description").css("border-color","green");
			$("#desc-message").text("Good to go!");
			$("#desc-message").css("color","green");
		} else {
			$("#description").css("border-color","red");
			$("#desc-message").text("Field may not be empty. Description must be 500 characters or less.");
			$("#desc-message").css("color","red");
		}
	});
	$("#description").on("focus", function() {
		$("#desc-message").css("color","gray");
		$("#desc-message").text("Description must be 500 characters or less.");
	});
	$("#sysAdminDesc").click(function(){
		$("#sysAdminPara").toggle();
      		$(this).toggle();
      		$("#sysAdminDescHide").toggle();
   	});
   	$("#sysAdminDescHide").click(function(){
      		$("#sysAdminPara").toggle();
      		$(this).toggle();
      		$("#sysAdminDesc").toggle();
   	});
	$("#backtohome").click(function(){
		window.location.assign("/");
	});

});
function request() {
      var firstName = $("#firstName").val();
      var lastName = $("#lastName").val();
      var email = $("#email").val();
      var phone = $("#phone").val();
      var description = $("#description").val();
      var service = $("#service").val();
      var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {
               let pattern = /Error:/;
               let resp = this.responseText
               if (pattern.test(resp) == 1) {
                   alert(resp);
               } else {
               $("#confirmFirst").text(firstName);
               $("#confirmLast").text(lastName);
               $("#confirmEmail").text(email);
               $("#confirmPhone").text(phone);
               $("#confirmDesc").text(description);
               $("#confirmService").text(service);
               $("#mainPanel").hide();
               $( window ).scrollTop(0);
               $("#confirmPanel").fadeIn(300);
              }
            }
          }
        }
        xhttp.open("POST", "requests.php");
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("inputs=" + firstName + "|" + lastName + "|" + email + "|" + phone + "|" + description + "|" + service);
}
