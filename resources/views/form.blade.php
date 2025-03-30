<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <form action="{{ url('/userforms') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
        <h2 class="text-xl font-bold mb-6"> USER DETAILS</h2>
        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold">Name</label>
                <input type="text" placeholder="Enter Contract Number" class="w-full border p-2 rounded "  name="name">
            </div>
            <div>
                <label class="block font-semibold">Email</label>
                <input type="email" placeholder="Enter Contract Number" class="w-full border p-2 rounded "  name="email">
            </div>

            <div>
                <label class="block font-semibold">Contact Number</label>
                <input type="text" placeholder="Enter Contact Number" class="w-full border p-2 rounded "  name="contactno">
            </div>
            
            {{-- <div>
                <label class="block font-semibold">Adhar No</label>
                <input type="text" placeholder="Enter Tender No" class="w-full border p-2 rounded "  name="adhar">
            </div> --}}
            
            {{-- <div>
                <label class="block font-semibold">Project Name</label>
                <input type="text" placeholder="Enter Project Name" class="w-full border p-2 rounded "  name="project">
            </div> --}}
            <div>
                <label class="block font-semibold">State</label>
                <select class="w-full border p-2 rounded" name="state">
                    <option value="">-- Select --</option>
                    <option value="Tamil">-- Tamil Nadu --</option>
                    <option value="Kerala">-- Kerala --</option>
                    <option value="Delhi">-- Delhi --</option>
                    <option value="Andhraprathes"> -- Andhraprathes --</option>

                </select>
            </div>
            
            <div>
                <label class="block font-semibold">Please select the courses you would like to attend
                </label>
                <select class="w-full border p-2 rounded" name="language">
                    <option>-- Select --</option>
                    <option value="tamil">-- Tamil --</option>
                    <option value="English">-- English --</option>
                    <option value="Hindi">-- Hindi --</option>
                    <option  value="Malayalam">-- Malayalam --</option>

                </select>
            </div>
            <div>
                <label class="block font-semibold">Date of Birth</label>
                <input type="date" placeholder="Enter Project Duration" class="w-full border p-2 rounded " name="data_of_brth[]">
            </div>
            
            <div>
                <label class="block font-semibold">Adderss</label>
                <input type="text" placeholder="Enter Client Name" class="w-full border p-2 rounded" name="address">
            </div>
            {{-- <div>
                <label class="block font-semibold">Pancard </label>
                <input type="text" placeholder="Enter Client ID" class="w-full border p-2 rounded" name="pancart">
            </div> --}}
        </div>

        <h3 class="text-lg font-bold mt-6">More Details</h3>
<table class="w-full border mt-4">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2">Image</th>
            <th class="p-2">Resume</th>
            <th class="p-2">Gender</th>
        </tr>
    </thead>
    <tbody id="drawingDetails">
        <tr>
            <td class="p-2"><input name="image[]" type="file" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="resume[]" type="file" placeholder="Enter Diagram" class="w-full border p-2 rounded"></td>
             <td class="p-2"><input name="gender[]" type="text" placeholder="Enter gender" class="w-full border p-2 rounded"></td>
        </tr>
    </tbody>
</table>

<form id="myForm" onsubmit="handleSubmit(event)">

    <table id="drawingDetails" class="mt-4 w-full">
       
    </table>

    <div class="flex justify-end gap-4 mt-6">
        <button type="button" onclick="resetForm()" class="bg-blue-500 text-white px-4 py-2 rounded">Reset</button>
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Sumbit</button>
    </div>
</form>

{{-- <script>
    
    function addRow() {
        let tableBody = document.getElementById("drawingDetails");
        let newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td class="p-2"><input name="image[]" type="file" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="resume[]" type="file" placeholder="Enter Diagram" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="gender[]" type="text" placeholder="Enter gender" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="data_of_brth[]" type="date" class="w-full border p-2 rounded"></td>
            <td class="p-2"><input name="age[]" type="text" placeholder=" Age " class="w-full border p-2 rounded"></td>
            <td class="p-2"><button onclick="removeRow(this)" class="bg-red-500 text-white px-3 py-1 rounded">Remove</button></td>
        `;
        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        button.closest('tr').remove();
    }

    function resetForm() {
        document.getElementById("myForm").reset();
        document.getElementById("drawingDetails").innerHTML = ''; 
    }

    function handleSubmit(event) {
        event.preventDefault();  
        const formData = new FormData(document.getElementById("myForm"));

        for (let [key, value] of formData.entries()) {
            console.log(key, value);
        }

        const images = formData.getAll('image');
        console.log('Images:', images);

    }
</script> --}}

</body>
</html>