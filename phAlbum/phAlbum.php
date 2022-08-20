<?
//				** ! REMEMBER TO CHMOD YOUR FOLDERS ! **

/*
//================================================================================
* phphq.Net Custom PHP Scripts *
//================================================================================
:- Script Name: phAlbum
:- Version: 1.2
:- Release Date: July 21st
:- Last Update: Feb 15th 2015
:- Author: Scott Lucht <scott@phphq.net> http://www.phphq.net
:- Copyright (c) 2005 All Rights Reserved
:-
:- This script is free software; you can redistribute it and/or modify
:- it under the terms of the GNU General Public License as published by
:- the Free Software Foundation; either version 2 of the License, or
:- (at your option) any later version.
:-
:- This script is distributed in the hope that it will be useful,
:- but WITHOUT ANY WARRANTY; without even the implied warranty of
:- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
:- GNU General Public License for more details.
:-http://www.gnu.org/licenses/gpl.txt
:-
//================================================================================
* Description
//================================================================================
:- phAlbum has got to be the easiest drag and drop photo album around. It sports an easy customizable look, and very powerfull features.
:- With this one little file, you can make a whole photo album, very easily. Have it creat thumbs for you on the fly. (Requires GD Library)
:- Features include, unlimited directory + sub-directory support, ignored files, only show certain types, auto image resizeing if desired, and 
:- simplicity. Plus it requires no database! All you need is this one little file. All that you need to do to create your album, 
:- is make folders and put images in them. The script does the rest. How much simplier can it get? Well, it now comes with a simple
:- admin panel! You can make folders and upload images without your ftp client! Now, it can't get any easier. You can also do it the
:- old fashin way with the ftp client if you like and turn the admin panel off! Anyways, hope this script comes in handy!
//================================================================================
* Setup
//================================================================================
:- To setup this script, simply drop this file anywhere in your website. Then edit the vars in phAlbum.php.
//================================================================================
* Frequently Asked Questions
//================================================================================
:- Q1: The script wont make thumbnails! (Yes it will, but with your help).
:-		A1: Make sure the folder in which the files are in is chmod 777. Use your ftp client or site admin panel to do this.
:-		A2: Make sure the file you want the script to make a thumb of is either jpg, gih or png. This script will not make thumbs of any other file types.

:- Q2: I keep getting creating thumb errors. 
:-		A1: Maybe the folder is chmod 777. Please do this using your ftp client or site admin panel.
:-		A2: This script can only make thumbs of jpg or gif images. Any other image types this script will fail to make images of.

:- Q3: I cannot upload files to the folders I created in the admin panel.
:-		A1: Your server may have some security against the chmod() function. You will have to chmod each folder 777 with your ftp client or site admin panel. Sorry :(.
:-		A2: The file type of the uploaded file must be in the $show_files array in the settings of this script. Otherwise it will be denied.
*/

//				** ! REMEMBER TO CHMOD YOUR FOLDERS ! **

//Never know..

unset($phmessage);
unset($thumb_error);
unset($display_admin);

/*
//================================================================================
* ! ATTENTION !
//================================================================================
:- Please read the above FAQ before giving up or emailing me. It may sort out your problems!
*/

$album_title = "My Picture Album"; //The name of this album
$home_link = "Album Home"; //The home link
$admin_username = "pepto";
$admin_password = "12345";
$display_admin = "1"; // Display the admin login form? If you select no, you will not be able to login! You will have to upload etc manually. 1=yes,0=no.

$open_folder = "./phopen.gif"; //The open folder image
$close_folder = "./phclose.gif"; //The closed folder image
$big_folder = "./phfolder.gif"; //The big folder image

//$script_url=$_SERVER['PHP_SELF']; //Bad security here
$script_url = basename(__FILE__);
$files_path = "./album/"; // Where does the album start? Anything under the directory the script will read. With Trailing slash
$full_server = "./album/"; //Enter the full server path to where the albums start. //With Trailing Slash

$show_files = array("jpg", "gif", "png"); //The array, only show these types of files.
$ignore_word = "-hide"; //Hide files with this string in the name. Example, mypicture-hide.jpg will not be shown.
$table_cells = "3"; //How many images/folders in each row do you want? // Looks best with 3

