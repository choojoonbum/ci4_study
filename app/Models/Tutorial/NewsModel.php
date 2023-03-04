<?php

namespace App\Models\Tutorial;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';

    public function getNews($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['slug' => $slug])
            ->first();
    }
}
