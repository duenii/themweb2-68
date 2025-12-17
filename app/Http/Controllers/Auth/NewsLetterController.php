<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\PostAbout;
use App\Models\SubAbout;
use Illuminate\Http\Request;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newsletter = NewsLetter::orderBy('updated_at', 'DESC')->paginate(10);
        //return $Banners;
        return view('auth.newsletter.index', compact('newsletter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required', 'min:3', 'max:255', 'string',       
            'image' => 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg',
           

        ]);
		
		
		 //dd($postabouts->id);
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
      // unset($dom);
      // dd($data);
		

        $filenamewithextension = $request->file('image')->getClientOriginalName();
         
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
 
        //get file extension
        $extension = $request->file('image')->getClientOriginalExtension();
 
        //filename to store
        $filenametostore = $filename.'_'.time().'.'.$extension;
 
        //Upload File
        $request->file('image')->storeAs('public/images/newsletter', $filenametostore);

        //$file = $request->file;
				
     //   $name_gen = hexdec(uniqid());
                //ดึงและแปลงนามสกุลไฟล์เป็นตัวเล็ก
       // $img_ext = strtolower($file->getClientOriginalExtension());
                //ต่อชื่อไฟล์		
			
       // $fileName = $name_gen.'.'.$img_ext;
		//	$request->file('file')->store('files', $fileName);
             
		// $imgePath = $file->move(public_path('files'), $fileName);

         NewsLetter::create([
            'name' => $request->name,
            'image' => $filenametostore,
            'link' => $request->linkdata,
            'content' => $data, 
            'status' => $request->status,
            'users_id' => $user->id
            ]);

		 	return to_route('newsletter.index')->with('success', 'Create Data Update successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $newsletter = NewsLetter::all();
        //return $Banners;
        return view('website.newsletter.index', compact('newsletter'));
    }

    public function showtotal()
    {
        $newsletter = NewsLetter::orderBy('updated_at', 'DESC')->get();
        $navmenu = PostAbout::all();
        $submenu = SubAbout::all();
        //return $Banners;
        return view('website.newsletter.index', compact('newsletter','navmenu','submenu'));
    }
 
    /** 
     * 
     * Show the form for editing the specified resource.
     */
    public function edit(NewsLetter $newsletter)
    {
        return view('auth.newsletter.edit', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsLetter $newsletter)
    {
        $user = auth()->user();
        

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
            $request->file('image')->storeAs('public/images/newsletter', $filenametostore);
           // $request->file('file')->public_path('storage/images/banners'.$filenametostore);
           // $request->file('file')->storeAs('public/images/banners/thumbnail', $filenametostore);
            
            NewsLetter::where('id',$newsletter->id)->update(['image' => $filenametostore]);

        }
		
        $newsletter->update([
            'name' => $request->name,        
		    'link' => $request->linkdata,         
			'status' => $request->status,
            'users_id' => $user->id
        ]);
        // dd($request->all());
        return to_route('newsletter.index')->with('warning', 'Edit Data Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsLetter $newsletter)
    {
        $newsletter->delete();

        return to_route('newsletter.index')->with('danger', 'Delete Data deleted successfully');
    }
}
