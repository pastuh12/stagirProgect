@extends('layouts.index')

@section('content')
    <section class="login">
        <div class="container col-12">
            <div class= "d-flex justify-content-center">
                <x-auth-card>
                    <div class="border border-primary border-5 rounded  mb-4" style="width: auto; height: auto">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}" style="padding: 20px">
                    @csrf
                        <div class="text-center">
                            <h5>Восстановление пароля</h5>
                        </div>
                    <!-- Email Address -->
                        <div class="mb-3">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="d-flex  justify-content-end mb-4">
                            <x-button class="btn btn-primary ml-5 ">
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>
                    </form>
                </x-auth-card>
@endsection
