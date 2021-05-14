    <div class="position-absolute" style="top:.3rem;left:.5rem;"  >



    <button class="btn btn-danger  " id="newButton" onclick="cursor_in()"><i class="fas fa-map-marker-alt"></i> {{$btn1}} </button>
    <input id="cordlng" type="text" wire:model='cordlng'style='display:;' value="{{$cordlng}}" editable='false'>
    <input id="needtype" type="text" wire:model='needtype'style='display:none;' value="{{$needtype}}" editable='false'>
    <input id="cordlat" type="text" wire:model='cordlat' style='display:;' value="{{$cordlat}}" editable='false'>
    <button class="btn btn-danger  " id="saveButton" wire:click.prevent="updateCoord"  >
        
        <i class="fas fa-map-marker-alt"></i> save this point </button>

    <button onclick="addDataPoint()">kkk</button>

    @if(Session::has('savedOrNot'))
        <h5 class="mt-1
        "  style="color: {{Session::get('color')}}">
            {{ Session::get('savedOrNot')}}
        </h5>
    @endif
<script> 
    function cursor_in(){    
      document.getElementById("mapContainer").style.cursor = "url('{{asset('icons/map-pin.svg')}}')12 24, auto";
      setUpClickListener(map , time=0);

    }


</script>
</div>