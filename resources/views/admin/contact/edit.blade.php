@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Card</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l14 0" /><path d="M5 12l6 6" /><path d="M5 12l6 -6" /></svg>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Icon</label>
                            <x-image-preview src="{{ asset($contact->icon) }}" />                                        
                            <input type="file" class="form-control" name="icon" placeholder="">
                            <input type="hidden" name="old_icon" value="{{ $contact->icon }}">
                            <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="" value="{{ $contact->title }}">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Line One</label>
                            <input type="text" class="form-control" name="line_one" placeholder="" value="{{ $contact->line_one }}">
                            <x-input-error :messages="$errors->get('line_one')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Line Two</label>
                            <input type="text" class="form-control" name="line_two" placeholder="" value="{{ $contact->line_two }}">
                            <x-input-error :messages="$errors->get('line_two')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Status</label>
                            <select name="status">
                                <option @selected( $contact->status == 1 ) value="1">Active</option>
                                <option @selected( $contact->status == 0 ) value="0">Inactive</option>
                            </select>
                            <x-input-error :messages="$errors->get('line_two')" class="mt-2" />
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
