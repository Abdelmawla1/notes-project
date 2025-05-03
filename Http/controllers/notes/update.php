<?php

use Core\App;
use Core\Database;
use Core\Validator;


$currentUserId = 1;

$db = App::resolve(Database::class);

$note = $db->table('notes')->select()->where('note_id', '=', $_POST['note_id'])->execute()->getRow();

authorize($note['user_id'] == $currentUserId);

$errors = [];

if (!Validator::string($_POST['note'], 1, 1000)) {
    $errors['note'] = "A note of no more than 1,000 characters is required.";
}

if (!empty($errors)) {
    view('notes/edit.view.php',[
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->table('notes')->update([
    'note' => $_POST['note'],
])->where('note_id', '=', $_POST['note_id'])->execute();

header('location: /notes');
die();