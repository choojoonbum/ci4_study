<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public array $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public $boardRules = [
        'writer' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'You must choose a writer.',
            ],
        ],
        'title' => [
            'rules'  => 'required|min_length[5]',
            'errors' => [
                'required' => 'You must choose a title.',
                'min_length' => 'Your title is too short. You want to get hacked?',
            ],
        ],
        'content' => [
            'rules'  => 'required|min_length[10]',
            'errors' => [
                'required' => 'You must choose a content.',
                'min_length' => 'Your content is too short. You want to get hacked?',
            ],
        ],
    ];

    public $attachRules = [
        'attach' => [
            'rules' => 'uploaded[attach]'
                . '|is_image[attach]'
                . '|mime_in[attach,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                . '|max_size[attach,100]'
                . '|max_dims[attach,1024,768]',
        ],
    ];


}
