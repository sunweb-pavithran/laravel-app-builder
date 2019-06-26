<?php
namespace App\Http\Controllers;
ini_set('max_execution_time', 900);
use Illuminate\Http\Request;
use Validator;


class CommandController extends Controller
{
    public function execTest()
    {
        $d = 'dir';
        exec('cd .. && cd .. && '. $d, $output, $return);
        dd($output);
    }

    public function buildProject(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'project_name' => 'required',
          'version' => 'required',
          'auth' => 'required'
        ]);

        if($validator->fails()){
          return response()->json(['errors' => $validator->errors()->all()]);
        }

        $project_name = $request->input("project_name");
        $auth = $request->input("auth");
        $version = $request->input("version");
        $output1 = '';

        if($auth == 'yes'){
          exec('cd .. && cd .. && composer create-project laravel/laravel="'
                .$version.'.*" '
                .$project_name.'', $output, $return);
          exec('cd .. && cd .. && cd '
                .$project_name.' && php artisan key:generate && php artisan make:auth',$output1, $return1);
        }else{
          exec('cd .. && composer create-project laravel/laravel="'
                .$version.'.*" '
                .$project_name.'', $output, $return);
        }

        if($return == 0){
          return response()->json(['msg' => 'Your project was built successfully. Find it outside the app directory', 'output' => $output, 'output1' => $output1]);
        }else{
          return response()->json(['warn' => 'Your project failed to build. Check the output to debug', 'output' => $output, 'output1' => $output1]);
        }
    }
}
