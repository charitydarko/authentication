<?php

namespace Authentication\Controllers;

use App\Controllers\BaseController;

class Permission extends BaseController
{
    /*
    * Permission Group
    */
    public function group_getAll() {
        $data = permissionGroupGetAll();

        return $this->respond([
            'status' => 200,
            'data' => $data,
            'error' => null
        ]);
    }

    public function group_create() {
        $data = [
            "name" => $this->request->getVar('name'),
            "short_code" => $this->request->getVar('short_code'),
        ];

        if ($this->permission_group_model->save($data) === false) {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
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

    public function group_update($id) {
        $data = [
            "name" => $this->request->getVar('name'),
            "short_code" => $this->request->getVar('short_code'),
        ];

        $item = $this->permission_group_model->find($id);

        if(!$item){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Permission Group with the specified id']
            ]);
        }

        $item->fill($data);

        if(!$item->hasChanged()){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Nothing to update']
            ]);
        }

        if ($this->permission_group_model->update($id, $data)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Permission Group item with id ' . $id . ' Updated Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }

    public function group_delete($id) {
        $item = $this->permission_group_model->find($id);

        if(!$item){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Permission Group with the specified id']
            ]);
        }

        if ($this->permission_group_model->delete($id)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Permission Group Deleted Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }

    /*
    * Permission Category
    */
    public function category_getAll() {
        $data = permissionCategoryGetAll();

        return $this->respond([
            'status' => 200,
            'data' => $data,
            'error' => null
        ]);
    }

    public function category_create() {
        $data = [
            "name" => $this->request->getVar('name'),
            "short_code" => $this->request->getVar('short_code'),
        ];

        if ($this->permission_group_model->save($data) === false) {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
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

    public function category_update($id) {
        $data = [
            "name" => $this->request->getVar('name'),
            "short_code" => $this->request->getVar('short_code'),
        ];

        $item = $this->permission_group_model->find($id);

        if(!$item){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Permission Group with the specified id']
            ]);
        }

        $item->fill($data);

        if(!$item->hasChanged()){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Nothing to update']
            ]);
        }

        if ($this->permission_group_model->update($id, $data)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Permission Group item with id ' . $id . ' Updated Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }

    public function category_delete($id) {
        $item = $this->permission_group_model->find($id);

        if(!$item){
            return $this->respond([
                'status' => $this->bad_request,
                'data' => [],
                'error' => ['Unable to find Permission Group with the specified id']
            ]);
        }

        if ($this->permission_group_model->delete($id)) {
            $response = [
                'status' => $this->ok_response,
                'data' => 'Permission Group Deleted Successfully',
                'error' => null
            ];
        } else {
            $response = [
                'status' => $this->bad_request,
                'data' => [],
                'error' => $this->permission_group_model->errors()
            ];
        }

        return $this->respond($response, $response['status']);
    }
}
