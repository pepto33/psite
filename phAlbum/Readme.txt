				** ! REMEMBER TO CHMOD YOUR FOLDERS ! **

/*
//================================================================================
* phphq.Net Custom PHP Scripts *
//================================================================================
:- Script Name: phAlbum
:- Version: 1.1
:- Release Date: July 21st
:- Last Update: Dec 12th 2005
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

				** ! REMEMBER TO CHMOD YOUR FOLDERS ! **