<?php

return [
    'required' => ':attribute toldirilishi shart.',
    'string' => ':attribute matn bo\'lishi kerak.',
    'email' => ':attribute haqiqiy elektron pochta manzili bo\'lishi kerak.',
    'integer' => ':attribute butun son bo\'lishi kerak.',
    'date' => ':attribute to\'g\'ri sana bo\'lishi kerak.',
    'min' => [
        'numeric' => ':attribute kamida :min bo\'lishi kerak.',
        'string' => ':attribute kamida :min belgidan iborat bo\'lishi kerak.',
    ],
    'max' => [
        'numeric' => ':attribute :max dan oshmasligi kerak.',
        'string' => ':attribute :max belgidan oshmasligi kerak.',
    ],

    'attributes' => [
        'name' => 'Ismingiz',
        'email' => 'Elektron pochta',
        'phone' => 'Telefon raqam',
        'date' => 'Tashrif sanasi va vaqti',
        'guests' => 'Mehmonlar soni',
        'message' => 'Xabar',
    ],
];
