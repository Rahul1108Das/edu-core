@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Create Custom Page</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.custom-page.index') }}" class="btn btn-primary">
                            <i class="ti ti-arrow-narrow-left"></i>
                            Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.custom-page.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <x-input-block name="title" placeholder="Enter title" />
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="description" class="editor"></textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <x-input-block name="seo_title" placeholder="Enter SEO title" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="" class="mb-2">SEO Description</label>
                                    <textarea name="seo_description" class="form-control"></textarea>
                                    <x-input-error :messages="$errors->get('seo_description')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <x-input-toggle-block name="show_at_nav" label="Show at Navigation" />
                            </div>
                            <div class="col-md-6">
                                <x-input-toggle-block name="status" label="Status" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">
                                <i class="ti ti-device-floppy"></i>
                                Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
