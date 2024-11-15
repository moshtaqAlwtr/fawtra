<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $employee_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $position
 * @property string|null $department
 * @property Carbon $hire_date
 * @property float|null $salary
 * @property string|null $contact_info
 * @property string|null $status
 * @property int $user_id
 * 
 * @property Collection|BranchManagement[] $branch_managements
 * @property Collection|Branch[] $branches
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';
	protected $primaryKey = 'employee_id';
	public $timestamps = false;

	protected $casts = [
		'hire_date' => 'datetime',
		'salary' => 'float',
		'user_id' => 'int'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'position',
		'department',
		'hire_date',
		'salary',
		'contact_info',
		'status',
		'user_id'
	];

	public function branch_managements()
	{
		return $this->hasMany(BranchManagement::class);
	}

	public function branches()
	{
		return $this->hasMany(Branch::class, 'manager_id');
	}
}
