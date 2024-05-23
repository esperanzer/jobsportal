
<x-layout>

@include('partials._hero')
@include('partials._search')
{{-- <h1>{{$heading}}</h1> --}}
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

{{count($listings) == 0}}
@unless(count($listings) == 0)
{{-- {{$listings[0]->id
}} --}}


@foreach($listings as $listing)
<x-listing-card :listing="$listing" />

@endforeach

@else
<p> No listings found</p>
@endunless
</div>
<div  class="mt-6 p-4">
    {{$listings->links()}}

</div>
</x-layout>
