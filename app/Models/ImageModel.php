<?php
namespace App\Models;
use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table      = 'image';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['board_idx','filename','regdate'];

}