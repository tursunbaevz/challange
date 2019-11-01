<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Имя</label>
            <input type="text" name="name" value="{{old('name') ?? $user->name}}" class="form-control" autocomplete="off"/>
        </div>

        <div class="form-group">
            <label>Email Адрес</label>
            <input type="email" name="email" value="{{old('email') ?? $user->email}}" class="form-control" autocomplete="off"/>
        </div>

    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Пароль</label>
            <input type="password" class="form-control"  name="password" value="{{old('password')}}"  autocomplete="off"/>
        </div>

        <div class="form-group">
            <label>Подтвердите пароль</label>
            <input type="password" class="form-control"  name="password_confirmation" autocomplete="off" />
        </div>
    </div>
</div>
