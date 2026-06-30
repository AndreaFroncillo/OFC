<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ __('quick.new_user') }}">
    <section class="dashboard-page management-page">
        <x-dashboard.breadcrumb
            :items="[
                ['label' => __('dashboards.dashboard'), 'url' => route('dashboard')],
                ['label' => trans_choice('auth.user', 2), 'url' => route('users.index')],
                ['label' => __('quick.new_user')],
            ]" />

        <div class="management-header">
            <div>
                <p class="dashboard-kicker mb-1">{{ trans_choice('auth.user', 1) }}</p>

                <h1 class="dashboard-title">
                    {{ __('quick.new_user') }}
                </h1>

                <p class="dashboard-subtitle">
                    {{ __('general.create_user_text') }}
                </p>
            </div>

            <x-dashboard.topbar-actions />
        </div>

        <div class="management-toolbar">
            <a href="{{ route('users.index') }}" class="management-primary-action">
                <i class="fas fa-arrow-left"></i>
                <span>{{ __('general.back') }}</span>
            </a>
        </div>

        <form action="{{ route('users.store') }}" method="POST" class="management-form" data-prevent-double-submit>
            @csrf

            <div class="management-form-grid">
                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.main_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <div class="management-form-group">
                            <label for="name">{{ __('auth.name') }}</label>
                            <input type="text" class="text-capitalize" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="surname">{{ __('auth.surname') }}</label>
                            <input type="text" class="text-capitalize" id="surname" name="surname" value="{{ old('surname') }}" required>
                            @error('surname') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="fiscal_code">{{ __('auth.fiscal_code') }}</label>
                            <input type="text" class="text-uppercase" id="fiscal_code" name="fiscal_code" value="{{ old('fiscal_code') }}" maxlength="16">
                            @error('fiscal_code') <small>{{ $message }}</small> @enderror
                        </div>

                        <x-forms.phone
                            name="phone"
                            :value="old('phone')"
                            variant="management" />

                        <div class="management-form-group management-form-group-full">
                            <label for="email">{{ __('mail.email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}">
                            @error('email') <small>{{ $message }}</small> @enderror
                        </div>
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.personal_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <div class="management-form-group">
                            <label for="birth_date">{{ __('general.birth_date') }}</label>
                            <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                            @error('birth_date') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="gender">{{ __('general.gender') }}</label>
                            <select id="gender" name="gender">
                                <option value="">{{ __('general.not_available') }}</option>
                                <option value="male" @selected(old('gender')==='male' )>{{ __('general.gender_male') }}</option>
                                <option value="female" @selected(old('gender')==='female' )>{{ __('general.gender_female') }}</option>
                                <option value="other" @selected(old('gender')==='other' )>{{ __('general.gender_other') }}</option>
                                <option value="not_specified" @selected(old('gender')==='not_specified' )>{{ __('general.gender_not_specified') }}</option>
                            </select>
                            @error('gender') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group management-form-group-full">
                            <label for="goal">{{ trans_choice('general.goal', 1) }}</label>
                            <input type="text" id="goal" name="goal" value="{{ old('goal') }}">
                            @error('goal') <small>{{ $message }}</small> @enderror
                        </div>
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.address_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <div class="management-form-group">
                            <label for="country">{{ __('general.country') }}</label>
                            <input type="text" class="text-capitalize" id="country" name="country" value="{{ old('country') }}">
                            @error('country') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="province">{{ __('general.province') }}</label>
                            <input type="text" class="text-uppercase" id="province" name="province" value="{{ old('province') }}" maxlength="2">
                            @error('province') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="city">{{ __('general.city') }}</label>
                            <input type="text" class="text-capitalize" id="city" name="city" value="{{ old('city') }}">
                            @error('city') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="postal_code">{{ __('general.postal_code') }}</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}">
                            @error('postal_code') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="address">{{ __('general.address') }}</label>
                            <input type="text" class="text-capitalize" id="address" name="address" value="{{ old('address') }}">
                            @error('address') <small>{{ $message }}</small> @enderror
                        </div>

                        <div class="management-form-group">
                            <label for="street_number">{{ __('general.street_number') }}</label>
                            <input type="text" id="street_number" name="street_number" value="{{ old('street_number') }}">
                            @error('street_number') <small>{{ $message }}</small> @enderror
                        </div>
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.internal_notes') }}</h2>

                    <div class="management-form-group">
                        <label for="notes">{{ __('general.notes') }}</label>
                        <textarea id="notes" name="notes" rows="8">{{ old('notes') }}</textarea>
                        @error('notes') <small>{{ $message }}</small> @enderror
                    </div>
                </article>
            </div>

            <div class="management-form-actions">
                <a href="{{ route('users.index') }}" class="management-secondary-action">
                    {{ __('general.cancel') }}
                </a>

                <button type="submit" class="management-primary-action" data-submit-button>
                    <i class="fas fa-save"></i>
                    <span>{{ __('general.save') }}</span>
                </button>
            </div>
        </form>
    </section>
</x-layout>