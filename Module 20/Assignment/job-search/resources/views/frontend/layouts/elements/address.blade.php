<div class="element  clearfix col1-3 home contact background " id="addform">
    <div class="overlay"></div>
    <!-- <div class="icons map"></div>-->
    @php

        $location = App\Model\Location::all();

    @endphp
    <br>
    <h3>Silverbricks</h3>
    <ul class="unordered-list">
        <li><b>Chittagong Office:</b><br>
            {{$location[0]->address}}
        </li><br>
        <li><b>Dhaka Office:</b><br>
            {{$location[0]->dhakaAddress}}
        </li><br>
        <li>PH: {{$location[0]->phoneNumber}}.</li>
        <li><a href="mailto:info@silverbricksbd.com" title="Write Email">{{$location[0]->email}}</a></li>
    </ul>
</div>
