<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
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
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $login = [
        'username' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Username tidak boleh kosong.',
            ],
        ],
        'password' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Password tidak boleh kosong.',
            ],
        ],
    ];

    public $ayah = [
        'nama' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
        ],
        'kk' => [
            'rules'  => 'required|max_length[16]',
            'errors' => [
                'required' => 'Nomor Kartu Keluarga tidak boleh kosong.',
                'max_length' => 'Maksimal 16 angka.',
            ],
        ],
        'nik' => [
            'rules'  => 'required|max_length[16]',
            'errors' => [
                'required' => 'Nomor Induk Kewarganegaraan tidak boleh kosong.',
                'max_length' => 'Maksimal 16 angka.',
            ],
        ],
        'no_telp' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nomor Telepon tidak boleh kosong.',
            ],
        ],
        'alamat' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Alamat tidak boleh kosong.',
            ],
        ],
        'rt' => [
            'rules'  => 'required|max_length[3]',
            'errors' => [
                'required' => 'RT tidak boleh kosong.',
                'max_length' => 'Maksimal 3 angka.'
            ],
        ],
        'rw' => [
            'rules'  => 'required|max_length[3]',
            'errors' => [
                'required' => 'RW tidak boleh kosong.',
                'max_length' => 'Maksimal 3 angka.',
            ],
        ],
    ];
}
