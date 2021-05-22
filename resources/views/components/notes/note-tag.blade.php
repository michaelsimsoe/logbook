
<span style="border: 2px #{{ $typeColor() }} solid" class="rounded-lg inline-block text-sm m-1 mr-2 px-1 bg-gray-200 text-gray-600 shadow">
    <a href="{{ route('notes', ['tag' => $id]) }}">{{ $name }}</a>
</span>