<form method="POST" action="{{ isset($conference) ? route('admin.conferences.update', $conference['id']) : route('admin.conferences.store') }}">
    @csrf
    @isset($conference)
        @method('PUT')
    @endisset
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" value="{{ $conference['title'] ?? '' }}" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required>{{ $conference['description'] ?? '' }}</textarea>

    <label for="date">Date:</label>
    <input type="date" id="date" name="date" value="{{ $conference['date'] ?? '' }}" required>

    <button type="submit">{{ isset($conference) ? 'Update' : 'Create' }}</button>
</form>
