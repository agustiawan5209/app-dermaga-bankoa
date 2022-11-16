@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

</x-jet-modal>
