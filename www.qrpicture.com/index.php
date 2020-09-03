<?php
/*
 *  This file is part of qrpicture, photo realistic QR-codes.
 *  Copyright (C) 2007, xyzzy@rockingship.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published
 *  by the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/*
 * @date 2020-08-12 12:28:35
 * This is a disabled experimental service to allow URL shortening hosted on server.
 */
if (0 && count($_GET) == 1 && strlen($k = key($_GET)) == 6) {
	$fname = 'data/' . $k . '.json';
	if (!file_exists($fname))
		die('QR contents is no longer available');
	$json = json_decode(@file_get_contents($fname));

	if (!empty($json->mime))
		header('Content-type: ' . $json->mime);
	if (!empty($json->url))
		header('Location: ' . $json->url);
	die($json->data);
}

// open session
session_start();

// import configuration
require('config.php');

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    <meta name="description" content="Create photo, image and colour realistic QR codes"/>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="shortcut icon" href="favicon.ico"/>
    <title><?php echo $sitename ?></title>
    <style type="text/css">
        body {
            font-family: Verdana, Geneva, sans-serif;
            font-size: 10pt;
            font-weight: normal;
            position: absolute;
            margin: 0px;
            padding: 5px;
            left: 0px;
            width: 100%;
            right: 0px;
            top: 0px;
            height: 100%;
            bottom: 0px;
        }

        img {
            border: none;
        }

        .example {
            border: none;
            padding-bottom: 160px;
        }

        #image {
            position: relative;
            margin: auto;
            padding: 0px;
            left: 0px;
            right: 0px;
            top: 0px;
            bottom: 0px;
        }

        #qr_canvas {
            position: absolute;
            border: 2px solid #fff;
        }

        #qr_drag {
            position: absolute;
            border: none;
            background: white;
        }

        #draggables {
            position: relative;
            background: none;
        }

        .dragview {
            position: absolute;
        }

        .dragthumb {
            position: absolute;
            border: 1px solid black;
            width: 4px;
            height: 4px;
            background: #0f0;
        }

        .maskPreview {
            position: relative;
            border: 1px solid #999;
        }

        .logo {
            position: relative;
            left: 0;
            right: 0;
            margin: auto;
            width: 846px;
        }

        .textContent {
            position: relative;
            width: 508px;
            height: 416px;
            border: none;
            padding: 0;
            margin: 10px 0;
            overflow: hidden;
            border: 1px solid black;
        }

        /*****/

        .textTabs {
            position: relative;
            width: 510px;
            height: 44px;
            border: none;
            padding: 0;
            margin: 0;
        }

        /*****/

        #wrapper {
            width: 600px;
            margin: 0 auto;
        }

        .tabsWindow {
            position: relative;
            width: 510px;
            height: 44px;
            border: none;
            padding: 0;
            margin: 0;
        }

        ul.tabs {
            list-style-type: none;
            padding: 0;
            margin: 0;
            float: left;
            height: 44px;
        }

        ul.tabs li {
            margin: 10px 4px;
            display: inline;
            float: left;
            padding: 4px 10px;
            -webkit-border-radius: 16px;
            -moz-border-radius: 16px;
            text-shadow: 1px 1px 1px #eee;
            background: #999;
            color: #000;
            font-weight: bold;
            cursor: default;
        }

        ul.tabs li.active {
            background: #ddd;
        }

        ul.tabs li:active {
            background: #666;
        }

        .contentsWindow {
            position: relative;
            width: 520px;
            height: 500px;
            border: none;
            padding: 0;
            margin: 10px 0;
            overflow: hidden;
            border: 1px solid black;
        }

        .contentsSlider {
            border: none;
            position: absolute;
            width: 5100px;
            height: 500px;
            margin: 0;
            padding: 0;
        }

        .contentsFrame {
            position: relative;
            float: left;
            width: 510px;
            height: 490px;
            margin: 0;
            padding: 5px;
        }

        #next1 {
            margin-bottom: 5px;
        }

        .outlineImage {
            margin: 2px;
            border: 2px solid none;
        }

        .contentsFrame img.active {
            border: 2px solid blue;
        }

        .contentsFrame ul {
            margin: 2px;
        }

        #qrText {
            border: 2px solid black;
        }

    </style>
    <script src="MooTools-Core-1.6.0.js" type="text/javascript"></script>
    <script src="MooTools-More-1.6.0.js" type="text/javascript"></script>
    <script src="qrpicture.js" type="text/javascript"></script>
