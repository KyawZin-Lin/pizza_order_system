<div class="text-center col-6 offset-6 border-rounded" >
    @if (session()->has('message'))
        <div class="alert alert-success " id="alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ session()->get('message') }}
        </div>
    @endif
</div>
