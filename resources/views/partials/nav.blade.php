<nav class="navbar navbar-expand-lg navbar-light bg-light navbarShadow">
    <a class="navbar-brand" href="/">DM Employee Tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::segment(1) === '/' ? 'active' : null }}">
                <a class="nav-link" href="/"><i class="fa fa-home mr-1" aria-hidden="true"></i> Home <span
                        class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'employees' ? 'active' : null }}">
                <a class="nav-link" href="/employees"><i class="fa fa-users mr-1" aria-hidden="true"></i> Employees</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'jobs' ? 'active' : null }}">
                <a class="nav-link" href="/jobs"><i class="fa fa-briefcase mr-1" aria-hidden="true"></i> Jobs</a>
            </li>
            <li class="nav-item {{ Request::segment(1) === 'prices' ? 'active' : null }}">
                <a class="nav-link" href="/prices"><i class="fa fa-usd mr-1" aria-hidden="true"></i> Prices</a>
            </li>
        </ul>
    </div>
</nav>
