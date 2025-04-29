@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top Bar</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.top-bar.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="" value="{{ $topbar->email }}">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="" value="{{ $topbar->phone }}">
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Offer Name</label>
                                    <input type="text" class="form-control" name="offer_name" placeholder="" value="{{ $topbar->offer_name }}">
                                    <x-input-error :messages="$errors->get('offer_name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Offer Short description</label>
                                    <input type="text" class="form-control" name="offer_short_description" placeholder="" value="{{ $topbar->offer_short_description }}">
                                    <x-input-error :messages="$errors->get('offer_short_description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Offer Button Text</label>
                                    <input type="text" class="form-control" name="offer_button_text" placeholder="" value="{{ $topbar->offer_button_text }}">
                                    <x-input-error :messages="$errors->get('offer_button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Offer Button URL</label>
                                    <input type="text" class="form-control" name="offer_button_url" placeholder="" value="{{ $topbar->offer_button_url }}">
                                    <x-input-error :messages="$errors->get('offer_button_url')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 17v-6" /><path d="M9.5 14.5l2.5 2.5l2.5 -2.5" /></svg>
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
