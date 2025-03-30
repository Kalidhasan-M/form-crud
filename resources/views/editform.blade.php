<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Project Management</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-6">
        <form action="{{ url('/userforms/'.$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
            <h2 class="text-xl font-bold mb-6"> USER DETAILS</h2>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold">Name</label>
                    <input type="text"  value="{{ $user->name }}" placeholder="Enter Contract Number" class="w-full border p-2 rounded "  name="name">
                </div>
                <div>
                    <label class="block font-semibold">Email</label>
                    <input type="email" value="{{ $user->email }}" placeholder="Enter Contract Number" class="w-full border p-2 rounded "  name="email">
                </div>
    
                <div>
                    <label class="block font-semibold">Contact Number</label>
                    <input type="text" placeholder="Enter Contact Number" class="w-full border p-2 rounded " value="{{ $user->contactno }}"  name="contactno">
                </div>
                
                {{-- <div>
                    <label class="block font-semibold">Adhar No</label>
                    <input type="text" placeholder="Enter Tender No" class="w-full border p-2 rounded " value="{{ $user->adhar }}"  name="adhar">
                </div> --}}
                
                {{-- <div>
                    <label class="block font-semibold">Project Name</label>
                    <input type="text" placeholder="Enter Project Name" class="w-full border p-2 rounded " value="{{ $user->project }}"  name="project">
                </div> --}}
                <div>
                    <label class="block font-semibold">State</label>
                    <select name="state" class="w-full border p-2 rounded">
                            <option value="">-- Select --</option>
                         <option value="Tamil" {{ $user->state == 'Tamil' ? 'selected' : '' }}>Tamil Nadu</option>
                            <option value="Kerala" {{ $user->state == 'Kerala' ? 'selected' : '' }}>Kerala</option>
                            <option value="Delhi" {{ $user->state == 'Delhi' ? 'selected' : '' }}>Delhi</option>
                <option value="Andhraprathes" {{ $user->state == 'Andhraprathes' ? 'selected' : '' }}>Andhrapradesh</option>
                        </select>
                </div>
                
                <div>
                    <label class="block font-semibold">courses</label>
                    <select name="language" class="w-full border p-2 rounded">
                            <option value="">-- Select --</option>
                            <option value="M.Com" {{ $user->language == 'M.Com' ? 'selected' : '' }}>M.Com</option>
                            <option value="B.Com" {{ $user->language == 'B.Com' ? 'selected' : '' }}>B.Com </option>
                            <option value="B.Com" {{ $user->language == 'B.Com' ? 'selected' : '' }}>B.Com</option>
                            <option value="BA.Tamil" {{ $user->language == 'BA.Tamil ' ? 'selected' : '' }}>BA.Tamil </option>
                            <option value="B.A.English" {{ $user->language == 'B.A. English' ? 'selected' : '' }}>B.A. English</option>
                            <option value="B.Sc.Mathematics'" {{ $user->language == 'B.Sc. Mathematics' ? 'selected' : '' }}>B.Sc. Mathematics</option>
                            <option value="Sc.Physics" {{ $user->language == 'Sc. Physics' ? 'selected' : '' }}>.Sc. Physics</option>
                            <option value="B.Sc.Computer Science' ? 'selected" {{ $user->language == 'B.Sc. Computer Science' ? 'selected' : '' }}>B.Sc. Computer Science</option>
                            <option value="B.C.A" {{ $user->language == 'B.C.A' ? 'selected' : '' }}>B.C.A</option>
                            <option value="B.B.A." {{ $user->language == 'B.B.A' ? 'selected' : '' }}>B.B.A</option>
                            <option value=" M.A.English" {{ $user->language == ' M.A. English' ? 'selected' : '' }}> M.A. English</option>
    
                        </select>
                </div>
                {{-- <div>
                    <label class="block font-semibold">pincode</label>
                    <input type="text" placeholder="Enter Project Duration" value="{{ $user->pincode }}" class="w-full border p-2 rounded " name="pincode">
                </div> --}}
                
                <div>
                    <label class="block font-semibold">Adderss</label>
                    <input type="text" placeholder="Enter Client Name" value="{{ $user->address }}" class="w-full border p-2 rounded" name="address">
                </div>
                {{-- <div>
                    <label class="block font-semibold">Pancard </label>
                    <input type="text" placeholder="Enter Client ID" class="w-full border p-2 rounded" value="{{ $user->pancart }}" name="pancart">
                </div> --}}
            </div>
    
            <h3 class="text-lg font-bold mt-6">More Details</h3>
    <table class="w-full border mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Image</th>
                <th class="p-2">Document</th>
                <th class="p-2">Gender</th>
                <th class="p-2">Date of Brth</th>
                {{-- <th class="p-2">Age </th> --}}
            </tr>
        </thead>
        <tbody id="drawingDetails">
            {{-- {{dd($user->image)}} --}}
            @foreach(json_decode($user->image) as $key=>$value)
            {{-- {{dd($key)}} --}}
        <tr>
            <td class="p-2">
                @if (($user->image))
                    <img src="{{ asset('storage/' .json_decode($user->image)[$key]) }}" alt="Current Image" class="w-20 h-20 object-cover mb-2">
                @else
                    <span>No image uploaded</span>
                @endif
                <input name="image[]" type="file" class="w-full border p-2 rounded">
            </td>
            
            <td class="p-2">
                @if (json_decode($user->resume)[$key])
                    <span>Current Resume: <a href="{{ asset('storage/' . json_decode($user->resume)[$key]) }}" target="_blank">{{ basename($user->resume) }}</a></span>
                @else
                    <span>No resume uploaded</span>
                @endif
                <input name="resume[]" type="file" class="w-full border p-2 rounded">
            </td>
            
            <td class="p-2"><input name="gender[]" type="text" value="{{ json_decode($user->gender)[$key] }}" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="data_of_brth[]" type="date" value="{{ json_decode($user->data_of_brth)[$key] }}" class="w-full border p-2 rounded"></td>
            {{-- <td class="p-2"><input name="age[]" type="text" value="{{ json_decode($user->age)[$key] }}" class="w-full border p-2 rounded"></td> --}}
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="flex justify-end gap-4 mt-6">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Update</button>
                </div>
        </div>
    </form>
    </body>
    </html>
    </x-app-layout>
    