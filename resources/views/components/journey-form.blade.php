<div class="col-lg-6 mb-4 d-flex">
    <div class="form-container flex-fill d-flex flex-column">
        <h2 class="section-title text-b">{{ __('form.contact_us') }}</h2>
        <form class="flex-fill d-flex flex-column">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3 flex-fill">
                    <input type="text" class="form-control" placeholder="{{__('form.name')}}" required>
                </div>
                <div class="col-md-6 mb-3 flex-fill">
                    <input type="text" class="form-control" placeholder="{{__('form.surname')}}" required>
                </div>
            </div>
            <div class="mb-3 flex-fill">
                    <input type="email" class="form-control" placeholder="{{__('form.email')}}" required>
                </div>
            <div class="mb-3 flex-fill">
                <input type="text" class="form-control" placeholder="{{__('form.subject')}}" required>
            </div>
            <div class="mb-3 flex-fill">
                <textarea class="form-control" rows="4" placeholder="{{__('form.message')}}"
                    required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-custom w-100">{{__('form.send_message')}}</button>
        </form>
    </div>
</div>