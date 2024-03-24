<?php

namespace Authentication\Controllers;

use App\Controllers\BaseController;

class RoleController extends BaseController
{
    
    public function index()
    {

        // $data = roleGetAll();

        return $this->respond([
            'status' => 200,
            'data' => '$data',
            'error' => null
        ]);
    }

    public function create() {
        $data = [
            "name" => $this->request->getVar('name'),
            "slug" => $this->request->getVar('slug'),
            "description" => $this->request->getVar('description')
        ];

        if ($this->role_model->save($data) === false) {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->role_model->errors()
            ]; 
        } else {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Permission Group Created Successfully',
                'error' => null
            ];
        }

        return $this->respond($response, $response['status']);
    }

    public function update($id) {
        $data = [
            "name" => $this->request->getVar('name'),
            "slug" => $this->request->getVar('slug'),
            "description" => $this->request->getVar('description')
        ];

        $role = $this->role_model->find($id);

        if(!$role){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Role with the specified id']
            ]);
        }

        $role->fill($data);

        if(!$role->hasChanged()){
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Nothing to update']
            ];
        }

        if ($this->role_model->update($id, $data)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Role Updated Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->role_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }

    public function delete($id) {
        $role = $this->role_model->find($id);

        if(!$role){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Role with the specified id']
            ]);
        }

        if ($this->role_model->delete($id)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Role Deleted Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->role_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }
}
