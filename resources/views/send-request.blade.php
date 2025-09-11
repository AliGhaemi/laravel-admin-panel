<x-layouts.layout title="Send Request">
    <div class="m-10 rounded-2xl border-1 border-utility">
        <h1 class="text-3xl p-5 border border-b-utility border-x-0 border-t-0">Request Information</h1>
        <div class="p-5">
            @include('form-select', ['countries' => $countries])
        </div>
    </div>

    <script>
        document.getElementById('country').addEventListener('change', function () {
            const countryId = this.value;
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = '<option value="">Loading Cities...</option>';

            if (!countryId) {
                citySelect.innerHTML = '<option value="">Select a Country first</option>';
                return;
            }

            fetch(`/api/cities?filters[country_id]=${countryId}`)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">Select a City</option>';

                    if (data.data && data.data.length > 0) {
                        data.data.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.id;
                            option.textContent = city.name;
                            citySelect.appendChild(option);
                        });
                    } else {
                        citySelect.innerHTML = '<option value="">No cities found</option>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching cities:', error);
                    citySelect.innerHTML = '<option value="">Error loading cities</option>';
                });
        });
    </script>
</x-layouts.layout>
