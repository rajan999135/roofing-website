@extends('layouts.app')

@section('title', 'Projects | Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 mb-0">Projects</h1>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-brand">
                + Add project
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($projects->count())
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Location</th>
                        <th>Created</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->location }}</td>
                        <td>{{ $project->created_at->format('d M Y') }}</td>
                        <td class="text-end">
                            <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-sm btn-outline-secondary" target="_blank">View</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $projects->links() }}
        @else
            <p>No projects yet. Click “Add project” to create the first one.</p>
        @endif
    </div>
</section>
@endsection
