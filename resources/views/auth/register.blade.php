@extends('layouts.index')
@section('content')

    <section class="register">
        <div class="container col-12">
            <div class=" d-flex justify-content-center ">
                <!-- Validation Errors -->
                <div class="d-flex align-center border border-primary border-3 rounded  mb-4"
                     style="width: auto; height: auto;">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('register') }}" style="padding: 20px">
                    @csrf

                    <!-- Name -->
                        <div class="mb-3">
                            <x-label for="name" :value="__('Имя')" />

                            <x-input id="name" class="form-control block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-label for="password" :value="__('Пароль')" />

                            <x-input id="password" class="form-control block mt-1 w-full"
                                     type="password"
                                     name="password"
                                     required autocomplete="new-password" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <x-label for="password_confirmation" :value="__('Подтвердите пароль')" />

                            <x-input id="password_confirmation" class="form-control block mt-1 w-full"
                                     type="password"
                                     name="password_confirmation" required />
                        </div>

                        <div class="d-flex items-center justify-content-between align-items-center mt-4">
                            <a class="underline" href="{{ route('login') }}">
                                {{ __('Есть аккаунт?') }}
                            </a>

                            <button class="btn btn-primary ml-5">
                                {{ __('Регистрация') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
