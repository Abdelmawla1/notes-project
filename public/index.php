<?php

// This const (BASE_PATH) will point to a path and absolute path to the root of the project
// some programmers call that const SPACE_PATH
// You can concatenate it to the require below and in the others files, but we will use different approach by using function.


use Core\Database;

const BASE_PATH = __DIR__ . '/../';

// We can't call base_path() here because it's for functions.php and that helper function doesn't exist yet.
require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class){
//    dd($class);
    $class = str_replace("\\",DIRECTORY_SEPARATOR,$class);
//    dd("NEW HERE");
    require base_path("{$class}.php");
//    require base_path("Core/Database.php");
});

$configs = require base_path('configs.php');

//dd($configs); // to check if $configs var has value

$db = new Database($configs['database']);

//dd($db);

//$db->table('notes')->insert([
//    'note' => 'Third note in Database to make update on it',
//    'user_id' => 1
//])->execute();

//$db->table('notes')->update([
//    'note' => "I will update this Third note"
//])->where('note_id','=',3)->execute();

//$notes = $db->table('notes')->select()->execute()->getAllRows();

//dd($notes);

//$note = $db->table('notes')
//    ->select('note, user_id')
//    ->where("note_id",'=',1)->execute()->getRow();

//dd($note);


//$db->table('notes')->delete()->where("note_id",'=',3)->execute();

//dd("You deleted the row");


require base_path("router.php");
