<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <!-- إزالة الشعار وإضافة عنوان التسجيل -->
            <h3 class="text-center mb-4">{{ __('Create an Account') }}</h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-input-label for="name" :value="__('Name')" class="form-label" />
                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="text-danger small mt-1" />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="text-danger small mt-1" />
                </div>

                <!-- Phone Number with Country Code -->
                <div class="mb-3">
                    <x-input-label for="phone" :value="__('Phone Number')" class="form-label" />
                    <div class="input-group">
                        <!-- Country Code Dropdown -->
                        <select name="country_code" class="form-select" style="max-width: 120px;" required>
                            <option value="+1">🇺🇸 +1 (United States)</option>
                            <option value="+44">🇬🇧 +44 (United Kingdom)</option>
                            <option value="+971">🇦🇪 +971 (United Arab Emirates)</option>
                            <option value="+966">🇸🇦 +966 (Saudi Arabia)</option>
                            <option value="+91">🇮🇳 +91 (India)</option>
                            <option value="+61">🇦🇺 +61 (Australia)</option>
                            <option value="+55">🇧🇷 +55 (Brazil)</option>
                            <option value="+86">🇨🇳 +86 (China)</option>
                            <option value="+49">🇩🇪 +49 (Germany)</option>
                            <option value="+33">🇫🇷 +33 (France)</option>
                            <option value="+81">🇯🇵 +81 (Japan)</option>
                            <option value="+39">🇮🇹 +39 (Italy)</option>
                            <option value="+7">🇷🇺 +7 (Russia)</option>
                            <option value="+34">🇪🇸 +34 (Spain)</option>
                            <option value="+27">🇿🇦 +27 (South Africa)</option>
                            <option value="+91">🇮🇳 +91 (India)</option>
                            <option value="+1-268">🇦🇬 +1-268 (Antigua and Barbuda)</option>
                            <option value="+1-264">🇦🇮 +1-264 (Anguilla)</option>
                            <option value="+54">🇦🇷 +54 (Argentina)</option>
                            <option value="+374">🇦🇲 +374 (Armenia)</option>
                            <option value="+297">🇦🇼 +297 (Aruba)</option>
                            <option value="+43">🇦🇹 +43 (Austria)</option>
                            <option value="+994">🇦🇿 +994 (Azerbaijan)</option>
                            <option value="+973">🇧🇭 +973 (Bahrain)</option>
                            <option value="+880">🇧🇩 +880 (Bangladesh)</option>
                            <option value="+32">🇧🇪 +32 (Belgium)</option>
                            <option value="+501">🇧🇿 +501 (Belize)</option>
                            <option value="+229">🇧🇯 +229 (Benin)</option>
                            <option value="+975">🇧🇹 +975 (Bhutan)</option>
                            <option value="+359">🇧🇬 +359 (Bulgaria)</option>
                            <option value="+855">🇰🇭 +855 (Cambodia)</option>
                            <option value="+237">🇨🇲 +237 (Cameroon)</option>
                            <option value="+1">🇨🇦 +1 (Canada)</option>
                            <option value="+56">🇨🇱 +56 (Chile)</option>
                            <option value="+57">🇨🇴 +57 (Colombia)</option>
                            <option value="+506">🇨🇷 +506 (Costa Rica)</option>
                            <option value="+385">🇭🇷 +385 (Croatia)</option>
                            <option value="+420">🇨🇿 +420 (Czech Republic)</option>
                            <option value="+45">🇩🇰 +45 (Denmark)</option>
                            <option value="+20">🇪🇬 +20 (Egypt)</option>
                            <option value="+503">🇸🇻 +503 (El Salvador)</option>
                            <option value="+372">🇪🇪 +372 (Estonia)</option>
                            <option value="+251">🇪🇹 +251 (Ethiopia)</option>
                            <option value="+358">🇫🇮 +358 (Finland)</option>
                            <option value="+995">🇬🇪 +995 (Georgia)</option>
                            <option value="+30">🇬🇷 +30 (Greece)</option>
                            <option value="+299">🇬🇱 +299 (Greenland)</option>
                            <option value="+502">🇬🇹 +502 (Guatemala)</option>
                            <option value="+592">🇬🇾 +592 (Guyana)</option>
                            <option value="+509">🇭🇹 +509 (Haiti)</option>
                            <option value="+504">🇭🇳 +504 (Honduras)</option>
                            <option value="+36">🇭🇺 +36 (Hungary)</option>
                            <option value="+354">🇮🇸 +354 (Iceland)</option>
                            <option value="+62">🇮🇩 +62 (Indonesia)</option>
                            <option value="+964">🇮🇶 +964 (Iraq)</option>
                            <option value="+353">🇮🇪 +353 (Ireland)</option>
                            <option value="+972">🇮🇱 +972 (Israel)</option>
                            <option value="+254">🇰🇪 +254 (Kenya)</option>
                            <option value="+82">🇰🇷 +82 (South Korea)</option>
                            <option value="+965">🇰🇼 +965 (Kuwait)</option>
                            <option value="+961">🇱🇧 +961 (Lebanon)</option>
                            <option value="+370">🇱🇹 +370 (Lithuania)</option>
                            <option value="+60">🇲🇾 +60 (Malaysia)</option>
                            <option value="+230">🇲🇺 +230 (Mauritius)</option>
                            <option value="+52">🇲🇽 +52 (Mexico)</option>
                            <option value="+212">🇲🇦 +212 (Morocco)</option>
                            <option value="+95">🇲🇲 +95 (Myanmar)</option>
                            <option value="+31">🇳🇱 +31 (Netherlands)</option>
                            <option value="+64">🇳🇿 +64 (New Zealand)</option>
                            <option value="+234">🇳🇬 +234 (Nigeria)</option>
                            <option value="+47">🇳🇴 +47 (Norway)</option>
                            <option value="+92">🇵🇰 +92 (Pakistan)</option>
                            <option value="+51">🇵🇪 +51 (Peru)</option>
                            <option value="+63">🇵🇭 +63 (Philippines)</option>
                            <option value="+48">🇵🇱 +48 (Poland)</option>
                            <option value="+351">🇵🇹 +351 (Portugal)</option>
                            <option value="+974">🇶🇦 +974 (Qatar)</option>
                            <option value="+65">🇸🇬 +65 (Singapore)</option>
                            <option value="+421">🇸🇰 +421 (Slovakia)</option>
                            <option value="+27">🇿🇦 +27 (South Africa)</option>
                            <option value="+94">🇱🇰 +94 (Sri Lanka)</option>
                            <option value="+46">🇸🇪 +46 (Sweden)</option>
                            <option value="+41">🇨🇭 +41 (Switzerland)</option>
                            <option value="+886">🇹🇼 +886 (Taiwan)</option>
                            <option value="+66">🇹🇭 +66 (Thailand)</option>
                            <option value="+90">🇹🇷 +90 (Turkey)</option>
                            <option value="+971">🇦🇪 +971 (United Arab Emirates)</option>
                            <option value="+380">🇺🇦 +380 (Ukraine)</option>
                            <option value="+598">🇺🇾 +598 (Uruguay)</option>
                            <option value="+58">🇻🇪 +58 (Venezuela)</option>
                            <option value="+84">🇻🇳 +84 (Vietnam)</option>
                            <option value="+263">🇿🇼 +263 (Zimbabwe)</option>
                        </select>

                        <!-- Phone Number Input -->
                        <x-text-input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')" required />
                    </div>
                    <x-input-error :messages="$errors->get('phone')" class="text-danger small mt-1" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="text-danger small mt-1" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger small mt-1" />
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a class="text-decoration-none small" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <!-- زر إنشاء حساب -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('Create Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
