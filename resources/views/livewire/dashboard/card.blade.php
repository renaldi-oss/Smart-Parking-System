<div class="card">
    <div class="card-header">
        <h4 class="card-title">Area Parkir</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach (array_chunk($parkingData, 3) as $row)
                <div class="container col-4">
                    @foreach ($row as $parking)
                        <div 
                        class="text-center p-2 parking-slot {{ $parking['status'] ? 'bg-success': 'bg-danger'  }}"
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
    </script>
</div>
