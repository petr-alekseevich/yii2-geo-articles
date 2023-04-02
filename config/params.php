<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'appName' => 'Geo Blog',
    'optionsCKEditor' => [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'height' => 500,
            'extraPlugins' => 'justify,font,codesnippet,iframe',
            'language' => 'ru',
            'forcePasteAsPlainText' => true,
            'toolbarGroups' => [
                [
                    'name' => 'clipboard',
                    'groups' => ['clipboard', 'undo'],
                ],
                [
                    'name' => 'editing',
                    'groups' => ['find', 'selection', 'spellchecker'],
                ],
                [
                    'name' => 'basicstyles',
                    'groups' => ['basicstyles', 'cleanup'],
                ],
                [
                    'name' => 'insert',
                ],
                [
                    'name' => 'font',
                    'groups' => [
                        'fontSize_sizes' => '8/8px;9/9px;10/10px;11/11px;12/12px;13/13px;14/14px;15/15px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;72/72px'
                    ],
                ],
                [
                    'name' => 'links',
                ],
                [
                    'name' => 'document',
                    'groups' => ['mode', 'document', 'doctools'],
                ],
                [
                    'name' => 'paragraph',
                    'groups' => ['list', 'indent', 'blocks', 'align', 'bidi'],
                ],
                [
                    'name' => 'styles',
                    'groups' => ['Styles', 'Format', 'Font', 'FontSize']
                ]
            ],
            'filebrowserUploadMethod' => 'form',
        ],
    ],
];