$thumb_width = "175"; //Width of the thumb
$thumb_height = "150"; // Height of the thumb
$auto_thumb = "1"; //Automatically create thumb's of gif and jpg images? 1=yes, 0=no. REQUIRES GD LIBRARY
$jpg_quality = "100"; // JPG thumb quality, does not work for png or gif. 0=low, 100=highest.

$supress_error = "0"; //Suppress errors if thumb creation fails.  1=hide errors, 0=show errors.

$text_color = "#868284"; // The text color.
$text_size = "10"; // The text size.
$text_face = "Verdana, Arial, sans-serif"; //The text face. Arial, Verdana etc.
$link_color = "#868284"; // The link color.
$link_hover = "#FFFFFF"; // Link link hover color, you know, when you put your mouse over a link!
$error_color = "#FF0000"; //Color for error messages
$bgcolor = "#293134"; // Page background color.

$drop_shadow = "1"; //Use the cool css drop shadow around the images? 1=yes, 0=no.
$shadow_strength = "1"; //How much do you want the shadow to show? Increase this value for more.
$shadow_direction = "135"; //1 to 360. Changes where the light is coming from.
$shadow_color = "grey"; //The shadow color.

$image_border = "2"; //Do you want a border around the images? 1-10, number of pixels.
$border_color = "#000000"; // What color do you want the image border to be?

/*
//================================================================================
* Attention
//================================================================================
: Don't edit below this line unless you know some php. Editing some variables or other stuff could cause undeseriable results!!
: This is no joke, I spent lots of time trying to work through everything, this is why I have so many comments in the file.
*/

//We need this to be here so we can cookie before we echo.

if ($display_admin) {
	if ($_POST['login']) {
		if ((sha1($_POST['password']) == sha1($admin_password)) and (sha1($_POST['username']) == sha1($admin_username))) {
			setcookie("phAdmin", sha1($admin_username . $admin_password));
			sleep(1);
			header("Location: " . $script_url . "?" . $_SERVER['QUERY_STRING']);
			exit;
		}
	}
}

//Header html.. for css etc.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?= $album_title; ?></title>
	<style type="text/css">
		body {
			background-color: <?= $bgcolor; ?>;
			font-family: <?= $text_face; ?>;
			font-size: <?= $text_size; ?>pt;
			color: <?= $text_color; ?>;
		}

		a:link {
			text-decoration: none;
			color: <?= $link_color; ?>;
		}

		a:visited {
			text-decoration: none;
			color: <?= $link_color; ?>;
		}

		a:hover {
			text-decoration: none;
			color: <?= $link_hover; ?>;
		}

		.error {
			font-family: <?= $text_face; ?>;
			font-size: <?= $text_size; ?>pt;
			color: <?= $error_color; ?>;
		}

		.image {
			border: <?= $image_border; ?>px solid <?= $border_color; ?>;
		}

		input {
			font-family: <?= $text_face; ?>;
			font-size: <?= $text_size; ?>px;
			color: <?= $text_color; ?>;
			border: 1px solid <?= $border_color; ?>;
		}

		hr {
			color: <?= $text_color; ?>;
		}
	</style>
</head>

