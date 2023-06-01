<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Account Name</label>
    <div class="col-md-6">
        <input type="text" id="name" class="form-control" value="{{ old('name') }}" name="name" required autofocus>
    </div>
</div>
<div class="form-group row">
    <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
    <div class="col-md-6">
        <input type="text" id="email_address" value="{{ old('email') }}" class="form-control" name="email" required
            autofocus autocomplete="off">
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">PIN</label>
    <div class="col-md-6">
        <input type="password" id="password" class="form-control" name="password" required>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Re-enter PIN</label>
    <div class="col-md-6">
        <input type="password" id="password" class="form-control" name="password_confirmation" required>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Preferred Currency</label>
    <div class="col-md-6">
        @foreach ($currencies as $currency)
            <label> <input type="radio" id="currency" value="{{ $currency->id }}" name="currency">
                {{ $currency->code }} </label>
        @endforeach
    </div>
</div>

<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
        Create Account
    </button>
    <a href="{{ route('login') }}" class="btn btn-link">
        I already have an Account? Login
    </a>
</div>
