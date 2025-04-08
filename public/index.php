<?php

// This const (BASE_PATH) will point to a path and absolute path to the root of the project
// some programmers call that const SPACE_PATH
// You can concatenate it to the require below and in the others files, but we will use different approach by using function.
const BASE_PATH = __DIR__ . '/../';

// We can't call base_path() here because it's for functions.php and that helper function doesn't exist yet.
require BASE_PATH . "Core/functions.php";


require base_path("router.php");
