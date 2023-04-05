<div class="card">
    <div class="card-header">
        {{-- <h4 class="card-title">Area Parkir</h4> --}}
        {{-- create justify-content-between h4 and button --}}
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Area Parkir</h4>
            <button class="btn btn-outline-primary btn-sm" onclick="fullscreen()">
                <i class="bi bi-arrows-angle-expand"></i>
            </button>
        </div>
    </div>    
    {{-- <div class="card-body" id="areaParkir"> --}}
    <div class="container-fluid" id="areaParkir">
        <div class="row p-3">
            @foreach (array_chunk($parkingData, 3) as $row)
                
                <div class="container col-4">
                    @foreach ($row as $parking)
                        <div
                            class="text-center p-2 parking-slot {{ $parking['status'] ? 'bg-success': 'bg-danger'  }} {{ $loop->first ? 'rounded-top' : '' }} {{ $loop->last ? 'rounded-bottom' : '' }}"
                            data-id="{{ $parking['kode'] }}" 
                            id="{{ $parking['kode'] }}"
                            onclick="test('{{ $parking['kode'] }}')"
                            >
                                {{ $parking['kode'] }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function test(id) {
            // get the element by data-id
            console.log(id);
            var element = document.querySelector('[data-id="' + id + '"]');
            // console classlist
            console.log(element.classList);
        }
        // create function fullscreen
        function fullscreen() {
            var element = document.getElementById("areaParkir");
            if (element.requestFullscreen) {
                element.innerHTML = "<h1 id='f1' class='text-center font-weight-bold mt-2'>Area Parkir</h1>" + element.innerHTML;
                element.requestFullscreen();
                element.requestFullscreen();
            } else if (element.mozRequestFullScreen) {
                element.mozRequestFullScreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }
            // remove id f1 after exit fullscreen
            document.addEventListener("fullscreenchange", function () {
                if (document.fullscreenElement) {
                    console.log("Entered fullscreen mode");
                } else {
                    console.log("Exited fullscreen mode");
                    var element = document.getElementById("f1");
                    element.remove();
                }
            });
            
        }
        
    </script>
</div>
