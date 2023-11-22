<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\hotels;
use App\Models\bus;
use App\Models\car;
use App\Models\gallery;
use App\Models\tour;

use Hash;
use Session;

class CustomAdminController extends Controller
{

    //Admin Login view page(Get Method)

    public function login()
    {
        return view("Admin.login");
    }




   //Admin Registration view page(Get Method)

    public function registration()
    {
        return view("Admin.registration");
    }

    //Register an Admin(Post Method)
    public function registerAdmin(Request $request)
    {
                $request->validate([
                 'firstname'=>'required',
                 'lastname'=>'required',
                 'email'=>'required|email|unique:admins',
                 'phone'=>'required|numeric',
                 'present_address'=>'required',
                 'permanent_address'=>'required',
                 'password'=>'required|min:8|confirmed',
                 'password_confirmation'=>'required',
                 'gender'=>'required',
                 'bloodGroup'=>'required'
               ]);

               $admin = new Admin();
               $admin ->firstname = $request -> firstname;
               $admin ->lastname = $request -> lastname;
               $admin ->email = $request -> email;
               $admin ->phone = $request -> phone;
               $admin ->prsentaddress = $request -> present_address;
               $admin ->permanentaddress = $request -> permanent_address;
               $admin ->password = Hash::make( $request -> password );
               $admin ->gender = $request -> gender;
               $admin ->bg = $request -> bloodGroup;
               $res = $admin  ->   save();
               if($res){
                return back() -> with('success','Registration Successfull!!');
               }else{
                return back() -> with('fail','Unknown Error Occured!!!');
               }

            
    }


//login admin

    public function loginAdmin(Request $request)
    {
            $request->validate([
                'email'=>'required|email',
               'password'=>'required'
            ]);

            $admin = Admin::where('email', '=' , $request->email)->first();
            if($admin)
            {
                if(Hash::check($request->password , $admin->password))
                {
                    $request->session()->put('id',$admin->id);
                    return redirect('admin-dashboard');
                }else
                    
                {
                    return back()->with('fail','Invalid email or password');
                }
            } else
                {
                    return back()->with('fail','Invalid email or password');
                }
                
    }

   //profile segment



//showing view details

  
public function adminDetails($id)
{
    $data = array();
    if (Session::has('id')) {
        $data = Admin::where('id', '=', Session::get('id'))->first();
        
        
            return view("Admin.profile.details", compact('data'));
        
    }


}

 

   // getting edit page function(get method)

  public function adminEdit($id)
     {
          $data = Admin::where('id','=',$id)->first();
          return view('Admin.profile.edit',compact('data'));
     }

//update Admin(post method)
public function updateAdmin(Request $request, $id)
{
$request->validate([
                 'firstname'=>'required',
                 'lastname'=>'required',
                 'email'=>'email',
                 'phone'=>'required|numeric',
                 'present_address'=>'required',
                 'permanent_address'=>'required',
                 'password'=>'min:8',
                 
                 'gender'=>'required',
                 'bloodGroup'=>'required'
    
]);

// Find the admin record by ID
$data = Admin::find($id);

// Update the fields based on the request
$data->firstname = $request->input('firstname');
$data->lastname = $request->input('lastname');
$data->email = $request->input('email');
$data->phone = $request->input('phone');
$data->present_address = $request->input('prsentaddress');
$data->permanent_address = $request->input('permanentaddress');
$data->password = $request->input('password');
$data->gender = $request->input('gender');
$data->bloodGroup = $request->input('bg');



// Save the updated Admin record
$data->save();

return redirect()->back()->with('success', 'Admin record Updated Successfully');
}



//deleting Admin

public function adminDelete($id)
{


$data = array();
if (Session::has('id')) {
   $data = Admin::where('id', '=', Session::get('id'))->delete();
 
   
   return "Account Deleted.Thank you for your service";

   
}
  

}























//dashboard

    public function dashboardAdmin()
    {

        $data = array();
        if(Session::has('id'))
        {
            $data = Admin::where('id', '=' , Session::get('id'))->first();
        }
        return view('Admin.dashboard',compact('data'));
    }


