(function ($) {
	"use strict";

	$(document).ready(function () {
		// Initialize color pickers
		$(".color-picker").wpColorPicker();

		// Tab navigation
		$(".nav-tab").on("click", function (e) {
			e.preventDefault();

			// Hide all tab contents
			$(".tab-content").removeClass("active");

			// Remove active class from all tabs
			$(".nav-tab").removeClass("nav-tab-active");

			// Add active class to current tab
			$(this).addClass("nav-tab-active");

			// Show current tab content
			$($(this).attr("href")).addClass("active");
		});

		// Make first tab active by default
		if (!$(".nav-tab-active").length) {
			$(".nav-tab:first").click();
		}

		// Handle the body background type toggle
		$("#wp-adv-whatsapp_body_bg_type").on("change", function () {
			$(".bg-type-option").hide();
			$(".bg-type-" + $(this).val()).show();
		});

		// Trigger on page load
		$("#wp-adv-whatsapp_body_bg_type").trigger("change");

		// Handle custom background image option
		$("#wp-adv-whatsapp_body_bg_image").on("change", function () {
			if ($(this).val() === "custom") {
				$("#custom-bg-image-container").show();
			} else {
				$("#custom-bg-image-container").hide();
			}
		});

		// Media uploader for profile image
		$("#upload_profile_image_button").on("click", function (e) {
			e.preventDefault();

			var file_frame;

			// If the media frame already exists, reopen it
			if (file_frame) {
				file_frame.open();
				return;
			}

			// Create the media frame
			file_frame = wp.media({
				title: "Select or Upload Profile Image",
				button: {
					text: "Use this image",
				},
				multiple: false, // Set to false for single file selection
			});

			// When an image is selected in the media frame...
			file_frame.on("select", function () {
				// Get media attachment details from the frame state
				var attachment = file_frame.state().get("selection").first().toJSON();

				// Set image URL in the hidden input field
				$("#wp-adv-whatsapp_profile_image").val(attachment.url);

				// Update the preview image
				$("#profile-image-preview").attr("src", attachment.url);

				// Show the remove button
				$("#remove_profile_image_button").show();
			});

			// Finally, open the modal
			file_frame.open();
		});

		// Remove image button
		$("#remove_profile_image_button").on("click", function (e) {
			e.preventDefault();

			// Clear the input field
			$("#wp-adv-whatsapp_profile_image").val("");

			// Reset to default image
			var defaultImage = $("#profile-image-preview").data("default");
			$("#profile-image-preview").attr("src", defaultImage);

			// Hide the remove button
			$(this).hide();
		});

		// Show/hide remove button based on whether we have an image URL
		if ($("#wp-adv-whatsapp_profile_image").val()) {
			$("#remove_profile_image_button").show();
		} else {
			$("#remove_profile_image_button").hide();
		}

		// Media uploader for custom background image
		$("#upload_custom_bg_image_button").on("click", function (e) {
			e.preventDefault();

			var custom_bg_frame;

			if (custom_bg_frame) {
				custom_bg_frame.open();
				return;
			}

			custom_bg_frame = wp.media({
				title: "Select or Upload Background Image",
				button: {
					text: "Use this image",
				},
				multiple: false,
			});

			custom_bg_frame.on("select", function () {
				var attachment = custom_bg_frame
					.state()
					.get("selection")
					.first()
					.toJSON();
				$("#wp-adv-whatsapp_custom_bg_image_url").val(attachment.url);
			});

			custom_bg_frame.open();
		});
	});
})(jQuery);
