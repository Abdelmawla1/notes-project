<?php

//dd('now from edit.php');
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->table('notes')->select()->where('note_id','=', $_GET['id'])->execute()->getRow();
//dd($note);

authorize($note['user_id'] == $currentUserId);

view('notes/edit.view.php',[
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);