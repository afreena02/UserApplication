<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .modal-content {
            border-radius: 10px;
        }

        .modal-header {
            background-color: black;
            color: white;
            font-weight: bold;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .photo-box {
            width: 120px;
            height: 120px;
            background-color: #007bff;
            color: grey;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .btn {
            flex: 1;
            margin: 0 5px;
        }

        .note {
            font-size: 12px;
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h3>USERS</h3>
                </div>
                <div class="btn-container">
                    <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userModal">+ NEW</button>
                    <button class="btn btn-secondary" onclick="location.reload();">Refresh</button>
                </div>
            </div>

            <div class="card-body">
                <table class="table" style="border-style: none;">
                    <thead style="background-color: #e6e6e6;">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><a href="{{ route('users.profile', $user->id) }}"
                                        class="user-link">{{ $user->first_name . ' ' . $user->last_name }}</a></td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->position }}</td>
                                <td>{{ $user->role->title }}</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#userModal"
                                        onclick="openUpdateUserModal({{ json_encode($user) }})">
                                        Update
                                    </button>
                                    <span class="mx-1">|</span>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="btn-container">
            <button onclick="window.location.href='{{ route('dashboard') }}'" class="btn btn-secondary">
                BACK
            </button>
        </div>

    </div>


    <!-- User Registration & Update Modal -->
    <div class="modal fade @if ($errors->any()) show d-block @endif" id="userModal" tabindex="-1"
        aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background-color: lightgray">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">USER REGISTRATION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="user-account" action="{{ route('users.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST" id="form-method">
                        <input type="hidden" name="user_id" id="user_id">

                        <div class="row">
                            <!-- Left Side (Form Fields) -->
                            <div class="col-md-8">
                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">FIRST NAME</label>
                                    <input type="text" class="form-control col-md-9" name="first_name"
                                        id="first_name" required>
                                </div>
                                @error('first_name')
                                    <div class="text-danger col-md-12 d-flex align-items-center">{{ $message }}</div>
                                @enderror

                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">LAST NAME</label>
                                    <input type="text" class="form-control col-md-9" name="last_name" id="last_name"
                                        required>
                                </div>
                                @error('last_name')
                                    <span
                                        class="text-danger col-md-12 d-flex align-items-center">{{ $message }}</span>
                                @enderror

                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">POSITION</label>
                                    <input type="text" class="form-control col-md-9" name="position" id="position"
                                        required>
                                </div>
                                @error('position')
                                    <span
                                        class="text-danger col-md-12  d-flex align-items-center">{{ $message }}</span>
                                @enderror

                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">EMAIL</label>
                                    <input type="email" class="form-control col-md-9" name="email" id="email"
                                        required>
                                </div>
                                @error('email')
                                    <span
                                        class="text-danger col-md-12  d-flex align-items-center">{{ $message }}</span>
                                @enderror

                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">PASSWORD</label>
                                    <input type="password" class="form-control col-md-6" name="password"
                                        id="passwordInput">
                                    <button type="button" class="btn btn-secondary col-md-3"
                                        id="resetButton">RESET</button>
                                </div>
                                @error('password')
                                    <div class="text-danger col-md-12 d-flex align-items-center">{{ $message }}</div>
                                @enderror

                                <div class="mb-2 d-flex align-items-center">
                                    <label class="form-label col-md-3">ROLE</label>
                                    <select class="form-control col-md-9" name="role_id" id="role_id" required>
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('role_id')
                                    <span
                                        class="text-danger col-md-12  d-flex align-items-center">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Right Side (Photo Upload) -->
                            <div class="col-md-4 d-flex flex-column align-items-end" style="max-height: 180px;">
                                <div class="photo-box d-flex align-items-center justify-content-center"
                                    style="width: 120px; height: 120px; background: blue; color: white; font-weight: bold; cursor: pointer; border-radius: 5px;">
                                    <label for="photoUpload" style="cursor: pointer; margin: 0;">Photo</label>
                                </div>
                                <input type="file" id="photoUpload" name="photo" accept="image/*"
                                    style="display: none;">
                            </div>
                            @error('photo')
                                <span class="text-danger col-md-12  d-flex align-items-center">{{ $message }}</span>
                            @enderror

                            <!-- Action Buttons -->
                            <div class="btn-group mt-3 d-flex justify-content-between">
                                <button type="submit" class="btn btn-secondary" id="save-btn">SAVE</button>
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("resetButton").addEventListener("click", function() {
            document.getElementById("passwordInput").value = "";
        });
        
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (document.querySelector('.modal.show')) {
                let myModal = new bootstrap.Modal(document.getElementById('userModal'));
                myModal.show();
            }
        });

        function openCreateUserModal() {
            // Reset the form for a new user
            let form = document.getElementById("user-account");
            form.reset();
            form.action = "{{ route('users.store') }}"; // Set action to create

            // Reset hidden input values
            document.getElementById("form-method").value = "POST";
            document.getElementById("user_id").value = "";

            // Update modal UI
            document.getElementById("userModalLabel").innerText = "USER REGISTRATION";
            document.getElementById("save-btn").innerText = "SAVE";

            // Show the modal
            new bootstrap.Modal(document.getElementById("userModal")).show();
        }

        function openUpdateUserModal(user) {
            let form = document.getElementById("user-account");
            form.action = "/users/" + user.id; // Set action to update

            // Use PUT method
            document.getElementById("form-method").value = "PUT";
            document.getElementById("user_id").value = user.id;

            // Populate fields with user data
            document.getElementById("first_name").value = user.first_name;
            document.getElementById("last_name").value = user.last_name;
            document.getElementById("position").value = user.position;
            document.getElementById("email").value = user.email;
            document.getElementById("role_id").value = user.role_id;

            // Update modal UI
            document.getElementById("userModalLabel").innerText = "UPDATE USER";
            document.getElementById("save-btn").innerText = "UPDATE";

            // Show the modal
            // new bootstrap.Modal(document.getElementById("userModal")).show();
        }

        document.getElementById("userModal").addEventListener('hidden.bs.modal', function() {
            document.getElementById("user-account").reset();
            document.getElementById("form-method").value = "POST";
            document.getElementById("user_id").value = "";
            document.getElementById("userModalLabel").innerText = "USER REGISTRATION";
            document.getElementById("save-btn").innerText = "SAVE";
        });
    </script>

</body>

</html>
