<x-layout>
    <div class="note-container single-note">
        <h1>Create new note</h1>
        <form action="{{ route('note.store') }}" method="POST" class="note">
            @csrf
            {{-- csrf is a cross site request forgery methodology to prevent sumbission of forms from someone else's website to your website --}}
            <textarea name="note" rows="10" class="note-body" placeholder="Enter your note here"></textarea>
            <div class="note-buttons">
                <a href="{{ route('note.index') }}" class="note-cancel-button">Cancel</a>
                <button class="note-submit">Submit</button>
            </div>
        </form>
    </div>
</x-layout>
