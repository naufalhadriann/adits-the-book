document.addEventListener("DOMContentLoaded", function () {
    var modal = document.getElementById("modalForm");
    var modalTitle = document.getElementById("modalFormLabel");
    var form = document.getElementById("form");
    var submitButton = document.getElementById("submitButton");
    const userField = document.getElementById("userField");

    // Event listener for opening the modal
    modal.addEventListener("show.bs.modal", function (event) {
        var button = event.relatedTarget;
        var entity = button.getAttribute("data-entity");
        var action = button.getAttribute("data-action");
        var entityId = button.getAttribute("data-id");

        if (entity === "user") {
            handleUserModal(action, entityId);
        } else if (entity === "category") {
            handleCategoryModal(action, entityId);
        } else if (entity === "book") {
            handleBookModal(action, entityId);
        } else if (entity === "admin") {
            handleAdminModal(action, entityId);
        }
    });
    function showFields(fields) {
        document.getElementById("nameField").style.display = fields.includes(
            "name"
        )
            ? "block"
            : "none";
        document.getElementById("emailField").style.display = fields.includes(
            "email"
        )
            ? "block"
            : "none";
        document.getElementById("passwordField").style.display =
            fields.includes("password") ? "block" : "none";
        document.getElementById("passwordConfirmationField").style.display =
            fields.includes("password_confirmation") ? "block" : "none";
        document.getElementById("titleField").style.display = fields.includes(
            "title"
        )
            ? "block"
            : "none";
        document.getElementById("authorField").style.display = fields.includes(
            "author"
        )
            ? "block"
            : "none";
        document.getElementById("genreField").style.display = fields.includes(
            "genre"
        )
            ? "block"
            : "none";
        document.getElementById("descriptionField").style.display =
            fields.includes("description") ? "block" : "none";
        document.getElementById("priceField").style.display = fields.includes(
            "price"
        )
            ? "block"
            : "none";
        document.getElementById("stockField").style.display = fields.includes(
            "stock"
        )
            ? "block"
            : "none";
        document.getElementById("penerbitField").style.display =
            fields.includes("penerbit") ? "block" : "none";
        document.getElementById("categoryField").style.display =
            fields.includes("category") ? "block" : "none";
        document.getElementById("imageField").style.display = fields.includes(
            "image"
        )
            ? "block"
            : "none";
    }
    // Handle user modal
    function handleUserModal(action, userId) {
        if (action === "edit") {
            modalTitle.textContent = "Edit User";
            submitButton.textContent = "Save Changes";
            showFields(["name", "email", "password", "password_confirmation"]);
            fetch("/user/" + userId + "/edit")
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById("name").value = data.name;
                    document.getElementById("email").value = data.email;
                    document.getElementById("password").value = data.password;
                    document.getElementById("password_confirmation").value =
                        data.password_confirmation;
                    form.setAttribute("action", "/user/" + userId);
                    form.setAttribute("method", "PUT");
                });
        } else {
            modalTitle.textContent = "Add User";
            submitButton.textContent = "Add";
            clearFormFields();
            showFields(["name", "email", "password", "password_confirmation"]);
            form.setAttribute("action", "/user");
            form.setAttribute("method", "POST");
        }
    }

    // Handle category modal
    function handleCategoryModal(action, categoryId) {
        if (action === "edit") {
            modalTitle.textContent = "Edit Category";
            submitButton.textContent = "Save Changes";
            showFields(["name", "genre"]);
            fetch("/category/" + categoryId + "/edit")
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById("name").value = data.name;
                    document.getElementById("genre").value = data.genre;
                    form.setAttribute("action", "/category/" + categoryId);
                    form.setAttribute("method", "PUT");
                });
        } else {
            modalTitle.textContent = "Add Category";
            submitButton.textContent = "Add";
            clearFormFields();
            showFields(["name", "genre"]);
            form.setAttribute("action", "/category");
            form.setAttribute("method", "POST");
        }
    }

    // Handle book modal
    function handleBookModal(action, bookId) {
        if (action === "edit") {
            modalTitle.textContent = "Edit Book";
            submitButton.textContent = "Save Changes";
            showFields([
                "title",
                "description",
                "author",
                "penerbit",
                "price",
                "stock",
                "category",
                "image",
            ]);
            fetch("/product/" + bookId + "/edit")
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById("title").value = data.title;
                    document.getElementById("author").value = data.author;
                    document.getElementById("description").value =
                        data.description;
                    document.getElementById("penerbit").value = data.penerbit;
                    document.getElementById("price").value = data.price;
                    document.getElementById("stock").value = data.stock;
                    document.getElementById("category").value =
                        data.category_id;
                    document.getElementById("image").value = data.image;
                    form.setAttribute("action", "/product/" + bookId);
                    form.setAttribute("method", "PUT");
                });
        } else {
            modalTitle.textContent = "Add Book";
            submitButton.textContent = "Add";
            clearFormFields();
            showFields([
                "title",
                "description",
                "author",
                "penerbit",
                "price",
                "stock",
                "category",
                "image",
            ]);
            form.setAttribute("action", "/product");
            form.setAttribute("method", "POST");
        }
    }
    function handleAdminModal(action, userId) {
        if (action === "edit") {
            modalTitle.textContent = "Edit Admin";
            submitButton.textContent = "Save Changes";
            showFields([
                "name",
                "email",
                "password",
                "password_confirmation",
                "role",
            ]);
            fetch("/admin/" + userId + "/edit")
                .then((response) => response.json())
                .then((data) => {
                    document.getElementById("name").value = data.name;
                    document.getElementById("email").value = data.email;
                    document.getElementById("password").value = data.password;
                    document.getElementById("password_confirmation").value =
                        data.password_confirmation;
                    form.setAttribute("action", "/admin/" + userId);
                    form.setAttribute("method", "PUT");
                });
        } else {
            modalTitle.textContent = "Add Admin";
            submitButton.textContent = "Add";
            clearFormFields();
            showFields(["name", "email", "password", "password_confirmation"]);
            form.setAttribute("action", "/admin");
            form.setAttribute("method", "POST");
        }
    }

    function clearFormFields() {
        document.getElementById("description").value = "";
        document.getElementById("penerbit").value = "";
        document.getElementById("price").value = "";
        document.getElementById("stock").value = "";
        document.getElementById("category").value = "";
        document.getElementById("image").value = "";
        document.getElementById("name").value = "";
        document.getElementById("email").value = "";
        document.getElementById("password").value = "";
        document.getElementById("password_confirmation").value = "";
        document.getElementById("title").value = "";
        document.getElementById("author").value = "";
        document.getElementById("genre").value = "";
    }

    // Handle form submission
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        var action = form.getAttribute("action");
        var method = form.getAttribute("method");
        var formData = new FormData(form);

        if (
            method.toUpperCase() === "PUT" ||
            method.toUpperCase() === "PATCH"
        ) {
            formData.append("_method", method.toUpperCase());
        }

        fetch(action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                Accept: "application/json",
            },
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    window.location.reload();
                } else {
                    console.log(data.errors);
                }
            });
    });
});
