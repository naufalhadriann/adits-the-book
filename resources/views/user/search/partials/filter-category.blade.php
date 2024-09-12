@php
     $groupedCategories = $categorys->groupBy('name');
     $uniqueCategorys = $categorys->unique('name');
@endphp
  <h3>Kategori</h3>
  <div class="accordion" id="accordionExample">

    <h2 class="accordion-header" id="headingOne">
    <button class="accordion-button bg-white" type="button"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Buku
      </button>
    </h2>
   
    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
    <ul>
        @foreach ($uniqueCategorys as $category )
        
        <li class="mt-3">
            <a href="#">{{$category->name}}</a>
             <ul class="mt-2">
             @foreach ($categorys->where('name',$category->name) as $genre)

             <li class="mb-2"><a href="#">{{$genre->genre}}</a></li>
             @endforeach
                 </ul>
        </li>
        @endforeach
        
    </ul>
  </div>
  
</div>