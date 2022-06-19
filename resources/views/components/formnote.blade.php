<div class="container mt-4">
    <form class="container mt-4 mb-4" method="post" action="/notes">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" required>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Note</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="17" name="body" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>