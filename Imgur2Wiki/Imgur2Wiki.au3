#Region ;**** Directives created by AutoIt3Wrapper_GUI ****
#AutoIt3Wrapper_UseUpx=n
#AutoIt3Wrapper_UseX64=n
#AutoIt3Wrapper_Change2CUI=y
#EndRegion ;**** Directives created by AutoIt3Wrapper_GUI ****
#include <Array.au3>
#include <String.au3>

;Dim $test[2]=[1,"http://imgur.com/a/OzieQ"]
;$CmdLine=$test

If $CmdLine[0]<1 Then Exit(255+ConsoleWriteError("Error: Not enough parameters: Imgur2Wiki.exe http://imgur.com/a/mygallery"))


$gallery_in=$CmdLine[1];<----------------------
;enter your IMGUR gallery URL without hash/anchors/layout and run the script - copy from console


;$gallery=$gallery_in&'/layout/blog'
$gallery=$gallery_in&'/OzieQ/all'
$bin=InetRead($gallery)
$str=BinaryToString($bin)

$pos=StringInStr($str,'id="footer"')
$str=StringLeft($str,$pos); cut off everything after the footer - the thumbnail HTML is under the footer.

$arr=_StringBetween($str,'<div class="image" id="','">')

;ConsoleWrite($str)

ConsoleWrite(@CRLF&@CRLF&@CRLF&"<!-- BEGIN WIKI GALLERY -->"&@CRLF)
ConsoleWrite("<!-- Generated with Imgur2Wiki "&@YEAR&'-'&@MON&'-'&@MDAY&" from "&$gallery_in&" -->"&@CRLF)
Local $i=0
For $uri In $arr
	$uri="http://imgur.com/"&$uri
	If Mod($i,20)=0 Then ConsoleWrite("{{Gallery"&@CRLF)
	If StringLeft($uri,2)='//' Then $uri='http:'&$uri
	;$pfx='http://i.imgur.com/'
	ConsoleWrite('|'&$uri&@CRLF)
	If Mod($i,20)=19 Then ConsoleWrite("}}"&@CRLF)
	$i+=1
Next
If Mod($i,20)<19 Then ConsoleWrite("}}"&@CRLF)
ConsoleWrite("<!-- END WIKI GALLERY -->"&@CRLF&@CRLF&@CRLF&@CRLF)

Exit

