<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class AdminController extends Controller
{
    public function index(Request $req)
    {

        return view('admin.admin', ['page_title' => 'Dashboard']);
    }

    public function posts(Request $req, $type = " ") //$type này là từ variable của cái get bên route gửi tời nhập từ thanh url(user nhập gì vào {type}), dùng ="" để sửa nếu ko nhập gì vào variable trên url
    {
        switch ($type) {
            case 'add':
                if ($req->method() == "POST")//CHECK IF SOMETHING IS POSTED
                 {
                    $validated = $req->validate([
                        'title' => 'required|string',  //Đằng trước muỗi tên ví dụ như 'file' thì cái 'file' đó là cái name='file' bên cái form bên view
                        'file' => 'required|image',
                        'content' => 'required',

                    ]);
                    //

                    $path= $req->file('file')->store('/',['disk'=>'my_disk']) ;   //cái 'file' là lấy bên cái name="file" bên cái form add_post QUAN TRỌNG STORE THIS FILE INSIDE A FOLDER HERE BUT USE THis DISK (nhớ vào config/filesystem sửa lại chỗ lưu)

                    $data['title'] = $req->input('title');
                    $data['category_id']=1;
                    $data['image'] = $path;
                    $data['content'] = $req->input('content');
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $data['updated_at'] =date("Y-m-d H:i:s");

                    $post = new Post();
                    $post->insert($data);
                    /*file_put_contents("hello.txt",$req->input('content'));*/  /* save info to a file */

                }
                return view('admin.add_post', ['page_title' => 'New Post']);
                break;

            case 'edit':
                return view('admin.posts', ['page_title' => 'Edit Posts']);
                break;

            case 'delete':
                return view('admin.posts', ['page_title' => 'Delete Posts']);
                break;

            default:
            //$post = new Post();
            //$rows = $post->all();

            $query= "select posts.*,categories.category from posts join categories on posts.category_id = categories.id";
            $rows = DB::select($query);

            $data['rows'] = $rows;
            $data['page_title']='Posts';
            return view('admin.posts', $data);
                break;
        }
    }
    public function categories(Request $req)
    {
        return view('admin.admin', ['page_title' => 'Categories']);
    }
    public function users(Request $req)
    {
        return view('admin.admin', ['page_title' => 'Users']);
    }


    public function save(Request $req)
    {
        $arr = [
            "key" => 'required|string',
            "key" => 'required|image',
        ];

        $validate = $req->validate($arr);

        return view('view');
    }
}
