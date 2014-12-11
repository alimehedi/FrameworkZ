<?php

class ObjectAutoLoader
{
	private static $BaseDirectory;

	private static $PathSpec = array(
			'apps/%s/%s.class.php',
			'lib/%s.class.php'
		);

	public static function AutoLoad($class)
	{
		if (!isset(self::$BaseDirectory))
			self::$BaseDirectory = dirname(__FILE__) . '/../';

		foreach (self::$PathSpec as $pathSpec)
		{
			
			$includeFile = self::$BaseDirectory . '/' . sprintf($pathSpec, $class);
			if (file_exists($includeFile))
			{
				require_once ($includeFile);
				return;
			}
		}
	}
}

spl_autoload_register('ObjectAutoLoader::AutoLoad');
?>
