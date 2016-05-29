<?php
/**
* Verymv class
* @author Kevin Gong
*/
class Verymv
{
	public static function getJsonData($filename){
		// 读去文件全部内容
		$file_hwnd = fopen ( $filename, "r" );
		$content = fread ( $file_hwnd, filesize ( $filename ) ); 
		fclose ( $file_hwnd );
		// 将文本数据转换回数组
		$data = json_decode ( $content, true ); 
		return $data;
	}
}