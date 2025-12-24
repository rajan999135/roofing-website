@extends('layouts.app')

@section('title', 'Add Project | Admin')

@section('content')
<section class="py-5">
    <div class="container">
        <h1 class="h4 mb-4">Add new project</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
            @csrf

            @include('admin.projects.form-fields', ['project' => null])
        </form>
    </div>
</section>
@endsection