    public function logoutAdmin()
    {
        if(Session::has('id'));
        {
            Session::pull('id');
            return redirect('admin-login');
        }
    }
   //Hotel segments

    //hotelList (Get Method)
    public function hotelList(Request $request)
    {
        
       
        $search = $request['search'] ?? "";
        $data = array();
        if(Session::has('id'))
        {
            $data = Admin::where('id', '=' , Session::get('id'))->first();
            if($search != ""){
                $hotels = hotels::where('name', 'LIKE', "%$search%")->orWhere('location', 'LIKE', "%$search%")->orWhere('address', 'LIKE', "%$search%")->get();
            }else{
                $hotels = hotels::all();
            }

        
        }

        return view("Admin.hotels.hotels",compact('data','hotels','search'));
    }


 

//showing view details

    public function hotelDetails($id)
{
    $data = array();
    if (Session::has('id')) {
        $data = Admin::where('id', '=', Session::get('id'))->first();
        $hotels = hotels::where('id', '=',$id)->first();
        
        
            return view("Admin.hotels.details", compact('data', 'hotels'));
        
    }


}


//deleting hotel

     public function hotelDelete($id)
     {
        
        
        $data = array();
        if (Session::has('id')) {
            $data = Admin::where('id', '=', Session::get('id'))->first();
            $hotel= hotels::where('id','=',$id)->delete();
            
            return view("Admin.hotels.delete", compact('data', 'hotel'))->with('success','Hotel Removed Succesfully');
              //  return view("Admin.hotels.details", compact('data', 'hotels'));
            
        }
           
      
     }


 //Adding new hotel form page(Get Method)
 public function addHotel()
 {
     return view("Admin.hotels.add");
 }





//Register Hotel(Post Method)
public function registerHotel(Request $request)
{
            $request->validate([
             'name'=>'required',
             'location'=>'required',
             'address'=>'required',
             'facilities'=>'required',
             'singlebed'=>'required|numeric',
             'doublebed'=>'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);


           // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

           $hotel = new hotels ();
           $hotel ->name = $request -> name;
           $hotel ->location = $request -> location;
           $hotel ->address = $request -> address;
           $hotel ->facilities = $request -> facilities;
           $hotel ->singlebed = $request -> singlebed;
           $hotel ->doublebed = $request -> doublebed;
           $hotel->image = 'images/' . $imageName;
           $res = $hotel  ->   save();
           if($res){
            return back() -> with('success','Hotel Registration Successfull!!');
           }else{
            return back() -> with('fail','Unknown Error Occured!!!');
           }

        
}


// getting edit page function(get method)

public function hotelEdit($id)
{
    $hotel = hotels::where('id','=',$id)->first();
   return view('Admin.hotels.edit',compact('hotel'));
}

//update hotel(post method)
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'location' => 'required',
        'address' => 'required',
        'facilities' => 'required',
        'singlebed' => 'required|numeric',
        'doublebed' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image to be optional
    ]);

    // Find the hotel record by ID
    $hotel = hotels::find($id);

    // Update the fields based on the request
    $hotel->name = $request->input('name');
    $hotel->location = $request->input('location');
    $hotel->address = $request->input('address');
    $hotel->facilities = $request->input('facilities');
    $hotel->singlebed = $request->input('singlebed');
    $hotel->doublebed = $request->input('doublebed');

    // Handle the image upload and update if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $hotel->image = 'images/' . $imageName;
    }

    // Save the updated hotel record
    $hotel->save();

    return redirect()->back()->with('success', 'Hotel Updated Successfully');
}


