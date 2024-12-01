<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 * 
 * @property int $branch_id
 * @property string $branch_name
 * @property string|null $location
 * @property int|null $manager_id
 * @property string|null $contact_info
 * @property string|null $status
 * @property int $employee_id
 * 
 * @property Employee|null $employee
 * @property Collection|BranchManagement[] $branch_managements
 * @property Collection|Inventory[] $inventories
 *
 * @package App\Models
 */
class Branch extends Model
{
	protected $table = 'branches';
	protected $primaryKey = 'branch_id';
	public $timestamps = false;

	protected $casts = [
		'manager_id' => 'int',
		'employee_id' => 'int'
	];

	protected $fillable = [
		'branch_name',
		'location',
		'manager_id',
		'contact_info',
		'status',
		'employee_id'
	];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'manager_id');
	}

	public function branch_managements()
	{
		return $this->hasMany(BranchManagement::class);
	}

	public function inventories()
	{
		return $this->hasMany(Inventory::class);
	}
}
