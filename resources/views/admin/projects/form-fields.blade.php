<div class="col-md-6">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control"
           value="{{ old('title', optional($project)->title) }}" required>
    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Slug (optional)</label>
    <input type="text" name="slug" class="form-control"
           value="{{ old('slug', optional($project)->slug) }}">
    <div class="form-text">Leave empty to generate automatically.</div>
    @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Location</label>
    <input type="text" name="location" class="form-control"
           value="{{ old('location', optional($project)->location) }}">
    @error('location') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="col-12">
    <label class="form-label">Short description</label>
    <textarea name="short_description" rows="2" class="form-control">{{ old('short_description', optional($project)->short_description) }}</textarea>
    @error('short_description') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="col-12">
    <label class="form-label">Full description</label>
    <textarea name="description" rows="6" class="form-control" required>{{ old('description', optional($project)->description) }}</textarea>
    @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
</div>

<div class="col-md-6">
    <label class="form-label">Cover image</label>
    <input type="file" name="cover_image" class="form-control">
    @error('cover_image') <div class="text-danger small">{{ $message }}</div> @enderror

    @if(optional($project)->cover_image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $project->cover_image) }}"
                 alt="" style="max-height: 140px;" class="img-thumbnail">
        </div>
    @endif
</div>

<div class="col-12 d-flex justify-content-end mt-3">
    <button class="btn btn-brand">Save project</button>
</div>
