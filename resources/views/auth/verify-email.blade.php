@extends('layouts.app')

@section('content')
<div class="container auth-card">
    <div class="card shadow-sm">
        <div class="card-header text-center">
            <h4>Verify Your Email</h4>
        </div>
        <div class="card-body">
            <p class="text-center">
                Before proceeding, please check your email for a verification link.
            </p>
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    A new verification link has been sent to your email address.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
