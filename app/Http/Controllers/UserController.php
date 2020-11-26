<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;
use Image;

class UserController extends Controller
{
    // Users //
    public function viewUser()
    {
        $users = User::join('roles', 'roles.role_id', '=', 'users.role_id')->get();
        return view('admin.blog.users.admin_view_user')->with(compact('users'));
    }
    public function createUser(Request $request)
    {
        if ($request->isMethod('POST')) {
            if ($request->file('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/backend_img/users/large/'.$filename;
                    $medium_image_path = 'img/backend_img/users/medium/'.$filename;
                    $small_image_path = 'img/backend_img/users/small/'.$filename;
                    // Resize Image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    
                }
            } else {
                $filename = NULL;
            }
            
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => $request->role,
                'image' => $filename
            ]);
            return redirect('/admin/users');
        }
        $roles = Role::all();
        return view('admin.blog.users.admin_add_user')->with(compact('roles'));
    }
    public function updateUser($id, Request $request)
    {
        $users = User::find($id);
        $roles = Role::all();
        if ($request->isMethod('POST')) {
            if ($request->file('image')) {
                $image_tmp = $request->file('image');
                if($image_tmp->isValid()){
                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path = 'img/backend_img/users/large/'.$filename;
                    $medium_image_path = 'img/backend_img/users/medium/'.$filename;
                    $small_image_path = 'img/backend_img/users/small/'.$filename;
                    
                    // Delete Large Image if not exists in Folder
                    if(file_exists('img/backend_img/users/large/'.$users->image)){
                        File::delete('img/backend_img/users/large/'.$users->image);
                    }
                    // Delete Medium Image if not exists in Folder
                    if(file_exists('img/backend_img/users/medium/'.$users->image)){
                        File::delete('img/backend_img/users/medium/'.$users->image);
                    }
                    // Delete Small Image if not exists in Folder
                    if(file_exists('img/backend_img/users/small'.$users->image)){
                        File::delete('img/backend_img/users/small/'.$users->image);
                    }
                    // Resize Image
                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    
                }
            } else {
                $filename = $users->image;
            }
            $users->name = $request->nama;
            $users->email = $request->email;
            $users->image = $filename;
            $users->role_id = $request->role;
            $users->save();
            return redirect('/admin/users');
        }
        return view('admin.blog.users.admin_edit_user')->with(compact('users', 'roles'));
    }
    public function deleteUser($id)
    {
        User::find($id)->delete();
        return redirect('/admin/users');
    }
    // Roles //
    public function viewRole()
    {
        $roles = Role::all();
        return view('admin.blog.roles.admin_view_role')->with(compact('roles'));
    }
}
