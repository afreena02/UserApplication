<style>
    .password-reset-form {
        max-width: 28rem;
        margin: 2rem auto;
        padding: 1.5rem;
        background: white;
        border-radius: 0.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .form-title {
        font-size: 1.5rem;
        font-weight: bold;
        color: #1a202c;
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        color: #4a5568;
        font-size: 0.875rem;
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-input {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        margin-bottom: 0.25rem;
    }
    .form-input:focus {
        outline: none;
        border-color: #4299e1;
        box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.2);
    }
    .error-message {
        color: #e53e3e;
        font-size: 0.75rem;
    }
    .submit-btn {
        width: 100%;
        background: #4299e1;
        color: white;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        margin-top: 1rem;
    }
    .submit-btn:hover {
        background: #3182ce;
    }
    .back-link {
        display: block;
        text-align: center;
        color: #4299e1;
        font-size: 0.875rem;
        margin-top: 1rem;
    }
    .back-link:hover {
        color: #2b6cb0;
    }
</style>

<form method="POST" action="{{ route('password.email') }}" class="password-reset-form">
    @csrf
    <h2 class="form-title">Reset Your Password</h2>
    
    <div class="form-group">
        <label class="form-label" for="email">Email Address</label>
        <input 
            type="email" 
            name="email" 
            id="email"
            value="{{ old('email') }}" 
            required
            class="form-input"
            placeholder="your@email.com"
        >
        @error('email')
            <span class="error-message">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="submit-btn">
        Send Password Reset Link
    </button>

    <a href="{{ route('login') }}" class="back-link">
        Remember your password? Sign in
    </a>
</form>