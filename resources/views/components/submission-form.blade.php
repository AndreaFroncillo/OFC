<div class="col-lg-6 mb-4 d-flex">
    <div class="form-container flex-fill d-flex flex-column">
        <h2 class="section-title text-b">{{__('form.subscribe')}}</h2>
        <p class="text-muted">{{__('form.subscribe_text_payment')}}</p>
        <div class="row">
            <div class="col-md-6 mb-3 flex-fill d-flex justify-content-evenly">
                <p class="text-dark fw-bolder">Nome:</p>
                <p class="text-black">{{ Auth::user()->name ?? '-' }}</p>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 flex-fill d-flex justify-content-evenly">
                <p class="text-dark fw-bolder">Cognome:</p>
                <p class="text-black">{{ Auth::user()->surname ?? '-' }}</p>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 flex-fill d-flex justify-content-evenly">
                <p class="text-dark fw-bolder">Email:</p>
                <p class="text-primary">{{ Auth::user()->email ?? '-' }}</p>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3 flex-fill d-flex justify-content-evenly">
                <p class="text-dark fw-bolder">Code:</p>
                <code class="text-danger fw-bolder fs-6">{{ Auth::user()->code ?? '-' }}</code>
            </div>
            <div class="col-md-6"></div>
        </div>
        <form class="flex-fill d-flex flex-column" data-prevent-double-submit>
            @csrf
            <div class="mb-3 flex-fill">
                <input type="tel" name="phone" class="form-control" placeholder="{{__('form.phone')}}" required>
            </div>
            <div class="mb-3 flex-fill">
                <select class="form-control" name="goal" required>
                    <option value="" selected disabled>{{__('form.goal')}}</option>
                    <option value="fitness">{{__('form.general_fitness')}}</option>
                    <option value="perdita-peso">{{__('form.weight_loss')}}</option>
                    <option value="massa-muscolare">{{__('form.muscle_gain')}}</option>
                    <option value="riabilitazione">{{__('form.rehabilitation')}}</option>
                </select>
            </div>
            <x-buttons.button
                type="submit"
                variant="public-primary"
                class="w-100 text-b">
                {{ __('form.subscribe_now') }}
            </x-buttons.button>
        </form>
    </div>
</div>