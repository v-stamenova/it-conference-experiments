<div>
    <div class="grid grid-cols-4" onload="move('element')">
        <div class="col-span-3 w-full h-[550px]" id="drop-zone" style="background-image: url('/img/area.png');">

        </div>
        <div class="grid grid-cols-1 gap-4 items-center flex justify-items-center">
            <div class="w-3/4 h-20 bg-violet-500 rounded-lg element">
            </div>
            @foreach(\App\Models\Booth::all() as $booth)
                <div class="booth w-[170px] h-[100px] bg-indigo-500 rounded-lg draggable" id="1" draggable="true"
        style="position: absolute; left: {{$booth->posX}}px; top:{{$booth->posY}}px;"></div>
            @endforeach
        </div>
    </div>
</div>

@script
    <script>
        let item = document.getElementById('1');
        let dropZone = document.getElementById('drop-zone');
        let diffX;
        let diffY;

        item.addEventListener('dragstart', function(event) {
            console.log(event);
            diffX = event.clientX - item.getBoundingClientRect().left
            diffY = event.clientY - item.getBoundingClientRect().top
        })

        dropZone.addEventListener('dragover', function(event) {
            event.preventDefault()
        })

        dropZone.addEventListener('drop', function(event) {
            event.preventDefault()

            // Calculate drop coordinates relative to the dropZone
            const dropZoneRect = dropZone.getBoundingClientRect();
            const x = event.clientX - diffX
            const y = event.clientY - diffY

            // Set the item's positioning style
            item.style.position = 'absolute';
            item.style.left = `${x}px`;
            item.style.top = `${y}px`;

            // Append the item to the dropZone if not already there
            if (item.parentNode !== dropZone) {
                dropZone.appendChild(item);
            }

            $wire.dispatch('item-dropped', {x: x, y: y, id: item.id});
        })
    </script>
@endscript
