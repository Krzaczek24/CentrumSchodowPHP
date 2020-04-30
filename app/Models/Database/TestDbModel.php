<?php

namespace CS\Models\Database;

use CS\Helpers\Logger;
use Illuminate\Database\Eloquent\Model;
use PDOException;

class TestDbModel extends Model
{
    protected $table = 'test';
    protected $fillable = ['id', 'tekst'];
    
    public $id;
    public $tekst;

    public static function add($id, $tekst)
    {
        try
        {
            TestDbModel::create([
                'id' => $id,
                'tekst' => $tekst
            ]);
        }
        catch (PDOException $ex)
        {
            Logger::WriteException($ex);
        }
    }
}
