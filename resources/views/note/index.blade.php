<x-app-layout>
    <div class="note-container py-12">
        {{-- For each links, we can manually set the link to each page. But this is not the perfect solution in laravel. We can generate the routes based on the route names  --}}
        <a href="{{ route('note.create') }}" class="new-note-btn">
            New Note
        </a>

        <div class="notes">
            {{-- now we will render every notes using a for each directive. There are many directives in laravel that can be accessed with the @ symbol. Below, each element in hte $notes array is assigned to the $note variable.
            
            The Str::words() method allows us to set the number of words we want to use
            --}}
            @foreach ($notes as $note)
                <div class="note">
                    <div id="note-{{ $note->id }}" class="note-body">
                        <b>AI Summary</b>: {{ Str::words($note->note_summary) }}
                    </div>
                    {{-- <script>
                        document.getElementById("note-{{ $note->id }}").innerHTML = "response"
                    </script> --}}
                    <div class="note-buttons">
                        {{-- Below in href="{{route('note.show', $note)}}", we actually need to pass the id of the note to have the right note shown and it is also how the route is setup in the web.php file. So we can either give $note->id as the second argument, or just $note in which case it'll just use the primary key (the id) --}}
                        <a href="{{ route('note.show', $note) }}" class="note-edit-button">View</a>
                        <a href="{{ route('note.edit', $note) }}" class="note-edit-button">Edit</a>
                        {{-- When we want to delete something, a delete request has to be sent to the delete route. So instead having a button, it needs to be form, that submits to the note.destry route using the POST method (as we are modifying something), but then we also have to provid the @csrf and the @method('DELETE') directives --}}
                        <form action="{{ route('note.destroy', $note) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="note-delete-button">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="p=6">
            {{ $notes->links() }}
        </div>
    </div>

    <script>
        var note = $note - > note
    </script>
</x-app-layout>
