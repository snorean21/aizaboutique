<?php

namespace AizaBoutique;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Caffeinated\Shinobi\Models\Role;

class User extends Authenticatable
{
    use Notifiable, ShinobiTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'avatar','email', 'password', 'avatar', 'address_user', 'country_user', 'department_user', 'city_user', 'birth_date_user', 'sex', 'lenguages', 'religion', 'family_name', 'family_relationship', 'emotional_situation', 'company_name', 'job_company', 'city_company', 'date_of_admission_company', 'time_frame_company', 'university_name', 'time_frame_university', 'completed_studies_university', 'title_university', 'school_name', 'time_frame_school', 'completed_studies_school',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
