<div class="card">
    <div class="card-header">
        <h4 class="card-title">Area Parkir</h4>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach (array_chunk($parkingData, 3) as $row)
                <div class="col-4">
                    @foreach ($row as $parking)
                        <div class="text-center p-2 parking-slot {{ $parking['status'] ? 'bg-danger' : 'bg-success' }}" data-id="{{ $parking['id'] }}">
                            {{ $parking['name'] }}
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        
        <script>
            const parkingSlots = document.querySelectorAll('.parking-slot');
            
            parkingSlots.forEach((slot) => {
                slot.addEventListener('click', () => {
                    const id = slot.dataset.id;
                    const status = !slot.classList.contains('bg-danger');
                    
                    // kirim request untuk memperbarui status di database melalui AJAX atau Livewire
                    // ...
                    
                    // update tampilan
                    slot.classList.remove('bg-success', 'bg-danger');
                    slot.classList.add(status ? 'bg-danger' : 'bg-success');
                });
            });
        </script>
    </div>
</div>
