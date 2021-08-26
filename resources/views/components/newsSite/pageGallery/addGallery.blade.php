<section class="container">
    <form>
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="old('title')" required>
        </div>
        <div class="mb-3" hidden>
            <input type="password" class="form-control" name="author_id" value="{{auth()->user()->id}}" required>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>


</section>
