<?php


namespace App\Http\Controllers;


use App\Librarys\Generate\Parsedown;

class TestController extends Controller
{

    public function index()
    {
        // $Parsedown = new Parsedown();
        //
        // $app_path = getDir(app_path().'/ApiDocs');
        //
        // $data = file_get_contents( $app_path[0]);

        // dd($data);
        // echo $Parsedown->text($data);
        // dd($data);
        dd(public_path());
        $path = "D:\phpstudy_pro\WWW\laravel-manage-api\app/ApiDocs/Markdown/api/agent/v1/community/user/list.md";
        $start = strpos($path, 'Markdown')+9;

dd(explode('/',substr($path, $start)));
        dd(str_replace('.md','.html',substr($path, $start)));
    }
}
