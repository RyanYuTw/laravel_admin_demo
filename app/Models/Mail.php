<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    use HasFactory;

        // 指定資料庫連線名稱
        protected $connection = 'mysql';
        // 資料庫名稱
        protected $table = 'mail';
        // 主鍵欄位
        protected $primaryKey = 'id';
        // 主鍵型態
        //protected $keyType = 'int';
        // 軟刪除
        //use SoftDeletes;
        // 是否自動待時間撮
        public $timestamps = true;
}
