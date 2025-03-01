<?php
namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguagesController extends Controller
{
    public function langue()
    {
        return response()->json(Language::getAllLanguages());
    }
       public function index()
    {
        return response()->json(Language::getAllLanguages());
    }

    public function show($id)
    {
        $language = Language::getLanguageById($id);
        if (!$language) {
            return response()->json(["message" => "Language not found"], 404);
        }
        return response()->json($language);
    }

    public function store(Request $request)
    {
        $newLanguage = Language::addLanguage($request->all());
        return response()->json($newLanguage, 201);
        // return response()->json(Language::getAllLanguages());

    }

    public function update(Request $request, $id)
    {
        $updatedLanguage = Language::updateLanguage($id, $request->all());
        if (!$updatedLanguage) {
            return response()->json(["message" => "Language not found"], 404);
        }
        return response()->json($updatedLanguage);
    }

    public function destroy($id)
    {
        $deleted = Language::deleteLanguage($id);
        if (!$deleted) {
            return response()->json(["message" => "Language not found"], 404);
        }
        return response()->json(["message" => "Language deleted"]);
    }
    public function checkPalindrome(Request $request)
    {
        $text = $request->input('text');
        $isPalindrome = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $text)) === strrev(strtolower(preg_replace("/[^A-Za-z0-9]/", "", $text)));

        if ($isPalindrome) {
            return response("Palindrome");
        } else {
            return response("Not palindrome", 400);
        }
    }
}
