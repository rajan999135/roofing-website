@extends('layouts.app')

@section('title', 'Edit Project | Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="h4 mb-4">Edit project</h1>

        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf
            @method('PUT')

            @include('admin.projects.form-fields', ['project' => $project])
        </form>
    </div>
</section>
@endsection
