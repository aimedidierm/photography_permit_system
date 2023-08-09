<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class Payment extends Model
{
    use HasFactory;

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
