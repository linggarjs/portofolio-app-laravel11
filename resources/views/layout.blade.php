<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container my-5">
            <div class="row align-items-center text-center">
                <div class="col-md-5">
                    <img src="/storage/{{ $profile->picture }}" class="rounded-circle img-fluid" alt="Profile Picture" width="500">
                    <div class="d-flex justify-content-center mt-3">
                        <a href="#contactModal" class="btn btn-primary mx-2" data-toggle="modal" data-target="#contactModal"><i class="fas fa-envelope"></i> Contact Me</a>
 
                        <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="contactModalLabel">Contact Me</h5>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                              <a href="mailto:{{ $profile->email ?? 'example@example.com' }}" class="btn btn-outline-primary w-100"><i class="fas fa-envelope"></i> Email</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="https://wa.me/{{ $profile->whatsapp ?? '628123456789' }}" class="btn btn-outline-success w-100" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                                            </li>
                                            <li class="list-group-item">
                                                <a href="{{ $profile->linkedin_url ?? '#' }}" class="btn btn-outline-info w-100" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ $profile->github_url ?? '#' }}" class="btn btn-dark mx-2" target="_blank"><i class="fab fa-github"></i> GitHub</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <h1>{{ $profile->name }}</h1>
                    <h4>{{ $profile->role }}</h4>
                    <p>{{ $profile->description }}</p>
                    <div class="d-flex justify-content-center mt-3">
                        @foreach($skills as $skill)
                        <div class="mx-2 text-center">
                            <img src="/storage/{{ $skill->icon }}" alt="{{ $skill->name }} Icon" width="25">
                            <p>{{ $skill['name'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </header>
    <form id="search-filter-form" method="GET" action="{{ route('index') }}" class="mb-4">
        <div class="row justify-content-end">
            <div class="col-md-4 col-sm-8 mb-1">
                <input type="text" name="search" class="form-control" placeholder="Search projects..." value="{{ request('search') }}">
            </div>
    
            <div class="col-md-2 col-sm-8 mb-1">
                <select name="skill" class="custom-select">
                    <option value="">Filter by Skill</option>
                    @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" {{ request('skill') == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="col-md-2 col-sm-8 mb-1">
                <button class="btn btn-outline-secondary w-100" type="submit">Search & Filter</button>
            </div>
        </div>
    </form>

    <main>
        @yield('content')
    </main>

    <footer class="bg-light py-4">
        <div class="container text-center">
            <div class="social-icons mb-3">
                <a href="https://facebook.com" class="mx-2" target="_blank">
                    <i class="fab fa-facebook-f fa-2x"></i>
                </a>
                <a href="https://github.com" class="mx-2" target="_blank">
                    <i class="fab fa-github fa-2x"></i>
                </a>
                <a href="https://linkedin.com" class="mx-2" target="_blank">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
                <a href="https://instagram.com" class="mx-2" target="_blank">
                    <i class="fab fa-instagram fa-2x"></i>
                </a>
            </div>
            <div class="copyright-text">
                <p>&copy; {{ now()->year }} Your Company. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
