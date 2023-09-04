<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {    
        $model = new User();
 
        $data['users'] = $model->orderBy('id', 'DESC')->findAll();
        
        return view('users', $data);
    }    
 
    public function create()
    {    
        return view('create-user');
    }
 
    public function store()
    {  
 
        helper(['form', 'url']);
         
        $model = new User();
 
        $data = [
 
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            ];
 
        $save = $model->insert($data);
 
        return redirect()->to( base_url('/users') );
    }
 
    public function edit($id = null)
    {
      
     $model = new User();
 
     $data['user'] = $model->where('id', $id)->first();
 
     return view('edit-user', $data);
    }
 
    public function update()
    {  
 
        helper(['form', 'url']);
         
        $model = new User();
 
        $id = $this->request->getVar('id');
 
        $data = [
 
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            ];
 
        $save = $model->update($id,$data);
 
        return redirect()->to( base_url('/users') );
    }
 
    public function delete($id = null)
    {
 
     $model = new User();
 
     $data['user'] = $model->where('id', $id)->delete();
      
     return redirect()->to( base_url('/users') );
    }
}
