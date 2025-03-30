<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userform;
use Illuminate\Http\Request;

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

        Userform::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contactno' => $validatedData['contactno'],
            'state' => $validatedData['state'],
            // 'project' => $validatedData['project'],
            'language' => $validatedData['language'],
            'address' => $validatedData['address'],
            // 'pancart' => $validatedData['pancart'],
            'image' => json_encode($imagePaths),  
            'resume' => json_encode($resumePaths),  
            'gender' => json_encode($validatedData['gender']),  
            'data_of_brth' => json_encode($validatedData['data_of_brth']), 
            // 'age' => json_encode($validatedData['age']),  
        ]);

        return redirect()->route('dashboard')->with('success', 'User registered successfully.');
    }


    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contactno' => 'required',
            'project' => 'required',
            'state' => 'required',
            'language' => 'required',
            'address' => 'nullable|string',
            // 'pancart' => 'nullable|string',
            'data_of_brth' => 'nullable|date',
            // 'age' => 'nullable|integer',
            'image' => 'nullable|image|max:2048',
            'resume' => 'nullable|mimes:pdf,doc,docx|max:2048',
            'gender' => 'nullable|string'
        ]);

        $user = Userform::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $user->image = $imagePath;
        }

        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('uploads', 'public');
            $user->resume = $resumePath;
        }

        $user->update($request->except(['_token', '_method', 'image', 'resume']));

        return redirect()->route('userforms.index')->with('success', 'User updated successfully!');
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
