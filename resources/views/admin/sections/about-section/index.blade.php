@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">About Us Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.about-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    @if ($about?->image != null)
                                    <x-image-preview src="{{ asset($about->image) }}" style="background-color: black"/>                                        
                                    @endif
                                    <input type="file" class="form-control" name="image" placeholder="">
                                    <input type="hidden" name="old_image" value="{{ $about?->image }}">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Rounded Text</label>
                                    <input type="text" class="form-control" name="rounded_text" placeholder="" value="{{ $about?->rounded_text }}">
                                    <x-input-error :messages="$errors->get('rounded_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Learner Count</label>
                                    <input type="text" class="form-control" name="lerner_count" placeholder="" value="{{ $about?->lerner_count }}">
                                    <x-input-error :messages="$errors->get('lerner_count')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Learner Count Text</label>
                                    <input type="text" class="form-control" name="lerner_count_text" placeholder="" value="{{ $about?->lerner_count_text }}">
                                    <x-input-error :messages="$errors->get('lerner_count_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Learner Image</label>
                                    @if ($about?->lerner_image != null)
                                    <x-image-preview src="{{ asset($about?->lerner_image) }}" style="background-color: black"/>                                        
                                    @endif
                                    <input type="file" class="form-control" name="lerner_image" placeholder="">
                                    <input type="hidden" name="old_lerner_image" value="{{ $about?->lerner_image }}">
                                    <x-input-error :messages="$errors->get('lerner_image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">About Title</label>
                                    <input type="text" class="form-control" name="about_title" placeholder="" value="{{ $about?->title }}">
                                    <x-input-error :messages="$errors->get('about_title')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">About Description</label>
                                    <textarea class="editor" name="about_description">{!! $about?->description !!}</textarea>
                                    <x-input-error :messages="$errors->get('about_description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" placeholder="" value="{{ $about?->button_text }}">
                                    <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" placeholder="" value="{{ $about?->button_url }}">
                                    <x-input-error :messages="$errors->get('button_url')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video Image</label>
                                    @if ($about?->video_image != null)
                                    <x-image-preview src="{{ asset($about?->video_image) }}" style="background-color: black"/>                                        
                                    @endif
                                    <input type="file" class="form-control" name="video_image" placeholder="">
                                    <input type="hidden" name="old_video_image" value="{{ $about?->video_image }}">
                                    <x-input-error :messages="$errors->get('video_image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Video URL</label>
                                    <input type="text" class="form-control" name="video_url" placeholder="" value="{{ $about?->video_url }}">
                                    <x-input-error :messages="$errors->get('video_url')" class="mt-2" />
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
