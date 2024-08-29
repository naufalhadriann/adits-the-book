<x-guest-layout>
  @section('title', 'Login')
    @section('form')
    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST" action="{{ route('login')}}" >
        @csrf
                <H3 style="text-align:center; margin-bottom:40px; font-weight:bold; font-style:italic; font-size:35px;">Login</H3>
          <div data-mdb-input-init class="form-outline mb-4">
          <x-input-label for="email" :value="__('Email ')" />
          <x-text-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

        
          <div data-mdb-input-init class="form-outline mb-3">
          <x-input-label for="password" :value="__('Password')" />
          <x-text-input id="password" class="form-control form-control-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
         <x-input-error :messages="$errors->get('password')" class="mt-2" />
          
          </div>

          <div class="d-flex justify-content-between align-items-center">
           
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="rememberme" />
              <label class="form-check-label" for="rememberme">
                Remember me
              </label>
            </div>
            <!-- <a href="{{route('password.request')}}" class="text-body">Forgot password?</a> -->
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register')}}"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    @endsection
</x-guest-layout>