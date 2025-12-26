<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumniCluster extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis_alumni',
        'cluster_id',
        'cluster_label'
    ];

    public function numberDataAlumni() {
        return $this->belongsTo(Alumni::class, 'nis_alumni', 'nis');
    }

}
