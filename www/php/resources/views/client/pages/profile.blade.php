@extends('client.layouts.layout')
@section('content')
    <div class="container align-items-center">
        <div class="row">
            <div class="col-md-9">
                <!-- Session Status -->
                <x-auth-session-status  :status="session('status')" />
                <h2 class="txt_h2">Изменение профиля</h2>
                <form method="POST" action="/client/update" class="form_login mt-2">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text_label">Имя</label>
                        <input class="form-control form_text" id="name" type="text" name="name" value="{{$user->name}}">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="last_name"  class="form-label text_label">Фамилия</label>
                        <input class="form-control form_text" id="last_name" type="text" name="last_name" placeholder="Фамилия" value="{{$description['last_name']??''}}">
                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="gender_id" class="form-label text_label">Пол</label>
                        <select name="gender_id" class="form-select form_text" aria-label="Default select example">

                            @foreach($genders as $gender)
                                @foreach($gender->gender_descriptions as $gender_description)
                                @if(isset($description['gender_id']) && $gender->id==$description['gender_id'] && $gender_description->language_id==$lang->id)
                                   <option  selected value="{{$gender_description->gender_id}}">{{$gender_description->name}}</option>
                                @endif
                                    @if($gender_description->language_id==$lang->id)
                                        <option value="{{$gender_description->gender_id}}">{{$gender_description->name}}</option>
                                    @endif
                                @endforeach
                            @endforeach

                        </select>
                        <x-input-error :messages="$errors->get('gender_id')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label text_label">Дата рождения</label>
                        <input class="form-control form_text" id="birthday" type="date" name="birthday" placeholder="Дата рождения" value="{{$description['birthday']??''}}">
                        <x-input-error :messages="$errors->get('birthday')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label text_label">Номер телефона</label>
                        <input class="form-control form_text" id="phone" type="number" name="phone" placeholder="380950000000" value="{{$description['phone']??''}}">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label  for="current_password" class="form-label text_label">Текущий пароль</label>
                        <input class="form-control form_text" id="current_password" type="password" placeholder="Текущий пароль" name="current_password">
                        <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                    </div>
                    <div class="mb-3">
                        <label  for="new_password" class="form-label text_label">Новый пароль</label>
                        <input class="form-control form_text" id="new_password" type="password" placeholder="Новый пароль" name="new_password">
                        <x-input-error :messages="$errors->get('new_password')" class="mt-2" />
                    </div>
                    <div class="flex items-center">
                        <button type="submit" class="btn text_label btn-primary mb-3">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
