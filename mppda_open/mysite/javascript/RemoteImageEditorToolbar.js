(function($) {
	// REMOTE IMAGE INSERTION --------------------------------------------------

	var local  = [
		"#FolderID", ".showUploadField", "#getimagesSearch", "#FolderImages",
		"#Dimensions", "#Form_EditorToolbarImageForm_action_insertimage"
	];

	var remote = [
		"#ImageUrl", "#SaveFolderID",
		"#Form_EditorToolbarImageForm_action_doRemoteImageInsert"
	];

	// Initially hide the remote images.
	$(function() {
		$(remote.join(", ")).hide();
	});

	// Toggle the local/remote image insertion.
	$("#InsertSource input").change(function() {
		if (this.value == "local") {
			$(local.join(", ")).show();
			$(remote.join(", ")).hide();
		} else {
			$(local.join(", ")).hide();
			$(remote.join(", ")).show();
		}
	});

	// Update the image source with the remote image URL.
	$("#Form_EditorToolbarImageForm_ImageUrl").keyup(function() {
		$("#Form_EditorToolbarImageForm_ImageSourceUrl").val(this.value);
	});

	// Handle submitting the remote image insertion form.
	ImageForm.prototype.handleaction_doRemoteImageInsert = function() {
		var form   = $("#Form_EditorToolbarImageForm");
		var data   = form.formToArray();
		var button = $("#Form_EditorToolbarImageForm_action_doRemoteImageInsert");
		var text   = button.val();
		var action = form.attr("action") + "?action_doRemoteImageInsert=1";

		$("input", form).attr("disabled", "disabled");
		button.val("Loading...");

		$.ajax({
			type: "POST",
			url: action,
			data: data,
			success: function(data) {
				var formObj  = $("#Form_EditorToolbarImageForm").get(0);
				var thumbObj = new ImageThumbnail();

				if (!tinyMCE.selectedInstance) {
					tinyMCE.selectedInstance = tinyMCE.activeEditor;
				}

				if (tinyMCE.selectedInstance.contentWindow.focus) {
					tinyMCE.selectedInstance.contentWindow.focus();
				}

				var attrs = {
					"src":    data.src,
					"alt":    $("#Form_EditorToolbarImageForm_AltText").val(),
					"width":  data.width,
					"height": data.height,
					"title":  $("#Form_EditorToolbarImageForm_ImageTitle").val(),
					"class":  $("#Form_EditorToolbarImageForm_CSSClass").val()
				};
				thumbObj.ssInsertImage(
					tinyMCE.activeEditor, attrs, formObj.createCaption()
				);

				statusMessage("The remote image has been inserted.", "good");
				$("#Form_EditorToolbarImageForm_ImageUrl").val("http://");
				$("#Form_EditorToolbarImageForm_InsertSource_local").click().trigger("change");
			},
			error: function(xhr) {
				alert(xhr.statusText);
			},
			complete: function() {
				$("input", form).removeAttr("disabled");
				button.val(text);
			}
		});
	};

	// CAPTIONING --------------------------------------------------------------

	ImageThumbnail.prototype.insert = function() {
		if (!tinyMCE.selectedInstance) {
			tinyMCE.selectedInstance = tinyMCE.activeEditor;
		}

		if (tinyMCE.selectedInstance.contentWindow.focus) {
			tinyMCE.selectedInstance.contentWindow.focus();
		}

		var attrs = {
			"src":    this.href.substr($("base").attr("href")),
			"alt":    $("#Form_EditorToolbarImageForm_AltText").val(),
			"width":  $("#Form_EditorToolbarImageForm_Width").val(),
			"height": $("#Form_EditorToolbarImageForm_Height").val(),
			"title":  $("#Form_EditorToolbarImageForm_ImageTitle").val(),
			"class":  $("#Form_EditorToolbarImageForm_CSSClass").val()
		};
		this.ssInsertImage(tinyMCE.activeEditor, attrs, this.createCaption());

		return false;
	};

	ImageForm.prototype.origInitialize = ImageForm.prototype.initialize;
	ImageForm.prototype.initialize = function() {
		var self = this;

		self.origInitialize();
		this.elements.ImageSource.onkeyup    = function() { self.update_params('ImageSource'); };
		this.elements.ImageSourceUrl.onkeyup = function() { self.update_params('ImageSourceUrl'); };
	};

	ImageForm.prototype.createCaption = function() {
		var caption = this.elements.CaptionText.value;
		var source  = this.elements.ImageSource.value;
		var link    = this.elements.ImageSourceUrl.value;
		
		if (source) {
			caption += (caption ? " " : "") + '<span class="source">(';

			if (link && link != "http://") {
				caption += '<a href="' + link + '">' + source + "</a>";
			} else {
				caption += source;
			}

			caption += ")</span>";
		}

		return caption;
	};

	ImageForm.prototype.respondToNodeChange = function(ed) {
		var el = ed.selection.getNode();

		if (el && el.tagName == "IMG") {
			var caption = $(el.nextSibling);

			if (caption && caption.is("p")) {
				var source = caption.find(".source");
				var link   = source.find("a");

				if (source.length) {
					if (link.length) {
						this.elements.ImageSourceUrl.value = link.attr("href");
					}
	
					this.elements.ImageSource.value = source.text().replace(/^\(/, "").replace(/\)$/, "");
				}

				this.elements.CaptionText.value = caption.get(0).firstChild.textContent;
			} else {
				this.elements.CaptionText.disabled = "disabled";
			}
			
			this.elements.AltText.value     = el.alt;
			this.elements.ImageTitle.value  = el.title;
			this.elements.CSSClass.value    = el.className;
			this.elements.CSSClass.disabled = "disabled";
			this.elements.Width.value       = el.style.width ? parseInt(el.style.width) : el.width;
			this.elements.Height.value      = el.style.height ? parseInt(el.style.height) : el.height;

			this.selectedNode = el;
		} else {
			this.selectedNode = null;
		}
	};

	ImageForm.prototype.orig_update_params = ImageForm.prototype.update_params;
	ImageForm.prototype.update_params = function(updatedField) {
		this.orig_update_params(updatedField);

		var ed = tinyMCE.activeEditor;
		var el = ed.selection.getNode();

		if (!el || el.tagName != "IMG") {
			el = this.selectedNode;
		}

		if (el && el.tagName == "IMG" && el.nextSibling && el.nextSibling.tagName == "P") {
			$(el.nextSibling).html(this.createCaption());
		}
	};
})(jQuery);