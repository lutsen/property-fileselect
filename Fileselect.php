<?php

namespace Lagan\Property;

/**
 * Controller for the Lagan fileselect property.
 * Lets the user select a file from a directory.
 *
 * A property type controller can contain a set, read, delete and options method. All methods are optional.
 * To be used with Lagan: https://github.com/lutsen/lagan
 */

class Fileselect {

	/**
	 * The options method returns all the optional values for this property.
	 * $property['pattern'] contains the glob pattern to find the matching pathnames.
	 *
	 * @param array		$property	Lagan model property arrray.
	 *
	 * @return array	Array with nested arrays containing the path and the name of the file.
	 */
	public function options($property) {

		$return = [];
		$files = glob( $property['pattern'], GLOB_BRACE );
		foreach ($files as $file) {
			$return[] = [
				'path' => substr( $file, strlen(APP_PATH) ),
				'name' => basename($file)
			];
		}
		return $return;

	}

}

?>