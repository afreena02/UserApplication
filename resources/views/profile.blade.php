<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="border-radius: 10px; overflow: hidden;">
                <div class="card-header bg-primary text-white text-center" style="padding: 15px; font-size: 20px;background-color: lightgrey; padding: 15px;">
                    <h3 style="margin: 0;">User Profile</h3>
                </div>
                <div class="card-body" style="background-color: #f8f9fa; padding: 20px;">
                    <div class="text-center mb-3">
                       <img src="{{ asset('storage/' . ($user->image_url ?? 'default-avatar.png')) }}"
                             class="rounded-circle shadow-sm"
                             style="width: 120px; height: 120px; object-fit: cover; border: 4px solid #007bff;" 
                             alt="User Photo">
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" style="font-size: 16px;"><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</li>
                        <li class="list-group-item" style="font-size: 16px;"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item" style="font-size: 16px;"><strong>Position:</strong> {{ $user->position }}</li>
                        <li class="list-group-item" style="font-size: 16px;"><strong>Role:</strong> {{ $user->role->title }}</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button onclick="window.location.href='{{ auth()->user()->role_id == 1 ? route('users.index') : route('dashboard') }}'" 
                            class="btn btn-secondary" 
                            style="padding: 8px 20px; font-size: 16px;">
                        Back
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
