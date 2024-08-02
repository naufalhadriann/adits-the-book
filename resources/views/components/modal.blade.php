<!-- Modal HTML -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalFormLabel">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form">
                
                        <!-- User Fields -->
                        <div id="nameField" class="mb-3" style="display: none;">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div id="emailField" class="mb-3" style="display: none;">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div id="passwordField" class="mb-3" style="display: none;">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div id="passwordConfirmationField" class="mb-3" style="display: none;">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                 
                        <!-- Category Fields -->
                        <div id="genreField" class="mb-3" style="display: none;">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre">
                        </div>
                   
                        <!-- Book Fields -->
                        <div id="titleField" class="mb-3" style="display: none;">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div id="descriptionField" class="mb-3" style="display: none;">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div id="authorField" class="mb-3" style="display: none;">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author">
                        </div>
                        <div id="penerbitField" class="mb-3" style="display: none;">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input class="form-control" id="penerbit" name="penerbit">
                        </div>
                        <div id="priceField" class="mb-3" style="display: none;">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price">
                        </div>
                        <div id="stockField" class="mb-3" style="display: none;">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                        </div>
                        <div id="categoryField" class="mb-3" style="display: none;">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category_id" class="form-control">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->genre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="imageField" class="mb-3" style="display: none;">
                            <label for="image" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="submitButton"></button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
