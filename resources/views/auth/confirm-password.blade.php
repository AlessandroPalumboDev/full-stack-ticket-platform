@extends('layouts.app')

@section('content')
<div class="container auth-card">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h4>Confirm Password</h4>
        </div>
        <div class="card-body">
            <p class="text-center">Please confirm your password before continuing.</p>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        Confirm Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
