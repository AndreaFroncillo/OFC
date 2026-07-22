<x-layout :dashboard="true" :fullHeight="true" :hideSubscription="true" title="{{ __('general.edit_user') }}">
    <section class="dashboard-page management-page">
        <x-dashboard.breadcrumb
            :items="[
                ['label' => __('dashboards.dashboard'), 'url' => route('dashboard')],
                ['label' => trans_choice('auth.user', 2), 'url' => route('users.index')],
                ['label' => __('general.edit_user')],
            ]" />

        <div class="management-header">
            <div>
                <p class="dashboard-kicker mb-1">{{ trans_choice('auth.user', 1) }}</p>
                <h1 class="dashboard-title">{{ __('general.edit_user') }}</h1>
                <p class="dashboard-subtitle">{{ $user->code }} · {{ trim($user->name . ' ' . ($user->surname ?? '')) }}</p>
            </div>

            <x-dashboard.topbar-actions />
        </div>

        <div class="management-toolbar">
            <x-buttons.button
                href="{{ route('users.show', $user) }}"
                variant="primary"
                icon="fas fa-user">
                {{ $user->name }} {{ $user->surname }}
            </x-buttons.button>

            <x-buttons.button
                href="{{ route('users.index') }}"
                variant="secondary"
                icon="fas fa-list">
                {{ __('general.back_to_list') }}
            </x-buttons.button>
        </div>

        <form action="{{ route('users.update', $user) }}" method="POST" class="management-form" data-prevent-double-submit>
            @csrf
            @method('PUT')

            <div class="management-form-grid">
                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.main_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input name="name" :value="$user->name" label="{{ __('auth.name') }}" class="text-capitalize" required />
                        <x-forms.input name="surname" :value="$user->surname" label="{{ __('auth.surname') }}" class="text-capitalize" required />
                        <x-forms.input name="fiscal_code" :value="$user->fiscal_code" label="{{ __('auth.fiscal_code') }}" class="text-uppercase" maxlength="16" />

                        <x-forms.phone name="phone" :value="$user->phone" variant="management" />

                        <x-forms.input type="email" name="email" :value="$user->email" label="{{ __('mail.email') }}" full />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.personal_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input type="date" name="birth_date" :value="$user->birth_date?->format('Y-m-d')" label="{{ __('general.birth_date') }}" />

                        <x-forms.select
                            name="gender"
                            :value="$user->gender"
                            label="{{ __('general.gender') }}"
                            placeholder="{{ __('general.not_available') }}"
                            :options="[
                                'male' => __('general.gender_male'),
                                'female' => __('general.gender_female'),
                                'other' => __('general.gender_other'),
                                'not_specified' => __('general.gender_not_specified'),
                            ]" />

                        <x-forms.input name="goal" :value="$user->goal" label="{{ trans_choice('general.goal', 1) }}" full />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.address_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input name="country" :value="$user->country" label="{{ __('general.country') }}" class="text-capitalize" />
                        <x-forms.input name="province" :value="$user->province" label="{{ __('general.province') }}" class="text-uppercase" maxlength="2" />
                        <x-forms.input name="city" :value="$user->city" label="{{ __('general.city') }}" class="text-capitalize" />
                        <x-forms.input name="postal_code" :value="$user->postal_code" label="{{ __('general.postal_code') }}" />
                        <x-forms.input name="address" :value="$user->address" label="{{ __('general.address') }}" class="text-capitalize" />
                        <x-forms.input name="street_number" :value="$user->street_number" label="{{ __('general.street_number') }}" />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.internal_notes') }}</h2>

                    <x-forms.textarea
                        name="notes"
                        :value="$user->notes"
                        label="{{ __('general.notes') }}"
                        rows="8" />
                </article>
            </div>

            <div class="management-form-actions">

                <x-buttons.button type="submit" variant="primary" icon="fas fa-pen">
                    {{ __('general.edit') }}
                </x-buttons.button>
            </div>
        </form>
    </section>
</x-layout>