<div class="row">
    @foreach ($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('images/projects/' . $project->image) }}" class="card-img-top" alt="{{ $project->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('show', $project->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-4">
    {{ $projects->links('pagination.custom') }}
</div>
