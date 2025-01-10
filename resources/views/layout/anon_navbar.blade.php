<div style="height: 56px"></div>
<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed top-0 start-0 end-0 z-1">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('anon.home') }}">ConnectFriend</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('anon.home') }}">{{ __('layout/anon_navbar.home') }}</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('locale') }}" class="d-inline">
                        @csrf
                        <select class="form-select d-inline me-2" name="locale" onchange="this.form.submit()">
                            <option value="id" {{ App::currentLocale() == 'id' ? 'selected' : '' }}>ID</option>
                            <option value="en" {{ App::currentLocale() == 'en' ? 'selected' : '' }}>EN</option>
                        </select>
                    </form>
                </li>
                <li class="nav-item">
                    <a href="{{ route('anon.login') }}" class="btn btn-primary">{{ __('layout/anon_navbar.login') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>