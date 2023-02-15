<?php
return  [

'file' => [
    'COLUMN_NAME' => [
        'file',
        
    ]
],

'color' => [
    'COLUMN_NAME' => [
        'custom_color',
    ]
],

'range' => [
    'COLUMN_NAME' => [
        'range', //occorre fornire un min max e step
    ]
],

'email' => [
    'COLUMN_NAME' => [
        'email',
    ]
],

'password' => [
    'COLUMN_NAME' => [
        'password',
    ]
],


'url' => [
    'COLUMN_NAME' => [
        'url',
        'thumb'
    ]
],

'tel' => [
    'COLUMN_NAME' => [
        'phone',
    ]
],

'week' => [
    'COLUMN_NAME' => [
        'week',
    ]
],

'month' => [
    'COLUMN_NAME' => [
        'month',
    ]
],

'checkbox' => [

    'COLUMN_TYPE' => [
        'tinyint(1)',
    ],
    //e il valore è === true o === false

    'DATA_TYPE' => [
        'boolean',
        'bool'
    ],

],

'radio' => [

    'DATA_TYPE' => [
        'enum',
        'set'
    ],
],
'number' => [

    'DATA_TYPE' => [
        'bigint',
        'int',
        'mediumint',
        'smallint',
        'tinyint',
        'year', //min 4 max4
        /*        ], 
        'float_DATA_TYPE'=>[ */
        'double',
        //step 0.01
        'decimal', //step 0.01
    ],
],


'date' => [

    'DATA_TYPE' => [
        'date',
    ],
],

'Datetime-local' => [

    'DATA_TYPE' => [
        'datetime',
    ],
],

'time' => [

    'DATA_TYPE' => [
        'time',
    ],
],

'textarea' => [

    'DATA_TYPE' => [
        'text',
        'mediumtext',
        'longtext',
        'json',
       
    ],
],

'text' => [

    'DATA_TYPE' => [
        'char',
        'tinytext',
        'varchar',
        'string',
        
        'linestring',
        'multilinestring',
        'point',
        'multipoint',
        'polygon',
        'multipolygon',
        'geometry',
        'geometrycollection',
        //più tutto il resto
    ],
],




];