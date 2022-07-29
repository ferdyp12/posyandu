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

    public $anak = [
        'nama' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
        ],
        'nik' => [
            'rules'  => 'required|max_length[16]',
            'errors' => [
                'required' => 'Nomor Induk Kewarganegaraan tidak boleh kosong.',
                'max_length' => 'Maksimal 16 angka.',
            ],
        ],
        'anak_ke' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Anak yang ke- tidak boleh kosong.',
            ],
        ],
        'tempat_lahir' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tempat Lahir tidak boleh kosong.',
            ],
        ],
        'tanggal_lahir' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tanggal Lahir tidak boleh kosong.',
            ],
        ],
        'berat_badan_lahir' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Berat Badan Lahir tidak boleh kosong.'
            ],
        ],
        'tinggi_badan_lahir' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tinggi Badan Lahir tidak boleh kosong.'
            ],
        ],
        'jenis_kelamin' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Jenis Kelamin tidak boleh kosong.'
            ],
        ],
    ];

    public $ibu_hamil = [
        'nama' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
        ],
        'tinggi_badan' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tinggi Badan tidak boleh kosong.'
            ],
        ],
        'berat_badan' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Berat Badan tidak boleh kosong.'
            ],
        ],
        'lingkar_tangan_atas' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Lingkar Tangan Atas tidak boleh kosong.',
            ],
        ],
        'lingkar_perut' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Lingkar Perut tidak boleh kosong.',
            ],
        ],
        'tekanan_darah' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tekanan Darah tidak boleh kosong.',
            ],
        ],
        'denyut_jantung_bayi' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Denyut Jantung Bayi tidak boleh kosong.'
            ],
        ],
        'tanggal_pemeriksaan' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tanggal Pemeriksaan tidak boleh kosong.',
            ],
        ]
    ];

    public $imunisasi = [
        'tanggal' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Tanggal tidak boleh kosong.',
            ],
        ],
        'usia_saat' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Usia tidak boleh kosong.'
            ],
        ]
    ];

    public $jenis_imunisasi = [
        'nama' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Nama tidak boleh kosong.',
            ],
        ],
        'singkatan' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'Singkatan tidak boleh kosong.'
            ],
        ]
    ];
}
