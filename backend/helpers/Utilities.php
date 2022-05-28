<?php

namespace backend\helpers;

class Utilities {
    public static function slugify($string) {
        $result = strtolower(trim($string));
        $result = iconv('utf-8', 'us-ascii//TRANSLIT', $result);

        $dictionary = [
            '+' => 'plus',
            '#' => 'hash',
        ];

        foreach($dictionary as $character => $ch_name) {
            $result = str_replace($character, $ch_name, $result);
        }

        $result = preg_replace('~[^A-Za-z0-9-+#\s]~i', '', $result);
        $result = preg_replace('~[^A-Za-z0-9]+~', '-', $result);
        $result = preg_replace('~-+~', '-', $result);

        if(empty($result)) {
            return null;
        }

        return $result;
    }
}