<?php

use Core\App;
use Core\Database;



$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->table('notes')->select()->where('note_id', '=', $_POST['note_id'])->execute()->getRow();

authorize($note['user_id']== $currentUserId);

$db->table('notes')->delete()->where('note_id', '=', $_POST['note_id'])->execute();

header('location: /notes');

exit();