<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PimWritter</title>
<!--
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="themify-icons.css">
-->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jss/jquery-1.8.2.min.js"></script>
    <script src="jss/bootstrap.bundle.min.js"></script>
    <script src="jss/angular.min.js"></script>
    <title>Wordsheet.com</title>
    <link rel="shortcut icon" href="pictures/iconimp.png">
</head>

<body>

	<div class="outer-container">

		<div class="titlebar-wrapper">
			<div class="titlebar">

				<button onclick="_close()" class=" window-close-button window-action button titlebutton close">
					<i class="ti-close"></i>
				</button>

				<button onclick="minimize()" class=" window-minimize-button window-action button titlebutton minimize">
					<i class="ti-minus"></i>
				</button>

				<button onclick="maximize()" class=" window-maximize-button window-action button titlebutton maximize">
					<i class="ti-layout-width-full"></i>
				</button>

				<div class="v-divider divider native"></div>

				<button class="w-auto px-3 save-button">
					<i class="ti-save fallback-i"></i>
					<div class="native-icon"></div>
				</button>

				<button onclick="_print()" class="w-auto px-3 print-button">
					<i class="ti-printer fallback-i"></i>
					<div class="native-icon"></div>
				</button>

				<div class="v-spacer spacer"></div>

				<button class="w-auto px-3">
					<i class="ti-bar-chart fallback-i"></i>
					<div class="native-icon"></div>
				</button>

				<button class="w-auto px-3">
					<i class="ti-palette fallback-i"></i>
					<div class="native-icon"></div>
				</button>

				<div class="h-spacer"></div>

				<button class="w-auto px-3">
					<i class="ti-cloud-up fallback-i"></i>
					<div class="native-icon"></div>
				</button>

				<!-- <button onclick="_reload()" class="debug-reload w-auto px-3">
					<i class="ti-reload fallback-i"></i>
					<div class="native-icon"></div>
				</button> -->

				<button class="toolbar-toggler w-auto mr-2 px-3">
					<i class="ti-more fallback-i"></i>
					<div class="native-icon"></div>
				</button>


			</div>
		</div>

		<div class="wrapper">
			<div class="toolbar shown">

				<div class="toolbox">
					<button class="" style="height: 100%;">
						<i class="ti-clipboard d-block"></i>
						<span class="d-block w-100">
							<small>Paste</small>
						</span>
					</button>
					<div class="toolbox sub vertical">
						<button class="w-100">
							<i class="ti-files"></i>
							<small>Copy</small>
						</button>
						<button class="w-100">
							<i class="ti-cut"></i>
							<small>Cut</small>
						</button>
					</div>
				</div>

				<div class="toolbox" style="max-width: 220px">

					<input type="text" class="font-family-input" value="Arial">
					<input type="number" class="font-size-input" value="12" min="1" max="72">

					<button class="editor-bold">
						<big>B</big>
					</button>

					<button class="editor-underline">
						<i class="ti-underline"></i>
					</button>

					<button class="editor-italic">
						<i class="ti-Italic"></i>
					</button>

					<div style="display: flex; justify-content: flex-end; align-items: center; flex:1;">

						<button class="editor-align-left" style="margin-left: 10px;">
							<i class="ti-align-left"></i>
						</button>

						<button class="editor-align-center">
							<i class="ti-align-center"></i>
						</button>

						<button class="editor-align-right">
							<i class="ti-align-right"></i>
						</button>

						<button class="editor-align-justify">
							<i class="ti-align-justify"></i>
						</button>

					</div>

				</div>

				<div class="toolbox">
					<button class="px-2" style="height: 100%">
						<i class="ti-text"></i>
					</button>
					<button class="px-2" style="height: 100%">
						<i class="ti-paint-bucket"></i>
					</button>
				</div>

				<div class="toolbox">

					<button>
						<i class="ti-list"></i>
					</button>

					<button>
						<i class="ti-list-ol"></i>
					</button>

					<button>
						<i class="ti-shift-right-alt"></i>
					</button>

					<button>
						<i class="ti-shift-left-alt"></i>
					</button>

					<button>
						<i class="ti-layout-grid2"></i>
					</button>

				</div>

				<div class="toolbox">
					<div class="chooser-container">
						<button class="editor-format-p">Normal</button>
						<button class="editor-format-h1"><h1>H1</h1></button>
						<button class="editor-format-h2"><h2>H2</h2></button>
						<button class="editor-format-h3"><h3>H3</h3></button>
						<button class="editor-format-h4"><h4>H4</h4></button>
						<button class="editor-format-h5"><h5>H5</h5></button>
						<!-- <button>P</button> -->
					</div>
				</div>

				<div class="toolbox">
					<div class="toolbox sub vertical">
						<button>
							<i class="ti-search"></i>
							<span>
								<small>Search</small>
							</span>
						</button>
						<button>
							<i class="ti-location-arrow"></i>
							<span>
								<small>Select</small>
							</span>
						</button>
					</div>
				</div>

			</div>
		</div>

		<div class="editor-container" id="editor-container">
			<div class="page" contenteditable>
			</div>
		</div>

		<div class="selection-toolbox">
			<input type="text" class="font-family-input" value="Arial" style="flex: 1; width: 100%;flex-basis: 60%;">
			<input type="number" class="font-size-input" value="12" min="1" max="72" style="flex: 0 0 auto;width: 100%;flex-basis: 40%;">

			<button class="editor-bold">
				<big>B</big>
			</button>

			<button class="editor-underline">
				<i class="ti-underline"></i>
			</button>

			<button class="editor-italic">
				<i class="ti-Italic"></i>
			</button>

			<div style="display: flex; justify-content: flex-end; align-items: center; flex:1;">
				<button class="editor-align-left" style="margin-left: 10px;">
					<i class="ti-align-left"></i>
				</button>

				<button class="editor-align-center">
					<i class="ti-align-center"></i>
				</button>

				<button class="editor-align-right">
					<i class="ti-align-right"></i>
				</button>

				<button class="editor-align-justify">
					<i class="ti-align-justify"></i>
				</button>
			</div>

		</div>
	</div>

