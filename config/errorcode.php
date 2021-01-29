<?php
return [
    'task' => [
        'code' => '01',
        'errorType' => [
            'TASK_PARAMETER_ERROR' => [
                'code' => '01',
                'template' => 'parameter error'
            ],
            'TASK_NOT_FOUND' => [
                'code' => '02',
                'template' => 'task is not found'
            ],
            'TASK_ROW_DUPLICATE' => [
                'code' => '03',
                'template' => 'datebase error: row duplicate'
            ]
        ],
    ],
];