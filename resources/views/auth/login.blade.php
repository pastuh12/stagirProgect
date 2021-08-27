@extends('layouts.index')
{{--<x-guest-layout>--}}
@section('content')
    <section class="login">
        <div class="container col-12">
            <div class= "d-flex justify-content-center">

                <x-auth-card>
                    <div class="border border-primary border-3 rounded  mb-4" style="width: auto; height: auto">
                        <!-- Session Status -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <!-- Validation Errors -->

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form method="POST" action="{{ route('login') }}" style="padding: 20px">
                        @csrf
                        <!-- Email Address -->

                            <div class="mb-3">
                                <x-label for="email" :value="__('Email')" />

                                <x-input  id="email" class="form-control block mt-1 w-full" type="email"
                                          name="email" :value="old('email')" placeholder="example@inbox.ru" required autofocus />
                            </div>

                            <!-- Password -->
                            <div class="mb-4">
                                <x-label for="password" :value="__('Пароль')" />
                                <x-input id="password" class="form-control block mt-1 w-full"
                                         type="password"
                                         name="password"
                                         required autocomplete="current-password"
                                         placeholder="password"/>
                            </div>



                            <div class="d-flex items-center justify-content-between align-items-center mt-4">
                                @if (Route::has('password.request'))
                                    <a class="underline" href="{{ route('password.request') }}">
                                        {{ __('Забыли пароль?') }}
                                    </a>
                                @endif

                                <x-button class="btn btn-primary ml-5 ">
                                    {{ __('Войти') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </x-auth-card>
            </div>
        </div>
    </section>
@endsection
