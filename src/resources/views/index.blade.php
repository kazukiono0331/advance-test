@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>
    <form class="form" action="/contacts/confirm" method="post">
    @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content-name">
                <div class="form__input--text-name-last">
                <input type="text" name="last-name" value="{{ old('last-name') }}" />
                    <p class="form__input--help-block">例）山田</p>
                </div>
                <div class="form__input--text-name-first">
                <input type="text" name="first-name" value="{{ old('first-name') }}" />
                    <p class="form__input--help-block">例）太郎</p>
                </div>
                <div class="form__error">
                @error('last-name')
                {{ $message }}
                @enderror
                </div>
                <div class="form__error">
                @error('first-name')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio-gentleman">
                <input type="radio" name="gender" value="gentleman" checked>
                    男性
                </div>
                <div class="form__input--radio-lady">
                <input type="radio" name="gender" value="lady">
                    女性
                </div>
            </div>
                <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
                </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                <input type="email" name="email" value="{{ old('email') }}"/>
                    <p class="form__input--help-block">例）test@example.com</p>
                </div>
                <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
                <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                <input id="postcord" type="text" name="postcord" size="7" value="{{ old('postcord') }}">
                <button class="api-address" type="button">住所を自動入力</button>
                    <p class="form__input--help-block">例）1234567</p>
                </div>
                <script>
                    document.querySelector('.api-address').addEventListener('click', () => {
                        const elem = document.querySelector('#postcord');
                        const postcord = elem.value;
                        fetch('../api/address/' + postcord)
                            .then((data) => data.json())
                            .then((obj) => {
                                if (!Object.keys(obj).length) {
                                    txt = '住所が存在しません。'
                                } else {
                                    txt = obj.pref + obj.city + obj.town;
                                }
                                document.querySelector('#address').value = txt;
                            });
                    });
                </script>
                <div class="form__error">
                @error('postcord')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
            <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                <p>住所：<input id="address" type="text" name="address" value="{{ old('address') }}"></p>
                <p class="form__input--help-block">例）東京都渋谷区千駄ヶ谷1-2-3</p>
                </div>
                <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                <input type="tel" name="building_name" value="{{ old('building_name') }}" />
                    <p class="form__input--help-block">例）千駄ヶ谷マンション101</p>
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--attention">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                <textarea name="opinion" maxlength="120" id="input_body">{{ old('opinion') }}</textarea>
                </div>
                <div class="form__error">
                @error('opinion')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認</button>
        </div>
    </form>
</div>
@endsection