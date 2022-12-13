@extends('admin.layouts.master')
@section('title', 'Category List')
@section('content')
    <!-- HEADER DESKTOP-->
 
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-3 offset-8">
                        <a href="{{ route('category#index') }}"><button
                                class="btn bg-dark text-white my-3">List</button></a>
                    </div>
                </div>
                <div class="col-lg-6 offset-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2"> Edit Your Category </h3>
                            </div>
                            <hr>
                            <form action=" {{route('category#update',$category->id)}}" method="POST" novalidate="novalidate">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="name" class="control-label mb-1">Name</label>
                                    <input id="name" name="name" value="{{$category->name }}" type="text"
                                        class="form-control  @error('name') is-invalid @enderror" aria-required="true"
                                        aria-invalid="false" placeholder="Seafood..." required>
                                    <div class="invalid-feedback">
                                        @error('name')
                                            {{ $message }}
                                        @enderror
                                        @if (!$errors->any())
                                            The name field is required
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Update</span>
                                        {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                        <i class="fa-solid fa-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
@endsection
