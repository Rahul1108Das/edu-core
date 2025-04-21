@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Video Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.video-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Background</label>
                                    @if ($video?->background != null)
                                    <x-image-preview src="{{ asset($video?->background) }}" style="background-color: black"/>                                        
                                    @endif
                                    <input type="file" class="form-control" name="background" placeholder="">
                                    <input type="hidden" name="old_background" value="{{ $video?->background }}">
                                    <x-input-error :messages="$errors->get('background')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video URL</label>
                                    <input type="text" class="form-control" name="video_url" placeholder="" value="{{ $video?->video_url }}">
                                    <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <textarea name="description" class="form-control">{{ $video?->description }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" placeholder="" value="{{ $video?->button_text }}">
                                    <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" placeholder="" value="{{ $video?->button_url }}">
                                    <x-input-error :messages="$errors->get('button_url')" class="mt-2" />
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
