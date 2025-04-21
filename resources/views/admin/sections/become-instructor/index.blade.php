@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Become Instructor Section</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.become-instructor-section.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">Image</label>
                                    @if ($becomeInstructor?->image != null)
                                    <x-image-preview src="{{ asset($becomeInstructor?->image) }}" style="background-color: black"/>                                        
                                    @endif
                                    <input type="file" class="form-control" name="image" placeholder="">
                                    <input type="hidden" name="old_image" value="{{ $becomeInstructor?->image }}">
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="" value="{{ $becomeInstructor?->title }}">
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Subtitle</label>
                                    <input type="text" class="form-control" name="subtitle" placeholder="" value="{{ $becomeInstructor?->subtitle }}">
                                    <x-input-error :messages="$errors->get('subtitle')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button Text</label>
                                    <input type="text" class="form-control" name="button_text" placeholder="" value="{{ $becomeInstructor?->button_text }}">
                                    <x-input-error :messages="$errors->get('button_text')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Button URL</label>
                                    <input type="text" class="form-control" name="button_url" placeholder="" value="{{ $becomeInstructor?->button_url }}">
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
