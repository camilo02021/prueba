
<div id="books">
    <div class="section-title">
        <h2>Books</h2>
    </div>
    <div class="row">
        @forelse($books as $book)
            <div class="small-3 medium-3 large-3 columns">

                <book :book="{{$book}}"
                    booklink="{{ route('book.show', ['book' => $book->id]) }}"
                    bookimagepath='{{asset("$book->image")}}'
                ></book>

            </div>
            @empty

            <h3>Lo sentimos, no hay libros en linea.</h3>
        @endforelse

    </div>
    <br>
    
</div>