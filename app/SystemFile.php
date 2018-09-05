<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class SystemFile extends Model
{


    const IS_PUBLIC = 1;
    const IS_PRIVATE = 0;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'disk_name',
        'file_name',
        'file_size',
        'content_type',
        'field_name',
        'alt',
        'keywords',
        'model_id',
        'model_type',
        'status'
    ];

    public static function getImageUrl($model, $field = 'image')
    {
        if ($model != null) {
            try {
                $file = SystemFile::where([
                    'model_id' => $model->id,
                    'model_type' => get_class($model),
                    'field_name' => $field
                ])->first();

                if ($file != null) {
                    $path = storage_path() . '/app/' . $file->disk_name;
                    if (file_exists($path)) {
                        $file_path = base64_encode($file->disk_name);
                        return asset("storage/$file->disk_name");
                    }
                }
            } catch (\Exception $e) {
                return "";
            }
        }

        return "";
    }


    public function getImageAbsolutePath($model)
    {

        if (!empty($model)) {
            $path = storage_path('app/' . $model->disk_name);
            if (file_exists($path)) {
                $file_path = base64_encode($model->disk_name);
                return asset("../storage/app/" . $model->disk_name);
            } else {
                return asset('images/backend_images/admin.jpg');
            }
        }
    }

    public static function getDownloadUrl($model, $field = 'image')
    {
        $file = SystemFile::where([
            'model_id' => $model->id,
            'model_type' => get_class($model),
            'field_name' => $field
        ])->orderBy('created_at', 'DESC')->first();
        if ($file != null) {
            $file_path = base64_encode($file->disk_name);
            return url('download/' . $file_path);
        }
        return "#";
    }

    public static function saveUploadedFile($image_file, $model, $field = 'image', $type = false)
    {


        if ($image_file != null) {
            $folder_name = "/uploads";

            $path = $image_file->store($folder_name);
            chmod(storage_path() . '/app/' . $path, 0777);
            $image = SystemFile::where([
                'model_type' => get_class($model),
                'model_id' => $model->id != null ? $model->id : 0
            ])->first();

            if ($image == null) {
                $image = new SystemFile();
            } else {
                @unlink(storage_path() . '/app/' . $image->disk_name);

            }

            $image->disk_name = $path;
            $image->file_name = $image_file->getClientOriginalName();
            $image->file_size = $image_file->getClientSize();
            $image->content_type = $image_file->getMimeType();
            $image->field_name = $field;
            $image->model_id = $model->id != null ? $model->id : 0;
            $image->model_type = get_class($model);
            $image->session_id = session()->getId();
            $image->status = self::IS_PUBLIC;


            if ($image->save()) {
                return $image->id;
            }
        }
        return false;
    }


    public static function saveUploadedFiles($image_file, $model, $field = 'image', $type = false)
    {


        if ($image_file != null) {
            $folder_name = "/uploads";

            $path = $image_file->store($folder_name);
            chmod(storage_path() . '/app/' . $path, 0777);
//            $image = SystemFile::where([
//                'model_type' => get_class($model),
//                'model_id' => $model->id != null ? $model->id : 0
//            ])->first();

//            if ($image == null) {
            $image = new SystemFile();
//            } else {
//                @unlink(storage_path() . '/app/' . $image->disk_name);
//
//            }

            $image->disk_name = $path;
            $image->file_name = $image_file->getClientOriginalName();
            $image->file_size = $image_file->getClientSize();
            $image->content_type = $image_file->getMimeType();
            $image->field_name = $field;
            $image->model_id = $model->id != null ? $model->id : 0;
            $image->model_type = get_class($model);
            $image->session_id = session()->getId();
            $image->status = self::IS_PUBLIC;


            if ($image->save()) {
                return $image->id;
            }
        }
        return false;
    }

    public static function getImageName($model, $field = 'image')
    {
        $file = SystemFile::where([
            'model_id' => $model->id,
            'model_type' => get_class($model),
            'field_name' => $field
        ])->first();
        if ($file != null) {
            return $file->file_name;
        }
        return "";
    }

    public static function removeFile($model, $field = 'image')
    {
        $file = SystemFile::where([
            'model_id' => $model->id,
            'model_type' => get_class($model),
            'field_name' => $field
        ])->first();
        if ($file != null) {
            @unlink(storage_path() . '/app/' . $file->disk_name);
            $file->delete();
            return true;
        }

        return false;
    }

    public function getUrl()
    {
        $file_path = base64_encode($this->disk_name);
        return url('images/' . $file_path);
    }


    public static function getActiveClass($permission, $sub = false)
    {


        if ($permission == 'admin.user.list') {
            $routes_ar = User::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }


        if ($permission == 'admin.garments.list') {
            $routes_ar = Category::getRoutesArray();
            $fabrics = Fabric::getRoutesArray();
            $garments_option = GarmentOption::getRoutesArray();
            $product = Product::getRoutesArray();

            $routes_ar = array_merge($routes_ar, $fabrics, $garments_option, $product);
            return self::getClass($routes_ar, $sub);

        }

        if ($permission == 'admin.garments.garment.list') {

            $routes_ar = Category::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.garments.fabrics.list') {

            $routes_ar = Fabric::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }


        if ($permission == 'admin.garments.garments_option.list') {
            $routes_ar = GarmentOption::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.measurements.list') {
            $routes_ar = MeasurementOption::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.products.list') {
            $routes_ar = Product::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.roles.list') {
            $routes_ar = self::getRouteRole();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.liningmaterial.list') {
            $routes_ar = LiningMaterial::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.garment_measurementOptions.list') {
            $routes_ar = GarmentMeasurementOption::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.bank_details.list') {
            $routes_ar = MerchantBankAccount::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }


        if ($permission == 'admin.garments.lining_colour.list') {
            $routes_ar = LiningColour::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }

        if ($permission == 'admin.pages.list') {
            $routes_ar = Page::getRoutesArray();
            return self::getClass($routes_ar, $sub);
        }


    }

    public static function getClass($routes_ar, $sub)
    {

        if (in_array(Route::getCurrentRoute()->getName(), $routes_ar)) {
            if ($sub == true) {
                return 'active';
            } else {

                return 'open';
            }
        }
    }


    public static function getRouteRole()
    {

        return [
            'roles.create',
            'roles.edit',
            'roles.index'
        ];
    }

    function generateThumbnail($img = "/var/www/html/bespoke/public/images/backend_images/admin.jpg", $width = "50", $height = "50", $quality = 90)
    {
        // echo "<img src=$img> </img>";die;
        if (is_file($img)) {
            $imagick = new \Imagick(realpath($img));

            $imagick->setImageFormat('jpeg');
            $imagick->setImageCompression(Imagick::COMPRESSION_JPEG);
            $imagick->setImageCompressionQuality($quality);
            $imagick->thumbnailImage($width, $height, false, false);
            $temp = explode('.', $img);
            $filename_no_ext = reset($temp);
            if (file_put_contents($filename_no_ext . '_thumb' . '.jpg', $imagick) === false) {
                throw new \Exception("Could not put contents.");
            }
            return $filename_no_ext . '_thumb' . '.jpg';
        } else {
            throw new \Exception("No valid image provided with {$img}.");
        }
    }
}
