<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PostAbout;
use App\Models\Service;
use App\Models\SubAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if($request != ""){
            $services = Service::where('title', 'like',"%{$search}%")->paginate(10);
            
            //$posts = Post::with('gallery', 'category')->paginate(10);

        }
        else{
            $services = Service::with('users')->paginate(10);
        }
      //  $services = Service::with('users')->paginate(8);
        return view('auth.services.index', compact('services','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'title' => 'required',
        ]);
 
        $data = $request->content;

       //loading the html data from the summernote editor and select the img tags from it
       $dom = new \DOMDocument();            
          
       $dom->loadHtml(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8')); 
     // $dom->encoding = 'utf-8';
       $images = $dom->getElementsByTagName('img');

    
     foreach($images as $k => $img){
         //for now src attribute contains image encrypted data in a nonsence string
         $data = $img->getAttribute('src');
        
         //getting the original file name that is in data-filename attribute of img
         $file_name = $img->getAttribute('data-filename');

         //extracting the original file name and extension
         
         $arr = explode('.', $file_name);
         $upload_base_directory = 'public/upEditor/';

          ///** change name file upload */        

        // $original_file_name=$k.time();
         $original_file_name = time().rand(000,999).$k;
         $original_file_extension='png';

         if (sizeof($arr) ==  2) {
              $original_file_name = $arr[0];
              //แปลงชื่อไฟล์
              //$name_new = md5($original_file_name);
              $original_file_extension = $arr[1];
         }
         else
         {
              //the file name contains extra . in itself
              $original_file_name = implode("_",array_slice($arr,0,sizeof($arr)-1));
              $original_file_extension = $arr[sizeof($arr)-1];
         }

         list($type, $data) = explode(';', $data);
         list(, $data)      = explode(',', $data);

         $data = base64_decode($data);

         $path = $upload_base_directory.$original_file_name.'.'.$original_file_extension;

         //uploading the image to an actual file on the server and get the url to it to update the src attribute of images
         Storage::put($path, $data);

         $img->removeAttribute('src');       
         //you can remove the data-filename attribute here too if you want.
         $img->setAttribute('src', Storage::url($path));
         // data base stuff here :
         //saving the attachments path in an array
     }

     //updating the summernote WYSIWYG markdown output.
     $data = $dom->saveHTML($dom->documentElement);
     //unset($dom);
		
		
		 $filenamewithextension = $request->file('image')->getClientOriginalName();
         
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('image')->storeAs('public/images/services', $filenametostore);

        //$file = $request->file;
				
     //   $name_gen = hexdec(uniqid());
                //ดึงและแปลงนามสกุลไฟล์เป็นตัวเล็ก
       // $img_ext = strtolower($file->getClientOriginalExtension());
                //ต่อชื่อไฟล์		
			
       // $fileName = $name_gen.'.'.$img_ext;
		//	$request->file('file')->store('files', $fileName);
             
		// $imgePath = $file->move(public_path('files'), $fileName);



            Service::create([            
              'title' => $request->title,
              'image' => $filenametostore,
              'link' => $request->link,
              'content' => $data,             
              'users_id' => $user->id
 
          ]);
 
          return to_route('services.index')->with('success', 'Create Data Update successfully');
     
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        $services = Service::where('id',$id)->get();
        return view('website.services.index',compact('services','navmenu','submenu'));
       
    }
	
	public function showall()
	{
		$services = Service::all();
		$navmenu = PostAbout::all();
		$submenu = SubAbout::all();
			//return $Banners;
		return view('website.servicesall.index', compact('services','navmenu','submenu'));
	}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
       // $services = Service::all();

        return view('auth.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {        
        $user = auth()->user();

        if($request->content){
            $data = $request->content;

            //loading the html data from the summernote editor and select the img tags from it
            $dom = new \DOMDocument();
            //$dom->loadHtml($data, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD); 
            $dom->loadHtml(mb_convert_encoding($data, 'HTML-ENTITIES', 'UTF-8')); 
            //$dom->encoding = 'utf-8';
      
            $images = $dom->getElementsByTagName('img');
           
           
            foreach($images as $k => $img){
                //for now src attribute contains image encrypted data in a nonsence string
                $data = $img->getAttribute('src');
                
               
                //getting the original file name that is in data-filename attribute of img
                $file_name = $img->getAttribute('data-filename');
      
                //extracting the original file name and extension
                
                $arr = explode('.', $file_name);
                $upload_base_directory = 'public/upEditor/';
      
                 ///** change name file upload */        
      
               // $original_file_name=$k.time();
                $original_file_name = time().$k.'png';
                $original_file_extension='png';
      
               if (sizeof($arr) ==  2) {
                     $original_file_name = $arr[0];
                     //แปลงชื่อไฟล์
                     $name_new = md5($original_file_name);
                     $original_file_extension = $arr[1];
               }
                else
                {
                     //the file name contains extra . in itself
                     $original_file_name = implode("_",array_slice($arr,0,sizeof($arr)-1));
                     $original_file_extension = $arr[sizeof($arr)-1];
                }
                //dd(count(explode('.', $data)));
                if(count(explode('.', $data))>1){
                    //dd($data);
                }else{
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    //dd($data);
                    $path = $upload_base_directory.$name_new.'.'.$original_file_extension;
        
                    //uploading the image to an actual file on the server and get the url to it to update the src attribute of images
                    Storage::put($path, $data);
        
                    $img->removeAttribute('src');       
                    //you can remove the data-filename attribute here too if you want.
                    $img->setAttribute('src', Storage::url($path));
                }
                // data base stuff here :
                //saving the attachments path in an array
            }
      
            //updating the summernote WYSIWYG markdown output.
            $data = $dom->saveHTML($dom->documentElement); 
           // unset($dom);

            Service::where('id',$service->id)->update(['content' => $data]);


        }
		 if($request->hasFile('image')) {
            $this->validate($request, [                 
                'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg',
               
    
            ]);
            //get filename with extension
            $filenamewithextension = $request->file('image')->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $request->file('image')->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
     
            //Upload File
            $request->file('image')->storeAs('public/images/services', $filenametostore);
           // $request->file('file')->public_path('storage/images/banners'.$filenametostore);
           // $request->file('file')->storeAs('public/images/banners/thumbnail', $filenametostore);
            
            Service::where('id',$service->id)->update(['image' => $filenametostore]);

        }

       
        $service->update([
        'title' => $request->title,
        'link' => $request->link,         
        'users_id' => $user->id

    ]);
     
        // dd($request->all());
        return to_route('services.index')->with('warning', 'Edit Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //dd($services);
         $service->delete();

        return to_route('services.index')->with('danger', 'Service Data Delete successfully');
    }
}