<body>


	<?
	//Start the album script! Lets get it started in here!

	//Check if the admin is here.

	$phAdmin = false;
	if ($display_admin) {
		if ($_COOKIE['phAdmin'] == sha1($admin_username . $admin_password)) {
			$phAdmin = true;
		}
	}

	//Only if the user is an admin can he $_POST this stuff!

	if ($display_admin) {
		if ($phAdmin == true) {

			//Make directorys!

			if ($_POST['makedir']) {
				if ($_POST['albumname']) {
					if (!makedir($_POST['albumname'])) {
						$phmessage = "<span class=\"error\">Error: Folder " . $_POST['albumname'] . " could not be created. Maybe the folder exists?</span>";
					} else {
						$phmessage = "<span class=\"error\">Folder " . $_POST['albumname'] . " has been created!</span>";
					}
				} else {
					$phmessage = "<span class=\"error\">No Album name entered!</span>";
				}

				//Upload Images!

			} elseif ($_POST['upload']) {
				if ($_FILES['image']['name']) {
					if (!upload()) {
						$phmessage = "<span class=\"error\">Error: Image " . $_FILES['image']['name'] . " could not be upload. Probably a Chmod Error or file exists.</span>";
					} else {
						$phmessage = "<span class=\"error\">Image " . $_FILES['image']['name'] . " has been uploaded!</span>";
					}
				} else {
					$phmessage = "<span class=\"error\">No File Selected</span>";
				}
			} elseif ($_POST['remove']) {
				if ($_POST['file']) {
					if (!remove()) {
						$phmessage = "<span class=\"error\">Could not delete file, probably a premission error..</span>";
					} else {
						$phmessage = "<span class=\"error\">The file has been removed.</span>";
					}
				} else {
					$phmessage = "<span class=\"error\">No filename was sent to be deleted...</span>";
				}
			}
		}
	}

	//Makes the tables look nice and pretty.

	if ($table_cells == "1") {
		$cell_width = "100%";
	} elseif ($table_cells == "2") {
		$cell_width = "50%";
	} elseif ($table_cells == "3") {
		$cell_width = "33%";
	} elseif ($table_cells == "4") {
		$cell_width = "25%";
	} elseif ($table_cells == "5") {
		$cell_width = "20%";
	} elseif ($table_cells == "6") {
		$cell_width = "16%";
	} else {
		$cell_width = "10%";
	}

	//This is just a random ignore word if none is set above, pretty impossible to be in the filename anyways.

	if (!$ignore_word) {
		$ignore_word = microtime();
	}

	//A bit tricky, but all in all it works, returns the filename without the extension!

	function file_name($key)
	{
		$key = strrev(substr(strstr(strrev($key), "."), 1));
		return ($key);
	}

	//Lets get the file extension.

	function file_ext($key)
	{
		$key = strtolower(substr(strrchr($key, "."), 1));
		$key = str_replace("jpeg", "jpg", $key);
		return ($key);
	}

	//My ever popular (Yeah right) function for image creation.

	function file_thumb($file, $album, $file_name)
	{
		global $thumb_width, $thumb_height, $jpg_quality;

		//Get the file extension!

		$file_ext = file_ext($file);

		//The GD Libary only supports jpg and gif really, well it can only make a gif a jpg. There are other ways like image magik, but not many have it so I didn't include that. So dent anything that isn't a gif or jpg :(.	
		$Allow = array("jpg", "gif", "png");

		if (in_array($file_ext, $Allow)) {

			//Lets do some converting!
			$imgdata = getimagesize($full_server . $album . $file);
			$imgresized = imagecreatetruecolor($thumb_width, $thumb_height);

			if ($file_ext == "gif") {

				$imgsoruce = imagecreatefromgif($full_server . $album . $file);
			} elseif ($file_ext == "jpg") {

				$imgsoruce = imagecreatefromjpeg($full_server . $album . $file);
			} elseif ($file_ext == "png") {

				$imgsoruce = imagecreatefrompng($full_server . $album . $file);
			} else {

				return false;
			}

			imagecopyresampled($imgresized, $imgsoruce, 0, 0, 0, 0, $thumb_width, $thumb_height, $imgdata[0], $imgdata[1]);
			//imagecopyresized($imgresized, $imgsoruce, 0, 0, 0, 0, $thumb_width, $thumb_height, $imgdata[0], $imgdata[1]);

			$new_file = $full_server . $album . $file_name . "_thumb." . $file_ext;

			//PHP 4.4.X added safemode check which made me add this here..

			$fh = fopen($new_file, 'w');
			fclose($fh);


			if ($file_ext == "gif") {

				if (!imagegif($imgresized, $new_file)) {
					return false;
				}
			} elseif ($file_ext == "jpg") {

				if (!imagejpeg($imgresized, $new_file, $jpg_quality)) {
					return false;
				}
			} elseif ($file_ext == "png") {

				if (!imagepng($imgresized, $new_file)) {
					return false;
				}
			}


			imagedestroy($imgsoruce);
			imagedestroy($imgresized);

			return True;
		}

		return false;
	}

	//The tiny but powerfull ;) admin panel.

	function phadmin()
	{
		global $phmessage, $script_url, $album;

		if ($phmessage) {
			echo ("<div align=\"center\"><b>" . $phmessage . "</b></div><br />");
		}
	?>

		<table style="border:0px;" width="300" align="center">
			<tr>
				<td><b>Make New Album</b></td>
			</tr>
			<tr>
				<td width="100%">
					<form method="post" action="<?= $script_url; ?>?<?= $_SERVER['QUERY_STRING']; ?>" enctype="multipart/form-data" style="margin:0px;">
						<input type="text" name="albumname" />
						<input type="hidden" name="album" value="<?= $album; ?>" />
						<input type="hidden" name="makedir" value="true" />
						<input type="submit" value=" Go! " />
					</form>
					<br />
					<br />
				</td>
			</tr>
			<tr>
				<td><b>Upload Image</b></td>
			</tr>
			<tr>
				<td width="100%">
					<form method="post" action="<?= $script_url; ?>?<?= $_SERVER['QUERY_STRING']; ?>" enctype="multipart/form-data" style="margin:0px;">
						<input type="file" name="image" />
						<input type="hidden" name="album" value="<?= $album; ?>" />
						<input type="hidden" name="upload" value="true" />
						<input type="submit" value=" Go! " />
					</form>
					<br />
					<br />
				</td>
			</tr>
		</table>
	<?
	}

	//Makes a directory

	function makedir($key)
	{
		global $full_server;

		$key = str_replace(".", "", str_replace("/", "", $key));
		$album = str_replace(".", "", $_POST['album']);

		if (!@mkdir($full_server . $album . $key)) {
			return False;
		}
		@chmod($full_server . $album . $key, octdec("0777"));
		return True;
	}

	//Uploads the file to the current directory.

	function upload()
	{
		global $full_server, $show_files;

		$key = $_FILES['image']['tmp_name'];
		$name = $_FILES['image']['name'];

		$album = str_replace(".", "", $_POST['album']);

		if (in_array(file_ext($name), $show_files)) {
			if (!file_exists($full_server . $album . $name)) {
				if (!move_uploaded_file($key, $full_server . $album . $name)) {
					return False;
				} else {
					return True;
				}
			}
		}
		return False;
	}

	function remove()
	{
		global $show_files;

		$file = $_POST['file'];


		$name = file_name($file);
		$ext = file_ext($file);

		$thumb = $name . "_thumb." . $ext;

		if (in_array(file_ext($file), $show_files)) {
			if (@!unlink($file)) {
				return false;
			} else {
				@unlink($thumb);
				return true;
			}
		}
		return False;
	}


	//Get the current album.

	$album = stripslashes(str_replace(".", "", $_GET['album'])); //Great security here.. Disallows going up the dir tree.

	//Lil bit of security, not much but it may stop some kids from messing!

	if (!is_dir($files_path . $album)) {
		$album = "";
	}

	//We don't want ugly _'s or -'s to display with the file or folder names do we? No! So, lets take them out.

	$find = array("_", "-");
	$replace = array(" ", " ");

	//############################# DISPLAY THE ALBUM###########################

	//Boom! Splits the $album var into a readable array!

	$folder = @explode("/", $album);

	if ($album) {
		$nav = "<a href=\"" . $script_url . "\"><img src=\"" . $close_folder . "\" style=\"border:0px;\" align=\"absmiddle\" alt=\"Album Home\" /> " . $home_link . "</a> ";
	} else {
		$nav = "<a href=\"" . $script_url . "\"><img src=\"" . $open_folder . "\" style=\"border:0px;\" align=\"absmiddle\" alt=\"Album Home\" /> " . $home_link . "</a> ";
	}

	//How many paths do we got in $album?

	$count = @count($folder);

	//Lets make the naviation! Don't look if you have a weak stomache!

	for ($i = 0; $i < $count; $i++) {
		if ($folder[$i]) {

			$path .= $folder[$i] . "/";

			//Give all the folders except the last folder a link and a closed picture.

			if (($count - 2) > $i) {
				$nav .= " > <a href=\"" . $script_url . "?album=" . $path . "\"><img src=\"" . $close_folder . "\" style=\"border:0px;\" align=\"absmiddle\" alt=\"" . ucwords($folder[$i]) . "\" /> " . ucwords($folder[$i]) . "</a> ";
			} else {
				$nav .= " > <a href=\"" . $script_url . "?album=" . $path . "\"><img src=\"" . $open_folder . "\" style=\"border:0px;\" align=\"absmiddle\" alt=\"" . ucwords($folder[$i]) . "\" /> " . ucwords($folder[$i]) . "</a> ";
			}
		}
	}

	echo ($nav);

	//Lets get some images!!

	$dir = @opendir($full_server . $album);

	//Loop through them all ;).

	while ($file = @readdir($dir)) {

		//Don't display the stupid directory tree files.

		if ($file != "." and $file != "..") {

			//If it's a directory, show the folder image with a link to the new album

			if (is_dir($full_server . $album . $file)) {

				//If the file has the ignore word in it, do not show the file.

				if (stripos($file, $ignore_word) === false) {
					//If(!eregi($ignore_word, $file)) {

					$display_name = str_replace($find, $replace, $file);

					//Make the html		

					$folders .= "<td width=\"" . $cell_width . "\" align=\"center\"><a href=\"" . $script_url . "?album=" . $album . $file . "/\"><img src=\"" . $big_folder . "\" style=\"border:0px;\" alt=\"" . ucwords($display_name) . "\" /><br />" . ucwords($display_name) . "</a></td>\n";

					$j++;
					if (is_int($j / $table_cells)) { //This makes the table all nice and neat, actually, it splits the table with a new <tr> every $table_cells images/folders.
						$folders .= "</tr>\n<tr>\n";
						$folder_close = "1";
					} else {
						$folders .= "";
					}
				}

				// Else, the file is not a directory, so it must be an image.

			} else {

				$file_ext = "." . file_ext($file);
				$file_name = file_name($file);
				$display_name = str_replace($find, $replace, $file_name);

				//Hide the thumb files from displaying as regular files and disallow any file types that are not allowed.

				if ((stripos($file, "_thumb") === false) && (in_array(file_ext($file), $show_files))) {

					//If((!eregi("_thumb",$file)) && (in_array(file_ext($file), $show_files))) {

					//If the file has the ignore word in it, do not show the file.

					if (stripos($file, $ignore_word) === false) {
						//If(!eregi($ignore_word,$file)) {

						//If a thumb file dosen't exists, then try and make one.

						if ($auto_thumb) {
							if (!file_exists($full_server . $album . $file_name . "_thumb" . $file_ext)) {
								if (!file_thumb($file, $full_server . $album, $file_name)) {
									$thumb_error .= "Thumb for " . $files_path . $album . $file . " could not be created.<br />";
								}
							}
						}

						//Now, if there is a thumb file, display the thumb, else display the full images but smaller :(.

						if (file_exists($full_server . $album . $file_name . "_thumb" . $file_ext) or file_exists($full_server . $album . $file_name . "_thumb" . $file_ext)) {
							$thumb = "_thumb" . $file_ext;
						} else {
							$thumb = $file_ext;
						}

						//Make the html
						$remove = "";

						if ($display_admin) {
							if ($phAdmin == true) {
								$remove = "\n<form method=\"post\" action=\"" . $script_url . "?" . $_SERVER['QUERY_STRING'] . "\" enctype=\"multipart/form-data\" style=\"margin:0px;\">\n";
								$remove .= "<input type=\"hidden\" name=\"file\" value=\"" . $full_server . $album . $file . "\" />\n";
								$remove .= "<input type=\"hidden\" name=\"remove\" value=\"true\" />\n";
								$remove .= "<input type=\"submit\" value=\" Delete File \" />\n";
								$remove .= "</form>\n";
							}
						}
						if ($drop_shadow) {
							//Cool drop shadow effect.
							$images .= "<td width=\"" . $cell_width . "\" align=\"center\"><div style=\"width:" . ($thumb_width + 20) . "px;height:" . ($thumb_height + 20) . "px;filter:shadow(color:grey,strength:15, direction:135);\"><a href=\"" . $files_path . $album . $file . "\" target=\"_blank\"><img src=\"" . $files_path . $album . $file_name . $thumb . "\" style=\"border:0px;\" width=\"" . $thumb_width . "\" height=\"" . $thumb_height . "\" alt=\"" . ucwords($display_name) . "\" /></a></div>" . ucwords($display_name) . "<br />" . $remove . "</td>\n";
						} else {
							//Image border
							$images .= "<td width=\"" . $cell_width . "\" align=\"center\"><a href=\"" . $files_path . $album . $file . "\" target=\"_blank\"><img src=\"" . $files_path . $album . $file_name . $thumb . "\" style=\"border:0px;\" width=\"" . $thumb_width . "\" height=\"" . $thumb_height . "\" class=\"image\" alt=\"" . ucwords($display_name) . "\" /></a><br />" . ucwords($display_name) . "<br />" . $remove . "</td>\n";
						}

						$k++;
						if (is_int($k / $table_cells)) { //This makes the table all nice and neat, actually, it splits the table with a new <tr> every $table_cells images/folders.
							$images .= "</tr>\n<tr>\n";
							$image_close = "1";
						} else {
							$images .= "";
						}
					}
				}
			}
		}
	}
	@closedir($dir);

	//Close the directory so the bugs don't get in and display some folders and images! Whew! What a workout!
	?>
	<table style="border:0px;">
		<tr>
			<td align="left" nowrap="nowrap"><?= $navigation; ?></td>
		</tr>
	</table>
	<br />


	<?
	if ($folders) {
		echo ("<table style=\"border:0px;\" cellpadding=\"15\" width=\"98%\" align=\"center\">\n");
		echo ("<tr>\n");
		echo ($folders);
		if (!$folder_close) {
			echo ("</tr>\n");
		}
		echo ("</table>\n");
		echo ("<hr size=\"1\" />\n");
	}
	echo ("<br />\n");
	if ($images) {
		echo ("<table style=\"border:0px;\" cellpadding=\"15\" width=\"98%\" align=\"center\">\n");
		echo ("<tr>\n");
		echo ($images);
		if (!$image_close) {
			echo ("</tr>\n");
		}
		echo ("</table>\n");

		if ($thumb_error && !$supress_error) {
			echo ("<div align=\"center\"><span class=\"error\">The following thumb errors have occured:</span><br /><br /> <b>" . $thumb_error . "<br />Maybe this is from the folder " . $files_path . $album . " not being chmod 777.</b></div>");
		}
	} else {
		echo ("<table style=\"border:0px;width:" . $table_width . ";\" cellpadding=\"15\" align=\"center\">\n");
		echo ("<tr>\n");
		echo ("<td align=\"center\"><b>No images to display in this album. Please pick another album.</b></td>");
		echo ("</tr>\n");
		echo ("</table>\n");
	}
	echo ("<br />\n");
	echo ("<br />\n");
	if ($display_admin) {

		echo ("<hr size=\"1\" /><br />\n");

		if ($phAdmin == true) {
			phadmin();
		} else {
	?>
			<form method="post" action="<?= $script_url; ?>?<?= $_SERVER['QUERY_STRING']; ?>">
				<table style="border:0px;width:250;" align="center">
					<tr>
						<td align="center" colspan="2"><b>Admin Login Here:</b></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td> <input type="text" name="username" size="20" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td> <input type="password" name="password" size="20" /></td>
					</tr>
					<tr>
						<td align="center" colspan="2">
							<input type="hidden" name="login" value="true" />
							<input type="submit" value=" Log me in " />
						</td>
					</tr>
				</table>
			</form>
	<?
		}
	}
	?>
	<? //Please leave this here.. it really dosen't make people hate you or make your site look bad.. 
	?>
	<table style="border:0px;" align="center" width="80%">
		<tr>
			<td align="right">
				<div class="copyright">&copy;<a href="http://www.phphq.net?script=phAlbum" target="_blank" title="Photo Album Powered By phAlbum &lt;www.phphq.net&gt;">phAlbum</a></div>
			</td>
		</tr>
	</table>
</body>

</html>