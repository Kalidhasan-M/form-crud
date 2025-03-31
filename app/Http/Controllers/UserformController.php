<?php

namespace App\Http\Controllers;

use App\Mail\NotificationMail;
use App\Models\User;
use App\Models\Userform;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserformController extends Controller
{
    public function index()
    {

        return view('form');
    }

    public function edit($id)
    {
        $user = Userform::findOrFail($id);
        return view('list', compact('user'));
    }
    public function show($id)
    {
        $user = Userform::findOrFail($id);
        return view('list', compact('user'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:userforms,email',
            'contactno' => 'required|string|unique:userforms,contactno',
            // 'pancart' => 'required|string|unique:userforms,pancart',
            'data_of_brth' => 'required|min:1',
            // 'data_of_brth.*' => 'date',
            // 'age' => 'required|array|min:1',
            // 'age.*' => 'numeric',
            'state' => 'required|string|max:255',
            // 'project' => 'required|string|max:255',
            'language' => 'required|string|max:50',
            'address' => 'required|string|max:500',
            'gender' => 'required|max:10',
            // 'gender.*' => 'string',
            'image.*' => 'nullable',
            'resume.*' => 'nullable',
        ]);

        $imagePaths = [];
        $resumePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }

        if ($request->hasFile('resume')) {
            foreach ($request->file('resume') as $resume) {
                $resumePaths[] = $resume->store('resumes', 'public');
            }
        }

        $user = Userform::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contactno' => $validatedData['contactno'],
            'state' => $validatedData['state'],
            'language' => $validatedData['language'],
            'address' => $validatedData['address'],
            'image' => json_encode($imagePaths),  
            'resume' => json_encode($resumePaths),  
            'gender' => json_encode($validatedData['gender']),  
            'data_of_brth' => json_encode($validatedData['data_of_brth']), 
        ]);
    

          // Prepare data for email
    $data = [
        'name' => $user->name,
        'email' => $user->email,
        'contactno' => $user->contactno,
        'state' => $user->state,
        'language' => $user->language,
        'address' => $user->address,
        'gender' => $user->gender,
        'data_of_brth' => $user->data_of_brth,
    ];

    // Send email
    Mail::to($user->email)->send(new NotificationMail($data));

    return redirect()->route('dashboard')->with('success', 'Admission submitted successfully! A confirmation email has been sent.');
}


    public function update(Request $request, $id)
    {
        $user = Userform::findOrFail($id);
        
        // Update basic fields
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contactno = $request->contactno;
        $user->state = $request->state;
        $user->language = $request->language;
        $user->address = $request->address;
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $images = [];
            foreach ($request->file('image') as $image) {
                $images[] = $image->store('images', 'public');
            }
            $user->image = json_encode($images);
        }
        if ($request->hasFile('resume')) {
            $resumes = [];
            foreach ($request->file('resume') as $resume) {
                $resumes[] = $resume->store('resumes', 'public');
            }
            $user->resume = json_encode($resumes);
        }
        $user->gender = json_encode($request->gender);
        $user->data_of_brth = json_encode($request->data_of_brth);
        $user->save();
        return redirect()->back()->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = Userform::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully!');
    }



    // public function destroy(Userform $userform)
    // {


    //     $userform->delete();
    //     return redirect()->route('userforms.index')->with('success', 'User deleted successfully.');
    // }
}