//   Bus Segment

    //buslList (Get Method)
    public function busList(Request $request)
    {
        
       
        $search = $request['search'] ?? "";
        $data = array();
        if(Session::has('id'))
        {
            $data = Admin::where('id', '=' , Session::get('id'))->first();
            if($search != ""){
                //where
                $bus = bus::where('operator', 'LIKE', "%$search%")->orWhere('coach_no', 'LIKE', "%$search%")->orWhere('brand', 'LIKE', "%$search%")->get();
            } else{
                $bus = bus::all();
            } 
        
        }
            return view("Admin.bus.bus",compact('data','bus','search'));
        

        
        
    }
     
 //showing view details

      
    public function busDetails($id)
    {
        $data = array();
        if (Session::has('id')) {
            $data = Admin::where('id', '=', Session::get('id'))->first();
            $bus = bus::where('id', '=',$id)->first();
            
            
                return view("Admin.bus.details", compact('data', 'bus'));
            
        }
    
    
    }


//Adding new bus form page(Get Method)
              public function addBus()
                {
                    return view("Admin.bus.add");
                }




 //Register bus(Post Method)
public function registerBus(Request $request)
{
            $request->validate([
             'operator'=>'required',
             'coach_no'=>'required',
             'type'=>'required',
             'brand'=>'required',
             'chesis'=>'required',
             'seat'=>'required|numeric',
             'bodyrent'=>'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);


           // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

           $bus = new bus ();
           $bus ->operator = $request -> operator;
           $bus ->coach_no = $request -> coach_no;
           $bus ->type = $request -> type;
           $bus ->brand = $request -> brand;
           $bus ->chesis = $request -> chesis;
           $bus ->seat = $request -> seat;
           $bus ->bodyrent = $request -> bodyrent;
           $bus->image = 'images/' . $imageName;
           $res = $bus  ->   save();
           if($res){
            return back() -> with('success','Bus Registration Successfull!!');
           }else{
            return back() -> with('fail','Unknown Error Occured!!!');
           }

        
}

           

       // getting edit page function(get method)

      public function busEdit($id)
         {
              $bus = bus::where('id','=',$id)->first();
              return view('Admin.bus.edit',compact('bus'));
         }

//update bus(post method)
public function updateBus(Request $request, $id)
{
    $request->validate([
        'operator' => 'required',
        'coach_no' => 'required',
        'type' => 'required',
        'brand' => 'required',
        'chesis' => 'required',
        'seat' => 'required|numeric',
        'bodyrent' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Allow image to be optional
    ]);

    // Find the hotel record by ID
    $bus = bus::find($id);

    // Update the fields based on the request
    $bus->operator = $request->input('operator');
    $bus->coach_no = $request->input('coach_no');
    $bus->type = $request->input('type');
    $bus->brand = $request->input('brand');
    $bus->chesis = $request->input('chesis');
    $bus->seat = $request->input('seat');
    $bus->bodyrent = $request->input('bodyrent');

    // Handle the image upload and update if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $hotel->image = 'images/' . $imageName;
    }

    // Save the updated hotel record
    $bus->save();

    return redirect()->back()->with('success', 'Bus Info Updated Successfully');
}



//deleting bus

public function busDelete($id)
{
   
   
   $data = array();
   if (Session::has('id')) {
       $data = Admin::where('id', '=', Session::get('id'))->first();
       $bus= bus::where('id','=',$id)->delete();
       
       return view("Admin.bus.delete", compact('data', 'bus'))->with('success','Bus Removed Succesfully');

       
   }
      
 
}




              
//   Car Segment

    //carlList (Get Method)
    public function carList(Request $request)
    {
        
       
        $search = $request['search'] ?? "";
        $data = array();
        if(Session::has('id'))
        {
            $data = Admin::where('id', '=' , Session::get('id'))->first();
            if($search != ""){
                //where
                $car = car::where('reg_no', 'LIKE', "%$search%")->orWhere('company', 'LIKE', "%$search%")->orWhere('model', 'LIKE', "%$search%")->get();
            }else{
                $car = car::all();
            }
           
        
        }

        return view("Admin.cars.car",compact('data','car','search'));
        
    }
     
 //showing view details

      
    public function carDetails($id)
    {
        $data = array();
        if (Session::has('id')) {
            $data = Admin::where('id', '=', Session::get('id'))->first();
            $car = car::where('id', '=',$id)->first();
            
            
                return view("Admin.cars.details", compact('data', 'car'));
            
        }
    
    
    }


//Adding new car form page(Get Method)
              public function addcar()
                {
                    return view("Admin.cars.add");
                }




 //Register car(Post Method)
public function registerCar(Request $request)
{
            $request->validate([
             'company'=>'required',
             'reg_no'=>'required',
             'type'=>'required',
             'model'=>'required',
             'year'=>'required',
             'seat'=>'required|numeric',
             'bodyrent'=>'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);


           // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

           $car = new car ();
           $car ->company = $request -> company;
           $car ->reg_no = $request -> reg_no;
           $car ->type = $request -> type;
           $car ->model = $request -> model;
           $car ->year = $request -> year;
           $car ->seat = $request -> seat;
           $car ->bodyrent = $request -> bodyrent;
           $car->image = 'images/' . $imageName;
           $res = $car  ->   save();
           if($res){
            return back() -> with('success','Car Registration Successfull!!');
           }else{
            return back() -> with('fail','Unknown Error Occured!!!');
           }

        
}

           

       // getting edit page function(get method)

      public function carEdit($id)
         {
              $car = car::where('id','=',$id)->first();
              return view('Admin.cars.edit',compact('car'));
         }

//update car(post method)
public function updateCar(Request $request, $id)
{
    $request->validate([
        'company'=>'required',
        'reg_no'=>'required',
        'type'=>'required',
        'model'=>'required',
        'year'=>'required',
        'seat'=>'required|numeric',
        'bodyrent'=>'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Find the car record by ID
    $car = car::find($id);

    // Update the fields based on the request
    $car->company = $request->input('company');
    $car->reg_no = $request->input('reg_no');
    $car->type = $request->input('type');
    $car->model = $request->input('model');
    $car->year = $request->input('year');
    $car->seat = $request->input('seat');
    $car->bodyrent = $request->input('bodyrent');

    // Handle the image upload and update if a new image is provided
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $hotel->image = 'images/' . $imageName;
    }

    // Save the updated hotel record
    $car->save();

    return redirect()->back()->with('success', 'Car Info Updated Successfully');
}



//deleting car

public function carDelete($id)
{
   
   
   $data = array();
   if (Session::has('id')) {
       $data = Admin::where('id', '=', Session::get('id'))->first();
       $car= car::where('id','=',$id)->delete();
       
       return view("Admin.cars.delete", compact('data', 'car'))->with('success','Car Removed Succesfully');

       
   }
      
 
}


//image section







    
    //imagelList (Get Method)
    public function imageList(Request $request)
    {
        
       
        $search = $request['search'] ?? "";
        $data = array();
        if(Session::has('id'))
        {
            $data = Admin::where('id', '=' , Session::get('id'))->first();
            if($search != ""){
                $image = gallery::where('image', 'LIKE', "%$search%")->get();
            }else{
                $image = gallery::all();
        
            }
       
        }

        return view("Admin.gallery.gallery",compact('data','image','search'));
        
    }
     
 


//Adding new image form page(Get Method)
              public function addimage()
                {
                    return view("Admin.gallery.add");
                }




 //Register image(Post Method)
public function registerImage(Request $request)
{
            $request->validate([
             
             'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);


           // Handle the image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        }

           $image= new gallery ();
          
           $image->image = 'images/' . $imageName;
           $res = $image  ->   save();
           if($res){
            return back() -> with('success','Image Uploaded');
           }else{
            return back() -> with('fail','Unknown Error Occured!!!');
           }

        
}

//deleting image

public function imageDelete($id)
{
   
   
   $data = array();
   if (Session::has('id')) {
       $data = Admin::where('id', '=', Session::get('id'))->first();
       $image= gallery::where('id','=',$id)->delete();
       
       return view("Admin.gallery.delete", compact('data', 'image'))->with('success','Image Removed Succesfully');

       
   }
      
 
}

//upcoming tour segment


 //carlList (Get Method)
 public function tourList(Request $request)
 {
     
    
     $search = $request['search'] ?? "";
     $data = array();
     if(Session::has('id'))
     {
         $data = Admin::where('id', '=' , Session::get('id'))->first();
         if($search !=""){
            $tour = tour::where('title', 'LIKE', "%$search%")->get();
         }else{
            $tour = tour::all();
         }
         
     
     }

     return view("Admin.upcoming_tours.tour",compact('data','tour','search'));
     
 }
  
//showing view details

   
 public function tourDetails($id)
 {
     $data = array();
     if (Session::has('id')) {
         $data = Admin::where('id', '=', Session::get('id'))->first();
         $tour = tour::where('id', '=',$id)->first();
         
         
             return view("Admin.upcoming_tours.details", compact('data', 'tour'));
         
     }
 
 
 }


//Adding new car form page(Get Method)
           public function addtour()
             {
                 return view("Admin.upcoming_tours.add");
             }




//Register car(Post Method)
public function registerTour(Request $request)
{
         $request->validate([
          'title'=>'required',
          'description'=>'required',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        // Handle the image upload
     if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('images'), $imageName);
     }

        $tour = new tour ();
        $tour ->title = $request -> title;
        $tour ->description = $request -> description;
        $tour->image = 'images/' . $imageName;
        $res = $tour  ->   save();
        if($res){
         return back() -> with('success','A new Upcoming Tour added');
        }else{
         return back() -> with('fail','Unknown Error Occured!!!');
        }

     
}

        

    // getting edit page function(get method)

   public function tourEdit($id)
      {
           $tour = tour::where('id','=',$id)->first();
           return view('Admin.upcoming_tours.edit',compact('tour'));
      }

//update car(post method)
public function updateTour(Request $request, $id)
{
 $request->validate([
     'title'=>'required',
     'description'=>'required',
     'image' => 'mimes:jpeg,png,jpg,gif|max:2048'
 ]);

 // Find the car record by ID
 $tour = tour::find($id);

 // Update the fields based on the request
 $tour->title = $request->input('title');
 $tour->description = $request->input('description');


 // Handle the image upload and update if a new image is provided
 if ($request->hasFile('image')) {
     $image = $request->file('image');
     $imageName = time() . '.' . $image->getClientOriginalExtension();
     $image->move(public_path('images'), $imageName);
     $hotel->image = 'images/' . $imageName;
 }

 // Save the updated hotel record
 $tour->save();

 return redirect()->back()->with('success', 'Upcoming Tour Info Updated Successfully');
}



//deleting car

public function tourDelete($id)
{


$data = array();
if (Session::has('id')) {
    $data = Admin::where('id', '=', Session::get('id'))->first();
    $tour= tour::where('id','=',$id)->delete();
    
    return view("Admin.upcoming_tours.delete", compact('data', 'tour'))->with('success','Tour Removed Succesfully');

    
}
   

}



//mail handler


//view page function
public function contactForm()
{

    $data = array();
if (Session::has('id')) {
    $data = Admin::where('id', '=', Session::get('id'))->first();

    
    return view("Admin.contact.contactform",compact('data'));

    
}
  
}



//sending mail function

public function  send(Request $request)
{
    $request->validate([
       'name'=>'required',
       'email'=>'required|email',
       'subject'=>'required',
       'message'=>'required',
    ]);



  if($this->isOnline())
  {

    $mail_data =['recipient' => 'travelELL@gmail.com',
    'fromEmail' => $request -> email,
    'fromName' => $request -> name,
    'subject' => $request -> subject,
    'body' => $request -> message,
  ];
    \Mail:: send("email-template",$mail_data,function($message)use($mail_data){
        $message->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'],$mail_data['fromName'])
                ->subject($mail_data['subject']);
    });

    return redirect()->back()->with('success','Email sent');
    
  }else{
    return redirect()->back()->withInput()->with('error','Check your Internet Connection');
  }


}



public function isOnline($site = "https://youtube.com/")
{
    if(@fopen($site, "r"))
    {
        return true;
    }else{
        return false;
    }
}

}

        
        
        
