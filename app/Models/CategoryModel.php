<?php
namespace App\Models;
use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'category';
    protected $primaryKey = 'idx';
    protected $allowedFields = ['cateName'];
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
}