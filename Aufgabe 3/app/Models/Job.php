<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

	protected $fillable = [
		'title',
		'description',
		'company_id',
		'category_id',
	];

	public function company() {
		return $this->belongsTo(Company::class, 'company_id', 'id');
	}

	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