</body>

<script>
	if (typeof module === 'object') {
		window.module = module;
		module = undefined;
	}
</script>

<script src="jquery.min.js"></script>
<script src="editor.js"></script>

<script>
	if (window.module) module = window.module;

	const remote = require('electron').remote;
	var currentWindow = remote.getCurrentWindow();

	console.log(currentWindow);

	function _close() {
		currentWindow.close();
	}

	function minimize() {
		currentWindow.minimize();
	}

	function maximize() {

		if (currentWindow.isMaximized()) {
			currentWindow.unmaximize();
		} else {
			currentWindow.maximize();
		}

	}

	function _reload() {
		location.reload();
	}

	function _print() {
		document.getElementById('editor-container').classList.add('printing');
		var printContents = document.getElementById('editor-container').innerHTML;
		var originalContents = document.body.innerHTML;

		document.body.innerHTML = printContents;

		window.print();

		document.body.innerHTML = originalContents;
		document.getElementById('editor-container').classList.remove('printing');
	}

	(function () {

		$(document).on('click', '.toolbar-toggler', function () {

			$('.toolbar').toggleClass('shown');

		});

		if (!currentWindow.custom.window_action_layout_to_left) {
			$('.titlebar').addClass('right');
		}

		if(currentWindow.custom.gtk_theme_path) {
			var link = document.createElement( "link" );
			link.href = "output/gtk.css";
			link.type = "text/css";
			link.rel = "stylesheet";
			link.media = "screen,print";
			document.getElementsByTagName( "head" )[0].appendChild( link );

			$('body').addClass('csd');
			$('.titlebar').addClass('csd');
			$('.close, .minimize, .maximize').html('').addClass('custom');
		}

		var editor = new Editor();

	})();
</script>

</html>