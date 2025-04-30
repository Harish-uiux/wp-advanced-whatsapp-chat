(function ($) {
	"use strict";

	$(document).ready(function () {
		console.log("WhatsApp Chat Plugin Initialized"); // Debug message

		var $bubble = $("#wp-adv-whatsapp-bubble");
		var $chatContainer = $("#wp-adv-whatsapp-chat");
		var $chatInput = $("#wp-adv-whatsapp-chat-input");
		var $sendBtn = $("#wp-adv-whatsapp-start-chat");
		var chatHidden = true;

		// Show bubble when page loads
		$bubble.fadeIn(300);

		// Debug click events
		$bubble.on("click", function (e) {
			console.log("WhatsApp bubble clicked"); // Debug message
			toggleChatWindow();
		});

		// Force a direct click handler on the button itself as well
		$(".wp-adv-whatsapp-button").on("click", function (e) {
			console.log("WhatsApp button clicked"); // Debug message
			e.stopPropagation(); // Prevent event bubbling
			toggleChatWindow();
		});

		// Close chat window
		$(".wp-adv-whatsapp-chat-close").on("click", function () {
			$chatContainer.fadeOut(300);
			chatHidden = true;
		});

		// Start WhatsApp chat on button click or Enter key press
		$sendBtn.on("click", startWhatsAppChat);
		$chatInput.on("keypress", function (e) {
			if (e.which === 13) {
				// Enter key
				startWhatsAppChat();
			}
		});

		// Function to toggle chat window
		function toggleChatWindow() {
			console.log("Toggle chat window, current state:", chatHidden); // Debug message
			if (chatHidden) {
				$chatContainer.fadeIn(300).css("display", "block");
				$bubble.addClass("active");
				// Remove notification indicator when chat is opened
				$(".wp-adv-whatsapp-notification-indicator").fadeOut(300);
				chatHidden = false;
				// Focus on input field
				setTimeout(function () {
					$chatInput.focus();
				}, 500);
			} else {
				$chatContainer.fadeOut(300);
				$bubble.removeClass("active");
				chatHidden = true;
			}
		}

		// Function to start WhatsApp chat
		function startWhatsAppChat() {
			var phoneNumber = wpAdvWhatsAppParams.phoneNumber;
			var message = $chatInput.val() || wpAdvWhatsAppParams.preFilledMessage;

			if (phoneNumber) {
				var whatsappURL = "https://api.whatsapp.com/send?phone=" + phoneNumber;

				if (message) {
					whatsappURL += "&text=" + encodeURIComponent(message);
				}

				// Open WhatsApp in a new window/tab
				window.open(whatsappURL, "_blank");

				// Clear input field
				$chatInput.val("");
			}
		}
	});
})(jQuery);
