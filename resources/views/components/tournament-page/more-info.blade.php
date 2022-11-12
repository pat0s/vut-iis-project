@props([
    'dateOfStart',
    'pricePool' => '0EUR',
    'capacity',
])

<section id="more-info">
    <h3>More info</h3>
    <div id="more-info-box">
        <h4>Date of start:</h4><p>{{$dateOfStart}}</p>
        <h4>Price pool:</h4><p>{{$pricePool}}</p>
        <h4>Capacity:</h4><p>{{$capacity}}</p>
    </div>
    
</section>