<?php
namespace framework\views\render;

/**
 * A very simple renderer for for views.
 * 
 * @author Kaleb Woldeargay<contactkaleb@gmail.com>
 *
 */
class RenderEngine
{
	/**
	 * Simple render engine, will get the path to the file, dumps its content and 
	 * replaces any {%(variable)%} with the corresponding variable from the array.
	 * @param File path $path
	 * @param array $params
	 * @return String string
	 */
	public function getOutput($path, array $params)
	{
		$content = file_get_contents($path);
		//replace the values to the content of the file
		$regex = '/{%(w+)%}/'; //this is the simplest one
		preg_match($regex, $path, $matches);
		foreach ($params as $index => $value) {
			$content = str_replace("{%{$index}%}", $value, $content);
		}
		
		echo $content;
	}
}