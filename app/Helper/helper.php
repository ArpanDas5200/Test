<?php
namespace App\Helper;

class helper{
    public static function slug($string){
        // Convert the string to lowercase
        $string = strtolower($string);

        // Replace spaces with hyphens
        $string = str_replace(' ', '-', $string);

        // Remove any special characters except dot
        $string = preg_replace('/[^a-z0-9\.\-]/', '', $string);

        // Remove any consecutive hyphens
        $string = preg_replace('/-+/', '-', $string);

        // Trim hyphens from the beginning and end
        $string = trim($string, '-');

        return $string;
    }
}

?>
