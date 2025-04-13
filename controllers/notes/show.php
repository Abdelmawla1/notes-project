<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 12; // this will be replaced and the value will come from $_SESSION
$note = $db->table('notes')->select()->where('note_id','=',$_GET['id'])->execute()->getRow();

authorize($note['user_id'] == $currentUserId);

view('notes/show.view.php',[
    'heading' => 'notes',
    'note' => $note
]);