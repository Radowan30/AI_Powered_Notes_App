<x-layout>
    <div class="note-container single-note">
        <div class="note-header">
            <h1>Note: {{ $note->created_at }}</h1>
            <div class="note-buttons">
                <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                {{-- When we want to delete something, a delete request has to be sent to the delete route. So instead having a button, it needs to be form, that submits to the note.destry route using the POST method (as we are modifying something), but then we also have to provid the @csrf and the @method('DELETE') directives --}}
                <form action="{{ route('note.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="note-delete-button">Delete</button>
                </form>
            </div>
        </div>
        <div class="note">
            <div class="note-body">
                {{ $note->note }}
            </div>
        </div>
    </div>
</x-layout>
