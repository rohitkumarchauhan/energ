<?php

namespace App\Http\Controllers;

use App\SystemFile;
use Illuminate\Http\Request;

class MediaController extends VBaseController
{
    //


    public function delete_media(Request $request)
    {

        $data = [];

        $data['status '] = 'NOK';

        if (empty($request->all())) {
            return $data;
        }

        $model = SystemFile::find($request->id);
        if (!empty($model)) {
            $path = storage_path() . '/app/' . $model->disk_name;
            if (file_exists($path)) {
                @unlink(storage_path() . '/app/' . $model->disk_name);
            }
            $model->delete();
            $data['status '] = 'OK';
            return $data;
        }

        return $data;

    }


    public function delete_media_by_id($id)
    {

        $data = [];
        $data['status '] = 'NOK';
        $model = SystemFile::find($id);
        if (!empty($model)) {
            $path = storage_path() . '/app/' . $model->disk_name;
            if (file_exists($path)) {
                @unlink(storage_path() . '/app/' . $model->disk_name);
            }
            $model->delete();
            $data['status '] = 'OK';
            return $data;
        }
        return $data;
    }


}
