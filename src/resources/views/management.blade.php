@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/management.css') }}" />
@endsection

@section('content')
<div class="management__content">
    <div class="management__heading">
        <h2>管理システム</h2>
    <form class="form" action="/contacts/search" method="get">
    @csrf
        <div class="form__group">
            <div class="form__group-title">
                <p class="form__label--item">お名前</p>
            </div>
            <div class="form__group-content">
                <div class="form__input--text-fullname">
                    <input type="text" name="last-name" value="{{ old('last-name') }}" />
                </div>
                <div class="form__group-title">
                <p class="form__label--item">性別</p>
                </div>
                <div class="form__input--radio-gentleman">
                    <input type="radio" name="gender" value="gender-all" checked>
                        全て
                </div>
                <div class="form__input--radio-gentleman">
                    <input type="radio" name="gender" value="gentleman" >
                        男性
                </div>
                <div class="form__input--radio-lady">
                    <input type="radio" name="gender" value="lady">
                        女性
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p class="form__label--item">登録日</p>
                        <input type="text" name="created_at-start" value="created_at" >～
                        <input type="text" name="created_at-end" value="created_at" >
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <p class="form__label--item">メールアドレス</p>
                        <input type="email" name="email" value="email" >
            </div>
            <div class="form__input--text-name-first">
            <input type="text" name="first-name" value="{{ old('first-name') }}" />
            </div>
            </div>
        </div>