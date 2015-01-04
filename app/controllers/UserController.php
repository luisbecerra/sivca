<?php

class UserController extends BaseController {

	public function index()
	{
		$users=User::all();
		$permissions = Permission::all();
		return View::make('usuarios')->with('users',$users)->with('permissions',$permissions);
	}


	public function create($nickName,$password)
	{
		//compara si el nickname existe y retorna su respectivo codigo de error
		$checkNickName=User::where('nickname','=',$nickName)->count();
		if($checkNickName > 0) return -13;

		$user=new User;
		$user->username=mb_strtolower($nickName);
		$user->nickname=$nickName;
		$user->password=Hash::make($password);
		$user->save();
		return ($user) ? $user->id : 0;
	}


	public function editPassword($id,$oldPassword,$newPassword)
	{
		$user=User::find($id);
		//comprueba si la antigua clave coincide, si es así la cambia
		if(Hash::check($oldPassword, $user->password)){
			$user->password=Hash::make($newPassword);
			$user->save();
			return ($user) ? $user->id : 0;
		}else{
			return 0;
		}
		
	}

	public function editPermission($id,$permissionId)
	{
		$user=User::find($id);
		$permission=Permission::find($permissionId);
		$user_permission=$user->permissions()->where('permission_id',"=",$permission->id)->get();
		
		//comprueba si el usuario tiene o no el permiso
		if( sizeof($user_permission)==0){
			$user->permissions()->attach($permissionId);
			return 1;
		}else if(sizeof($user_permission)==1){
			$user->permissions()->detach($permissionId);
			return 2;
		}

		return 0;
	}

	public function delete($id)
	{
		$user = User::find($id);
        
        //si no existe el usuario retorna error
        if (is_null ($user) ){
        	return 0;
        } 

        return ($user->delete()==1) ? 1 : 0;
	}

	public function usersJSON(){
		return User::all()->toJson();
	}
}