<?php
namespace App\Helpers;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class Formatting{
    
    static function limitWords($text, $limit, $suffix = '...') {
        // Remove HTML tags from the text
        $textWithoutTags = strip_tags($text);

        // Count words in the cleaned text
        $words = str_word_count($textWithoutTags, 2);
        $wordCount = count($words);

        if ($wordCount <= $limit) {
            return $textWithoutTags;
        }

        // Limit words and add suffix
        $limitedText = implode(' ', array_slice($words, 0, $limit));
        return $limitedText . $suffix;
    }

    static function generateTree($elements,$parentId = 0, $field='parent_id'){
        $branch = array();
        foreach ($elements as $element) {
            $element['slug'] = Str::slug($element['name']);
            if ($element[$field] == $parentId) {
                $children = self::generateTree($elements, $element['id'],$field);
                if ($children) {
                    $element['children'] = $children;
                } else {
                    $element['children'] = [];
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    static function navigationTree($elements,$parentId = 0, $field='parent_id'){
        $branch = array();
        foreach ($elements as $element) {
            $element['slug'] = Str::slug($element['name']);
            if ($element[$field] == $parentId) {
                $children = self::generateTree($elements, $element['id'],$field);
                if ($children) {
                    $element['children'] = $children;
                } else {
                    $element['children'] = [];
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }

    static function getLang(){
        return Cookie::get('language', 'id');
    }

    static function siteConfig($slug=null){
        if($slug){
            
        }
    }

    static function makeUniqueSlug($table,$field,$originalSlug,$id=null)
    {
        $slug = $originalSlug;
        $count = 1;
    
        $query = DB::table($table)
        ->where(function ($query) use ($field, $slug) {
            $query->where($field, 'LIKE', '%' . $slug . '%');
        });

        // Exclude the record with the specified ID
        if ($id !== null) {
            $query->where('id', '!=', $id);
        }

        if($query->get()->count() > 0) {
            $count += $query->get()->count();
            $slug = $originalSlug . '-' . $count;
        }

        return $slug;
    }
}