<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }



    public function allUsers()
    {
        return User::all();
    }


    public function storeUser($request, $data)
    {
        $data['password']         =  Hash::make($data['password']);
        $user = User::create([
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => $data['password'],
        ]);

        if ($request->roles){
            $user->assignRole($request->roles);
        }
        return true;
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function updateUser($request, $id)
    {

        $user = User::find($id);
        $user->name       =  $request->name;
        $user->email      =  $request->email;

        if ($request->password){
            $password =  Hash::make($request->password);
            $user->password = $password ;
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles){
            $user->assignRole($request->roles);
        }

        return $user;
    }

    public function deleteUser($id)
    {
        return User::where('id',$id)->delete();
    }


    // getpermissionGroups
    public static function getpermissionGroups(){
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    } // End Method

    public static function getpermissionByGroupName($group_name){
        $permissions = DB::table('permissions')
            ->select('name','id')
            ->where('group_name',$group_name)
            ->get();
        return $permissions;

    }// End Method

    public static function roleHasPermissions($role, $permissions){

        $hasPermission = true;
        foreach($permissions as $permission){
            if (!$role->hasPermissionTo($permission->name)) {
                $hasPermission = false;
                return $hasPermission;
            }
            return $hasPermission;
        }
        return 'test';
    }// End Method

}
