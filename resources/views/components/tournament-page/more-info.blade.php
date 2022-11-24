@props([
    'dateOfStart',
    'dateOfEnd',
    'pricePool' => '0EUR',
    'capacity',
    'sport',
    'approved' => 'False',
    'managerID'
])

@php
    $manager = App\Models\Person::find($managerID)->username;    
@endphp

<section id="more-info">
    <h3>More info</h3>
    <div id="more-info-box">
        <h4>Start date:</h4><p>{{$dateOfStart}}</p>
        <h4>End date:</h4><p>{{$dateOfEnd}}</p>
        <h4>Price pool:</h4><p>{{$pricePool}}</p>
        <h4>Manager:</h4><p>{{$manager}}</p>
        <h4>Capacity:</h4><p>{{$capacity}}</p>
        <h4>Sport:</h4><p>{{$sport}}</p>
        <h4>Is approved:</h4><p>{{$approved}}</p>
    </div>

</section>
