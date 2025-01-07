@extends('admin.layout_login')
@section('main')
    <div class="login-box">
        <div>
            <h3>Verify Email</h3>
            <div class="body-text">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                Before proceeding, please check your email for a verification link.
                If you did not receive the email,
                <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="tf-button">click here to request another</button>
                </form>
            </div>
        </div>

        {{-- <div class="body-text text-center">
            You don't have an account yet?
            <a class="body-text tf-color" href="{{ route('register') }}">Register Now</a>
        </div> --}}
    </div>
@endsection