</head>
<body>
<table border="0" align="center">
    <tbody>
    <tr>
        <td><img width="210" height="210" src="assets/eVpdGC-186x186.png"></td>
        <td><img width="210" height="210" src="assets/qrSpiral.anim.col.210x210.gif"></td>
        <td width="420" valign="middle" nowrap="nowrap" align="center"><p><span style="font-size: xx-large; font-weight: bold; font-family: Arial, Helvetica, sans-serif;"><?php echo $sitename ?></span></p>
            <p><span style="font-size: large; font-family: Arial, Helvetica, sans-serif; font-style: italic;">Picture to QR code converter</span></p></td>
        <td><img width="210" height="210" src="assets/qrAwesome.anim.col.210x210.gif"></td>
        <td><img width="210" height="210" src="assets/p2G4MC-186x186.png"></td>
    </tr>
    </tbody>
</table>

<form id="formId" action="#">
    <div id="wrapper">
        <div class="tabsWindow">
            <ul class="tabs">
                <li class="active">1: Image</li>
                <li>2: Outline</li>
                <li>3: Clip</li>
                <li>4: Text</li>
                <li>5: Create</li>
            </ul>
        </div>
        <div class="contentsWindow">
            <div class="contentsSlider">
                <div class="contentsFrame">
                    <p style="margin: 0"><b>Select your image</b></p>
                    <ul>
                        <li>will be resized to 93x93 pixels</li>
                        <li>will be blurred and dithered just as the preview</li>
                        <li>you can clip the preview</li>
                        <li>supported formats JPG/PNG/GIF</li>
                        <li>animations not supported (yet)</li>
                    </ul>
                    <input type="file" onchange="clip.onFileUpload(event)" name="files[]" id="qrlogo_files" size="50">
                </div>
                <div class="contentsFrame">
                    <p style="margin: 0"><b>Select outline</b></p>
                    <img id="qrOutline0" class="outlineImage" src="assets/outline0-97x97.png" align="absmiddle" onclick="clip.onSetOutline(event,0)"/>
                    <img id="qrOutline1" class="outlineImage" src="assets/outline1-97x97.png" align="absmiddle" onclick="clip.onSetOutline(event,1)"/>
                    <img id="qrOutline2" class="outlineImage" src="assets/outline2-97x97.png" align="absmiddle" onclick="clip.onSetOutline(event,2)"/>
                    <img id="qrOutline3" class="outlineImage" src="assets/outline3-97x97.png" align="absmiddle" onclick="clip.onSetOutline(event,3)"/>
                </div>
                <div class="contentsFrame">
                    <p style="margin: 0"><b>Position and size clip rectangle</b>
                        <button id="next1" onclick="return window.tabs1.nextSlide()">Next</button>
                    </p>
                    <div>
                        <canvas id="qr_canvas" height="16"></canvas>
                        <div id="draggables">
                            <canvas id="qr_drag" class="dragview" style="cursor: move; height: 16px;"></canvas>
                            <div class="dragthumb" style="cursor: nw-resize"></div>
                            <div class="dragthumb" style="cursor: n-resize"></div>
                            <div class="dragthumb" style="cursor: ne-resize"></div>
                            <div class="dragthumb" style="cursor: w-resize"></div>
                            <div class="dragthumb" style="cursor: e-resize"></div>
                            <div class="dragthumb" style="cursor: sw-resize"></div>
                            <div class="dragthumb" style="cursor: s-resize"></div>
                            <div class="dragthumb" style="cursor: se-resize"></div>
                        </div>
                    </div>
                </div>
                <div class="contentsFrame">
                    <p style="margin: 0"><b>Your text/message</b>
                        <button id="next2" onclick="return window.tabs1.nextSlide()">Next</button>
                    </p>
                    <ul>
                        <li>maximum 100 charachters</b></li>
                        <li>shorter text gives better dither quality</li>
                        <li>NOTE: You need to enter text or your QR might not scan</li>
                    </ul>
                    <input id="qrText" type="text" size="64" maxlength="100"/>
                </div>
                <div class="contentsFrame">
                    <p style="margin: 0"><b>Choose what to create:</b></p>
                    <ul>
                        <li>!! Please be patient, the generator needs at least 20 seconds</li>
                        <li>right-click to save</li>
                    </ul>
                    <p><input type="radio" name="optDither" value="0"/>Black/White
                        <br/><input type="radio" name="optDither" value="1"/>Colour drawing (large areas of same colour)
                        <br/><input type="radio" name="optDither" value="2" checked="checked"/>Colour picture (a lot of colours/shades)</p>
                    <button type="button" id="qrTextButton" onclick="clip.onGenerate(event)" disabled="disabled">Generate (submit to server)</button>
                    <div id="info"></div>
                    <div id="result"></div>
                    <div id="divReGenerate" style="display:none">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div id="qrHQMaskInfo"></div>
<div id="qrHQMaskInfo2"></div>

<hr>
<p>Sources to this site can be found <a href="https://github.com/xyzzy/qrpicture">https://github.com/xyzzy/qrpicture</a>. For questions <a href="mailto: info@qrpicture.com">info@qrpicture.com</a></p>
<p style="font-size: small">This service is available in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE</p>
</body>
</html>
