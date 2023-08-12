<div class="container align-items-center">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')"/>
            <h2 class="txt_h2">Оплата картой</h2>
            <form method="POST" action="/cart/create" class="form_login mt-2">
                @csrf
                <div class="mb-3">
                    <label for="card" class="form-label text_label">Введите номер карты</label>
                    <input class="form-control form_text" id="card" type="number" maxlength="16" name="card"
                           placeholder="0000000000000000">
                    <x-input-error :messages="$errors->get('card')" class="mt-2"/>
                </div>
                <div class="mb-3">
                    <table>
                        <tr>
                            <td colspan="3"><label for="card" class="form-label text_label">Введите дату окончания
                                    карты</label></td>
                            <td>Введите последние CSV код</td>
                        </tr>
                        <tr>
                            <td><input class="form-control form_text" id="card" maxlength="2" type="text" name="day"
                                       placeholder="01">
                                <x-input-error :messages="$errors->get('card')" class="mt-2"/>
                            </td>
                            <td> /</td>
                            <td><input class="form-control form_text" id="card" type="text" maxlength="2" name="month"
                                       placeholder="12">
                                <x-input-error :messages="$errors->get('card')" class="mt-2"/>
                            </td>
                            <td><input class="form-control form_text" id="card" type="" name="card"
                                       placeholder="123">
                                <x-input-error :messages="$errors->get('card')" class="mt-2"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <input type="hidden" value="{{$id}}" name="payment">
                <div>
                    <button type="submit" class="btn text_label btn-primary mb-3">Оплатить</button>
                </div>
            </form>
        </div>
    </div>
</div>

