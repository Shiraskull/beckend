<?php
namespace App\Models;

class Language
{
    private static $languages = [
        [
            "id" => 1,
            "language" => "C",
            "appeared" => 1972,
            "created" => ["Dennis Ritchie"],
            "functional" => true,
            "object-oriented" => false,
            "relation" => [
                "influenced-by" => ["B", "ALGOL 68", "Assembly", "FORTRAN"],
                "influences" => ["C++", "Objective-C", "C#", "Java", "JavaScript", "PHP", "Go"]
            ]
        ]
    ];

    public static function getAllLanguages()
    {
        return self::$languages;
    }

    public static function getLanguageById($id)
    {
        foreach (self::$languages as $language) {
            if ($language['id'] == $id) {
                return $language;
            }
        }
        return null;
    }

    public static function addLanguage($data)
    {
        $data['id'] = count(self::$languages) + 1;
        self::$languages[] = $data;
        return self::$languages;
        // return $data;
    }

    public static function updateLanguage($id, $data)
    {
        foreach (self::$languages as $index => $language) {
            if ($language['id'] == $id) {
                self::$languages[$index] = array_merge($language, $data);
                return self::$languages[$index];
            }
        }
        return null;
    }


    public static function deleteLanguage($id)
    {
        foreach (self::$languages as $index => $language) {
            if ($language['id'] == $id) {
                array_splice(self::$languages, $index, 1);
                return true;
            }
        }
        return false;
    }
}
