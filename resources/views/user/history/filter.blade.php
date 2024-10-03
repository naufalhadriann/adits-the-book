
<div class="history-filter py-2">

<i class="bx bx-search"></i>    

      <input class="search-history form-control rounded-3 " type="search" placeholder="Cari Pembelianmu.." aria-label="Search" name="search" value="{{ request('search')}}">


<div class="sort-history">

@include('user.history.partials.filter-latest')

</div>

<div class="date-history">

@include('user.history.partials.filter-date')

</div>

</div>


<div class="status mb-3">
        @include('user.history.partials.status')
    </div>
