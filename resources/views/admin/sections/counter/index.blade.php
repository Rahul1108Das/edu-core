@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Counter Info Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.counter-section.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Counter One</label>
                                    <input type="text" class="form-control" name="counter_one"
                                        placeholder="" value="{{ $counter?->counter_one }}">
                                    <x-input-error :messages="$errors->get('counter_one')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title One</label>
                                    <input type="text" class="form-control" name="title_one"
                                        placeholder="" value="{{ $counter?->title_one }}">
                                    <x-input-error :messages="$errors->get('title_one')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Counter Two</label>
                                    <input type="text" class="form-control" name="counter_two"
                                        placeholder="" value="{{ $counter?->counter_two }}">
                                    <x-input-error :messages="$errors->get('counter_two')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title Two</label>
                                    <input type="text" class="form-control" name="title_two"
                                        placeholder="" value="{{ $counter?->title_two }}">
                                    <x-input-error :messages="$errors->get('title_two')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Counter Three</label>
                                    <input type="text" class="form-control" name="counter_three"
                                        placeholder="" value="{{ $counter?->counter_three }}">
                                    <x-input-error :messages="$errors->get('counter_three')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title Three</label>
                                    <input type="text" class="form-control" name="title_three"
                                        placeholder="" value="{{ $counter?->title_three }}">
                                    <x-input-error :messages="$errors->get('title_three')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Counter Four</label>
                                    <input type="text" class="form-control" name="counter_four"
                                        placeholder="" value="{{ $counter?->counter_four }}">
                                    <x-input-error :messages="$errors->get('counter_four')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title Four</label>
                                    <input type="text" class="form-control" name="title_four"
                                        placeholder="" value="{{ $counter?->title_four }}">
                                    <x-input-error :messages="$errors->get('title_four')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-file-download">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                        <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                        <path d="M12 17v-6" />
                                        <path d="M9.5 14.5l2.5 2.5l2.5 -2.5" />
                                    </svg>
                                    Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
