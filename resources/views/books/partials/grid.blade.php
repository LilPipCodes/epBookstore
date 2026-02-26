<!-- Book Grid Partial -->
<div class="row book-grid">
    @for ($i = 0; $i < 8; $i++)
        <div class="col-md-3 mb-4">
            @include('components.book-card')
        </div>
    @endfor
</div>
