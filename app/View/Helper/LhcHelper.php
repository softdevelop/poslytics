<?php
/**
 * Helper for AJAX operations.
 *
 * Helps doing AJAX using the jQuery library.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2009, Damian Jóźwiak
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 */

/**
 * AjaxHelper helper library.
 *
 * Helps doing AJAX using the Prototype library.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.view.helpers
 */
class LhcHelper extends AppHelper {
/**
 * Included helpers.
 *
 * @var array
 */
    public function alpha2num($a) {
        $a = strtoupper($a);
        $r = 0;
        $l = strlen($a);
        for ($i = 0; $i < $l; $i++) {
            $r += pow(26, $i) * (ord($a[$l - $i - 1]) - 0x40);
        }
        return $r;
    }
}

?>