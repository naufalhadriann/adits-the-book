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
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="emailField" class="mb-3" style="display: none;">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="passwordField" class="mb-3" style="display: none;">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="passwordConfirmationField" class="mb-3" style="display: none;">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                        <div id="roleField" class="mb-3" style="display: none;">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" name="role" class="form-control">
                            <option value="">Select Role</option>
                            <option value="0">User</option>
                            <option value="1">Admin</option>
                            </select>
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                 
                        <!-- Category Fields -->
                        <div id="genreField" class="mb-3" style="display: none;">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre">
                            @error('genre')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                   
                        <!-- Book Fields -->
                        <div id="idField" class="mb-3" style="display: none;">
                            <label for="id" class="form-label">Id</label>
                            <input type="text" class="form-control" id="id" name="id" readonly>
                        </div>
                        <div id="titleField" class="mb-3" style="display: none;">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title">
                            @error('title')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="descriptionField" class="mb-3" style="display: none;">
                            <label for="description" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="description" name="description"></textarea>
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="authorField" class="mb-3" style="display: none;">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author">
                            @error('author')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="penerbitField" class="mb-3" style="display: none;">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="penerbit" name="penerbit">
                            @error('penerbit')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="priceField" class="mb-3" style="display: none;">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div id="stockField" class="mb-3" style="display: none;">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock">
                            @error('stock')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="publishField" class="mb-3" style="display: none;">
                            <label for="publish" class="form-label">Publish Date</label>
                            <input type="date" class="form-control" id="publish" name="publish_date">
                            @error('stock')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="discountField" class="mb-3" style="display: none;">
                            <label for="discount" class="form-label">Discount</label>
                            <input type="text" class="form-control" id="discount" name="discount">
                            @error('discount')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div id="categoryField" class="mb-3" style="display: none;">
                            <label for="category" class="form-label">Category</label>
                            <select id="category" name="category_id" class="form-control">
                           <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->genre }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div id="imageField" class="mb-3" style="display: none;">
                            <label for="image" class="form-label">Cover Buku</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <img id="preview" alt="Image Preview" class="form-control ">
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
