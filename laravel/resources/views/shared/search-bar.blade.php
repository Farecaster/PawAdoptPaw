<div class="container mb-5">
    <form action="{{ route('pets') }}" method="GET">
        <div class="form-group has-search d-flex">
            <span class="fa fa-search form-control-feedback"></span>
            <input type="text" name="search" class="form-control" placeholder="Search"
                value="{{ request('search', '') }}">
            <button class="btn-sm btn-white custom-btn"><i class="bi bi-search"></i></button>
            <!-- Use custom-btn-sm class -->
        </div>
    </form>
</div>