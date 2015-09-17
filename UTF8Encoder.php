<?php
/**
 * UTF-8 Encoder will encode variables passed to it.
 *
 * @author jonbest
 *
 */
class UTF8Encoder
{
	/** Will UTF-8 encode the variable value(s) passed to it. Note that this method
	 * 	must be passed a variable; it cannot accept a non-stored value. This method
	 * 	will make adjustments by reference as well as return the resulting variable.
	 * 
	 * @example $str = "Hôpital";<br />UTF8Encoder::encode($str);
	 *
	 * @param Ambigous <mixed> $var Must be a stored value; passed parameter must 
	 * 	be a variable.
	 * @return Ambigous <mixed> returns UTF-8 encoded variable
	 * 
	 * @see UTF8Encoder::returnEncoded()
	 */
	public static function encode(&$var)
	{
		return self::_encode($var);
	}

	/** Will return the UTF-8 encoded value(s) that were passed to it. 
	 * 
	 * @example $utf8encoded = UTF8Encoder::returnEncoded("Hôpital");
	 * 
	 * @param Ambigous <mixed> $var
	 * @return Ambigous <mixed> return UTF-8 encoded variable
	 */
	public static function returnEncoded($var)
	{
		return self::_encode($var);
	}

	private static function _encode(&$x)
	{
		if(is_array($x))
			array_walk_recursive($x, 'self::__evalUTF8');
		elseif(is_object($x))
		{
			$x = (array)$x;
			array_walk_recursive($x, 'self::__evalUTF8');
		}
		elseif(is_string($x) && !mb_detect_encoding($x, 'utf-8', true))
		$x = utf8_encode($x);
			
		return $x;
	}

	private static function __evalUTF8(&$i, $k)
	{
		if(is_string($i) && !mb_detect_encoding($i, 'utf-8', true))
			$i = utf8_encode($i);
		else
			self::encode($i);
	}
}
?>
