@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hero Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Label</label>
                                    <input type="text" class="form-control" name="label" placeholder="" value="{{ $hero?->label }}">
                                    <x-input-error :messages="$errors->get('label')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="" value="{{ $hero?->title }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="subtitle" placeholder="" value="{{ $hero?->subtitle }}">
                                    <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" placeholder="" value="{{ $hero?->button_text }}">
                                    <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" placeholder="" value="{{ $hero?->button_url }}">
                                    <x-input-error :messages="$errors->get('button_url')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Button Text</label>
                                    <input type="text" class="form-control" name="video_button_text" placeholder="" value="{{ $hero?->video_button_text }}">
                                    <x-input-error :messages="$errors->get('video_button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Button URL</label>
                                    <input type="text" class="form-control" name="video_button_url" placeholder="" value="{{ $hero?->video_button_url }}">
                                    <x-input-error :messages="$errors->get('video_button_url')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Banner Item Title</label>
                                    <input type="text" class="form-control" name="banner_item_title" placeholder="" value="{{ $hero?->banner_item_title }}">
                                    <x-input-error :messages="$errors->get('banner_item_title')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Banner Item Subtitle</label>
                                    <input type="text" class="form-control" name="banner_item_subtitle" placeholder="" value="{{ $hero?->banner_item_subtitle }}">
                                    <x-input-error :messages="$errors->get('banner_item_subtitle')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Rounded Text</label>
                                    <input type="text" class="form-control" name="round_text" placeholder="" value="{{ $hero?->round_text }}">
                                    <x-input-error :messages="$errors->get('round_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Hero Image</label>
                                    @if ($hero?->image != null)
                                    <x-image-preview src="{{ asset($hero?->image) }}" />                                        
                                    @endif
                                    <input type="file" class="form-control" name="image" placeholder="">
                                    <input type="hidden" name="old_image" value="{{ $hero?->image }}">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-download"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M12 17v-6" /><path d="M9.5 14.5l2.5 2.5l2.5 -2.5" /></svg>
                                    Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
