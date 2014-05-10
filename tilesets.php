<?php

require_once("inc/common.php");
$pdo = $common->PDO();

$filename = @$_SERVER['HTTP_X_FILENAME'];

if ($filename)
{
	$filepath = "tilesets/" . $filename;
	file_put_contents($filepath, file_get_contents('php://input'));
	
	$insert = $pdo->prepare
	("
		INSERT INTO
			tileset
			(
				filepath
			)
		VALUES
		(
			?
		)"
	);
	
	$insert->execute(array($filepath));
	exit();
}

$select = $pdo->query
("
	SELECT
		*
	FROM
		tileset"
);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Tilesets</title>
		<style>
			<?php
				$filedragcolor = "#e0e0e0";
				$filedragbgcolor = "white";
			?>
			body
			{
				margin: 0;
				padding: 0;
			}
			#filedrag
			{
				text-align: center;
				padding: 10px;
				background-color: ;
				border-bottom: 1px solid <?=$filedragcolor?>;
				color: <?=$filedragcolor?>;
				font-size: 25px;
			}
			.filedrag-border
			{
				padding: 10px;
				border: 4px dashed <?=$filedragbgcolor?>;
			}
		</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script>
			/*
			filedrag.js - HTML5 File Drag & Drop demonstration
			Featured on SitePoint.com
			Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
			*/
			
			// getElementById
			function $id(id) {
				return document.getElementById(id);
			}


			// output information
			function Output(msg) {
				var m = $id("messages");
				m.innerHTML = msg + m.innerHTML;
			}

			function ShowFileDragBorder(e) {
				// e.stopPropagation();
				// e.preventDefault();
				console.log("ShowFileDragBorder> e = " + e);
				jQuery(".filedrag-border").css("border-color", "<?=$filedragcolor?>");
				// $id("filedrag-border").style.border = "none";
			}
			
			function HideFileDragBorder(e) {
				// e.stopPropagation();
				// e.preventDefault();
				console.log("HideFileDragBorder> e = " + e);
				jQuery(".filedrag-border").css("border-color", "<?=$filedragbgcolor?>");
				// $id("filedrag-border").style.border = "none";
			}

			// file drag hover
			function FileDragHover(e) {
				// e.stopPropagation();
				// e.preventDefault();
				//e.target.className = (e.type == "dragover" ? "hover" : "");
			}


			// file selection
			function FileSelectHandler(e) {

				// cancel event and hover styling
				FileDragHover(e);

				// fetch FileList object
				var files = e.target.files || e.dataTransfer.files;

				// process all File objects
				for (var i = 0, f; f = files[i]; i++) {
					ParseFile(f);
					UploadFile(f);
				}

			}


			// output file information
			function ParseFile(file) {

				Output(
					"<p>File information: <strong>" + file.name +
					"</strong> type: <strong>" + file.type +
					"</strong> size: <strong>" + file.size +
					"</strong> bytes</p>"
				);

				// display an image
				if (file.type.indexOf("image") == 0) {
					var reader = new FileReader();
					reader.onload = function(e) {
						Output(
							"<p><strong>" + file.name + ":</strong><br />" +
							'<img src="' + e.target.result + '" /></p>'
						);
					}
					reader.readAsDataURL(file);
				}

				// display text
				if (file.type.indexOf("text") == 0) {
					var reader = new FileReader();
					reader.onload = function(e) {
						Output(
							"<p><strong>" + file.name + ":</strong></p><pre>" +
							e.target.result.replace(/</g, "&lt;").replace(/>/g, "&gt;") +
							"</pre>"
						);
					}
					reader.readAsText(file);
				}

			}


			// upload JPEG files
			function UploadFile(file) {

				// following line is not necessary: prevents running on SitePoint servers
				if (location.host.indexOf("sitepointstatic") >= 0) return

				var xhr = new XMLHttpRequest();
				if (xhr.upload && (file.type == "image/jpeg" || file.type == "image/png") && file.size <= 300000) {

					// create progress bar
					var o = $id("progress");
					var progress = o.appendChild(document.createElement("p"));
					progress.appendChild(document.createTextNode("upload " + file.name));


					// progress bar
					xhr.upload.addEventListener("progress", function(e) {
						var pc = parseInt(100 - (e.loaded / e.total * 100));
						progress.style.backgroundPosition = pc + "% 0";
					}, false);

					// file received/failed
					xhr.onreadystatechange = function(e) {
						if (xhr.readyState == 4) {
							progress.className = (xhr.status == 200 ? "success" : "failure");
					   console.log(xhr.responseText);
						}
					};

					// start upload
					xhr.open("POST", "tilesets.php", true);
					xhr.setRequestHeader("X-FILENAME", file.name);
					xhr.send(file);

				}

			}


			// initialize
			function Init() {

				var filedrag = $id("filedrag");
				// var fileselect = $id("fileselect"),
					// filedrag = $id("filedrag"),
					// submitbutton = $id("submitbutton");

				// file select
				// fileselect.addEventListener("change", FileSelectHandler, false);

				// is XHR2 available?
				var xhr = new XMLHttpRequest();
				if (xhr.upload) {

					document.body.addEventListener("dragover", ShowFileDragBorder, false);
					document.body.addEventListener("dragleave", HideFileDragBorder, false);
					// document.body.addEventListener("drop", HideFileDragBorder, false);
				
					// file drop
					filedrag.addEventListener("dragover", FileDragHover, false);
					filedrag.addEventListener("dragleave", FileDragHover, false);
					filedrag.addEventListener("drop", FileSelectHandler, false);
					filedrag.style.display = "block";

					// remove submit button
					// submitbutton.style.display = "none";
				}

			}
				
			window.onload = function() {
				// call initialization file
				if (window.File && window.FileList && window.FileReader) {
					Init();
				}
			};
		</script>
    </head>
    <body>
        <div id="filedrag"><div class="filedrag-border">Upload</div></div>
		<div id="progress"></div>
        <div id="messages">
            <p>Status Messages</p>
        </div>
		<?php
		
		while($row = $select->fetchObject())
		{
			echo "<img src='{$row->filepath}'/>";
		?>
		
		<?php
		}
		?>
    </body>
</html>
