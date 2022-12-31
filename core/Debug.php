<?php
namespace core;

class Debug {
	public static $debugging = false;

	public static function dump($var) {
		if (self::$debugging) {
            $debug_backtrace = debug_backtrace();
            for ($i = 0; $i < 1; $i++) {
                if ($debug_backtrace[$i]['file']) {
                    echo('Source:'.$debug_backtrace[$i]['file']." at line ".$debug_backtrace[$i]['line']."\n\n");
                }
			}

            echo('<pre>');
            var_dump($var);
            echo('</pre>');
		}
	}
}
