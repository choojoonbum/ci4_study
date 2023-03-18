<?php
namespace App\Models;
use CodeIgniter\Model;

class BoardModel extends Model
{
    protected $table      = 'board';
    protected $primaryKey = 'idx';
    protected $allowedFields = ['writer','title', 'content','ref','depth','step','board_id'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $dateFormat    = 'datetime';

}