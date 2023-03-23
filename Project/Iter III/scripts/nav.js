class Navigation extends HTMLElement {
    constructor() {
        super();
    }

    connectedCallback() {
        this.innerHTML = `
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html">
                    <img src="images/system_logo.jpg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    SCS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_us.php">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact_us.php">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="types_of_services.php">Types of services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reviews.php">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="shopping_cart.php">Shopping cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                DBMaintain
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="database/DBMaintain/selectPage.php">Select</a></li>
                                <li><a class="dropdown-item" href="database/DBMaintain/insertPage.php">Insert</a></li>
                                <li><a class="dropdown-item" href="database/DBMaintain/updatePage.php">Update</a></li>
                                <li><a class="dropdown-item" href="database/DBMaintain/deletePage.php">Delete</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="sign_in.html">Sign in</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="sign_up.html">Sign up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        `;
    }
}

customElements.define('nav-bar', Navigation);
