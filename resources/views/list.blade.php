<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User List</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 p-6">
        <div class="max-w-7xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
            <h2 class="text-2xl font-bold mb-6">User List</h2>
    
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Contact No</th>
                            {{-- <th class="border px-4 py-2">Adhar No</th> --}}
                            <th class="border px-4 py-2">State </th>
                            <th class="border px-4 py-2">courses</th>
                            <th class="border px-8 py-2 ">DOB</th>
                            {{-- <th class="border px-4 py-2">Pancard</th> --}}
                            <th class="border px-4 py-2">Address</th>
                            <th class="border px-4 py-2">Photo</th>
                            <th class="border px-4 py-2">Document</th>
                            <th class="border px-4 py-2">Gender</th>
                            {{-- <th class="border px-4 py-2">DOB</th> --}}
                            {{-- <th class="border px-4 py-2">Age</th> --}}
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userdata as $user)
                            <tr class="border">
                                
                      <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->contactno }}</td>
                        {{-- <td class="border px-4 py-2">{{ $user->adhar }}</td> --}}
                        <td class="border px-4 py-2">{{ $user->state }}</td>
                        <td class="border px-4 py-2">{{ $user->language }}</td>
                        @foreach (json_decode($user->data_of_brth) as $key => $value)
                     <td class="border px-4 py-2">{{ json_decode($user->data_of_brth)[0] }}</td>
                     @endforeach
                     {{-- <td class="border px-4 py-2">{{ $user->pancart }}</td> --}}
                    <td class="border px-4 py-2">{{ $user->address }}</td>
                    <td class="border px-4 py-2">
                                    @foreach (json_decode($user->image) as $key => $value)
                                        <img src="{{ asset('storage/' . $value) }}" alt="User Image" class="w-12 h-12 object-cover">
                                    @endforeach
                                </td>
    
                                <td class="border px-4 py-2">
                                    @foreach (json_decode($user->resume) as $key => $value)
                                        <a href="{{ asset('storage/' . $value) }}" target="_blank" class="text-blue-500 underline">View Resume</a>
                                    @endforeach
                                </td>
            
                                        <td class="border px-4 py-2">{{ json_decode($user->gender)[0] }}</td>
                                        {{-- <td class="border px-4 py-2">{{ json_decode($user->data_of_brth)[0] }}</td> --}}
                                        {{-- <td class="border px-4 py-2">{{ json_decode($user->age)[0] }}</td> --}}
    
                                <td class="border px-4 py-2 flex space-x-2">
                                    <a href="{{ url('/edit-form', $user->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                  <form action="{{ route('userforms.destroy', $user->id) }}" method="POST" class="inline-block">
                             @csrf
                                     @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
        </div>
    </body>
    </html>
    </x-app-layout>
    