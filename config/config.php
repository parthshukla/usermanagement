<?php
return [
    'prefix' => 'api',
    'middleware' => ['api'],
    'perPageResultLimit' => env('RESULT_PER_PAGE', 5)
];
