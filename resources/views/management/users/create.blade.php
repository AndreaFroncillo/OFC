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
                <h1 class="dashboard-title">{{ __('quick.new_user') }}</h1>
                <p class="dashboard-subtitle">{{ __('general.create_user_text') }}</p>
            </div>

            <x-dashboard.topbar-actions />
        </div>

        <div class="management-toolbar">
            <x-buttons.button href="{{ route('users.index') }}" variant="primary" icon="fas fa-arrow-left">
                {{ __('general.back') }}
            </x-buttons.button>
        </div>

        <form action="{{ route('users.store') }}" method="POST" class="management-form" data-prevent-double-submit>
            @csrf

            <div class="management-form-grid">
                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.main_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input name="name" label="{{ __('auth.name') }}" class="text-capitalize" required />
                        <x-forms.input name="surname" label="{{ __('auth.surname') }}" class="text-capitalize" required />
                        <x-forms.input name="fiscal_code" label="{{ __('auth.fiscal_code') }}" class="text-uppercase" maxlength="16" />

                        <x-forms.phone name="phone" variant="management" />

                        <x-forms.input type="email" name="email" label="{{ __('mail.email') }}" full />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.personal_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input type="date" name="birth_date" label="{{ __('general.birth_date') }}" />

                        <x-forms.select
                            name="gender"
                            label="{{ __('general.gender') }}"
                            placeholder="{{ __('general.not_available') }}"
                            :options="[
                                'male' => __('general.gender_male'),
                                'female' => __('general.gender_female'),
                                'other' => __('general.gender_other'),
                                'not_specified' => __('general.gender_not_specified'),
                            ]" />

                        <x-forms.input name="goal" label="{{ trans_choice('general.goal', 1) }}" full />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.address_data') }}</h2>

                    <div class="management-form-grid-inner">
                        <x-forms.input name="country" label="{{ __('general.country') }}" class="text-capitalize" />
                        <x-forms.input name="province" label="{{ __('general.province') }}" class="text-uppercase" maxlength="2" />
                        <x-forms.input name="city" label="{{ __('general.city') }}" class="text-capitalize" />
                        <x-forms.input name="postal_code" label="{{ __('general.postal_code') }}" />
                        <x-forms.input name="address" label="{{ __('general.address') }}" class="text-capitalize" />
                        <x-forms.input name="street_number" label="{{ __('general.street_number') }}" />
                    </div>
                </article>

                <article class="management-user-card management-detail-card">
                    <h2 class="management-detail-title">{{ __('general.internal_notes') }}</h2>

                    <x-forms.textarea
                        name="notes"
                        label="{{ __('general.notes') }}"
                        rows="8" />
                </article>
            </div>

            <div class="management-form-actions">
                <x-buttons.button href="{{ route('users.index') }}" variant="secondary">
                    {{ __('general.cancel') }}
                </x-buttons.button>

                <x-buttons.button type="submit" variant="primary" icon="fas fa-save">
                    {{ __('general.save') }}
                </x-buttons.button>
            </div>
        </form>
    </section>
</x-layout>