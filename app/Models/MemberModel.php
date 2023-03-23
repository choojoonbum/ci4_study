<?php
namespace App\Models;
use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table      = 'member';
    protected $primaryKey = 'idx';
    protected $allowedFields = ['email','password', 'zipcode','address','address_detail','name'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $dateFormat    = 'datetime';
    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];

    protected $validationRules = [
        'name'     => 'required|korean_alpha_dash|min_length[3]',
        'email'        => 'required|valid_email|is_unique[member.email]',
        'password'     => 'required|min_length[5]',
        'password_confirm' => 'required_with[password]|matches[password]',
    ];
    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Sorry. That email has already been taken. Please choose another.',
        ],
    ];

    protected function initialize()
    {
        $this->builder = $this->db->table('member');
    }

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) {
            return $data;
        }
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }

    public function get($email) {
        $query = $this->builder->select('level,email,name,password,zipcode,address,address_detail')->where('email',$email)->get();
        return $query->getRowArray();
    }

}