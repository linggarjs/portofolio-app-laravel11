@extends('layout')

@section('content')
<div class="container my-5">
    <div id="project-container">
        <div class="row" id="project-list">
            @foreach ($projects as $project)
              <div class="col-md-4 mb-4">
                  <div class="card" onclick="window.location.href='{{ route('show', $project->id) }}'">
                      <img src="/storage/{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}" style="max-height: 150px; object-fit: cover;">
                      <ul class="list-inline">
                        @foreach ($project->skills as $skill)
                            <li class="list-inline-item">
                                <span class="badge badge-info">{{ $skill->name }}</span>
                            </li>
                        @endforeach
                    </ul>
                      
                      <div class="card-body">
                          <h2 class="card-title">{{ $project->title }}</h2>
                          <p class="card-text">{{ Str::limit($project->short_description, 50) }}</p>
                      </div>
                  </div>
              </div>
          @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $projects->links('pagination.custom') }}
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function fetchProjects(page = 1) {
            let formData = $('#search-filter-form').serialize();

            $.ajax({
                url: '/projects?page=' + page,
                method: 'GET',
                data: formData,
                success: function(data) {
                    $('#project-container').html(data);
                },
                error: function() {
                    alert('Failed to fetch projects.');
                }
            });
        }

        $('#search-filter-form').on('submit', function(event) {
            event.preventDefault();
            fetchProjects();
        });

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            let page = $(this).attr('href').split('page=')[1];
            fetchProjects(page);
        });
    });
</script>
@endsection
