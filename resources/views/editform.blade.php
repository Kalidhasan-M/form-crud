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
                        <option value="Tamil" {{ $user->language == 'Tamil' ? 'selected' : '' }}>Tamil</option>
                        <option value="English" {{ $user->language == 'English' ? 'selected' : '' }}>English</option>
                        <option value="Hindi" {{ $user->language == 'Hindi' ? 'selected' : '' }}>Hindi</option>
                        <option value="Malayalam" {{ $user->language == 'Malayalam' ? 'selected' : '' }}>Malayalam</option>
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
            <th class="p-2">Resume</th>
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