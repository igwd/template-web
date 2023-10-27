<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class Formatting{
    
    static function limitWords($text, $limit, $suffix = '...') {
        $words = str_word_count($text, 2);
        $wordCount = count($words);
        
        if ($wordCount <= $limit) {
            return $text;
        }

        $limitedText = implode(' ', array_slice($words, 0, $limit));
        return $limitedText . $suffix;
    }
}