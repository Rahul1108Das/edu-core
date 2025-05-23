@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Social Links</h3>
                    <div class="card-actions">
                        <a href="{{ route('admin.social-links.create') }}" class="btn btn-primary">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <i class="ti ti-plus"></i>
                            Add new
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>URL</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($socialLinks as $link)
                                    <tr>
                                        <td>
                                            <img width="50" style="background-color: gray" src="{{ asset($link->icon) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $link->url }}
                                        </td>
                                        <td>
                                            @if ($link->status)
                                                <span class="badge bg-lime text-lime-fg">Active</span>
                                            @else
                                                <span class="badge bg-red text-red-fg">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.social-links.edit', $link->id) }}"
                                                class="btn-sm btn-primary">
                                                <i class="ti ti-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.social-links.destroy', $link->id) }}"
                                                class="text-red delete-item">
                                                <i class="ti ti-trash-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            No Social Link added
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
