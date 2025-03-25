@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Update Sub Category</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.course-categories.index') }}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="ti ti-arrow-narrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.course-sub-categories.update', ['course_category' => $course_category->id, 'course_sub_category' => $course_sub_category->id ]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter language name">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div> --}}
                        <div class="row">
                                @if(isset($course_sub_category->image))
                                    <x-image-preview class="" src="{{ asset($course_sub_category->image) }}"/>
                                @endif
                                <div class="col-md-6">
                                    <x-input-file-block name="image" placeholder="Input image" />
                                </div>
                                <div class="col-md-6">
                                    <x-input-block name="icon" :value="$course_sub_category->icon" placeholder="Enter icon class name">
                                        <x-slot name="hint">
                                            <small class="hint">You can get icon classes from <a target="_blank" href="https://tabler.io/icons">https://tabler.io/icons</a></small>
                                        </x-slot>
                                    </x-input-block>
                                </div>
                            <div class="col-md-12">
                                <x-input-block name="name"  :value="$course_sub_category->name" placeholder="Enter category name" />
                            </div>
                            <div class="col-md-6">
                                <x-input-toggle-block name="show_at_trending" label="Show at trending" :checked="$course_sub_category->show_at_trending == 1" />
                            </div>
                            <div class="col-md-6">
                                <x-input-toggle-block name="status" label="Status" :checked="$course_sub_category->status == 1" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
