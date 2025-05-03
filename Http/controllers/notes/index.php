<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->table('notes')->select()->where('user_id','=',1)->execute()->getAllRows();

//dd($notes);


view('notes/index.view.php',[
    'heading' => 'Notes',
    'notes' => $notes ,
]);